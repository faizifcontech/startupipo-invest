@extends('layouts.agent')
@section('content')
    <!-- Main Content -->
    <div class="page-wrapper">
        <div class="container-fluid">
            <!-- Title -->
            <div class="row heading-bg  bg-blue">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h5 class="txt-light">Agent Dashboard</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box bg-red">
                                    <div class="row ma-0">
                                        <div class="col-xs-5 text-center pa-0 icon-wrap-left">
                                            <i class="icon-briefcase txt-light"></i>
                                        </div>
                                        <div class="col-xs-7 text-center data-wrap-right">
                                            <h6 class="txt-light">Total User</h6>
                                            <span class="txt-light counter counter-anim">{{ $jumlahuser }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box bg-yellow">
                                    <div class="row ma-0">
                                        <div class="col-xs-5 text-center pa-0 icon-wrap-left">
                                            <i class="icon-rocket txt-light"></i>
                                        </div>
                                        <div class="col-xs-7 text-center data-wrap-right">
                                            <h6 class="txt-light">revenue</h6>
                                            <span class="txt-light counter">$4m</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default card-view">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="sm-progress-box">
                                    <i class="icon-emotsmile mb-15 block"></i>
                                    <span class="font-12 head-font txt-dark">Success rate<span class="pull-right">90%<span class="pl-5"><i class="fa fa-arrow-up txt-success font-12"></i></span></span></span>
                                    <div class="progress mt-10">
                                        <div class="progress-bar progress-bar-success" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 90%" role="progressbar"> <span class="sr-only">90% Complete (success)</span> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bordered Table -->
                <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                    <div class="panel panel-default card-view">
                        <div class="panel-heading">
                            <div class="pull-left">
                                <h6 class="panel-title txt-dark">project status</h6>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="table-wrap">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered mb-0">
                                            <thead>
                                            <tr>
                                                <th>Task</th>
                                                <th>Progress</th>
                                                <th>Deadline</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>CMVM Digitisation of paper records</td>
                                                <td><div class="progress progress-xs mb-0 ">
                                                        <div class="progress-bar progress-bar-danger" style="width: 35%"></div>
                                                    </div></td>
                                                <td>Jan 18, 2017</td>

                                            </tr>
                                            <tr>
                                                <td>Data management plans</td>
                                                <td><div class="progress progress-xs mb-0 ">
                                                        <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                                                    </div></td>
                                                <td>Dec 1, 2016</td>

                                            </tr>
                                            <tr>
                                                <td>REF readiness</td>
                                                <td><div class="progress progress-xs mb-0 ">
                                                        <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                                                    </div></td>
                                                <td>Nov 12, 2016</td>

                                            </tr>
                                            <tr>
                                                <td>Storage Strategy</td>
                                                <td><div class="progress progress-xs mb-0 ">
                                                        <div class="progress-bar progress-bar-primary" style="width: 70%"></div>
                                                    </div></td>
                                                <td>Oct 9, 2016</td>

                                            </tr>
                                            <tr>
                                                <td>Network Infrastructure strategy</td>
                                                <td><div class="progress progress-xs mb-0 ">
                                                        <div class="progress-bar progress-bar-primary" style="width: 85%"></div>
                                                    </div></td>
                                                <td>Sept 2, 2016</td>

                                            </tr>
                                            <tr>
                                                <td>Flexible Server hosting</td>
                                                <td><div class="progress progress-xs mb-0 ">
                                                        <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                                                    </div></td>
                                                <td>August 11, 2015</td>

                                            </tr>
                                            <tr>
                                                <td>Virtual Desktop software access</td>
                                                <td><div class="progress progress-xs mb-0 ">
                                                        <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                                                    </div></td>
                                                <td>June 11, 2016</td>

                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Bordered Table -->
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box bg-green">
                                    <div class="row ma-0">
                                        <div class="col-xs-5 text-center pa-0 icon-wrap-left">
                                            <i class="icon-diamond txt-light"></i>
                                        </div>
                                        <div class="col-xs-7 text-center data-wrap-right">
                                            <h6 class="txt-light">monthly sales</h6>
                                            <span class="txt-light counter counter-anim">45678</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="weather_3" class="panel panel-default card-view pa-0 weather-info">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="row ma-0">
                                    <div class="col-xs-6 pa-0">
                                        <div class="left-block-wrap pa-30">
                                            <p class="block nowday">Friday</p>
                                            <span class="block nowdate">01/27/2017</span>
                                            <div class="left-block  mt-15"><span class="block temprature">5<span class="unit">°C</span></span></div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 pa-0">
                                        <div class="right-block-wrap pa-30">
                                            <div class="right-block"><span class="block temprature-icon"><img src="dist/img/weathericons/23.svg"></span><h6>New York</h6></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                    <div class="panel panel-default card-view">
                        <div class="panel-heading">
                            <div class="pull-left">
                                <h6 class="panel-title txt-dark">statement table</h6>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="table-wrap">
                                    <div class="table-responsive">
                                        <div id="statement_wrapper" class="dataTables_wrapper no-footer"><table class="table display product-overview dataTable no-footer" id="statement" role="grid">
                                                <thead>
                                                <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="statement" rowspan="1" colspan="1" aria-sort="ascending" aria-label="date: activate to sort column descending" style="width: 85px;">date</th><th class="sorting" tabindex="0" aria-controls="statement" rowspan="1" colspan="1" aria-label="Order ID: activate to sort column ascending" style="width: 92px;">Order ID</th><th class="sorting" tabindex="0" aria-controls="statement" rowspan="1" colspan="1" aria-label="type: activate to sort column ascending" style="width: 74px;">type</th><th class="sorting" tabindex="0" aria-controls="statement" rowspan="1" colspan="1" aria-label="Details: activate to sort column ascending" style="width: 389px;">Details</th><th class="sorting" tabindex="0" aria-controls="statement" rowspan="1" colspan="1" aria-label="price: activate to sort column ascending" style="width: 47px;">price</th></tr>
                                                </thead>
                                                <tbody>




                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">10-7-2016</td>
                                                    <td>#85457898</td>
                                                    <td>
                                                        <span class="label label-primary font-weight-100">fee</span>
                                                    </td>
                                                    <td>
                                                        Author Fee for included support sale IVIP13444036
                                                    </td>
                                                    <td>$20</td>
                                                </tr><tr role="row" class="even">
                                                    <td class="sorting_1">10-7-2016</td>
                                                    <td>#85457897</td>
                                                    <td>
                                                        <span class="label label-danger font-weight-100">refund</span>
                                                    </td>
                                                    <td>
                                                        Author Fee for included support sale IVIP13444036
                                                    </td>
                                                    <td>$20</td>
                                                </tr><tr role="row" class="odd">
                                                    <td class="sorting_1">10-7-2016</td>
                                                    <td>#85457896</td>
                                                    <td>
                                                        <span class="label label-primary font-weight-100">fee</span>
                                                    </td>
                                                    <td>
                                                        Author Fee for included support sale IVIP13444036
                                                    </td>
                                                    <td>$20</td>
                                                </tr><tr role="row" class="even">
                                                    <td class="sorting_1">10-7-2016</td>
                                                    <td>#85457895</td>
                                                    <td>
                                                        <span class="label label-info font-weight-100">support</span>
                                                    </td>
                                                    <td>
                                                        Author Fee for included support sale IVIP13444036
                                                    </td>
                                                    <td>$20</td>
                                                </tr></tbody>
                                            </table></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- /Main Content -->
@endsection
