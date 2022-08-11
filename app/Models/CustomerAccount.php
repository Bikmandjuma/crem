<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class CustomerAccount extends Authenticatable
{
	protected $table = 'customer_accounts';
    protected $guarded = array();

    use HasFactory;
    protected $fillable=[
    	'name',
    	'email',
    	'password',
    ];
}
