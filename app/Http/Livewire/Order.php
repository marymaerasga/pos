<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Cart;
class Order extends Component
{
    public $orders, $products = [], $product_code, $message = '', $productIncart;

    public $pay_money, $balance;

    public function mount(){
        $this->products = Product::all();
        $this->productIncart = Cart::all();
    }
    public function InsertoCart(){
        $countProduct  = Product::where('id', $this->product_code)->first();
        if(!$countProduct){
            
            return session()->flash('error','Product Not Found!');
        }

        $countCartProduct = Cart::where('product_id', $this->product_code)->count();
        if($countCartProduct > 0){
            return session()->flash('info','Product ' . $countProduct->product_name . ' already exist in the Cart add quantity');
        }

        $add_to_cart = new Cart;
        $add_to_cart ->product_id = $countProduct->id;
        $add_to_cart ->product_qty = 1;
        $add_to_cart ->product_price = $countProduct->price;
        $add_to_cart ->user_id = auth()->user()->id;
        $add_to_cart ->save();

        $this->productIncart->prepend($add_to_cart);

        $this->product_code = ' ';
        return session()->flash('success',"Product Added Successfully!");
        //dd($countProduct);
    }
    public function AddQty($cardId){
        $carts =  Cart::find($cardId);
        $carts->increment('product_qty', 1);
        $updatePrice = $carts->product_qty * $carts->product->price;
        $carts->update(['product_price' => $updatePrice]);
        $this->mount();

    }

    public function DecQty($cardId){
        $carts =  Cart::find($cardId);
        if($carts->product_qty == 1){
            return session()->flash('info', 'Product ' .$carts->product->product_name. ' quantity can not be less than 1 add quantity or remove product in cart.');
        }
        $carts->decrement('product_qty', 1);
        $updatePrice = $carts->product_qty * $carts->product->price;
        $carts->update(['product_price' => $updatePrice]);
        $this->mount();
    }


    public function  removeProduct($cardId)
    {
        $deleteCart = Cart::find($cardId);
        $deleteCart->delete();

        $this->message="Product Removed from the Cart";
        $this->productIncart = $this->productIncart->except($cardId);

    }
    public function render()
    {
        if($this->pay_money != ''){
            $totalAm = $this->pay_money - $this->productIncart->sum('product_price');
            $this->balance = $totalAm;
        }
        return view('livewire.order');
    }
}
