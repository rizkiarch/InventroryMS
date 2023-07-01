<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction_in;
use App\Models\Transaction_out;
use App\Http\Controllers\Controller;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class TransactionInController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $rows = collect();
            $transaction_in = Transaction_in::query()
                ->orderBy('name_product', 'asc')->chunk(100, function ($transaction_in) use ($rows) {
                    foreach ($transaction_in as $transaction) {
                        $rows->push($transaction);
                    }
                });
            return response()->json([
                'message' => 'Transaction_in retrieved successfully',
                'data' => $transaction_in,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $data = $request->validate([
                'tanggal' => 'date',
                'code_product' => 'string',
                'name_supplier' => 'string',
                'name_product' => 'string',
                'info' => 'string',
                'price' => 'integer',
                'qty' => 'integer',
                'status' => 'boolean',
                'user_id' => 'integer',
            ]);
            $data['code_product'] = IdGenerator::generate([
                'table' => 'transaction_ins',
                'field' => 'code_product',
                'length' => 10,
                'reset_on_prefix_change' => true,
                'prefix' => 'TSN-' . date('y')
            ]);
            Transaction_in::create($data);
            return response()->json([
                'status' => 'success 201',
                'message' => 'Transaction_in created successfully',
                'date' => $data
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction_in $transaction_in)
    {
        try {
            return response()->json([
                'message' => 'Transaction_in retrieved successfully',
                'data' => $transaction_in,
            ], 200);
        } catch (\Throwable $th) {

            return response()->json([
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction_in $transaction_in)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction_in $transaction_in)
    {
        try {
            $data = $request->validate([
                'tanggal' => 'date',
                'code_product' => 'string',
                'name_supplier' => 'string',
                'name_product' => 'string',
                'info' => 'string',
                'price' => 'integer',
                'qty' => 'integer',
                'status' => 'boolean',
                'user_id' => 'integer',
            ]);

            $transaction_in->update($data);
            return response()->json([
                'status' => 'success 201',
                'message' => 'Transaction_in updated successfully'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction_in $transaction_in)
    {
        if ($transaction_in->delete()) {
            return response()->json([
                'status' => 'success 201',
                'message' => 'Transaction_in deleted successfully'
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Transaction_in could not be deleted'
            ]);
        }
    }
}
