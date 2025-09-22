<?php

namespace App\Http\Controllers;

use App\Models\MaintenanceRequest;
use Illuminate\Http\Request;

class MaintenanceRequestController extends Controller
{
    public function index() { $requests = MaintenanceRequest::all(); return view('maintenance.index', compact('requests')); }
    public function create() { return view('maintenance.create'); }
    public function store(Request $request) {
        $validated = $request->validate([
            'room_id'=>'required|exists:rooms,id',
            'description'=>'required|string',
            'status'=>'required|in:pending,in_progress,completed',
        ]);
        MaintenanceRequest::create($validated);
        return redirect()->route('maintenance.index')->with('success','สร้างคำร้องเรียบร้อยแล้ว');
    }
    public function show(MaintenanceRequest $maintenance) { return view('maintenance.show', compact('maintenance')); }
    public function edit(MaintenanceRequest $maintenance) { return view('maintenance.edit', compact('maintenance')); }
    public function update(Request $request, MaintenanceRequest $maintenance) {
        $validated = $request->validate([
            'room_id'=>'required|exists:rooms,id',
            'description'=>'required|string',
            'status'=>'required|in:pending,in_progress,completed',
        ]);
        $maintenance->update($validated);
        return redirect()->route('maintenance.index')->with('success','แก้ไขคำร้องเรียบร้อยแล้ว');
    }
    public function destroy(MaintenanceRequest $maintenance) { $maintenance->delete(); return redirect()->route('maintenance.index')->with('success','ลบคำร้องเรียบร้อยแล้ว'); }
}

