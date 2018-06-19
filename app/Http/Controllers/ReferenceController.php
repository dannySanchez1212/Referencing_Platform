<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleClient;
use App\Property;
use App\Applications;
use App\User;
use View;
use Session;
use Redirect;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use GuzzleHttp\Psr7\Res;


class ReferenceController extends Controller
{
	    public function __construct()
    {
        // Only Authenticated Users can access
        $this->middleware('auth');
    }

	   
	    public function index(){

	    }

	    public function Connection(){

	    		//Propertys
	 			$client = new GuzzleClient([
	        	'base_uri' => 'https://admin.noagent.co.uk/api/v1/',
	        	'http_errors' => false,
	        ]);

	        $campaignsPath = 'public/9MM6IUFV8QMQPAX1LX9Y7TVDSHAKHYDQ/properties';

	        try{
	        	$response = $client->get($campaignsPath);
	            $properties = json_decode($response->getBody()->getContents());
	        }catch (RequestException $e) {

	        } 

				         foreach ($properties->data as $key=> $property) {
			            $db_campaign = Property::UpdateOrcreate(
							['id'  => $property->id],
					        [
					          	"full_address" => $property->full_address,
								"address_lines" => $property->address_lines,
								"building_name" => $property->building_name,
								"address_1" => $property->address_1,
								"address_2" => $property->address_2,
								"city" => $property->city,
								"post_code" => $property->post_code,
								"country" => $property->county,
								"country_code" => $property->country_code,
								"available_from" => $property->available_from,
								"viewing_arrangement_information" => $property->viewing_arrangement_information,
								"state" => json_encode ($property->state),
								"type" => json_encode ($property->type),
								"viewing_via" => json_encode ($property->viewing_via),
								"landlord" => json_encode ($property->landlord)
					        ]
					     );
				    }  

			
	        $users=$properties;
	     
               //Applications

	 			$this->httpClient = new GuzzleClient([
	        	'base_uri' => 'http://admin.noagent.co.uk/api/v1/',
	        	'http_errors' => false
	        ]);

	 			$this->headers=[
		 				'verify' => false,
	                    'allow_redirects' => true,
	 					'headers'=>[
	 							'Authorization'=>'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJwcnAiOiJhcGkiLCJzYnQiOiJ1c2VyIiwic3ViIjoxMTA4LCJwZXIiOnsiYXBpLnByb3BlcnRpZXMuKiI6MSwiYXBpLmFwcGxpY2F0aW9ucy4qIjoxfSwiZXhwIjozMzA2NDM5MzI0MH0.dINvERJtEo6PY5h_ztrPILG6KHS7DUy2IDbKtKSHgW8'
	 					]
	 			];	

	 			$this->response=$this->httpClient->get('applications',$this->headers);
                $data=json_decode($this->response->getBody()->getContents());
	        
                	////////

                           foreach ($data as $key=> $applications) {
			                 $db_campaign = Applications::UpdateOrcreate(
										['id'  => $applications->id],
										[
								          "contact_by_email"=>$applications->contact_by_email, 
									        "contact_by_phone"=>$applications->contact_by_phone,
									        "prequal_link"=>$applications->prequal_link,
									        "source_id"=>$applications->source->id,
									        "source_display_name"=>$applications->source->display_name,
									        "source_key_name"=>$applications->source->key_name
								        ]
					     );
				    } 

                    ////////

           dd($this);
            dd( json_decode($this->response->getBody()->getContents()) );
			//dd($user_data);

		    return view('User.refresh',compact('properties'));
	    }


 public function update(Request $request){

	    		 
	    		$reference = Property::find($request->AddressSelect2);
	    		$state=json_decode($reference->state);
	    		 //dd($state);
	    		$client = new GuzzleClient([
	        	'base_uri' => 'https://admin.noagent.co.uk/api/v1/',
	        	'http_errors' => false,
			        ]);

	$campaignsPath = 'applications/states/?'.$state;

			        try{
			        	$response = $client->get($campaignsPath);
			            $conex = json_decode($response->getBody()->getContents());
			        }catch (RequestException $e) {

			        }

            	dd($conex);
				$promise = $client->sendAsync($conex);
				dd($promise);
	    		        dd($reference);




	    					if ($request) {
	    						# code...
	    					     //dd($reference);
	    	                     response()->json(
	    	                        Db::table('reference')->insert([
	    	                     	"id_reference" => $reference->id,
                                    "full_address" => $reference->full_address,
									"address_lines" => $reference->address_lines,
									"building_name" => $reference->building_name,
									"address_1" => $reference->address_1,
									"address_2" => $reference->address_2									                              
                                      ])
	    	                       );
	    	                     }

	    	             Alert::success('Success', 'Reference created')->autoClose(1800);
                         return View::make('home');       
                                              
	    }


	    


      

}
