@extends('layouts.admin')
@section('content')
    <div class="page-wrapper" style="min-height: 319px;">
        <div class="container-fluid">
            <!-- Title -->
            <div class="row heading-bg bg-blue">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h5 class="txt-light">All Agent List</h5>
                </div>
            </div>
            <!-- /Title -->
            <div class="row">
                <!-- Basic Table -->
                <div class="col-sm-12">
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{ session('success') }}
                    </div>
                    @endif
                    <div class="panel panel-default card-view">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-heading">
                                <div class="pull-left">
                                    <h6 class="panel-title txt-dark">Total Agent : {{ $agent_all->total() }}</h6>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-body">
                                <div class="table-wrap mt-40">
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Company Name</th>
                                                <th>Address</th>
                                                <th>SSM No.</th>
                                                <th>Register On</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($agent_all as $list)
                                            <tr>
                                                <td>{{ $list->name }}</td>
                                                <td>{{ $list->email }}</td>
                                                <td>{{ $list->agent->company_name }}</td>
                                                <td>{{ $list->agent->address }}</td>
                                                <td>{{ $list->agent->ssm_no }}</td>
                                                <td>{{ $list->agent->created_at->diffForHumans() }}</td>
                                            </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{ $agent_all->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Basic Table -->
            </div>
        </div>
    </div>
@endsection
