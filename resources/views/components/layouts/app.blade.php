<!DOCTYPE html>
<html lang="{{ session('locale', config('app.locale')) }}" class="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{asset('img/logo.ico')}}" />
    <title>{{ isset($title) ? $title . ' - ' . config('app.name') : config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <livewire:components.navbar.top-navigation />
    {{ $slot }}
    <livewire:components.navbar.bottom-navigation />
</body>

</html>