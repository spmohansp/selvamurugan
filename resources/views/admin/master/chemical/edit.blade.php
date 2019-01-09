@extends('admin.layout.master')

@section('Master')
    active
@endsection


@section('content')
    <div class="row page-titles">
        <div class="col-md-12 align-self-center">
            <h4 class="theme-cl">Edit Chemical</h4>
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
            <form data-toggle="validator" class="padd-20" method="post" action="{{ route('admin.UpdateChemicalProduct',$Chemical->id) }}" >
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
                                <label class="control-label"><span class="asterisk">Chemical Name</span></label>
                                <input type="text" class="form-control" name="chemical_name" value="{{ $Chemical->chemical_name }}"  required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">Unit</span></label>
                                <select name="unit" class="form-control">
                                    <option value="" selected disabled>Select Unit Type</option>
                                    <option value="litre" {{ ($Chemical->unit) == "litre"?'selected':'' }} > Litre </option>
                                    <option value="kg"    {{ ($Chemical->unit) == "kg"?'selected':'' }} > KG</option>
                                    <option value="ton"   {{ ($Chemical->unit) == "ton"?'selected':'' }} >Ton</option>
                                </select>
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
