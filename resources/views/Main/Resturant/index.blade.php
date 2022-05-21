@extends('layouts.resturant_layout')

@section('content')

<center>
   
  <h1>All the Booking</h1>    
    








    <table class="table" style="background-color:white;width:50%;border-radius:5px;">
  <thead>
    <tr>
      <th scope="col">🧑‍🤝‍🧑Amount</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
      <th scope="col">By</th>
      <th scope="col">Extra Info</th>

      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
  @foreach($orders as $order)
    <tr>
      <th scope="row">{{ $order->how_many_peoples }}</th>
      <td>{{ $order->date }}</td>
      <td>{{ $order->time }}</td>
      <td>{{ $order->full_name }}</td>
      <td>{{ $order->description }}</td>

      <td>
     
      <a href="{{ route('close_booking',$order->order_id) }}" class="btn btn-danger">Close</a>

      </td>

    </tr>
  @endforeach

  </tbody>
</table>
</center>


 


@endsection