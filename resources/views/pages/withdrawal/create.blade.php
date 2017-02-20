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
                        <div class="panel-heading panel-heading-divider"> <span class="panel-subtitle">Please fill the forms to make withdrawal request</span></div>
                        <div class="panel-body">
                                {!! Form::open(['action' => 'WithdrawController@store', 'style'=>'border-radius: 0px;', 'class'=>'form-horizontal group-border-dashed' ]) !!}
                                <div class="form-group">
                                    {{ Form::label('beneficiary_name', 'Beneficiary Name', ['class' => 'col-sm-3 control-label']) }}
                                    <div class="col-sm-6">
                                        {{ Form::text('beneficiary_name', $b_name, ['class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('beneficiary_bank', 'Beneficiary Bank', ['class' => 'col-sm-3 control-label']) }}
                                    <div class="col-sm-6">
                                        {{ Form::text('beneficiary_name', $b_bank, ['class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('acc_no', 'Bank Account No.', ['class' => 'col-sm-3 control-label']) }}
                                    <div class="col-sm-6">
                                        {{ Form::text('acc_no', $b_accno, ['class' => 'form-control']) }}
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
                                        <input class="form-control"  type="text" name="total_withdrawal" placeholder="Your max withdrawal is RM {{ number_format($amount, 2) }}">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="col-sm-6 col-sm-offset-3  ">
                                        <a  class="btn btn-lg btn-default" href="{{ action('BankController@index') }}">Edit bank info</a> {{ Form::submit('MAKE REQUEST', ['class' => 'btn btn-lg btn-danger pull-right']) }}
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
