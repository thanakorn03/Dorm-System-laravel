<!-- resources/views/invoices/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Invoice</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6 text-center">สร้างบิลใหม่</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('invoices.store') }}">
            @csrf

            <!-- เลือกผู้เช่า -->
            <div class="mb-4">
                <label class="block mb-1 font-semibold" for="tenant_id">ผู้เช่า</label>
                <select name="tenant_id" id="tenant_id"
                        class="w-full border p-2 rounded @error('tenant_id') border-red-500 @enderror" required>
                    <option value="">-- เลือกผู้เช่า --</option>
                    @foreach($tenants as $tenant)
                        <option value="{{ $tenant->id }}" {{ old('tenant_id') == $tenant->id ? 'selected' : '' }}>
                            {{ $tenant->name }} (ห้อง: {{ $tenant->room->id ?? '-' }})
                        </option>
                    @endforeach
                </select>
                @error('tenant_id')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- เลือกห้อง -->
            <div class="mb-4">
                <label class="block mb-1 font-semibold" for="room_id">ห้อง</label>
                <select name="room_id" required>
    <option value="">-- เลือกห้อง --</option>
    @foreach($rooms as $room)
        <option value="{{ $room->id }}" {{ old('room_id') == $room->id ? 'selected' : '' }}>
            ห้อง {{ $room->room_number ?? $room->id }}
        </option>
    @endforeach
</select>


                @error('room_id')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- จำนวนเงิน -->
            <div class="mb-4">
                <label class="block mb-1 font-semibold" for="amount">จำนวนเงิน</label>
                <input type="number" step="0.01" name="amount" id="amount" value="{{ old('amount') }}"
                       class="w-full border p-2 rounded @error('amount') border-red-500 @enderror" required>
                @error('amount')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- วันครบกำหนด -->
            <div class="mb-4">
                <label class="block mb-1 font-semibold" for="due_date">วันครบกำหนด</label>
                <input type="date" name="due_date" id="due_date" value="{{ old('due_date') }}"
                       class="w-full border p-2 rounded @error('due_date') border-red-500 @enderror" required>
                @error('due_date')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600">
                บันทึกบิล
            </button>
        </form>
    </div>
</body>
</html>
