<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    // GET /api/items
    public function index()
    {
        return response()->json([
            'status' => 'success',
            'data' => Item::all()
        ], 200);
    }

    // POST /api/items
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'category_id' => 'required'
        ]);

        $item = Item::create($request->all());

        return response()->json([
            'status' => 'success',
            'data' => $item
        ], 201);
    }

    // DELETE /api/items/{id}
    public function destroy($id)
    {
        $user = Auth::user();

        // cek role
        if ($user->role !== 'admin') {
            return response()->json([
                'message' => 'Unauthorized'
            ], 403);
        }

        $item = Item::find($id);

        if (!$item) {
            return response()->json([
                'message' => 'Item not found'
            ], 404);
        }

        $item->delete();

        return response()->json([
            'message' => 'Item deleted successfully'
        ], 200);
    }
}