
<ul>
	@foreach ($data as $c)
		<li>
			<a href="{{$c->slug}}">{{$c->name}}</a>
		</li>
	@endforeach
</ul>
