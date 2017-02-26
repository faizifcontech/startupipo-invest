@extends('layouts.agent')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert.css') }}">
@endsection
@section('js')
    <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
    @include('sweet::alert')
@endsection
@section('content')
    <!-- Main Content -->
    <div class="page-wrapper">
        <div class="container-fluid">
            <!-- Title -->
            <div class="row heading-bg  bg-blue">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h5 class="txt-light">Edit Agent Details</h5>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Responsive Table -->
            <div class="col-sm-6">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Edit Profile</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="form-wrap">
                                {!! Form::open(['action' => 'AgentController@profileEdit', 'method' => 'put']) !!}
                                <div class="form-group">
                                    {!! Form::label('agent', 'Agent Referral Name :', ['class' => 'control-label mb-10']) !!}
                                    <br><span
                                            class="label label-primary font-weight-100">{{ $agent->ref_agent_name }}</span>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('reg_url', 'Register Link URL :', ['class' => 'control-label mb-10']) !!}
                                    <p><u><a href="{{  url('reg/'  . $agent->ref_agent_name )}}"
                                             target="_blank">{{  url('reg/'  . $agent->ref_agent_name )}}</a></u></p>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('name', 'Agent Name :', ['class' => 'control-label mb-10']) !!}
                                    {!! Form::text('name', Auth::user()->name, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                </div>
                                <div class="form-group {{ $errors->has('company_name') ? ' has-error' : '' }}">
                                    {!! Form::label('company_name', 'Company Name :', ['class' => 'control-label mb-10']) !!}
                                    {!! Form::text('company_name', $agent->company_name, ['class' => 'form-control']) !!}
                                    @if ($errors->has('company_name'))<span
                                            class="help-block">  <strong>{{ $errors->first('company_name') }}</strong> </span> @endif
                                </div>
                                <div class="form-group {{ $errors->has('ssm_no') ? ' has-error' : '' }}">
                                    {!! Form::label('ssm_no', 'Company SSM No. :', ['class' => 'control-label mb-10']) !!}
                                    {!! Form::text('ssm_no', $agent->ssm_no, ['class' => 'form-control']) !!}
                                    @if ($errors->has('ssm_no'))<span
                                            class="help-block">  <strong>{{ $errors->first('ssm_no') }}</strong> </span> @endif
                                </div>
                                <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                                    {!! Form::label('address', 'Address :', ['class' => 'control-label mb-10']) !!}
                                    {!! Form::text('address', $agent->address, ['class' => 'form-control']) !!}
                                    @if ($errors->has('address'))<span
                                            class="help-block">  <strong>{{ $errors->first('address') }}</strong> </span> @endif
                                </div>
                                <div class="form-group mb-0 mt-30">
                                    <button type="submit" class="btn btn-default btn-rounded">submit</button>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Responsive Table -->
            <div class="col-sm-6">
                <div class="panel panel-danger card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-light"><i class="icon-lock-open mr-10"></i> Change Password</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="form-wrap">
                                <form method="POST" action="{{ action('ProfileController@changeNewPass') }}"
                                      style="border-radius: 0px;" class="form-horizontal group-border-dashed">
                                    {{ csrf_field() }}
                                    <div class="form-group {{ $errors->has('current_password') ? ' has-error has-feedback' : '' }} ">
                                        <label class="control-label mb-10">Current Password</label>
                                        <input placeholder="{{ $errors->first('current_password') }}" type="password"
                                               class="form-control" name="current_password">
                                        @if ($errors->has('current_password'))<span
                                                class="mdi mdi-close form-control-feedback"></span>@endif
                                    </div>
                                    <div class="form-group {{ $errors->has('password') ? ' has-error has-feedback' : '' }} ">
                                        <label class="control-label mb-10" for="pwd_de">New Password:</label>
                                        <input placeholder="{{ $errors->first('password') }}" type="password"
                                               class="form-control" name="password">
                                        @if ($errors->has('password'))<span
                                                class="mdi mdi-close form-control-feedback"></span>@endif
                                    </div>
                                    <div class="form-group {{ $errors->has('password') ? ' has-error has-feedback' : '' }} ">
                                        <label class="control-label mb-10" for="pwd_de">Confirm New Password:</label>
                                        <input placeholder="{{ $errors->first('password') }}" type="password"
                                               class="form-control" name="password_confirmation">
                                        @if ($errors->has('password'))<span
                                                class="mdi mdi-close form-control-feedback"></span>@endif
                                    </div>

                                    <div class="form-group mt-50">
                                        <button type="submit" class="btn btn-danger btn-outline btn-rounded">submit
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Content -->
@endsection
