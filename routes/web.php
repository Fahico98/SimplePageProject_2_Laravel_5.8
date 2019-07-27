<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
   /*
   $user = Auth::user();
   if($user->isAdmin()){
      //
   }else{
      //
   }
   */
   return view('welcome');
});

/**
 * Auth::routes() will create the followiing routes.
 *
 * Authentication Routes...
 * $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
 * $this->post('login', 'Auth\LoginController@login');
 * $this->post('logout', 'Auth\LoginController@logout')->name('logout');
 *
 * Registration Routes...
 * $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
 * $this->post('register', 'Auth\RegisterController@register');
 *
 * Password Reset Routes...
 * $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
 * $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
 * $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
 * $this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
 *
 * To create the Email Verification Routes you must use "Auth::routes(['verify' => true]);".
 * $this->get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
 * $this->get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
 * $this->get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
 */
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');