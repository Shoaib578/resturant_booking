<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">




 
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
    <title>Book Resturant</title>


</head>
<body >

<header>
<nav class="navbar navbar-expand-lg navbar-light shadow-sm" >
        <div class="container">
          <a class="navbar-brand"  href="/"><span style="color:#17aa35">Resturant Booking</span> System</a>

      

          <button class="navbar-toggler"  type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupport">
            <ul class="navbar-nav ml-auto">

              <li class="nav-item ">
                <a class="nav-link"   href="{{ route('home') }}">Hjem</a>
              </li>

            @if(auth()->user() && auth()->user()->role == 'normal_user')
              <li class="nav-item ">
                <a class="nav-link"   href="{{ route('my_orders') }}">Mine bestillinger</a>
              </li>
            @endif

          @if (auth()->user())
          <li class="nav-item">
                  <a class="btn btn-success ml-lg-3"  href="{{ route('signout') }}">Logg ut</a>
                </li>
           @else
              
              <li class="nav-item">
              <a class="  ml-lg-3" style="text-decoration:none;color:gray" href="{{ route('signin') }}">Logg inn </a>
              &nbsp;
                <a class="btn btn-success ml-lg-3" href="{{ route('signup') }}">Registrere</a>
              </li>
        @endif
            </ul>
          </div> <!-- .navbar-collapse -->
        </div> <!-- .container -->
      </nav>
   
  </header>
  @if(Route::current()->getName() == 'home')
  <center>
  <button class="btn btn-primary mt-3" data-toggle="modal" data-target="#exampleModal" type="button">Book</button>

  </center>

  @endif
</header>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Book Now</h5>
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      
      </div>
      <form action="{{ route('search_resturant') }}" method="get">
      <input type="text"  name="search" class="form-control float-left" placeholder="Search">
      
      <button type="submit" class="btn btn-primary float-right">Search</button>
      </form>
      


      <div class="modal-body">
       
       @foreach ($resturants as $resturant)
       @if($resturant->is_closed == 0)
       <a href="view_resturant/{{ $resturant->resturant_id }}">
         
       <div class="alert alert-dark" role="alert">
         <img src="{{ asset( 'images/'.$resturant->image ) }}" style="width:50px;height:50px;border-radius:10px"/>
       {{ $resturant->resturant_name }}
      </div>

      </a>
      @else
      <div >
         <div class="alert alert-dark" role="alert">
          
           <p style="font-size:20px;color:red;position:absolute;background-color:yellow;opacity:0.8;margin-left:40%;margin-top:10px">This Resturant is Closed</p>

           

           <img src="{{ asset( 'images/'.$resturant->image ) }}" style="width:50px;height:50px;border-radius:10px"/>
         {{ $resturant->resturant_name }}
        </div>
  
        </div>
        @endif

      
       @endforeach
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>



@if (session('status'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <center>
        {{ session('status') }}
        </center>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
    
 @endif
    @yield('content')


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
