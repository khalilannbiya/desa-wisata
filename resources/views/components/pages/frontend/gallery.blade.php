<x-layouts.visitor-layout>
    <div class="pt-30 px-7">
        <div class="">
            <h1 class="md:text-4xl text-center mb-10 text-3xl font-inter font-extrabold">Galeri</h1>
        </div>
        <div class="grid md:grid-cols-4 grid-cols-1 max-w-7xl mx-auto  gap-4">
            @forelse ($galleries as $gallery)
                <div data-aos="zoom-in" data-aos-duration="1000" class=" transition-transform duration-300 ">
                    <img class=" aspect-square object-cover  max-w-full rounded-lg"
                        src="{{ Storage::url($gallery->image_url) }}" title="{{ $gallery->destination->name }}"
                        alt="">
                </div>
            @empty
                <p class="text-center font-inter text-gray-500 text-lg">Tidak ada galeri</p>
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
