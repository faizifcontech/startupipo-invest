@extends('layouts.agent')
@section('content')
    <div class="page-wrapper" style="min-height: 319px;">
        <div class="container-fluid">
            <!-- Title -->
            <div class="row heading-bg bg-blue">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h5 class="txt-light">Withdrawal request</h5>
                </div>
            </div>
            <!-- /Title -->
            <div class="row">
                <!-- Table Hover -->
                <div class="col-sm-12">
                    <div class="panel panel-default card-view">
                        <!--div class="panel-heading">
                            <div class="pull-left">
                                <h6 class="panel-title txt-dark">List request</h6>
                            </div>
                            <div class="clearfix"></div>
                        </div-->

                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <p class="text-muted">All withdrawal request status will be approve by <code>Super
                                        Admin</code>. Please contact us for enquiry</p>
                                @if(count($withdrawal) > 0)
                                    <div class="table-wrap mt-40">
                                        <div class="table-responsive">
                                            <table class="table table-hover mb-0">
                                                <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Total Transfer</th>
                                                    <th>Transfer</th>
                                                    <th>ROI</th>
                                                    <th>Status</th>
                                                    <th>Remarks</th>
                                                    <th>Request On</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($withdrawal as $request)
                                                    <tr>
                                                        <td>{{  $request->name }}</td>
                                                        <td>RM {{ $request->sum_withdrawal }}</td>
                                                        <td>{{ $request->transfer_to_bank }}</td>
                                                        <td>{{ $request->account_no }}</td>
                                                        <td>
                                                            @if($request->status === 0)
                                                                <span class="badge badge-warning">Pending</span>
                                                            @elseif($request->status === 1)
                                                                <span class="badge badge-success">Approved</span>
                                                            @elseif($request->status === 2)
                                                                <span class="badge badge-danger">Reject</span>
                                                            @else
                                                                No status
                                                            @endif
                                                        </td>
                                                        <td width="22%">@if($request->remark == null)
                                                                - @else {{ $request->remark }} @endif</td>
                                                        <td>{{ \Carbon\Carbon::parse($request->created_at)->toDayDateTimeString() }}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            {{ $withdrawal->links() }}
                                        </div>
                                    </div>
                                @else
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Table Hover -->
            </div>
        </div>
    </div>
@endsection
