<x-layouts.visitor-layout>

    <div class="flex flex-col min-h-[100dvh] pt-30">
        <section class="w-full py-28 bg-green-new  font-inter ">
            <div class="mx-auto max-w-7xl  px-4 md:px-6">
                <div class="grid gap-6 lg:grid-cols-[1fr_400px] lg:gap-12 xl:grid-cols-[1fr_600px]">
                    <div class="flex flex-col justify-center space-y-4">
                        <div class=" text-white">
                            <h1
                                class="text-3xl font-bold tracking-tighter text-primary-foreground sm:text-5xl xl:text-6xl/none">
                                Web Development Conference 2024</h1>

                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-lg p-6 space-y-4">

                        <div>
                            <h3 class="text-lg font-semibold">Date &amp; Time</h3>
                            <p class="text-muted-foreground">June 26-28, 2024 | 9:00 AM - 5:00 PM</p>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold">Lokasi</h3>
                            <p class="text-muted-foreground">San Francisco Marriott Marquis<br>780 Mission St, San
                                Francisco, CA 94103</p>
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
                        <p class="text-muted-foreground mb-6">The Web Development Conference is the premier event for
                            web developers, designers, and industry professionals. This three-day conference will
                            feature a variety of sessions, workshops, and networking opportunities, covering the latest
                            trends, technologies, and best practices in web development.</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-layouts.visitor-layout>
