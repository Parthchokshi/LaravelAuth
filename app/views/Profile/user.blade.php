@extends('layout.main')
{{HTML::style('../css/foundation.css')}}
{{HTML::style('../css/style.css')}}

@section('title')
User Profile
@stop

@section('content')

{{ e($user->username) }}
{{ e($user->email) }}

@stop
