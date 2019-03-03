@extends('adminlte::page')

@section('title', 'Employees')

@section('content')

    <div class="row">
        <div class="col-md-10">
            <h1>Employees list</h1>

            @include('partials._validation_messages')

        </div>
        <div class="col-md-2">
            <a href="{{ route('employees.create') }}" class="btn btn-lg btn-primary btn-block">New +</a>
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
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Company</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                </tr>
                </thead>
                <tbody>

                @foreach($employees as $employee)

                    <tr>
                        <th scope="row">{{$employee->id}}</th>
                        <td>{{$employee->first_name}}</td>
                        <td>{{$employee->last_name}}</td>
                        <td>{{$employee->company['name']}}</td>
                        <td>{{$employee->email}}</td>
                        <td>{{$employee->phone}}</td>
                        <td>
                            <div class="btn-group">
                                <button><a href="{{ route('employees.show', $employee->id) }}"><i class="fa fa-eye"></i></a>
                                </button>
                                <button><a href="{{ route('employees.edit', $employee->id) }}"><i
                                            class="fa fa-pencil text-warning"></i></a></button>
                                <form action="{{ route('employees.destroy', $employee->id) }}" method="post" role="form"
                                      class="employeeForm">
                                    {{ method_field('DELETE') }}
                                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                    <button type="submit"
                                            onclick='return confirm("Are you sure you want to delete this employee?");'><i
                                            class="fa fa-trash text-danger"></i></button>
                                </form>
                            </div>
                        </td>

                @endforeach

                </tbody>
            </table>
            <div class="text-center">
                {!! $employees->links() !!}
            </div>
        </div>
    </div>
    <!--/.row-->
@endsection
