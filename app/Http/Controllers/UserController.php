<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use View;
use Session;
use Redirect;
use Illuminate\Support\Facades\DB;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

//use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    //

/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function logueado(){

       // $user = User::all();
        $user = DB::table('fecha_user')->get();
       // dd($user);
        //dd($user[1]->user_id);
        foreach ($user as $key => $value) {
           $user[$key]->user_id=DB::table('users')->whereId($value->user_id)->value('name');
           $user[$key]->created_at=DB::table('users')->whereName($value->user_id)->value('email'); 
        }
          
        
        //dd($user);
       // dd($email);
        return View::make('User.logueado',compact('user','email'));

    }
    public function index()
    {
        $user = User::all();
        return View::make('User.index',compact('user'));
    }

     public function create(){

             return View::make('User.register');
     } 

    public function registroN(Request $request)
    {   
       // dd($request);
        $user=Auth::user(); 
        
        if (Auth::check()) {

                    //dd($user->name);

                                if ($user->name=='Admin') {
                                   
                                $prueba= User::create([
                                    'name' => $request['name'],
                                    'email' => $request['email'],
                                    'password' => bcrypt($request['password']),
                                    'phone_number' => $request['phone_number'],
                                    'country_code' => $request['country_code'],
                                      ]);

                                      //dd('aaaaaaaaaa'+$prueba);
                                        Alert::success('Success', 'User created correctly')->autoClose(1800);
                                        $user = User::all();
                                       return View::make('user/index',compact('user'));
                                  } else {
                                        Alert::success('Error', 'without permission to create other users')->autoClose(1800);
                                        $user = User::all();
                                       return View::make('user/index',compact('user'));
                                   }    
                              

            # code...
        } else {

            return User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password'],
            'phone_number' => $request['phone_number'],
            'country_code' => $request['country_code'],            
        ]);
            Alert::success('Success', 'User created correctly')->autoClose(1800);                    
            return redirect::to('home');

        }
        
       // dd($user->name);
       
       // 
    }
    public function show()
    {
        //Alert::success('Success', 'User updated correctly')->autoClose(1800);
        return View::make('home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {       
        $user = User::find($id);

        $name = DB::table('users')->pluck('name');
        $email = DB::table('users')->pluck('email');
        $phone_number = DB::table('users')->pluck('phone_number');
        $country_code = DB::table('users')->pluck('country_code');

        return View::make('User/edit', compact('name','email','phone_number','country_code','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	
        $user = User::find($id);
        $user->fill([            
            'name'=>$request['name'], 
            'email'=>$request['email'], 
            'country_code'=>$request['country_code'], 
            'phone_number'=>$request['phone_number'],            
        ]); 
        $user->save(); 

        $user=User::all();
       Alert::success('Success', 'User updated correctly')->autoClose(1800);
       return View::make('User.index',compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Alert::warning('Warning', 'destroyyyy')->autoClose(1800);
       
        if($request->ajax()){
                $id=$request->post('id');
              // $id=$request->get('id');
            Alert::warning('Warning', 'primer   iffffffffffffff')->autoClose(1800);
                 if($id=='null'){
                    Alert::warning('Warning', 'iffffffffffffff')->autoClose(1800);
                    return redirect::to('user/index');

                 }else{

                        Alert::success('Success', 'elseeeeeeeeeeeeeeeeeeee')->autoClose(1800);
                       $_token=$request->get('_token');                      
                        $valor=User::find($id)->delete();  

                       // Alert::success('Success', 'User Delete correctly')->autoClose(1800);
                        return redirect()->route('user.index');
                        }

                 }
         
    }

}
