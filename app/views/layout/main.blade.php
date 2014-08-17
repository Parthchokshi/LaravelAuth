<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{ HTML::style('packages/bootstrap/css/bootstrap.min.css') }}
    {{ HTML::style('css/style.css') }}
</head>
<body>
<div class="notify">
	@if(Session::has('notify'))
	<p> {{ Session::get('notify') }} </p>
	@endif
</div>

	<div class="navbar">
	@include('layout.navigation')
	</div>
	@yield('content')

</body>
</html>