@extends('layouts.user', ['title' => 'History of withdrawal'])
@section('css')

@endsection
@section('js')

@endsection

@section('content')
    <div class="be-content">
        <div class="main-content container-fluid">
            <div class="row">
                @if(count($listing) > 0)
                    <div class="panel panel-default panel-table">
                        <div class="panel-body">
                            <table class="table table-condensed table-striped">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th class="number">Total Withdrawal</th>
                                    <th class="number">Transfer to</th>
                                    <th class="actions">Date</th>
                                    <th class="actions">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($listing as $listHistory)
                                    <tr>
                                        <td>{{ $listHistory->name }}</td>
                                        <td class="number">- RM {{ $listHistory->sum_withdrawal }}</td>
                                        <td class="number">{{ $listHistory->transfer_to_bank }}</td>
                                        <td class="actions">{{ $listHistory->created_at }}</td>
                                        <td class="actions">
                                            @if( $listHistory->status  === 2)
                                                <span class="label label-success">Approved</span>
                                            @elseif( $listHistory->status  === 1)
                                                <span class="label label-danger">Rejected</span>
                                            @else
                                                <span class="label label-warning">Processing</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                    {{ $listing->links() }}
                @else
                    <div class="panel panel-flat text-center">
                        <div class="panel-heading">No records found !</div>
                        <div class="panel-body">
                            <h4>We didn't found any transaction history</h4>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
