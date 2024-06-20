<article class="card">
    <div class=" sm:max-w-sm  mx-6 font-montserrat sm:px-0 bg-white border border-gray-200 rounded-lg shadow-lg ">
        <a href="# ">
            <img class="rounded-t-lg object-cover" src="{{ asset('assets/img/dummy-vilage.jpg') }}" alt="" />
        </a>
        <div class="p-5">
            <a href="#">
                <h5
                    class="mb-2 text-xl font-bold tracking-tight text-gray-900 hover:text-deep-koamaru-600 transition-all duration-500 ">
                    Noteworthy
                    technology acquisitions 2021
                </h5>
            </a>
            <p class="mb-3 h-20 font-normal overflow-hidden elipsis text-gray-700 text-balance">Here are the biggest
                enterprise technology acquisitions of 2021 so far, in reverse chronological order. Lorem ipsum dolor,
                sit amet consectetur adipisicing elit. Laborum eaque explicabo sapiente illum quisquam iste culpa
                repellat vitae pariatur ipsa perspiciatis mollitia, minima distinctio dicta consequatur ab saepe debitis
                sit nemo iusto aliquam dolores aliquid eos nihil. Optio quaerat cum ea nemo nostrum dolore ipsa. Officia
                nam odit libero qui nesciunt, dolorem at dolor recusandae ullam voluptate eius enim eum mollitia dolorum
                nisi natus quis dignissimos consequatur doloremque amet labore. Repudiandae aliquid unde vitae tenetur
                libero. Itaque obcaecati unde autem quia. Nostrum ipsam unde facilis, cupiditate ullam aperiam corrupti
                placeat delectus laudantium maxime expedita ratione amet magnam in architecto quaerat.</p>

            <a href="#"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-deep-koamaru-600 rounded hover:bg-deep-koamaru-500 focus:ring-4 focus:outline-none focus:ring-blue-300 ">
                Detail Wisata
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
        </div>
    </div>

</article>


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
