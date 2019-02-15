@extends('admin.layout.master')

@section('Delevery')
active
@endsection


@section('scriptOnload')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>$(document).ready(function() {
            $('.js-example-basic-single').select2();
        });</script>
    @endsection
@section('content')


<div class="row page-titles">
    <div class="col-md-12 align-self-center">
        <h4 class="theme-cl">Add Full Beam Delevery</h4>
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
        <form data-toggle="validator" class="padd-20" method="post" action="{{ route('admin.AddWarping') }}">
            <div class="card">
                {{ csrf_field() }}
                <div class="row page-titles">
                    <div class="align-center">
                        <h4 class="theme-cl">Customer Information</h4>
                    </div>
                </div>


                <div class="row mrg-0">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label"><span class="asterisk">Customer Name</span></label>
                            <select name="customer_id" class="form-control js-example-basic-single " id="CustomerIdsChanges" required>
                                <option value="" disabled="" selected>Select Customer</option>
                                @foreach(auth()->user()->getAllCustomers() as $Customer)
                                    <option value="{{ $Customer->id }}" {{ ($Customer->id == old('customer_id'))? 'selected':'' }}>{{ $Customer->name }}</option>
                                @endforeach
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label"><span class="asterisk">Customer Name</span></label>
                            <select name="customer_id" class="form-control" id="CustomerIdsChanges" required>
                                <option value="">Select Customer</option>
                                @foreach(auth()->user()->getAllCustomers() as $Customer)
                                    <option value="{{ $Customer->id }}" {{ ($Customer->id == old('customer_id'))? 'selected':'' }}>{{ $Customer->name }}</option>
                                @endforeach
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label"><span class="asterisk">Sub Customer Name</span></label>
                            <div id="SubCustomerDivDataLoad"></div>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection