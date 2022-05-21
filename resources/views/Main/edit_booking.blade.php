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
<center>




<div class="jumbotron" style="width:50%;padding:30px;border-radius:5px;">



<div >
    <form action="{{ route('update_booking', $booking->order_id )}}" method="post">
    @csrf

<div class="mb-4">
                  
                   

                    <p style="float:left">Date</p>
                    <input type="date" name="date" id="date" placeholder="Date" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" value="{{ $booking->date }}">

                    @error('date')
                        <div class="text-red-500 mt-2 text-sm" style="color:red;">
                            {{ $message }}
                        </div>
                    @enderror
    </div>

    <div class="mb-4">
                   
                   <p  style="float:left">Time</p>
                   <input type="time" name="time" id="time" placeholder="Time" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" value="{{ $booking->time }}">

                   @error('time')
                       <div class="text-red-500 mt-2 text-sm" style="color:red;">
                           {{ $message }}
                       </div>
                   @enderror
   </div>


   <div class="mb-4">
                
                    <p  style="float:left">How many peoples</p>

                    <input type="number" name="how_many_peoples" id="how_many_peoples" placeholder="How Many Peoples" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" value="{{ $booking->how_many_peoples }}">

                    @error('how_many_peoples')
                        <div class="text-red-500 mt-2 text-sm" style="color:red;">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="name" class="sr-only">Description</label>
                    <p  style="float:left">Description</p>

                   <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ $booking->description }}</textarea>

                    @error('description')
                        <div class="text-red-500 mt-2 text-sm" style="color:red;">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                
<button type="submit" class="btn btn-success">Update</button>
</form>

</div>
</div>
<br>

</center>

@foreach ($footers as $footer)
<div class="footer">
  <p>{{ $footer->footer_text }}</p>
</div>
@endforeach

@endsection