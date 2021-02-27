<?php

namespace App\Http\Controllers;

use App\Inventory;
use App\StockTransfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockTransferController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stock_transfers = StockTransfer::all();

        foreach ($stock_transfers as $stock_transfer) {
            $stock_transfer->source_name = Inventory::find($stock_transfer->source)->name;
            $stock_transfer->destination_name = Inventory::find($stock_transfer->destination)->name;
        }

        return view('inventories.stock-transfers.index')->with('stock_transfers', $stock_transfers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventories.stock-transfers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate inputs
        $request->validate([
            'reference' => 'required|unique:stock_transfers|max:20',
            'source' => 'required',
            'destination' => 'required|different:source',
            'transfer_items' => 'required'
        ]);

        // Get inputs from request
        $source = $request->input('source');
        $destination = $request->input('destination');
        $transfer_items = $request->input('transfer_items');
        $quantities = $request->input('quantities');

        // Create stock transfer
        $stock_transfer = new StockTransfer([
            'reference' => $request->input('reference'),
            'source' => $source,
            'destination' => $destination,
        ]);

        if ($request->input('completed') == "on")
            $stock_transfer->completed = true;

        // Save stock transfer
        $stock_transfer->save();

        $transfer_id = StockTransfer::all()->last()['id'];  // Get the latest stock transfer id

        for ($i = 0; $i < count($transfer_items); $i++) {
            $product_id = $transfer_items[$i];
            $transfer_qty = $quantities[$i];

            // Save transfer items
            DB::table('stock_transfer_items')
                ->insert(['transfer_id' => $transfer_id, 'product_id' => $product_id, 'transfer_qty' => $transfer_qty,
                    'created_at' => now(), 'updated_at' => now()]);
        }

        // Do changes to stock quantities only if the transfer is completed
        if ($stock_transfer->completed) {
            $this->updateQuantities($stock_transfer);
        }

        return redirect('stock-transfers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StockTransfer  $stockTransfer
     * @return \Illuminate\Http\Response
     */
    public function show(StockTransfer $stockTransfer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StockTransfer  $stockTransfer
     * @return \Illuminate\Http\Response
     */
    public function edit(StockTransfer $stockTransfer)
    {
        $inventories = Inventory::all();

        $transfer_items = DB::table('stock_transfer_items')->join('products', 'stock_transfer_items.product_id', '=', 'products.id')
            ->join('inventory_items', 'inventory_items.product_id', '=', 'stock_transfer_items.product_id')
            ->where('inventory_id', '=', $stockTransfer->source)->where('transfer_id', '=', $stockTransfer->id)->get();

        foreach ($transfer_items as $transfer_item) {
            // Get destination inventory's quantity and add it to source inventory item as a property
            $transfer_item->destination_qty = DB::table('inventory_items')
                ->where('inventory_id', $stockTransfer->destination)->where('product_id', $transfer_item->id)
                ->pluck('qty')->first();

            // If destination qty is null (if product does not exist in destination inventory), assign 0
            if (!$transfer_item->destination_qty)
                $transfer_item->destination_qty = 0;
        }

        // Get inventory items
        $inventory_items = DB::table('inventory_items')->join('products', 'inventory_items.product_id',
            '=', 'products.id')->where('inventory_id', $stockTransfer->source)->get();

        foreach ($inventory_items as $inventory_item) {
            // Get destination inventory's quantity and add it to source inventory item as a property
            $inventory_item->destination_qty = DB::table('inventory_items')
                ->where('inventory_id', $stockTransfer->destination)->where('product_id', $inventory_item->id)
                ->pluck('qty')->first();

            // If destination qty is null (if product does not exist in destination inventory), assign 0
            if (!$inventory_item->destination_qty)
                $inventory_item->destination_qty = 0;
        }

        return view('inventories.stock-transfers.edit')->with('stock_transfer', $stockTransfer)
            ->with('inventories', $inventories)->with('inventory_items', $inventory_items)->with('transfer_items', $transfer_items);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StockTransfer  $stockTransfer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StockTransfer $stockTransfer)
    {
        // Validate inputs
        $request->validate([
            'reference' => 'required|max:20',
            'transfer_items' => 'required'
        ]);

        // Get inputs from request
        $transfer_items = $request->input('transfer_items');
        $quantities = $request->input('quantities');

        // Create stock transfer
        $stockTransfer->reference = $request->input('reference');

        if ($request->input('completed') == "on")
            $stockTransfer->completed = true;

        // Save stock transfer
        $stockTransfer->save();

        $transfer_id = $stockTransfer->id;

        // Delete previous transfer items
        DB::table('stock_transfer_items')->where('transfer_id', '=', $transfer_id)->delete();

        for ($i = 0; $i < count($transfer_items); $i++) {
            $product_id = $transfer_items[$i];
            $transfer_qty = $quantities[$i];

            // Save new transfer items
            DB::table('stock_transfer_items')
                ->insert(['transfer_id' => $transfer_id, 'product_id' => $product_id, 'transfer_qty' => $transfer_qty,
                    'created_at' => now(), 'updated_at' => now()]);
        }

        // Do changes to stock quantities only if the transfer is completed
        if ($stockTransfer->completed) {
            $this->updateQuantities($stockTransfer);
        }

        return redirect('stock-transfers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StockTransfer  $stockTransfer
     * @return \Illuminate\Http\Response
     */
    public function destroy(StockTransfer $stockTransfer)
    {
        // Delete stock transfer and redirect to index
        $stockTransfer->delete();
        return redirect('stock-transfers');
    }

    private function updateQuantities(StockTransfer $stockTransfer) {
        $source = $stockTransfer->source;
        $destination = $stockTransfer->destination;

        $transfer_items = DB::table('stock_transfer_items')->join('products', 'stock_transfer_items.product_id', '=', 'products.id')
            ->join('inventory_items', 'inventory_items.product_id', '=', 'stock_transfer_items.product_id')
            ->where('inventory_id', '=', $stockTransfer->source)->where('transfer_id', '=', $stockTransfer->id)->get();

        foreach ($transfer_items as $transfer_item) {
            $product_id = $transfer_item->product_id;
            $transfer_qty = $transfer_item->transfer_qty;

            // Decrement the selected quantity from source inventory
            DB::table('inventory_items')->where('inventory_id', $source)->where('product_id', $product_id)
                ->decrement('qty', $transfer_qty);

            // Check if the selected product exist in destination inventory
            if (DB::table('inventory_items')->where('inventory_id', $destination)->where('product_id', $product_id)->first()) {
                // If the product exists, increment its respective quantity by the given value
                DB::table('inventory_items')->where('inventory_id', $destination)->where('product_id', $product_id)
                    ->increment('qty', $transfer_qty);
            } else {  // If the product does not exist in destination inventory, insert a new row for it
                DB::table('inventory_items')->insert(['inventory_id' => $destination, 'product_id' => $product_id, 'qty' => $transfer_qty,
                    'created_at' => now(), 'updated_at' => now()]);
            }

            // If the quantity in source inventory is 0 after the transaction, delete the item from that inventory
            if (DB::table('inventory_items')->where('inventory_id', $source)->where('product_id', $product_id)->first()->qty == 0)
                DB::table('inventory_items')->where('inventory_id', $source)->where('product_id', $product_id)->delete();
        }

    }

    public function complete(StockTransfer $stock_transfer) {
        $this->updateQuantities($stock_transfer);

        $stock_transfer->completed = true;
        $stock_transfer->save();

        return redirect('stock-transfers');
    }
}
