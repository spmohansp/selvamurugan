@extends('admin.layout.master')

@section('Master')
    active
@endsection


@section('content')
    <div class="row page-titles">
        <div class="col-md-12 align-self-center">
            <h4 class="theme-cl">Companies</h4>
            <a href="{{ url('/admin/companies/Add') }}"><button type="button" class="btn btn-outline-warning btn-rounded btn-primary pull-right ">Add company</button></a>
        </div>
    </div>
    @include('admin.layout.errors')
    <!-- form -->
    <style>
        .asterisk:after{
            content:"*" ;
            color: red;
    </style>



    <div class="card">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Company Name</th>
                        <th>Company Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($Companies as $company)
                        <tr>
                            <td>{{ $company->company_name }}</td>
                            <td>{{ $company->company_address }}</td>
                            <td>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <a href="" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i> </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection