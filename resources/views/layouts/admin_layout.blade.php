<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">




 
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<link href="{{$host.'/vendor/fontawesome-free/css/all.min.css'}}" rel="stylesheet" type="text/css">
<link href="{{$host.'/vendor/bootstrap/css/bootstrap.min.css'}}" rel="stylesheet" type="text/css">
  <link href="{{$host.'/css/ruang-admin.min.css'}}" rel="stylesheet">
    <title>Resturant Booking System</title>


</head>
<body id="page-top">

<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-icon">
          <img src="{{ asset( 'images/resturant_avatar.png' ) }}" >
        </div>
        <div class="sidebar-brand-text mx-3">Super-Admin</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="fas fa-fw fa-home"></i>
          <span>Hjem</span></a>
      </li>
      <hr class="sidebar-divider">
     
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin_users') }}">
          <i class="fas fa-fw fa-user"></i>
          <span>Brukere</span></a>
      </li>


      <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin_footer') }}">
          <i class="fas fa-fw fa-copyright"></i>
          <span>Footer</span></a>
      </li>


   
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
           
         
          
          
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown"  role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="{{ asset( 'images/resturant_avatar.png' ) }}" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small">Super-Admin</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" data-toggle="modal" data-target="#UpdateProfileModal" aria-labelledby="userDropdown">
              
             
                <hr>
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




  <script src="{{$host.'/vendor/jquery/jquery.min.js'}}"></script>
  <script src="{{$host.'/vendor/bootstrap/js/bootstrap.bundle.min.js' }}"></script>
  <script src="{{$host.'/vendor/jquery-easing/jquery.easing.min.js '}}"></script>
  <script src="{{$host.'/js/ruang-admin.min.js'}}"></script>
  <script src="{{$host.'/vendor/chart.js/Chart.min.js'}}"></script>
  <script src="{{$host.'/js/demo/chart-area-demo.js'}}"></script>  
</body>
</html>