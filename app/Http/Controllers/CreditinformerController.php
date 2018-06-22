<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

class CreditinformerController extends Controller
{
     public function __construct()
    {
        // Only Authenticated Users can access
        $this->middleware('auth');
    }

   public function Document(){

   	 $users=User::all();
      $email=Auth::user()->email;
      return View::make('Creditinformer.Document',compact('users','email')); 
   }

   public function Credit(){
    $users=User::all();
      $email=Auth::user()->email;
      return View::make('Creditinformer.Credit',compact('users','email')); 
   }
}
