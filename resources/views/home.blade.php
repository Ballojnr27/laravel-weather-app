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
            <a class="top-right" href="/search-history">Search History</a>

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
    <h2>Welcome, {{ Auth::user()->name }}</h2>

        <form id="weatherForm" action="{{route('show')}}">
      <div class="search_box">
       <input type="text" name="location" id="city" placeholder="Enter a city name" autocomplete="off" required/>
            <button id="search"><ion-icon class="icon" name="search"></ion-icon></button>

      </div>
    </form>

</nav>
</body>
</html>

