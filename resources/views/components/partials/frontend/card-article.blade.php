        {{-- card  --}}
        <div
            class="group h-[480px] overflow-hidden  max-w-[26rem]  flex flex-col justify-between shadow-lg border-2 rounded-md hover:bg-green-new font-inter transition-all duration-500 ">
            <div class="p-6 w-full overflow-hidden ">
                <div
                    class="pb-3 mb-4 border-b group-hover:text-white border-stone-200 text-xs font-medium flex space-y-2 flex-col justify-between text-black">
                    <span class="flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        {{ \Carbon\Carbon::parse($article->created_at)->locale('id')->translatedFormat('H:i. l, j F Y') }}
                    </span>
                    <span class="flex items-center gap-1 ">
                        <svg class="w-6 h-6 text-gray-800 group-hover:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-width="2"
                                d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                            <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        {{ number_format($article->views) }}x Telah Dilihat
                    </span>
                </div>
                <h3 class="mb-4 h-[35px] font-semibold overflow-hidden group-hover:text-white  text-2xl">
                    <a href="{{ route('articles.show', $article->slug) }}"
                        class="elips transition-all group-hover:text-white text-black ">{{ $article->title }}</a>
                </h3>
                <div class="elipsis overflow-hidden h-[40px] w-[200px]  text-black group-hover:text-white text-sm ">
                    {!! $article->content !!}
                </div>
                <div class="mx-auto mt-10 ">
                    <img src="{{ Storage::url($article->image_url) }}" alt=""
                        class=" h-48 object-cover object-center w-[26rem]">
                </div>
            </div>
            <div class="text-center">
                <a href="{{ route('articles.show', $article->slug) }}"
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
            shortenText(".elips", 20, true);
        </script>
