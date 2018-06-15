<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Docmail;
use Hpolthof\Docmail\DocmailService;
use App\User;
use View;
use Session;
use Redirect;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Facade;
use RealRashid\SweetAlert\Facades\Alert;
use nusoap_client;
use SoapClient;
use Zend;
class DocmailController extends Controller
{
   
	 public function __construct()
    {
        // Only Authenticated Users can access
        $this->middleware('auth');
    }

    public function index(){

      $users=User::all();
      $email=Auth::user()->email;
      return View::make('Docmail.index',compact('users','email'));   
    }
	
    public function Docmail(Request $request){        
 					//dd($request->user);

    					$user=Auth::user();
    					//dd($user);
    	             $file = $request->file('archivo'); 
    	             $mailing='test';					
        		//	dd($file);
    	foreach ($file as $value) {
    		# code...
    	    // c
	 					// $file = $request->file('archivo[]'); 					
	        			//dd($file);
	    		       // echo"/----value =".$value;
	                    $name_route= $value->getClientOriginalName();
	                    //echo"/----nom   =".$nombre;
	                    \Storage::disk('local')->put($name_route,  \File::get($value));
	                    $route_docmail='files\\'.$name_route;
	                    

	                  //dd(public_path($route_docmail));
                       $docmail = new DocmailService;
	                   $resul=DocmailService::sendFile(public_path($route_docmail), function( $docmail) {
								    // Name the mailing, defaults to the OrderRef.
								    $docmail->getMailing()->setMailingName($mailing);
								    
								    // Change the filename.
								    $docmail->getTemplate()->setFileName($name_route);
								    
								    // Add all the addresses you want.
								     $docmail->addBasicAddress('John Doe', 'Testersroad 3', '32444 Testersvalley');

								    // If you have a discountcode you can apply it.
								    $docmail->getMailing()->setDiscountCode('');
				      })->getAll();
	                   
            }
    
			return Alert::success('Success', 'File Saved Correctly')->autoClose(1800);
    }

    public function send_docmail(Request $request){
           dd($request);
    		 //require_once __DIR__ . '/vendor/autoload.php';
         
          $client = new Zend\Soap\Client(config('docmail.connection.wsdl'), true);
        dd($client);
       /*   $result = $client->sayHello(['firstName' => 'World']);

          echo $result->sayHelloResult;



           $this->client = new \nusoap_client(config('docmail.connection.wsdl'), true);
        $this->client->timeout = config('docmail.connection.timeout');

        $this->addresses = new Collection();
        $this->setMailing(new DocmailMailing());

        $this->submitAfterSend = config('docmail.submit_after_send', false);
        $this->paymentMethod = config('docmail.paymentmethod', 'Invoice');
    }*/
    }

     public function SelectUserSendEmail(Request $request){

    $Select = $request->get('select');
    //print $Select;
    $value = $request->get('value');
   // print $value;
    $dependent = $request->get('dependent');
     //print $dependent;

                $user = User::find($value);
                       //   echo $user;

                        //$phone=$user->country_code.' '.$user->phone_number;
                        $dependent='Email';
                        $output = '<option value="">Select '.ucfirst($dependent).'</option>';
                        
                        $output .= '<option value="'.$user->email.'">'.$user->email.'</option>';
                        
                        echo $output;
                    
               
  }
}
