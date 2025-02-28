<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";
import { CloudFog, Sun, Cloud, CloudRain, Wind, Droplet, Sunrise, Sunset, Eye } from 'lucide-vue-next';
import { computed, onMounted } from "vue";
import { LineChart } from '@/components/ui/chart-line';

const data = [
  {
    'year': 1970,
    'Export Growth Rate': 2.04,
    'Import Growth Rate': 1.53,
  },
  {
    'year': 1971,
    'Export Growth Rate': 1.96,
    'Import Growth Rate': 1.58,
  },
  {
    'year': 1972,
    'Export Growth Rate': 1.96,
    'Import Growth Rate': 1.61,
  },
  {
    'year': 1973,
    'Export Growth Rate': 1.93,
    'Import Growth Rate': 1.61,
  },
  {
    'year': 1974,
    'Export Growth Rate': 1.88,
    'Import Growth Rate': 1.67,
  },
  {
    'year': 1975,
    'Export Growth Rate': 1.79,
    'Import Growth Rate': 1.64,
  },
  {
    'year': 1976,
    'Export Growth Rate': 1.77,
    'Import Growth Rate': 1.62,
  },
  {
    'year': 1977,
    'Export Growth Rate': 1.74,
    'Import Growth Rate': 1.69,
  },
  {
    'year': 1978,
    'Export Growth Rate': 1.74,
    'Import Growth Rate': 1.7,
  },
  {
    'year': 1979,
    'Export Growth Rate': 1.77,
    'Import Growth Rate': 1.67,
  },
  {
    'year': 1980,
    'Export Growth Rate': 1.79,
    'Import Growth Rate': 1.7,
  },
  {
    'year': 1981,
    'Export Growth Rate': 1.81,
    'Import Growth Rate': 1.72,
  },
  {
    'year': 1982,
    'Export Growth Rate': 1.84,
    'Import Growth Rate': 1.73,
  },
  {
    'year': 1983,
    'Export Growth Rate': 1.77,
    'Import Growth Rate': 1.73,
  },
  {
    'year': 1984,
    'Export Growth Rate': 1.78,
    'Import Growth Rate': 1.78,
  },
  {
    'year': 1985,
    'Export Growth Rate': 1.78,
    'Import Growth Rate': 1.81,
  },
  {
    'year': 1986,
    'Export Growth Rate': 1.82,
    'Import Growth Rate': 1.89,
  },
  {
    'year': 1987,
    'Export Growth Rate': 1.82,
    'Import Growth Rate': 1.91,
  },
  {
    'year': 1988,
    'Export Growth Rate': 1.77,
    'Import Growth Rate': 1.94,
  },
  {
    'year': 1989,
    'Export Growth Rate': 1.76,
    'Import Growth Rate': 1.94,
  },
  {
    'year': 1990,
    'Export Growth Rate': 1.75,
    'Import Growth Rate': 1.97,
  },
  {
    'year': 1991,
    'Export Growth Rate': 1.62,
    'Import Growth Rate': 1.99,
  },
  {
    'year': 1992,
    'Export Growth Rate': 1.56,
    'Import Growth Rate': 2.12,
  },
  {
    'year': 1993,
    'Export Growth Rate': 1.5,
    'Import Growth Rate': 2.13,
  },
  {
    'year': 1994,
    'Export Growth Rate': 1.46,
    'Import Growth Rate': 2.15,
  },
  {
    'year': 1995,
    'Export Growth Rate': 1.43,
    'Import Growth Rate': 2.17,
  },
  {
    'year': 1996,
    'Export Growth Rate': 1.4,
    'Import Growth Rate': 2.2,
  },
  {
    'year': 1997,
    'Export Growth Rate': 1.37,
    'Import Growth Rate': 2.15,
  },
  {
    'year': 1998,
    'Export Growth Rate': 1.34,
    'Import Growth Rate': 2.07,
  },
  {
    'year': 1999,
    'Export Growth Rate': 1.32,
    'Import Growth Rate': 2.05,
  },
  {
    'year': 2000,
    'Export Growth Rate': 1.33,
    'Import Growth Rate': 2.07,
  },
  {
    'year': 2001,
    'Export Growth Rate': 1.31,
    'Import Growth Rate': 2.08,
  },
  {
    'year': 2002,
    'Export Growth Rate': 1.29,
    'Import Growth Rate': 2.1,
  },
  {
    'year': 2003,
    'Export Growth Rate': 1.27,
    'Import Growth Rate': 2.15,
  },
  {
    'year': 2004,
    'Export Growth Rate': 1.27,
    'Import Growth Rate': 2.21,
  },
  {
    'year': 2005,
    'Export Growth Rate': 1.26,
    'Import Growth Rate': 2.23,
  },
  {
    'year': 2006,
    'Export Growth Rate': 1.26,
    'Import Growth Rate': 2.29,
  },
  {
    'year': 2007,
    'Export Growth Rate': 1.27,
    'Import Growth Rate': 2.34,
  },
  {
    'year': 2008,
    'Export Growth Rate': 1.26,
    'Import Growth Rate': 2.36,
  },
  {
    'year': 2009,
    'Export Growth Rate': 1.26,
    'Import Growth Rate': 2.36,
  },
  {
    'year': 2010,
    'Export Growth Rate': 1.25,
    'Import Growth Rate': 2.35,
  },
  {
    'year': 2011,
    'Export Growth Rate': 1.24,
    'Import Growth Rate': 2.34,
  },
  {
    'year': 2012,
    'Export Growth Rate': 1.25,
    'Import Growth Rate': 2.39,
  },
  {
    'year': 2013,
    'Export Growth Rate': 1.22,
    'Import Growth Rate': 2.3,
  },
  {
    'year': 2014,
    'Export Growth Rate': 1.2,
    'Import Growth Rate': 2.35,
  },
  {
    'year': 2015,
    'Export Growth Rate': 1.17,
    'Import Growth Rate': 2.39,
  },
  {
    'year': 2016,
    'Export Growth Rate': 1.16,
    'Import Growth Rate': 2.41,
  },
  {
    'year': 2017,
    'Export Growth Rate': 1.13,
    'Import Growth Rate': 2.44,
  },
  {
    'year': 2018,
    'Export Growth Rate': 1.07,
    'Import Growth Rate': 2.45,
  },
  {
    'year': 2019,
    'Export Growth Rate': 1.03,
    'Import Growth Rate': 2.47,
  },
  {
    'year': 2020,
    'Export Growth Rate': 0.92,
    'Import Growth Rate': 2.48,
  },
  {
    'year': 2021,
    'Export Growth Rate': 0.82,
    'Import Growth Rate': 2.51,
  },
]

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
    radarKey: string;
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

