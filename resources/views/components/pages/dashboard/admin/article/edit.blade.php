<script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
<x-layouts.dashboard>
    {{-- Breadcrumb --}}
    <nav class="mb-5">
        <ol class="flex items-center gap-2">
            <li>
                <a class="font-medium" href="{{ route(auth()->user()->role . '.dashboard') }}">Dashboard /</a>
            </li>
            <li>
                <a class="font-medium" href="{{ route(auth()->user()->role . '.articles.index') }}">Artikel /</a>
            </li>
            <li class="font-medium text-primary">Ubah Artikel</li>
        </ol>
    </nav>

    <form action="{{ route(strtolower(auth()->user()->role) . '.articles.update', [$article->id]) }}" enctype="multipart/form-data" method="POST" novalidate>
        @csrf
        @method('PUT')
        <div class="form-1">
            <h1 class="mb-6 text-xl font-bold text-black-dashboard dark:text-white-dahsboard">Ubah Artikel</h1>

            <div class="px-6 py-6 mb-6 bg-white rounded-lg shadow-lg dark:bg-black">
    <div class="flex items-center justify-between">
        <div>
            <label for="image" class="block mb-2 text-sm font-medium text-black dark:text-white">
                Ubah Foto <span class="text-red-500">*</span>
            </label>
            <input type="file" accept="image/*" name="image_url" id="image" class="mt-3 block w-full">
            <p class="text-xs font-medium text-red-500 mt-2">* Pastikan file bertipe jpeg, jpg, png</p>
            <p class="text-xs font-medium text-red-500">* Maksimal file 1MB</p>
            <x-partials.dashboard.input-error :messages="$errors->get('image_url')" />
        </div>
        <div class="overflow-hidden rounded-lg shadow-md max-w-xs w-32 ml-4">
            <img class="w-full h-auto rounded-lg object-cover" src="{{ Storage::url($article->image_url) }}" alt="Gambar Wisata">
        </div>
    </div>
    <div id="imagePreviewContainer" class="flex flex-wrap gap-5 mt-3"></div>
</div>


            <div class="px-6 py-6 mb-6 bg-white rounded-lg shadow-lg dark:bg-black">
                <div class="mb-4.5">
                    <label for="title" class="mb-3 block text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                        Judul <span class="text-red-500">*</span>
                    </label>
                    <input type="text" required name="title" autocomplete="title" maxlength="100" placeholder="Masukan Judul" value="{{  $article->title }}" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard dark:focus:border-primary">
                    <x-partials.dashboard.input-error :messages="$errors->get('title')" />
                </div>

                <div class="mb-4.5">
                    <label for="content" class="mb-3 block text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                        Konten <span class="text-red-500">*</span>
                    </label>
                    <textarea rows="5" cols="30" id="editor" required name="content" placeholder="Masukan Konten" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition  active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard ">{{ $article->content }}</textarea>
                    <x-partials.dashboard.input-error :messages="$errors->get('content')" />
                </div>
            </div>

            <button type="submit" class="flex justify-center w-full p-3 font-medium text-white rounded bg-deep-koamaru-600 hover:bg-opacity-90">
                Kirim
            </button>
        </div>
    </form>


</x-layouts.dashboard>
<script>
        CKEDITOR.replace('content', {
            toolbar: [
                { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote'] },
                { name: 'styles', items: ['Styles', 'Format'] },
                { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike'] },
                { name: 'tools', items: ['Maximize'] }
            ]
        }); // by name bukan id CKeditor 4
</script>
