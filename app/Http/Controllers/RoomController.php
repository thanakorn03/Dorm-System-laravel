<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index() {
        $rooms = Room::all();
        return view('rooms.index', compact('rooms'));
    }

    public function create() {
        return view('rooms.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'room_number'=>'required|unique:rooms',
            'price'=>'required|numeric',
            'status'=>'required',
            'name'=>'nullable|string',
            'capacity'=>'nullable|integer',
            'description'=>'nullable|string',
        ]);

        Room::create($validated);
        return redirect()->route('rooms.index')->with('success','เพิ่มห้องเรียบร้อยแล้ว');
    }

    public function edit(Room $room) {
        return view('rooms.edit', compact('room'));
    }

    public function update(Request $request, Room $room) {
        $validated = $request->validate([
            'room_number'=>'required|unique:rooms,room_number,' . $room->id,
            'price'=>'required|numeric',
            'status'=>'required',
            'name'=>'nullable|string',
            'capacity'=>'nullable|integer',
            'description'=>'nullable|string',
        ]);

        $room->update($validated);
        return redirect()->route('rooms.index')->with('success','แก้ไขห้องเรียบร้อยแล้ว');
    }

    public function destroy(Room $room) {
        $room->delete();
        return redirect()->route('rooms.index')->with('success','ลบห้องเรียบร้อยแล้ว');
    }
    public function show(Room $room)
    {
    return view('rooms.show', compact('room'));
    }
}
