<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $rows = collect();
            $Products = Product::query()
                ->orderBy('name_product', 'asc')->chunk(100, function ($Products) use ($rows) {
                    foreach ($Products as $product) {
                        $rows->push($product);
                    }
                });
            return response()->json([
                'message' => 'Product retrieved successfully',
                'data' => $Products,
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
                'name_supplier' => 'string',
                'code_product' => 'string',
                'name_product' => 'string',
                'price' => 'integer',
                'qty' => 'integer',
                'info' => 'string',
            ]);

            $data['code_product'] = IdGenerator::generate([
                'table' => 'products',
                'field' => 'code_product',
                'length' => 10,
                'reset_on_prefix_change' => true,
                'prefix' => 'PRD-' . date('y')
            ]);
            Product::create($data);

            return response()->json([
                'status' => 'success 201',
                'message' => 'Product created successfully',
                'data' => $data,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'Product could not be created',
                'message' => $th->getMessage()
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
        try {
            $data = $request->validate([
                'code_product' => 'string',
                'name_product' => 'string',
                'price' => 'integer',
                'qty' => 'integer',
                'status' => 'boolean',
            ]);
            $product->update($data);
            return response()->json([
                'status' => 'success 201',
                'message' => 'Product updated successfully',
                'data' => $product
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
    public function destroy(Product $product)
    {
        if ($product->delete()) {
            return response()->json([
                'status' => 'success 201',
                'message' => 'Product' . $product->code_name . ' deleted successfully'
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Product could not be deleted'
            ]);
        }
    }
}
