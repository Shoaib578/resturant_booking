@extends('layouts.main_layout')

@section('content')
<style>
    .footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: red;
  color: white;
  text-align: center;
}
</style>
<form action="{{ route('search_resturant') }}" method="get">
      <input type="text"  name="search" class="form-control float-left" placeholder="Search">
      
      <button type="submit" class="btn btn-primary float-right">Search</button>
      </form>
      
      
<center style="margin-top:80px;">


@foreach ($resturants as $resturant)
      @if($resturant->is_closed == 0)
       <a href="view_resturant/{{ $resturant->resturant_id }}" style="text-decoration:none;">
         
       <div class="alert alert-dark" role="alert" style="width:40%;margin-top:20px;">
         <img src="{{ asset( 'images/'.$resturant->image ) }}" style="width:50px;height:50px;border-radius:10px;"/>
       {{ $resturant->resturant_name }}
      </div>

      </a>

      @else
      <div style="text-decoration:none;">
         
         <div class="alert alert-dark" role="alert" style="width:40%;margin-top:20px;">
         <p style="font-size:20px;color:red;position:absolute;background-color:yellow;opacity:0.8;margin-top:10px">This Resturant is Closed</p>

           <img src="{{ asset( 'images/'.$resturant->image ) }}" style="width:50px;height:50px;border-radius:10px;"/>
           
         {{ $resturant->resturant_name }}

        </div>
  
        </div>
      @endif
      </center>  
@endforeach


@foreach ($footers as $footer)
<div class="footer">
  <p>{{ $footer->footer_text }}</p>
</div>
@endforeach

@endsection