@extends('layouts.user', ['title' => 'Change password'])

@section('content')
    <div class="be-content">

        <div class="main-content container-fluid">
            <!--Basic Elements-->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-border">
                        <div class="panel-heading panel-heading-divider"><span class="panel-subtitle">Need new password? You can change  here.</span>
                        </div>
                        <div class="panel-body">
                            <form method="POST" action="{{ action('ProfileController@changeNewPass') }}"
                                  style="border-radius: 0px;" class="form-horizontal group-border-dashed">
                            {{ csrf_field() }}
                            <!--  ini adalah popup notification, either error or success -->
                                @if (Session::has('success'))
                                    <div class="form-group">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <div role="alert" class="alert alert-success alert-dismissible">
                                                <button type="button" data-dismiss="alert" aria-label="Close"
                                                        class="close">
                                                    <span aria-hidden="true" class="mdi mdi-close"></span></button>
                                                <span class="icon mdi mdi-check"></span><strong>Good! </strong>{{ session('success') }}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if (Session::has('error'))
                                    <div class="form-group">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <div role="alert" class="alert alert-danger alert-dismissible">
                                                <button type="button" data-dismiss="alert" aria-label="Close"
                                                        class="close">
                                                    <span aria-hidden="true" class="mdi mdi-close"></span></button>
                                                <span class="icon mdi mdi-close-circle-o"></span><strong>Error! </strong>{{ session('error') }}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            <!--  Tamat  notification-->
                                <div class="form-group {{ $errors->has('current_password') ? ' has-error has-feedback' : '' }} ">
                                    <label class="col-sm-3 control-label">Current password</label>
                                    <div class="col-sm-6">
                                        <input placeholder="{{ $errors->first('current_password') }}" type="password"  class="form-control" name="current_password">
                                        @if ($errors->has('current_password'))<span class="mdi mdi-close form-control-feedback"></span>@endif
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('password') ? ' has-error has-feedback' : '' }} ">
                                    <label class="col-sm-3 control-label">New Password</label>
                                    <div class="col-sm-6">
                                        <input placeholder="{{ $errors->first('password') }}" type="password" class="form-control" name="password">
                                        @if ($errors->has('password'))<span class="mdi mdi-close form-control-feedback"></span>@endif
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('password') ? ' has-error has-feedback' : '' }} ">
                                    <label class="col-sm-3 control-label">Re-type New Password</label>
                                    <div class="col-sm-6">
                                        <input placeholder="{{ $errors->first('password') }}" type="password" class="form-control" name="password_confirmation">
                                        @if ($errors->has('password'))<span class="mdi mdi-close form-control-feedback"></span>@endif
                                    </div>
                                </div>
                                <hr>
                                <div class="pull-right">
                                    <a style="padding-right: 30px;font-size: 15px;"
                                       href="{{ action('DashboardController@index') }}">CANCEL</a>
                                    <button class="btn btn-lg btn-rounded btn-space btn-default">SET NEW PASSWORD
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
