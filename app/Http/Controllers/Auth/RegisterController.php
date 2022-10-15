<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'UserName' => ['required', 'string'],
            'FirstName' => ['required', 'string'],
            'MiddleName' => ['required', 'string'],
            'LastName' => ['required', 'string'],
            'college' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:users', 'regex:/(.*)@su.edu.ph/i'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],['email.regex' => 'Email must be a silliman email']);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'UserName' => $data['UserName'],
            'FirstName' => $data['FirstName'],
            'MiddleName' => $data['MiddleName'],
            'LastName' => $data['LastName'],
            'usercheck' => $data['usercheck'],
            'college' => $data['college'],
            'OrganizationName' => $data['OrganizationName'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
