<x-layouts.visitor-layout>
    <x-slot:title>Acara | </x-slot:title>

    <div class="pt-30 ">
        <section class="mb-6 bg-green-new">
            <div class="grid py-20 mx-auto md:grid-cols-3 max-w-7xl">
                <div class="pl-10 mb-8 space-y-10 text-white text-balance ">
                    <h1 class="text-4xl font-extrabold font-inter">Info Acara Terbaru</h1>
                    <p class="w-3/4 font-inter">
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
                <div class="col-span-2 overflow-x-auto text-center no-scrollbar">
                    <div class="">
                        <div class="inline-flex items-center justify-center gap-10 py-4">
                            @forelse ($newEvents as $event)
                                <x-partials.frontend.card-event :event="$event" />
                            @empty
                                <p class="text-xl font-semibold text-center text-white">Tidak ada acara</p>
                            @endforelse
                        </div>
                    </div>
                </div>

        </section>

        <div class="mx-auto max-w-7xl">
            <div class="px-10 mb-10">
                <h1 class="text-3xl font-extrabold text-center font-inter">
                    Semua Acara
                </h1>
            </div>
            <form class="max-w-md px-10 mx-auto my-10" action="{{ route('events') }}" method="GET">
                <label for="default-search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white font-inter">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" name="keyword" id="default-search"
                        class="block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg ps-10 bg-gray-50 focus:ring-green-new focus:border-green-new dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Cari Acara..." required />
                    <button type="submit"
                        class="text-white absolute font-inter end-2.5 bottom-2.5 bg-green-new hover:bg-opacity-90 focus:ring-4 focus:outline-none focus:ring-green-new font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cari</button>
                </div>
            </form>
            <div class="grid gap-3 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:px-10 justify-items-center ">
                @forelse ($events as $event)
                    <x-partials.frontend.card-event :event="$event" />
                @empty
                    <p class="font-semibold text-center text-gray-500">Tidak ada acara</p>
                @endforelse
            </div>
        </div>
        @if ($events->lastPage() > 1)
            <div class="px-5 mx-auto mt-10 max-w-7xl">
                {{ $events->links() }}
            </div>
        @endif
    </div>
</x-layouts.visitor-layout>

<style>

</style>
