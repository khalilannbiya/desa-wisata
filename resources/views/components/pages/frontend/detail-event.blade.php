<x-layouts.visitor-layout>
    <x-slot:title>Acara Selengkapnya | </x-slot:title>

    <div class="flex flex-col min-h-[100dvh] pt-30">
        <section class="w-full py-28 bg-green-new font-inter">
            <div class="px-4 mx-auto max-w-7xl md:px-6">
                <div class="grid gap-6 lg:grid-cols-[1fr_400px] lg:gap-12 xl:grid-cols-[1fr_600px]">
                    <div class="flex flex-col justify-center space-y-4">
                        <div class="text-white ">
                            <h1
                                class="text-3xl font-bold tracking-tighter text-primary-foreground sm:text-5xl xl:text-6xl/none">
                                {{ $event->name }}</h1>
                        </div>
                    </div>
                    <div class="p-6 space-y-4 bg-white rounded-lg shadow-lg">

                        <div>
                            <h3 class="text-lg font-semibold">Tanggal &amp; Waktu</h3>
                            @php
                                $start_date = \Carbon\Carbon::parse($event->start_date)->locale('id');
                                $end_date = \Carbon\Carbon::parse($event->end_date)->locale('id');
                            @endphp
                            <p class="text-muted-foreground">
                                {{ $start_date->translatedFormat('l, H:i j F Y') . ' - ' . $end_date->translatedFormat('l, H:i j F Y') }}
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold">Lokasi</h3>
                            <a href="{{ $event->gmaps_url }}" class="text-muted-foreground">{{ $event->location }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="w-full py-10 ">
            <div class="container px-4 mx-auto max-w-7xl md:px-6">
                <div class="grid gap-10 ">
                    <a href="{{ Storage::url($event->image_url) }}" target="_blank" class="">
                        <img src="{{ Storage::url($event->image_url) }}"
                            class="w-full rounded-lg h-[500px] object-cover" alt="">
                    </a>
                    <div>
                        <h2 class="mb-6 text-3xl font-bold tracking-tighter">Tentang Acara</h2>
                        <p class="mb-6 text-muted-foreground">{{ $event->description }}</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-layouts.visitor-layout>
