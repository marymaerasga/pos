<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'name',
        'address',
        'phone_number',
    ];

    public function orderdetail(){
        return $this->hasMany('App\Models\Order_Detail');
    }

    public function customer(){
        return $this->belongsTo('App\Models\Customer');
    }

}
