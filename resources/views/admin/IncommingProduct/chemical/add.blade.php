@extends('admin.layout.master')

@section('IncommingProducts')
    active
@endsection


@section('content')
    <div class="row page-titles">
        <div class="col-md-12 align-self-center">
            <h4 class="theme-cl">Add Chemical</h4>
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
            <form data-toggle="validator" class="padd-20" method="post" action="">
                <div class="card">
                    {{ csrf_field() }}
                    <div class="row page-titles">
                        <div class="align-center">
                            <h4 class="theme-cl">Chemical Information</h4>
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
                                <label class="control-label"><span class="asterisk">Date</span></label>
                                <input type="date" class="form-control" name="date"  value="{{ old("date") }}"  required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">Chemical Name</span></label>
                                <select name="chemical_id" class="form-control" required>
                                    <option value="">Select Chemical</option>
                                    @foreach($Chemicals as $Chemical)
                                        <option value="{{ $Chemical->id }}">{{ $Chemical->chemical_name }}</option>
                                    @endforeach
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="inputphone" class="control-label"><span class="asterisk">Total Bag</span></label>
                                <input type="number" name="count" class="form-control" value="{{ old('count') }}" required="">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="inputphone" class="control-label"><span class="asterisk">Cost Per</span></label>
                                <input type="number" name="cost" class="form-control" value="{{ old('cost') }}" required="">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="inputphone" class="control-label"><span class="asterisk">Total</span></label>
                                <input type="number" name="total" class="form-control" value="{{ old('total') }}" required="">
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
                                <button id="form-button" class="btn gredient-btn">Add Chemical</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
