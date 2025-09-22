<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index() { $invoices = Invoice::all(); return view('invoices.index', compact('invoices')); }
    public function create() { return view('invoices.create'); }
    public function store(Request $request) {
        $validated = $request->validate([
            'tenant_id'=>'required|exists:tenants,id',
            'room_id'=>'required|exists:rooms,id',
            'amount'=>'required|numeric',
            'due_date'=>'required|date',
        ]);
        Invoice::create($validated);
        return redirect()->route('invoices.index')->with('success','สร้างบิลเรียบร้อยแล้ว');
    }
    public function show(Invoice $invoice) { return view('invoices.show', compact('invoice')); }
    public function edit(Invoice $invoice) { return view('invoices.edit', compact('invoice')); }
    public function update(Request $request, Invoice $invoice) {
        $validated = $request->validate([
            'tenant_id'=>'required|exists:tenants,id',
            'room_id'=>'required|exists:rooms,id',
            'amount'=>'required|numeric',
            'due_date'=>'required|date',
        ]);
        $invoice->update($validated);
        return redirect()->route('invoices.index')->with('success','แก้ไขบิลเรียบร้อยแล้ว');
    }
    public function destroy(Invoice $invoice) { $invoice->delete(); return redirect()->route('invoices.index')->with('success','ลบบิลเรียบร้อยแล้ว'); }
}
