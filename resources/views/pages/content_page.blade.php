@extends('frontlayout')
@section('title',$data->page_name)
@section('content')
		<div class="row">
			<div class="col-md-8">
				<div class="row mb-5"> 
					{!! $data->details !!}
				</div>
			</div>
			<!-- Right SIdebar -->
			<div class="col-md-4">
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
				<!-- Popular Posts -->
				<!-- <div class="card mb-4">
					<h5 class="card-header">Popular Posts</h5>
					<div class="list-group list-group-flush">
						<a href="#" class="list-group-item">Post 1</a>
						<a href="#" class="list-group-item">Post 2</a>
					</div>
				</div> -->
			</div>
		</div>
@endsection('content')