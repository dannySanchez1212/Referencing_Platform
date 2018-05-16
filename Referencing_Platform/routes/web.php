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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/edit/{id}/edit','UserController@edit')->name('edit');
Route::post('/profile/edit');////terminar
/////////////////////////Twilio

Route::get('/profile/phone/send','TwilioController@requestSms');
Route::get('/profile/phone','TwilioController@getConfirmPhone');
Route::post('/profile/phone','TwilioController@postConfirmPhone');
Route::get('/SendSms','TwilioController@sendSms')->name('user.SendSms');


