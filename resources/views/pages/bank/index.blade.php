@extends('layouts.user', ['title' => 'Bank Details'])
@section('css')

@endsection
@section('js')
    <script src="{{ asset('assets/lib/select2/js/select2.min.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $(".drop-down").select2();
        });
    </script>
@endsection
@section('content')
    <div class="be-content">
        <aside class="page-aside hidden-sm">
            <div class="be-scroller nano">
                <div class="nano-content">
                    <div class="content">
                        <p>You need to enter your banking information into the Dashboard so we can transfer your earnings</p>
                        <p>At <i>bank detail</i> section, you can add, delete and update your Banking Information</p>
                            <p>Enter your beneficiary of your name and account number. You can find this information on one of your personal checks, or get it by contacting your bank.</p>
                        <hr>
                        <img src="{{ asset('assets/img/bank-list-m.png') }}" class="img-responsive" alt="banks">
                    </div>
                </div>
            </div>
        </aside>
        <div class="main-content container-fluid">

            @if($adaUserID)
                <div class="col-sm-7 col-sm-offset-4">

                    <div class="panel panel-default">
                        <div class="panel-heading panel-heading-divider xs-pb-15">Bank details</div>
                        <div class="panel-body xs-pt-25">
                            @include('_partials_.messagebank')
                            <div class="row ">
                                <div class="col-md-5"><span class="title">Beneficiary name</span></div>
                                <div class="col-md-7">
                                    <p style="font-size: 16px">{{  Auth::user()->bank->bankowner}}</p>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-5"><span class="title">Name of banks</span></div>
                                <div class="col-md-7">
                                    <p style="font-size: 16px">{{  Auth::user()->bank->bankname}}</p>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-5"><span class="title">Bank account no.</span></div>
                                <div class="col-md-7">
                                    <p style="font-size: 16px">{{  Auth::user()->bank->bankaccnum}}</p>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-5"><span class="title">SWIFT / IBAN code</span></div>
                                <div class="col-md-7">
                                    <p style="font-size: 16px">@if( empty(Auth::user()->bank->swiftcode))
                                            None
                                        @else
                                            {{ Auth::user()->bank->swiftcode }}
                                        @endif</p>
                                </div>
                        </div>
                            <hr>
                            <span style="font-size: x-small">*Delete this details if you need to add new banks info</span>

                            {!! Form::open([
                                       'method' => 'DELETE',
                                       'action' => ['BankController@buangBank', Auth::user()->bank->id]
                                   ]) !!}
                            {!! Form::submit('Remove this?', ['class' => 'btn btn-primary btn-lg pull-right']) !!}
                            {!! Form::close() !!}
                    </div>
                </div>
                @else
                    <!-- start bank -->
                            <div class="col-sm-7 col-sm-offset-4">
                                <div class="panel panel-default panel-border-color ">

                                    <div class="panel-heading panel-heading-divider"><span class="panel-subtitle">Please fills the form of bank detail</span>
                                    </div>
                                    <div class="panel-body">
                                        @include('_partials_.messagebank')
                                        {!! Form::open(array('action' => 'BankController@simpanBank')) !!}
                                        <div class="form-group xs-pt-10 ">
                                            {{ Form::label('beneficiary_name', 'Beneficiary name') }}
                                            {{ Form::text('beneficiary_name', Auth::user()->name , ['class' => 'form-control', 'placeholder' => 'Name of Beneficiary ']) }}
                                            @if ($errors->has('beneficiary_name'))<p
                                                    class="text-danger">{{ $errors->first('beneficiary_name') }}</p>@endif
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('bank_name', 'Bank Name') }}
                                            {{ Form::select('bank_name', $banklist, null, ['placeholder' => 'Select Your Bank...', 'class' => 'form-control select2 drop-down', 'style' => 'width: 100%;']) }}
                                            @if ($errors->has('bank_name'))<p
                                                    class="text-danger">{{ $errors->first('bank_name') }}</p>@endif
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('bank_account_number ', 'Bank Account No.') }}
                                            {{ Form::text('bank_account_number', null, ['class' => 'form-control', 'placeholder' => 'Bank Account Number']) }}
                                            @if ($errors->has('bank_account_number'))<p
                                                    class="text-danger">{{ $errors->first('bank_account_number') }}</p>@endif
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('swift_code', 'Swift Code ') }}
                                            {{ Form::text('swift_code', null, ['class' => 'form-control', 'placeholder' => '*Optional']) }}
                                        </div>
                                        <div class="row xs-pt-15">
                                            <div class="col-xs-12">
                                                <button class="pull-right btn btn-lg  btn-primary" type="submit">Submit
                                                    bank info
                                                </button>
                                            </div>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                    @endif
                </div>
        </div>
    </div>
@endsection
