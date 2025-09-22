<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomApiController extends Controller
{
    public function index()
    {
        return response()->json(Room::all());
    }

    public function show(Room $room)
    {
        return response()->json($room);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'room_number'=>'required|unique:rooms',
            'price'=>'required|numeric',
            'status'=>'required',
            'name'=>'nullable|string',
            'capacity'=>'nullable|integer',
            'description'=>'nullable|string',
        ]);

        $room = Room::create($validated);
        return response()->json($room, 201);
    }

    public function update(Request $request, Room $room)
    {
        $validated = $request->validate([
            'room_number'=>'required|unique:rooms,room_number,' . $room->id,
            'price'=>'required|numeric',
            'status'=>'required',
            'name'=>'nullable|string',
            'capacity'=>'nullable|integer',
            'description'=>'nullable|string',
        ]);

        $room->update($validated);
        return response()->json($room);
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return response()->json(['message' => 'ลบห้องเรียบร้อยแล้ว']);
    }
}
