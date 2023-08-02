<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Country;
use App\Models\State;

class RegisterController extends Controller
{ 
    use RegistersUsers;

    /**
     * Show the registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm(): View
    {
        return view('auth.register')
            ->with('countries', Country::get());
    }

    public function fatchState(Request $request)
    {
        $data['states'] = State::where('country_id', $request->country_id)->get(['state', 'id']);
        return response()->json($data);
    }
    
    protected $redirectTo = '/email/verify';

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
            'password_confirmation' => ['required', 'string', 'min:6', 'same:password'],
            'country_id' => ['required', 'string'],
            'state_id' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'hobbies' => ['required', 'array'],
            'hobbies.*' => ['required', 'string'],
        ], [
            'fname.required' => 'The first name field is required.',
            'lname.required' => 'The last name field is required.',
            'country_id' => 'The country field is required.',
            'state_id' => 'The state field is required.',
        ]);
    }

    protected function create(array $data)
    {
        // Create the user
        $user = User::create([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'country_id' => $data['country_id'],
            'state_id' => $data['state_id'],
            'gender' => $data['gender'],
            'hobbies' => json_encode($data['hobbies']),
        ]);

        // event(new Registered($user));

        // Send the email verification notification
        // $user->sendEmailVerificationNotification();
        return $user;
    }
}
