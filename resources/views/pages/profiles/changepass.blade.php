@extends('layouts.user', ['title' => 'Change password'])
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert.css') }}">
@endsection
@section('js')
    <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
    @include('sweet::alert')
@endsection
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
