<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{  
  public function signup(){
    return view('auth.register');
  }
  public function login(){
    return view('auth.login');
  }
  public function forgetPassword(){
    return view('auth.forget-password');
  }
}
