@extends('layouts.user', ['title' => 'History of deposit'])
@section('css')

@endsection
@section('js')

@endsection
@section('content')
    <div class="be-content">
        <div class="main-content container-fluid">
            @if($adaShare)
                @if(Session::has('success'))
                    <div role="alert" class="alert alert-contrast alert-success alert-dismissible">
                        <div class="icon"><span class="mdi mdi-check"></span></div>
                        <div class="message">
                            <button type="button" data-dismiss="alert" aria-label="Close" class="close"><span
                                        aria-hidden="true" class="mdi mdi-close"></span>
                            </button>{{ Session('success') }}
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default panel-table">
                            <div class="panel-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="actions">Total share</th>
                                        <th>Transfer to</th>
                                        <th class="number">Transfer on</th>
                                        <th class="actions">Package</th>
                                        <th class="actions">Status</th>
                                        <th style="width:28%;">Remarks</th>
                                        <th>Investing on</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($history_fund as $sejarah)
                                        <tr>
                                            <td>RM {{ $sejarah->total_share }}</td>
                                            <td>{{ $sejarah->send_to }}</td>
                                            <td class="number">{{ date( 'g:i A d M Y ', strtotime($sejarah->transfer_on)) }}</td>
                                            <td class="actions">
                                                @if($sejarah->model_of_investment === 1)
                                                    <strong>1</strong>
                                                @elseif($sejarah->model_of_investment === 2)
                                                    <strong >2</strong>
                                                @else($sejarah->model_of_investment === 3)
                                                    <strong >3</strong>
                                                @endif
                                            </td>
                                            <td class="actions">
                                                @if($sejarah->status === 1)
                                                    <span class="text-warning">Pending</span>
                                                @elseif($sejarah->status === 2)
                                                    <span class="text-success">Approved</span>
                                                @elseif($sejarah->status === 3)
                                                    <span class="text-danger">Reject</span>
                                                @else
                                                    Not status
                                                @endif
                                            </td>
                                            <td>
                                                @if(empty($sejarah->remark))
                                                    None
                                                @else
                                                    {{ $sejarah->remark }}
                                                @endif
                                            </td>
                                            <td>{{   $sejarah->created_at->format('jS \\of F Y h:i:s A')  }}  </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{ $history_fund->links() }}
                    </div>
                </div>
            @else
                <h1 class="display-heading text-center">Whoops..!</h1>
                <p class="display-description text-center">Look like you didn't have any history yet, make a deposit
                    <br> and start invest and earn profit with us
                    <br><br> <br>
                    <a href="{{ action('ShareController@deposit') }}" class="btn btn-lg btn-primary">Make new fund</a>
                </p>
            @endif
        </div>
    </div>
@endsection
