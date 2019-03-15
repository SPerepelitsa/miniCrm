@extends('adminlte::page')

@section('title')
    {{$company->name}}
@endsection

@section('content')

    <div class="container">
        <div class="row create-wrap">
            <div class="col-md-8 col-md-offset-2">
                <div class="text-center">
                    <br><br>
                    <h2>@lang('admin/companies/crud.show_header')</h2>
                    <p>@lang('admin/companies/crud.show_description')</p>
                    <hr>
                </div>
                <div class="text-center">
                    <p><img src="{{ asset('storage/img/companies/'. $company->logo) }}" alt="{{$company->logo}}" height="150" width="150"></p>
                    <p><b>@lang('admin/companies/crud.name'): </b>{{$company->name}}</p>
                    <p><b>@lang('admin/companies/crud.email'): </b>{{$company->email}}</p>
                    <p><b>@lang('admin/companies/crud.website'): </b>{{$company->website}}</p>
                    <hr>
                </div>
                <div class="text-center">
                    <a href="{{ URL::previous() }}" class="btn btn-danger btn-lg" role="button">@lang('admin/companies/crud.cancel_button')</a>
                </div>
            </div>
        </div>
        <!--/.row-->
    </div>
    <!--/.container-->

@endsection
