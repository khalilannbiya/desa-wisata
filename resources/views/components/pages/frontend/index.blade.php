<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('assets/img/logo.png') }}" type="image/x-icon">
    <title>DESA WISATA</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header>
        <x-partials.frontend.navbar />
    </header>

    <section class="min-h-screen ">
        <div class="mb-8 text-center text-4xl font-bold">
            <h1 class="font-montserrat">Wisata</h1>
        </div>
        <div class="flex flex-wrap gap-4 justify-center items-center">
            @for ($i = 1; $i <= 3; $i++)
                <x-partials.frontend.card-destination />
            @endfor
        </div>
        <div class="text-center mt-10">
            <a href=""
                class="text-black px-4 py-2 rounded-md border-2 border-gray-600 hover:shadow-lg transition-transform duration-300 transform ">Selengkapnya</a>
        </div>
    </section>

    <section class="min-h-screen">
        <x-partials.frontend.advantages-brand class="" />
    </section>

    <section class="min-h-screen">
        <div class="mb-8 text-center text-4xl font-bold">
            <h1 class="font-montserrat">Acara</h1>
        </div>
        <div class="flex py-4 flex-wrap gap-10 justify-center items-center">
            @for ($i = 1; $i <= 3; $i++)
                <x-partials.frontend.card--event />
            @endfor
        </div>
        <div class="text-center mt-6">
            <a href=""
                class="text-black px-4 py-2 rounded-md border-2 border-gray-600 hover:shadow-lg transition-transform duration-300 transform ">Selengkapnya</a>
        </div>
    </section>

    <section class="md:-mt-11 mt-14">
        <div class="flex flex-wrap items-center justify-center gap-4">
            @for ($i = 1; $i <= 3; $i++)
                <x-partials.frontend.logo />
            @endfor
        </div>

    </section>

    <section class="px-3 md:px-0 min-h-screen mt-29 ">
        <div class="mb-8  text-center text-4xl font-bold">
            <h1 class="font-montserrat">Artikel</h1>
        </div>
        <div class="flex py-4 flex-wrap gap-4 justify-center items-center">
            @for ($i = 1; $i <= 3; $i++)
                <x-partials.frontend.card-article />
            @endfor
        </div>
        <div class="text-center mt-6">
            <a href=""
                class="text-black px-4 py-2 rounded-md border-2 border-gray-600 hover:shadow-lg transition-transform duration-300 transform ">Selengkapnya</a>
        </div>

    </section>

    <section class="mt-20">
        <x-partials.frontend.footer />
    </section>

    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
</body>

</html>
