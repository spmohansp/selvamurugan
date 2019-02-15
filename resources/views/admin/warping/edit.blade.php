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
            <form data-toggle="validator" class="padd-20" method="post" action="{{ route('admin.UpdateWarping',$Warping->id) }}">
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
                                        <option value="{{ $Unit->id }}" {{ ($Warping->unit_id == $Unit->id )?'selected':'' }}>{{ $Unit->name }}</option>
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
                                        <option value="{{ $Customer->id }}" {{ ($Customer->id == $Warping->customer_id)? 'selected':'' }}>{{ $Customer->name }}</option>
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
                                <input type="date" class="form-control" name="date"  value="{{ $Warping->date }}"  required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">Set Number</span></label>
                                <input type="number" class="form-control" name="set_number"  value="{{ $Warping->set_number }}"  required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">Yarn Count</span></label>
                                <input type="number" class="form-control" name="yarn_count"  value="{{ $Warping->yarn_count }}"  required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">இழை</span></label>
                                <input type="number" class="form-control" name="ilai"  value="{{ $Warping->ilai }}"  required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Total Rewainding Cone KG</label>
                                <input type="text" class="form-control CalculateWarpingBagQuantity CalculateBalanceConeWeight" id="rewainding_weight" name="rewainding_weight"  value="{{ @$Warping->rewainding_weight }}">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Total Baby Cone KG</label>
                                <input type="text" class="form-control CalculateWarpingBagQuantity CalculateBalanceConeWeight" id="baby_cone_weight" name="baby_cone_weight"  value="{{ @$Warping->baby_cone_weight }}">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <hr>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="inputphone" class="control-label"><span class="asterisk">Yarn Company</span></label>
                                <select name="company_id_1" class="form-control" required>
                                    <option value="">Yarn Company</option>
                                    @foreach(auth()->user()->getAllCompanies() as $Company)
                                        <option value="{{ $Company->id }}" {{ ($Company->id ==  @$Warping->company_id_1)?'selected':'' }}>{{ $Company->company_name }}</option>
                                    @endforeach
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">Total Bag</span></label>
                                <input type="number" class="form-control CalculateWarpingBagQuantity CalculateBalanceConeWeight" id="total_bag1" name="total_bag1" value="{{ @$Warping->total_bag1 }}"  required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">KG / Bag</span></label>
                                <input type="text" class="form-control CalculateWarpingBagQuantity CalculateBalanceConeWeight" id="total_kg_bag1" name="total_kg_bag1"  value="{{ @$Warping->total_kg_bag1 }}"  required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="inputphone" class="control-label">Yarn Company</label>
                                <select name="company_id_2" id="company_id_2" class="form-control">
                                    <option value="">Yarn Company</option>
                                    @foreach(auth()->user()->getAllCompanies() as $Company)
                                        <option value="{{ $Company->id }}" {{ ($Company->id ==  @$Warping->company_id_2)?'selected':'' }}>{{ $Company->company_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Total Bag</label>
                                <input type="number" class="form-control CalculateWarpingBagQuantity CalculateBalanceConeWeight" id="total_bag2" name="total_bag2"  value="{{ @$Warping->total_bag2 }}" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">KG / Bag</label>
                                <input type="text" class="form-control CalculateWarpingBagQuantity CalculateBalanceConeWeight" id="total_kg_bag2" name="total_kg_bag2"  value="{{ @$Warping->total_kg_bag2 }}">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <hr>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Net Weight</label>
                                <input type="text" class="form-control" name="net_weight" id="net_weight"  value="{{ @$Warping->net_weight }}" readonly="">
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
                            <div class="AddWarpingDiv">
                                <?php $warpingi = 0?>
                            @if(!empty(unserialize($Warping->warping)))
                                @foreach(unserialize($Warping->warping) as $WarpingData)
                                        <div class="row">
                                            <div class="col-2">
                                                <label class="c-field__label">பாவுடன்</label>
                                                <input class="form-control CalculateWeight CalculateBalanceConeWeight" name="warping[{{ $warpingi }}][totalBeemWeight]" type="number" value="{{ $WarpingData['totalBeemWeight'] }}" id="haltFromDate">
                                            </div>
                                            <div class="col-2">
                                                <label class="c-field__label">காலி பீம் எடை</label>
                                                <input class="form-control CalculateWeight CalculateBalanceConeWeight" name="warping[{{ $warpingi }}][emptyBeemWeight]" type="number" value="{{ $WarpingData['emptyBeemWeight'] }}" id="emptyBeem">
                                            </div>
                                            <div class="col-2">
                                                <label class="c-field__label">நிகர் எடை</label>
                                                <input class="form-control CalculateWeight CalculateBalanceConeWeight" name="warping[{{ $warpingi }}][totalWeight]" value="{{ $WarpingData['totalWeight'] }}" type="number" id="totalWeight" required>
                                            </div>
                                            <div class="col-2">
                                                <label class="c-field__label">வார்ப்பிங் ஜெகம்</label>
                                                <input class="form-control" name="warping[{{ $warpingi }}][warpingGeagam]" type="text" value="{{ $WarpingData['warpingGeagam'] }}" id="warpingGeagam">
                                            </div>
                                            <div class="col-2">
                                                <label class="c-field__label">வார்பர் பெயர்</label>
                                                <input class="form-control" name="warping[{{ $warpingi }}][warperName]" type="text" value="{{ $WarpingData['warperName'] }}" id="warperName">
                                            </div>
                                            <div class="col-2">
                                                <button type="button" class="btn btn-danger btn-sm RemoveWarpingButon">X</button>
                                            </div>
                                        </div>
                                <?php $warpingi++?>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row mrg-0">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Remaining Weight</label>
                                <input type="text" class="form-control" name="remaining_cone_weight" id="remaining_cone_weight"  value="{{ @$Warping->remaining_cone_weight }}">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputphone" class="control-label">Note</label>
                                <textarea name="note" class="form-control">{{ @$Warping->note }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <div class="text-center">
                                <button id="form-button" class="btn gredient-btn">Update Warping</button>
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
            var warpingi = <?php echo $warpingi ?>;

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
            });
        });
    </script>
@endsection