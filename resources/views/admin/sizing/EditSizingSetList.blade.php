@extends('admin.layout.master')

@section('Sizing')
    active
@endsection


@section('content')

    @include('admin.layout.errors')
    <!-- form -->
    <style>
        .asterisk:after{
            content:"*" ;
            color: red;
    </style>

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <form data-toggle="validator" class="padd-20" method="post" action="{{ route('admin.UpdateSizingBeamSetList',$SizingSetList->id) }}">
                <div class="card">
                    {{ csrf_field() }}
                    <div class="row page-titles">
                        <div class="align-center">
                            <h4 class="theme-cl">Edit Beam Information</h4>
                        </div>
                    </div>

                    <div class="row mrg-0">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">GW</span></label>
                                <input type="text" class="form-control" name="gw"  value="{{ $SizingSetList->gw }}"  required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">TW</span></label>
                                <input type="text" class="form-control" name="tw"  value="{{ $SizingSetList->tw }}"  required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">NW</span></label>
                                <input type="text" class="form-control" name="nw"  value="{{ $SizingSetList->nw }}"  required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label">குறி</label>
                                <input type="text" class="form-control" name="kuri"  value="{{ $SizingSetList->kuri }}">
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">மீட்டர்</span></label>
                                <input type="text" class="form-control" name="meter"  value="{{ $SizingSetList->meter }}"  required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">பீம் நெ</span></label>
                                <input type="number" class="form-control" name="beam_number" min="0"  value="{{ (empty(old("beam_number")))? @$SizingBeamsLastData->beam_number+1:old("beam_number") }}"  required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label">கஞ்சி</label>
                                <input type="text" class="form-control" name="kanchi"  value="{{ $SizingSetList->kanchi }}" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label">பெயர்</label>
                                <input type="text" class="form-control" name="name" value="{{ $SizingSetList->name }}">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <div class="text-center">
                                <button type="submit" class="btn gredient-btn">Update Sizing Beam</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
