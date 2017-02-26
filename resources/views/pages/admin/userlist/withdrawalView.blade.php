@extends('layouts.admin')
@section('content')
    <div class="page-wrapper" style="min-height: 319px;">
        <div class="container-fluid">
            <!-- Title -->
            <div class="row heading-bg bg-blue">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h5 class="txt-light">Withdrawal Request Detail</h5>
                </div>
            </div>
            <!-- /Title -->
            <div class="row">
                <div class="col-md-8 col-lg-offset-2">
                    <div class="panel panel-default card-view">
                        <div class="panel-heading">
                            <div class="pull-left">
                                <h6 class="panel-title txt-dark">Read only</h6>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-wrap">
                                            <form class="form-horizontal" role="form">
                                                <div class="form-body">
                                                    <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>Person's
                                                        Info</h6>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Name:</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static"> {{ $details->name }} </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Email:</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static"> {{ \App\User::find($details->user_id)->email }} </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>
                                                    <!-- /Row -->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Bank Name:</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static"> {{ $details->transfer_to_bank }} </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Account No
                                                                    :</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static"> {{ $details->account_no }} </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>
                                                    <!-- /Row -->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Total
                                                                    Request:</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static">
                                                                        RM {{ $details->sum_withdrawal }} </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Current
                                                                    Balance:</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static">
                                                                        RM {{ \App\Billetera::where('user_id', $details->user_id)->first()->amount }} </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>
                                                    <!-- /Row -->
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $currentWallet = \App\Billetera::where('user_id', $details->user_id)->first()->amount;
                    $requestWithdrawal = $details->sum_withdrawal;
                    ?>
                    @if($currentWallet <  $requestWithdrawal)
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <i class="ti-na pr-15"></i>Opps! investor wallet balance is not enough. Proceed with CARE!
                    </div>
                    @endif
                    <div class="panel panel-default card-view">
                        <div class="panel-heading">
                            <div class="pull-left">
                                <h6 class="panel-title txt-dark">Withdrawal Form</h6>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="form-wrap">
                                    {!! Form::open(['action' => ['Admin\UserSetController@withdrawalPatch', $details->id], 'method' => 'put']) !!}
                                    <div class="form-group">
                                        <label class="control-label mb-10">Status: </label>
                                        {!! Form::select('status', [0 => 'Processing', 1 => 'Approved', 2 => 'Rejected'], null, ['placeholder' => 'Change payment status ......', 'class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-10">remark: </label>
                                        {!! Form::textarea('remark', null, ['class' => 'form-control', 'placeholder' => 'Date and Payment reference. EX:(#bsk21323)']) !!}
                                    </div>
                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn btn-success btn-anim"><i
                                                    class="fa fa-external-link-square"></i><span
                                                    class="btn-text">submit</span></button>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
