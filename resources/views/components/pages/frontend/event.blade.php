<x-layouts.visitor-layout>

    <div class="pt-30">
        <div class="grid md:grid-cols-3 grid-cols-1 bg-green-new py-20 mb-6">
            <div class="mb-8 pl-10 text-white  text-balance  space-y-10 ">
                <h1 class="font-montserrat text-4xl font-extrabold">Acara Terbaru</h1>
                <p class=" w-3/4 ">
                    Informasi terbaru dan terlengkap tentang berbagai acara menarik di tempat wisata Sukarame. Temukan
                    berbagai acara seru yang sesuai dengan minat Anda dan dapatkan informasi lengkap tentang setiap
                    acara.

                </p>

            </div>
            <div class="overflow-x-auto no-scrollbar col-span-2 text-center">
                <div class="">
                    <div class="inline-flex py-4 gap-10 justify-center items-center">
                        @forelse ($newEvents as $event)
                            <x-partials.frontend.card-event :event="$event" />
                        @empty
                            <p class="font-semibold text-center text-white text-xl">Belum ada acara</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <div class="">
            <div class="px-10 mb-10">
                <h1 class="text-3xl text-center font-montserrat font-extrabold">
                    Semua Acara
                </h1>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:px-10 gap-3 justify-items-center  ">
                @forelse ($events as $event)
                    <x-partials.frontend.card-event :event="$event" />
                @empty
                    <p class="font-semibold text-center text-gray-500">Belum ada acara</p>
                @endforelse
            </div>
        </div>

    </div>


</x-layouts.visitor-layout>

<style>

</style>
