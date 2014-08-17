@extends('layout.main')

@section('title')

Create an account

@stop

@section('content')

	<form action="{{ URL::route('account-create-post') }}" method="post">

	<div class="main">
	
	<div class="field">
		<label>Email : </label><input type="text" name="email" {{ (Input::old('email')) ? 'value ="'.e(Input::Old('email')).'"':'' }} >
		@if($errors->has('email'))
			{{$errors->first('email')}}
		@endif

	</div>

	<div class="field">
		<label>Username : </label><input type="text" name="username" {{ (Input::old('username')) ? 'value="'.e(Input::old('username')).'"':'' }} >
		@if($errors->has('username'))
			{{$errors->first('username')}}
		@endif


	</div>

	<div class="field">
		<label>Password : </label><input type="password" name="password">
		@if($errors->has('password'))
			{{$errors->first('password')}}
		@endif


	</div>

	<div class="field">
		<label>Confirm Password : </label><input type="password" name="confirmpassword">
		@if($errors->has('confirmpassword'))
			{{$errors->first('confirmpassword')}}
		@endif


	</div>

		<input type="submit" value="Create an account." class="button expand" />	

		{{ Form::token() }}

		</div>
	</form>

@stop
