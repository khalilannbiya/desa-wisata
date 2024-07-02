{{-- Hero --}}

<section class="pt-10 bg-white">
    <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
        <div class="mr-auto place-self-center lg:col-span-7">
            <h1 id="slogan"
                class="max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight font-inter md:text-5xl xl:text-6xl S">
            </h1>
            <p class="max-w-2xl mb-6 font-inter font-light text-gray-700 lg:mb-8 md:text-lg lg:text-xl">Desa Wisata Sukarame,
                terletak di provinsi Jawa Barat, telah diakui sebagai salah satu Desa Wisata Indonesia. Julukan ini
                tidak datang tanpa alasan. Desa ini menawarkan perpaduan sempurna antara keindahan alam yang memukau dan
                kekayaan budaya yang mempesona.
            </p>
            <div class="space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
                <a href="{{ route('destinations') }}"
                    class="inline-flex justify-center font-inter px-4 py-2 text-base font-medium text-center text-white rounded bg-green-new hover:bg-opacity-90 focus:ring-4 focus:ring-purple-300 ">TEMPAT
                    WISATA</a>
            </div>
        </div>
        <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
            <iframe loading="lazy" title="DESA WISATA SUKARAME KAB. BANDUNG" class="w-full h-full rounded-lg"
                src="https://www.youtube.com/embed/i4alQJYhKtw?si=jqo-1bsz6RHNOyDP" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen=""></iframe>
        </div>
    </div>
</section>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        gsap.registerPlugin(TextPlugin)
        const myElement = document.getElementById('slogan');

        gsap.to(myElement, {
            text: "Desa Wisata <br>Sukarame",
            duration: 3,
            repeat: 0,
            ease: "none",
        });

    })
</script>
