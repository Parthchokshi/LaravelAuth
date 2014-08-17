@extends('layout.main')

@section('title')
Change Password
@stop

@section('content')


<form method="post" action="{{URL::route('account-change-password-post')}}">

<div class="field">

<label for="oldpassword">Old Password</label>
<input type="password" name="oldpassword" placeholder="Old Password">

@if($errors->has('oldpassword'))
	{{ $errors->first('oldpassword')}}
@endif

</div>

<div class="field">

<label for="password">New Password</label>

<input type="password" name="password" placeholder="New Password">

@if($errors->has('password'))
	{{ $errors->first('password')}}
@endif

</div>

<div class="field">

<label for="passwordconfirm">Confirm Password</label>

<input type="password" name="passwordconfirm" placeholder="Confirm Password">

@if($errors->has('passwordconfirm'))
	{{ $errors->first('passwordconfirm')}}
@endif

</div>


{{ Form::token()}}

<button type="submit" class="button">Change Password</button>

</form>

@stop
