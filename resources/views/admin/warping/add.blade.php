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

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">Date</span></label>
                                <input type="date" class="form-control" name="date"  value="{{ old("date") }}"  required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">Warping Number</span></label>
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
                                <label class="control-label">Total Rewainding Cone KG</label>
                                <input type="text" class="form-control CalculateWarpingBagQuantity CalculateBalanceConeWeight" id="rewainding_weight" name="rewainding_weight"  value="{{ old("rewainding_weight") }}">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Total Baby Cone KG</label>
                                <input type="text" class="form-control CalculateWarpingBagQuantity CalculateBalanceConeWeight" id="baby_cone_weight" name="baby_cone_weight"  value="{{ old("baby_cone_weight") }}">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                      <div class="row page-titles">
                        <div class="align-center">
                            <h4 class="theme-cl">Yarn Details <button type="button" class="btn btn-primary btn-sm AddYarn">+</button></h4>
                        </div>
                    </div>
                    <div class="row mrg-0">
                        <div class="col-sm-12">
                            <div class="AddYarnDiv"></div>
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
                    <div class="row mrg-0">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Remaining Weight</label>
                                <input type="text" class="form-control" name="remaining_cone_weight" id="remaining_cone_weight"  value="{{ old("remaining_cone_weight") }}">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputphone" class="control-label">Note</label>
                                <textarea name="note" class="form-control">{{ old('note') }}</textarea>
                            </div>
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
                    '<input class="form-control CalculateWeight CalculateBalanceConeWeight" min="0" name="warping[' + warpingi + '][totalBeemWeight]" type="number" id="haltFromDate">' +
                    '</div>' +
                    '<div class="col-2">' +
                    '<label class="c-field__label">காலி பீம் எடை</label>' +
                    '<input class="form-control CalculateWeight CalculateBalanceConeWeight" min="0" name="warping[' + warpingi + '][emptyBeemWeight]" type="number" id="emptyBeem">' +
                    '</div>' +
                    '<div class="col-2">' +
                    '<label class="c-field__label">நிகர் எடை</label>' +
                    '<input class="form-control CalculateWeight CalculateBalanceConeWeight" name="warping[' + warpingi + '][totalWeight]" type="number" id="totalWeight" required>' +
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

            $('body').on("keyup paste change", '.CalculateWeight', function (e) { // REMOVE HALT
                e.preventDefault();
                $(".CalculateWeight").prop("required", true);
                for(i=0;i < warpingi;i++){
                    $("input[name='warping[" + i + "][totalWeight]']").val(parseFloat($("input[name='warping[" + i + "][totalBeemWeight]']").val()) - parseFloat($("input[name='warping[" + i + "][emptyBeemWeight]']").val()));
                }
            });


            $('body').on("keyup paste change", '.CalculateBalanceConeWeight', function (e) { // REMOVE HALT
                e.preventDefault();
                var warpingUsedTotal =0;
                for(j=0;j < warpingi;j++){
                    if(($("input[name='warping[" + j + "][totalBeemWeight]']").val() !=  undefined) || ($("input[name='warping[" + j + "][emptyBeemWeight]']").val() != undefined)){
                        warpingUsedTotal += parseFloat($("input[name='warping[" + j + "][totalBeemWeight]']").val()) - parseFloat($("input[name='warping[" + j + "][emptyBeemWeight]']").val());
                    }
                }
                $('#remaining_cone_weight').val(parseFloat($('#net_weight').val() - warpingUsedTotal));
            });

            $('.AddWarpingDiv').on("click", ".RemoveWarpingButon", function (e) { // REMOVE HALT
                e.preventDefault();
                $(this).closest('div').parent('div').remove();
                $('.CalculateBalanceConeWeight').trigger('change');
            });
        });
</script>
<script>
        $(document).ready(function () {
            var yarni = 0;

            $('.AddYarn').click(function (e) {
                e.preventDefault();
                $('.AddYarnDiv').append(
                    '<div class="row">' +
                    '<div class="col-3">' +
                    '<label for="inputphone" class="control-label">Yarn Company</label>'+
                            '<select name="company_id" class="form-control">'+
                                '<option value="">Yarn Company</option>'+
                                    '@foreach(auth()->user()->getAllCompanies() as $Company)'+
                                        '<option value="{{ $Company->id }}" {{ ($Company->id ==  @$WarpingYarn->company_id)?'selected':'' }}>{{ $Company->company_name }}</option>'+
                                    '@endforeach'+
                                '</select>'+
                    '</div>'+
                    '<div class="col-2">' +
                    '<label class="c-field__label">Yarn Count</label>' +
                    '<input class="form-control" name="WarpingYarn[' + yarni + '][yarn_count]" type="number" id="yarn_count" required>' +
                    '</div>' +
                    '<div class="col-2">' +
                    '<label class="c-field__label">Total Bag</label>' +
                    '<input class="form-control" name="WarpingYarn[' + yarni + '][total_bag]" type="number" id="total_bag" required>' +
                    '</div>' +
                    '<div class="col-2">' +
                    '<label class="c-field__label">KG / Bag</label>' +
                    '<input class="form-control" name="WarpingYarn[' + yarni + '][total_kg_bag]" type="number" id="total_kg_bag" required>' +
                    '</div>' +
                     '<div class="col-2">' +
                    '<label class="c-field__label">Total KG</label>' +
                    '<input class="form-control" name="WarpingYarn[' + yarni + '][total_kg]" type="number" id="total_kg" required>' +
                    '</div>' +
                    '<div class="col-1">' +
                    '<button type="button" class="btn btn-danger btn-sm RemoveYarnButton">X</button>' +
                    '</div>' +
                    '</div>'
                );
                yarni++;

            });
            

            $('.AddYarnDiv').on("click", ".RemoveYarnButton", function (e) { // REMOVE HALT
                e.preventDefault();
                $(this).closest('div').parent('div').remove();
            });
        });
</script>

@endsection