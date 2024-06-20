<x-layouts.navbar>

    <x-slot:title>Tempat Wisata | </x-slot:title>





    <section class="py-30 ">
        <div class="text-center text-4xl  font-extrabold">
            <h1>Tempat Wisata</h1>
        </div>
        <div class="">

            <form class="max-w-lg mx-auto my-15 px-2">
                <div class="flex ">
                    <label for="search-dropdown"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Your Email</label>
                    <button id="dropdown-button" data-dropdown-toggle="dropdown"
                        class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600"
                        type="button">All categories <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg></button>
                    <div id="dropdown"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                            <li>
                                <button type="button"
                                    class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mockups</button>
                            </li>
                            <li>
                                <button type="button"
                                    class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Templates</button>
                            </li>
                            <li>
                                <button type="button"
                                    class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Design</button>
                            </li>
                            <li>
                                <button type="button"
                                    class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Logos</button>
                            </li>
                        </ul>
                    </div>
                    <div class="relative w-full">
                        <input type="search" id="search-dropdown"
                            class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                            placeholder="Cari Tempat Wisata..." required />
                        <button type="submit"
                            class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </div>
                </div>
            </form>

        </div>
        <div class="grid lg:grid-cols-4  md:grid-cols-2 sm:grid-cols-1 items-center justify-items-center  gap-4">
            @for ($i = 1; $i <= 20; $i++)
                <x-partials.frontend.card-destination />
            @endfor
        </div>
    </section>
    <script>
        // use a script tag or an external JS file
        document.addEventListener("DOMContentLoaded", (event) => {
            gsap.registerPlugin(ScrollTrigger, ScrollToPlugin, TextPlugin)
            gsap.defaults({
                ease: "power3"
            });
            gsap.set(".card", {
                y: 100
            });

            ScrollTrigger.batch(".card", {

                onEnter: batch => gsap.to(batch, {
                    opacity: 1,
                    y: 0,
                    stagger: {
                        each: 0.15,

                    },
                    overwrite: true
                }),
                onLeave: batch => gsap.set(batch, {
                    opacity: 0,
                    y: -100,
                    overwrite: true
                }),
                onEnterBack: batch => gsap.to(batch, {
                    opacity: 1,
                    y: 0,
                    stagger: 0.15,
                    overwrite: true
                }),
                onLeaveBack: batch => gsap.set(batch, {
                    opacity: 0,
                    y: 100,
                    overwrite: true
                })
                // you can also define things like start, end, etc.
            });

            ScrollTrigger.addEventListener("refreshInit", () => gsap.set(".card", {
                y: 0
            }));
        });
    </script>
</x-layouts.navbar>
