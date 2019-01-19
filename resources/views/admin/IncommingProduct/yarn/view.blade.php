@extends('admin.layout.master')

@section('IncommingProducts')
    active
@endsection


@section('content')
    <div class="row page-titles">
        <div class="col-md-12 align-self-center">
            <h4 class="theme-cl">Yarn</h4>
            <a href="{{ url('/admin/Product/yarn/Add') }}"><button type="button" class="btn btn-outline-warning btn-rounded btn-primary pull-right ">Add Customer Yarn</button></a>
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
                    <th>Yarn Total</th>
                    <th>Yarn Count</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($IncomeYarns as $IncomeYarn)
                        <tr>
                            <td>{{ $IncomeYarn->date }}</td>
                            <td>{{ @$IncomeYarn->Customer->name }}</td>
                            <td>{{ @$IncomeYarn->SubCustomer->name }}</td>
                            <td>{{ $IncomeYarn->net_weight }}</td>
                            <td>{{ $IncomeYarn->yarn_count }}</td>
                            <td>
                                <form  method="POST" action="{{ route('admin.IncomeYarnDelete',$IncomeYarn->id) }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <a href="{{ route('admin.IncomeYarnEdit',$IncomeYarn->id)  }}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
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
