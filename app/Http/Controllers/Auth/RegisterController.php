<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/login'; // Update the redirect path after registration
    
    public function __construct()
    {
        $this->middleware('guest')->except('destroy');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
            'password_confirmation' => ['required', 'string', 'min:6', 'same:password'],
            'country' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'hobbies' => ['required', 'array'],
            'hobbies.*' => ['required', 'string'],
        ], [
            'fname.required' => 'The first name field is required.',
            'lname.required' => 'The last name field is required.',
        ]);
    }
    

    protected function create(array $data)
    {
        return User::create([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'country' => $data['country'],
            'gender' => $data['gender'],
            'hobbies' => json_encode($data['hobbies']),
        ]);
    }
    protected function registered(Request $request, $user)
{
    $this->guard()->logout();

    return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
}

}
