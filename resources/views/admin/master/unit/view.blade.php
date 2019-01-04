@extends('admin.layout.master')

@section('Master')
    active
@endsection


@section('content')
    <div class="row page-titles">
        <div class="col-md-12 align-self-center">
            <h4 class="theme-cl">Units</h4>
            <a href="{{ url('/admin/unit/Add') }}"><button type="button" class="btn btn-outline-warning btn-rounded btn-primary pull-right ">Add Unit</button></a>
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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($Customer as $Customers)
                    <tr>
                        <td>{{ $Customers->name }}</td>
                        <td>{{ $Customers->mobile }}</td>
                        <td>{{ $Customers->address }}</td>
                        <td>
                            <a href="{{ route('admin.unitEdit',$Customers->id) }}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                             </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection