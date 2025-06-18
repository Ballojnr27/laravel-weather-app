<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Search History</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-blue-600 to-indigo-800 min-h-screen text-white">

    <div class="max-w-4xl mx-auto px-4 py-10">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold">Search History</h1>

            <a href="/home" class="bg-white text-blue-800 font-semibold py-1 px-3 rounded shadow hover:bg-blue-100">
                Home
            </a>
        </div>

        @if ($searchHistory->isEmpty())
            <p class="text-center text-lg">No search history available.</p>
        @else
            <div class="grid gap-6">
                @foreach ($searchHistory as $history)
                    <div class="bg-white/10 backdrop-blur-sm p-5 rounded-xl shadow-md">
                        <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-2">
                            <div>
                                <h2 class="text-xl font-semibold">{{ $history->location }}</h2>
                                <p class="text-sm opacity-80">{{ $history->country }}</p>
                            </div>
                            <p class="text-sm mt-2 md:mt-0">Searched:
                                {{ \Carbon\Carbon::parse($history->searched_at)->format('d M Y, h:i A') }}</p>
                        </div>

                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 mt-4 text-sm md:text-base">
                            <div>💨 Wind: {{ $history->weather_data['wind'] }} m/s</div>
                            <div>💧 Humidity: {{ $history->weather_data['humidity'] }}%</div>
                            <div>🌡 Pressure: {{ $history->weather_data['pressure'] }} hPa</div>
                            <div>☁️ Clouds: {{ $history->weather_data['clouds'] }}%</div>
                            <div>🌤 Temp: {{ $history->weather_data['temp_avg'] }} °C</div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</body>

</html>
