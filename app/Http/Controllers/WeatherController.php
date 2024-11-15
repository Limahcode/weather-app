<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function index()
    {
        return view('weather.index');
    }

    public function getWeather(Request $request)
    {
        $city = $request->input('city');
        $apiKey = env('WEATHER_API_KEY');  // Store your API key in the .env file
        $response = file_get_contents("https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric");

        $data = json_decode($response);

        if ($data->cod == 200) {
            return view('weather.index', [
                'city' => $data->name,
                'country' => $data->sys->country,
                'temperature' => $data->main->temp,
                'description' => $data->weather[0]->description,
                'icon' => $data->weather[0]->icon
            ]);
        } else {
            return view('weather.index', ['error' => 'City not found!']);
        }
    }
}
