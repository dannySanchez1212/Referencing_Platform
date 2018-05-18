<?php

namespace App;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Mail;

use App\Mail\UserCreated;

class EmailTest extends TestCase
{

    use DatabaseMigrations;
    use DatabaseTransactions;

    /** @test */
    public function send_email_after_registration()
    {
        $this->withoutMiddleware();
        Mail::fake();

        $user = factory(\App\User::class)->create([
            'email' => 'your_email@mail.com',
            'name'  => 'jeff'
        ]);

        Mail::to($user)->send(new UserCreated($user));

        Mail::assertSent(UserCreated::class, function($mail) use ($user){

             return $mail->user->email === $user['email'];
              
        });
            
    }
}
