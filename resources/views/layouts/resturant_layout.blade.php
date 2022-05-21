<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">




 
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
    <title>Resturant Booking System</title>


</head>
<body id="page-top">

<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-icon">
          <img src="images/resturant_avatar.png" >
        </div>
        <div class="sidebar-brand-text mx-3">Resturant</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="fas fa-fw fa-home"></i>
          <span>Hjem</span></a>
      </li>
      <hr class="sidebar-divider">
     
      <li class="nav-item active">
        <a class="nav-link" style="cursor:pointer" data-toggle="modal" data-target="#exampleModal">
          <i class="fas fa-fw fa-ban"></i>
          <span>Close Resturant</span></a>
      </li>
      <hr class="sidebar-divider">

      <li class="nav-item active">
        <a class="nav-link" style="cursor:pointer" data-toggle="modal" data-target="#scheduleModal">
          <i class="fas fa-fw fa-calendar"></i>
          <span>Schedule Week</span></a>
      </li>
      <hr class="sidebar-divider">


      <li class="nav-item active">
        <a class="nav-link" style="cursor:pointer" href="{{ route('get_all_closed_bookings') }}">
          <i class="fas fa-fw fa-calendar"></i>
          <span>Closed Bookings</span></a>
      </li>

      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('signout') }}">
          <i class="fa fa-sign-out"></i>
          <span>Logg ut</span>
        </a>
      </li>
      
     
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="navbar-search" action="{{ route('search_by_date') }}">
                  <div class="input-group">
                    <input type="date" name="date" class="form-control bg-light border-1 small" placeholder="What do you want to look for?"
                      aria-label="Search" aria-describedby="basic-addon2" style="border-color: #3f51b5;">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
         
          
          
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown"  role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="{{ asset( 'images/'.$my_resturant[0]->image ) }}" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small">Resturant</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" data-toggle="modal" data-target="#UpdateProfileModal" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profil
                </a>
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('signout') }}">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logg ut

                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->




       
    
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


 

    </div>
    </div>
    </div>


<!-- Modal  -->
<div class="modal fade" id="UpdateProfileModal" tabindex="-1" role="dialog" aria-labelledby="UpdateProfileModal"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Oppdater profil</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                
              <form action="{{ route('update_resturant') }}" method="post" enctype="multipart/form-data">
                @csrf

          <div class="mb-4">
              <label for="name" class="sr-only">Navn</label>
              <p>Navn</p>

              <input type="text" name="resturant_name" id="resturant_name" placeholder="Resturant Navn" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" value="{{ $my_resturant[0]->resturant_name }}">

              @error('name')
                  <div class="text-red-500 mt-2 text-sm" style="color:red;">
                      {{ $message }}
                  </div>
              @enderror
          </div>

  <div class="mb-4">
             
              <p>Åpningstid</p>
              <input type="time" name="opening_time" id="opening_time" placeholder="Opening Time" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" value="{{ $my_resturant[0]->opening_time }}">

              @error('opening_time')
                  <div class="text-red-500 mt-2 text-sm" style="color:red;">
                      {{ $message }}
                  </div>
              @enderror
    </div>



    <div class="mb-4">
             
              <p>Bakgrunnsbilde</p>
              <input type="file" name="image" id="image" placeholder="Background Image" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" value="{{ old('email') }}">

              @error('image')
                  <div class="text-red-500 mt-2 text-sm" style="color:red;">
                      {{ $message }}
                  </div>
              @enderror
    </div>





    <div class="mb-4">
    <p>Stenge tid</p>

              <input type="time" name="closing_time" id="closing_time" placeholder="Closing Time" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" value="{{ $my_resturant[0]->closing_time }}">

              @error('closing_time')
                  <div class="text-red-500 mt-2 text-sm" style="color:red;">
                      {{ $message }}
                  </div>
              @enderror
    </div>

    <div class="mb-4">
              <label for="address" class="sr-only">Adresse</label>
              <p>Address</p>

              <input type="text" name="address" id="address" placeholder="Address" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" value="{{ $my_resturant[0]->address }}">

              @error('address')
                  <div class="text-red-500 mt-2 text-sm" style="color:red;">
                      {{ $message }}
                  </div>
              @enderror
      </div>


                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Avbryt</button>
                  <button type="submit" class="btn btn-primary">Oppdater</a>

                  </form>
                </div>
              </div>
            </div>
          </div>







