@extends('layout.main')

@section('title')
Recover Password
@stop

@section('content')

<form action="{{URL::route('account-recover-password-post',$code)}}" method="post">

<div class="field">

	<label for="password">New Password</label>

	<input type="password" name="password" placeholder="New Password">
	
	@if($errors->has('password'))

	{{ $errors->first('password') }}

	@endif

</div>

<div class="field">

	<label for="password_confirm">Confirm Password</label>

	<input type="password" name="password_confirm" placeholder="Confirm Password">

	@if($errors->has('password_confirm'))
	
	{{ $errors->first('password_confirm') }}

	@endif

</div>

<button type="submit" class="button">Change Password.</button>

{{Form::token()}}

</form>
@stop
