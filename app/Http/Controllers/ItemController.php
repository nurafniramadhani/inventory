<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
    // POST /api/items
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric',
            'category_id' => 'required'
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'data' => null,
                'message' => $validator->errors()->first()
            ], 500);
        }

        // Jika berhasil
        return response()->json([
            'status' => 'success',
            'data' => $request->all(),
            'message' => 'Data berhasil ditambahkan'
        ], 200);
    }

    // GET /api/items/{id}
    public function show($id)
    {
        // Simulasi data tidak ditemukan
        if ($id != 1) {
            return response()->json([
                'status' => 'error',
                'data' => null,
                'message' => "No query results for model [App\\Models\\Item] $id"
            ], 404);
        }

        // Jika data ditemukan
        return response()->json([
            'status' => 'success',
            'data' => [
                'id' => 1,
                'name' => 'Laptop',
                'quantity' => 10,
                'price' => 1500,
                'category_id' => 1
            ]
        ], 200);
    }
}