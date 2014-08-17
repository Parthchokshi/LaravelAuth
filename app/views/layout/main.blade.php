<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	
	@include('layout.header')

</head>


<body>

	<div class="header">
	
	@include('layout.navigation')
	
	</div>


	<div class="notify">
	
	@if(Session::has('notify'))
	
	<p> {{ Session::get('notify') }} </p>
	
	@endif
	
	</div>

	
	<div class="content">
	
	@yield('content')
	
	</div>


	@include('layout.footer')


</body>
</html>
