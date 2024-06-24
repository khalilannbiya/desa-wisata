<div
    class="group mx-4 relative w-[292px] cursor-pointer rounded-md items-center justify-center overflow-hidden transition-shadow hover:shadow-xl hover:shadow-black/30">
    <div class="h-96 w-73">
        <img class="h-full w-full object-cover transition-transform duration-500 group-hover:rotate-3 group-hover:scale-125"
            src="{{ asset('assets/img/dummy-vilage.jpg') }}" alt="" />
    </div>
    <div
        class="sm:max-w-sm absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-black group-hover:from-black/70 group-hover:via-black/60 group-hover:to-black/70">
    </div>
    <div
        class="absolute inset-0 flex translate-y-[60%] flex-col items-center justify-center px-9 text-center transition-all duration-500 group-hover:translate-y-0">
        <h1 class="elips font-dmserif text-3xl font-bold text-white">Beauty lorem adawdadawd</h1>
        <p
            class="elipsis elimb-3 text-lg italic text-white opacity-0 transition-opacity duration-300 group-hover:opacity-100">
            Lorem
            ipsum dolor sit amet consectetur adipisicing elit. Facilis dolore adipisci placeat.</p>
        <button
            class="rounded-md bg-green-new px-3.5 py-2 font-com text-sm capitalize text-white shadow shadow-black/60">Detail
            Acara</button>
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

    shortenText(".elipsis", 100, true);
    shortenText(".elips", 10, true);
</script>
