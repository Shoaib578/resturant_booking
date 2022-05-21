<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Resturants;

class SignInController extends Controller
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
                "address"=>"norway"
            ]);
        }

       $resturants = Resturants::get();
       return view('Auth.signin',["resturants"=>$resturants]);
    }



    public function signin(Request $request){
        
        $this->validate($request,[
            'email'=>'required|max:255',
           
           
            'password'=>'required|max:255',
           

        ]);

        if (!auth()->attempt($request->only('email', 'password'))) {
            return back()->with('status', 'Invalid login details');
        }


        

        if(auth()->user()->role == 'normal_user'){
            return redirect()->route('home');

        }else if(auth()->user()->role == 'admin'){
            return redirect()->route('admin_home');

        }else if(auth()->user()->role == 'resturant'){
            return redirect()->route('resturant_home');

        }else{
            return back()->with('status', 'Something Went Wrong');

        }
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
        //
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
