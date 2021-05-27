
<!doctype html>
<html lang="en">
<head>
<title>NDLEA</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">




    <!-- Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
    </script>

    
{{-- <link rel="stylesheet" href="css/style.css"> --}}
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<meta name="robots" content="noindex, follow">

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

<!-- Styles -->
<link rel="stylesheet" href="{{ asset('css/font-face.css') }}">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
<div class="wrapper d-flex align-items-stretch">
  
  <nav id="sidebar">
    <div class="custom-menu">
      <button type="button" id="sidebarCollapse" class="btn btn-primary">
      </button>
      
    </div>
    @include('layouts.navigation')
<div class="img bg-wrap text-center py-4" >
<div class="user-logo">
<div class="img" style="background-image: url(img/ndlea.png);">
</div>

{{-- <img src="{{ asset('img/ndlea.png') }}" style="height: 40px;" /> --}}

<h3>{{ Auth::user()->name }}</h3>
</div>
</div>
<ul class="list-unstyled components mb-5">
<li class="active">
<a href="#"><span class="fa fa-home mr-3"></span>Bio</a>
</li>
<li class="active">
<a href="{{ route('editUserInfo') }}"><span class="fa fa-home mr-3"></span>Apply for Visa</a>
</li>
{{-- <li>
<a href="#"><span class="fa fa-download mr-3 notif"><small class="d-flex align-items-center justify-content-center">5</small></span> Download</a>
</li> --}} 
<li>
<a href="{{ route('editDocument') }}"><span class="fa fa-document mr-3"></span>Documents</a>
</li>
<li>
<a href="#"><span class="fa fa-cog mr-3"></span> Edit Information</a>
</li>
<li>
<a href="#"><span class="fa fa-support mr-3"></span> Status</a>
</li>
<li>
    
<form method="POST" action="{{ route('logout') }}" >
  @csrf
  <x-responsive-nav-link :href="route('logout')"
  onclick="event.preventDefault();
                      this.closest('form').submit();">
  <span class="fa fa-sign-out mx-3"></span>
      {{ __('Log out') }}
  </x-responsive-nav-link>
</form>

</li>
</ul>
</nav>

<div id="content" class="p-4 p-md-5 pt-5">
 
  {{ $slot }}

</div>
</div> 

<script src="{{ asset('js/jquery.min.js') }}" defer></script>
<script src="{{ asset('js/popper.js') }}" defer></script>
<script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
<script src="{{ asset('js/main.js') }}" defer></script>

</body>
</html>