@extends('admin.layout.master')

@section('Sizing')
    active
@endsection


@section('content')
    <div class="row page-titles">
        <div class="col-md-12 align-self-center">
            <h4 class="theme-cl">Sizing Set List -  <b>{{ @$Sizing->Warping->set_number }}</b></h4>
        </div>
    </div>
    @include('admin.layout.errors')
    <!-- form -->
    <style>
        .asterisk:after{
            content:"*" ;
            color: red;
    </style>


    <div class="shadow-lg p-3 mb-5 bg-white rounded">
        <div class="row">
            <div class="col-sm-3">
                <div class="alert alert-success" role="alert">
                    Customer  : {{ @$Sizing->Warping->Customer->name }}
                </div>
            </div>
            <div class="col-sm-2">
                <div class="alert alert-info" role="alert">
                    மொத்த பாவு  : {{ count(@$SizingBeams) }}
                </div>
            </div>
            <div class="col-sm-2">
                <div class="alert alert-info" role="alert">
                    மொத்த மீ  : {{ $SizingBeams->sum('meter') }}
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12 col-sm-12">
            <form data-toggle="validator" class="padd-20" method="post" action="{{ route('admin.AddSizingBeamSetList',$Sizing->id) }}">
                <div class="card">
                    {{ csrf_field() }}
                    <div class="row page-titles">
                        <div class="align-center">
                            <h4 class="theme-cl">Sizing Beam Information</h4>
                        </div>
                    </div>
                    <div class="row mrg-0">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">GW</span></label>
                                <input type="text" class="form-control controlcalculateSizingBeemWeight" name="gw" id="gw" value="{{ old("gw") }}"  required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">TW</span></label>
                                <input type="text" class="form-control controlcalculateSizingBeemWeight" name="tw" id="tw" value="{{ old("tw") }}"  required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">NW</span></label>
                                <input type="text" class="form-control" name="nw" id="nw" value="{{ old("nw") }}"  required="" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label">குறி</label>
                                <input type="text" class="form-control" name="kuri"  value="{{ old("kuri") }}">
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label"><span class="asterisk">மீட்டர்</span></label>
                                <input type="text" class="form-control" name="meter"  value="{{ old("meter") }}"  required="" >
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
                                <input type="text" class="form-control" name="kanchi"  value="{{ old("kanchi") }}" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label">பெயர்</label>
                                <input type="text" class="form-control" name="name" value="{{ old("name") }}">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label">Sub Customer</label>
                                <select class="form-control" name="sub_customer_id" data-parsley-required="true">
                                    <option value="">Select Subcustomer</option>
                                    @foreach ($SubCustomers as $SubCustomer) 
                                        <option value="{{ $SubCustomer->id }}" {{ ($SubCustomer->id == old('sub_customer_id'))? 'selected':'' }}>{{ $SubCustomer->name }}</option>
                                    @endforeach
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <div class="text-center">
                                <button id="form-button" class="btn gredient-btn">Add Sizing Beam</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

{{--VIEW SIZING BEAM LIST--}}

    <div class="card">
        <div class="row page-titles">
            <div class="align-center">
                <h4 class="theme-cl">Sizing Beams</h4>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>பீம் நெ </th>
                    <th>GW</th>
                    <th>TW</th>
                    <th>NW</th>
                    <th>குறி</th>
                    <th>மீட்டர்</th>
                    <th>கஞ்சி</th>
                    <th>பெயர்</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($SizingBeams as $SizingBeam)
                        <tr>
                            <td>{{ $SizingBeam->beam_number }}</td>
                            <td>{{ $SizingBeam->gw }}</td>
                            <td>{{ $SizingBeam->tw }}</td>
                            <td>{{ $SizingBeam->nw }}</td>
                            <td>{{ $SizingBeam->kuri }}</td>
                            <td>{{ $SizingBeam->meter }}</td>
                            <td>{{ $SizingBeam->kanchi }}</td>
                            <td>{{ $SizingBeam->name }}</td>
                            <td>
                                <form  method="POST" action="{{ route('admin.DeleteSizingBeamSetList',$SizingBeam->id) }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <a href="{{ route('admin.EditSizingSetList',$SizingBeam->id) }}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i> </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>


@endsection

@section('scriptOnload')
    <script>
        $(document).ready(function () {
            $('.controlcalculateSizingBeemWeight').on("change keyup", function (e) { // REMOVE HALT
                e.preventDefault();
                $("#nw").val(parseFloat($("#gw").val()) - parseFloat($("#tw").val()));
            });
        });
    </script>
@endsection
