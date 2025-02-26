<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";
import { CloudFog, Sun, Cloud, CloudRain, Wind, Droplet, Sunrise, Sunset, Eye } from 'lucide-vue-next';
import PlaceholderPattern from '../components/PlaceholderPattern.vue';
import { computed } from "vue";

// Props
const props = defineProps<{
    name?: string;
    weather: {
        coord: { lon: number; lat: number };
        weather: { id: number; main: string; description: string; icon: string }[];
        main: { temp: number; feels_like: number; humidity: number; pressure: number };
        wind: { speed: number; deg: number; gust?: number };
        visibility: number;
        clouds: { all: number };
        sys: { country: string; sunrise: number; sunset: number };
        name: string;
    };
}>();

// Weather Icons Mapping
const weatherIcons: Record<string, any> = {
    Fog: CloudFog,
    Clouds: Cloud,
    Clear: Sun,
    Rain: CloudRain,
};

const WeatherIcon = weatherIcons[props.weather.weather[0]?.main] || Cloud;

// Convert Temperature from Kelvin to Celsius
const temperatureC = computed(() => (props.weather.main.temp - 273.15).toFixed(1));
const feelsLikeC = computed(() => (props.weather.main.feels_like - 273.15).toFixed(1));

// Convert Wind Speed
const windSpeed = computed(() => props.weather.wind.speed.toFixed(1));

// Convert Sunrise & Sunset Times
const formatTime = (timestamp: number) => {
    return new Date(timestamp * 1000).toLocaleTimeString("en-US", { hour: "2-digit", minute: "2-digit" });
};
</script>

<template>
    <Head title="Weather Dashboard" />

    <AppLayout :breadcrumbs="[{ title: 'Weather', href: '/weather' }]">
        <div class="flex h-full flex-1 flex-col gap-6 p-4">
            <div class="grid gap-6 md:grid-cols-3 lg:grid-cols-4">
                <!-- Weather Overview -->
                <Card class="relative flex flex-col items-center justify-center p-6 text-center bg-gradient-to-br from-blue-500 to-blue-700 text-white shadow-lg">
                    <CardHeader>
                        <CardTitle class="text-2xl font-bold">{{ weather.name }}, {{ weather.sys.country }}</CardTitle>
                    </CardHeader>
                    <CardContent class="flex flex-col items-center justify-center gap-2">
                        <WeatherIcon class="w-20 h-20 text-white" />
                        <p class="text-5xl font-extrabold">{{ temperatureC }}°C</p>
                        <p class="text-lg">Feels like <strong>{{ feelsLikeC }}°C</strong></p>
                        <p class="text-md capitalize text-gray-200">{{ weather.weather[0].description }}</p>
                    </CardContent>
                </Card>

                <!-- Wind Speed -->
                <Card class="flex flex-col items-center justify-center p-6 text-center">
                    <CardHeader>
                        <CardTitle>Wind</CardTitle>
                    </CardHeader>
                    <CardContent class="flex flex-col items-center justify-center gap-2">
                        <Wind class="w-12 h-12 text-primary" />
                        <p class="text-2xl font-semibold">{{ windSpeed }} m/s</p>
                        <p class="text-gray-500">Direction: {{ weather.wind.deg }}°</p>
                        <p v-if="weather.wind.gust" class="text-sm text-gray-400">Gust: {{ weather.wind.gust.toFixed(1) }} m/s</p>
                    </CardContent>
                </Card>

                <!-- Humidity & Pressure -->
                <Card class="flex flex-col items-center justify-center p-6 text-center">
                    <CardHeader>
                        <CardTitle>Humidity & Pressure</CardTitle>
                    </CardHeader>
                    <CardContent class="flex flex-col items-center justify-center gap-2">
                        <Droplet class="w-12 h-12 text-primary" />
                        <p class="text-2xl font-semibold">{{ weather.main.humidity }}%</p>
                        <p class="text-gray-500">Pressure: {{ weather.main.pressure }} hPa</p>
                    </CardContent>
                </Card>


                <!-- Visibility -->
                <Card class="flex flex-col items-center justify-center p-6 text-center">
                    <CardHeader>
                        <CardTitle>Visibility</CardTitle>
                    </CardHeader>
                    <CardContent>
                        <Eye class="w-12 h-12 text-primary" />
                        <p class="text-2xl font-semibold">{{ (weather.visibility / 1000).toFixed(1) }} km</p>
                    </CardContent>
                </Card>

                <!-- Sunrise & Sunset -->
                <Card class="flex flex-col items-center justify-center p-6 text-center">
                    <CardHeader>
                        <CardTitle>Sunrise & Sunset</CardTitle>
                    </CardHeader>
                    <CardContent>
                        <div class="flex items-center gap-2">
                            <Sunrise class="w-8 h-8 text-yellow-500" />
                            <p class="text-lg">{{ formatTime(weather.sys.sunrise) }}</p>
                        </div>
                        <div class="flex items-center gap-2 mt-2">
                            <Sunset class="w-8 h-8 text-orange-500" />
                            <p class="text-lg">{{ formatTime(weather.sys.sunset) }}</p>
                        </div>
                    </CardContent>
                </Card>

                <!-- Cloud Coverage -->
                <Card class="flex flex-col items-center justify-center p-6 text-center">
                    <CardHeader>
                        <CardTitle>Cloud Coverage</CardTitle>
                    </CardHeader>
                    <CardContent>
                        <Cloud class="w-12 h-12 text-primary" />
                        <p class="text-2xl font-semibold">{{ weather.clouds.all }}%</p>
                    </CardContent>
                </Card>
            </div>
        </div>
    </AppLayout>
</template>
