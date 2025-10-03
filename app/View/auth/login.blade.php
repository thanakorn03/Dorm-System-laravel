<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - {{ config('app.name') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6 text-center">Login</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label class="block mb-1 font-semibold" for="email">Email</label>
                <input class="w-full border border-gray-300 rounded p-2" type="email" name="email" id="email" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-semibold" for="password">Password</label>
                <input class="w-full border border-gray-300 rounded p-2" type="password" name="password" id="password" required>
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600">Login</button>
        </form>

        <p class="mt-4 text-center">
            ยังไม่มีบัญชี? 
            <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Register</a>
        </p>
    </div>
</body>
</html>