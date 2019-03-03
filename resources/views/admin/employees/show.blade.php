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
                    <h2>Employee Profile</h2>
                    <p>Hello and welcome! Here is an employee profile.</p>
                    <hr>
                </div>
                <div class="text-center">
                    <p><b>First name: </b>{{$employee->first_name}}</p>
                    <p><b>Last name: </b>{{$employee->last_name}}</p>
                    <p><b>Company: </b>{{$employee->company->name}}</p>
                    <p><b>Email: </b>{{$employee->email}}</p>
                    <p><b>Phone number: </b>{{$employee->phone}}</p>
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
