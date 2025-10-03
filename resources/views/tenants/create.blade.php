<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มผู้เช่าใหม่</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6 text-center">เพิ่มผู้เช่าใหม่</h1>

        <!-- แสดง Error Validation -->
        @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('tenants.store') }}">
            @csrf

            <div class="mb-4">
                <label for="name" class="block mb-1 font-semibold">ชื่อ</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" 
                       class="w-full border p-2 rounded @error('name') border-red-500 @enderror">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block mb-1 font-semibold">อีเมล</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" 
                       class="w-full border p-2 rounded @error('email') border-red-500 @enderror">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="phone" class="block mb-1 font-semibold">เบอร์โทร</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone') }}" 
                       class="w-full border p-2 rounded @error('phone') border-red-500 @enderror">
                @error('phone')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600">
                บันทึก
            </button>
        </form>
    </div>
</body>
</html>
