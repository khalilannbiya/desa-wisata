<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logo.png') }}" />
    <link rel="apple-touch-icon" href="{{ asset('assets/img/logo.png') }}" />

    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Oswald:wght@200..700&display=swap"
        rel="stylesheet">

    {{-- Box Icons --}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    {{-- Title --}}
    <title>{{ $title ?? '' }} Desa Wisata</title>

    <link rel="canonical" href="{{ URL::current() }}">

    @vite('resources/css/app.css')
</head>

<body class="relative antialiased text-black bg-white font-montserrat">
    @include('sweetalert::alert')

    <main class="px-4 mx-auto lg:py-0 lg:px-0 ">
        <section class="min-h-screen mx-auto md:w-3/5 lg:w-2/5 flex flex-col justify-center">
            {{ $slot }}
        </section>
    </main>


    @vite('resources/js/app.js')
    @stack('script')
</body>

</html>
