@extends("layouts.admin_layout")


@section('content')


<button type="button" class="btn btn-primary float-right mr-5 mt-5" data-toggle="modal" data-target="#exampleModal">
  Add+
</button>

<center>
<h1 style="color:black;margin-top:10px;">All Users</h1>

<table class="table" style="background-color:white;margin-top:40px;width:50%;border-radius:5px;">
  <thead>
    <tr>
      <th scope="col">Full Name</th>
     
      <th scope="col">Email</th>
      <th scope="col">Role</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>

  @foreach($users as $user)
  @if($user->id != auth()->user()->id)
    <tr>
      <th scope="row">{{ $user->full_name }}</th>
    
      <td>{{ $user->email }}</td>
      <td>{{ $user->role }}</td>
      <td>
          <a href="user/{{$user->id}}/delete" class="btn btn-danger">Slett</a>
          <a href="{{ route('edit_user',$user->id) }}" class="btn btn-primary">Rediger</a>

      </td>

    </tr>
  @endif
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
      <form action="{{ route('add_user') }}"  method="post">

        @csrf

      <div class="mb-4">
                    <p>Full Name</p>

                    <input type="text" name="full_name" id="full_name" placeholder="Full Name" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" value="{{ old('email') }}">

                    @error('full_name')
                        <div class="text-red-500 mt-2 text-sm" style="color:red;">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

        <div class="mb-4">
                   
                    <p>Email</p>
                    <input type="email" name="email" id="email" placeholder="Email" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" value="{{ old('email') }}">

                    @error('email')
                        <div class="text-red-500 mt-2 text-sm" style="color:red;">
                            {{ $message }}
                        </div>
                    @enderror
          </div>



          <div class="mb-4">
          <p>Password</p>

                    <input type="password" name="password" id="password" placeholder="Choose a password" class="bg-gray-100 border-2 w-full  rounded-lg @error('password') border-red-500 @enderror form-control" value="">

                    @error('password')
                        <div class="text-red-500 mt-2 text-sm" style="color:red;">
                            {{ $message }}
                        </div>
                    @enderror
        </div>

         
            <div class="mb-4">
            <p>Role</p>

                    <select name="role" id='role'  aria-label="Default select example" class="form-control">
                    <option selected value='normal_user'>Normal User</option>
                    <option value="admin">Admin</option>
                    <option value="resturant">Resturant</option>
                   
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