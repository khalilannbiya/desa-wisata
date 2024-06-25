<x-layouts.visitor-layout>
    <div class="pt-30 px-7">
        <div class="">
            <h1 class="md:text-4xl text-center mb-10 text-3xl font-extrabold">Galeri</h1>
        </div>
        <div class="grid md:grid-cols-4 grid-cols-1  gap-4">
            @for ($i = 1; $i <= 20; $i++)
                <div data-aos="zoom-in" data-aos-duration="1000"
                    class=" transition-transform duration-300 hover:transform hover:scale-105">
                    <img class="h-auto max-w-full rounded-lg" src="{{ asset('assets/img/desa' . $i . '.jpeg') }}"
                        alt="">
                </div>
            @endfor
        </div>
    </div>
</x-layouts.visitor-layout>

<script>
    AOS.init();
</script>