<!-- Close resturant Modal -->


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Close Resturant</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="mb-4">
    <form action="{{ route('close_resturant') }}" method="GET">


      <p>Sluttdato</p>

                <input type="date" name="closing_date" required id="closing_date" required placeholder="Closing Date" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" value="{{ $my_resturant[0]->closing_date }}">

                @error('closing_date')
                    <div class="text-red-500 mt-2 text-sm" style="color:red;">
                        {{ $message }}
                    </div>
                @enderror
      </div>


      <div class="mb-4">

    <p>Åpningsdato</p>

              <input type="date" name="opening_date" required id="opening_date" required placeholder="Opening Date" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" value="{{ $my_resturant[0]->opening_date }}">

              @error('opening_date')
                  <div class="text-red-500 mt-2 text-sm" style="color:red;">
                      {{ $message }}
                  </div>
              @enderror
    </div>


  <hr>
  <div class="mb-4">
  <p>Closing Time</p>

    <input type="time" name="closing_time" required id="opening_date" required placeholder="Closing Time" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" value="{{ $my_resturant[0]->closing_time }}">

    @error('closing_time')
        <div class="text-red-500 mt-2 text-sm" style="color:red;">
            {{ $message }}
        </div>
    @enderror
    </div>


    <div class="mb-4">
    <p>Opening Time</p>

    <input type="time" name="opening_time" required id="opening_time" required placeholder="Opening Time" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" value="{{ $my_resturant[0]->opening_time }}">

    @error('opening_time')
        <div class="text-red-500 mt-2 text-sm" style="color:red;">
            {{ $message }}
        </div>
    @enderror
    </div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </form>

      </div>
    </div>
  </div>
</div>








<!-- Schedule Week resturant Modal -->


<div class="modal fade" id="scheduleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Schedule Resturant Week</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <form action="{{ route('schedule_week') }}" method="get">

     @if($week_schedule != null)
      <div class="mb-4">

      <p>Moday</p>

      <select name="monday" class="form-control" >
          <option  value="1" selected>Open</option>
          <option value="0">Close</option>
        
        </select>

                @error('monday')
                    <div class="text-red-500 mt-2 text-sm" style="color:red;">
                        {{ $message }}
                    </div>
                @enderror


                <div class="mb-4">
                <p>Moday Opening Time</p>

                <input type="time" name="monday_opening_time"  id="opening_time"  placeholder="MondayOpening Time" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" value="{{ $week_schedule->monday_opening_time }}">

                @error('monday_opening_time')
                    <div class="text-red-500 mt-2 text-sm" style="color:red;">
                        {{ $message }}
                    </div>
                @enderror
                </div>

                <div class="mb-4">
                <p>Moday Closing Time</p>

                <input type="time" name="monday_closing_time"  id="opening_time"  placeholder="Monday Closing Time" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" value="{{ $week_schedule->monday_closing_time }}">

                @error('monday_closing_time')
                    <div class="text-red-500 mt-2 text-sm" style="color:red;">
                        {{ $message }}
                    </div>
                @enderror
                </div>




      </div>






      <hr color="blue">



      <div class="mb-4">

      <p>Tueday</p>

      <select name="tuesday" class="form-control" >
          <option  value="1" selected>Open</option>
          <option value="0">Close</option>
        
        </select>

                @error('tuesday')
                    <div class="text-red-500 mt-2 text-sm" style="color:red;">
                        {{ $message }}
                    </div>
                @enderror


                <div class="mb-4">
                <p>Tuesday Opening Time</p>

                <input type="time" name="tuesday_opening_time"  id="opening_time"  placeholder="MondayOpening Time" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" value="{{ $week_schedule->tuesday_opening_time }}">

                @error('tuesday_opening_time')
                    <div class="text-red-500 mt-2 text-sm" style="color:red;">
                        {{ $message }}
                    </div>
                @enderror
                </div>

                <div class="mb-4">
                <p>Tuesday Closing Time</p>

                <input type="time" name="tuesday_closing_time"  id="opening_time"  placeholder="Monday Closing Time" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" value="{{ $week_schedule->tuesday_closing_time }}">

                @error('tuesday_closing_time')
                    <div class="text-red-500 mt-2 text-sm" style="color:red;">
                        {{ $message }}
                    </div>
                @enderror
                </div>


      </div>



      <hr color="blue">



      <div class="mb-4">

      <p>Wednesday</p>

      <select name="wednesday" class="form-control" >
          <option  value="1" selected>Open</option>
          <option value="0">Close</option>
        
        </select>

                @error('wednesday')
                    <div class="text-red-500 mt-2 text-sm" style="color:red;">
                        {{ $message }}
                    </div>
                @enderror


                <div class="mb-4">
                <p>Wednesday Opening Time</p>

                <input type="time" name="wednesday_opening_time"  id="opening_time"  placeholder="MondayOpening Time" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" value="{{ $week_schedule->wednesday_opening_time }}">

                @error('wednesday_opening_time')
                    <div class="text-red-500 mt-2 text-sm" style="color:red;">
                        {{ $message }}
                    </div>
                @enderror
                </div>

                <div class="mb-4">
                <p>Wednesday Closing Time</p>

                <input type="time" name="wednesday_closing_time"  id="opening_time"  placeholder="Monday Closing Time" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" value="{{ $week_schedule->wednesday_closing_time }}">

                @error('wednesday_closing_time')
                    <div class="text-red-500 mt-2 text-sm" style="color:red;">
                        {{ $message }}
                    </div>
                @enderror
                </div>



      </div>



      <hr color="blue">


      <div class="mb-4">

