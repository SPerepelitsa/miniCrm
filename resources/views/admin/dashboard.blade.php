@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>You signed in as <b>{{ Auth::user()->name }}.</b> </p>
    <p>Welcome to this beautiful admin panel.</p>
@stop
