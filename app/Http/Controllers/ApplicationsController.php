<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleClient;
use App\Property;
use App\User;
use View;
use Session;
use Redirect;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use GuzzleHttp\Psr7\Res;

class ApplicationsController extends Controller
{
   

   public function Application_Update(){

      
       //DD('sssssssssssssss');
	 			$client = new GuzzleClient([
	        	'base_uri' => 'http://admin.noagent.co.uk/api/v1/applications',
	        	'http_errors' => false,
	        ]);

	 			$this->header=[
	 					'verify' => false,
	 					'allow_redirects'=> true,
	 					'headers'=>[
	 							'Accept'=>'applications/json',
	 							'Authorization'=>"Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJwcnAiOiJhcGkiLCJzYnQiOiJ1c2VyIiwic3ViIjoxMTA4LCJwZXIiOnsiYXBpLnByb3BlcnRpZXMuKiI6MSwiYXBpLmFwcGxpY2F0aW9ucy4qIjoxfSwiZXhwIjozMzA2NDM5MzI0MH0.dINvERJtEo6PY5h_ztrPILG6KHS7DUy2IDbKtKSHgW8"
	 					]

	 			];	

	 			$this->response=$this->httpClient->get('/api',$this->headers);

	        
           dd($this)

			//dd($user_data);
			//	    dd(json_encode($properties));
	       // $users=$properties;
	       // dd($users);

		    return view('User.refresh',compact('properties'));


   }


}
