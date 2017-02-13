@extends('layouts.admin')
@section('content')
    <div class="page-wrapper" style="min-height: 319px;">
        <div class="container-fluid">
            <!-- Title -->
            <div class="row heading-bg bg-blue">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h5 class="txt-light">Deposit request</h5>
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
                                                <th>Name</th>
                                                <th>Total Transfer</th>
                                                <th>Transfer to</th>
                                                <th>ROI</th>
                                                <th>Notes</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>

                                            </thead>
                                            <tbody>
                                            @foreach($depoRequest as $request)
                                            <tr>
                                                <td>{{  \App\User::find($request->user_id)->name }}</td>
                                                <td>RM {{ $request->total_share }}</td>
                                                <td>{{ $request->send_to }}</td>
                                                <td>@if($request->model_of_investment === 1)
                                                        <span class="label label-primary ">PACKAGE 1</span>
                                                    @elseif($request->model_of_investment === 2)
                                                         <span class="label label-primary ">PACKAGE 2</span>
                                                    @else($request->model_of_investment === 3)
                                                        <span class="label label-primary ">PACKAGE 3</span>
                                                     @endif
                                                    </td>
                                                <td width="26%">{{ $request->notes }}</td>
                                                <td>
                                                    @if($request->status === 1)
                                                        <span class="badge badge-warning">Pending</span>
                                                    @elseif($request->status === 2)
                                                        <span class="badge badge-success">Approved</span>
                                                    @elseif($request->status === 3)
                                                        <span class="badge badge-danger">Reject</span>
                                                    @else
                                                        Not status
                                                    @endif
                                                </td>
                                                <td>@if($request->status === 1 || $request->status === 3   )
                                                        <a href="deposit-edit/{{$request->id}}" class="btn btn-default btn-outline btn-anim">
                                                            <i class="fa fa-pencil"></i><span class="btn-text">Edit</span></a>
                                                </td>@endif
                                            </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{ $depoRequest->links() }}
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
