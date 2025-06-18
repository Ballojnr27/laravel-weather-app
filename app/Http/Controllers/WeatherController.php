<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use App\Models\SearchHistory;
use App\Models\User;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;


class WeatherController extends Controller
{
    public function index()
    {
        return view('index');
    }




    public function getWeatherData()
    {
        $location = request('location');
        $client = new Client();

        try {
            $response = $client->get('https://api.openweathermap.org/data/2.5/weather', [
                'query' => [
                    'q' => $location,
                    'appid' => env('OPENWEATHERMAP_API_KEY'),
                    'units' => 'metric',
                ],
            ]);

            if ($response->getStatusCode() == 200) {
                $data = json_decode($response->getBody()->getContents(), true);

                // Extract weather data
                $weatherData = [
                    'wind' => $data['wind']['speed'] ?? 'N/A',
                    'humidity' => $data['main']['humidity'] ?? 'N/A',
                    'clouds' => $data['clouds']['all'] ?? 'N/A',
                    'country' => $data['sys']['country'] ?? 'N/A',
                    'pressure' => $data['main']['pressure'] ?? 'N/A',
                    'temp_min' => $data['main']['temp_min'] ?? 'N/A',
                    'temp_max' => $data['main']['temp_max'] ?? 'N/A',
                    'temp_avg' => $data['main']['temp'] ?? 'N/A',
                    'description' => $data['weather'][0]['description'] ?? 'N/A',
                    'icon' => $data['weather'][0]['icon'] ?? null, // Add this
                    'rain' => $data['rain']['1h'] ?? 'No rain',
                ];

                // Save the search data to the database




                SearchHistory::create([
                    'user_id' => Auth::user()->id,
                    'location' => $location,
                    'country' => $data['sys']['country'] ?? 'N/A',
                    'weather_data' => $weatherData,
                    'searched_at' => now(),
                ]);



                return view('results', [
                    'weatherData' => $weatherData,
                    'location' => $location,
                ]);
            }
        } catch (RequestException $e) {
            if ($e->getResponse() && $e->getResponse()->getStatusCode() == 404) {
                return view('results', [
                    'error' => 'Location not found. Please enter a valid city name.',
                    'location' => $location,
                ]);
            }

            return view('results', [
                'error' => 'An error occurred while fetching the weather data. Please try again later.',
                'location' => $location,
            ]);
        }
    }

    public function viewSearchHistory()
    {


        // Fetch all search history data
        $searchHistory = SearchHistory::where('user_id', Auth::user()->id)->orderBy('searched_at', 'desc')->get();


        return view('search_history', ['searchHistory' => $searchHistory]);
    }
}
