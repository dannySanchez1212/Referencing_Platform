<?php

namespace App\Listeners;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use DateTime;

class SuccessfulLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {

        
        DB::table('login_Records_user')->insert([
            'user_id'=>$event->user->id,
            'log_in'=> new DateTime()

        ]);

       // $event->user->last_login = new DateTime();
       // $event->user->save();
    }
}
