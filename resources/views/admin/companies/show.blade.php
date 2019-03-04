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
                    <h2>Company Profile</h2>
                    <p>Hello and welcome! There is a description of a company below.</p>
                    <hr>
                </div>
                <div class="text-center">
                    <p><img src="{{ asset('storage/img/companies/'. $company->logo) }}" alt="{{$company->logo}}" height="150" width="150"></p>
                    <p><b>Name: </b>{{$company->name}}</p>
                    <p><b>Email: </b>{{$company->email}}</p>
                    <p><b>Website: </b>{{$company->website}}</p>
                    <hr>
                </div>
                <div class="text-center">
                    <a href="{{ URL::previous() }}" class="btn btn-danger btn-lg" role="button">Cancel</a>
                </div>
            </div>
        </div>
        <!--/.row-->
    </div>
    <!--/.container-->

@endsection
