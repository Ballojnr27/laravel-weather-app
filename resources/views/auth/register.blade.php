<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register | Weather App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-b from-blue-400 to-indigo-600 min-h-screen flex items-center justify-center p-4 text-gray-900">

    <div class="w-full max-w-md bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-xl">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Create an Account</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4">
                <label for="name" class="block mb-1 font-medium">Name</label>
                <input id="name" type="text"
                    class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror"
                    name="name" value="{{ old('name') }}" required autofocus>

                @error('name')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block mb-1 font-medium">Email Address</label>
                <input id="email" type="email"
                    class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror"
                    name="email" value="{{ old('email') }}" required>

                @error('email')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block mb-1 font-medium">Password</label>
                <input id="password" type="password"
                    class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('password') border-red-500 @enderror"
                    name="password" required>

                @error('password')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password-confirm" class="block mb-1 font-medium">Confirm Password</label>
                <input id="password-confirm" type="password"
                    class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    name="password_confirmation" required>
            </div>

            <button type="submit"
                class="w-full py-3 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition">
                {{ __('Register') }}
            </button>

            <div class="text-center mt-4 text-sm">
                Already have an account?
                <a href="/login" class="text-blue-700 hover:underline">Login</a>
            </div>
        </form>
    </div>

</body>
</html>
