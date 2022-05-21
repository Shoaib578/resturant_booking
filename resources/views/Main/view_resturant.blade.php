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
    @foreach ($resturant as $res)


    <div style="width:50%;float:left;">
    <img src="{{asset('images/'.$res->image)}}" style="width:100%;height:720px"/>
    </div>
<div class="jumbotron" style="width:50%;padding:30px;border-radius:5px;float:right">



<div >
    <form action="{{ route('create_order') }}" method="post">
    @csrf

<div class="mb-4">
                   <input type="number" hidden name="resturant_id" value="{{ $res->resturant_id }}">
                   <input type="number" hidden name="resturant_belong_to" value="{{ $res->resturant_belong_to }}">
                   

                    <p style="float:left">Date</p>
                    <input type="date" name="date" id="date" placeholder="Date" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" value="{{ old('email') }}">

                    @error('date')
                        <div class="text-red-500 mt-2 text-sm" style="color:red;">
                            {{ $message }}
                        </div>
                    @enderror
    </div>

    <div class="mb-4">
                   
                   <p  style="float:left">Time</p>
                   <input type="time" name="time" id="time" placeholder="Time" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" value="{{ old('email') }}">

                   @error('time')
                       <div class="text-red-500 mt-2 text-sm" style="color:red;">
                           {{ $message }}
                       </div>
                   @enderror
   </div>


   <div class="mb-4">
                
                    <p  style="float:left">How many peoples</p>

                    <input type="number" name="how_many_peoples" id="how_many_peoples" placeholder="How Many Peoples" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" value="{{ old('email') }}">

                    @error('how_many_peoples')
                        <div class="text-red-500 mt-2 text-sm" style="color:red;">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="name" class="sr-only">Description</label>
                    <p  style="float:left">Description</p>

                   <textarea name="description" id="" cols="30" rows="10" class="form-control">Description</textarea>

                    @error('description')
                        <div class="text-red-500 mt-2 text-sm" style="color:red;">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                
<button type="submit" class="btn btn-success">Book Now</button>
</form>

</div>
</div>
<br>
@endforeach
</center>

@foreach ($footers as $footer)
<div class="footer">
  <p>{{ $footer->footer_text }}</p>
</div>
@endforeach

@endsection