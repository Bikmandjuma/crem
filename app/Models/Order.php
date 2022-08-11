<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
     protected $fillable=[        
        'customer_id',
        'product_id',
        'product_counts',
        'amount',
        'payment_checkout',
    ];

    public function getCustomerid(){
    	$this->hasMany('App\Models\CustomerAccount','customer_id');
    }

    public function getProductid(){
    	$this->hasMany('App\Models\product','product_id');
    }
}
