@extends('adminlte::page')

@section('title')
    {{$employee->first_name ." ". $employee->last_name}}
@endsection

@section('content')

    <div class="container">
        <div class="row create-wrap">
            <div class="col-md-8 col-md-offset-2">
                <div class="text-center">
                    <br><br>
                    <h2>@lang('admin/employees/crud.show_header')</h2>
                    <p>@lang('admin/employees/crud.show_description')</p>
                    <hr>
                </div>
                <div class="text-center">
                    <p><b>@lang('admin/employees/crud.first_name'): </b>{{$employee->first_name}}</p>
                    <p><b>@lang('admin/employees/crud.last_name'): </b>{{$employee->last_name}}</p>
                    <p><b>@lang('admin/employees/crud.company'): </b>{{$employee->company['name']}}</p>
                    <p><b>@lang('admin/employees/crud.email'): </b>{{$employee->email}}</p>
                    <p><b>@lang('admin/employees/crud.phone'): </b>{{$employee->phone}}</p>
                    <hr>
                </div>
                <div class="text-center">
                    <a href="{{ URL::previous() }}" class="btn btn-danger btn-lg" role="button">@lang('admin/employees/crud.cancel_button')</a>
                </div>
            </div>
        </div>
        <!--/.row-->
    </div>
    <!--/.container-->

@endsection
