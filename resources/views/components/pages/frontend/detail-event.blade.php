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
                        <div class="flex gap-6">
                            <span>
                                {!! $status !!}
                            </span>
                            <span class="flex items-center text-sm text-gray-600  gap-1  ">
                                <svg class="w-6 h-6 text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="20" height="20" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-width="2"
                                        d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                    <path stroke="currentColor" stroke-width="2"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                                {{ number_format($event->views) }}x Telah Dilihat
                            </span>
                        </div>
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
                <div class="flex items-center gap-3 mt-6 text-green-new">
                    <svg class="w-6 h-6 text-green-new dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14M5 12l4-4m-4 4 4 4" />
                    </svg>
                    <a href="{{ url()->previous() }}">Kembali </a>
                </div>
            </div>
        </section>
    </div>
</x-layouts.visitor-layout>