<p>Thursday</p>

<select name="thursday" class="form-control" >
    <option  value="1" selected>Open</option>
    <option value="0">Close</option>
  
  </select>

          @error('thursday')
              <div class="text-red-500 mt-2 text-sm" style="color:red;">
                  {{ $message }}
              </div>
          @enderror


          <div class="mb-4">
                <p>Thursday Opening Time</p>

                <input type="time" name="thursday_opening_time"  id="opening_time"  placeholder="MondayOpening Time" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" value="{{ $week_schedule->thursday_opening_time }}">

                @error('thursday_opening_time')
                    <div class="text-red-500 mt-2 text-sm" style="color:red;">
                        {{ $message }}
                    </div>
                @enderror
                </div>

                <div class="mb-4">
                <p>Thursday Closing Time</p>

                <input type="time" name="thursday_closing_time"  id="opening_time"  placeholder="Monday Closing Time" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" value="{{ $week_schedule->thursday_closing_time }}">

                @error('thursday_closing_time')
                    <div class="text-red-500 mt-2 text-sm" style="color:red;">
                        {{ $message }}
                    </div>
                @enderror
                </div>



</div>





<hr color="blue">





<div class="mb-4">

<p>Friday</p>

<select name="friday" class="form-control" >
    <option  value="1" selected>Open</option>
    <option value="0">Close</option>
  
  </select>

          @error('friday')
              <div class="text-red-500 mt-2 text-sm" style="color:red;">
                  {{ $message }}
              </div>
          @enderror

          <div class="mb-4">
                <p>Friday Opening Time</p>

                <input type="time" name="friday_opening_time"  id="opening_time"  placeholder="MondayOpening Time" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" value="{{ $week_schedule->friday_opening_time }}">

                @error('friday_opening_time')
                    <div class="text-red-500 mt-2 text-sm" style="color:red;">
                        {{ $message }}
                    </div>
                @enderror
                </div>

                <div class="mb-4">
                <p>Friday Closing Time</p>

                <input type="time" name="friday_closing_time"  id="opening_time"  placeholder="Monday Closing Time" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" value="{{ $week_schedule->friday_closing_time }}">

                @error('friday_closing_time')
                    <div class="text-red-500 mt-2 text-sm" style="color:red;">
                        {{ $message }}
                    </div>
                @enderror
                </div>


</div>


<hr color="blue">


<div class="mb-4">

<p>Saturday</p>

<select name="saturday" class="form-control" >
    <option  value="1" selected>Open</option>
    <option value="0">Close</option>
  
  </select>

          @error('saturday')
              <div class="text-red-500 mt-2 text-sm" style="color:red;">
                  {{ $message }}
              </div>
          @enderror


          <div class="mb-4">
                <p>Saturday Opening Time</p>

                <input type="time" name="saturday_opening_time"  id="opening_time"  placeholder="MondayOpening Time" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" value="{{ $week_schedule->saturday_opening_time }}">

                @error('saturday_opening_time')
                    <div class="text-red-500 mt-2 text-sm" style="color:red;">
                        {{ $message }}
                    </div>
                @enderror
                </div>

                <div class="mb-4">
                <p>Saturday Closing Time</p>

                <input type="time" name="saturday_closing_time"  id="opening_time"  placeholder="Monday Closing Time" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" value="{{ $week_schedule->saturday_closing_time }}">

                @error('saturday_closing_time')
                    <div class="text-red-500 mt-2 text-sm" style="color:red;">
                        {{ $message }}
                    </div>
                @enderror
                </div>

