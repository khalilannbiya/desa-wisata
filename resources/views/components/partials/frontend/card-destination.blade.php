<div
    class="relative h-[28rem] card flex w-full justify-between max-w-[26rem] flex-col rounded-xl bg-green-new bg-clip-border text-gray-700 shadow-lg">
    <div
        class="relative mx-4 mt-4 overflow-hidden  text-white shadow-lg rounded-xl bg-blue-gray-500 bg-clip-border shadow-blue-gray-500/40">
        <img class="object-cover object-center w-[26rem] h-45"
            src={{ Storage::url($destination->galleries[0]->image_url) }} alt="gambar wisata" />

    </div>
    <div class="p-6 h-[11rem]">
        <div class="mb-1">
            <h1
                class="block font-inter text-xl antialiased font-medium leading-snug tracking-normal text-white capitalize title">
                {{ $destination->name }}
            </h1>
            <span class="flex items-center text-sm text-white opacity-80 gap-1  ">
                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-width="2"
                        d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                    <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                {{ number_format($destination->views) }}x Telah Dilihat
            </span>
        </div>
        <p class="block font-inter text-base antialiased font-light leading-relaxed text-white elipsis">
            {{ $destination->description }}
        </p>
    </div>
    <div class="p-6 pt-3">
        @if ($destination->status === 'active')
            <a href="{{ route('destinations.show', $destination->slug) }}"
                class="align-middle select-none font-inter font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg bg-white text-green-new shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none"
                type="button">
                Selengkapnya
            </a>
        @else
            <button type="button"
                class="align-middle select-none font-inter font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg bg-white text-green-new shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none"
                type="button">
                Wisata Tidak Beroperasi
            </button>
        @endif
    </div>
</div>


<script>
    // Text Elipsis via javascript
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

    shortenText(".title", 25, true);
    shortenText(".elipsis", 100, true);
</script>
