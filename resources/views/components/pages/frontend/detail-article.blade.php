<x-layouts.visitor-layout>
    <section class="pt-20 font-inter reset">
        <div class="max-w-screen-xl px-4 py-8 mx-auto relative z-10">
            <a href="{{ Storage::url($article->image_url) }}">
                <img class="w-full object-cover md:h-125 rounded-md" src="{{ Storage::url($article->image_url) }}"
                    alt="Gambar detail">
            </a>
        </div>
        <div
            class="max-w-screen-md xl:max-w-screen-lg h-auto px-10 md:py-10  md:-mt-25 bg-white lg:drop-shadow-xl rounded-md z-20 relative mx-auto">
            <div class="max-w-screen-xl mx-auto">
                <h1 class="md:text-4xl  text-xl font-extrabold ">{{ $article->title }}</h1>
                <div class="my-4 flex flex-col gap-1">
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
                            500x Dilihat
                        </p>
                    </div>
                    <p class="text-gray-600">
                        {{ \Carbon\Carbon::parse($article->created_at)->locale('id')->translatedFormat('l, j F Y') }}
                    </p>
                </div>
                <div class="">
                    {!! $article->content !!}
                </div>
            </div>
            <div class="mt-6 flex items-center gap-3 text-green-new">

                <svg class="w-6 h-6 text-green-new dark:text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 12h14M5 12l4-4m-4 4 4 4" />
                </svg>
                <a href="{{ url()->previous() }}">Kembali </a>
            </div>
        </div>
    </section>

    <style>
        /* custom CSS */
        .reset h1 {
            font-size: 2em;
            font-weight: bolder;
        }

        .reset h2 {
            font-size: 1.2em;
            font-weight: bolder;
        }

        .reset ol {
            list-style: auto;
        }

        .reset ul {
            list-style: disc;
        }

        .reset blockquote {
            padding: 10px 20px;
            margin: 20px 0;
            border-left: 5px solid #ccc;
            background-color: #f9f9f9;
            font-style: italic;
            color: #555;
        }
    </style>
</x-layouts.visitor-layout>
<script></script>
