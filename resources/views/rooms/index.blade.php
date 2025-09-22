@extends('layouts.app')

@section('content')
<div class="container">
    <h1>รายการห้อง</h1>
    <a href="{{ route('rooms.create') }}" class="btn btn-primary mb-3">สร้างห้องใหม่</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>หมายเลขห้อง</th>
                <th>ชื่อห้อง</th>
                <th>ราคา</th>
                <th>สถานะ</th>
                <th>จำนวนผู้เข้าห้อง</th>
                <th>การกระทำ</th>
            </tr>
        </thead>
        <tbody>
            @forelse($rooms as $room)
            <tr>
                <td>{{ $room->room_number }}</td>
                <td>{{ $room->name }}</td>
                <td>{{ $room->price }}</td>
                <td>{{ $room->status }}</td>
                <td>{{ $room->capacity }}</td>
                <td>
                    <a href="{{ route('rooms.show', $room->id) }}" class="btn btn-info btn-sm">ดู</a>
                    <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-warning btn-sm">แก้ไข</a>
                    <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('ลบห้องนี้?')">ลบ</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="text-center">ยังไม่มีห้อง</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
