@extends('layouts.user', ['title' => 'Dashboard'])
@section('css')

@endsection
@section('js')

@endsection

@section('content')
    <div class="be-content">
        <div class="main-content container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <div class="user-display">
                        <div class="user-display-bg"><img src="{{ asset('assets/img/user-profile-display.png') }}"
                                                          alt="Profile Background"></div>
                        <div class="user-display-bottom">
                            <div class="user-display-avatar"><img
                                        @if(Gravatar::exists(Auth::user()->email)) src="{{ Gravatar::get(Auth::user()->email) }}"
                                        @else src="{{ asset('assets/img/avatar-main.jpg') }}"
                                        @endif alt="Avatar">
                            </div>
                            <div class="user-display-info">
                                <div class="name"><span class="mdi mdi-account"></span> {{ Auth::user()->name }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(\App\Profile::where('user_id', Auth::id())->exists())
                    <div class="user-info-list panel panel-default">
                        <div class="panel-body">
                            <table class="no-border no-strip skills">
                                <tbody class="no-border-x no-border-y">
                                <tr>
                                    <td class="icon"><span class="mdi mdi-account-box-mail"></span></td>
                                    <td class="item">Email<span class="icon s7-portfolio"></span></td>
                                    <td>{{ Auth::user()->email }}</td>
                                </tr>
                                <tr>
                                    <td class="icon"><span class="mdi mdi-smartphone-android"></span></td>
                                    <td class="item">Mobile<span class="icon s7-phone"></span></td>
                                    <td>{{ Auth::user()->profile->phone }}</td>
                                </tr>
                                <tr>
                                    <td class="icon"><span class="mdi mdi-pin-drop"></span></td>
                                    <td class="item">Location<span class="icon s7-map-marker"></span></td>
                                    <td>{{ Auth::user()->profile->location }}</td>
                                </tr>
                                </tbody>
                            </table>
                            <hr>
                            <a href="{{ action('ProfileController@index') }}" class="btn btn-info">Edit Profile</a>
                        </div>
                    </div>
                       @else
                        <div class="panel">
                            <div class="panel-heading panel-heading-divider">Alert !</div>
                            <div class="panel-body">
                                <p>To start make any funds, please keep your member profile complete and up-to-date </p>
                                <a href="{{ action('ProfileController@index') }}" class="btn btn-space btn-warning"><i class="icon icon-left mdi mdi-alert-triangle"></i> Update Profile</a>
                            </div>
                        </div>
                     @endif
                </div>
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-xs-6 col-md-6 col-lg-6">
                            <div class="widget widget-tile">
                                <div class="data-info">
                                    <div class="desc">Wallet Balance</div>
                                    <div class="value"><span
                                                class="indicator indicator-positive mdi mdi-chevron-right"></span>RM
                                        <span
                                                data-toggle="counter" data-end="{{ $all_profit or "0"}}"
                                                class="number">0</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-6 col-lg-6">
                            <div class="widget widget-tile">
                                <div class="data-info">
                                    <div class="desc">Active Investment</div>
                                    <div class="value"><span
                                                class="indicator indicator-positive mdi mdi-chevron-right"></span>RM
                                        <span
                                                data-toggle="counter" data-end="{{ $active_invest or "0"}}"
                                                class="number">0</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(!count($history_fund) > 0)
                        <div class="panel panel-contrast">
                            <div class="panel-heading panel-heading-contrast">History of funds</div>
                            <div class="panel-body text-center">
                                <h3> No records request for deposit  </h3>
                            </div>
                        </div>
                    @else
                    <div class="panel panel-default panel-table">
                        <div class="panel-heading">
                            <div class="title">History of funds</div>
                        </div>
                        <div class="panel-body table-responsive">
                            <table class="table table-striped table-borderless">
                                <thead>
                                <tr>
                                    <th style="width:20%;">Investment</th>
                                    <th class="number">Monthly Profit</th>
                                    <th style="width:20%;">Request On</th>
                                    <th style="width:20%;">Status</th>
                                </tr>
                                </thead>
                                <tbody class="no-border-x">

                                @foreach($history_fund as $history)
                                <tr>
                                    <td>RM {{ $history->total_share }}</td>
                                    <td class="number">RM {{ $history->monthly_profit }}</td>
                                    <td>{{ $history->created_at->toFormattedDateString() }}</td>
                                      @if ($history->status == 2)
                                        <td class="text-success">Approved</td>
                                      @elseif ($history->status == 3)
                                        <td class="text-danger">Rejected</td>
                                       @else
                                        <td class="text-success">Processing</td>
                                     @endif
                                </tr>
                                  @endforeach
                                </tbody>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
