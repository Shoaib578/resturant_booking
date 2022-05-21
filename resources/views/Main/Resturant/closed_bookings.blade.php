@extends('layouts.resturant_layout')

@section('content')

<center>
   
  <h1>Closed Bookings</h1>    
    








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
     
      <a href="order/{{$order->order_id}}/delete" class="btn btn-danger">Delete</a>

      </td>

    </tr>
  @endforeach

  </tbody>
</table>
</center>


 


@endsection
