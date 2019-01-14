@extends('admin.layout.master')

@section('Warping')
    active
@endsection


@section('content')
    <div class="row page-titles">
        <div class="col-md-12 align-self-center">
            <h4 class="theme-cl">Add Warping</h4>
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
                            <h4 class="theme-cl">Warping Information</h4>
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

                        <hr>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">Date</span></label>
                                <input type="date" class="form-control" name="date"  value="{{ old("date") }}"  required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">Set Number</span></label>
                                <input type="number" class="form-control" name="set_number"  value="{{ old("set_number") }}"  required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">Yarn Count</span></label>
                                <input type="number" class="form-control" name="yarn_count"  value="{{ old("yarn_count") }}"  required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">இழை</span></label>
                                <input type="number" class="form-control" name="ilai"  value="{{ old("ilai") }}"  required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">Total Bag</span></label>
                                <input type="number" class="form-control CalculateWarpingBagQuantity" id="total_bag" name="total_bag"  value="{{ old("total_bag") }}"  required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">KG / Bag</span></label>
                                <input type="text" class="form-control CalculateWarpingBagQuantity" id="total_kg_bag" name="total_kg_bag"  value="{{ old("total_kg_bag") }}"  required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Total Rewainding Cone KG</label>
                                <input type="text" class="form-control CalculateWarpingBagQuantity" id="rewainding_weight" name="rewainding_weight"  value="{{ old("rewainding_weight") }}">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Net Weight</label>
                                <input type="text" class="form-control" name="net_weight" id="net_weight"  value="{{ old("net_weight") }}" readonly="">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row page-titles">
                        <div class="align-center">
                            <h4 class="theme-cl">Warping Details <button type="button" class="btn btn-primary btn-sm AddWarping">+</button></h4>
                        </div>
                    </div>
                    <div class="row mrg-0">
                        <div class="col-sm-12">
                            <div class="AddWarpingDiv"></div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <div class="text-center">
                                <button id="form-button" class="btn gredient-btn">Add Warping</button>
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
            var warpingi = 0;

            $('.AddWarping').click(function (e) {
                e.preventDefault();
                $('.AddWarpingDiv').append(
                    '<div class="row">' +
                    '<div class="col-2">' +
                    '<label class="c-field__label">பாவுடன்</label>' +
                    '<input class="form-control CalculateWeight" name="warping[' + warpingi + '][totalBeemWeight]" type="number" id="haltFromDate">' +
                    '</div>' +
                    '<div class="col-2">' +
                    '<label class="c-field__label">காலி பீம் எடை</label>' +
                    '<input class="form-control CalculateWeight" name="warping[' + warpingi + '][emptyBeemWeight]" type="number" id="emptyBeem">' +
                    '</div>' +
                    '<div class="col-2">' +
                    '<label class="c-field__label">நிகர் எடை</label>' +
                    '<input class="form-control CalculateWeight" name="warping[' + warpingi + '][totalWeight]" type="number" id="totalWeight" required>' +
                    '</div>' +
                    '<div class="col-2">' +
                    '<label class="c-field__label">வார்ப்பிங் ஜெகம்</label>' +
                    '<input class="form-control" name="warping[' + warpingi + '][warpingGeagam]" type="text" id="warpingGeagam">' +
                    '</div>'+
                    '<div class="col-2">' +
                    '<label class="c-field__label">வார்பர் பெயர்</label>' +
                    '<input class="form-control" name="warping[' + warpingi + '][warperName]" type="text" id="warperName">' +
                    '</div>' +
                    '<div class="col-2">' +
                    '<button type="button" class="btn btn-danger btn-sm RemoveWarpingButon">X</button>' +
                    '</div>' +
                    '</div>'
                );
                warpingi++;

            });

            $('body').on("keyup paste", '.CalculateWeight', function (e) { // REMOVE HALT
                e.preventDefault();
                $(".CalculateWeight").prop("required", true);
                for(i=0;i < warpingi;i++){
                    $("input[name='warping[" + i + "][totalWeight]']").val(parseFloat($("input[name='warping[" + i + "][totalBeemWeight]']").val()) - parseFloat($("input[name='warping[" + i + "][emptyBeemWeight]']").val()));
                }
            });

            $('.AddWarpingDiv').on("click", ".RemoveWarpingButon", function (e) { // REMOVE HALT
                e.preventDefault();
                $(this).closest('div').parent('div').remove();
            });
        });
</script>
@endsection