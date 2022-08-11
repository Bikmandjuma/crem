<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class webAdminController extends Controller
{
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('auth.home');
    }

    //create or store the product
    function addSliders(Request $request){
            
    }

    function formslider(){
    }
}
