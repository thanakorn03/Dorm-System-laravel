@extends('layouts.app')

@section('content')
<div class="container">
    <h1>รายการบิล</h1>
    <a href="{{ route('invoices.create') }}" class="btn btn-primary mb-3">สร้างบิลใหม่</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>ผู้เช่า</th>
                <th>ห้อง</th>
                <th>จำนวนเงิน</th>
                <th>วันครบกำหนด</th>
                <th>จัดการ</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoices as $invoice)
            <tr>
                <td>{{ $invoice->id }}</td>
                <td>{{ $invoice->tenant->name ?? '' }}</td>
                <td>{{ $invoice->room->name ?? '' }}</td>
                <td>{{ $invoice->amount }}</td>
                <td>{{ $invoice->due_date }}</td>
                <td>
                    <a href="{{ route('invoices.edit', $invoice->id) }}" class="btn btn-sm btn-warning">แก้ไข</a>
                    <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">ลบ</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
