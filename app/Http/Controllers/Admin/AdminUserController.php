<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(auth()->user()&&auth()->user()->role == 'normal_user'){
            return redirect()->route('home');
        }else if(auth()->user()&&auth()->user()->role == 'resturant'){
            return redirect()->route('resturant_home');

        }
        $users = User::get();
        $host = $request->getSchemeAndHttpHost();
        return view('Admin.users',["users"=>$users,"host"=>$host]);
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
        if(auth()->user()&&auth()->user()->role == 'normal_user'){
            return redirect()->route('home');
        }else if(auth()->user()&&auth()->user()->role == 'resturant'){
            return redirect()->route('resturant_home');

        }
        $this->validate($request,[
            'full_name'=>'required|max:255',
           
            'email'=>'required|email|max:255',
            'password'=>'required|max:255',
         
            'role'=>'required',

           

        ]);

        $user = user::where('email','=',$request->email)->count();
        if($user>0){
        

        return redirect()->route('admin_users')->with('status','User Already Exist');

        }
        User::create([
            "full_name"=>$request->full_name,
            "email"=>$request->email,
            "password"=>Hash::make($request->password),
            
            "role"=>$request->role

        ]);

       
        return redirect()->route('admin_users')->with('status','User Registered Successfully');
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
    public function edit($id,Request $request)
    {
        if(auth()->user()&&auth()->user()->role == 'normal_user'){
            return redirect()->route('home');
        }else if(auth()->user()&&auth()->user()->role == 'resturant'){
            return redirect()->route('resturant_home');

        }

        $user = user::find($id);
      
        $users = User::get();
        $host = $request->getSchemeAndHttpHost();
        return view('Admin.edit_user',["user"=>$user,"users"=>$users,"host"=>$host]);
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
        User::find($id)->update(array(
            "full_name"=>$request->full_name,
            "email"=>$request->email,
            "role"=>$request->role
        ));
        return redirect()->back()->with('status',"User Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(auth()->user()&&auth()->user()->role == 'normal_user'){
            return redirect()->route('home');
        }else if(auth()->user()&&auth()->user()->role == 'resturant'){
            return redirect()->route('resturant_home');

        }
        $user = user::where('id','=',$id);
        $user->delete();
        return redirect()->back()->with('status',"User Deleted");

    }
}
