@extends('admin.layout.master')

@section('Delevery')
    active
@endsection


@section('content')
    <div class="row page-titles">
        <div class="col-md-12 align-self-center">
            <h4 class="theme-cl">Empty Beam Delevery</h4>
            <a href="{{ url('/admin/delevery/emptyBeam/Add') }}"><button type="button" class="btn btn-outline-warning btn-rounded btn-primary pull-right ">Add Empty Beam Delevery</button></a>
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
                    <th>Date</th>
                    <th>Customer</th>
                    <th>Sub Customer</th>
                    <th>Beam Count</th>
                    <th>Beam Inch</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($EmptyBeams as $EmptyBeam)
                    <tr>
                        <td>{{ @$EmptyBeam->date }}</td>
                        <td>{{ @$EmptyBeam->Customer->name }}</td>
                        <td>{{ @$EmptyBeam->SubCustomer->name }}</td>
                        <td>{{ @$EmptyBeam->beam_total }}</td>
                        <td>{{ @$EmptyBeam->beam_inch }}</td>
                        <td>
                            <form  method="post" enctype="multipart/form-data" action="{{ route('admin.EmptyBeamDeleveryDelete',$EmptyBeam->id)  }}" >
                                @csrf
                            <a href="{{ route('admin.EmptyBeamDeleveryEdit',$EmptyBeam->id) }}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
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
