<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
    public function userProfile(){
        return view('user-profile.user-profile');
      }
}
