<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    
    public function auth(Request $f){
        $username=$f->input("txtUsername");
        $password=$f->input("txtPassword");  

        // echo $password;
        
        return Redirect::route('home');
     }


}
