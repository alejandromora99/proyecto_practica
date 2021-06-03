@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/ckeditor_css.css') }}">
@stop
@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="{{ asset("js/app.js") }}"></script>
@stop

