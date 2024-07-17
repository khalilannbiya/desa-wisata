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

    <form action="{{ route(strtolower(auth()->user()->role) . '.articles.update', [$article->id]) }}"
        enctype="multipart/form-data" method="POST" novalidate>
        @csrf
        @method('PUT')
        <div class="form-1">
            <h1 class="mb-6 text-xl font-bold text-black-dashboard dark:text-white-dahsboard">Ubah Artikel</h1>

            <div class="px-6 py-6 mb-6 bg-white rounded-lg shadow-lg dark:bg-black">
                <p class="mb-2">
                    Foto Sebelumnya
                </p>
                <a href="{{ Storage::url($article->image_url) }}" target="_blank" class="inline-block">
                    <img class="w-40" src="{{ Storage::url($article->image_url) }}" alt="Gambar Event">
                </a>
            </div>

            <div class="px-6 py-6 mb-6 bg-white rounded-lg shadow-lg dark:bg-black">
                <div class="flex items-center justify-between">
                    <div>
                        <label for="image" class="block mb-2 text-sm font-medium text-black dark:text-white">
                            Ubah Foto <span class="text-red-500">*</span>
                        </label>
                        <input type="file" accept="image/*" name="image" id="image" class="block w-full mt-3">
                        <p class="mt-2 text-xs font-medium text-gray-400">* Pastikan file bertipe jpeg, jpg, png</p>
                        <p class="text-xs font-medium text-gray-400">* Maksimal file 1MB</p>
                        <x-partials.dashboard.input-error :messages="$errors->get('image')" />
                    </div>
                </div>
                <div id="imagePreviewContainer" class="flex flex-wrap gap-5 mt-3"></div>
            </div>

            <div class="px-6 py-6 mb-6 bg-white rounded-lg shadow-lg dark:bg-black">
                @if (auth()->user()->role != 'writer')
                    <div class="mb-4.5">
                        <label for="author" class="block mb-3 text-sm font-medium text-black dark:text-white">
                            Pembuat Artikel <span class="text-red-500">*</span>
                        </label>
                        <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent dark:bg-form-input">
                            <select required id="author" name="writer"
                                class="relative z-20 w-full px-5 py-3 transition bg-transparent border border-black rounded outline-none appearance-none focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                :class="isOptionSelected && 'text-black dark:text-white'"
                                @change="isOptionSelected = true">
                                <option value="" hidden class="text-body">
                                    Pilih Pembuat Artikel
                                </option>
                                @forelse ($admins as $admin)
                                    <option value="{{ $admin->id }}" class="text-body"
                                        {{ $article->author_id == $admin->id ? 'selected' : '' }}>
                                        {{ $admin->name }}</option>
                                @empty
                                    <option value="" class="text-body" selected>Belum ada Pembuat Artikel
                                    </option>
                                @endforelse
                            </select>
                            <x-partials.dashboard.input-error :messages="$errors->get('author')" />
                        </div>
                    </div>
                @endif
                <div class="mb-4.5">
                    <label for="title"
                        class="block mb-3 text-sm font-medium text-black-dashboard dark:text -white-dahsboard">
                        Judul <span class="text-red-500">*</span>
                    </label>
                    <input type="text" required name="title" autocomplete="title" maxlength="75"
                        placeholder="Masukan Judul" value="{{ $article->title }}"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard dark:focus:border-primary">
                    <x-partials.dashboard.input-error :messages="$errors->get('title')" />
                </div>

                <div class="mb-4.5">
                    <label for="content"
                        class="block mb-3 text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                        Konten <span class="text-red-500">*</span>
                    </label>
                    <textarea rows="5" cols="30" id="editor" required name="content" placeholder="Masukan Konten"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition  active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard ">{{ $article->content }}</textarea>
                    <x-partials.dashboard.input-error :messages="$errors->get('content')" />
                </div>
            </div>

            <button type="submit"
                class="flex justify-center w-full p-3 font-medium text-white rounded bg-deep-koamaru-600 hover:bg-opacity-90">
                Kirim
            </button>
        </div>
    </form>

    <script>
        document.getElementById('image').addEventListener('change', function(event) {
            const files = event.target.files;
            const imagePreviewContainer = document.getElementById('imagePreviewContainer');
            imagePreviewContainer.innerHTML = ''; // Clear previous images

            for (const file of files) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'w-32 h-32 object-cover rounded-lg';
                    imagePreviewContainer.appendChild(img);
                }
                reader.readAsDataURL(file);
            }
        });
    </script>

    <script>
        CKEDITOR.replace('content', {
            versionCheck: false,
            toolbar: [{
                    name: 'paragraph',
                    items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote']
                },
                {
                    name: 'styles',
                    items: ['Format']
                },
                {
                    name: 'basicstyles',
                    items: ['Bold', 'Italic', 'Underline', 'Strike']
                },
                {
                    name: 'tools',
                    items: ['Maximize']
                }
            ]
        }); // by name bukan id CKeditor 4
    </script>
</x-layouts.dashboard>
