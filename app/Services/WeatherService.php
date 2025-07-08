<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WeatherService
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = config('services.openweather.key');
    }

    public function getCurrentWeather($latitude, $longitude)
    {
        $url = "https://api.openweathermap.org/data/2.5/weather?lat={$latitude}&lon={$longitude}&appid={$this->apiKey}&units=metric";
        $response = Http::withoutVerifying()->get($url);

        if ($response->successful()) {
            return $response->json();
        }
        return null;
    }

    public function get5DayForecast($latitude, $longitude)
    {
        $url = "https://api.openweathermap.org/data/2.5/forecast?lat={$latitude}&lon={$longitude}&appid={$this->apiKey}&units=metric";

        $response = Http::withoutVerifying()->get($url);

        if ($response->successful()) {
            $data = $response->json();
            $list = $data['list'] ?? [];

            // Kumpulkan data suhu dan curah hujan per hari
            $dailyData = [];

            foreach ($list as $item) {
                $date = date('Y-m-d', $item['dt']);
                $temp = $item['main']['temp'];
                $rain = $item['rain']['3h'] ?? 0;

                if (!isset($dailyData[$date])) {
                    $dailyData[$date] = [
                        'temps' => [],
                        'rains' => [],
                    ];
                }

                $dailyData[$date]['temps'][] = $temp;
                $dailyData[$date]['rains'][] = $rain;
            }

            // Hitung rata-rata suhu & total curah hujan per hari
            $dailySummary = [];

            foreach ($dailyData as $date => $values) {
                $avgTemp = array_sum($values['temps']) / count($values['temps']);
                $totalRain = array_sum($values['rains']);

                $dailySummary[] = [
                    'date' => $date,
                    'avg_temp' => round($avgTemp, 2),
                    'total_rain' => round($totalRain, 2),
                ];
            }

            return [
                'raw' => $data,
                'daily_summary' => $dailySummary,
                'hourly' => $list, // data tiap 3 jam (untuk detail)
            ];
        }

        return null;
    }
}
