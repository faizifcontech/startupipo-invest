@extends('layouts.admin')
@section('content')
    <!-- Main Content -->
    <div class="page-wrapper">
        <div class="container-fluid">

            <!-- Title -->
            <div class="row heading-bg  bg-blue">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h5 class="txt-light">Admin Dashboard</h5>
                </div>
            </div>
            <!-- /Title -->
            <!-- Row -->
            <div class="row">
                <div class="col-lg-2 col-md-2 col-xs-12">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box bg-red">
                                    <div class="row ma-0">
                                        <div class="col-xs-5 text-center pa-0 icon-wrap-left">
                                            <i class="icon-user-following txt-light"></i>
                                        </div>
                                        <div class="col-xs-7 text-center data-wrap-right">
                                            <h6 class="txt-light">Total Agent</h6>
                                            <span class="txt-light counter">{{ $totalagent }}</span>
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
                                            <i class="icon-people txt-light"></i>
                                        </div>
                                        <div class="col-xs-7 text-center data-wrap-right">
                                            <h6 class="txt-light">Total User</h6>
                                            <span class="txt-light counter counter-anim">{{ $totaluser }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box bg-red">
                                    <div class="row ma-0">
                                        <div class="col-xs-5 text-center pa-0 icon-wrap-left">
                                            <i class="ti-money txt-light"></i>
                                        </div>
                                        <div class="col-xs-7 text-center data-wrap-right">
                                            <h6 class="txt-light">Share Per/Lot</h6>
                                            <span class="txt-light counter">{{ \App\lotshare::find(1)->lotshare }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Bordered Table -->
                <div class="col-lg-5 col-md-5 col-xs-12">
                    <div class="panel panel-primary card-view">
                        <div class="panel-heading mb-20">
                            <div class="pull-left">
                                <h6 class="panel-title txt-light pull-left">Latest users</h6>
                            </div>
                            <div class="pull-right">
                                <a class="txt-light" href="javascript:void(0);"><i class="ti-plus"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <ul class="chat-list-wrap">
                                    <li class="chat-list">
                                        <div class="chat-body">
                                            @foreach($latestUser as $latest )
                                                <a class="" href="#">
                                                    <div class="chat-data">
                                                        <img class="user-img img-circle"
                                                             @if(Gravatar::exists($latest->email)) src="{{ Gravatar::get($latest->email) }}"
                                                             @else src="{{ asset('assets/img/avatar-main.jpg') }}"
                                                             @endif
                                                             alt="user"/>

                                                        <div class="user-data">
                                                            <span class="name block capitalize-font">{{ $latest->name }}</span>
                                                            <span class="time block txt-grey">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($latest->created_at))->diffForHumans() }}</span>
                                                        </div>
                                                        <div class="status online"></div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                            @endforeach
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-xs-12 col-lg-5">
                    <div class="panel panel-default card-view">
                        <div class="panel-heading">
                            <div class="pull-left">
                                <h6 class="panel-title txt-dark">Witdrawal Status</h6>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body task-panel">
                                <div class="list-group mb-0">
                                    @foreach($withdrawal as $listing)
                                        <a href="#" class="list-group-item">
                                            @if($listing->status == 0)
                                                <span class="badge badge-warning">Pending</span>
                                            @elseif($listing->status == 1)
                                                <span class="badge badge-success">Approved</span>
                                            @elseif($listing->status == 2)
                                                <span class="badge badge-danger">Rejected</span>
                                            @else
                                                <span class="badge badge-info">No Status</span>
                                            @endif
                                            <i class="fa fa-info-circle"></i> {{ $listing->name }}, RM <b>{{ $listing->sum_withdrawal }}</b>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row -->
        </div>

    </div>
    <!-- /Main Content -->
@endsection
