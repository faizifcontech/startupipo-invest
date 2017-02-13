@extends('layouts.admin')
@section('content')
    <div class="page-wrapper" style="min-height: 319px;">
        <div class="container-fluid">
            <!-- Title -->
            <div class="row heading-bg bg-blue">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h5 class="txt-light">Create new agent</h5>
                </div>
            </div>
            <!-- /Title -->
            <div class="panel-body">
                <div class="col-md-12">
                    <div class="panel panel-default card-view">
                        <div class="panel-heading">
                            <div class="pull-left">
                                <h6 class="panel-title txt-dark">Please complete the form</h6>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-wrap">
                                            {!! Form::open(['action' => 'Admin\AgentsetController@store', 'class' => 'form-horizontal']) !!}
                                                <div class="form-body">
                                                    <h6 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>Person's Info</h6>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group @if($errors->has('full_name'))has-error @endif">
                                                                {{ Form::label('full_name', 'Full Name', ['class' => 'control-label col-md-3']) }}
                                                                <div class="col-md-9">
                                                                    {{ Form::text('full_name', null, ['class' => 'form-control', 'placeholder' => 'Agent Full name'] ) }}
                                                                    <span class="help-block">{{ $errors->first('full_name') }} </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group @if($errors->has('email'))has-error @endif">
                                                                {{ Form::label('email', 'Email', ['class' => 'control-label col-md-3']) }}
                                                                <div class="col-md-9">
                                                                    {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'agent@email.com'] ) }}
                                                                    <span class="help-block">{{ $errors->first('email') }} </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>
                                                    <!-- /Row -->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group @if($errors->has('gender'))has-error @endif">
                                                                {{ Form::label('gender', 'Gender', ['class' => 'control-label col-md-3']) }}
                                                                <div class="col-md-9">
                                                                    {{ Form::select('gender', ['male' => 'Male', 'female' => 'Female'], 'male', ['class' => 'form-control']) }}
                                                                    <span class="help-block">{{ $errors->first('gender') }} </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group @if($errors->has('password'))has-error @endif">
                                                                {{ Form::label('password', 'Password', ['class' => 'control-label col-md-3']) }}
                                                                <div class="col-md-9">
                                                                    {{ Form::text('password', str_random(8), ['class' => 'form-control', 'readonly' => 'readonly'] ) }}
                                                                    <span class="help-block">{{ $errors->first('password') }} </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>
                                                    <div class="seprator-block"></div>
                                                    <h6 class="txt-dark capitalize-font"><i class="icon-notebook mr-10"></i>Company</h6>
                                                    <hr>
                                                    <!-- /Row -->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group @if($errors->has('agent_name'))has-error @endif">
                                                                {{ Form::label('agent_name', 'Agent  Name', ['class' => 'control-label col-md-3']) }}
                                                                <div class="col-md-9">
                                                                    {{ Form::text('agent_name', null, ['class' => 'form-control', 'placeholder' => 'EX: (agentname)'] ) }}
                                                                    <span class="help-block">{{ $errors->first('agent_name') }} </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group @if($errors->has('ssm_no'))has-error @endif">
                                                                {{ Form::label('ssm_no', 'SSM  No', ['class' => 'control-label col-md-3']) }}
                                                                <div class="col-md-9">
                                                                    {{ Form::text('ssm_no', null, ['class' => 'form-control', 'placeholder' => '7878787-V'] ) }}
                                                                    <span class="help-block">{{ $errors->first('ssm_no') }} </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group @if($errors->has('company_name')) has-error @endif">
                                                                {{ Form::label('company_name', 'Company Name', ['class' => 'control-label col-md-3']) }}
                                                                <div class="col-md-9">
                                                                    {{ Form::text('company_name', null, ['class' => 'form-control', 'placeholder' => 'Your valid company name'] ) }}
                                                                    <span class="help-block">{{ $errors->first('company_name') }} </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group @if($errors->has('location')) has-error @endif">
                                                                {{ Form::label('location', 'location', ['class' => 'control-label col-md-3']) }}
                                                                <div class="col-md-9">
                                                                    {{ Form::text('location', null, ['class' => 'form-control', 'placeholder' => 'Agent location'] ) }}
                                                                    <span class="help-block">{{ $errors->first('location') }} </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>
                                                    <!-- /Row -->
                                                </div>
                                            <div class="seprator-block"></div>
                                            <hr>
                                                <div class="form-actions mt-10">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class=" pull-right">
                                                                    <button type="submit" class="btn btn-success  mr-10">Submit</button>
                                                                    <button type="reset" class="btn btn-default">Reset</button>
                                                                </div>
                                                            </div>
                                                        </div>
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
    </div>
@endsection
