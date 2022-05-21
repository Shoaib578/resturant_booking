<?php

namespace App\Http\Controllers\Resturant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Orders;
use App\Models\Resturants;
use App\Models\resturant_week_schedule;

use Illuminate\Support\Facades\File; 
use Carbon\Carbon;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class ResturantHomeContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    function week_schedule(){
        $resturants = Resturants::get();
       
        $current_date_day = date('d/m/Y');
        $current_time = date('H:i');
        $day = Carbon::createFromFormat('d/m/Y', $current_date_day)->format('l');
        foreach($resturants as $resturant){
        


        $week_schedule = resturant_week_schedule::where("resturant_id",$resturant->resturant_id)->first();
        if($week_schedule != null){
           
            if($day == 'Monday' && $week_schedule->monday == 0){
                Resturants::where("resturant_id",$resturant->resturant_id)->update(array(
                    "is_closed"=>1
                ));
                if($current_time<$week_schedule->monday_closing_time || $current_time>=$week_schedule->monday_opening_time){
                    Resturants::where("resturant_id",$resturant->resturant_id)->update(array(
                        "is_closed"=>0
                    ));
                }else{
                    Resturants::where("resturant_id",$resturant->resturant_id)->update(array(
                        "is_closed"=>1
                    ));
                }
            }else if($day == 'Monday' && $week_schedule->monday == 1){
                Resturants::where("resturant_id",$resturant->resturant_id)->update(array(
                    "is_closed"=>0
                ));
                if($current_time<$week_schedule->monday_closing_time || $current_time>=$week_schedule->monday_opening_time){
                    Resturants::where("resturant_id",$resturant->resturant_id)->update(array(
                        "is_closed"=>0
                    ));
                }else{
                    Resturants::where("resturant_id",$resturant->resturant_id)->update(array(
                        "is_closed"=>1
                    ));
                }
        
            }
    
    
            if($day == 'Tuesday' && $week_schedule->tuesday == 0){
                Resturants::where("resturant_id",$resturant->resturant_id)->update(array(
                    "is_closed"=>1
                ));
                if($current_time<$week_schedule->tuesday_closing_time || $current_time>=$week_schedule->tuesday_opening_time){
                    Resturants::where("resturant_id",$resturant->resturant_id)->update(array(
                        "is_closed"=>0
                    ));
                }else{
                    Resturants::where("resturant_id",$resturant->resturant_id)->update(array(
                        "is_closed"=>1
                    ));
                }
            }else if($day == 'Tuesday' && $week_schedule->tuesday == 1){
                Resturants::where("resturant_id",$resturant->resturant_id)->update(array(
                    "is_closed"=>0
                ));
                if($current_time<$week_schedule->tuesday_closing_time || $current_time>=$week_schedule->tuesday_opening_time){
                    Resturants::where("resturant_id",$resturant->resturant_id)->update(array(
                        "is_closed"=>0
                    ));
                }else{
                    Resturants::where("resturant_id",$resturant->resturant_id)->update(array(
                        "is_closed"=>1
                    ));
                }
                
            }
    
            if($day == 'Wednesday' && $week_schedule->wednesday == 0){
                Resturants::where("resturant_id",$resturant->resturant_id)->update(array(
                    "is_closed"=>1
                ));
                if($current_time<$week_schedule->wednesday_closing_time || $current_time>=$week_schedule->wednesday_opening_time){
                    Resturants::where("resturant_id",$resturant->resturant_id)->update(array(
                        "is_closed"=>0
                    ));
                }else{
                    Resturants::where("resturant_id",$resturant->resturant_id)->update(array(
                        "is_closed"=>1
                    ));
                }
            }else if($day == 'Wednesday' && $week_schedule->wednesday == 1){
                Resturants::where("resturant_id",$resturant->resturant_id)->update(array(
                    "is_closed"=>0
                ));
                if($current_time<$week_schedule->wednesday_closing_time || $current_time>=$week_schedule->wednesday_opening_time){
                    Resturants::where("resturant_id",$resturant->resturant_id)->update(array(
                        "is_closed"=>0
                    ));
                }else{
                    Resturants::where("resturant_id",$resturant->resturant_id)->update(array(
                        "is_closed"=>1
                    ));
                }
              
            }
    
    
            if($day == 'Thursday' && $week_schedule->thursday == 0){
                Resturants::where("resturant_belong_to",$resturant->resturant_id)->update(array(
                    "is_closed"=>1
                ));
                if($current_time<$week_schedule->thursday_closing_time || $current_time>=$week_schedule->thursday_opening_time){
                    Resturants::where("resturant_id",$resturant->resturant_id)->update(array(
                        "is_closed"=>0
                    ));
                }else{
                    Resturants::where("resturant_id",$resturant->resturant_id)->update(array(
                        "is_closed"=>1
                    ));
                }
            }else if($day == 'Thursday' && $week_schedule->thursday == 1){
                Resturants::where("resturant_id",$resturant->resturant_id)->update(array(
                    "is_closed"=>0
                ));
                if($current_time<$week_schedule->thursday_closing_time || $current_time>=$week_schedule->thursday_opening_time){
                    Resturants::where("resturant_id",$resturant->resturant_id)->update(array(
                        "is_closed"=>0
                    ));
                }else{
                    Resturants::where("resturant_id",$resturant->resturant_id)->update(array(
                        "is_closed"=>1
                    ));
                }
              
            }
    
    
            if($day == 'Friday' && $week_schedule->friday == 0){
                Resturants::where("resturant_id",$resturant->resturant_id)->update(array(
                    "is_closed"=>1
                ));
                if($current_time<$week_schedule->friday_closing_time || $current_time>=$week_schedule->friday_opening_time){
                    Resturants::where("resturant_id",$resturant->resturant_id)->update(array(
                        "is_closed"=>0
                    ));
                }else{
                    Resturants::where("resturant_id",$resturant->resturant_id)->update(array(
                        "is_closed"=>1
                    ));
                }
            }else if($day == 'Friday' && $week_schedule->friday == 1){
                Resturants::where("resturant_id",$resturant->resturant_id)->update(array(
                    "is_closed"=>0
                ));

                if($current_time<$week_schedule->friday_closing_time || $current_time>=$week_schedule->friday_opening_time){
                    Resturants::where("resturant_id",$resturant->resturant_id)->update(array(
                        "is_closed"=>0
                    ));
                }else{
                    Resturants::where("resturant_id",$resturant->resturant_id)->update(array(
                        "is_closed"=>1
                    ));
                }
                
            }
    
    
    
    
            if($day == 'Saturday' && $week_schedule->saturday == 0){
                Resturants::where("resturant_id",$resturant->resturant_id)->update(array(
                    "is_closed"=>1
                ));
                if($current_time<$week_schedule->saturday_closing_time || $current_time>=$week_schedule->saturday_opening_time){
                    Resturants::where("resturant_id",$resturant->resturant_id)->update(array(
                        "is_closed"=>0
                    ));
                }else{
                    Resturants::where("resturant_id",$resturant->resturant_id)->update(array(
                        "is_closed"=>1
                    ));
                }


            }else if($day == 'Saturday' && $week_schedule->saturday == 1){
                Resturants::where("resturant_id",$resturant->resturant_id)->update(array(
                    "is_closed"=>0
                ));
                if($current_time<$week_schedule->saturday_closing_time || $current_time>=$week_schedule->saturday_opening_time){
                    Resturants::where("resturant_id",$resturant->resturant_id)->update(array(
                        "is_closed"=>0
                    ));
                }else{
                    Resturants::where("resturant_id",$resturant->resturant_id)->update(array(
                        "is_closed"=>1
                    ));
                }
               
            }
    
    
            if($day == 'Sunday' && $week_schedule->sunday == 0){
                Resturants::where("resturant_id",$resturant->resturant_id)->update(array(
                    "is_closed"=>1
                ));
                if($current_time<$week_schedule->sunday_closing_time || $current_time>=$week_schedule->sunday_opening_time){
                    Resturants::where("resturant_id",$resturant->resturant_id)->update(array(
                        "is_closed"=>0
                    ));
                }else{
                    Resturants::where("resturant_id",$resturant->resturant_id)->update(array(
                        "is_closed"=>1
                    ));
                }
            }else if($day == 'Sunday' && $week_schedule->sunday == 1){
                Resturants::where("resturant_id",$resturant->resturant_id)->update(array(
                    "is_closed"=>0
                ));
                if($current_time<$week_schedule->sunday_closing_time || $current_time>=$week_schedule->sunday_opening_time){
                    Resturants::where("resturant_id",$resturant->resturant_id)->update(array(
                        "is_closed"=>0
                    ));
                }else{
                    Resturants::where("resturant_id",$resturant->resturant_id)->update(array(
                        "is_closed"=>1
                    ));
                }
               
            }



           
            
        }
      
    }
    }
    
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




        if(auth()->user()&&auth()->user()->role == 'admin'){
            return redirect()->route('admin_home');
        }else if(auth()->user()&&auth()->user()->role == 'normal_user'){
            return redirect()->route('home');

        }

        
        
        $my_resturant = Resturants::where("resturant_belong_to",auth()->user()->id)->get();
        $current_date = date('Y-m-d'); 
        
        $current_date_day = date('d/m/Y');
        $day = Carbon::createFromFormat('d/m/Y', $current_date_day)->format('l');


        $current_time = date('H:i');
       
        
        
      
        
            if($current_date>=$my_resturant[0]->opening_date || $current_date<=$my_resturant[0]->closing_date){
                if($current_date >= $my_resturant[0]->closing_date && $current_date<$my_resturant[0]->opening_date && $current_time > $my_resturant[0]->closing_time && $current_time < $my_resturant[0]->opening_time){
                
                    Resturants::where("resturant_belong_to",auth()->user()->id)->update(array(
                        "is_closed"=>1
                    ));
                }else{
                    Resturants::where("resturant_belong_to",auth()->user()->id)->update(array(
                        "is_closed"=>0
                    ));
                }
               }
           

       

               $this->week_schedule();

        $week_schedule = resturant_week_schedule::where("resturant_id",$my_resturant[0]->resturant_id)->first();
       
        $orders = DB::select("SELECT * FROM orders LEFT JOIN users on users.id=ordered_by WHERE resturant_owner=".auth()->user()->id." and is_closed=0");
        return view('Main.Resturant.index',["orders"=>$orders,"my_resturant"=>$my_resturant,"week_schedule"=>$week_schedule]);
    }




    public function close_resturant(Request $request){
        
        if(auth()->user()&&auth()->user()->role == 'admin'){
            return redirect()->route('admin_home');
        }else if(auth()->user()&&auth()->user()->role == 'normal_user'){
            return redirect()->route('home');

        }
       Resturants::where("resturant_belong_to",auth()->user()->id)->update(array(
        "opening_date"=>$request->opening_date,
        "closing_date"=>$request->closing_date,
        "closing_time"=>$request->closing_time,
        "opening_time"=>$request->opening_time
        ));
       
         
         
       
        return redirect()->route('resturant_home')->with("status","Your Resturant Closed From $request->closing_date To $request->opening_date");
       
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


    public function search_by_date(Request $request){
        if(auth()->user()&&auth()->user()->role == 'admin'){
            return redirect()->route('admin_home');
        }else if(auth()->user()&&auth()->user()->role == 'normal_user'){
            return redirect()->route('home');

        }
        $my_resturant = Resturants::where("resturant_belong_to",auth()->user()->id)->get();
        $orders = DB::select("SELECT * FROM orders LEFT JOIN users on users.id=ordered_by WHERE resturant_owner=".auth()->user()->id." and date='$request->date' and is_closed=0");
        $week_schedule = resturant_week_schedule::where("resturant_id",$my_resturant[0]->resturant_id)->first();

         return view('Main.Resturant.index',["orders"=>$orders,"my_resturant"=>$my_resturant,"week_schedule"=>$week_schedule]);
    }


     public function update_resturant(Request $request){
        if(auth()->user()&&auth()->user()->role == 'admin'){
            return redirect()->route('admin_home');
        }else if(auth()->user()&&auth()->user()->role == 'normal_user'){
            return redirect()->route('home');

        }


        $my_resturant = Resturants::where("resturant_belong_to",auth()->user()->id)->get();
        if($request->image){
           
            if($my_resturant[0]->image != null){
             
                $path = public_path()."/images/".$my_resturant[0]->image;
                unlink($path);

                $image_name = time().'.'.$request->image->getClientOriginalExtension();
                $request->image->move(public_path('/images'),$image_name);
                Resturants::where('resturant_id', '=' , $my_resturant[0]->resturant_id)->update(array(
                    "image"=>$image_name,
                    'resturant_name'=>$request->resturant_name,
                    'address'=>$request->address,
                    'opening_time'=>$request->opening_time,
                    'closing_time'=>$request->closing_time,
                    
                ));
                return redirect()->route('resturant_home')->with('status','Updated Successfully');
            }else{
                $image_name = time().'.'.$request->image->getClientOriginalExtension();
                $request->image->move(public_path('/images'),$image_name);
                Resturants::where('resturant_id', '=' , $my_resturant[0]->resturant_id)->update(array(
                    
                    'image'=>$image_name,
                    'resturant_name'=>$request->resturant_name,
                    'address'=>$request->address,
                    'opening_time'=>$request->opening_time,
                    'closing_time'=>$request->closing_time,
                    
                ));
                return redirect()->route('resturant_home')->with('status','Updated Successfully');

            }

            }else{
                Resturants::where('resturant_id', '=' , $my_resturant[0]->resturant_id)->update(array(
                  
                    'resturant_name'=>$request->resturant_name,
                    'address'=>$request->address,
                    'opening_time'=>$request->opening_time,
                    'closing_time'=>$request->closing_time,
                    
                ));
                return redirect()->route('resturant_home')->with('status','Updated Successfully');
            }
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

    public function schedule_week(Request $request){
        if(auth()->user()&&auth()->user()->role == 'admin'){
            return redirect()->route('admin_home');
        }else if(auth()->user()&&auth()->user()->role == 'normal_user'){
            return redirect()->route('home');

        }
        $resturant = Resturants::where("resturant_belong_to",auth()->user()->id)->first();
        $checK_schedule = resturant_week_schedule::where("resturant_id",$resturant->resturant_id)->first();


        if($checK_schedule != null){
            resturant_week_schedule::where("resturant_id",$resturant->resturant_id)->update(array(
                "monday"=>$request->monday,
                "tuesday"=>$request->tuesday,
                "wednesday"=>$request->wednesday,
                "thursday"=>$request->thursday,
                "friday"=>$request->friday,
                "saturday"=>$request->saturday,
                "sunday"=>$request->sunday,

                "tuesday_opening_time"=>$request->tuesday_opening_time,
                "tuesday_closing_time"=>$request->tuesday_closing_time,
                "wednesday_opening_time"=>$request->wednesday_opening_time,
                "wednesday_closing_time"=>$request->wednesday_closing_time,
                "thursday_opening_time"=>$request->thursday_opening_time,
                "thursday_closing_time"=>$request->thursday_closing_time,
                "friday_opening_time"=>$request->friday_opening_time,
                "friday_closing_time"=>$request->friday_closing_time,
                "saturday_opening_time"=>$request->saturday_opening_time,
                "saturday_closing_time"=>$request->saturday_closing_time,
                "sunday_opening_time"=>$request->sunday_opening_time,
                "sunday_closing_time"=>$request->sunday_closing_time,

            ));
        }else{
            resturant_week_schedule::create([
                "monday"=>$request->monday,
                "tuesday"=>$request->tuesday,
                "wednesday"=>$request->wednesday,
                "thursday"=>$request->thursday,
                "friday"=>$request->friday,
                "saturday"=>$request->saturday,
                "sunday"=>$request->sunday,
                "tuesday_opening_time"=>$request->tuesday_opening_time,
                "tuesday_closing_time"=>$request->tuesday_closing_time,
                "wednesday_opening_time"=>$request->wednesday_opening_time,
                "wednesday_closing_time"=>$request->wednesday_closing_time,
                "thursday_opening_time"=>$request->thursday_opening_time,
                "thursday_closing_time"=>$request->thursday_closing_time,
                "friday_opening_time"=>$request->friday_opening_time,
                "friday_closing_time"=>$request->friday_closing_time,
                "saturday_opening_time"=>$request->saturday_opening_time,
                "saturday_closing_time"=>$request->saturday_closing_time,
                "sunday_opening_time"=>$request->sunday_opening_time,
                "sunday_closing_time"=>$request->sunday_closing_time,
                "resturant_id"=>$resturant->resturant_id
            ]);
        }
        return redirect()->back()->with('status',"Schedule Added");
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
    public function close_booking($id){
        if(auth()->user()&&auth()->user()->role == 'admin'){
            return redirect()->route('admin_home');
        }else if(auth()->user()&&auth()->user()->role == 'normal_user'){
            return redirect()->route('home');

        }
        
         Orders::where("order_id","=",$id)->update(array(
             "is_closed"=>1
         ));
        return back()->with('status',"Order Has Been Closed");


        
    }


    public function get_all_closed_bookings(){
        $my_resturant = Resturants::where("resturant_belong_to",auth()->user()->id)->get();

        $orders = DB::select("SELECT * FROM orders LEFT JOIN users on users.id=ordered_by WHERE resturant_owner=".auth()->user()->id." and is_closed=1");
        $this->week_schedule();
        $week_schedule = resturant_week_schedule::where("resturant_id",$my_resturant[0]->resturant_id)->first();

        return view('Main.Resturant.closed_bookings',["orders"=>$orders,"my_resturant"=>$my_resturant,"week_schedule"=>$week_schedule]);
    }

    public function destroy($id)
    {
        if(auth()->user()&&auth()->user()->role == 'admin'){
            return redirect()->route('admin_home');
        }else if(auth()->user()&&auth()->user()->role == 'normal_user'){
            return redirect()->route('home');

        }
        $order = Orders::where("order_id","=",$id);
        $order->delete();
        return back()->with('status',"Order Has Been Deleted");
    }
}
