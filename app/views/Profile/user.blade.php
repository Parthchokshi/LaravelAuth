@extends('layout.main')

@section('title')
User Profile
@stop

@section('content')

{{ e($user->username) }}
{{ e($user->email) }}

@stop
