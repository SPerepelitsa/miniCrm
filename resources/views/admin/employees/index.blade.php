@extends('adminlte::page')

@section('title', 'Employees')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endpush

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
            <table id="employeesTable" class="table table-hover">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Company</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th class="no-sort" scope="col" width="200">Action</th>
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
                            <form action="{{ route('employees.destroy', $employee->id) }}" method="post" role="form" class="employeeForm">
                                <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-primary">Show</a>
                                <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning">Edit</a>
                                {{ method_field('DELETE') }}
                                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                <button class="btn btn-danger" type="submit" onclick='return confirm("Are you sure you want to delete this employee?");'>
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>

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

@section('js')
    <script type="text/javascript">
        $(document).ready( function () {
            $('#employeesTable').DataTable({
                "bPaginate": false,
                "bLengthChange": false,
                "bFilter": true,
                "bInfo": false,
                "bAutoWidth": false,
                "lengthChange": false,
                "columnDefs": [ {
                    "targets": 'no-sort',
                    "orderable": false,
                } ]
            });
        });
    </script>
@endsection
