@extends('layouts.app')

@section('content')
<div class="container">
    <h1>รายละเอียดห้อง {{ $room->room_number }}</h1>

    <ul>
        <li>ชื่อห้อง: {{ $room->name }}</li>
        <li>ราคา: {{ $room->price }}</li>
        <li>สถานะ: {{ $room->status }}</li>
        <li>จำนวนผู้เข้าห้อง: {{ $room->capacity }}</li>
        <li>รายละเอียด: {{ $room->description }}</li>
    </ul>

    <a href="{{ route('rooms.index') }}" class="btn btn-secondary">กลับไปหน้า list</a>
    <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-warning">แก้ไข</a>
</div>
@endsection
