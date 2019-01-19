@extends('admin.layout.master')

@section('IncommingProducts')
    active
@endsection


@section('content')
    <div class="row page-titles">
        <div class="col-md-12 align-self-center">
            <h4 class="theme-cl">Edit Customer Yarn</h4>
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
            <form data-toggle="validator" class="padd-20" method="post" action="{{ route('admin.IncomeYarnUpdate',$IncomeYarn->id) }}" >
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
                                        <option value="{{ $Unit->id }}">{{ $Unit->name }}</option>
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
                                        <option value="{{ $Customer->id }}" {{ ($Customer->id == $IncomeYarn->customer_id)? 'selected':'' }}>{{ $Customer->name }}</option>
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
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">Date</span></label>
                                <input type="date" class="form-control" name="date"  value="{{ $IncomeYarn->date }}"  required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputphone" class="control-label"><span class="asterisk">Yarn Company</span></label>
                                <select name="company_id" class="form-control" required>
                                    <option value="">Yarn Company</option>
                                    @foreach($IncomeYarn->Companies as $Company)
                                        <option value="{{ $Company->id }}" {{ ($Company->id == $IncomeYarn->company_id)? 'selected':'' }}>{{ $Customer->name }}</option>
                                    @endforeach
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="inputphone" class="control-label">Yarn Type</label><br>
                                <input type="radio" class="YarnType" value="full" name="yarn_type" {{ $IncomeYarn->yarn_type == 'full'?'checked':''  }}>&nbsp;Full Cone
                                <input type="radio" class="YarnType" value="warping" name="yarn_type" {{ $IncomeYarn->yarn_type == 'warping'?'checked':''  }}>&nbsp;Warping
                                <input type="radio" class="YarnType" value="baby" name="yarn_type" {{ $IncomeYarn->yarn_type == 'baby'?'checked':''  }}>&nbsp;Baby Cone
                            </div>
                        </div>
                        <div class="col-sm-4" id="total_bag_div">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">Total Bag</span></label>
                                <input type="number" class="form-control CalculateYarnBagQuantity" id="total_bag" name="total_bag"  value="{{ $IncomeYarn->total_bag }}"  required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-4" id="total_kg_bag_div">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">KG / Bag</span></label>
                                <input type="text" class="form-control CalculateYarnBagQuantity" id="total_kg_bag" name="total_kg_bag"  value="{{ $IncomeYarn->total_kg_bag }}"  required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">Net Weight</span></label>
                                <input type="text" class="form-control" name="net_weight" id="net_weight"  value="{{ $IncomeYarn->net_weight }}" readonly="">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">Color</span></label>
                                <input type="text" class="form-control" name="color" value="{{ $IncomeYarn->color }}"  required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="inputphone" class="control-label"><span class="asterisk">Yarn Count</span></label>
                                <input type="number" name="yarn_count" class="form-control" value="{{ $IncomeYarn->yarn_count }}" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="inputphone" class="control-label">Note</label>
                                <textarea name="note" class="form-control">{{ $IncomeYarn->note  }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <div class="text-center">
                                <button id="form-button" class="btn gredient-btn">Update Yarn</button>
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
            @if(!empty($IncomeYarn->sub_customer_id))
            $("#CustomerIdsChanges").trigger('change');
            @endif()
            setTimeout(function(){
                $("#sub_customer_id option[value='<?php echo $IncomeYarn->sub_customer_id ?>']").attr("selected",true);
            }, 500);
            $( window ).load(function() {
                console.log($('.YarnType').val());
                if ($('.YarnType').val() == 'full') {
                    $('#net_weight').attr('readonly', true);
                    $('#total_bag_div').show();
                    $('#total_kg_bag_div').show();
                    $('#total_kg_bag').attr('required', true);
                    $('#total_bag').attr('required', true);
                    $('#net_weight').attr('required', false);
                } else if ($('.YarnType').val() == 'baby') {
                    $('#net_weight').attr('readonly', false);
                    $('#net_weight').attr('required', true);
                    $('#total_kg_bag').attr('required', false);
                    $('#total_bag').attr('required', false);
                    $('#total_bag').val('');
                    $('#net_weight').val('');
                    $('#total_kg_bag').val('');
                    $('#total_bag_div').hide();
                    $('#total_kg_bag_div').hide();
                } else if ($('.YarnType').val() == 'warping') {
                    $('#net_weight').attr('readonly', false);
                    $('#net_weight').attr('required', true);
                    $('#total_kg_bag').attr('required', false);
                    $('#total_bag').attr('required', false);
                    $('#total_bag').val('');
                    $('#net_weight').val('');
                    $('#total_kg_bag').val('');
                    $('#total_bag_div').hide();
                    $('#total_kg_bag_div').hide();
                }
            })

        });

    </script>
@endsection


