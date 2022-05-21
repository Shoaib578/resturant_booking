
@extends('layouts.admin_layout')

@section('content')
<center class="jumbotron">

<form action="{{ route('admin_update_resturant',$resturant->resturant_id) }}" method="post" enctype="multipart/form-data">
                @csrf

          <div class="mb-4">
              <label for="name" class="sr-only ">Name</label>
              <p class="float-left">Name</p>

              <input type="text" name="resturant_name" id="resturant_name" placeholder="Resturant Name" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" value="{{ $resturant->resturant_name }}">

              @error('name')
                  <div class="text-red-500 mt-2 text-sm" style="color:red;">
                      {{ $message }}
                  </div>
              @enderror
          </div>

  <div class="mb-4">
             
              <p class="float-left">Opening Time</p>
              <input type="time" name="opening_time" id="opening_time" placeholder="Opening Time" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" value="{{ $resturant->opening_time }}">

              @error('opening_time')
                  <div class="text-red-500 mt-2 text-sm" style="color:red;">
                      {{ $message }}
                  </div>
              @enderror
    </div>



    <div class="mb-4">
             
              <p class="float-left">Background Image</p>
              <input type="file" name="image" id="image" placeholder="Background Image" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" value="{{ old('email') }}">

              @error('image')
                  <div class="text-red-500 mt-2 text-sm" style="color:red;">
                      {{ $message }}
                  </div>
              @enderror
    </div>





    <div class="mb-4">
    <p class="float-left">Closing Time</p>

              <input type="time" name="closing_time" id="closing_time" placeholder="Closing Time" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" value="{{ $resturant->closing_time }}">

              @error('closing_time')
                  <div class="text-red-500 mt-2 text-sm" style="color:red;">
                      {{ $message }}
                  </div>
              @enderror
    </div>

    <div class="mb-4">
              <label for="address" class="sr-only">Address</label>
              <p class="float-left">Address</p>

              <input type="text" name="address" id="address" placeholder="Address" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" value="{{ $resturant->address }}">

              @error('address')
                  <div class="text-red-500 mt-2 text-sm" style="color:red;">
                      {{ $message }}
                  </div>
              @enderror
      </div>


      <div class="mb-4">
            <p class="float-left">Resturant Belong To</p>

                    <select name="resturant_belong_to" id='resturant_belong_to'  aria-label="Default select example" class="form-control">
                   @foreach($all_resturant_users as $resturant_user)
                   @if($resturant_user->id == $resturant->resturant_belong_to)
                    <option selected  value="{{ $resturant_user->id }}">{{ $resturant_user->id }} - {{ $resturant_user->full_name }}</option>
                   @else 
                   <option   value="{{ $resturant_user->id }}">{{ $resturant_user->id }} - {{ $resturant_user->full_name }}</option>
                   @endif
                   @endforeach
                    </select>
                 
            </div> 


                </div>
               
                    <center style="margin-bottom:20px;">
                    <button type="submit" class="btn btn-primary ">Update</a>

                    </center>

                  </form>

</center>
@endsection