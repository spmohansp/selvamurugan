@extends('admin.layout.master')

@section('Master')
    active
@endsection


@section('content')
    <div class="row page-titles">
        <div class="col-md-12 align-self-center">
            <h4 class="theme-cl">Chemicals</h4>
            <a href="{{ url('/admin/Chemicals/Add') }}"><button type="button" class="btn btn-outline-warning btn-rounded btn-primary pull-right ">Add Chemical</button></a>
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
                        <th>Chemical Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($Customers as $Customer)
                    <tr>
                        <td>{{$Customer->chemical_name}}</td>
                        <td>
                            <form  method="POST" enctype="multipart/form-data" action="{{ route('admin.DeleteChemical',$Customer->id) }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                <a href="{{ route('admin.EditChemical',$Customer->id) }}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
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