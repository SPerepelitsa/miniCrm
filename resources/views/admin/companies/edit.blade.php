@extends('adminlte::page')

@section('title', 'Company | Edit')

@section('content')

    <div class="container">
        <div class="row create-wrap">
            <div class="col-md-8 col-md-offset-2">
                <div class="text-center">
                    <br><br>
                    <h2>Edit Company</h2>
                    <p>Fill in all all fields and press "Edit" button.</p>

                    @include('partials._validation_messages')

                </div>
                <form action="{{ route('companies.update', $company->id) }}" method="post" enctype="multipart/form-data" role="form" class="companyForm">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter company name" value="{{$company->name}}"/>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter company email" value="{{$company->email}}"/>
                    </div>

                    <div class="form-group">
                        <label for="website">Website</label>
                        <input type="text" name="website" class="form-control" placeholder="Enter company website url" value="{{$company->website}}"/>
                    </div>

                    <div class="form-group">
                        <label  for="image">Add logo</label>
                        <input type="file" name="image" class="file" />
                    </div>
                    <br><br>
                    <div class="text-center">
                        <button type="submit" class="btn btn-warning btn-lg">Edit</button>
                        <a href="{{ URL::previous() }}" class="btn btn-danger btn-lg" role="button">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
        <!--/.row-->
    </div>
    <!--/.container-->

@endsection
