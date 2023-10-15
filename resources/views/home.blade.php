@extends('frontlayout')
@section('title','Home Page')
@section('content')
		<div class="row mb-5">
			<div class="col-md-3 height-300">
				<div class="row"> 
					<div class="card principal-msg" width="200">
						<div class="text-center">
							<img class="rounded" src="https://dummyimage.com/1200x400/000/fff" width="50%" height="100">
						</div>
						<p class="h-100">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content meaningful content</p>
					</div>
				</div>
			</div>
			<div class="col-md-6 border height-300">

				<!-- bbbbbbbbbbbbbb -->

				<div class="row"> 

					<div class="slider_containter">

						<div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
						  <div class="carousel-inner">
						    <div class="carousel-item active" data-interval="10000">
						      <img src="https://dummyimage.com/1200x400/000/fff" class="d-block w-100 height-300" alt="...">
						    </div>
						    <div class="carousel-item" data-interval="10000">
						      <img src="https://dummyimage.com/1200x400/ccc/000" class="d-block w-100 height-300" alt="...">
						    </div>
						    <div class="carousel-item" data-interval="10000">
						      <img src="https://dummyimage.com/1200x400/000/fff" class="d-block w-100 height-300" alt="...">
						    </div>
						  </div>
						  <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
						    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
						    <span class="sr-only">Previous</span>
						  </a>
						  <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
						    <span class="carousel-control-next-icon" aria-hidden="true"></span>
						    <span class="sr-only">Next</span>
						  </a>
						</div>
					  
					</div>
				</div>
				<!-- /.container -->


			</div>
			<div class="col-md-3 height-300">
				<div class="row">
					<div class="card chairman-msg" width="200">
						<div class="text-center">
							<img class="rounded" src="https://dummyimage.com/1200x400/000/fff" width="50%" height="100">
						</div>
						<p class="h-100">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content meaningful content</p>
					</div>
				</div>
			</div>
		</div>


		<div class="row">

			<div class="col-md-8">

				<!-- About us Section -->
				<div class="row about_us">
					<div class="col-md-12 mb-5"> 
						<div class="card text-center">
						  <h4>About Us</h4>
						  <h5>Welcome to RMHSC</h5>
						  <div class="card-body">
						    <p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content meaningful content In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content meaningful content In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content meaningful content In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content meaningful content</p>
						  </div>
						</div>
					</div>
				</div>
				<!-- End About us section -->

				<!-- Necessary Links Section -->
				<div class="row about_us">
					<div class="col-md-6 mb-5"> 
						<!-- Online Fee Payment -->
						<div class="card mb-4">
							<h5 class="card-header">Online Fee Payment</h5>
							<div class="list-group list-group-flush">
								<a href="#" class="list-group-item">Bkash</a>
								<a href="#" class="list-group-item">Rocket</a>
							</div>
						</div>
					</div>
					<div class="col-md-6 mb-5"> 
						<!-- Online Exam Info -->
						<div class="card mb-4">
							<h5 class="card-header">Online Result</h5>
							<div class="list-group list-group-flush">
								<a href="#" class="list-group-item">Result Link 1</a>
								<a href="#" class="list-group-item">Result Link 2</a>
							</div>
						</div>
					</div>
				</div>
				<!-- End Necessary Links -->

				<!-- <div class="row mb-5"> 
					@if(count($posts)>0)
						@foreach($posts as $post)
						<div class="col-md-4">
							<div class="card">
							  <a href="{{url('detail/'.Str::slug($post->title).'/'.$post->id)}}"><img src="{{asset('imgs/thumb/'.$post->thumb)}}" class="card-img-top" alt="{{$post->title}}" /></a>
							  <div class="card-body">
							    <h5 class="card-title"><a href="{{url('detail/'.Str::slug($post->title).'/'.$post->id)}}">{{$post->title}}</a></h5>
							  </div>
							</div>
						</div>
						@endforeach
					@else
					<p class="alert alert-danger">No Post Found</p>
					@endif
				</div> -->
				<!-- Pagination -->
				<!-- {{$posts->links()}} -->
			</div>
			<!-- Right SIdebar -->
			<div class="col-md-4">
				<!-- Search -->
				<!-- <div class="card mb-4">
					<h5 class="card-header">Search</h5>
					<div class="card-body">
						<form action="{{url('/')}}">
							<div class="input-group">
							  <input type="text" name="q" class="form-control" />
							  <div class="input-group-append">
							    <button class="btn btn-dark" type="button" id="button-addon2">Search</button>
							  </div>
							</div>
						</form>
					</div>
				</div> -->
				<!-- Recent Posts -->
				<div class="card mb-4">
					<h5 class="card-header">Notice</h5>
					<div class="list-group list-group-flush">
						@if($recent_posts)
							@foreach($recent_posts as $post)
								<a href="#" class="list-group-item">{{$post->title}}</a>
							@endforeach
						@endif
					</div>
				</div>
				<!-- Popular Events -->
				<div class="card mb-4">
					<h5 class="card-header">Events</h5>
					<div class="list-group list-group-flush">
						<a href="#" class="list-group-item">Event 1</a>
						<a href="#" class="list-group-item">Event 2</a>
					</div>
				</div>
				<!-- Online Exam Info -->
				<div class="card mb-4">
					<h5 class="card-header">Online Exam Info</h5>
					<div class="list-group list-group-flush">
						<a href="#" class="list-group-item">Online Exam Info 1</a>
						<a href="#" class="list-group-item">Online Exam Info 2</a>
					</div>
				</div>
			</div>
		</div>
@endsection('content')