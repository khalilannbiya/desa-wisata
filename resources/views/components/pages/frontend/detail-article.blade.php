<x-layouts.visitor-layout>
    <x-slot:title>Artikel Selengkapnya | </x-slot:title>

    @push('style')
        <style>
            .reset h1 {
                font-size: 2em;
                padding-bottom: 10px;
                margin-bottom: 5px;
            }

            .reset h2 {
                font-size: 1.75em;
                padding-bottom: 8px;
                margin-bottom: 4px;
            }

            .reset h3 {
                font-size: 1.5em;
                margin-bottom: 3px;
            }

            .reset p {
                line-height: 1.6;
                padding: 8px 0px 8px 0px;
            }

            .reset ul,
            .reset ol {
                padding: 0;
                /* margin: 0; */
                margin-left: 40px;
            }

            .reset ul {
                list-style: disc;
            }

            .reset ol {
                list-style: auto;
            }

            .reset ul li,
            .reset ol li {
                padding: 8px 10px 8px 10px;
            }

            .reset ol {
                counter-reset: custom-counter;
            }

            .reset ol li {
                counter-increment: custom-counter;
            }

            .reset blockquote {
                border-left: 5px solid #959595;
                margin: 20px 0 20px 25px;
                padding: 10px 20px;
                font-style: italic;
                background-color: #f9f9f9;
                color: #262525;
            }
        </style>
    @endpush

    <section class="pt-20 font-inter">
        <div class="relative z-10 max-w-screen-xl px-4 py-8 mx-auto">
            <a href="{{ Storage::url($article->image_url) }}">
                <img class="object-cover w-full rounded-md md:h-125" src="{{ Storage::url($article->image_url) }}"
                    alt="Gambar detail">
            </a>
        </div>
        <div
            class="relative z-20 h-auto max-w-screen-md px-10 mx-auto bg-white rounded-md xl:max-w-screen-lg md:py-10 md:-mt-25 lg:drop-shadow-xl">
            <div class="max-w-screen-xl mx-auto">
                <h1 class="text-4xl font-bold leading-normal md:text-4xl text-pretty">{{ $article->title }}</h1>
                <div class="flex flex-col gap-1 my-4 ">
                    <div class="flex flex-col md:flex-row md:gap-4">
                        <p>Dibuat Oleh <span class="font-semibold"> {{ $article->user->name }} </span></p>
                        <p class="inline-flex items-center gap-1 text-sm"><svg
                                class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-width="2"
                                    d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            {{ number_format($article->views) }}x Telah Dilihat
                        </p>
                    </div>
                    <p class="text-gray-600">
                        {{ \Carbon\Carbon::parse($article->created_at)->locale('id')->translatedFormat('l, j F Y') }}
                    </p>
                </div>
                <div class="reset">
                    {!! $article->content !!}
                </div>
            </div>
            <div class="flex items-center gap-3 mt-6 text-green-new">

                <svg class="w-6 h-6 text-green-new dark:text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 12h14M5 12l4-4m-4 4 4 4" />
                </svg>
                <a href="{{ url()->previous() }}">Kembali </a>
            </div>
        </div>
    </section>
</x-layouts.visitor-layout>
