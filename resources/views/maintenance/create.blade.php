<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สร้างงานซ่อมบำรุง</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6 text-center">สร้างงานซ่อมบำรุง</h1>

        <form method="POST" action="{{ route('maintenance.store') }}">
    @csrf
    <div>
        <label>ห้อง</label>
        <select name="room_id" required>
            <option value="">-- เลือกห้อง --</option>
            @foreach($rooms as $room)
                <option value="{{ $room->id }}">{{ $room->room_number }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label>รายละเอียด</label>
        <textarea name="description" required></textarea>
    </div>

    <button type="submit">บันทึกงานซ่อม</button>
</form>

    </div>
</body>
</html>
