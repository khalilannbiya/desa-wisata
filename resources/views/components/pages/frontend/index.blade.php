<x-Layouts.visitor-layout>
    <x-slot:title>Beranda | </x-slot:title>
    <header>
        <x-partials.frontend.hero />
    </header>

    <section class="">

        <div class="mb-8 text-4xl font-extrabold text-center">
            <h1 class="font-montserrat">Tempat Wisata</h1>
        </div>
        <div class="flex flex-wrap items-center justify-center gap-4 px-4  md:px-0">
            @for ($i = 1; $i <= 3; $i++)
                <div class="card-container">
                    <x-partials.frontend.card-destination />
                </div>
            @endfor
        </div>
        <div class="mt-10 text-center">
            <a href="{{ route('destinations') }}"
                class="px-4 py-2 text-black transition-transform duration-300 transform border-2 border-gray-600 rounded-md hover:shadow-lg ">Selengkapnya</a>
        </div>
    </section>

    <section class="">
        <x-partials.frontend.advantages-brand />
    </section>

    <section class="mb-10">
        <div class="grid py-20 md:grid-cols-2 bg-green-new">
            <div class="pl-10 mb-8 space-y-10 text-white text-balance ">
                <h1 class="text-4xl font-extrabold font-montserrat">Info Acara</h1>
                <p class="w-3/4 ">
                    Informasi terbaru dan terlengkap tentang berbagai acara menarik di tempat wisata Sukarame. Temukan
                    berbagai acara seru yang sesuai dengan minat Anda dan dapatkan informasi lengkap tentang setiap
                    acara.
                    Jangan lewatkan kesempatan untuk menikmati berbagai acara menarik di tempat wisata
                    Sukarame
                    Mari jadikan momen liburan Anda di Sukarame semakin berkesan dengan mengikuti berbagai acara seru
                    yang tersedia.
                </p>
                <div class="  mt-6">
                    <a href="/event"
                        class=" px-4 py-2 rounded-md border-2 border-white hover:shadow-lg transition-transform duration-300 transform">SELENGKAPNYA</a>
                </div>
            </div>
            <div class="overflow-x-auto no-scrollbar ">
                <div class="">
                    <div class="inline-flex items-center justify-center gap-10 py-4">
                        @for ($i = 1; $i <= 6; $i++)
                            <x-partials.frontend.card-event />
                        @endfor
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="relative">
        <div class="">

            <x-partials.frontend.logo />

        </div>

    </section>
    <section class="relative px-3 md:px-0 mt-29">
        <div class="mb-8 text-4xl font-extrabold text-center">
            <h1 class="font-montserrat">Informasi Tentang Desa Wisata</h1>
        </div>
        <div class="flex flex-wrap items-center justify-center gap-4 py-4">
            @for ($i = 1; $i <= 3; $i++)
                <div class="opacity-0 image-container">
                    <x-partials.frontend.card-article />
                </div>
            @endfor
        </div>
        <div class="text-center mt-6">
            <a href="/artikel"
                class="text-black px-4 py-2 rounded-md border-2 border-gray-600 hover:shadow-lg transition-transform duration-300 transform">Selengkapnya</a>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/ScrollTrigger.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Daftarkan plugin ScrollTrigger
            gsap.registerPlugin(ScrollTrigger);


            // Buat animasi untuk elemen dengan kelas .image-container
            gsap.utils.toArray('.image-container').forEach(container => {
                gsap.to(container, {
                    scrollTrigger: {
                        trigger: container,
                        start: 'top 80%', // Mulai animasi saat elemen berada 80% dari bagian atas viewport
                        end: 'top 30%', // Selesai animasi saat elemen berada 30% dari bagian atas viewport
                        toggleActions: 'play none none reverse', // Animasi akan berbalik saat scroll ke atas
                    },
                    opacity: 1,
                    y: 0,
                    duration: 1

                });
            })
        });
    </script>

</x-Layouts.visitor-layout>
