@extends('layouts.user', ['title' => 'All Monthly Profit '])
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
            @if(count($profit) > 0)
                <div class="row">
                    <div class="col-md-offset-1 col-md-10">
                        <div class="panel panel-default panel-table">
                            <div class="panel-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th style="width:50%;">Due On</th>
                                        <th class="actions">Monthly Profit</th>
                                        <th class="actions"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($profit as $listProfit)
                                        <tr>
                                            <td>{{ date("jS F Y", strtotime($listProfit->due_date))  }}</td>
                                            <td class="actions">RM {{ $listProfit->profit_amount }}</td>
                                            @if($listProfit->active == 1)
                                            <td class="actions">
                                                {!! Form::open(['action' => ['ShareController@SendProfitMonthly', $listProfit->id ]]) !!}
                                                    {!! Form::submit('Send To Wallet', ['class' => 'btn btn-space btn-success']) !!}
                                                {!! Form::close() !!}
                                            </td>
                                              @else
                                                <td class="actions">
                                                <a disabled="disabled" class="btn btn-space btn-default active">Transferred</a>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{ $profit->links() }}
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-md-offset-1 col-md-10">
                        <div class="panel panel-contrast">
                            <div class="panel-heading panel-heading-contrast">No active record found !</div>
                            <div class="panel-body">
                                <p>We didnt found any  active record. Get in touch with your agent and start funding today.</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
