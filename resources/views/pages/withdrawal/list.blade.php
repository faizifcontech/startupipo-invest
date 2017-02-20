@extends('layouts.user', ['title' => 'Payback Period'])
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert.css') }}">
@endsection
@section('js')
    <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
    @include('sweet::alert')
@endsection

@section('content')
    <div class="be-content">
        <div class="main-content container-fluid">
            <div class="row">
                @if (session('success'))
                    <div class="col-md-offset-1 col-md-10">
                        <div role="alert" class="alert alert-contrast alert-success alert-dismissible">
                            <div class="icon"><span class="mdi mdi-check"></span></div>
                            <div class="message">
                                <button type="button" data-dismiss="alert" aria-label="Close" class="close"><span
                                            aria-hidden="true" class="mdi mdi-close"></span></button>
                                <strong>Good!</strong> {{ session('success') }}
                            </div>
                        </div>
                    </div>
            </div>
            @endif
            @if(! count($bankCheck) > 0)
                <div class="col-md-12">
                    <div class="panel panel-border-color panel-border-color-danger">
                        <div class="panel-heading">No banks detail found !</div>
                        <div class="panel-body">
                            <h3> To proceed your withdrawal process, please add your bank details. </h3>
                            <a href="{{ url('profile/bank-detail') }}"
                               class="xs-mt-20 xs-mb-20 btn btn-space btn-danger btn-xl">Add bank details</a>
                        </div>
                    </div>
                </div>
            @elseif(! count($semuaSenarai) > 0)
                <div class="col-md-offset-1 col-md-10">
                    <div class="panel panel-contrast">
                        <div class="panel-heading panel-heading-contrast">No active record found !</div>
                        <div class="panel-body">
                            <p>We didnt found any active record. Get in touch with your agent and start funding today.
                                The goal of investing is make more money. Investing now, and earn profit.</p>
                            <a href="{{ url('view/deposit') }}"
                               class="xs-mt-20 xs-mb-20 btn btn-space btn-primary btn-xl">Make investment</a>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-sm-12">
                    <div class="panel panel-default panel-table">
                        <div class="panel-heading">Listing
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th style="width:20%;">Package</th>
                                    <th style="width:15%;">Total invest</th>
                                    <th style="width:10%;">Deposit on</th>
                                    <th style="width:10%;">Effective Date</th>
                                    <th style="width:2%;">Agreement</th>
                                    <th style="width:1%;">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($semuaSenarai as $senarai)
                                    <tr>
                                        <td class="user-avatar cell-detail user-info">
                                            <button class="btn btn-rounded btn-space btn-default">
                                                Package {{ $senarai->package }}</button>
                                        </td>
                                        <td class="cell-detail">RM {{ $senarai->total_investment }}</td>
                                        <td class="cell-detail">{{ date('j M  Y', strtotime($senarai->created_at)) }}</td>
                                        <td class="cell-detail">
                                            @if($senarai->package == 3)
                                                <?php $date3 = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $senarai->created_at)->addMonths(19)?>

                                                {{  date('j M  Y', strtotime($date3))  }}
                                            @elseif($senarai->package == 2)
                                                <?php $date2 = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $senarai->created_at)->addMonths(13)?>
                                                {{  date('j M  Y', strtotime($date2))  }}
                                            @else
                                                <?php $date1 = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $senarai->created_at)->addMonths(7)?>
                                                {{  date('j M  Y', strtotime($date1))  }}
                                            @endif
                                        </td>
                                        <td class="actions"><a target="_blank"
                                                               @if($profileCheck) href="{{ action('AgreementController@pdfAgreement', $senarai->id) }}"
                                                               @else data-toggle="modal" data-target="#mod-warning"
                                                               @endif class="icon"><i class="mdi mdi-file-text"></i></a>
                                        </td>
                                        <td class="text-right">
                                            @if($senarai->package == 3)
                                                <?php
                                                $validDate = strtotime(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $senarai->created_at)->addMonths(19)); // pakej 3
                                                $nowTime = strtotime(date("Y-m-d H:i:s"));
                                                ?>
                                                @if($validDate <= $nowTime )
                                                        {!! Form::open(['action' => ['ShareController@clearPayback', $senarai->uuid ]]) !!}
                                                        {!! Form::submit('Send To Wallet', ['class' => 'btn btn-lg btn-success pull-right']) !!}
                                                        {!! Form::close() !!}
                                                @else
                                                    <a disabled class="btn btn-space btn-danger">Not valid to
                                                        process</a>
                                                @endif
                                            @elseif($senarai->package == 2)
                                                <?php
                                                $validDate = strtotime(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $senarai->created_at)->addMonths(13)); // pakej 2
                                                $nowTime = strtotime(date("Y-m-d H:i:s"));
                                                ?>
                                                @if($validDate <= $nowTime )
                                                    {!! Form::open(['action' => ['ShareController@clearPayback', $senarai->uuid ]]) !!}
                                                    {!! Form::submit('Send To Wallet', ['class' => 'btn btn-lg btn-success pull-right']) !!}
                                                    {!! Form::close() !!}
                                                @else
                                                    <a disabled class="btn btn-space btn-danger">Not valid to
                                                        process</a>
                                                @endif
                                            @else
                                                <?php
                                                $validDate = strtotime(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $senarai->created_at)->addMonths(7)); // pakej 1
                                                $nowTime = strtotime(date("Y-m-d H:i:s"));
                                                ?>
                                                @if($validDate <= $nowTime )
                                                        {!! Form::open(['action' => ['ShareController@clearPayback', $senarai->uuid ]]) !!}
                                                        {!! Form::submit('Send To Wallet', ['class' => 'btn btn-lg btn-success pull-right']) !!}
                                                        {!! Form::close() !!}
                                                @else
                                                    <a disabled class="btn btn-space btn-danger">Not valid to
                                                        process</a>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{ $semuaSenarai->links() }}
                </div>
            @endif
        </div>
    </div>
    <div id="mod-warning" tabindex="-1" role="dialog" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span
                                class="mdi mdi-close"></span></button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <div class="text-warning"><span class="modal-main-icon mdi mdi-alert-triangle"></span></div>
                        <h3>Warning!</h3>
                        <p>We did not found your profile record. <br>To view your agreement, Please add your profile
                            info.</p>
                        <div class="xs-mt-50">
                            <button type="button" data-dismiss="modal" class="btn btn-space btn-default">Cancel</button>
                            <a href="{{ action('ProfileController@index') }}" class="btn btn-space btn-warning">Create
                                Profile</a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
@endsection
