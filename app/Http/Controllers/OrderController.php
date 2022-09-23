<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_Detail;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $orders = Order::all();
         //order details history
         $lastID = Order_Detail::max('order_id');
         $order_receipt = Order_Detail::where('order_id', $lastID)->get();

        return view('orders.index', 
        ['products' => $products,
        'orders' => $orders,
        'order_receipt' => $order_receipt]);

        return view('');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        DB::transaction(function() use ($request){
            //Order Model
            $orders = new Order;
            $orders->name = $request->customer_name;
            $orders->phone_number = $request->customer_phone;
            $orders->address = $request->customer_address;
            $orders->save();
            $order_id = $orders->id;
            // Order Details
            for ($product_id = 0; $product_id < count($request->product_id); $product_id++){
                $order_details = new Order_Detail;
                $order_details->order_id = $order_id;
                $order_details->product_id = $request->product_id[$product_id];
                $order_details->quantity = $request->quantity[$product_id];
                $order_details->unit_price = $request->price[$product_id];
                $order_details->amount = $request->total_amount[$product_id];
                $order_details->discount = $request->discount[$product_id];
                $order_details->save();
            }
        //'order_id','product_id','quantity','unit_price','amount','discount',
            //Transactiion
            $transactions = new Transaction();
            $transactions->order_id = $order_id;
            $transactions->user_id = auth()->user()->id;
            $transactions->paid_amount = $request->paid_amount;
            $transactions->balance = $request->balance;
            $transactions->payment_method = $request->payment_method;
            $transactions->transac_amount = $order_details->amount;
            $transactions->transac_date = date('Y-m-d');
            $transactions->save();
            // 'order_id','paid_amount','balance','payment_method','user_id','transac_date','transac_amount',
            Cart::where('user_id', auth()->user()->id)->delete();
            //order history
            $products = Product::all();
            $order_details = Order_Detail::where('order_id', $order_id)->get();
           
            $orderedBy = Order::where('id', $order_id)->get();

            return view('orders.index',
            [
                'products' =>  $products,
                'order_details' =>  $order_details,
                'customer_orders' =>  $orderedBy,
            ]);
        });
        Session::flash('statuscode','success');
        return back()->with('message',"Order Successfully Added!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $orders, $id)
    {
        $orders = Order::find($id);
        $orders->name = $request->name;
        $orders->phone_number = $request->phone_number;
        $orders->address = $request->address;
        $orders->update();

        Session::flash('statuscode','success');
        return redirect()->back()->with('message','Customer Details Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $orders, $id)
    {
        $orders = Order::find($id);
        if(!$orders){
            Session::flash('statuscode','warning');
            return back()->with('message', 'Customer not found!');
        }
        $orders->delete();
        Session::flash('statuscode','error');
        return back()->with('message','Customer Deleted Successfully!');
    }
}
