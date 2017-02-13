@extends('layouts.admin')
@section('content')
    <div class="page-wrapper" style="min-height: 319px;">
        <div class="container-fluid">
            <!-- Title -->
            <div class="row heading-bg bg-blue">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h5 class="txt-light">Amount lot per/Share</h5>
                </div>
            </div>
            <!-- /Title -->
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="panel panel-default card-view">
                        <div class="panel-heading">
                            <div class="pull-left">
                                <h6 class="panel-title txt-dark">Edit new value</h6>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="form-wrap">

                                    {!! Form::model($shareLot, ['action' => ['AdminController@shareUpdate'], 'class' => 'form-horizontal']) !!}
                                        <div class="form-group">
                                            <label class="control-label mb-10 col-sm-2" for="lotshare">Per / Lot:</label>
                                            <div class="col-sm-10">
                                                {!! Form::text('lotshare' , null, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="form-group mb-0">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                {!! Form::submit('Change now' , ['class' => 'btn btn-warning btn-anim']) !!}
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
@endsection
