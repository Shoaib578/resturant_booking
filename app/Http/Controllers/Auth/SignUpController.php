<?php

namespace App\Http\Controllers\Auth;
use App\Models\Resturants;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class SignUpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = User::where('role','=','admin')->count();
        if($admin>0){
            Log::info('This is some useful information.');
        }else{
            User::create([
                "full_name"=>"admin",
                "email"=>"theadmin26@gmail.com",
                "password"=>Hash::make('Games5879'),
                "role"=>'admin',
              

            ]);
        }
        $resturants = Resturants::get();
       return view('Auth.signup',["resturants"=>$resturants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'full_name'=>'required|max:255',
           
            'email'=>'required|email|max:255',
            'password'=>'required|max:255',
            
           

        ]);

        $user = user::where('email','=',$request->email)->count();
        if($user>0){
        

        return redirect()->back()->with('status','User Already Exist');

        }
        User::create([
            "full_name"=>$request->full_name,
            "email"=>$request->email,
            "password"=>Hash::make($request->password),
            
            "role"=>'normal_user'

        ]);

        
        return redirect()->route('signin')->with('status','User Registered Successfully');

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
