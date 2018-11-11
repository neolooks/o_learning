<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>O Learning</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="{{ elixir('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/stylesheet.css') }}">


    <link rel="stylesheet" href="{{ asset('/css/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">

    <link rel="stylesheet" href="{{ asset('/mdb/css/mdb.css') }}">
    <link rel="stylesheet" href="{{ asset('/mdb/css/style.min') }}">

    <link rel="stylesheet" href="{{ asset('/css/stylesheet.css') }}">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.11/sweetalert2.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('/css/comment-box.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/dropzone.css">
    


    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Happy Learning
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                @if($user)

                @if($user->type == 'instructor')
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Dashboard</a></li>
                </ul>
                @endif

                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/following_courses') }}">Following Courses</a></li>
                </ul>

                @endif

               <script>
               
               /* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

               </script>

                <!-- Right Side Of Navbar -->

                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}" >Register</a></li>
                    @else
                    
                <div class="dropdown">
  <button onclick="myFunction()" class="dropbtn">{{ Auth::user()->name }} <span class="caret"></span></button>
  <div id="myDropdown" class="dropdown-content">
    <a href="{{ url('/logout') }}">Logout</a>
  </div>
</div>

                    @endif

                </ul>



            </div>
            
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script></script>
     <script src="{{ asset('js/app.js') }}"></script>

     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
     <script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
     <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
     <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
     <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
     <script src="{{ asset('js/main.js') }}"></script>


     <script src="{{ asset('/mdb/js/popper.min.js') }}"></script>
     <script src="{{ asset('/mdb/js/mdb.min.js') }}"></script>

     <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.11/sweetalert2.min.js"></script>
        
     <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/dropzone.js"></script>

    @yield('custom_js')
    
</body>

<footer>
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                <h3>Learn anytime, anywhere</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                Take courses on any of your devices Go at your own pace with lifetime access
                </div>
                <div class="col-md-4">
                Don't have an account? <a href="{{ url('/register') }}" class="btn btn-primary btn-sm"  > Sign up</a>
                </div>
                <div class="col-md-4">
                    
                </div>
            </div>

            <div class="row footerAttr">
                <div class="col-md-12">
                Copyright &copy; 2018 Happy Learning, Inc.
                </div>
            </div>

        </div>
</footer>
</html>
