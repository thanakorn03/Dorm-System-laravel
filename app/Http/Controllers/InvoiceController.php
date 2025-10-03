<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Tenant;
use App\Models\Room;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index() {
        $invoices = Invoice::with(['tenant','room'])->get();
        return view('invoices.index', compact('invoices'));
    }

    public function create() {
        $tenants = Tenant::with('room')->get();
        $rooms   = Room::all();
        return view('invoices.create', compact('tenants','rooms'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
    'tenant_id' => 'required|exists:tenants,id',
    'room_id'   => 'required|exists:rooms,id', // ✅ ตรวจสอบ room_id ด้วย
    'amount'    => 'required|numeric',
    'due_date'  => 'required|date',
]);

Invoice::create($validated);
        return redirect()->route('invoices.index')->with('success','สร้างบิลเรียบร้อยแล้ว');
    }

    public function show(Invoice $invoice) {
        return view('invoices.show', compact('invoice'));
    }

    public function edit(Invoice $invoice) {
        $tenants = Tenant::with('room')->get();
        $rooms   = Room::all();
        return view('invoices.edit', compact('invoice','tenants','rooms'));
    }

    public function update(Request $request, Invoice $invoice) {
        $validated = $request->validate([
            'tenant_id' => 'required|exists:tenants,id',
            'room_id'   => 'required|exists:rooms,id',
            'amount'    => 'required|numeric',
            'due_date'  => 'required|date',
        ]);

        $invoice->update($validated);
        return redirect()->route('invoices.index')->with('success','แก้ไขบิลเรียบร้อยแล้ว');
    }

    public function destroy(Invoice $invoice) {
        $invoice->delete();
        return redirect()->route('invoices.index')->with('success','ลบบิลเรียบร้อยแล้ว');
    }
}
