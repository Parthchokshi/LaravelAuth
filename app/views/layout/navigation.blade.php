{{ HTML::style('css/style.css') }}
{{ HTMl::style('http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic')}}
 
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Foundation 5</title>

  <!-- If you are using the CSS version, only link these 2 files, you may add app.css to use for your overrides if you like -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/foundation.css">

   <script src="js/vendor/modernizr.js"></script>

  <nav class="top-bar" data-topbar data-options="is_hover:false">
    <ul class="title-area">
      <li class="name">
        <h1><a href="#">Something</a></h1>
      </li>
      <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
    </ul>

  <section class="top-bar-section">
    <!-- Right Nav Section -->
    <ul class="right">
      <li class="active"><a href="#">Right Nav Button Active</a></li>
      <li class="has-dropdown">
        <a href="#">Right Button with Dropdown</a>
        <ul class="dropdown">
          <li><a href="#">First link in dropdown</a></li>
        </ul>
      </li>
    </ul>

    <!-- Left Nav Section -->
    <ul class="left">
      <li><a href="#">Left Nav Button</a></li>
    </ul>
  </section>
</nav>

<nav>
<ul class="header">
	
	<li><a href="{{ URL::route('home') }}">Home</a></li>
	
	@if(Auth::check())

		<li><a href="{{ URL::route('account-sign-out') }}"> SignOut</a></li>
		<li><a href="{{ URL::route('account-change-password') }}"> Change Passoword</a></li>
	
	@else
	
		<li><a href="{{ URL::route('account-sign-in') }}">Sign In</a></li>
		<li><a href="{{ URL::route('account-create') }}">Create an account</a></li>
		<li><a href="{{ URl::route('account-forgot-password-get')}}">Forgot Password?</a></li>
	@endif
</ul>

</nav>

<script src="js/vendor/jquery.js"></script>
  <script src="js/foundation.min.js"></script>
  <script>
    $(document).foundation();
  </script>