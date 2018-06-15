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

	    		//DD('sssssssssssssss');
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

			//dd($user_data);
				    dd(json_encode($properties));
	        $users=$properties;
	       // dd($users);

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


	    public function Crate_reference(Request $request){

	    	

				// Create a PSR-7 request object to send
				$headers = ['Authorization' => 'Bearer wphlVsCz1MMqkhqhAYYrVliOp3ZcpayX'];
				//$body = 'Hello!';
				$request = new Request('HEAD', 'http://admin.noagent.co.uk/api/v1/applications/states/{state}', $headers);
				$promise = $client->sendAsync($request);
				dd($promise);
	    }




}
