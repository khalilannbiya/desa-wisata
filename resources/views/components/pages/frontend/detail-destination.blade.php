<x-layouts.navbar>
    <div class="card md:pt-35 pt-20 mb-6">
        <div id="default-carousel" class="relative  mx-auto max-w-7xl items-center  " data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-50 overflow-hidden md:rounded-lg md:h-96">
                <!-- Item 1 -->
                @for ($i = 0; $i < 3; $i++)
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <a href="{{ asset('assets/img/wisata-rakutak-1.jpeg') }}" target="_blank">
                            <img src="{{ asset('assets/img/wisata-rakutak-1.jpeg') }}"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </a>
                    </div>
                @endfor
            </div>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                    data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                    data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                    data-carousel-slide-to="2"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
                    data-carousel-slide-to="3"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5"
                    data-carousel-slide-to="4"></button>
            </div>
            <!-- Slider controls -->
            <button type="button"
                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button"
                class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
    </div>
    <div class="mb-6 ">
        <div class="max-w-7xl mx-auto px-4 xl:px-0 ">
            <div class=" mt-3">
                <h1 class="font-extrabold md:text-4xl text-3xl text-center lg:text-left">Wisata Rakutak</h1>
                <div class="">
                    <a class="inline-flex items-center gap-1 md:gap-2 mt-3 hover:text-green-new  font-semibold"
                        href="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"
                            style="fill: rgba(0, 150, 136, 1);transform: ;msFilter:;">
                            <path
                                d="M12 22s8.029-5.56 8-12c0-4.411-3.589-8-8-8S4 5.589 4 9.995C3.971 16.44 11.696 21.784 12 22zM8 9h3V6h2v3h3v2h-3v3h-2v-3H8V9z">
                            </path>
                        </svg>
                        Lihat Lokasi Wisata
                    </a>
                </div>
            </div>
            <div class="py-4">
                <p class="text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur odit neque
                    aliquam assumenda nulla
                    distinctio fuga dolore, cumque ea vitae nam dicta nihil magnam quae possimus tenetur officiis natus
                    iusto! Voluptatem, architecto velit sed aperiam, perferendis et molestias nostrum distinctio sunt
                    dolore
                    deserunt eos cupiditate eveniet facere? Quaerat, nesciunt odio.</p>
            </div>
            <div class="mb-4">
                <h2
                    class="font-bold md:text-2xl text-xl text-center text-green-new border border-green-new px-4 py-2 rounded-md  ">
                    Mulai
                    dari Rp.
                    1.000.000
                </h2>
            </div>
            <div class="grid md:grid-cols-3 gap-4 mt-4 md:justify-items-center">
                <div class="shadow-lg p-4 w-full bg-white rounded-lg">
                    <div class="flex items-center gap-1 ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24"
                            style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                            <path
                                d="M19 2H9c-1.103 0-2 .897-2 2v6H5c-1.103 0-2 .897-2 2v9a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V4c0-1.103-.897-2-2-2zM5 12h6v8H5v-8zm14 8h-6v-8c0-1.103-.897-2-2-2H9V4h10v16z">
                            </path>
                            <path d="M11 6h2v2h-2zm4 0h2v2h-2zm0 4.031h2V12h-2zM15 14h2v2h-2zm-8 .001h2v2H7z"></path>
                        </svg>

                        <h1 class="font-bold md:text-xl text-lg">
                            Fasilitas </h1>
                    </div>
                    <ul class="list-check space-y-2 mt-2 text-gray-600">

                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, i</li>
                        <li>2</li>
                        <li>3</li>
                    </ul>
                </div>
                <div class="shadow-lg p-4 w-full bg-white rounded-lg">

                    <div class="flex items-center gap-1 ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24"
                            style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                            <path
                                d="m20.772 10.156-1.368-4.105A2.995 2.995 0 0 0 16.559 4H7.441a2.995 2.995 0 0 0-2.845 2.051l-1.368 4.105A2.003 2.003 0 0 0 2 12v5c0 .753.423 1.402 1.039 1.743-.013.066-.039.126-.039.195V21a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-2h12v2a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-2.062c0-.069-.026-.13-.039-.195A1.993 1.993 0 0 0 22 17v-5c0-.829-.508-1.541-1.228-1.844zM4 17v-5h16l.002 5H4zM7.441 6h9.117c.431 0 .813.274.949.684L18.613 10H5.387l1.105-3.316A1 1 0 0 1 7.441 6z">
                            </path>
                            <circle cx="6.5" cy="14.5" r="1.5"></circle>
                            <circle cx="17.5" cy="14.5" r="1.5"></circle>
                        </svg>

                        <h1 class="font-bold md:text-xl text-lg">
                            Akomondasi </h1>
                    </div>
                    <ul class="list-check space-y-2 mt-2 text-gray-600">
                        <li>Lorem ipsum dolor sit amet, consectetur adipisicing</li>
                        <li>2</li>
                        <li>3</li>
                    </ul>
                </div>
                <div class="shadow-lg p-4 w-full bg-white rounded-lg">
                    <div class="flex items-center gap-1 ">
                        <svg class="w-7 h-7 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M7 6H5m2 3H5m2 3H5m2 3H5m2 3H5m11-1a2 2 0 0 0-2-2h-2a2 2 0 0 0-2 2M7 3h11a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1Zm8 7a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
                        </svg>

                        <h1 class="font-bold md:text-xl text-lg">
                            Kontak Pengelola </h1>
                    </div>
                    <ul class="list-check space-y-2 mt-2 text-gray-600">
                        <li>0812345678</li>
                        <li>2</li>
                        <li>3</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</x-layouts.navbar>
