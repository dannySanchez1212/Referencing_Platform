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

//////User

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/index','UserController@index')->name('user.index');
Route::get('/edit/{id}/edit','UserController@edit')->name('edit');
Route::post('user/{id}','UserController@update')->name('user.update');
Route::post('/destroyU','UserController@destroy');
Route::get('/user/logueado','UserController@logueado')->name('user.logueado');
Route::get('/user/register/new','UserController@create')->name('Register.neW');
Route::post('/User/register','UserController@new_record')->name('User.Resgistro');
Route::get('/create','UserController@create');
Route::get('/prueba','UserController@show');
Route::get('user/{id}/destroy',[
	'uses'=>'UserController@destroy',
	'as'  =>'user.destroy'
]);



/////////////////////////Twilio
Route::get('/Twilio','TwilioController@index')->name('Twilio.Sms');
Route::post('/Twilio/Send','TwilioController@send')->name('Twilio.send');
Route::get('/profile/phone/send','TwilioController@requestSms');
Route::get('/profile/phone','TwilioController@getConfirmPhone');
Route::post('/profile/phone','TwilioController@postConfirmPhone');
Route::get('/SendSms','TwilioController@sendSms')->name('user.SendSms');
Route::post('/Twilio/Select','TwilioController@SelectUserSendSms');
Route::get('/Twilio/Select/{id}','TwilioController@SelectUserSendSms');

Route::get('/prueba','TwilioController@prueba');


///////////docmail

Route::get('/Docmail','DocmailController@index')->name('Docmail.index');

Route::post('/Docmail/send','Send_DocmailController@__construct')->name('Docmail.send');
//Route::post('/Docmail/send','DocmailController@Docmail')->name('Docmail.send');

Route::post('/Docmail/Select','DocmailController@SelectUserSendEmail');
Route::get('/Docmail/Select/{id}','DocmailController@SelectUserSendEmail');

Route::get('files/{archivo}', function ($archivo) {
     $public_path = public_path();
     $url = $public_path.'/files/'.$archivo;
     //verificamos si el archivo existe y lo retornamos
     if (Storage::exists($archivo))
     {
       return response()->download($url);
     }
     //si no se encuentra lanzamos un error 404.
     abort(404);
 
});

//////reference 

Route::get('/reference','ReferenceController@Connection')->name('User.Reference');
Route::post('/reference/update','ReferenceController@update')->name('Reference.update');

//////Postmark
Route::get('/Postmark','PostmarkController@index')->name('Postmark');
Route::post('/Postmark/Send','PostmarkController@sendEmail')->name('Postmark.SendEmail');

//////Creditinformer
Route::get('/Creditinformer/Document','CreditinformerController@Document')->name('Creditinformer.Document');
Route::get('/Creditinformer/Credit','CreditinformerController@Credit')->name('Creditinformer.Credit');