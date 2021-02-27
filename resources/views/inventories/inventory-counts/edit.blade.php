@extends('layouts.main')
@section('content')

<div class="pg-heading">
    <a href="{{ route('inventory-counts.index') }}">
        <i class="fa fa-arrow-left pg-back"></i>
    </a>
    <div class="pg-title">Inventory Count</div>
</div>

<form method="POST" action="{{ route('inventory-counts.update', $inventory_count->id) }}" id="count_form">
    @method('PUT')  {{-- Spoof form method as 'PUT' to comply with update route --}}
    @csrf

    <div class="section">
        <div class="section-title">
            Inventory Count Information
            <hr>
        </div>
        <div class="section-content">
            <div class="row">
                <div class="col">
                    <select id="outlet" name="outlet" class="form-control custom-select" disabled>
                        @foreach($inventories as $inventory)
                            <option value="{{ $inventory->id }}">{{ $inventory->name }}</option>
                        @endforeach
                    </select>
                    <label for="outlet" class="float-label">Outlet</label>
                </div>
                <div class="col">
                    <input type="text" id="reference" name="reference" class="form-control" placeholder="Reference #" required
                           value="{{ $inventory_count->reference }}">
                    <label for="reference" class="float-label">Reference #</label>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <table id="inventory_items" class="table table-sm table-striped table-borderless table-hover all-table">
                        <thead>
                            <tr class="text-center">
                                <th class="table-head">Product Code</th>
                                <th class="table-head">Product Name</th>
                                <th class="table-head">Existing Qty</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($inventory_items) > 0)
                                @foreach($inventory_items as $inventory_item)
                                    <tr style="cursor: pointer" class="inventory_item" onclick='countItem(@json($inventory_item))'
                                        id="{{ "row_".$inventory_item->product_id }}">
                                        <td class="text-left">{{ $inventory_item->pcode }}</td>
                                        <td class="text-left">{{ $inventory_item->name }}</td>
                                        <td class="text-right">{{ $inventory_item->qty }}</td>
                                    </tr>
                                @endforeach
                            @else
                            <tr>
                                <td class="text-center" colspan="3">No items found!</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>

                    <div class="text-center" id="spinner" hidden>
                        <div class="spinner-border my-5" role="status"
                             style="color: #058de9; width: 3em; height: 3em">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">
            Counted Items
            <hr>
        </div>
        <div class="section-content">
            <div class="row">
                <div class="col">
                    <table class="table table-sm table-striped table-borderless table-hover">
                        <thead>
                            <tr class="text-center">
                                <th class="table-head">Product Code</th>
                                <th class="table-head">Product Name</th>
                                <th class="table-head">Expected Qty</th>
                                <th class="table-head">Actual Qty</th>
                            </tr>
                        </thead>
                        <tbody id="counted-items">
                            <tr id="no_items_added">
                                <td class="text-center" colspan="4">No items added...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row submit-row">
                <div class="col">
                    <input class="btn-submit" type="submit" value="Save">

                    <div class="float-right">
                        <input type="checkbox" name="completed" id="completed">
                        <label for="completed" class="mr-4 mt-2">Mark as completed</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    let counted_items = @json($counted_items);
    let inventory_items_table;

    function countItem(item) {
        $('#row_' + item['product_id']).toggle("highlight");

        let exist = false;

        if (counted_items.length > 0) {
            for (let i = 0; i < counted_items.length; i++) {
                if (item['product_id'] === counted_items[i]['product_id']) {
                    exist = true;
                    break;
                }
            }

            if (!exist) {
                counted_items.push(item);
                addTableRow(item);
                addHiddenInput(item);
            }
        } else {
            counted_items.push(item);
            addTableRow(item);
            addHiddenInput(item);
        }
    }

    function addTableRow(item) {
        let counted_items_tbody = document.getElementById('counted-items');
        document.getElementById('no_items_added').setAttribute('hidden', '');

        let tr = document.createElement('tr');
        let item_code = document.createElement('td');
        let item_name = document.createElement('td');
        let item_expected_qty = document.createElement('td');
        let item_actual_qty = document.createElement('td');
        let remove_btn = document.createElement('button');

        tr.setAttribute('id', 'added_row_' + item['product_id']);

        item_expected_qty.setAttribute('class', 'text-right');
        item_actual_qty.setAttribute('class', 'text-right');

        let item_actual_qty_input = document.createElement('input');
        item_actual_qty_input.setAttribute('type', 'number');
        item_actual_qty_input.setAttribute('name', 'actual_quantities[]');
        item_actual_qty_input.setAttribute('min', '0');
        item_actual_qty_input.setAttribute('required', '');
        item_actual_qty_input.setAttribute('class', 'text-right');
        item_actual_qty_input.setAttribute('id', 'actual_qty_' + item['product_id']);
        item_actual_qty_input.setAttribute('style', 'width: 72px');
        item_actual_qty_input.stepUp(item['actual_qty']);

        item_code.innerHTML = item['pcode'];
        item_name.innerHTML = item['name'];
        item_expected_qty.innerHTML = item['qty'];

        remove_btn.setAttribute('class', 'btn btn-danger btn-sm ml-3');
        remove_btn.setAttribute('onclick', 'removeItem(JSON.parse(\'' + JSON.stringify(item) + '\'))');
        let cross_icon = document.createElement('i');
        cross_icon.setAttribute('class', 'fa fa-times');

        remove_btn.appendChild(cross_icon);
        item_actual_qty.appendChild(item_actual_qty_input);
        item_actual_qty.appendChild(remove_btn);
        tr.append(item_code, item_name, item_expected_qty, item_actual_qty);
        counted_items_tbody.appendChild(tr);
    }

    function addHiddenInput(item) {
        let form = document.getElementById('count_form');

        let counted_item_ids = document.createElement('input');
        counted_item_ids.setAttribute('type', 'hidden');
        counted_item_ids.setAttribute('name', 'counted_items[]');
        counted_item_ids.setAttribute('value', item['product_id']);

        form.appendChild(counted_item_ids);
    }

    function removeItem(item) {
        $('#row_' + item['product_id']).toggle("highlight");

        // Remove existing hidden input
        $('input[name="counted_items[]"][value="' + item['product_id'] + '"]').remove();

        // Remove item from transfer items table
        $('#added_row_' + item['product_id']).remove();

        // Remove item from transfer_items array
        for (let i = 0; i < counted_items.length; i++) {
            if (counted_items[i]['product_id'] === item['product_id'])
                counted_items.splice(i, 1);
        }

        if (counted_items.length === 0)
            document.getElementById('no_items_added').removeAttribute('hidden');
    }

    $(document).ready(function () {
        inventory_items_table = $('#inventory_items').DataTable({
            "order": [], "dom": '<"top"f><t><"bottom"lip>',
            language: {
                search: "_INPUT_" , searchPlaceholder: "🔎 Search"
            }
        });

        document.getElementById('outlet').value = {{ $inventory_count->outlet }}

        for (let i = 0; i < counted_items.length; i++) {
            addTableRow(counted_items[i]);
            addHiddenInput(counted_items[i]);
            $('#row_' + counted_items[i]['product_id']).hide();
        }
    })
</script>

@endsection
