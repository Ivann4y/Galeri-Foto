<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} | {{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    @include('user.layouts.sidenavbar')
    <div class="p-4 sm:ml-64">
        <div class="p-4 mt-14">
            @yield('content')
        </div>
    </div>
    @include('user.layouts.modalSignout')
</body>

</html>
