<header class="fixed w-full font-montserrat z-50" id="myElement">
    <nav class="bg-white border-gray-200 py-2.5  ">
        <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 lg:px-8 mx-auto ">
            <div href="#" class="flex items-center">
                <img src="{{ asset('assets/img/logo.png') }}" class="h-12 mr-3 md:h-20" alt="Desa Sukarame" />
            </div>

            <button data-collapse-toggle="mobile-menu-2" type="button"
                class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 "
                aria-controls="mobile-menu-2" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
                <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>



            <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1 " id="mobile-menu-2">
                <ul class="flex flex-col mt-4 lg:items-center font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                    <li>
                        <a href="#"
                            class="block py-2 pl-3 pr-4 text-gray-700  lg:hover:text-deep-koamaru-700 lg:p-0  ">Home</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-deep-koamaru-700 lg:p-0">Company</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-deep-koamaru-700 lg:p-0">Features</a>
                    </li>

                    <li>
                        <a href="#"
                            class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-deep-koamaru-700 lg:p-0 ">Contact</a>
                    </li>

                    <li>
                        <a href="/login"
                            class="block py-2 px-3   text-white bg-deep-koamaru-700 rounded-md hover:bg-deep-koamaru-500  lg:px-4 lg:py-1 "
                            aria-current="page">Login</a>
                    </li>
                </ul>


            </div>

        </div>
    </nav>
</header>

{{-- Hero --}}

<section class="bg-white pt-10 ">
    <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
        <div class="mr-auto place-self-center lg:col-span-7">
            <h1
                class="max-w-2xl font-montserrat mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-6xl S">
                Desa Wisata <br>Sukarame</h1>
            <p class="max-w-2xl mb-6 font-light text-gray-700 lg:mb-8 md:text-lg lg:text-xl">Desa Wisata Sukarame,
                terletak di ujung barat Provinsi Banten, bagaikan permata tersembunyi yang menawarkan pesona alam luar
                biasa dan keramahan budaya lokal. Desa ini telah diakui sebagai salah satu dari 50 Desa Wisata Terbaik
                Indonesia, dan dengan alasan yang tepat</p>
            <div class="space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
                <a href=""
                    class="inline-flex justify-center  px-4 py-2 text-base font-medium text-center text-white bg-deep-koamaru-600 rounded hover:bg-deep-koamaru-500 focus:ring-4 focus:ring-purple-300 ">Tempat
                    Wisata</a>
            </div>
        </div>
        <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
            <iframe loading="lazy" title="DESA WISATA SUKARAME KAB. BANDUNG" class="w-full rounded-lg h-full"
                src="https://www.youtube.com/embed/i4alQJYhKtw?si=jqo-1bsz6RHNOyDP" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen=""></iframe>
        </div>
    </div>
</section>

<script>
    const myElement = document.getElementById('myElement');
    const scrollTrigger = 20; // Tinggi scroll yang memicu shadow (sesuaikan nilai ini)

    window.addEventListener('scroll', function() {
        if (window.scrollY > scrollTrigger) {
            myElement.classList.add('shadow-lg'); // Tambahkan class shadow
        } else {
            myElement.classList.remove('shadow-lg'); // Hapus class shadow
        }
    });
</script>
