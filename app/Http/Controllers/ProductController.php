<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index',['products' => $products]);
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
        $products = new Product;
        $products->id = $request->id;
        $products->product_name = $request->product_name;
        $products->description = $request->description;
        $products->size = $request->size;
        $products->price = $request->price;
        $products->quantity = $request->quantity;
        $products->category = $request->category;
        $products->alert_stock = $request->alert_stock;
        $products->installment = $request->installment;
        $products->gives = $request->gives;
        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() .'.'. $extension;
            $file->move('uploads/images/products/', $filename);
            $products->image = $filename;
        }
        $products->save();
        if($products){
            Session::flash('statuscode','success');
            return redirect()->back()->with('message','Product Successfully Added!');
        }
        Session::flash('statuscode','error');
        return redirect()->back()->with('message','Product fail to add!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $products = new Product;
        $products->id = $request->id;
        $products->product_name = $request->product_name;
        $products->description = $request->description;
        $products->size = $request->size;
        $products->price = $request->price;
        $products->quantity = $request->quantity;
        $products->category = $request->category;
        $products->alert_stock = $request->alert_stock;
        $products->installment = $request->installment;
        $products->gives = $request->gives;
        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() .'.'. $extension;
            $file->move('uploads/images/products/', $filename);
            $products->image = $filename;
        }
        $products->update();
        Session::flash('statuscode','success');
        return redirect()->back()->with('message','Product Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        Session::flash('statuscode','error');
        return redirect()->back()->with('message','Product Deleted Successfully!');
    }
}