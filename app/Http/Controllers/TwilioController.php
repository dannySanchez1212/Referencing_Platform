<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio;
class TwilioController extends Controller
{
    //


    public function sendSms(){

    	
    	$accountId='AC1f1439c38896ad3d4c679d0ebc1766d9';
        $token='c6111d7dfdce534168f957f463b2e8ae';
		$fromNumber='+19412144935';
		$twilio = new Twilio($accountId, $token, $fromNumber);
		//dd($twilio);    	
       $envio=Twilio::message('+5804126464956', 'Pink Elephants and Happy Rainbows');
       dd($envio);
     }

    public function requestSms(){}

    public function getConfirmPhone(){}

    public function postConfirmPhone(){

    }
}
