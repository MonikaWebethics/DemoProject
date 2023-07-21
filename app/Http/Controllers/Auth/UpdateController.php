<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function editUser(){
        $user = auth()->user();
        return view('user-profile.edit-user', compact('user'));
      }
    public function updateProfile(Request $request)
    {
        // Validate the form data
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female',
            'country' => 'required|string|max:255',
            'hobbies' => 'required|array',
        ], [
            'fname.required' => 'The first name field is required.',
            'lname.required' => 'The last name field is required.',
        ]);
   

        // Update user information
        $user = auth()->user();
        $user->update([
            'fname' => $request->input('fname'),
            'lname' => $request->input('lname'),
            'gender' => $request->input('gender'),
            'country' => $request->input('country'),
            'hobbies' => json_encode($request->input('hobbies')),
        ]);

        // Redirect back with a success message
        return redirect()->route('userProfile')->with('success', 'Profile updated successfully.');
    }
}
