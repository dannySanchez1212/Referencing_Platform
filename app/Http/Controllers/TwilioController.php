<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use App\User;
use View;
use Session;
use Redirect;
use Illuminate\Support\Facades\DB;
use Twilio;
class TwilioController extends Controller
{
     public function __construct()
    {
        // Only Authenticated Users can access
        $this->middleware('auth');
    }

    

    public function index(){

        $users = User::all();
        return View::make('Twilio/index', compact('users'));

    }

    public function send(Request $request){   			

        $accountId='AC1f1439c38896ad3d4c679d0ebc1766d9';
        $token='c6111d7dfdce534168f957f463b2e8ae';
		$fromNumber='+9412144935';
		$client = new Client($accountId, $token);

		
		$phone_number_send=$request['phone_number'];
		$country_code_send=$request['country_code'];
		$phone_number=$country_code_send.$phone_number_send;
		$sendSms=$request['sms'];

        $mensaje=$client->account->messages->create(array(
        	'From'=>'+19412144935',
        	'To'=>'+5215514328313',
        	'body' =>$sendSms
        ));

       // echo "resultado=".$mensaje->sid;   +19412144935

		//dd($phone_number);
		//$twilio->messages->create();
		//$envio=Twilio::message($phone_number,$sendSms);
       // dd($envio); 19412144935     



						        // Use the client to do fun stuff like send text messages!
					/*	$smsE=$client->messages->create(
						    // the number you'd like to send the message to
						    '+584126464956',
						    array(
						        // A Twilio phone number you purchased at twilio.com/console
						        'from' => '+584126464956',
						        // the body of the text message you'd like to send
						        'body' =>$sendSms
						    )
						); */  
						//dd($smsE);
     }



    




    public function sendSms(){
   	
    	
		//dd($twilio);    	
       $envio=Twilio::message('+5804126464956', 'Pink Elephants and Happy Rainbows');
       dd($envio);
     }

    public function requestSms(){}

    public function getConfirmPhone(){}

    public function postConfirmPhone(){

    }
}
