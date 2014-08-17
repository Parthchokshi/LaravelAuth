@extends('layout.main')

@section('title')
Sign in.
@stop

@section('content')

<form action="{{ URL::route('account-sign-in-post')}}" method="post" class="form-inline" role="form">
	<legend>Sign In</legend>

	<div class="field">
	<label for="email" class="sr">Email : </label>
<input type="text" name="email" class="form-control" placeholder="Email" {{ (Input::old('email')) ? 'value= "'.Input::old('email').'"' : '' }}>

@if($errors->has('email'))
	
	{{ $errors->first('email') }}

@endif

</div>

<div class="field">

<label for="password">Password : </label>
<input type="password" name="password" class="input-block-level"     placeholder="Password">

@if($errors->has('password'))
	
	{{ $errors->first('password') }}

@endif


</div>

<div class="field">
	
	<input type="checkbox" name="remember" id="remember">
		<label for="remember">Remember me.</label>


</div>


<button type="submit" class="btn btn-primary">Submit</button>

{{ Form::token() }} 

</form>

@stop