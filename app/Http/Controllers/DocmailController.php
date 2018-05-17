<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Docmail;
use Hpolthof\Docmail\DocmailService;
use App\User;
use View;
use Session;
use Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Facade;

class DocmailController extends Controller
{
    public function Docmail(Request $request){
        
 					dd($request);
 					
			    $documen=DocmailService::sendFile(storage_path('temp/test.pdf'), function(\Hpolthof\Docmail\DocmailService $docmail) {
			    // Name the mailing, defaults to the OrderRef.
			    $docmail->getMailing()->setMailingName('Test Mailing');
			    
			    // Change the filename.
			    $docmail->getTemplate()->setFileName('MyPrettyLetterFilename.pdf');
			    
			    // Add all the addresses you want.
			    $docmail->addBasicAddress('John Doe', 'Testersroad 3', '32444 Testersvalley');

			    // If you have a discountcode you can apply it.
			    $docmail->getMailing()->setDiscountCode('');
			})->get();
    }
}
