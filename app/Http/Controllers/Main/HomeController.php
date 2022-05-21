<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Orders;
use App\Models\Resturants;
use App\Models\Footer;
use App\Models\resturant_week_schedule;
use Carbon\Carbon;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
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
        }else if(auth()->user()&&auth()->user()->role == 'resturant'){
            return redirect()->route('resturant_home');

        }

       
       
        $footers = Footer::get();
        $resturants = Resturants::get();
        $users = User::where("role","resturant")->get();
        
        $current_date = date('Y-m-d'); 

        
       
        $current_time = date('H:i');
        
            foreach($resturants as $resturant){
        
                if($current_date>=$resturant->opening_date || $current_date<$resturant->closing_date){
                    if($current_date > $resturant->closing_date && $current_date<$resturant->opening_date && $current_time > $resturant->closing_time && $current_time < $resturant->opening_time){
                        Resturants::where("resturant_id",$resturant->resturant_id)->update(array(
                            "is_closed"=>1
                        ));
                    }else{
                        Resturants::where("resturant_id",$resturant->resturant_id)->update(array(
                            "is_closed"=>0
                        ));
                    }
                   }
               
    
            }
        
       
        $this->week_schedule();

        
        return view('Main.index',["resturants"=>$resturants,"footers"=>$footers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        
       
        $this->validate($request,[
            'date'=>'required',
           
           
            'time'=>'required',
            'how_many_peoples'=>'required',
            'description'=>'required||max:500',


           

        ]);

        if(!auth()->user()){
            return redirect()->route('signin')->with('status',"Please Login Before Booking");
        }
        Orders::create([
            "description"=>$request->description,
            "date"=>$request->date,
            "time"=>$request->time,
            "how_many_peoples"=>$request->how_many_peoples,
             "is_closed"=>0,
            "order_resturant_id"=>$request->resturant_id,
            "ordered_by"=>auth()->user()->id,
            "resturant_owner"=>$request->resturant_belong_to
        ]);
        return back()->with('status',"Your Have Just Booked The Resturant");
        
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

    public function search_resturant(Request $request)
    {
        
        $search = $request->search;
        $current_date = date('Y-m-d'); 
        $resturants = DB::select("SELECT * FROM resturants  WHERE resturant_name LIKE '%$search%'");
        $footers = Footer::get();
        $current_time = date('H:i');

        foreach($resturants as $resturant){
        
            if($current_date>=$resturant->opening_date || $current_date<$resturant->closing_date){
                if($current_date > $resturant->closing_date && $current_date<$resturant->opening_date && $current_time > $resturant->closing_time && $current_time < $resturant->opening_time){
                    Resturants::where("resturant_id",$resturant->resturant_id)->update(array(
                        "is_closed"=>1
                    ));
                }else{
                    Resturants::where("resturant_id",$resturant->resturant_id)->update(array(
                        "is_closed"=>0
                    ));
                }
               }
           

        }
        $this->week_schedule();

        return view('Main.search_resturant',["resturants"=>$resturants,"footers"=>$footers]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resturant = Resturants::where('resturant_id','=',$id)->get();
        $resturants = Resturants::get();
        $footers = Footer::get();
        $this->week_schedule();

        return view('Main.view_resturant',["resturant"=>$resturant,"resturants"=>$resturants,'footers'=>$footers]);
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
