<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Footer;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $footers = Footer::get();
        $host = $request->getSchemeAndHttpHost();
        $footer_count = Footer::get()->count();
        
        return view("Admin.footer",["footers"=>$footers,"host"=>$host,"footer_count"=>$footer_count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
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

        Footer::create([
            "footer_text"=>$request->footer_text
        ]);
        return redirect()->back()->with('status',"Footer Has Been Added");
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
        if(auth()->user()&&auth()->user()->role == 'normal_user'){
            return redirect()->route('home');
        }else if(auth()->user()&&auth()->user()->role == 'resturant'){
            return redirect()->route('resturant_home');

        }

        Footer::where('id',$id)->update(array(
            "footer_text"=>$request->footer_text
        ));
        return redirect()->back()->with('status',"Footer Has Been Updated");


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Footer::find($id)->delete();
        return redirect()->back()->with('status',"Footer Deleted");

    }
}
