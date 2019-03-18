	<section class="hero">
		<header>
			<div class="wrapper">
				<a href="/"><img src="{{ asset('img/logo.jpg')}}" class="logo" alt="" title=""/></a>
				<a href="#" class="hamburger"></a>
				<nav>
					<ul>
  					@foreach ($menus as $m)
                    <li class="">
                        <a href="{{ route('post.by.cate', ['cateId' => $m->id]) }}">{{$m->name}}</a>
                    </li>
                    @endforeach
						
					</ul>
					<a href="{{ route('login') }}" class="login_btn">Login</a>
				</nav>
			</div>
		</header><!--  end header section  -->

			<section class="caption">
				<h2 class="caption">Find You Dream Hero</h2>
				<h3 class="properties">Appartements - Houses - Mansions</h3>
			</section>
	</section>