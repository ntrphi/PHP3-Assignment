@extends('layout.main')
@section('title')
	{{ $posts->title }}
@endsection
@section('content')
	<section class="content">
		<div class="wrapper">
			 		<div class="title">
						<h1>
							<a href="{{ $posts->id }}"><h5>{{ $posts->title }}</h5></a>
						</h1>
						<h6>{{ $posts->short_desc }} </h6>
					</div>
			 	
					<a href="{{ $posts->id }}">
						<img src="{{ $posts->image }}" alt="" title="" class="property_img"/>
					</a>
					
					<div class="text">
						<p>
							{{ $posts->content }}
						</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						<br>
						<div class="property_size"><strong>Author:  {{ $posts->author }}</strong></div>

					</div>
				
			 	

				
			
		</div>
	</section>	<!--  end listing section  -->

@endsection