</div>

<hr color="blue">



<div class="mb-4">

<p>Sunday</p>

<select name="sunday" class="form-control" >
    <option  value="1" selected>Open</option>
    <option value="0">Close</option>
  
  </select>

          @error('sunday')
              <div class="text-red-500 mt-2 text-sm" style="color:red;">
                  {{ $message }}
              </div>
          @enderror

          <div class="mb-4">
                <p>Sunday Opening Time</p>

                <input type="time" name="sunday_opening_time"  id="opening_time"  placeholder="MondayOpening Time" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" value="{{ $week_schedule->sunday_opening_time }}">

                @error('sunday_opening_time')
                    <div class="text-red-500 mt-2 text-sm" style="color:red;">
                        {{ $message }}
                    </div>
                @enderror
                </div>

                <div class="mb-4">
                <p>Sunday Closing Time</p>

                <input type="time" name="sunday_closing_time"  id="opening_time"  placeholder="Monday Closing Time" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" value="{{ $week_schedule->sunday_closing_time }}">

                @error('sunday_closing_time')
                    <div class="text-red-500 mt-2 text-sm" style="color:red;">
                        {{ $message }}
                    </div>
                @enderror
                </div>


</div>

@else



<div class="mb-4">

<p>Moday</p>

<select name="monday" class="form-control" >
    <option  value="1" selected>Open</option>
    <option value="0">Close</option>
  
  </select>

          @error('monday')
              <div class="text-red-500 mt-2 text-sm" style="color:red;">
                  {{ $message }}
              </div>
          @enderror


          <div class="mb-4">
          <p>Moday Opening Time</p>

          <input type="time" name="monday_opening_time"  id="opening_time"  placeholder="MondayOpening Time" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" >

          @error('monday_opening_time')
              <div class="text-red-500 mt-2 text-sm" style="color:red;">
                  {{ $message }}
              </div>
          @enderror
          </div>

          <div class="mb-4">
          <p>Moday Closing Time</p>

          <input type="time" name="monday_closing_time"  id="opening_time"  placeholder="Monday Closing Time" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control">

          @error('monday_closing_time')
              <div class="text-red-500 mt-2 text-sm" style="color:red;">
                  {{ $message }}
              </div>
          @enderror
          </div>




</div>






<hr color="blue">



<div class="mb-4">

<p>Tueday</p>

<select name="tuesday" class="form-control" >
    <option  value="1" selected>Open</option>
    <option value="0">Close</option>
  
  </select>

          @error('tuesday')
              <div class="text-red-500 mt-2 text-sm" style="color:red;">
                  {{ $message }}
              </div>
          @enderror


          <div class="mb-4">
          <p>Tuesday Opening Time</p>

          <input type="time" name="tuesday_opening_time"  id="opening_time"  placeholder="MondayOpening Time" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" >

          @error('tuesday_opening_time')
              <div class="text-red-500 mt-2 text-sm" style="color:red;">
                  {{ $message }}
              </div>
          @enderror
          </div>

          <div class="mb-4">
          <p>Tuesday Closing Time</p>

          <input type="time" name="tuesday_closing_time"  id="opening_time"  placeholder="Monday Closing Time" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" >

          @error('tuesday_closing_time')
              <div class="text-red-500 mt-2 text-sm" style="color:red;">
                  {{ $message }}
              </div>
          @enderror
          </div>


</div>



<hr color="blue">



<div class="mb-4">

<p>Wednesday</p>

<select name="wednesday" class="form-control" >
    <option  value="1" selected>Open</option>
    <option value="0">Close</option>
  
  </select>

          @error('wednesday')
              <div class="text-red-500 mt-2 text-sm" style="color:red;">
                  {{ $message }}
              </div>
          @enderror


          <div class="mb-4">
          <p>Wednesday Opening Time</p>

          <input type="time" name="wednesday_opening_time"  id="opening_time"  placeholder="MondayOpening Time" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" >

          @error('wednesday_opening_time')
              <div class="text-red-500 mt-2 text-sm" style="color:red;">
                  {{ $message }}
              </div>
          @enderror
          </div>

          <div class="mb-4">
          <p>Wednesday Closing Time</p>

          <input type="time" name="wednesday_closing_time"  id="opening_time"  placeholder="Monday Closing Time" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control">

          @error('wednesday_closing_time')
              <div class="text-red-500 mt-2 text-sm" style="color:red;">
                  {{ $message }}
              </div>
          @enderror
          </div>



