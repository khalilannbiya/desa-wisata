<div
    class="relative h-115 card flex w-full max-w-[26rem] flex-col rounded-xl bg-green-new bg-clip-border text-gray-700 shadow-lg">
    <div
        class="relative mx-4 mt-4 overflow-hidden text-white shadow-lg rounded-xl bg-blue-gray-500 bg-clip-border shadow-blue-gray-500/40">
        <img src={{ asset('assets/img/wisata-rakutak-2.jpeg') }} alt="ui/ux review check" />
        <div
            class="absolute inset-0 w-full h-full to-bg-black-10 bg-gradient-to-tr from-transparent via-transparent to-black/60">
        </div>
    </div>
    <div class="p-6">
        <div class="mb-3">
            <h5 class="blockc title font-sans text-xl antialiased font-medium leading-snug tracking-normal text-white">
                Wooden House, Florida Lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi, expedita
                qui sunt quibusdam harum, inventore dolores enim magnam explicabo eligendi asperiores tempore? Laborum
                quasi ut voluptatum magnam? Esse aspernatur debitis ullam ratione perspiciatis, eaque magni incidunt
                quam, minima eligendi nesciunt.
            </h5>

        </div>
        <p class="elipsis block font-sans text-base  antialiased font-light leading-relaxed text-white">
            Enter a freshly updated and thoughtfully furnished peaceful home
            surrounded by ancient trees, stone walls, and open meadows. Lorem ipsum dolor sit amet consectetur
            adipisicing elit. Fuga repellat ut dolorem, eaque perferendis quis ex voluptas ea voluptates repudiandae
            consequatur velit. Consequuntur at sequi, assumenda similique amet, odit dolorem placeat vitae fugiat eum
            tempora consequatur ea ipsum adipisci atque! Quam rerum necessitatibus minima dolorem eaque corrupti quidem
            aliquid sequi perferendis nobis ducimus qui magni perspiciatis ab, similique repellendus reprehenderit animi
            aperiam! Consequatur iusto odit, sunt, enim tempore voluptatum repellat praesentium, facilis nobis in
            suscipit necessitatibus illum vero blanditiis earum commodi quam magni porro numquam corporis. Animi
            quisquam aut commodi adipisci, sapiente nostrum soluta suscipit. Amet rem qui eaque optio?
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

    shortenText(".title", 25, true);
    shortenText(".elipsis", 100, true);
</script>
