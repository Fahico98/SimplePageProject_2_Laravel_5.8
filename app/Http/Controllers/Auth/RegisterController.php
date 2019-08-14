<?php

namespace simplePageProject_2\Http\Controllers\Auth;

use simplePageProject_2\User;
use simplePageProject_2\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller{

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
   protected $redirectTo = '/home';

   /**
    * Create a new controller instance.
    *
    * @return void
    */
   public function __construct(){
      $this->middleware('guest');
   }

   /**
    * Get a validator for an incoming registration request.
    *
    * @param  array  $data
    * @return \Illuminate\Contracts\Validation\Validator
    */
   protected function validator(array $data){
      return Validator::make($data, [
         'name' => ['required', 'string', 'max:50'],
         "lastname" => ["required", "string", "max:50"],
         "age" => ["required", "numeric", "max:2"],
         "country" => ["required", "string", "max:100"],
         "city" => ["required", "string", "max:100"],
         "phone_number" => ["required", "string", "numeric", "unique:users"],
         'e_mail' => ['required', "email", 'max:50', 'unique:users'],
         'password' => ['required', 'string', 'min:8', 'confirmed']
      ]);
   }

   /**
    * Create a new user instance after a valid registration.
    *
    * @param  array  $data
    * @return \simplePageProject_2\User
    */
   protected function create(array $data){
      return User::create([
         'name' => $data['name'],
         "lastname" => $data["lastname"],
         "age" => $data["age"],
         "country" => $data["country"],
         "city" => $data["city"],
         "phone_number" => $data["phone_number"],
         "e_mail" => $data["e_mail"],
         "password" => Hash::make($data['password'])
      ]);
   }
}
