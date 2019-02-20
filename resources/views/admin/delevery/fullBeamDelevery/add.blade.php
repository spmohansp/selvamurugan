@extends('admin.layout.master')

@section('Delevery')
active
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
        <form data-toggle="validator" class="padd-20" method="post" action="{{ route('admin.AddCustomerFullBeamDelevery') }}">
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
                            <label class="control-label"><span class="asterisk">Date</span></label>
                            <input type="date" class="form-control" name="date"  value="{{ old("date") }}"  required="" >
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Tex Name</label>
                            <input type="text" class="form-control" name="tex_name"  value="{{ old("tex_name") }}">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label"><span class="asterisk">Customer Name</span></label>
                            <select name="customer_id" class="form-control SearchableDropDownSelect DeleveryChanges DeleverCustomerId" id="CustomerIdsChanges" required>
                                <option value="" disabled="" selected>Select Customer</option>
                                @foreach(auth()->user()->getAllCustomers() as $Customer)
                                    <option value="{{ $Customer->id }}" {{ ($Customer->id == old('customer_id'))? 'selected':'' }}>{{ $Customer->name }} | {{ $Customer->mobile }}</option>
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
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label"><span class="asterisk">Beam Detail List</span></label>
                            <div id="NonDeleverBeamListDiv"></div>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <button type="button" id="AddFullBeamDelevery" class="btn btn-primary btn-sm">Add Beam</button>
                        </div>
                    </div>
                </div>
                <div class="row page-titles">
                    <div class="align-center">
                        <h4 class="theme-cl">Beam Delever Details</h4>
                    </div>
                </div>
                <div class="row mrg-0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Beam Number</th>
                                <th>Total Meter</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="AddSizingBEamDeleveryDiv">

                        </tbody>
                    </table>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <div class="text-center">
                            <button id="form-button" class="btn gredient-btn">Add Delevery</button>
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
            $('.AddSizingBEamDeleveryDiv').on("click", ".RemoveSizingBeam", function (e) { // REMOVE HALT
                e.preventDefault();
                $(this).parent().parent().remove();
            });
        });
    </script>
@endsection