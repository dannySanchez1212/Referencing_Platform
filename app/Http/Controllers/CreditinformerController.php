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

   public function index(){

   	 $users=User::all();
      $email=Auth::user()->email;
      return View::make('Creditinformer.index',compact('users','email')); 
   }


}
