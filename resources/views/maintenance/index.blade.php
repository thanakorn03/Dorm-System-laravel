@extends('layouts.app')

@section('content')
<div class="container">
    <h1>คำร้องซ่อมบำรุง</h1>
    <a href="{{ route('maintenance.create') }}" class="btn btn-primary mb-3">สร้างคำร้องใหม่</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>ห้อง</th>
                <th>รายละเอียด</th>
                <th>สถานะ</th>
                <th>จัดการ</th>
            </tr>
        </thead>
        <tbody>
            @foreach($requests as $req)
            <tr>
                <td>{{ $req->id }}</td>
                <td>{{ $req->room->name ?? '' }}</td>
                <td>{{ $req->description }}</td>
                <td>{{ $req->status }}</td>
                <td>
                    <a href="{{ route('maintenance.edit', $req->id) }}" class="btn btn-sm btn-warning">แก้ไข</a>
                    <form action="{{ route('maintenance.destroy', $req->id) }}" method="POST" style="display:inline;">
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
