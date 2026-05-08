<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        return response()->json(Item::with('category')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'stock' => 'required|integer',
            'price' => 'required|numeric',
            'category_id' => 'required'
        ]);

        $item = Item::create($validated);

        return response()->json($item, 201);
    }

    public function show(Item $item)
    {
        return response()->json($item);
    }

    public function update(Request $request, Item $item)
    {
        $validated = $request->validate([
            'name' => 'required',
            'stock' => 'required|integer',
            'price' => 'required|numeric',
            'category_id' => 'required'
        ]);

        $item->update($validated);

        return response()->json($item);
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return response()->json([
            'message' => 'Item berhasil dihapus'
        ]);
    }
}