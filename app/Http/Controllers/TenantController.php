<?php
namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function index() { $tenants = Tenant::all(); return view('tenants.index', compact('tenants')); }
    public function create() { return view('tenants.create'); }
    public function store(Request $request) {
        $validated = $request->validate([
            'name'=>'required|string',
            'email'=>'required|email|unique:tenants',
            'phone'=>'nullable|string',
        ]);
        Tenant::create($validated);
        return redirect()->route('tenants.index')->with('success','เพิ่มผู้เช่าเรียบร้อยแล้ว');
    }
    public function show(Tenant $tenant) { return view('tenants.show', compact('tenant')); }
    public function edit(Tenant $tenant) { return view('tenants.edit', compact('tenant')); }
    public function update(Request $request, Tenant $tenant) {
        $validated = $request->validate([
            'name'=>'required|string',
            'email'=>'required|email|unique:tenants,email,'.$tenant->id,
            'phone'=>'nullable|string',
        ]);
        $tenant->update($validated);
        return redirect()->route('tenants.index')->with('success','แก้ไขผู้เช่าเรียบร้อยแล้ว');
    }
    public function destroy(Tenant $tenant) { $tenant->delete(); return redirect()->route('tenants.index')->with('success','ลบผู้เช่าเรียบร้อยแล้ว'); }
}
