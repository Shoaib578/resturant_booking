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
<div  style="padding:30px;display:flex;flex-direction:row;flex-wrap:wrap;">

@foreach($my_orders as $my_order)

<div class="card" style="width: 18rem;margin-left:20px;">
<a href="{{ route('delete_booking',$my_order->order_id) }}" class="btn btn-danger float-right">Delete</a>
<a href="{{ route('edit_booking',$my_order->order_id) }}" class="btn btn-primary">Rediger</a>

  <div class="card-body">

    <p  class="card-title" >{{ $my_order->description }}</p>
    <h6 class="card-subtitle mb-2 text-muted mt-1">Details</h6>
    Resturant Name : <a href="view_resturant/{{ $my_order->order_resturant_id }}" class="card-text">{{ $my_order->resturant_name }}</a>

    <p class="card-text">Date : {{ $my_order->date}}</p>
    <p class="card-text">How Many peoples : {{ $my_order->how_many_peoples}}</p>

    <p class="card-text">Time : {{ $my_order->time}}</p>
    
  </div>
</div>


@endforeach

</div>
@foreach ($footers as $footer)
<div class="footer">
  <p>{{ $footer->footer_text }}</p>
</div>
@endforeach

@endsection