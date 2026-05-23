<?php

namespace App\Http\Controllers;

use App\Models\HotelRoom;
use Illuminate\Http\Request;

class HotelRoomController extends Controller
{
    public function index()
    {
        return response()->json(HotelRoom::all());
    }

    public function store(Request $request)
    {
        $hotelRoom = HotelRoom::create($request->all());

        return response()->json($hotelRoom, 201);
    }

    public function show($id)
    {
        return response()->json(HotelRoom::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $hotelRoom = HotelRoom::findOrFail($id);

        $hotelRoom->update($request->all());

        return response()->json($hotelRoom);
    }

    public function destroy($id)
    {
        HotelRoom::destroy($id);

        return response()->json([
            'message' => 'Deleted successfully'
        ]);
    }
}