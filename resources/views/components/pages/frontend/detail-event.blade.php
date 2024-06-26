<x-layouts.visitor-layout>

    <div class="flex flex-col min-h-[100dvh] pt-30">
        <section class="w-full py-28 bg-green-new  font-inter">
            <div class="mx-auto max-w-7xl  px-4 md:px-6">
                <div class="grid gap-6 lg:grid-cols-[1fr_400px] lg:gap-12 xl:grid-cols-[1fr_600px]">
                    <div class="flex flex-col justify-center space-y-4">
                        <div class=" text-white">
                            <h1
                                class="text-3xl font-bold tracking-tighter text-primary-foreground sm:text-5xl xl:text-6xl/none">
                                {{ $event->name }}</h1>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-lg p-6 space-y-4">

                        <div>
                            <h3 class="text-lg font-semibold">Tanggal &amp; Waktu</h3>
                            <p class="text-muted-foreground">
                                {{ \Carbon\Carbon::parse($event->start_date)->format('d-m-Y, H:i') . ' - ' . \Carbon\Carbon::parse($event->end_date)->format('d-m-Y, H:i') }}
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
            <div class="container mx-auto max-w-7xl px-4 md:px-6">
                <div class="grid gap-10 ">
                    <a href="{{ asset('assets/img/wisata-rakutak-1.jpeg') }}" target="_blank" class="">
                        <img src="{{ asset('assets/img/wisata-rakutak-1.jpeg') }}"
                            class="w-full rounded-lg h-[500px] object-cover" alt="">
                    </a>
                    <div>
                        <h2 class="text-3xl font-bold tracking-tighter mb-6">Tentang Acara</h2>
                        <p class="text-muted-foreground mb-6">{{ $event->description }}</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-layouts.visitor-layout>
