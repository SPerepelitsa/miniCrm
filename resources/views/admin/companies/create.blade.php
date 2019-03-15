@extends('adminlte::page')

@section('title', 'Company | Create')

@section('content')

    <div class="container">
        <div class="row create-wrap">
            <div class="col-md-8 col-md-offset-2">
                <div class="text-center">
                    <br><br>
                    <h2>@lang('admin/companies/crud.create_header')</h2>
                    <p>@lang('admin/companies/crud.create_description')</p>

                    @include('partials._validation_messages')

                </div>
                <form action="{{ route('companies.store') }}" method="post" enctype="multipart/form-data" role="form" class="companyForm">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                    <div class="form-group">
                        <label for="name">@lang('admin/companies/crud.name')</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter company name" required/>
                    </div>

                    <div class="form-group">
                        <label for="email">@lang('admin/companies/crud.email')</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter company email"/>
                    </div>

                    <div class="form-group">
                        <label for="website">@lang('admin/companies/crud.website')</label>
                        <input type="text" name="website" class="form-control" placeholder="Enter company website url"/>
                    </div>

                    <div class="form-group">
                        <label  for="image">@lang('admin/companies/crud.add_logo')</label>
                        <input type="file" name="image" class="file" />
                    </div>
                    <br><br>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg">@lang('admin/companies/crud.create_button')</button>
                        <a href="{{ URL::previous() }}" class="btn btn-danger btn-lg" role="button">@lang('admin/companies/crud.cancel_button')</a>
                    </div>
                </form>
            </div>
        </div>
        <!--/.row-->
    </div>
    <!--/.container-->

@endsection
