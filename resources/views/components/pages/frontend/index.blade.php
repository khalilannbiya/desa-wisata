<x-Layouts.navbar>
    <x-slot:title>Beranda | </x-slot:title>
    <header>
        <x-partials.frontend.hero />
    </header>

    <section class="">
        <div class="mb-8 text-center text-4xl font-extrabold">
            <h1 class="font-montserrat">Tempat Wisata</h1>
        </div>
        <div class="flex flex-wrap gap-4 justify-center items-center">
            @for ($i = 1; $i <= 3; $i++)
                <x-partials.frontend.card-destination />
            @endfor
        </div>
        <div class="text-center mt-10">
            <a href="/wisata"
                class="text-black px-4 py-2 rounded-md border-2 border-gray-600 hover:shadow-lg transition-transform duration-300 transform ">Selengkapnya</a>
        </div>
    </section>

    <section class="">
        <x-partials.frontend.advantages-brand class="" />
    </section>

    <section class="mb-20">
        <div class="mb-8 text-center text-4xl font-extrabold">
            <h1 class="font-montserrat">Info Acara</h1>
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

    <section class="">
        <div class="">

            <x-partials.frontend.logo />

        </div>

    </section>

    <section class="px-3 md:px-0 mt-29 ">
        <div class="mb-8  text-center text-4xl font-extrabold">
            <h1 class="font-montserrat">Informasi Tentang Desa Wisata</h1>
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


</x-Layouts.navbar>
