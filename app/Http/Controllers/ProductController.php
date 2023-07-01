<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $Product = Product::all();
            return response()->json([
                'message' => 'Product retrieved successfully',
                'data' => $Product,
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
        $data = $request->validate([
            'nama_barang' => 'required|string',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'keterangan' => 'required|string',
        ]);

        if (Product::create($data)) {
            return response()->json([
                'status' => 'success 201',
                'message' => 'Product created successfully'
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Product could not be created'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        try {
            return response()->json([
                'status' => 'Inventory retrieved successfully',
                'data' => $product
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'Product could not be retrieved',
                'message' => $th->getMessage()
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'nama_barang' => 'required|string',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'keterangan' => 'required|string',
        ]);

        if ($product->update($data)) {
            return response()->json([
                'status' => 'success 201',
                'message' => 'Product updated successfully'
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Product could not be updated'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->delete()) {
            return response()->json([
                'status' => 'success 201',
                'message' => 'Product deleted successfully'
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Product could not be deleted'
            ]);
        }
    }
}
