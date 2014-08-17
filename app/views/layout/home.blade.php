@extends('layout.main')

@section('title')

Home

@stop

@section('content')

@if(Auth::check())

Hello, {{ Auth::user()->username }}


@else

<p>You are not signed in.</p>
@endif

@stop

