<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable=[
    	'name',
    	'image',
    	'description',
    	'store',
    	'price',
    ];


    function getBookings(){
        $this->hasMany('App\Models\booking','product_id');
    }
}
