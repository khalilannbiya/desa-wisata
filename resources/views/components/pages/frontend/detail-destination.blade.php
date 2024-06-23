<x-layouts.visitor-layout>
    <div class="grid md:grid-cols-2 gap-5 md:px-6 px-4 pt-35 mx-auto">
        <div class="">
            <div class="grid gap-4">
                <div>
                    <img class="h-auto max-w-full rounded-lg" id="expandedImg"
                        src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
                </div>
                <div class="overflow-x-auto">
                    <div class="inline-flex gap-3 h-15">
                        <img class="imgClick h-auto max-w-full rounded-lg"
                            src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
                        <img class=" imgClick h-auto max-w-full rounded-lg"
                            src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg" alt="">
                        <img class="imgClick h-auto max-w-full rounded-lg"
                            src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg" alt="">
                        <img class="imgClick h-auto max-w-full rounded-lg"
                            src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-5.jpg" alt="">
                    </div>
                </div>

            </div>

        </div>
        <div class="">
            <div class="space-y-5">
                <h1 class="md:text-3xl text-xl font-bold">Judul</h1>
                <p class="md:text-lg text-gray-500 elipsis">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                    Iure
                    dolorum
                    quam provident
                    atque
                    voluptatem dolores ut adipisci ex voluptatibus perspiciatis in eveniet placeat, consectetur dolorem
                    similique cum, natus sapiente sed! Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Cupiditate tempora odio obcaecati rerum vitae ducimus aspernatur earum quidem, eum temporibus atque,
                    ullam quis consequuntur magnam in error. Accusamus aperiam illo repellendus expedita reprehenderit
                    sint, placeat ipsum, nulla atque necessitatibus molestiae, qui tenetur! Eum quisquam earum
                    consequuntur temporibus nulla? Cum, quas.</p>
                <h1 class="md:text-2xl font-bold pb-4">Mulai dari Rp. 10.000</h1>
            </div>
            <div class="">


                <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
                        data-tabs-toggle="#default-tab-content" role="tablist">
                        <li class="me-2" role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab"
                                data-tabs-target="#profile" type="button" role="tab" aria-controls="profile"
                                aria-selected="false">Jadwal Operasional</button>
                        </li>
                        <li class="me-2" role="presentation">
                            <button
                                class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab"
                                aria-controls="dashboard" aria-selected="false">Fasilitas</button>
                        </li>
                        <li class="me-2" role="presentation">
                            <button
                                class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="settings-tab" data-tabs-target="#settings" type="button" role="tab"
                                aria-controls="settings" aria-selected="false">Akomondasi</button>
                        </li>
                        <li role="presentation">
                            <button
                                class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="contacts-tab" data-tabs-target="#contacts" type="button" role="tab"
                                aria-controls="contacts" aria-selected="false">Kontak Wisata</button>
                        </li>
                    </ul>
                </div>
                <div id="default-tab-content">
                    <div class="hidden px-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel"
                        aria-labelledby="profile-tab">
                        <ul class="list-check">
                            <li>Senin</li>
                            <li>Sabtu</li>
                            <li>Selasa</li>
                            <li>Minggu</li>
                            <li>Minggu</li>
                            <li>Minggu</li>
                        </ul>
                    </div>
                    <div class="hidden px-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel"
                        aria-labelledby="dashboard-tab">
                        <ul class="list-check">
                            <li>Senin</li>
                            <li>Sabtu</li>
                            <li>Selasa</li>
                            <li>Minggu</li>
                            <li>Minggu</li>
                            <li>Minggu</li>
                        </ul>
                    </div>
                    <div class="hidden px-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="settings" role="tabpanel"
                        aria-labelledby="settings-tab">
                        <ul class="list-check">
                            <li>Senin</li>
                            <li>Sabtu</li>
                            <li>Selasa</li>
                            <li>Minggu</li>
                            <li>Minggu</li>
                            <li>Minggu</li>
                        </ul>
                    </div>
                    <div class="hidden px-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="contacts" role="tabpanel"
                        aria-labelledby="contacts-tab">
                        <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the
                            <strong class="font-medium text-gray-800 dark:text-white">Contacts tab's associated
                                content</strong>. Clicking another tab will toggle the visibility of this one for the
                            next. The tab JavaScript swaps classes to control the content visibility and styling.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>



    </x-layouts.visitor>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const expandedImg = document.getElementById('expandedImg');
            const imgClick = document.querySelectorAll('.imgClick');

            imgClick.forEach(function(element) {
                element.addEventListener('click', function() {
                    expandedImg.src = this.src;
                });
            });

        })


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

        shortenText(".elipsis", 450, true);
    </script>
