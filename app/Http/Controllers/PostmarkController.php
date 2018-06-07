<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use View;
use Session;
use Redirect;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;
use Auth;
///////require_once('./vendor/autoload.php');
use Postmark\PostmarkClient;

class PostmarkController extends Controller
{
     public function __construct()
    {
        // Only Authenticated Users can access
        $this->middleware('auth');
    }

    public function index()
    {
      $user=User::all();
      $email=Auth::user()->email;
      return View::make('Postmark.index',compact('user','email'));   
    }

    public function sendEmail(Request $request){

           ///Data From Email 
            $name_fromEmail=User::whereId($request->from_email)->value('name');
            $email_fromEmail=User::whereid($request->from_email)->value('email');

          /* $postmarkApiKey = '3dae9fdb-db75-45ed-89e6-d604e53d6189';
            $email=Auth::user()->email;
            $name_send=Auth::user()->name;
            $subject=$request->subject;
            $Email_text=$request->Email_text;*/

            $client = new PostmarkClient("3dae9fdb-db75-45ed-89e6-d604e53d6189");
          // dd($client);
                // Send an email:
                $sendResult = $client->sendEmail(
                  "novedades.ecos@gonzalezlovera.com",
                  "novedades.tachira@gonzalezlovera.com",
                  "Hello from Postmark!",
                  "This is just a friendly 'hello' from your friends at Postmark."
                );
         	dd($sendResult);
            /*    
                    Postmark\Mail::compose($postmarkApiKey)
                    ->from($name_fromEmai,$email_fromEmail)
                    ->addTo($email,$name_send)
                    ->subject($subject)
                    ->messagePlain($Email_text)
                    ->send();
            */                
           
    }

}
