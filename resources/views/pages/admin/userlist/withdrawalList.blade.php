@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert.css') }}">
@endsection
@section('js')
    <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
    @include('sweet::alert')
@endsection
@section('content')
    <div class="page-wrapper" style="min-height: 319px;">
        <div class="container-fluid">
            <!-- Title -->
            <div class="row heading-bg bg-blue">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h5 class="txt-light">Pending Withdrawal Request</h5>
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
                                <!--p class="text-muted">Add class <code>table-hover</code> in table tag.</p-->
                                <div class="table-wrap mt-40">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                            <tr>
                                                <td>ID No.</td>
                                                <th>Name</th>
                                                <th>Withdrawal Request</th>
                                                <th>Beneficiary Bank Name</th>
                                                <th>Bank Account No.</th>
                                                <th>Request Date</th>
                                                <th>Action</th>
                                            </thead>
                                            <tbody>
                                            @foreach($listWithDrawal as $list)
                                                <tr>
                                                    <td>#{{ $list->id }}</td>
                                                    <td><a href="javascript:void(0)">{{ $list->name }}</a></td>
                                                    <td>{{ $list->sum_withdrawal }}</td>
                                                    <td>{{ $list->transfer_to_bank }}</td>
                                                    <td>{{ $list->account_no }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($list->created_at)->toDayDateTimeString()  }}</td>
                                                    <td><a href={{ url('admin/withdrawal-list/'. $list->id) }} class="btn btn-primary btn-outline btn-anim"><i class="fa fa-wpforms"></i>
                                                            <span class="btn-text">View Request</span></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        {{ $listWithDrawal->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Table Hover -->
            </div>
        </div>
    </div>
@endsection
