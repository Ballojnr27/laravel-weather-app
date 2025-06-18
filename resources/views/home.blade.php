<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Weather App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-sky-400 to-blue-600 min-h-screen flex flex-col items-center justify-center text-white relative">

    {{-- Top-right buttons --}}
    <div class="absolute top-5 right-5 flex space-x-4">
        <a href="/search-history" class="bg-white text-blue-800 font-semibold py-1 px-3 rounded shadow hover:bg-blue-100">
            Search History
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="inline">
            @csrf
            <button type="submit" class="bg-white text-blue-800 font-semibold py-1 px-3 rounded shadow hover:bg-blue-100">
                Logout
            </button>
        </form>
    </div>

    {{-- Welcome Message and Search --}}
    <div class="bg-white/10 backdrop-blur-md p-8 rounded-xl shadow-lg max-w-md w-full text-center">
        <h2 class="text-xl font-semibold mb-6">Welcome, {{ Auth::user()->name }}</h2>

        <form action="{{ route('show') }}" method="GET" class="flex">
            <input
                type="text"
                name="location"
                placeholder="Enter city name"
                required
                class="flex-grow px-4 py-2 rounded-l-full focus:outline-none text-gray-800 placeholder-gray-500 bg-white"
            >
            <button type="submit" class="bg-white px-4 rounded-r-full">
                🔍
            </button>
        </form>
    </div>

</body>
</html>
