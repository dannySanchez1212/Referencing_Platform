<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleClient;
use App\Property;


class ReferenceController extends Controller
{
	    public function index(){

	    }

	    public function conecion(){

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
	        	//dd($properties);
		    return view('User.refresh',compact('properties',$properties));
	    }
}
