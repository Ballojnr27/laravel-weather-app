<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search History</title>


    <style>
        body {
    background: url(/img/background.jpg);
    background-position: center;
    background-size: cover;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0;
    padding: 0;
    color: white;

}
.container{
    max-width: 900px;
    width: 1200px;
    height: auto;
    background-color: rgba(0, 0, 0, 0.45);
    backdrop-filter: blur(0.5rem);
    color: white;
}

/*-----------------  BASIC STYLES  -----------------*/
body {
    font-family: 'Poppins', sans-serif;

    margin: 0;
    padding: 0;
    }

h1 {
    text-align: center;
    font-size: 2.5rem;
    margin: 2rem 0;
    color: white;
}

/*-----------------  TABLE STYLES  -----------------*/
.table {
    width: 100%;
    margin: 0 auto;
    font-size: 20px;

    border-collapse: separate; /* Enables border-spacing */
    border-spacing: 0 15px; /* Space between rows and columns */
    border-bottom: 2px solid white;
}

.table thead {
    background: none;

}

th {
    padding: 1rem;
    font-size: 1.2rem;
    text-align: left;
    text-transform: uppercase;
    color: white;
    border-bottom: 2px solid white ;


}

.table tbody tr {
    border-bottom: none;
    padding: 1rem;
}

.table tbody td {
    padding: 1rem ;
    font-size: 20px;
    color: white;
    vertical-align: top;
    border-radius: 8px;
}

/* Space between rows for neatness */
.table tbody tr:not(:last-child) {


}


/*-----------------  LIST STYLES (Weather Data)  -----------------*/
ul {

    padding-left: 0;
    padding-bottom: 30px;
}

ul li {
    font-size: 20px;
    margin: 0.5rem 0;
    color: white;
}

/*-----------------  NO SEARCH HISTORY  -----------------*/
p {
    text-align: center;
    font-size: 1.2rem;
    color: white;
}

/*-----------------  RESPONSIVENESS  -----------------*/
@media (max-width: 768px) {
    h1 {
        font-size: 2rem;
    }

    .table {
        width: 100%;
        font-size: 0.9rem;
    }

    .table thead th, .table tbody td {
        padding: 0.8rem;
    }
}

@media (max-width: 480px) {
    h1 {
        font-size: 1.8rem;
        margin-bottom: 1rem;
    }

    .table {
        font-size: 0.8rem;
        width: 100%;
    }

    .table thead th, .table tbody td {
        padding: 0.6rem;
    }

    ul li {
        font-size: 0.8rem;
    }
}


    </style>

</head>
<body>



        <div class="container">
            <center><h1 class="my-5"> Search History</h1></center>

        @if($searchHistory->isEmpty())
            <p>No search history available.</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Location</th>
                        <th>Country</th>
                        <th>Weather Data</th>
                        <th>Date Searched</th>
                    </tr>
                </thead>
                <tbody>
                 <b>
                    @foreach($searchHistory as $history)
                        <tr>

                            <td class="new">{{ $history->location }}</td>
                            <td class="new">{{ $history->country }}</td>
                            <td>
                                <ul>

                                    <li>Wind Speed: {{ $history->weather_data['wind'] }} m/s</li>
                                    <li>Humidity: {{ $history->weather_data['humidity'] }}%</li>
                                    <li>Pressure: {{ $history->weather_data['pressure'] }} hPa</li>
                                    <li>Clouds: {{ $history->weather_data['clouds'] }}%</li>
                                    <li>Temperature: {{ $history->weather_data['temp_avg'] }} °C</li>
                                </ul>
                            </td>
                            <td class="new">{{ $history->searched_at }}</td>
                        </tr>
                    @endforeach
                </b>
                </tbody>
            </table>
        @endif
    </div>
</body>
</html>

