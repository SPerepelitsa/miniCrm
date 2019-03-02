@extends('adminlte::page')

@section('title', 'Companies')

@section('content')

    <div class="row">
        <div class="col-md-10">
            <h1>Companies list</h1>

            @include('partials._validation_messages')

        </div>
        <div class="col-md-2">
            <a href="{{ route('companies.create') }}" class="btn btn-lg btn-primary btn-block">New +</a>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
    </div> <!-- end of a .row-->

    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Logo</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Website</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($companies as $company)

                    <tr>
                        <th scope="row">{{$company->id}}</th>
                        <td>{{$company->logo}}</td>
                        <td>{{$company->name}}</td>
                        <td>{{$company->email}}</td>
                        <td>{{$company->website}}</td>
                        <td>
                            <div class="btn-group">
                                <button><a href="{{ route('companies.show', $company->id) }}"><i class="fa fa-eye"></i></a>
                                </button>
                                <button><a href="{{ route('companies.edit', $company->id) }}"><i
                                            class="fa fa-pencil text-warning"></i></a></button>
                                <form action="{{ route('companies.destroy', $company->id) }}" method="post" role="form"
                                      class="companyForm">
                                    {{ method_field('DELETE') }}
                                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                    <button type="submit"
                                            onclick='return confirm("Are you sure you want to delete this post?");'><i
                                            class="fa fa-trash text-danger"></i></button>
                                </form>
                            </div>
                        </td>

                @endforeach

                </tbody>
            </table>
            <div class="text-center">
            {!! $companies->links() !!}
            </div>
        </div>
    </div>
    <!--/.row-->
@endsection
