@extends('adminlte::page')

@section('title', 'Companies')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endpush

@section('content')

    <div class="row">
        <div class="col-md-10">
            <h1>@lang('admin/companies/index.header')</h1>

            @include('partials._validation_messages')

        </div>
        <div class="col-md-2">
            <a href="{{ route('companies.create') }}" class="btn btn-lg btn-primary btn-block">@lang('admin/companies/index.create_new_button')</a>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
    </div> <!-- end of a .row-->

    <div class="row">
        <div class="col-md-12">
            <table id="companiesTable" class="display">
                <thead>
                <tr>
                    <th scope="col">@lang('admin/companies/index.number')</th>
                    <th scope="col">@lang('admin/companies/index.name')</th>
                    <th scope="col">@lang('admin/companies/index.email')</th>
                    <th scope="col">@lang('admin/companies/index.website')</th>
                    <th class="no-sort" scope="col" width="250">@lang('admin/companies/index.action')</th>
                </tr>
                </thead>
                <tbody>

                @foreach($companies as $company)

                    <tr>
                        <th scope="row">{{$company->id}}</th>
                        <td>{{$company->name}}</td>
                        <td>{{$company->email}}</td>
                        <td>{{$company->website}}</td>
                        <td>
                            <form action="{{ route('companies.destroy', $company->id) }}" method="post" role="form" class="companyForm">
                                <a href="{{ route('companies.show', $company->id) }}" class="btn btn-primary">@lang('admin/companies/index.show_button')</a>
                                <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-warning">@lang('admin/companies/index.edit_button')</a>
                                {{ method_field('DELETE') }}
                                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                <button class="btn btn-danger" type="submit" onclick='return confirm("@lang('admin/companies/index.delete_confirm_message')");'>
                                    @lang('admin/companies/index.delete_button')
                                </button>
                            </form>
                        </td>
                    </tr>

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

@section('js')
    <script type="text/javascript">
        $(document).ready( function () {
            $('#companiesTable').DataTable({
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
