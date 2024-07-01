<x-layouts.visitor-layout>
    <x-slot:title>Foto | </x-slot:title>

    <div class="pt-30 px-7">
        <div class="">
            <h1 class="mb-10 text-3xl font-extrabold text-center md:text-4xl font-inter">Galeri</h1>
        </div>
        <div class="grid grid-cols-1 gap-4 mx-auto md:grid-cols-4 max-w-7xl">
            @forelse ($galleries as $gallery)
                <div data-aos="zoom-in" data-aos-duration="1000" class="transition-transform duration-300 ">
                    <a href="{{ Storage::url($gallery->image_url) }}" target="_blank">
                        <img class="object-cover max-w-full rounded-lg  aspect-square"
                            src="{{ Storage::url($gallery->image_url) }}" title="{{ $gallery->destination->name }}"
                            alt="Gambar wisata {{ $gallery->destination->name }}">
                    </a>
                </div>
            @empty
                <p class="text-lg text-center text-gray-500 font-inter">Tidak ada galeri</p>
            @endforelse
        </div>
        @if ($galleries->lastPage() > 1)
            <div class="mt-10">
                {{ $galleries->links() }}
            </div>
        @endif
    </div>
</x-layouts.visitor-layout>

<script>
    AOS.init();
</script>
