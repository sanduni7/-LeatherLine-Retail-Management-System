@extends('layouts.main')
@section('content')

<div class="pg-heading">
    <div class="pg-title">Stock Transfers</div>
</div>
@if(session('message'))
<div class="message">
    <div class="message-success">
        <i class="far fa-check-circle message-icon"></i>
        <span class="message-text">Success!</span>
        <span class="message-text-sub">You're awesome!!!</span>

    </div>
</div>
{{ Session::forget('message') }}
@endif
<div class="section">

    <div class="section-content">

        <table id="myTable" class="table hover table-striped table-borderless table-hover all-table">
            <a href="{{ route('stock-transfers.create') }}">
                <div class="add-btn">Add Stock Transfer</div>
            </a>
            <thead class="table-head">
                <tr>
                    <th>Reference #</th>
                    <th>Source</th>
                    <th>Destination</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stock_transfers as $stock_transfer)
                    <tr>
                        <td>{{$stock_transfer->reference}}</td>
                        <td>{{$stock_transfer->source_name}}</td>
                        <td>{{$stock_transfer->destination_name}}</td>
                        <td>
                            @if ($stock_transfer->completed)
                                <span><i class="fa fa-check text-success"></i>
                                    &nbsp;Received
                                </span>
                            @else
                                <span><i class="fa fa-circle" style="color: #058de9"></i>
                                    &nbsp;Pending</span>
                            @endif
                        </td>
                        <td>{{ $stock_transfer->created_at }}</td>

                        <td class="action-icon">
                            @if(!$stock_transfer->completed)
                                <a href="{{ route('stock-transfers.complete', $stock_transfer) }}"><i class="fas fa-check"></i></a>
                                <a href="{{ route('stock-transfers.edit', $stock_transfer) }}"><i class="fas fa-pen"></i></a>
                            @else
                                <i style="margin: 0 44px"></i>
                            @endif
                            <button type="submit" class="dlt-btn" id="dlt-btn{{ $stock_transfer->id }}"><i class="fas fa-trash-alt"></i></button>
                            <form method="POST" class="dlt-form" id="dlt-form{{ $stock_transfer->id }}" action="{{ route('stock-transfers.destroy', $stock_transfer) }}">
                                @method('DELETE')  {{-- Spoof form method as 'DELETE' to comply with destroy route --}}
                                @csrf
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

@endsection
