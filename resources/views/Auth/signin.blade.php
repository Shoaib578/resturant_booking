@extends('layouts.main_layout')

@section('content')

<div style="display:flex;justify-content:center;">

<div class="w-8/12 bg-white p6 rounded-lg" style="width:50%;margin-top:20px;padding:10px;">

@if (session('status'))
                <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center" style="background-color:red;color:white;">
                    {{ session('status') }}
                </div>
            @endif

    <center>
<h1 style="color:darkblue">Logg inn</h1>
</center>


<form action="{{ route('signin') }}" method="post" style="margin-top:20px">

                @csrf
             

              

                <div class="mb-4">
                    <label for="email" class="sr-only">E-post</label>
                    <input type="text" name="email" id="email" placeholder="E-post" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" value="{{ old('email') }}">

                    @error('email')
                        <div class="text-red-500 mt-2 text-sm" style="color:red;">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" placeholder="Choose a password" class="bg-gray-100 border-2 w-full  rounded-lg @error('password') border-red-500 @enderror form-control" value="">

                    @error('password')
                        <div class="text-red-500 mt-2 text-sm" style="color:red;">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

             

                <center>
                <div>
                    <button type="submit" class="btn btn-primary">Logg inn</button>
                </div>

                </center>
            </form>

            <center style="margin-top:20px;">
            <a href="{{route('signup')}}" >Dont have an Account Want to registrere</a>
            </center>
</div>
</div>
@endsection