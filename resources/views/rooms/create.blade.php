@extends('layouts.app')

@section('content')
<div class="container">
    <h1>สร้างห้องใหม่</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('rooms.store') }}" method="POST">
        @csrf
        <input type="text" name="room_number" placeholder="หมายเลขห้อง" value="{{ old('room_number') }}" required>
        <input type="number" name="price" placeholder="ราคา" value="{{ old('price') }}" required>
        <select name="status" required>
            <option value="available" {{ old('status')=='available'?'selected':'' }}>ว่าง</option>
            <option value="occupied" {{ old('status')=='occupied'?'selected':'' }}>ไม่ว่าง</option>
        </select>
        <input type="text" name="name" placeholder="ชื่อห้อง" value="{{ old('name') }}">
        <input type="number" name="capacity" placeholder="จำนวนผู้เข้าห้อง" value="{{ old('capacity') }}">
        <textarea name="description" placeholder="รายละเอียด">{{ old('description') }}</textarea>
        <button type="submit" class="btn btn-primary">บันทึก</button>
        <a href="{{ route('rooms.index') }}" class="btn btn-secondary">ยกเลิก</a>
    </form>
</div>
@endsection
