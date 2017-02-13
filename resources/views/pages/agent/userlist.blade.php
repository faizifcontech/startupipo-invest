@extends('layouts.agent')
@section('content')
    <!-- Main Content -->
    <div class="page-wrapper">
        <div class="container-fluid">
            <!-- Title -->
            <div class="row heading-bg  bg-blue">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h5 class="txt-light">User List</h5>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Responsive Table -->
            <div class="col-lg-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">User list </h6>
                        </div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="table-wrap mt-10">
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
                                        @foreach($userList as $list)
                                        <tr>
                                            <td>{{ $list->name }}</td>
                                            <td>{{ $list->email }}</td>
                                            <td>{{ $list->gender }}</td>
                                            <td><span class="text-muted"><i class="fa fa-clock-o"></i> {{ $list->created_at }}</span></td>
                                        </tr>
                                         @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{ $userList->links() }}
                </div>
            </div>

            <!-- /Responsive Table -->
        </div>
    </div>
    <!-- /Main Content -->
@endsection
