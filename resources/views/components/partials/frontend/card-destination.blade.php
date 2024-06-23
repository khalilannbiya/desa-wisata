<div
    class="relative card flex w-full max-w-[26rem] flex-col rounded-xl bg-green-new bg-clip-border text-gray-700 shadow-lg">
    <div
        class="relative mx-4 mt-4 overflow-hidden text-white shadow-lg rounded-xl bg-blue-gray-500 bg-clip-border shadow-blue-gray-500/40">
        <img src={{ asset('assets/img/wisata-rakutak-2.jpeg') }} alt="ui/ux review check" />
        <div
            class="absolute inset-0 w-full h-full to-bg-black-10 bg-gradient-to-tr from-transparent via-transparent to-black/60">
        </div>
    </div>
    <div class="p-6">
        <div class="mb-3">
            <h5 class="block font-sans text-xl antialiased font-medium leading-snug tracking-normal text-white">
                Wooden House, Florida
            </h5>

        </div>
        <p class="elipsis block font-sans text-base  antialiased font-light leading-relaxed text-white">
            Enter a freshly updated and thoughtfully furnished peaceful home
            surrounded by ancient trees, stone walls, and open meadows.
        </p>
    </div>
    <div class="p-6 pt-3">
        <a href="/detail"
            class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg bg-white text-green-new shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none"
            type="button">
            Detail
        </a>
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

    shortenText(".elipsis", 120, true);
</script>
