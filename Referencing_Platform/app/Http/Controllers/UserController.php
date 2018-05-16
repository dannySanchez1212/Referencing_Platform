<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //

/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return View::make('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        $companys = DB::table('owners')->pluck('company');
        $companys_users = DB::table('owner_users')->pluck('name');
        $packages = DB::table('packages')->pluck('name');
        $users_types = DB::table('user_types')->pluck('value');
        $locations = DB::table('locations')->pluck('name');

        return View::make('user.save',compact('user','companys','companys_users','packages','users_types','locations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $owner_id = DB::table('owners')->whereCompany($request['owner_id'])->value('id');
        $owner_user_id = DB::table('owner_users')->whereName($request['owner_user_id'])->value('id');
        $package_id = DB::table('packages')->whereName($request['package_id']) ->value('id');
        $user_type_id = DB::table('user_types')->whereValue($request['user_type_id']) ->value('id');
        $location_id = DB::table('locations')->whereName($request['location_id']) ->value('id');

        User::create([
            'owner_id'=>$owner_id, 
            'owner_user_id'=>$owner_user_id,  
            'package_id'=>$package_id,  
            'user_type_id'=>$user_type_id, 
            'name'=>$request['name'], 
            'email'=>$request['email'], 
            'password'=>$request['password'], 
            'location_id'=>$location_id, 
            'map'=>$request['map'], 
            'activation_date'=>$request['activation_date'], 
            'status'=>$request['status'], 
        ]);

        Alert::success('Success', 'User created correctly');
        return redirect::to('user/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

        return View::make('user.edit', compact('name','email','phone_number','country_code'));
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
        $owner_id = DB::table('owners')->whereCompany($request['owner_id'])->value('id');
        $owner_user_id = DB::table('owner_users')->whereName($request['owner_user_id'])->value('id');
        $package_id = DB::table('packages')->whereName($request['package_id'])->value('id');
        $user_type_id = DB::table('user_types')->whereValue($request['user_type_id'])->value('id');
        $location_id = DB::table('locations')->whereName($request['location_id'])->value('id');


        $user = User::find($id);
        $user->fill([
            'owner_id'=>$owner_id, 
            'owner_user_id'=>$owner_user_id,  
            'package_id'=>$package_id,  
            'user_type_id'=>$user_type_id, 
            'name'=>$request['name'], 
            'email'=>$request['email'], 
            'password'=>$request['password'], 
            'location_id'=>$location_id, 
            'map'=>$request['map'], 
            'activation_date'=>$request['activation_date'], 
            'status'=>$request['status'], 
        ]); 
        $user->save();

        Alert::success('Success', 'User updated correctly');
        return redirect::to('user/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if($request->ajax()){
                $id=$request->post('id');
              // $id=$request->get('id');

                 if($id=='null'){
                    Alert::warning('Warning', 'Error User Data');
                    return redirect::to('user/index');
                 }else{

                       $_token=$request->get('_token');
                      
                        //dd($id);
                       // $token=$request->get('_token');
                        //dd($id);
                        $valor=User::find($id)->delete();
                        //dd($package);
                        //=$package->delete();
                        //dd($valor);
                        
                        Alert::success('Success', 'User Delete correctly')->autoClose(1800);
                        return redirect()->route('user.index');
                        }

                 }

         /*$Select = $request->get('id');
            dd($Select);
        Alert::warning('Are you sure?', 'User Successfully Removed')
        ->footer('<a href> is sure to delete ? </a>')
        ->showConfirmButton('Yes, Delete it!','#3085d6')
        ->showCancelButton('No, Keep it !','#aaa')
        ->showCloseButton(); 

        //$user = User::find($id);
        //$user->delete();

        //Alert::success('Success', ' successfully removed');
        return redirect::to('user/index');*/
    }

}
