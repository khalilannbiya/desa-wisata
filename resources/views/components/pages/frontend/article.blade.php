<x-layouts.visitor-layout>

    <div class="pt-30 mx-auto ">
        <div class="grid hidden lg:block lg:grid-cols-2 lg:px-25 items-center justify-items-center ">
            <div class=" mx-auto space-y-3 hidden lg:block ">
                <div
                    class="pb-3  border-b group-hover:text-white border-stone-200 text-xs font-medium flex justify-between text-black">
                    <span class="flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        7 March, 2022
                    </span>

                </div>
                <a class="space-y-3 hover:text-green-new transition-all duration-500 cursor-pointer">
                    <h1 class="title text-2xl font-bold">Lorem, ipsum dolor sit amet consectetur Lorem ipsum dolor sit
                        amet consectetur, adipisicing elit. Reprehenderit sunt provident maxime ducimus accusamus nam.
                        Eligendi odit ipsum obcaecati totam.</h1>
                    <p class="paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam
                        voluptatibus
                        quia eaque ut
                        illum sint ad beatae, consectetur quis est! Lorem ipsum dolor, sit amet consectetur adipisicing
                        elit. Modi beatae aliquam quos eaque, quas quidem adipisci ea laborum impedit dolores?
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore, pariatur quos quod quam minus
                        nulla, asperiores repellat id perferendis similique accusantium enim? Nam sed tempora ut fugiat
                        voluptates atque dolores saepe animi non, esse quos modi consequatur ducimus. Ab at veritatis a
                        recusandae explicabo quos earum quaerat aliquam voluptatum omnis odio, debitis laudantium!
                        Molestiae cum obcaecati ab ratione nobis quis praesentium labore veniam! Hic a eum distinctio,
                        placeat dolores earum officia, aut repellendus doloribus quibusdam omnis eos nulla possimus
                        soluta illo sint harum et recusandae saepe assumenda, atque numquam! Magnam corporis obcaecati
                        vel consectetur distinctio ipsam vero aliquid repudiandae praesentium?
                    </p>
                </a>
                <div class="">
                    <img src="{{ asset('assets/img/wisata-rakutak-1.jpeg') }}" alt="">
                </div>
            </div>

        </div>
        <div class="grid xl:grid-cols-4 lg:grid-cols-3   justify-items-center gap-4 mt-10 px-3">
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
