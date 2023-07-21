<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function viewHome(){
     return view('pages.index');
    }  
      public function viewAbout(){
        return view('pages.about-us');
      }
}
