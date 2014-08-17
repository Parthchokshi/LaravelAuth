<ul class="root">
	
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

