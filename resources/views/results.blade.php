<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!---------------  CSS  --------------------->
    <link rel="stylesheet" href="css/style.css">
    <title>Weather App</title>
    <!---------------  IONICONS  --------------------->
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

</head>
<body>

    <header>

        <div class="logo">Weather App</div>
        <div>
            <a class="top-right" href="/home">Home</a>

            <a class="top-right2" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>

   </header>


    <nav>


        @if(isset($error))
            <div class="alert">
                {{ $error }}
            </div>
        @elseif(isset($weatherData))
        <h1 class="my-5">Weather Conditions </h1><br><br>
            <div class="card">
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">Location: {{ $location }}, {{  $weatherData['country'] }}</li><br>
                        <li class="list-group-item">Wind Speed: {{ $weatherData['wind'] }} m/s</li><br>
                        <li class="list-group-item">Humidity: {{ $weatherData['humidity'] }}%</li><br>
                        <li class="list-group-item">Pressure: {{ $weatherData['pressure'] }} hPa</li><br>
                        <li class="list-group-item">Cloud Coverage: {{ $weatherData['clouds'] }}%</li><br>
                        <li class="list-group-item">Cloud Description: {{ ucfirst($weatherData['description']) }}</li><br>
                        <li class="list-group-item">Min Temperature: {{ $weatherData['temp_min'] }} °C</li><br>
                        <li class="list-group-item">Max Temperature: {{ $weatherData['temp_max'] }} °C</li><br>
                        <li class="list-group-item">Average Temperature: {{ $weatherData['temp_avg'] }} °C</li><br>
                        <li class="list-group-item">Rain (last 1h): {{ $weatherData['rain'] }}</li><br>
                    </ul>
                </div>
            </div>
        @else
            <p>Weather data is unavailable. Please try again.</p>
        @endif
    </div>
</nav>
</body>
</html>
