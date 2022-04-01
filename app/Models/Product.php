<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'product_name',
        'image',
        'description',
        'size',
        'price',
        'quantity',
        'category',
        'alert_stock',
        'installment',
        'gives',
    ];

    public function orderdetail(){
        return $this->hasMany('App\Models\Order_Detail');
    }
    public function cart(){
        return $this->hasMany('App\Models\Cart');
    }
}
