@extends('layouts.agent')
@section('css')
    {!! Charts::assets() !!}
@endsection
@section('js')

@endsection
@section('content')
    <!-- Main Content -->
    <div class="page-wrapper">
        <div class="container-fluid">
            <!-- Title -->
            <div class="row heading-bg  bg-red">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h5 class="txt-light">Agent Dashboard</h5>
                </div>
            </div>
            @if($bankCheck == 0)
            <div class="alert alert-danger alert-dismissable alert-style-1">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="fa fa-warning"></i> Please <a href="{{ url('agent/add-bank-info') }}"><u>add</u></a> your latest bank info.
            </div>
            @endif
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box bg-blue">
                                    <div class="row ma-0">
                                        <div class="col-xs-5 text-center pa-0 icon-wrap-left">
                                            <i class="pe-7s-users txt-light"></i>
                                        </div>
                                        <div class="col-xs-7 text-center data-wrap-right">
                                            <h6 class="txt-light">Total Investor</h6>
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
                                            <i class="icon-user txt-light"></i>
                                        </div>
                                        <div class="col-xs-7 text-center data-wrap-right">
                                            <h6 class="txt-light">Latest Investor</h6>
                                            <p class="txt-light"
                                               style="padding-top:10px;line-height: 30px; font-size: 24px;">@if(!count($latestInvestor) > 0)
                                                    No Investor @else {{ $latestInvestor->name }}  @endif</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Bordered Table -->
                <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                {!! $chart->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Bordered Table -->
            </div>
            <div class="row mt-40">
                <div class="col-lg-6 col-xs-12">
                    <div class="panel panel-default card-view">
                        <div class="panel-heading">
                            <div class="pull-left">
                                <h6 class="panel-title txt-dark">Latest Deposit by investor </h6>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                @if(count($depositList) > 0)
                                    <div class="table-wrap mt-10">
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Total Invest</th>
                                                    <th>Model of investment</th>
                                                    <th>Status</th>
                                                    <th>Request On</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($depositList as $list)
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:void(0)">{{ \App\User::find($list->user_id)->name }}</a>
                                                        </td>
                                                        <td>{{ $list->total_share }}</td>
                                                        <td>Package {{ $list->model_of_investment }}</td>
                                                        <td>
                                                            @if($list->status === 1)
                                                                <div class="label label-table label-warning">Pending
                                                                </div>
                                                            @elseif($list->status === 2)
                                                                <div class="label label-table label-success">Approved
                                                                </div>
                                                            @elseif($list->status === 3)
                                                                <div class="label label-table label-danger">Rejected
                                                                </div>
                                                            @else
                                                                Not status
                                                            @endif
                                                        </td>
                                                        <td>{{ \Carbon\Carbon::parse($list->created_at)->diffForHumans() }}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @else
                                    <div>
                                        <h4 class="text-center text-muted">No record found</h4>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @if(count($depositList) > 0)<a href="{{ url('agent/depositlist') }}" class="btn  btn-primary">View
                        All</a>@endif
                </div>
                <div class="col-lg-6 col-xs-12">
                    <div class="panel panel-default card-view">
                        <div class="panel-heading">
                            <div class="pull-left">
                                <h6 class="panel-title txt-dark">Latest Withdrawal by Investor </h6>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                @if(count($withdrawList) > 0)
                                    <div class="table-wrap mt-10">
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Withdrawal Status</th>
                                                    <th>Total Request</th>
                                                    <th>Request On</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($withdrawList as $withdrawListing)
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:void(0)">{{ $withdrawListing->name }}</a>
                                                        </td>
                                                        <td>  @if( $withdrawListing->status  === 1)
                                                                <span class="label label-success">Approved</span>
                                                            @elseif( $withdrawListing->status  === 2)
                                                                <span class="label label-danger">Rejected</span>
                                                            @else
                                                                <span class="label label-warning">Processing</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <span class="text-muted">RM {{ $withdrawListing->sum_withdrawal }}</span>
                                                        </td>
                                                        <td>{{ \Carbon\Carbon::parse($withdrawListing->created_at)->diffForHumans() }}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @else
                                    <div>
                                        <h4 class="text-center text-muted">No withdrawal record found</h4>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Content -->
@endsection
