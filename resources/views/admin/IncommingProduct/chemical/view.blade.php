@extends('admin.layout.master')

@section('IncommingProducts')
    active
@endsection


@section('content')
    <div class="row page-titles">
        <div class="col-md-12 align-self-center">
            <h4 class="theme-cl">Incomming Chemicals</h4>
            <a href="{{ url('/admin/Chemicals/Add') }}"><button type="button" class="btn btn-outline-warning btn-rounded btn-primary pull-right ">Add Incomming Chemical</button></a>
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
                    <th>Unit</th>
                    <th>Chemical</th>
                    <th>Count</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($IncomeChemicals as $IncomeChemical)
                    <tr>
                        <td>{{ @$IncomeChemical->date }}</td>
                        <td>{{ @$IncomeChemical->Unit->name }}</td>
                        <td>{{ @$IncomeChemical->Chemical->chemical_name }}</td>
                        <td>{{ $IncomeChemical->count }}</td>
                        <td>
                            <form  method="POST" action=" {{ route('admin.DeleteIncomeChemical',$IncomeChemical->id) }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                <a href=" {{ route('admin.EditIncomeChemical',$IncomeChemical->id)  }}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
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
