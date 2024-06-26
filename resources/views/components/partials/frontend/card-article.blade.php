        {{-- card  --}}
        <div
            class="max-w-sm group shadow-lg border-2 rounded-md hover:bg-green-new font-inter transition-all duration-500 ">
            <div class="p-6">
                <div
                    class="pb-3 mb-4 border-b group-hover:text-white border-stone-200 text-xs font-medium flex justify-between text-black">
                    <span class="flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        7 March, 2022
                    </span>

                </div>
                <h3 class="mb-4 font-semibold group-hover:text-white  text-2xl">
                    <a href="" class="elips transition-all group-hover:text-white text-black ">Pembaruan
                        Wahana</a>
                </h3>
                <p class="elipsis text-black group-hover:text-white text-sm mb-0">
                    pemabaruan wahana
                </p>
            </div>
            <div class="mt-auto">
                <img src="{{ asset('assets/img/wisata-rakutak-1.jpeg') }}" alt=""
                    class="w-full h-48 object-cover">
            </div>
            <div class="text-center">
                <a href="/detail-artikel"
                    class="my-6 inline-flex items-center px-3 py-2 text-sm font-medium text-center group-hover:bg-white group-hover:text-green-new text-white bg-green-new rounded-md focus:ring-4 focus:outline-none focus:ring-blue-300 ">
                    Selengkapnya
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
        </div>

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

            shortenText(".elipsis", 100, true);
            shortenText(".elips", 70, true);
        </script>
