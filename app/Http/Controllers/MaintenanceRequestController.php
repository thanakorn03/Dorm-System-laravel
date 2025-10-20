<?php

namespace App\Http\Controllers;

use App\Models\MaintenanceRequest;
use App\Models\Room;
use Illuminate\Http\Request;

class MaintenanceRequestController extends Controller
{
    public function index() {
        $requests = MaintenanceRequest::with('room')->get();
        return view('maintenance.index', compact('requests'));
    }

    public function create() {
        $rooms = Room::all();
        return view('maintenance.create', compact('rooms'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'description' => 'required|string',
        ]);

        MaintenanceRequest::create($validated);
        return redirect()->route('maintenance.index')->with('success','สร้างงานซ่อมบำรุงเรียบร้อยแล้ว');
    }

    public function edit(MaintenanceRequest $maintenanceRequest) {
        $rooms = Room::all();
        return view('maintenance.edit', compact('maintenanceRequest', 'rooms'));
    }

    public function update(Request $request, MaintenanceRequest $maintenanceRequest) {
        $validated = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'description' => 'required|string',
            'status' => 'required|in:pending,in_progress,completed',
        ]);

        $maintenanceRequest->update($validated);
        return redirect()->route('maintenance.index')->with('success','แก้ไขงานซ่อมบำรุงเรียบร้อยแล้ว');
    }

    public function destroy(MaintenanceRequest $maintenanceRequest) {
        $maintenanceRequest->delete();
        return redirect()->route('maintenance.index')->with('success','ลบงานซ่อมบำรุงเรียบร้อยแล้ว');
    }
}
