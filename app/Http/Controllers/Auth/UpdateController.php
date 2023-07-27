<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User, Country};

class UpdateController extends Controller
{
    public function editUser(){
        $user = auth()->user();
        return view('user-profile.edit-user', compact('user'))
        ->with('countries',Country::get());;
      }
    public function updateProfile(Request $request)
    {
        // Validate the form data
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female',
            'country_id' => 'required|string|max:255',
            'hobbies' => 'required|array',
        ], [
            'fname.required' => 'The first name field is required.',
            'lname.required' => 'The last name field is required.',
        ]);

        $user = auth()->user();
        if ($request->input('country_id') != $user->country_id) {
            $request->validate([
                'state_id' => 'required|string|max:255',
            ], [
                'state_id.required' => 'The state field is required.',
            ]);
        }
    
        $stateId = $request->filled('state_id') ? $request->input('state_id') : $user->state_id;
        // Update user information
        $user = auth()->user();
        $user->update([
            'fname' => $request->input('fname'),
            'lname' => $request->input('lname'),
            'gender' => $request->input('gender'),
            'country_id' => $request->input('country_id'),
            'state_id' => $stateId, 
            'hobbies' => json_encode($request->input('hobbies')),
        ]);

        // Redirect back with a success message
        return redirect()->route('userProfile')->with('success', 'Profile updated successfully.');
    }
}
