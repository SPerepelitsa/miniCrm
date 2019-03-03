@extends('adminlte::page')

@section('title', 'Employee | Edit')

@section('content')

    <div class="container">
        <div class="row create-wrap">
            <div class="col-md-8 col-md-offset-2">
                <div class="text-center">
                    <br><br>
                    <h2>Edit employee</h2>
                    <p>Fill in all all fields and press "edit" button.</p>

                    @include('partials._validation_messages')

                </div>
                <form action="{{ route('employees.update', $employee->id) }}" method="post" role="form" class="employeeForm">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" class="form-control" placeholder="Enter employee name" value="{{ $employee->first_name }}" required/>
                    </div>

                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" class="form-control" placeholder="Enter employee last name" value="{{ $employee->last_name }}" required/>
                    </div>

                    <div class="form-group">
                        <label for="company_id" class="control-label">Company</label>
                        <select id="company_id" name="company_id" class="form-control" required autofocus>
                            <option selected="selected" value="{{ $employee->company->id }}"> {{ $employee->company->name }} </option>

                            @foreach($companies as $company)
                                <option value="{{ $company->id }}"> {{ $company->name }} </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter employee email" value="{{ $employee->email }}"/>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" class="form-control" placeholder="Enter employee phone number" value="{{ $employee->phone }}" required/>
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

