@extends('frontlayout')
@section('title','Home Page')
@section('content')
		<div class="row mb-5">
			<div class="col-md-3 border border-dark height-300">
				<div class="row"> 
					<div class="card principal-msg">
						<p class="w-50 h-100">aaaaaaaaaaaa</p>
					</div>
				</div>
			</div>
			<div class="col-md-6 border border-dark height-300">

				<!-- bbbbbbbbbbbbbb -->

				<div class="row"> 

					<div class="container">

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
			<div class="col-md-3 border border-dark height-300">
				<div class="row">
					<div class="card chairman-msg">
						<p class="w-50 h-100">vvvvvvvvvvvvvv</p>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8">
				<div class="row mb-5"> 
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
				</div>
				<!-- Pagination -->
				{{$posts->links()}}
			</div>
			<!-- Right SIdebar -->
			<div class="col-md-4">
				<!-- Search -->
				<div class="card mb-4">
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
				</div>
				<!-- Recent Posts -->
				<div class="card mb-4">
					<h5 class="card-header">Recent Posts</h5>
					<div class="list-group list-group-flush">
						@if($recent_posts)
							@foreach($recent_posts as $post)
								<a href="#" class="list-group-item">{{$post->title}}</a>
							@endforeach
						@endif
					</div>
				</div>
				<!-- Popular Posts -->
				<div class="card mb-4">
					<h5 class="card-header">Popular Posts</h5>
					<div class="list-group list-group-flush">
						<a href="#" class="list-group-item">Post 1</a>
						<a href="#" class="list-group-item">Post 2</a>
					</div>
				</div>
			</div>
		</div>
@endsection('content')