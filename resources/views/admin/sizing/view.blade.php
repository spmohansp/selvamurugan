@extends('admin.layout.master')

@section('Sizing')
    active
@endsection


@section('content')
    <div class="row page-titles">
        <div class="col-md-12 align-self-center">
            <h4 class="theme-cl">Sizing</h4>
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
                    <th>Set Number</th>
                    <th>Date</th>
                    <th>Customer</th>
                    <th>Net_Weight</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($Sizings as $Sizing)
                        <tr>
                            <td>{{ @$Sizing->Warping->set_number }}</td>
                            <td></td>
                            <td>{{ @$Sizing->Warping->Customer->name }}</td>
                            <td>{{ @$Sizing->Warping->net_weight }}</td>
                            <td>
                                <a href="{{ route('admin.ViewSizingSetList',$Sizing->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('admin.EditSizing',$Sizing->id) }}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection