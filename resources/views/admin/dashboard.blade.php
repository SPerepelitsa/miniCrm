@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>@lang('admin/dashboard.header')</h1>
@stop

@section('content')
    <p>@lang('admin/dashboard.logged_in_message') <b>{{ Auth::user()->name }}.</b> </p>
    <p>@lang('admin/dashboard.welcome') </p>
@stop
