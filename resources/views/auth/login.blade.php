<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="{{ asset('img/logoarsip.png') }}" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    @vite('resources/css/app.css') <!-- Pastikan Vite digunakan -->
</head>
<body class="flex items-center justify-center min-h-screen bg-green-300">
    <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center text-green-600 flex items-center justify-center">
            <img src="img/logoarsip.png" alt="Logo" class="w-10 h-10"> <!-- Ganti dengan path logo Anda -->
            <span>Login</span>
        </h2>
        <form action="{{ route('authenticate') }}" method="POST" class="mt-6">
            @csrf
            @method('POST')
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    class="w-full px-4 py-2 mt-1 border rounded-md focus:ring-2 focus:ring-green-600 focus:outline-none"
                    required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    class="w-full px-4 py-2 mt-1 border rounded-md focus:ring-2 focus:ring-green-600 focus:outline-none"
                    required>
            </div>
            @if ($errors->any())
                <div class="mb-4 text-sm text-red-600">
                    {{ $errors->first() }}
                </div>
            @endif
            <button 
                type="submit" 
                class="w-full px-4 py-2 text-white bg-green-600 rounded-md hover:bg-green-700">
                Login
            </button>
        </form>
    </div>
</body>
</html>
