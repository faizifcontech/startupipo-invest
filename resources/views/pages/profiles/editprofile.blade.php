@extends('layouts.user', ['title' => 'Edit Profiles'])
@section('css')
    <link rel="stylesheet" type="text/css"
          href="{{ asset('assets/lib/datetimepicker/css/bootstrap-datetimepicker.min.css') }}"/>
@endsection
@section('js')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBBeLH-55O_qIuO-uZmPmK9F5JtWflPQC8&sensor=true&libraries=places"></script>
    <script src="{{ asset('assets/js/jquery.placepicker.min.js') }}"></script>
    <script src="{{ asset('assets/lib/jquery.maskedinput/jquery.maskedinput.min.js') }}" type="text/javascript"></script>
    <script>
        var App = (function () {
            'use strict';

            App.masks = function( ){
                $("[data-mask='ssn']").mask("999999-99-9999");
            };
            return App;
        })(App || {});
    </script>
    <script>
        $(function () {
            $(".placepicker").placepicker();
            App.masks();

        })
    </script>
@endsection
@section('content')
    <div class="be-content">
        <div class="main-content container-fluid">
            <!--Basic Elements-->
            <div class="row">
                <div class="col-md-12">
                    @if($adaProfile)
                        <div class="panel panel-default panel-border-color panel-border-color-primary">
                            <div class="panel-body">
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form method="POST" action="{{ action('ProfileController@editProfile') }}"
                                      accept-charset="UTF-8" style="border-radius: 0px;"
                                      class="form-horizontal group-border-dashed">
                                    @if (Session::has('success'))
                                        <div class="form-group">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <div role="alert"
                                                     class="alert alert-success alert-icon alert-icon-border alert-dismissible">
                                                    <div class="icon"><span class="mdi mdi-check"></span></div>
                                                    <div class="message">
                                                        <button type="button" data-dismiss="alert" aria-label="Close"
                                                                class="close">
                                                            <span aria-hidden="true" class="mdi mdi-close"></span>
                                                        </button>
                                                        <strong>Good!</strong> {{ session('success') }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="PUT">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Name</label>
                                        <div class="col-sm-6">
                                            <input name="name" type="text" class="form-control"
                                                   value="{{ Auth::user()->name }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Email</label>
                                        <div class="col-sm-6">
                                            <input type="email" class="form-control" value="{{ Auth::user()->email }}"
                                                   readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Gender</label>
                                        <div class="col-sm-6">
                                            {{  Form::select('gender', ['male' => 'Male', 'female' => 'Female'], Auth::user()->gender, ['class' => 'form-control'] )}}
                                            </div>
                                    </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">NRIC / MyKad</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" data-mask="ssn" name="ic_number"
                                                       value="{{ Auth::user()->profile->ic_number }}">
                                            </div>
                                        </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Phone</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="phone"
                                                   value="{{ Auth::user()->profile->phone }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Location</label>
                                        <div class="col-sm-6">
                                            <input id="placepicker" type="text" class="form-control placepicker"
                                                   name="location" value="{{ Auth::user()->profile->location }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <hr>
                                            <span>last update: {{ Auth::user()->profile->updated_at->toDayDateTimeString() }}</span>
                                            <button class='btn btn-lg btn-facebook pull-right' type="submit">Update
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @else
                        <div class="panel panel-default panel-border-color panel-border-color-primary">
                            <div class="panel-body">
                                <form method="POST" action="{{ action('ProfileController@addProfile') }}"
                                      style="border-radius: 0px;" class="form-horizontal group-border-dashed">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Name</label>
                                        <div class="col-sm-6">
                                            <input readonly type="text" class="form-control"
                                                   value="{{ Auth::user()->name }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Email</label>
                                        <div class="col-sm-6">
                                            <input readonly type="email" class="form-control"
                                                   value="{{ Auth::user()->email }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Gender</label>
                                        <div class="col-sm-6">
                                            <input readonly type="text" class="form-control"
                                                   value="{{ Auth::user()->gender }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">NRIC / MyKad</label>
                                        <div class="col-sm-6">
                                            <input  data-mask="ssn"  type="text" class="form-control" placeholder="Not set" name="ic_number">
                                            @if ($errors->has('ic_number'))<span
                                                    class="help-block text-danger">  <strong>{{ $errors->first('ic_number') }}</strong> </span> @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Phone</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" placeholder="Not set" name="phone">
                                            @if ($errors->has('phone'))<span
                                                    class="help-block text-danger">  <strong>{{ $errors->first('phone') }}</strong> </span> @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Location</label>
                                        <div class="col-sm-6">
                                            <input id="placepicker" type="text" class="form-control placepicker"
                                                   placeholder="Not set"
                                                   name="location">
                                            @if ($errors->has('location'))<span
                                                    class="help-block text-danger">    <strong>{{ $errors->first('location') }}</strong></span>  @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <button class='btn btn-lg btn-facebook pull-right' type="submit">Create
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
