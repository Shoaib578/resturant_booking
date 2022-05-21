<?php

namespace App\Http\Controllers\Admin;
use App\Models\Resturants;
use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
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
    
    $resturants = Resturants::get();
    
    $current_date = date('Y-m-d'); 
    $current_time = date('H:i');

    foreach($resturants as $resturant){
    
        if($current_date==$resturant->closing_date || $current_date>$resturant->closing_date){
            if($current_date<$resturant->opening_date && $current_time < $resturant->opening_time){
                Resturants::where("resturant_belong_to",auth()->user()->id)->update(array(
                    "is_closed"=>1
                ));
            }else{
                Resturants::where("resturant_belong_to",auth()->user()->id)->update(array(
                    "is_closed"=>0
                ));
            }
           }
       

    }
    $all_resturant_users = User::where("role",'=',"resturant")->get();
     $host = $request->getSchemeAndHttpHost();
     return view('Admin.index',["resturants"=>$resturants,"all_resturant_users"=>$all_resturant_users,"host"=>$host]);
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
            'resturant_name'=>'required|max:255',
            "image"=>'required',
            'address'=>'required|max:255',
            'opening_time'=>'required',
            'closing_time'=>'required',
            

        ]);

        $check_existance = Resturants::where("resturant_belong_to",$request->resturant_belong_to)->count();
       
        if($check_existance > 0){
            return redirect()->back()->with('status',"One Resturant has already been assigned to this user");
        }

        $image_name = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('/images'),$image_name);
        Resturants::create([
            "resturant_name"=>$request->resturant_name,
            "address"=>$request->address,
            "opening_time"=>$request->opening_time,
            "closing_time"=>$request->closing_time,
            "image"=>$image_name,
            "is_closed"=>0,
            "resturant_belong_to"=>$request->resturant_belong_to,

        ]);
        return redirect()->back()->with('status',"Resturant Has Been Added Successfully");
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
    
     $resturant = Resturants::where("resturant_id",$id)->first();
     $all_resturant_users = User::where("role",'=',"resturant")->get();
     $host = $request->getSchemeAndHttpHost();
     return view('Admin.edit_resturant',["resturant"=>$resturant,"all_resturant_users"=>$all_resturant_users,"host"=>$host]);
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
        if(auth()->user()&&auth()->user()->role == 'normal_user'){
            return redirect()->route('home');
        }else if(auth()->user()&&auth()->user()->role == 'resturant'){
            return redirect()->route('resturant_home');

        }

    




        $resturant = Resturants::where("resturant_id",$id)->get();
        if($request->image){
           
            if($resturant[0]->image != null){
             
                $path = public_path()."/images/".$resturant[0]->image;
                unlink($path);

                $image_name = time().'.'.$request->image->getClientOriginalExtension();
                $request->image->move(public_path('/images'),$image_name);
                Resturants::where('resturant_id', '=' , $resturant[0]->resturant_id)->update(array(
                    "image"=>$image_name,
                    "resturant_name"=>$request->resturant_name,
                    "address"=>$request->address,
                    "opening_time"=>$request->opening_time,
                    "closing_time"=>$request->closing_time,
                    "resturant_belong_to"=>$request->resturant_belong_to,
                    
                ));
                return redirect()->route('resturant_home')->with('status','Updated Successfully');
            }else{
                $image_name = time().'.'.$request->image->getClientOriginalExtension();
                $request->image->move(public_path('/images'),$image_name);
                Resturants::where('resturant_id', '=' , $resturant[0]->resturant_id)->update(array(
                    
                    'image'=>$image_name,
                    "resturant_name"=>$request->resturant_name,
                    "address"=>$request->address,
                    "opening_time"=>$request->opening_time,
                    "closing_time"=>$request->closing_time,
                    "resturant_belong_to"=>$request->resturant_belong_to,
                    
                ));
                return redirect()->route('resturant_home')->with('status','Updated Successfully');

            }

            }else{
                Resturants::where('resturant_id', '=' , $resturant[0]->resturant_id)->update(array(
                  
                    "resturant_name"=>$request->resturant_name,
                    "address"=>$request->address,
                    "opening_time"=>$request->opening_time,
                    "closing_time"=>$request->closing_time,
                   
                    "resturant_belong_to"=>$request->resturant_belong_to,
                    
                ));
                return redirect()->route('admin_home')->with('status','Updated Successfully');
            }


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
        $resturant = Resturants::where('resturant_id',$id)->first();
        $path = public_path()."/images/".$resturant->image;
        unlink($path);
        Resturants::where('resturant_id',$id)->delete();
        
        return redirect()->back()->with('status',"Resturant Has Been Deleted Successfully");
    }
}
