<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    use HasFactory;

    protected $fillable=[        
        'Cust_name',
        'Cust_phone',
        'Cust_email',
        'Cust_address',
        'product_id',
        'product_count',
    ];
}
