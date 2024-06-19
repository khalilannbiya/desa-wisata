<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DESA WISATA</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header>
        <x-partials.frontend.navbar />
    </header>

    <section class="flex py-4 flex-wrap gap-4 justify-center items-center">
        <x-partials.frontend.card-destination  />
        <x-partials.frontend.card-destination />
        <x-partials.frontend.card-destination />
    </section>

    <section>
        <x-partials.frontend.advantages-brand class=""/>
    </section>

    <section class="">
        <div class="mb-8 text-center text-4xl font-bold"><h1>Acara</h1></div>
        <div class="flex py-4 flex-wrap gap-4 justify-center items-center">
            <x-partials.frontend.card--event/>
            <x-partials.frontend.card--event/>
            <x-partials.frontend.card--event/>
        </div>
    </section>

    <section>
        <div class="gap-3 flex flex-wrap text-center items-center justify-center mt-12 mb-6">
            <x-partials.frontend.logo/>
            <x-partials.frontend.logo/>
            <x-partials.frontend.logo/>
        </div>
    </section>

    <section>
        <div class="mb-8 mt-15 text-center text-4xl font-bold">
            <h1>Artikel</h1>
        </div>
        <div class="flex py-4 flex-wrap gap-4 justify-center items-center">
            @for ($i = 1; $i <= 3; $i++)
               
            <x-partials.frontend.card-article/>
            @endfor
        </div>
    </section>

    <section class="mt-20">
        <x-partials.frontend.footer/>
    </section>

    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
</body>
</html>

