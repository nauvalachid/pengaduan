<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login | Website Pengaduan Mahasiswa TI</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background-color: #1a0000;
            color: white;
            font-family: 'Figtree', sans-serif;
        }
    </style>
</head>
<body class="antialiased">
    <div class="min-h-screen flex flex-col justify-center items-center px-6">
        <div class="w-full max-w-md bg-[#450000] rounded-lg shadow-lg p-8">
            <h2 class="text-2xl font-bold text-center text-[#C5B358] mb-6">Masuk Akun</h2>

            @if (session('status'))
                <div class="mb-4 text-sm text-green-500">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-[#C5B358] font-medium mb-1">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                           class="w-full px-4 py-2 rounded bg-[#3a1f1f] border border-gray-600 text-white focus:ring-0 focus:outline-none">
                    @error('email')
                        <p class="text-red-300 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-[#C5B358] font-medium mb-1">Password</label>
                    <div class="relative">
                        <input id="password" type="password" name="password" required
                               class="w-full px-4 py-2 rounded bg-[#3a1f1f] border border-gray-600 text-white focus:ring-0 focus:outline-none">
                        <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 px-4 py-2 text-gray-300">
                              ͡o 
                        </button>
                    </div>
                    @error('password')
                        <p class="text-red-300 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center">
                    <input id="remember_me" type="checkbox" name="remember"
                           class="mr-2 rounded bg-[#3a1f1f] border-gray-600 text-yellow-700 focus:ring-0 focus:outline-none">
                    <label for="remember_me" class="text-sm text-gray-300">Ingat saya</label>
                </div>

                <div class="flex items-center justify-between mt-6">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-300 hover:text-white" href="{{ route('password.request') }}">
                            Lupa Password?
                        </a>
                    @endif

                    <button type="submit"
                            class="px-6 py-2 bg-[#C5B358] text-black font-semibold rounded hover:bg-yellow-600 transition">
                        Masuk
                    </button>
                </div>
            </form>
            <p class="text-sm text-gray-400 mt-4 text-center">
                Belum punya akun? <a href="{{ route('register') }}" class="text-yellow-500 hover:underline">Daftar di sini</a>
            </p>
        </div>
    </div>

    <script>
        // Toggle password 
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordField = document.getElementById('password');
            const type = passwordField.type === 'password' ? 'text' : 'password';
            passwordField.type = type;
        });
    </script>
</body>
</html>
