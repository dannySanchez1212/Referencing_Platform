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
use \SendGrid;
use RealRashid\SweetAlert\Facades\Alert;
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
      
       
            $account_sid = env('TWILIO_SID', 'smtp'); 

            $auth_token = env('TWILIO_TOKEN', 'smtp'); 
            
            $client = new Twilio\Rest\Client($account_sid, $auth_token); 
             
            $messages = $client->messages->create("+584126464956", array( 
                    'From' => env('TWILIO_NUMBER', 'smtp'),  
                    'Body' => $request->sms      
              ));

     Alert::success('Success', 'Message Sent Successfully')->autoClose(1800);
     return redirect::to('Twilio');
     }



  public function SelectUserSendSms(Request $request){

    $Select = $request->get('select');
    //print $Select;
    $value = $request->get('value');
   // print $value;
    $dependent = $request->get('dependent');
     //print $dependent;

                $user = User::find($value);
                       //   echo $user;

                        $phone=$user->country_code.' '.$user->phone_number;
                        $dependent='phone_number';
                        $output = '<option value="">Select '.ucfirst($dependent).'</option>';
                        
                        $output .= '<option value="'.$phone.'">'.$phone.'</option>';
                        
                        echo $output;
                    
               
  }
    




    public function sendSms(){
   	
    	
		//dd($twilio);    	
       $envio=Twilio::message('+5804126464956', 'Pink Elephants and Happy Rainbows');
       dd($envio);
    Alert::success('Success', 'Message Sent Successfully')->autoClose(1800);

     }


    public function prueba(){

    
    }

    public function requestSms(){}

    public function getConfirmPhone(){}

    public function postConfirmPhone(){

    }
}
