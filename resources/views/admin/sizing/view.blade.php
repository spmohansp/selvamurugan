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
                    <th>Date</th>
                    <th>Customer</th>
                    <th>Set Number</th>
                    <th>Net_Weight</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($Sizings as $Sizing)
                    <tr>
                        <td>Date</td>
                        <td>{{ @$Sizing->Warping->Customer->name }}</td>
                        <td>{{ @$Sizing->Warping->set_number }}</td>
                        <td>{{ @$Sizing->Warping->net_weight }}</td>
                        <td>
                            <form  method="POST" action="">
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