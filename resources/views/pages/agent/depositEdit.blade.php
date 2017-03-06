@extends('layouts.agent')
@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">
            <!-- Title -->
            <div class="row heading-bg bg-blue">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h5 class="txt-light">Change Deposit Status</h5>
                </div>
            </div>
            <!-- /Title -->
            <div class="col-md-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Details transfer from user </h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-wrap">
                                        {!! Form::model($user, ['action' => ['AgentProfitController@depositUpdate', $user->id], 'class' => 'form-horizontal']) !!}
                                        <div class="form-group">
                                            <label for="name" class="col-sm-3 control-label">Name :</label>
                                            <div class="col-sm-9">
                                                <p class="form-control-static">{{  \App\User::find($user->user_id)->name }}</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="col-sm-3 control-label">Email :</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <p class="form-control-static">{{  \App\User::find($user->user_id)->email }} </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="totalshare" class="col-sm-3 control-label">Total Share :</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <p class="form-control-static">RM {{  $user->total_share }} </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="totalshare" class="col-sm-3 control-label">Package :</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <p class="form-control-static"> {{  $user->model_of_investment }} </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="totalshare" class="col-sm-3 control-label">Transfer to :</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <p class="form-control-static">{{  $user->send_to }} </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="totalshare" class="col-sm-3 control-label">Transfer on :</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <?php $timestamp = strtotime($user->transfer_on); ?>
                                                    <p class="form-control-static">{{  date("h:i:s A - d F Y ",  $timestamp) }} </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="totalshare" class="col-sm-3 control-label">Proof of payments
                                                :</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <p class="form-control-static">
                                                        <a data-toggle="tooltip" data-placement="right"
                                                           title="View File" data-original-title="View File"
                                                           target="_blank"
                                                           href="{{ asset('storage/' .$user->saved_url) }}">{{ asset('storage/' .$user->saved_url) }}</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="totalshare" class="col-sm-3 control-label">Notes :</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <p class="form-control-static">{{  $user->notes }} </p>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            {!!  Form::label('status', 'Status', ['class' => 'col-sm-3 control-label']) !!}
                                            <div class="col-sm-5">
                                                {!!   Form::select('status', [1 => 'Pending', 2 => 'Approved', 3 => 'Reject'], $user->status , ['class' => 'form-control'])  !!}
                                            </div>
                                        </div>
                                        <div class="form-group {{ $errors->has('remark') ? ' has-error' : '' }}">
                                            {!!   Form::label('remark', 'Remark', ['class' => 'col-sm-3 control-label']) !!}
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    {!! Form::textarea('remark',  null,['class' => 'form-control', 'rows' => 5]) !!}
                                                </div>
                                                @if ($errors->has('remark'))<span
                                                        class="help-block "> {{ $errors->first('remark') }} </span> @endif
                                            </div>
                                        </div>
                                        <div class="form-group mb-0">
                                            <div class="col-sm-offset-3 col-sm-9">
                                                {!!   Form::submit('Save', ['class' => 'btn btn-success mr-10'])!!}
                                                <a href="{{ url('/admin/deposit') }}" class="btn btn-default">Cancel</a>
                                            </div>
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
    </div>
@endsection
