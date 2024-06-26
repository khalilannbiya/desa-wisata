<x-layouts.visitor-layout>

    <div class="pt-30 font-inter  ">
        <div class="text-4xl font-extrabold text-center">
            <h1 class="font-inter">Artikel</h1>
        </div>
        <div class="">

            <form class="max-w-md mx-auto my-10" action="{{ route('destinations') }}" method="GET">
                <label for="default-search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" name="keyword" id="default-search"
                        class="block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg ps-10 bg-gray-50 focus:ring-green-new focus:border-green-new dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Cari Tempat Wisata..." required />
                    <button type="submit"
                        class="text-white absolute end-2.5 bottom-2.5 bg-green-new hover:bg-opacity-90 focus:ring-4 focus:outline-none focus:ring-green-new font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div>
            </form>


        </div>
        <div class="grid xl:grid-cols-4 lg:grid-cols-3 mx-auto max-w-7xl  justify-items-center gap-4 mt-10 px-3">
            @for ($i = 1; $i <= 10; $i++)
                <div class="">
                    <x-partials.frontend.card-article />
                </div>
            @endfor
        </div>
    </div>

</x-layouts.visitor-layout>


<script>
    function shortenText(elementSelector, maxLength, elipsis) {
        let elements = document.querySelectorAll(elementSelector);

        elements.forEach(function(element) {
            let textContent = element.textContent.trim();

            if (textContent.length > maxLength) {
                if (elipsis) {
                    let shortenedContent =
                        textContent.substring(0, maxLength) + " ...";
                    element.textContent = shortenedContent;
                } else {
                    let shortenedContent = textContent.substring(0, maxLength);
                    element.textContent = shortenedContent;
                }
            }
        });
    }

    shortenText(".paragraph", 500, true);
    shortenText(".title", 50, true);
</script>
