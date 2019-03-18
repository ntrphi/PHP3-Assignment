<!DOCTYPE html>
<html lang="en">
<head>
	<title> @yield('title') </title>
	@include('layout._share.top-asset')
</head>
<body>
	@include('layout._share.header')
<!--  end hero section  -->
	<!--  end search section  -->

@yield('content')

@include('layout._share.footer')
	<!--  end footer  -->
	
</body>
</html>