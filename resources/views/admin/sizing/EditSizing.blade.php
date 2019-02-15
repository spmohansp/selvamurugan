@extends('admin.layout.master')

@section('Sizing')
    active
@endsection


@section('content')

    <div class="row page-titles">
        <div class="col-md-12 align-self-center">
            <h4 class="theme-cl">Edit Sizing</h4>
        </div>
    </div>
    @include('admin.layout.errors')
    <!-- form -->
    <style>
        .asterisk:after{
            content:"*" ;
            color: red;
    </style>
<!-- {{ $Sizing }}
 -->
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <form data-toggle="validator" class="padd-20" method="post" action="{{ route('admin.UpdateSizing',$Sizing->id) }}">
                <div class="card">
                    {{ csrf_field() }}
                    <div class="row page-titles">
                        <div class="align-center">
                            <h4 class="theme-cl">Sizing Information</h4>
                        </div>
                    </div>
                    <div class="row mrg-0">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">Date</span></label>
                                <input type="date" class="form-control" name="date"  value="{{ $Sizing->date }}"  required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">லேப் லென்த் </span></label>
                                <input type="text" class="form-control" name="lab_length"  value="{{ $Sizing->lab_length }}"  required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">பல் சக்கரம்</label>
                                <input type="text" class="form-control" name="palsekaram"  value="{{ $Sizing->palsekaram }}">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">வார்பிங் எடை</label>
                                <input type="text" class="form-control" name="warp_weight"  value="{{ $Sizing->warp_weight }}">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Gegam</label>
                               <input type="text" class="form-control" name="gegam"  value="{{ $Sizing->gegam }}">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>



                    <div class="col-12">
                        <div class="form-group">
                            <div class="text-center">
                                <button id="form-button" class="btn gredient-btn">Update Sizing</button>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>

@endsection


