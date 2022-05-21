<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Resturants;
use App\Models\Orders;
use App\Models\Footer;

class MyBookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()&&auth()->user()->role == 'admin'){
            return redirect()->route('admin_home');
        }else if(auth()->user()&&auth()->user()->role == 'resturant'){
            return redirect()->route('resturant_home');

        }
        $orders = DB::select("SELECT * FROM orders LEFT JOIN resturants on resturant_id=orders.order_resturant_id WHERE ordered_by=".auth()->user()->id);
        $resturants = Resturants::get();
        $footers = Footer::get();

       return view('Main.my_bookings',["my_orders"=>$orders,"resturants"=>$resturants,'footers'=>$footers]);
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
        if(auth()->user()&&auth()->user()->role == 'admin'){
            return redirect()->route('admin_home');
        }else if(auth()->user()&&auth()->user()->role == 'resturant'){
            return redirect()->route('resturant_home');

        }


        $booking = Orders::where('order_id',$id)->first();
        $footers = Footer::get();
        $resturants = Resturants::get();

        return view('Main.edit_booking',["booking"=>$booking,'footers'=>$footers,'resturants'=>$resturants]);

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
        if(auth()->user()&&auth()->user()->role == 'admin'){
            return redirect()->route('admin_home');
        }else if(auth()->user()&&auth()->user()->role == 'resturant'){
            return redirect()->route('resturant_home');

        }


        $booking = Orders::where('order_id',$id)->update(array(
            "date"=>$request->date,
            "time"=>$request->time,
            "how_many_peoples"=>$request->how_many_peoples,
            "description"=>$request->description
        ));
        $footers = Footer::get();
        $resturants = Resturants::get();
        return redirect()->route('my_orders')->with("status","Booking Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Orders::where('order_id',$id)->delete();
     

        return redirect()->back()->with("status","Deleted Successfully");
    }
}
