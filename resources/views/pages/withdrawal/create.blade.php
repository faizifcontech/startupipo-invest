@extends('layouts.user', ['title' => 'Request withdrawal'])
@section('css')

@endsection
@section('js')

@endsection

@section('content')
    <div class="be-content">
        <div class="main-content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-border">
                        <div class="panel-heading panel-heading-divider"><span class="panel-subtitle">Please fill the forms to make withdrawal request</span>
                        </div>
                        <div class="panel-body">
                            {!! Form::open(['action' => 'WithdrawController@store', 'style'=>'border-radius: 0px;', 'class'=>'form-horizontal group-border-dashed' ]) !!}
                            <div class="form-group">
                                {{ Form::label('beneficiary_name', 'Beneficiary Name', ['class' => 'col-sm-3 control-label']) }}
                                <div class="col-sm-6">
                                    {{ Form::text('beneficiary_name', $b_name, ['class' => 'form-control']) }}
                                    @if ($errors->has('beneficiary_name'))<p
                                            class="text-danger">{{ $errors->first('beneficiary_name') }}</p>@endif
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('beneficiary_bank', 'Beneficiary Bank', ['class' => 'col-sm-3 control-label']) }}
                                <div class="col-sm-6">
                                    {{ Form::text('beneficiary_bank', $b_bank, ['class' => 'form-control']) }}
                                    @if ($errors->has('beneficiary_bank'))<p
                                            class="text-danger">{{ $errors->first('beneficiary_bank') }}</p>@endif
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('account_no', 'Bank Account No.', ['class' => 'col-sm-3 control-label']) }}
                                <div class="col-sm-6">
                                    {{ Form::text('account_no', $b_accno, ['class' => 'form-control']) }}
                                    @if ($errors->has('account_no'))<p
                                            class="text-danger">{{ $errors->first('account_no') }}</p>@endif
                                </div>
                            </div>
                            @if(!empty(Auth::user()->bank->swiftcode))
                                <div class="form-group">
                                    {{ Form::label('swiftcode', 'SWIFT / IBAN code', ['class' => 'col-sm-3 control-label']) }}
                                    <div class="col-sm-6">
                                        {{ Form::text('swiftcode', Auth::user()->bank->swiftcode, ['class' => 'form-control' ]) }}
                                    </div>
                                </div>
                            @endif
                            <hr>
                            <div class="form-group">
                                {{ Form::label('total_withdrawal', 'Total request', ['class' => 'col-sm-3 control-label']) }}
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" name="total_withdrawal"
                                           placeholder="Your max withdrawal is RM {{ number_format($amount, 2) }}">
                                    @if ($errors->has('total_withdrawal'))
                                        <p class="text-danger">{{ $errors->first('total_withdrawal') }}</p>@endif
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="col-sm-6 col-sm-offset-3  ">
                                    <a class="btn btn-lg btn-default" href="{{ action('BankController@index') }}">Edit
                                        bank
                                        info</a>
                                    @if($checkAmount->exists())
                                    {{ Form::submit('MAKE REQUEST', ['class' => 'btn btn-lg btn-primary pull-right']) }}
                                       @else
                                        <button class="btn btn-lg btn-space btn-danger active pull-right" disabled> Disabled</button>
                                    @endif
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