</div>



<hr color="blue">


<div class="mb-4">

<p>Thursday</p>

<select name="thursday" class="form-control" >
<option  value="1" selected>Open</option>
<option value="0">Close</option>

</select>

    @error('thursday')
        <div class="text-red-500 mt-2 text-sm" style="color:red;">
            {{ $message }}
        </div>
    @enderror


    <div class="mb-4">
          <p>Thursday Opening Time</p>

          <input type="time" name="thursday_opening_time"  id="opening_time"  placeholder="MondayOpening Time" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" >

          @error('thursday_opening_time')
              <div class="text-red-500 mt-2 text-sm" style="color:red;">
                  {{ $message }}
              </div>
          @enderror
          </div>

          <div class="mb-4">
          <p>Thursday Closing Time</p>

          <input type="time" name="thursday_closing_time"  id="opening_time"  placeholder="Monday Closing Time" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" >

          @error('thursday_closing_time')
              <div class="text-red-500 mt-2 text-sm" style="color:red;">
                  {{ $message }}
              </div>
          @enderror
          </div>



</div>





<hr color="blue">





<div class="mb-4">

<p>Friday</p>

<select name="friday" class="form-control" >
<option  value="1" selected>Open</option>
<option value="0">Close</option>

</select>

    @error('friday')
        <div class="text-red-500 mt-2 text-sm" style="color:red;">
            {{ $message }}
        </div>
    @enderror

    <div class="mb-4">
          <p>Friday Opening Time</p>

          <input type="time" name="friday_opening_time"  id="opening_time"  placeholder="MondayOpening Time" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" >

          @error('friday_opening_time')
              <div class="text-red-500 mt-2 text-sm" style="color:red;">
                  {{ $message }}
              </div>
          @enderror
          </div>

          <div class="mb-4">
          <p>Friday Closing Time</p>

          <input type="time" name="friday_closing_time"  id="opening_time"  placeholder="Monday Closing Time" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" >

          @error('friday_closing_time')
              <div class="text-red-500 mt-2 text-sm" style="color:red;">
                  {{ $message }}
              </div>
          @enderror
          </div>


</div>


<hr color="blue">


<div class="mb-4">

<p>Saturday</p>

<select name="saturday" class="form-control" >
<option  value="1" selected>Open</option>
<option value="0">Close</option>

</select>

    @error('saturday')
        <div class="text-red-500 mt-2 text-sm" style="color:red;">
            {{ $message }}
        </div>
    @enderror


    <div class="mb-4">
          <p>Saturday Opening Time</p>

          <input type="time" name="saturday_opening_time"  id="opening_time"  placeholder="MondayOpening Time" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" >

          @error('saturday_opening_time')
              <div class="text-red-500 mt-2 text-sm" style="color:red;">
                  {{ $message }}
              </div>
          @enderror
          </div>

          <div class="mb-4">
          <p>Saturday Closing Time</p>

          <input type="time" name="saturday_closing_time"  id="opening_time"  placeholder="Monday Closing Time" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control">

          @error('saturday_closing_time')
              <div class="text-red-500 mt-2 text-sm" style="color:red;">
                  {{ $message }}
              </div>
          @enderror
          </div>

</div>

<hr color="blue">



<div class="mb-4">

<p>Sunday</p>

<select name="sunday" class="form-control" >
<option  value="1" selected>Open</option>
<option value="0">Close</option>

</select>

    @error('sunday')
        <div class="text-red-500 mt-2 text-sm" style="color:red;">
            {{ $message }}
        </div>
    @enderror

    <div class="mb-4">
          <p>Sunday Opening Time</p>

          <input type="time" name="sunday_opening_time"  id="opening_time"  placeholder="MondayOpening Time" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" >

          @error('sunday_opening_time')
              <div class="text-red-500 mt-2 text-sm" style="color:red;">
                  {{ $message }}
              </div>
          @enderror
          </div>

          <div class="mb-4">
          <p>Sunday Closing Time</p>

          <input type="time" name="sunday_closing_time"  id="opening_time"  placeholder="Monday Closing Time" class="bg-gray-100 border-2 w-full  rounded-lg @error('email') border-red-500 @enderror form-control" >

          @error('sunday_closing_time')
              <div class="text-red-500 mt-2 text-sm" style="color:red;">
                  {{ $message }}
              </div>
          @enderror
          </div>


</div>



@endif



      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>

      </div>
    </div>
  </div>
</div>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>  
</body>
</html>