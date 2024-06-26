<x-layouts.visitor-layout>

    <div class="pt-30 ">
        <section class="bg-green-new mb-6">
            <div class="grid py-20 md:grid-cols-2 max-w-7xl mx-auto">
                <div class="pl-10 mb-8 space-y-10 text-white text-balance ">
                    <h1 class="text-4xl font-extrabold font-inter">Info Acara Terbaru</h1>
                    <p class="w-3/4 ">
                        Informasi terbaru dan terlengkap tentang berbagai acara menarik di tempat wisata Sukarame.
                        Temukan
                        berbagai acara seru yang sesuai dengan minat Anda dan dapatkan informasi lengkap tentang setiap
                        acara.
                        Jangan lewatkan kesempatan untuk menikmati berbagai acara menarik di tempat wisata
                        Sukarame
                        Mari jadikan momen liburan Anda di Sukarame semakin berkesan dengan mengikuti berbagai acara
                        seru
                        yang tersedia.
                    </p>

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

        <div class="">
            <div class="px-10 mb-10">
                <h1 class="text-3xl text-center font-inter font-extrabold">
                    Semua Acara
                </h1>
            </div>
            <div
                class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:px-10 gap-3 justify-items-center mx-auto max-w-7xl  ">
                @for ($i = 1; $i <= 6; $i++)
                    <x-partials.frontend.card-event />
                @endfor
            </div>
        </div>

    </div>


</x-layouts.visitor-layout>

<style>

</style>
