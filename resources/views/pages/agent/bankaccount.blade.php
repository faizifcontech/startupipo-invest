@extends('layouts.agent')

@section('content')
    <!-- Main Content -->
    <div class="page-wrapper">
        <div class="container-fluid">
            <!-- Title -->
            <div class="row heading-bg  bg-blue">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h5 class="txt-light">Agent Bank Info </h5>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-3 col-xs-12">
                <div class="panel panel-default card-view">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <img class="img-responsive center-block"
                                 src="{{ asset('assets/img/icon-transaction-details.png') }}" alt="">
                            <hr>
                            <h6>Please add your current bank info. If your bank account info exceed limit, please remove
                                any.</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-sm-9 col-xs-12">
                @if(count($listBank) > 0)
                    @if(Session::has('message'))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <i class="ti-check pr-15"></i>{{ session('message') }}.
                    </div>
                    @endif
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Your bank</h6>
                        </div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="table-wrap mt-40">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered mb-0">
                                        <thead>
                                        <tr>
                                            <th>Beneficiary Name</th>
                                            <th>Bank Name</th>
                                            <th>Beneficiary Account Number</th>
                                            <th class="text-nowrap">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($listBank as $list)
                                            <tr>
                                                <td>{{ $list->bankowner }}</td>
                                                <td>{{ $list->bankname }}</td>
                                                <td>{{ $list->bankaccnum }}</td>
                                                <td width="10%">
                                                    {!! Form::open([
                                                             'method' => 'DELETE',
                                                             'action' => ['AgentController@deleteBank', $list->id]
                                                         ]) !!}
                                                    {!! Form::submit('Remove', ['class' => 'btn btn-danger btn-outline btn-rounded']) !!}
                                                    {!! Form::close() !!}
                                                </td>
                                            </tr>
                                         @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                    <div class="panel panel-default card-view">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <h4>Sorry, No record found.</h4>
                            </div>
                        </div>
                    </div>
                @endif
                @if(count($listBank) < 4)
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Add banks details</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    {!!  Form::open(['action' => 'AgentController@postBank']) !!}
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="form-wrap">
                                <div class="form-group mb-0">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                {!! Form::label('beneficiary_name', 'Beneficiary  Name', ['class' => 'control-label mb-10']) !!}
                                                {!! Form::text('beneficiary_name', null, ['class' => 'form-control', 'placeholder' => 'Your Name']) !!}
                                                @if ($errors->has('beneficiary_name'))<p
                                                        class="text-danger">{{ $errors->first('beneficiary_name') }}</p>
                                                @endif
                                            </div>
                                            <div class="col-sm-4">
                                                {!! Form::label('bank_name', 'Bank  Name', ['class' => 'control-label mb-10']) !!}
                                                {!! Form::select('bank_name', $bankList, null, ['class' => 'form-control']) !!}
                                                @if ($errors->has('bank_name'))<p
                                                        class="text-danger">{{ $errors->first('bank_name') }}</p>
                                                @endif
                                            </div>
                                            <div class="col-sm-4">
                                                {!! Form::label('beneficiary_acc_no', 'Beneficiary Account Number', ['class' => 'control-label mb-10']) !!}
                                                {!! Form::text('beneficiary_acc_no', null, ['class' => 'form-control', 'placeholder' => 'Account Number']) !!}
                                                @if ($errors->has('beneficiary_acc_no'))<p
                                                        class="text-danger">{{ $errors->first('beneficiary_acc_no') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::button('<i class="fa fa-bank"></i> Add Bank', ['type' => 'submit', 'class' => 'btn  btn-success btn-outline btn-rounded'] ) !!}
                {!! Form::close() !!}
                   @else
                        <div class="alert alert-warning alert-dismissable alert-style-1">
                            <i class="ti-alert"></i>You only can add to 4 banks account details. Please remove to add new details.
                        </div>
                 @endif
            </div>
        </div>
    </div>
@endsection
