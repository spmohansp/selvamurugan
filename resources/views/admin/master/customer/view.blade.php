@extends('admin.layout.master')

@section('Master')
    active
@endsection


@section('content')
    <div class="row page-titles">
        <div class="col-md-12 align-self-center">
            <h4 class="theme-cl">Customers</h4>
            <a href="{{ url('/admin/Customer/Add') }}"><button type="button" class="btn btn-outline-warning btn-rounded btn-primary pull-right ">Add Customer</button></a>
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
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Address</th>
                        <th>GST / TIN</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($Customers as $Customer)
                    <tr>
                        <td>{{ $Customer->name }}</td>
                        <td>{{ $Customer->mobile }}</td>
                        <td>{{ $Customer->address }}</td>
                        <td>{{ $Customer->gst }}</td>
                        <td>
                            <form action="" method="POST">
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