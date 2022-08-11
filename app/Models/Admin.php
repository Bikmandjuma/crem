<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $table = 'admins';
    protected $guarded = array();

    protected $fillable=[
    	'fullname',
    	'email',
    	'password',
    ];

    function getAdmindata(){
    	return $this->belongsTo(Category::class,'type');
    }
}
