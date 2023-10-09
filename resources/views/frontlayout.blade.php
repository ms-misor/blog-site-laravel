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
	<nav class="navbar-expand-lg navbar-dark bg-danger">
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

	<nav class="navbar-expand-lg navbar-dark bg-color-red">
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
		      @guest
		      <li class="nav-item">
		        <a class="nav-link" href="{{url('login')}}">Login</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="{{url('register')}}">Register</a>
		      </li>
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
</body>
</html>