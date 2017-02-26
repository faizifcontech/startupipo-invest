@extends('layouts.admin')
@section('content')
    <div class="page-wrapper" style="min-height: 319px;">
        <div class="container-fluid">
            <!-- Title -->
            <div class="row heading-bg bg-blue">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h5 class="txt-light">All User </h5>
                </div>
            </div>
            <!-- /Title -->
            <div class="row">
                <!-- Basic Table -->
                <div class="col-sm-12">
                    <div class="panel panel-default card-view">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-heading">
                                <div class="pull-left">
                                    <h6 class="panel-title txt-dark">Total User : {{ $user_all->total() }}</h6>
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
                                                <th>Gender</th>
                                                <th>Register On</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($user_all as $list)
                                                <tr>
                                                    <td>{{ $list->name }}</td>
                                                    <td>{{ $list->email }}</td>
                                                    <td>{{ $list->gender }}</td>
                                                    <td>{{ $list->created_at->toFormattedDateString() }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        {{ $user_all->links() }}
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
