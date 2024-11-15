<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Weather Forecast</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

  <div class="flex justify-center items-center min-h-screen bg-gradient-to-r from-blue-500 to-indigo-600">
    <div class="bg-white p-8 rounded-lg shadow-xl w-96 max-w-full">
      
      <h1 class="text-3xl font-bold text-center text-gray-700 mb-6">Weather Forecast</h1>
      
      <form action="{{ route('getWeather') }}" method="POST">
        @csrf
        <input type="text" name="city" placeholder="Enter City" class="w-full p-2 mb-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Get Weather</button>
      </form>

      @if (isset($city))
        <div class="mt-6 text-center">
          <h2 class="text-xl font-semibold text-gray-700">{{ $city }}, {{ $country }}</h2>
          <p class="text-lg text-gray-500">{{ ucfirst($description) }}</p>
          <p class="text-2xl text-gray-800 mt-2">{{ round($temperature) }}°C</p>
          <img src="https://openweathermap.org/img/wn/{{ $icon }}.png" alt="Weather Icon" class="mx-auto mt-2">
        </div>
      @elseif (isset($error))
        <div class="mt-6 text-center text-red-500">
          <p>{{ $error }}</p>
        </div>
      @endif
    </div>
  </div>

</body>
</html>
