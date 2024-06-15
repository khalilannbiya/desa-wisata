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

    <section class="flex py-4 flex-wrap gap-4 justify-center items-center ">
        <x-partials.frontend.card-destination  />
        <x-partials.frontend.card-destination />
        <x-partials.frontend.card-destination />
    </section>

    <section>
        <x-partials.frontend.advantages-brand class=""/>
    </section>

    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
</body>
</html>

