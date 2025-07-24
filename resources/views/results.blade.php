<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Weather Results</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body
    class="bg-gradient-to-b from-blue-500 to-indigo-700 min-h-screen flex items-center justify-center p-4 text-white font-sans">

    <div class="absolute top-4 right-4 flex gap-4 text-sm">
        <a href="/home" class="bg-white text-blue-800 font-semibold py-1 px-3 rounded shadow hover:bg-blue-100">
            Home
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="inline">
            @csrf
            <button type="submit"
                class="bg-white text-blue-800 font-semibold py-1 px-3 rounded shadow hover:bg-blue-100">
                Logout
            </button>
        </form>
    </div>

    <div class="w-full max-w-md bg-white/10 backdrop-blur-md rounded-2xl shadow-lg p-6 space-y-6">

        @if (isset($error))
            <div class="bg-red-600 text-white text-center py-3 px-4 rounded-lg">
                {{ $error }}
            </div>
        @elseif(isset($weatherData))
            <!-- Header -->
            <div class="text-center">
                <h1 class="text-2xl font-bold">{{ $location }}, {{ $weatherData['country'] }}</h1>
                <p class="text-sm">{{ \Carbon\Carbon::now()->format('l, F jS, Y') }}</p>
            </div>

            <!-- Temperature & Icon -->
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="text-center sm:text-left">
                    <p class="text-5xl font-bold">{{ $weatherData['temp_avg'] }}°C</p>
                    <p class="capitalize text-lg">{{ $weatherData['description'] }}</p>
                </div>
                <img src="https://openweathermap.org/img/wn/{{ $weatherData['icon'] }}@4x.png" alt="Weather Icon"k,gku
                    class="w-24 h-24">

            </div>

            <!-- Key Metrics -->
            <div class="grid grid-cols-2 gap-4 text-center text-white/90">
                <div class="bg-white/20 p-3 rounded-lg">
                    <p class="text-sm">Humidity</p>
                    <p class="text-lg font-bold">{{ $weatherData['humidity'] }}%</p>
                </div>
                <div class="bg-white/20 p-3 rounded-lg">
                    <p class="text-sm">Wind</p>
                    <p class="text-lg font-bold">{{ $weatherData['wind'] }} km/h</p>
                </div>
            </div>

            <!-- More Info -->
            <div class="pt-4 border-t border-white/30 text-sm space-y-2">
                <p><strong>Min Temp:</strong> {{ $weatherData['temp_min'] }}°C</p>
                <p><strong>Max Temp:</strong> {{ $weatherData['temp_max'] }}°C</p>
                <p><strong>Pressure:</strong> {{ $weatherData['pressure'] }} hPa</p>
                <p><strong>Cloud Coverage:</strong> {{ $weatherData['clouds'] }}%</p>
                <p><strong>Rain (last 1h):</strong> {{ $weatherData['rain'] }}</p>
            </div>
        @else
            <p class="text-center">Weather data is unavailable. Please try again.</p>
        @endif

    </div>

</body>

</html>
