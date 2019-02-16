@extends('admin.layout.master')

@section('IncommingProducts')
active
@endsection


@section('content')
<div class="row page-titles">
    <div class="col-md-12 align-self-center">
        <h4 class="theme-cl">Add Customer Yarn</h4>
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
        <form data-toggle="validator" class="padd-20" method="post" action="{{ route('admin.AddCustomerYarn') }}">
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
                            <select name="customer_id" class="form-control SearchableDropDownSelect" id="CustomerIdsChanges" required>
                                <option value="">Select Customer</option>
                                @foreach(auth()->user()->getAllCustomers() as $Customer)
                                <option value="{{ $Customer->id }}"
                                    {{ ($Customer->id == old('customer_id'))? 'selected':'' }}>{{ $Customer->name }} | {{ $Customer->mobile }}</option>
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
                            <input type="date" class="form-control" name="date" value="{{ old("date") }}" required="">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputphone" class="control-label"><span class="asterisk">Yarn Company</span></label>
                            <select name="company_id" class="form-control Yarn_company SearchableDropDownSelect" required>
                                <option value="">Yarn Company</option>
                                @foreach(auth()->user()->getAllCompanies() as $Company)
                                <option value="{{ $Company->id }}">{{ $Company->company_name }}</option>
                                @endforeach
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-sm-4" id="total_bag_div">
                        <div class="form-group">
                            <label class="control-label"><span class="asterisk">Total Bag</span></label>
                            <input type="number" class="form-control CalculateYarnBagQuantity" id="total_bag" name="total_bag"
                                value="{{ old("total_bag") }}" required="">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-sm-4" id="total_kg_bag_div">
                        <div class="form-group">
                            <label class="control-label"><span class="asterisk">KG / Bag</span></label>
                            <input type="text" class="form-control CalculateYarnBagQuantity" id="total_kg_bag" name="total_kg_bag"
                                value="{{ old("total_kg_bag") }}" required="">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label"><span class="asterisk">Net Weight</span></label>
                            <input type="text" class="form-control" name="net_weight" id="net_weight" value="{{ old("net_weight") }}"
                                readonly="">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label"><span class="asterisk">Color</span></label>
                            <input type="text" class="form-control" name="color" value="{{ old("color") }}" required="">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="inputphone" class="control-label"><span class="asterisk">Yarn Count</span></label>
                            <input type="number" name="yarn_count" class="form-control" value="{{ old('yarn_count') }}"
                                required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="inputphone" class="control-label">Note</label>
                            <textarea name="note" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <div class="text-center">
                            <button id="form-button" class="btn gredient-btn">Add Yarn</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
