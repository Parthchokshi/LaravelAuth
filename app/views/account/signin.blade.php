@extends('layout.main')

{{HTML::style('../css/foundation.css')}}
{{HTML::style('../css/style.css')}}

@section('title')
Sign in.
@stop

@section('content')

<form action="{{ URL::route('account-sign-in-post')}}" method="post">
	
<div class="field">

<label for="email">Email : </label>

<input type="text" name="email" placeholder="Email" {{ (Input::old('email')) ? 'value= "'.Input::old('email').'"' : '' }}>

@if($errors->has('email'))
	
	{{ $errors->first('email') }}

@endif
</div>

<div class="field">

<label for="password">Password : </label>
<input type="password" name="password"  placeholder="Password">

@if($errors->has('password'))
	
	{{ $errors->first('password') }}

@endif


</div>

<div class="field">
	
	<input type="checkbox" name="remember" id="remember">
	<label for="remember" style="margin-top:-35px">Remember me.</label>

</div>


<button type="submit" class="button">Sign In</button>

{{ Form::token() }} 

</form>

@stop
