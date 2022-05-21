@extends("layouts.admin_layout")


@section('content')
<center class="jumbotron">
<form action="{{ route('update_user',$user->id) }}"  method="post">

@csrf

<div class="mb-4">
            <p class="float-left">Full Name</p>

            <input type="text" name="full_name" id="full_name" placeholder="Full Name" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" value="{{ $user->full_name }}">

            @error('full_name')
                <div class="text-red-500 mt-2 text-sm" style="color:red;">
                    {{ $message }}
                </div>
            @enderror
        </div>

<div class="mb-4">
           
            <p class="float-left">Email</p>
            <input type="email" name="email" id="email" placeholder="Email" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" value="{{ $user->email }}">

            @error('email')
                <div class="text-red-500 mt-2 text-sm" style="color:red;">
                    {{ $message }}
                </div>
            @enderror
  </div>



 

  
    <div class="mb-4">
    <p class="float-left">Role</p>

            <select name="role" id='role'  aria-label="Default select example" class="form-control">
                @if($user->role == 'normal_user')
                <option selected value='normal_user'>Normal User</option>
                @else
                <option  value='normal_user'>Normal User</option>
                @endif


                @if($user->role == 'admin')

                <option selected value="admin">Admin</option>
                @else
                <option  value="admin">Admin</option>
                @endif

                @if($user->role == 'resturant')
                 <option selected value="resturant">Resturant</option>
                @else
              
                <option value="resturant">Resturant</option>
                @endif
            </select>
         
    </div>

</div>
<div class="modal-footer">

<button type="submit" class="btn btn-primary">Update</button>
</form>
</center>
@endsection