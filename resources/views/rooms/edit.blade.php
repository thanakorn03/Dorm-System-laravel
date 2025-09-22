@extends('layouts.app')

@section('content')
<div class="container">
    <h1>แก้ไขห้อง {{ $room->room_number }}</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('rooms.update', $room->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="room_number" value="{{ old('room_number', $room->room_number) }}" required>
        <input type="number" name="price" value="{{ old('price', $room->price) }}" required>
        <select name="status" required>
            <option value="available" {{ old('status',$room->status)=='available'?'selected':'' }}>ว่าง</option>
            <option value="occupied" {{ old('status',$room->status)=='occupied'?'selected':'' }}>ไม่ว่าง</option>
        </select>
        <input type="text" name="name" value="{{ old('name',$room->name) }}">
        <input type="number" name="capacity" value="{{ old('capacity',$room->capacity) }}">
        <textarea name="description">{{ old('description',$room->description) }}</textarea>
        <button type="submit" class="btn btn-primary">บันทึก</button>
        <a href="{{ route('rooms.index') }}" class="btn btn-secondary">ยกเลิก</a>
    </form>
</div>
@endsection
