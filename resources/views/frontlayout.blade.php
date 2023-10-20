<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('lib')}}/bs4/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('css')}}/custom.css" />
    <!-- Jquery -->
    <script type="text/javascript" src="{{asset('lib')}}/jquery-3.5.1.min.js"></script>
    <!-- BS4 Js -->
    <script type="text/javascript" src="{{asset('lib')}}/bs4/bootstrap.bundle.min.js"></script>

</head>
<body>
	<nav class="navbar-expand-lg navbar-dark bg-color-top">
		<div class="container text-white">
			<div class="row">
				<div class="col-md-6">
					<span>Date: Friday, October 9, 2023 Ph: 883080222</span>
				</div>
				<div class="col-md-6 text-right">
					<span>Mujib Coner, Sof, Coreer, Login : Student Protal For Payment</span>
				</div>
			</div>
		</div>
	</nav>

	<nav class="navbar-expand-lg navbar-dark bg-color-top-head">
		<div class="container text-white">
			<div class="row">
				<div class="col-md-3 p-top-20">
					<span>ESTD : 1954 ;</span>
				</div>
				<div class="col-md-6 text-center">
					<span>Rahmatullah Model Hogh School &amp; College</span><br>
					<span>92, Lal Bag , Dhaka- 1211</span><br>
					<span>School Code: 00000; College Code: 00000;</span>
				</div>
				<div class="col-md-3 text-right p-top-20">
					<span>EIIN : 0000000</span>
				</div>
			</div>
		</div>
	</nav>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    	<div class="container">
		  <a class="navbar-brand" href="{{url('/')}}">MSM Lab</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNav">
		    <ul class="navbar-nav ml-auto">
		      <li class="nav-item active">
		        <a class="nav-link" href="{{url('/')}}">Home</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="{{url('all-categories')}}">Categories</a>
		      </li>
		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Dropdown
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="#">Action</a>
		          <a class="dropdown-item" href="#">Another action</a>
		          <div class="dropdown-divider"></div>
		          <a class="dropdown-item" href="#">Something else here</a>
		        </div>
		      </li>

		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Dropdown link
		        </a>
		        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
		          <li><a class="dropdown-item" href="#">Action</a></li>
		          <li><a class="dropdown-item" href="#">Another action</a></li>
		          <li class="dropdown-submenu">
		            <a class="dropdown-item dropdown-toggle" href="#">Submenu</a>
		            <ul class="dropdown-menu">
		              <li><a class="dropdown-item" href="#">Submenu action</a></li>
		              <li><a class="dropdown-item" href="#">Another submenu action</a></li>


		              <li class="dropdown-submenu">
		                <a class="dropdown-item dropdown-toggle" href="#">Subsubmenu</a>
		                <ul class="dropdown-menu">
		                  <li><a class="dropdown-item" href="#">Subsubmenu action1</a></li>
		                  <li><a class="dropdown-item" href="#">Another subsubmenu action1</a></li>
		                </ul>
		              </li>
		              <li class="dropdown-submenu">
		                <a class="dropdown-item dropdown-toggle" href="#">Second subsubmenu</a>
		                <ul class="dropdown-menu">
		                  <li><a class="dropdown-item" href="#">Subsubmenu action</a></li>
		                  <li><a class="dropdown-item" href="#">Another subsubmenu action</a></li>
		                </ul>
		              </li>



		            </ul>
		          </li>
		        </ul>
		      </li>

		      @guest
		      <li class="nav-item">
		        <a class="nav-link" href="{{url('login')}}">Login</a>
		      </li>
		      <!-- <li class="nav-item">
		        <a class="nav-link" href="{{url('register')}}">Register</a>
		      </li> -->
		      @else
		      <li class="nav-item">
		        <a class="nav-link" href="{{url('save-post-form')}}">Add Post</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="{{url('manage-posts')}}">Manage Posts</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="{{url('logout')}}">Logout</a>
		      </li>
		      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            	</form>
		      @endguest
		    </ul>
		  </div>
		</div>
	</nav>
	<!-- Get latest posts -->
	<main class="container mt-4">
		@yield('content')
	</main>

	<!-- Footer -->
	<footer class="footer page-footer font-small footer_background pt-4">
	  <!-- Footer Links -->
	  <div class="container-fluid text-center text-md-left">
	    <!-- Grid row -->
	    <div class="row">
	      <!-- Grid column -->
	      <div class="col-md-6 mt-md-0 mt-3">
	        <!-- Content -->
	        <h5 class="text-uppercase">Short Content</h5>
	        <p>Here you can use rows and columns to organize your footer content.</p>
	      </div>
	      <!-- Grid column -->
	      <hr class="clearfix w-100 d-md-none pb-3">
	      <!-- Grid column -->
	      <div class="col-md-3 mb-md-0 mb-3">
	        <!-- Links -->
	        <h5 class="text-uppercase">Links</h5>
	        <ul class="list-unstyled">
	          <li>
	            <a href="#!">Link 1</a>
	          </li>
	          <li>
	            <a href="#!">Link 2</a>
	          </li>
	          <li>
	            <a href="#!">Link 3</a>
	          </li>
	          <li>
	            <a href="#!">Link 4</a>
	          </li>
	        </ul>
	      </div>
	      <!-- Grid column -->

	      <!-- Grid column -->
	      <div class="col-md-3 mb-md-0 mb-3">
	        <!-- Links -->
	        <h5 class="text-uppercase">Links</h5>
	        <ul class="list-unstyled">
	          <li>
	            <a href="#!">Link 1</a>
	          </li>
	          <li>
	            <a href="#!">Link 2</a>
	          </li>
	          <li>
	            <a href="#!">Link 3</a>
	          </li>
	          <li>
	            <a href="#!">Link 4</a>
	          </li>
	        </ul>
	      </div>
	      <!-- Grid column -->
	    </div>
	    <!-- Grid row -->
	  </div>
	  <!-- Footer Links -->

	  <!-- Copyright -->
	  <div class="footer-copyright text-center py-3">© 2023 Copyright:
	    <a href="/"> MSM.com</a>
	  </div>
	  <!-- Copyright -->
	</footer>
	<!-- Footer -->

	<style type="text/css">
		
		/*Css for multilevel navbae menu*/
		.dropdown-submenu {
		  position: relative;
		}

		.dropdown-submenu a::after {
		  transform: rotate(-90deg);
		  position: absolute;
		  right: 6px;
		  top: .8em;
		}

		.dropdown-submenu .dropdown-menu {
		  top: 0;
		  left: 100%;
		  margin-left: .1rem;
		  margin-right: .1rem;
		}

	</style>

	 <!-- Script for multilevel navbae menu -->
    <script type="text/javascript">
      
      $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
        if (!$(this).next().hasClass('show')) {
          $(this).parents('.dropdown-menu').first().find('.show').removeClass('show');
        }
        var $subMenu = $(this).next('.dropdown-menu');
        $subMenu.toggleClass('show');


        $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
          $('.dropdown-submenu .show').removeClass('show');
        });


        return false;
      });
    </script>

</body>
</html>