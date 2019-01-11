@extends('admin.layout.master')

@section('IncommingProducts')
    active
@endsection


@section('content')
    <div class="row page-titles">
        <div class="col-md-12 align-self-center">
            <h4 class="theme-cl">Beam</h4>
            <a href="{{ url('/admin/Product/beam/Add') }}"><button type="button" class="btn btn-outline-warning btn-rounded btn-primary pull-right ">Add Customer Beam</button></a>
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
                    @foreach($Beams as $Beam)
                    <tr>
                        <td>{{ $Beam->date }}</td>
                        <td>
                            @foreach($Beam->Customer as $customers)
                             {{ $customers->name  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach($Beam->SubCustomer as $customers)
                              {{ $customers->name }}
                            @endforeach
                        </td>
                        <td>{{ $Beam->beam_total }}</td>
                        <td>{{ $Beam->beam_inch }}</td> 
                        <td>
                            <a href="{{ route('admin.IncomeBeamEdit',$Beam->id) }}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i> </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection