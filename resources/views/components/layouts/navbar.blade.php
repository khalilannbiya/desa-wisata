<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('assets/img/logo.png') }}" type="image/x-icon">

    {{-- FLowbite --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $title ?? '' }} Desa Wisata Sukarame</title>
</head>

<body>
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
                    <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>



                <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1 "
                    id="mobile-menu-2">
                    <ul class="flex flex-col mt-4 lg:items-center font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                        <li>
                            <a href="/"
                                class="block py-2 pl-3 pr-4 text-gray-700  lg:hover:text-deep-koamaru-700 lg:p-0  ">Beranda</a>
                        </li>
                        <li>
                            <a href="/wisata"
                                class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-deep-koamaru-700 lg:p-0">Wisata</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-deep-koamaru-700 lg:p-0">Galeri</a>
                        </li>

                        <li>
                            <a href="#"
                                class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-deep-koamaru-700 lg:p-0 ">Acara</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-deep-koamaru-700 lg:p-0 ">Artikel</a>
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


    <section>
        {{ $slot }}
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

        // Ambil tombol toggle dan menu mobile
        const toggleButton = document.querySelector('[data-collapse-toggle="mobile-menu-2"]');
        const mobileMenu = document.getElementById('mobile-menu-2');

        // Tambahkan event listener untuk klik pada tombol toggle
        toggleButton.addEventListener('click', function() {
            // Toggle kelas 'hidden' pada menu mobile
            mobileMenu.classList.toggle('hidden');
            // Toggle atribut 'aria-expanded' untuk aksesibilitas
            const isOpen = mobileMenu.classList.contains('hidden') ? 'false' : 'true';
            toggleButton.setAttribute('aria-expanded', isOpen);

        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollToPlugin.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/TextPlugin.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

</body>

</html>
