@extends('admin.layout.master')

@section('Master')
    active
@endsection


@section('content')
    <div class="row page-titles">
        <div class="col-md-12 align-self-center">
            <h4 class="theme-cl">Edit Company</h4>
        </div>
    </div>
    @include('admin.layout.errors')
    <!-- form -->
    <style>
        .asterisk:after{
            content:"*" ;
            color: red;
    </style>




    <div class="row">
        <div class="col-md-12 col-sm-12">
            <form data-toggle="validator" class="padd-20" method="post" action="{{ route('admin.UpdateCompany',$Company->id) }}" >
                <div class="card">
                    {{ csrf_field() }}
                    <div class="row page-titles">   
                        <div class="align-center">
                            <h4 class="theme-cl">Chemical Information</h4>
                        </div>
                    </div>
                    <div class="row mrg-0">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">Company Name</span></label>
                                <input type="text" class="form-control" name="company_name" value="{{ $Company->company_name }}"  required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Company Address</label>
                                <input type="text" class="form-control" name="company_address" value="{{ $Company->company_address }}"  required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <div class="text-center">
                                <button id="form-button" class="btn gredient-btn">Update Chemical</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
