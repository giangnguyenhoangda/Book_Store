<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Book Store</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<script type="text/javascript" src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap-3.1.1.min.js') }}"></script>

	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/main.css') }}" rel="stylesheet">
	<link href="{{ asset('css/style1.css') }}" rel="stylesheet" type="text/css" media="all" />

	{{-- <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">  --}}
	<script src="{{ asset('js/wow.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/cart.js') }}"></script>
	<script>
	 	new WOW().init();
	</script>
</head>
<body>
	@include('layout.elements.header1')
	@yield('container')
	@include('layout.elements.footer')
</body>
</html>