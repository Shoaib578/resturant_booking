@extends("layouts.admin_layout")


@section('content')

<center>
  <h1 style="color:black;margin-top:10px;">All Resturants</h1>
</center>
<button type="button" class="btn btn-primary float-right mr-5 mt-5" data-toggle="modal" data-target="#exampleModal">
  Add+
</button>

<center>
<table class="table" style="background-color:white;margin-top:40px;width:50%;border-radius:5px;">
  <thead>
    <tr>
      <th scope="col">resturant_name</th>
      <th scope="col">address</th>
      <th scope="col">opening_time</th>
      <th scope="col">closing_time</th>
      <th scope="col">is closed</th>

      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
  @foreach($resturants as $resturant)
    <tr>
      <th scope="row">{{ $resturant->resturant_name }}</th>
      <td>{{ $resturant->address }}</td>
      <td>{{ $resturant->opening_time }}</td>
      <td>{{ $resturant->closing_time }}</td>
      @if($resturant->is_closed == 1)
      <td>yes</td>
      @else
      <td>no</td>
      
      @endif
      <td>
          <a href="admin/resturant/{{$resturant->resturant_id}}/delete" class="btn btn-danger">Slett</a>
          <a href="{{ route('edit_resturant',$resturant->resturant_id) }}" class="btn btn-primary">Rediger</a>

      </td>

    </tr>
  @endforeach

  </tbody>
</table>
</center>







<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Resturant</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div  class="modal-body">
      <form action="{{ route('add_resturant') }}"  method="post" enctype= multipart/form-data>

        @csrf

      <div class="mb-4">
                    <label for="name" class="sr-only">Name</label>
                    <p>Name</p>

                    <input type="text" name="resturant_name" id="resturant_name" placeholder="Resturant Name" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" value="{{ old('email') }}">

                    @error('name')
                        <div class="text-red-500 mt-2 text-sm" style="color:red;">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

        <div class="mb-4">
                   
                    <p>Opening Time</p>
                    <input type="time" name="opening_time" id="opening_time" placeholder="Opening Time" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" value="{{ old('email') }}">

                    @error('opening_time')
                        <div class="text-red-500 mt-2 text-sm" style="color:red;">
                            {{ $message }}
                        </div>
                    @enderror
          </div>



          <div class="mb-4">
                   
                    <p>Background Image</p>
                    <input type="file" name="image" id="image" placeholder="Background Image" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" value="{{ old('email') }}">

                    @error('image')
                        <div class="text-red-500 mt-2 text-sm" style="color:red;">
                            {{ $message }}
                        </div>
                    @enderror
          </div>





          <div class="mb-4">
          <p>Closing Time</p>

                    <input type="time" name="closing_time" id="closing_time" placeholder="Closing Time" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" value="{{ old('email') }}">

                    @error('closing_time')
                        <div class="text-red-500 mt-2 text-sm" style="color:red;">
                            {{ $message }}
                        </div>
                    @enderror
          </div>

          <div class="mb-4">
                    <label for="address" class="sr-only">Address</label>
                    <p>Address</p>

                    <input type="text" name="address" id="address" placeholder="Address" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" value="{{ old('address') }}">

                    @error('address')
                        <div class="text-red-500 mt-2 text-sm" style="color:red;">
                            {{ $message }}
                        </div>
                    @enderror
            </div>

            <div class="mb-4">
            <p>Resturant Belong To</p>

                    <select name="resturant_belong_to" id='resturant_belong_to'  aria-label="Default select example" class="form-control">
                   @foreach($all_resturant_users as $resturant_user)
                    <option  value="{{ $resturant_user->id }}">{{ $resturant_user->id }} - {{ $resturant_user->full_name }}</option>
                    
                   @endforeach
                    </select>
                 
            </div> 

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add+</button>
      </form>
      </div>
    </div>
  </div>
</div>


@endsection