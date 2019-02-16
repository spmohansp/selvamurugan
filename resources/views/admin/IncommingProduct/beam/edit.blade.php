@extends('admin.layout.master')

@section('IncommingProducts')
    active
@endsection


@section('content')
    <div class="row page-titles">
        <div class="col-md-12 align-self-center">
            <h4 class="theme-cl">Add Customer Beam</h4>
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
            <form data-toggle="validator" class="padd-20" method="post" action="{{ route('admin.IncomeBeamUpdate',$IncomeBeam->id) }}" >
                <div class="card">
                    {{ csrf_field() }}
                    <div class="row page-titles">
                        <div class="align-center">
                            <h4 class="theme-cl">Customer Information</h4>
                        </div>
                    </div>
                           
                                    
                                     
            <div class="row mrg-0">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="control-label"><span class="asterisk">Unit</span></label>
                        <select name="unit_id" class="form-control" required>
                            @foreach(auth()->user()->getAllUnits() as $Unit)
                            <option value="{{ $Unit->id }}"{{ ($Unit->id == $IncomeBeam->unit_id) ?'selected':'' }} >{{ $Unit->name }}</option>
                            @endforeach
                         </select>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">Customer Name</span></label>
                                <select name="customer_id" class="form-control SearchableDropDownSelect" id="CustomerIdsChanges" required>
                                    <option value="">Select Customer</option>
                                    @foreach(auth()->user()->getAllCustomers() as $Customer)
                                        <option value="{{ $Customer->id }}" {{ ($Customer->id == $IncomeBeam->customer_id)? 'selected':'' }}>{{ $Customer->name }} | {{ $Customer->mobile }}</option>
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

                        <hr>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">Date</span></label>
                                <input type="date" class="form-control" name="date"  value="{{ $IncomeBeam->date }}"  required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="inputphone" class="control-label"><span class="asterisk">Total Beam</span></label>
                                <input type="number" name="beam_total" class="form-control" value="{{ $IncomeBeam->beam_total }}" required="">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">Beam Inch</span></label>
                                <input type="number" class="form-control" name="beam_inch"  value="{{ $IncomeBeam->beam_inch }}" required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputphone" class="control-label">Note</label>
                                <textarea name="note" class="form-control">{{$IncomeBeam->note}}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <div class="text-center">
                                <button id="form-button" class="btn gredient-btn">Update Customer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('scriptOnload')
    <script>
        $(document).ready(function () {
            @if(!empty($IncomeBeam->sub_customer_id))
                $("#CustomerIdsChanges").trigger('change');
            @endif()
            setTimeout(function(){
                $("#sub_customer_id option[value='<?php echo $IncomeBeam->sub_customer_id ?>']").attr("selected",true);
            }, 500);
        });
    </script>
@endsection
