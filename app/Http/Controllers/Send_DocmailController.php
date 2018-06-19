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


class Send_DocmailController extends Controller
{

   public function Send_DocmailController(Request $request)
    {
        self::__construct($request);
    }



   public function __construct(Request $request)
    {
        //  solution only for connection with php <4.3
       

       	//dd($request);

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
			return redirect::to('Docmail');
    }
}


?>
