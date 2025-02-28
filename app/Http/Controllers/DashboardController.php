<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;
use Throwable;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $city = $request->query('city', 'Kuressaare'); // Use $request->query() for better readability

        return Inertia::render('Dashboard', [
            'weather' => Cache::remember(
                'weather-' . $city,
                now()->addHour(),
                fn () => $this->getWeatherData($city)
            ),
            'radarKey' => config('services.radar_api.client'), // Corrected key to match Vue
        ]);
    }

    /**
     * Fetches weather data from OpenWeather API.
     */
    private function getWeatherData(string $city): array
    {
        try {
            $response = Http::get('https://api.openweathermap.org/data/2.5/weather', [
                'q' => $city,
                'appid' => config('services.open_weather_map.key'),
                'units' => 'metric', // Ensures data is returned in Celsius
            ]);

            if ($response->successful()) {
                return $response->json();
            }

            return [];
        } catch (Throwable $e) {
            report($e); // Log the error
            return [];
        }
    }
}
