@extends('layout.main')

@section('title')
Forgot Password
@stop

@section('content')

<form method="post" action="{{ URL::route('account-forgot-password-post') }}">
	
<div class="field">	

<input type="text" name="email" placeholder="Email" {{ (Input::old('email'))  ? 'value="'.e(Input::old('email')).'"': '' }} >
@if($errors->has('email'))
	
	{{ $errors->first('email')}}

@endif

<button type="submit" class="btn btn-primary">Recover Account.</button>

</div>

{{ Form::token() }}
</form>

@stop