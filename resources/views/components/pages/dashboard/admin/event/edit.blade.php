<x-layouts.dashboard>

    {{-- Breadcrumb --}}
    <nav class="mb-5">
        <ol class="flex items-center gap-2">
            <li>
                <a class="font-medium" href="{{ route(auth()->user()->role . '.dashboard') }}">Dashboard /</a>
            </li>
            <li>
                <a class="font-medium" href="{{ route(auth()->user()->role . '.events.index') }}">Acara
                    /</a>
            </li>
            <li class="font-medium text-primary">Ubah</li>
        </ol>
    </nav>

    <form action="{{ route(auth()->user()->role . '.events.update', $event->id) }}" enctype="multipart/form-data"
        method="POST">
        @csrf
        @method('PUT')

        <div class="">
            <div class="">
                <h1 class="mb-6 text-xl font-bold text-black-dashboard dark:text-white-dahsboard">Ubah Acara
                </h1>
            </div>

            <div class="px-6 py-6 mb-6 bg-white rounded-lg shadow-lg dark:bg-black">
                <p class="mb-2">
                    Foto Sebelumnya
                </p>
                <a href="{{ Storage::url($event->image_url) }}" target="_blank" class="inline-block">
                    <img class="w-40" src="{{ Storage::url($event->image_url) }}" alt="Gambar Event">
                </a>
            </div>

            <div class="px-6 py-6 mb-6 bg-white rounded-lg shadow-lg dark:bg-black">
                <label for="image" class="block mb-2 text-sm font-medium text-black dark:text-white">
                    Masukan Foto <span class="text-red-500">*</span>
                </label>
                <p class="text-xs font-medium text-gray-400">* Pastikan file bertipe jpeg, jpg, png</p>
                <p class="text-xs font-medium text-gray-400">* Maksimal file 1MB</p>
                <div id="imagePreviewContainer" class="flex flex-wrap gap-5 mt-3"></div>
                <input type="file" accept="image/*" name="image" id="image" class="mt-3">
                <x-partials.dashboard.input-error :messages="$errors->get('image')" />
            </div>

            <div class="px-6 py-6 mb-6 bg-white rounded-lg shadow-lg dark:bg-black">
                @if (auth()->user()->role == 'super_admin')
                    <div class="mb-4.5">
                        <label for="admin" class="block mb-3 text-sm font-medium text-black dark:text-white">
                            Pemmbuat Event <span class="text-red-500">*</span>
                        </label>
                        <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent dark:bg-form-input">
                            <select required id="admin" name="admin"
                                class="relative z-20 w-full px-5 py-3 transition bg-transparent border border-black rounded outline-none appearance-none focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                :class="isOptionSelected && 'text-black dark:text-white'"
                                @change="isOptionSelected = true">
                                <option value="" hidden class="text-body">
                                    Pilih Penanggung Jawab
                                </option>
                                @forelse ($admins as $admin)
                                    <option value="{{ $admin->id }}" class="text-body"
                                        {{ $event->admin_id == $admin->id ? 'selected' : '' }}>
                                        {{ $admin->name }}</option>
                                @empty
                                    <option value="" class="text-body" selected>Belum ada Penanggung Jawab
                                    </option>
                                @endforelse
                            </select>
                            <x-partials.dashboard.input-error :messages="$errors->get('admin')" />
                        </div>
                    </div>
                @endif

                <div class="w-full mb-6">
                    <label for="name" class="block mb-3 text-sm font-medium text-black dark:text-white">Nama
                        Acara<span class="text-red-500">*</span>
                    </label>
                    <input required id="name" name="name" autocomplete="name" value="{{ $event->name }}"
                        maxlength="50" type="text" placeholder="Nama Acara"
                        class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                    <x-partials.dashboard.input-error :messages="$errors->get('name')" />
                </div>

                <div class="mb-4.5">
                    <label for="start_date" class="block mb-3 text-sm font-medium text-black dark:text-white">
                        Tanggal Mulai <span class="text-red-500">*</span>
                    </label>
                    <input required id="start_date"
                        class="rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                        type="datetime-local" name="start_date" value="{{ $event->start_date }}"
                        min="{{ date('Y-m-d\TH:i') }}">
                </div>

                <div class="mb-4.5">
                    <label for="end_date" class="block mb-3 text-sm font-medium text-black dark:text-white">
                        Tanggal Akhir <span class="text-red-500">*</span>
                    </label>
                    <input required id="end_date"
                        class="rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                        type="datetime-local" name="end_date" value="{{ $event->end_date }}"
                        min="{{ date('Y-m-d\TH:i') }}">
                </div>

                <div class="w-full mb-6 ">
                    <label for="location" class="block mb-1 text-sm font-medium text-black dark:text-white">
                        Lokasi Acara <span class="text-red-500">*</span>
                    </label>
                    <p class="mb-3 text-xs font-medium text-gray-400">* Silahkan masukkan alamat lengkap</p>
                    <input name="location" id="location" value="{{ $event->location }}" autocomplete="location"
                        required type="text" placeholder="Lokasi Tempat Acara"
                        class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                    <x-partials.dashboard.input-error :messages="$errors->get('location')" />
                </div>

                <div class="w-full mb-6 ">
                    <label for="gmaps_url" class="block mb-1 text-sm font-medium text-black dark:text-white">
                        Google Maps URL <span class="text-red-500">*</span>
                    </label>
                    <p class="mb-3 text-xs font-medium text-gray-400">* Silahkan masukkan URL/link google maps</p>
                    <input name="gmaps_url" id="gmaps_url" value="{{ $event->gmaps_url }}" autocomplete="gmaps_url"
                        required type="text" placeholder="Google Maps URL"
                        class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                    <x-partials.dashboard.input-error :messages="$errors->get('gmaps_url')" />
                </div>

                <div class="mb-6">
                    <label for="description" class="block mb-3 text-sm font-medium text-black dark:text-white">
                        Deskripsi <span class="text-red-500">*</span>
                    </label>
                    <textarea id="description" required name="description" rows="6" placeholder="Deskripsi Acara"
                        class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary">{{ $event->description }}</textarea>
                    <x-partials.dashboard.input-error :messages="$errors->get('description')" />
                </div>
            </div>
        </div>
        <button type="submit"
            class="flex justify-center w-full p-3 font-medium text-white rounded bg-deep-koamaru-600 hover:bg-opacity-90">
            Ubah
        </button>
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

</x-layouts.dashboard>
