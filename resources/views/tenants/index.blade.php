@extends('layouts.app')

@section('content')
<div class="container">
    <h1>รายการผู้เช่า</h1>
    <a href="{{ route('tenants.create') }}" class="btn btn-primary mb-3">เพิ่มผู้เช่า</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>ชื่อ</th>
                <th>Email</th>
                <th>โทรศัพท์</th>
                <th>จัดการ</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tenants as $tenant)
            <tr>
                <td>{{ $tenant->id }}</td>
                <td>{{ $tenant->name }}</td>
                <td>{{ $tenant->email }}</td>
                <td>{{ $tenant->phone }}</td>
                <td>
                    <a href="{{ route('tenants.edit', $tenant->id) }}" class="btn btn-sm btn-warning">แก้ไข</a>
                    <form action="{{ route('tenants.destroy', $tenant->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('ลบจริงไหม?')">ลบ</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
