
@extends('layout.main')
@section('title')
	Taara Toro - Arena of Valor	
@endsection
@section('content')
@include('layout._share.search')
<section class="listings">
		<div class="wrapper">
			<ul class="properties_list">
				@foreach ($posts as $element)
				<li>
					<a href="{{ asset('posts/'.$element->id) }}">
						<img src="{{ asset($element->image) }}" alt="" title="" class="property_img"/>
					</a>
					@if ($element->category)
					@include('layout._share.category')
					@endif
					<div class="property_details">
						<h1>
							<a href="{{ asset('posts/'.$element->id) }}">{{ $element->title }}</a>
						</h1>
						<h2>{{ $element->short_desc }}<span class="property_size">({{ $element->author }})</span></h2>
					</div>
				</li>
				@endforeach

			</ul>
			{{ $posts->links() }}

		</div>
	</section>	<!--  end listing section  -->
@endsection
    