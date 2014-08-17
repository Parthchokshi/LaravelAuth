@extends('layout.main')

@section('title')

Create an account

@stop

@section('content')

	<form action="{{ URL::route('account-create-post') }}" method="post">

	<div class="main">
	
	<div class="field">
		Email : <input type="text" name="email" class="input-block-level" {{ (Input::old('email')) ? 'value ="'.e(Input::Old('email')).'"':'' }} >
		@if($errors->has('email'))
			{{$errors->first('email')}}
		@endif

	</div>

	<div class="field">
		Username : <input type="text" name="username" class="input-block-level" {{ (Input::old('username')) ? 'value="'.e(Input::old('username')).'"':'' }} >
		@if($errors->has('username'))
			{{$errors->first('username')}}
		@endif


	</div>

	<div class="field">
		Password : <input type="password" name="password" class="input-block-level">
		@if($errors->has('password'))
			{{$errors->first('password')}}
		@endif


	</div>

	<div class="field">
		Confirm Password : <input type="password" name="confirmpassword" class="input-block-level">
		@if($errors->has('confirmpassword'))
			{{$errors->first('confirmpassword')}}
		@endif


	</div>

		<input type="submit" value="Create an account." class="btn btn-large btn-primary" />	

		{{ Form::token() }}

		</div>
	</form>

@stop