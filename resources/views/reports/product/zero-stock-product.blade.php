@extends('layouts.main')
@section('content')

<div class="pg-heading">
    <a href="{{ route('reports.index') }}">
        <i class="fa fa-arrow-left pg-back"></i>
    </a>
    <div class="pg-title">Zero Stock Product Report</div>
</div>

<div class="section">

    <div class="section-content">

        <table id="myTable" class="table hover table-striped table-borderless table-hover all-table">
            <a href="{{ route('reports.export-zero-stock-product') }}"
               target="_blank">
                <div class="add-btn">Export Report</div>
            </a>

            <thead class="table-head">
                <tr>
                    <th>Product Code</th>
                    <th>Product Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->pcode }}</td>
                        <td>{{ $product->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