// Initialize Radar.io Map
onMounted(() => {
    const radarScript = document.createElement("script");
    radarScript.src = "https://js.radar.com/v4.4.10/radar.min.js";
    radarScript.async = true;
    radarScript.onload = () => {
        if (window.Radar) {
            window.Radar.initialize(props.radarKey);

            const map = window.Radar.ui.map({
                container: "radar-map",
                style: "radar-default-v1",
                center: [props.weather.coord.lon, props.weather.coord.lat],
                zoom: 10,
                scrollZoom: false, // Prevent page scrolling
                dragPan: true, // Allow manual dragging
                touchZoomRotate: true, // Allow pinch zoom
                doubleClickZoom: true, // Allow double-click zoom
                boxZoom: false, // Disable box zoom
            });

            // Add marker for current location
            window.Radar.ui.marker({
                color: "#ff0000",
                popup: { text: `Current Location: ${props.weather.name}` },
            })
            .setLngLat([props.weather.coord.lon, props.weather.coord.lat])
            .addTo(map);
        }
    };
    document.body.appendChild(radarScript);
});
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

            <!-- Radar Map -->
            <div class="map-container">
                <div id="radar-map"></div>
            </div>
        </div>
        <LineChart
    :data="data"
    index="year"
    :categories="['Export Growth Rate', 'Import Growth Rate']"
    :y-formatter="(tick, i) => {
      return typeof tick === 'number'
        ? `$ ${new Intl.NumberFormat('us').format(tick).toString()}`
        : ''
    }"
  />
    </AppLayout>
</template>

<style scoped>
/* Keep the map fixed in place */
.map-container {
  position: relative;
  width: 100%;
  height: 500px; /* Fixed height to prevent page stretching */
  overflow: hidden; /* Prevent scrolling issues */
}

#radar-map {
  width: 100%;
  height: 100%;
  border-radius: 10px; /* Optional: Round edges */
}
</style>
