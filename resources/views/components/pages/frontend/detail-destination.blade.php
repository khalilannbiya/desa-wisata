<x-layouts.visitor-layout>
    <x-slot:title>Wisata Selengkapnya | </x-slot:title>

    <div class="grid gap-5 px-4 mx-auto max-w-7xl md:grid-cols-2 md:px-6 pt-35 font-inter">
        <div class="">
            <div class="grid gap-4">
                <div>
                    <img class="object-cover object-center w-full h-auto max-w-full rounded-lg aspect-[4/3]"
                        id="expandedImg" src="{{ Storage::url($destination->galleries[0]->image_url) }}" alt="">
                </div>
                <div class="overflow-x-auto">
                    <div class="inline-flex gap-3 h-15">
                        @foreach ($destination->galleries as $gallery)
                            <img class="h-auto max-w-full cursor-pointer object-cover object-center rounded-lg aspect-[4/3] imgClick"
                                src="{{ Storage::url($gallery->image_url) }}" alt="">
                        @endforeach
                    </div>
                </div>

            </div>

        </div>
        <div class="">
            <div class="space-y-5">
                <div class="space-y-2">
                    <h1 class="text-2xl font-bold md:text-3xl">{{ $destination->name }}</h1>
                    <span class="flex items-center text-sm text-black gap-1  ">
                        <svg class="w-6 h-6 text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-width="2"
                                d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                            <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        {{ number_format($destination->views) }}x Telah Dilihat
                    </span>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Lokasi :</label>
                        <div class="flex gap-2">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                                    <path
                                        d="M12 2C7.589 2 4 5.589 4 9.995 3.971 16.44 11.696 21.784 12 22c0 0 8.029-5.56 8-12 0-4.411-3.589-8-8-8zm0 12c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4z">
                                    </path>
                                </svg>
                            </div>
                            <a href="{{ $destination->gmaps_url }}" target="_blank">
                                <address class="text-sm text-deep-koamaru-500 capitalize lg:text-base">
                                    {{ $destination->location }}
                                </address>
                            </a>
                        </div>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi :</label>
                    <p class="text-gray-500 md:text-lg">{{ $destination->description }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kisaran Harga :</label>
                    <h1 class="pb-4 font-bold md:text-2xl">
                        {{ $destination->price_range == 0 ? 'Masuk Gratis' : 'Mulai dari Rp. ' . number_format($destination->price_range) }}
                    </h1>
                </div>
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
                                aria-controls="settings" aria-selected="false">Akomodasi</button>
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
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel"
                        aria-labelledby="profile-tab">
                        <p class="capitalize">
                            {{ $openingHours[0] . '-' . $openingHours[1] . ', ' . date('H:i', strtotime($openingHours[2])) . '-' . date('H:i', strtotime($openingHours[3])) . ' WIB' }}
                        </p>
                    </div>
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel"
                        aria-labelledby="dashboard-tab">
                        <ul class="list-check">
                            @forelse ($destination->facilities as $facility)
                                <li>{{ $facility->name }}</li>
                            @empty
                                <p>Belum ada fasilitas</p>
                            @endforelse
                        </ul>
                    </div>
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="settings" role="tabpanel"
                        aria-labelledby="settings-tab">
                        <ul class="list-check">
                            @forelse ($destination->accommodations as $accommodation)
                                <li>{{ $accommodation->name }}</li>
                            @empty
                                <p>Belum ada akomodasi</p>
                            @endforelse
                        </ul>
                    </div>
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="contacts" role="tabpanel"
                        aria-labelledby="contacts-tab">
                        @if ($destination->contactDetail->phone)
                            <div class="flex gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z">
                                    </path>
                                </svg>
                                {{ $destination->contactDetail->phone }}
                            </div>
                        @endif

                        @if ($destination->contactDetail->email)
                            <div class="flex gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z">
                                    </path>
                                </svg>
                                {{ $destination->contactDetail->email }}
                            </div>
                        @endif

                        @if ($destination->contactDetail->social_media)
                            <div class="flex gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z">
                                    </path>
                                </svg>
                                <a href="{{ $destination->contactDetail->social_media }}" class="underline">Klik
                                    untuk melihat sosial media</a>
                            </div>
                        @endif

                    </div>
                </div>

            </div>
        </div>
        <div class="flex items-center gap-3 mt-6 text-green-new">

            <svg class="w-6 h-6 text-green-new dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 12h14M5 12l4-4m-4 4 4 4" />
            </svg>
            <a href="{{ url()->previous() }}">Kembali </a>
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
