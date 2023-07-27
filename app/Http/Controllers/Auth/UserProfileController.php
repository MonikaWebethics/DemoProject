<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User, Country, State};

class UserProfileController extends Controller
{
    public function fatchStateUserProfile(Request $request){
        $data['states'] =State::where('country_id',$request->country_id)->get(['state','id']);
        return response()->json($data);
    
    }
    public function userProfile()
    {
        $user = auth()->user();
        
        if ($user->country_id) {
            $country = Country::findOrFail($user->country_id);
        } else {
            $country = null;
        }
        if ($user->state_id) {
            $state = State::findOrFail($user->state_id);
        } else {
            $state = null;
        }
        
        return view('user-profile.user-profile', compact('user', 'country','state'));
    }
}
