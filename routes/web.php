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
Route::get('/user/index','UserController@index')->name('user.index');
Route::get('/edit/{id}/edit','UserController@edit')->name('edit');

Route::post('user/{id}','UserController@update')->name('user.update');

Route::get('user/{id}/destroy',[
	'uses'=>'UserController@destroy',
	'as'  =>'user.destroy'
]);

Route::post('/destroyU','UserController@destroy');
Route::get('/user/logueado','UserController@logueado')->name('user.logueado');

Route::get('/user/register/new','UserController@create')->name('Register.neW');

Route::post('/User/register','UserController@new_record')->name('User.Resgistro');

////Route::post('/profile/edit');////terminar
/////////////////////////Twilio
Route::get('/Twilio/Sms','TwilioController@index')->name('Twilio.Sms');
Route::post('/Twilio/Send','TwilioController@send')->name('Twilio.send');


Route::get('/profile/phone/send','TwilioController@requestSms');
Route::get('/profile/phone','TwilioController@getConfirmPhone');
Route::post('/profile/phone','TwilioController@postConfirmPhone');
Route::get('/SendSms','TwilioController@sendSms')->name('user.SendSms');

Route::get('/create','UserController@create');
Route::get('/prueba','UserController@show');
///////////docmail

Route::get('/docmail','DocmailController@Docmail')->name('user.docmail');

//////reference 

Route::get('/reference','ReferenceController@Connection')->name('User.Reference');
Route::post('/reference/update','ReferenceController@update')->name('Reference.update');

