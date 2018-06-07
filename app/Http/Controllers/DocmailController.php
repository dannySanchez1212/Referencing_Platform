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

class DocmailController extends Controller
{

	 public function __construct()
    {
        // Only Authenticated Users can access
        $this->middleware('auth');
    }

    public function index(){

      $user=User::all();
      $email=Auth::user()->email;
      return View::make('Docmail.index',compact('user','email'));   
    }
	
    public function Docmail(Request $request){        
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
    }
}
