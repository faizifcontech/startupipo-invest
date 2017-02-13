@extends('layouts.user', ['title' => 'Join share'])
@section('css')
    <link rel="stylesheet" type="text/css"
          href="{{ asset('assets/lib/datetimepicker/css/bootstrap-datetimepicker.min.css') }}"/>
@endsection
@section('js')
    <script src="{{ asset('assets/lib/datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('assets/lib/select2/js/select2.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/app-form-elements.js') }}" type="text/javascript"></script>

    <script>
        $('input[id="kalidengan"]').keyup(function() {
            var a = $('input[id="hargashare"]').val();
            var b = $(this).val();
            $('input[id="jumlah"]').val(a * b);
        });
    </script>
    <script>
        var App = (function () {
            'use strict';

            App.masks = function( ){
                $("[data-mask='limit']").mask("9");
            };
            return App;
        })(App || {});
    </script>
    <script>
        $(function () {
            $(".drop-down").select2();
           // App.init();
           // App.masks();
           App.formElements();
        })
    </script>
@endsection

@section('content')
    <div class="be-content">
        <div class="main-content container-fluid">
            <div class="row">
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
                <div class="col-md-12">
                    <div class="panel panel-default panel-border-color panel-border-color-primary">
                        <div class="panel-heading panel-heading-divider"><span class="panel-subtitle">Please entered proof and accurate time</span>
                        </div>
                        <div class="panel-body">
                            {!! Form::open(['action' => 'ShareController@depositSaved','style'=>'border-radius: 0px;', 'class'=>'form-horizontal group-border-dashed', 'files' => true]) !!}
                            <div class="form-group">
                                {{ Form::label('share', 'Total Per/Lot', ['class' => 'col-sm-3 control-label']) }}
                                <div class="col-sm-2">
                                    <input class="form-control" readonly="readonly" id="hargashare"  type="text" value="{{ $jumlahperlot->lotshare }}">
                                </div>
                                <div class="col-sm-1 text-center" style="padding: 0;width: 40px;">
                                    <span style="font-size: 30px;">&times;</span>
                                </div>
                                <div class="col-sm-1">
                                    {{ Form::text('per_lot', 1, ['class' => 'form-control', 'id'=>'kalidengan', "data-mask" => "limit"]) }}
                                </div>
                                <div class="col-sm-1 text-center" style="padding: 0;width: 40px;">
                                    <span style="font-size: 30px;">&#61;</span>
                                </div>
                                <div class="col-sm-2 has-success">
                                    {{ Form::text('total_share', $jumlahperlot->lotshare, ['class' => 'form-control', 'id'=>'jumlah', 'readonly' => 'readonly']) }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Return on investment</label>
                                <div class="col-sm-6">
                                    {!! Form::select('roi', [1 => '1% for (  1 + 6 months  )', 2 => '2% for ( 1 + 12 months )', 3 => '3% for ( 1 + 18 months  )'], 1, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('transfer_to', 'Transfer to', ['class' => 'col-sm-3 control-label']) }}
                                <div class="col-sm-6">
                                    {{ Form::select('transfer_to', $banklist, null, ['placeholder' => 'Bank name....',  'class' => 'form-control select2 drop-down', 'style' => 'width: 100%;']) }}
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('time_of_transaction', 'Time', ['class' => 'col-sm-3 control-label']) }}
                                <div class="col-sm-6">
                                    {{ Form::text('time_of_transaction', null, ['class' => 'form-control  datetimepicker'])}}
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('proof_upload', 'Proof of payment', ['class' => 'col-sm-3 control-label']) }}
                                <div class="col-sm-6">
                                    {{ Form::file('proof_upload') }}
                                    <br>
                                    <span style="font-size: x-small">Please upload jpeg, pdf, jpg or png</span>
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('notes', 'Notes', ['class' => 'col-sm-3 control-label']) }}
                                <div class="col-sm-6">
                                    {{ Form::textarea('notes', null, ['class' => 'form-control', 'placeholder' => 'Optional'])}}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-6 col-md-offset-3">
                                   {{ Form::submit('Send request', ['class'=>'btn btn-lg btn-default']) }}
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
