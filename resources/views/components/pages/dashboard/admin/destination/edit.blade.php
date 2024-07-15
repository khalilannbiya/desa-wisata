<x-layouts.dashboard>

    {{-- Breadcrumb --}}
    <nav class="mb-5">
        <ol class="flex items-center gap-2">
            <li>
                <a class="font-medium" href="{{ route(auth()->user()->role . '.dashboard') }}">Dashboard /</a>
            </li>
            <li>
                <a class="font-medium" href="{{ route(auth()->user()->role . '.destinations.index') }}">Wisata
                    /</a>
            </li>
            <li class="font-medium text-primary">Ubah</li>
        </ol>
    </nav>

    <form action="{{ route(auth()->user()->role . '.destinations.update', $destination->id) }}"
        enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')

        <div class="">
            <div class="">
                <h1 class="mb-6 text-xl font-bold text-black-dashboard dark:text-white-dahsboard">Ubah Tempat
                    Wisata
                </h1>
            </div>


            <div class="px-6 py-6 mb-6 bg-white rounded-lg shadow-lg dark:bg-black">
                @if (auth()->user()->role != 'owner')
                    <div class="mb-4.5">
                        <label for="owner" class="block mb-3 text-sm font-medium text-black dark:text-white">
                            Penanggung Jawab Wisata <span class="text-red-500">*</span>
                        </label>
                        <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent dark:bg-form-input">
                            <select required id="owner" name="owner"
                                class="relative z-20 w-full px-5 py-3 transition bg-transparent border border-black rounded outline-none appearance-none focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                :class="isOptionSelected && 'text-black dark:text-white'"
                                @change="isOptionSelected = true">
                                <option value="" hidden class="text-body">
                                    Pilih Penanggung Jawab
                                </option>
                                @forelse ($owners as $owner)
                                    <option value="{{ $owner->id }}" class="text-body"
                                        {{ $destination->owner_id == $owner->id ? 'selected' : '' }}>
                                        {{ $owner->name }}</option>
                                @empty
                                    <option value="" class="text-body" selected>Belum ada pennggung jawab</option>
                                @endforelse
                            </select>
                            <x-partials.dashboard.input-error :messages="$errors->get('owner')" />
                        </div>
                    </div>
                @endif
                <div class="w-full mb-6">
                    <label for="name_destination" class="block mb-3 text-sm font-medium text-black dark:text-white">
                        Nama Wisata <span class="text-red-500">*</span>
                    </label>
                    <input required id="name_destination" name="name_destination" autofocus
                        autocomplete="name_destination" value="{{ $destination->name }}" type="text"
                        placeholder="Nama Tempat Wisata"
                        class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                    <x-partials.dashboard.input-error :messages="$errors->get('name_destination')" />
                </div>

                <div class="mb-4.5">
                    <label for="status" class="block mb-3 text-sm font-medium text-black dark:text-white">
                        Status Tempat Wisata <span class="text-red-500">*</span>
                    </label>
                    <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent dark:bg-form-input">
                        <select id="status" required name="status"
                            class="relative z-20 w-full px-5 py-3 transition bg-transparent border border-black rounded outline-none appearance-none focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                            :class="isOptionSelected && 'text-black dark:text-white'" @change="isOptionSelected = true">
                            <option value="" hidden class="text-body">
                                Pilih Status Tempat Wisata
                            </option>
                            <option value="active" class="text-body"
                                {{ $destination->status == 'active' ? 'selected' : '' }}>
                                Beroperasi</option>
                            <option value="inactive" class="text-body"
                                {{ $destination->status == 'inactive' ? 'selected' : '' }}>Tidak Beroperasi</option>
                        </select>
                        <x-partials.dashboard.input-error :messages="$errors->get('status')" />
                    </div>
                </div>

                <div class="w-full mb-6 ">
                    <label for="location" class="block mb-1 text-sm font-medium text-black dark:text-white">
                        Lokasi Tempat Wisata <span class="text-red-500">*</span>
                    </label>
                    <p class="mb-3 text-xs font-medium text-gray-400">* Silahkan masukkan alamat lengkap</p>
                    <input name="location" id="location" value="{{ $destination->location }}" autocomplete="location"
                        required type="text" placeholder="Lokasi Tempat Wisata"
                        class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                    <x-partials.dashboard.input-error :messages="$errors->get('location')" />
                </div>

                <div class="w-full mb-6 ">
                    <label for="gmaps_url" class="block mb-1 text-sm font-medium text-black dark:text-white">
                        Google Maps URL <span class="text-red-500">*</span>
                    </label>
                    <p class="mb-3 text-xs font-medium text-gray-400">* Silahkan masukkan URL/link google maps</p>
                    <input name="gmaps_url" id="gmaps_url" value="{{ $destination->gmaps_url }}"
                        autocomplete="gmaps_url" required type="text" placeholder="Google Maps URL"
                        class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                    <x-partials.dashboard.input-error :messages="$errors->get('gmaps_url')" />
                </div>

                <div class="w-full mb-6 ">
                    <label for="price_range" class="block mb-3 text-sm font-medium text-black dark:text-white">
                        Harga Tempat Wisata <span class="text-red-500">*</span>
                    </label>
                    <p class="text-xs font-medium text-gray-400">* Jika gratis/free masukan nilai 0</p>
                    <input id="price_range" value="{{ $destination->price_range }}" required name="price_range"
                        type="number" placeholder="Harga Tempat Wisata"
                        class="w-full mt-3 rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                </div>

                <div class="mb-6">
                    <label for="description" class="block mb-3 text-sm font-medium text-black dark:text-white">
                        Deskripsi <span class="text-red-500">*</span>
                    </label>
                    <textarea id="description" required name="description" rows="6" placeholder="Deskripsi Tempat Wisata"
                        class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary">{{ $destination->description }}</textarea>
                    <x-partials.dashboard.input-error :messages="$errors->get('description')" />
                </div>
            </div>




        </div>



        <button type="submit"
            class="flex justify-center w-full p-3 font-medium text-white rounded bg-deep-koamaru-600 hover:bg-opacity-90">
            Kirim
        </button>
    </form>

    {{-- START NAV TABS --}}
    <div class="px-6 py-6 mt-6 mb-6 bg-white rounded-lg shadow-lg dark:bg-black">
        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">

            {{-- START TABS --}}
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
                data-tabs-toggle="#default-tab-content" role="tablist">
                <li role="presentation">
                    <button
                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="gallery-tab" data-tabs-target="#gallery" type="button" role="tab"
                        aria-controls="gallery" aria-selected="false">Galeri </button>
                </li>
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
                        aria-controls="contacts" aria-selected="false">Kontak </button>
                </li>
            </ul>
            {{-- END TABS --}}

        </div>

        <div id="default-tab-content">
            {{-- START TAB CONTENT GALLERY --}}
            <div class="hidden p-4 rounded-lg " id="gallery" role="tabpanel" aria-labelledby="gallery-tab">
                <div class="">
                    <div class="text-center text-black dark:text-white-dahsboard">
                        <h2>Galeri</h2>
                    </div>

                    <div class="mb-4">
                        <button data-modal-target="crud-modal-4" data-modal-toggle="crud-modal-4"
                            class="px-4 py-2 text-white rounded-md bg-deep-koamaru-600">Tambah
                            Galeri</button>
                    </div>

                    {{-- Form Galeri --}}
                    @foreach ($destination->galleries as $gallery)
                        <div class="py-2 border-b-2 border-stone-200">
                            <div class="flex items-center justify-between ">
                                <div class="object-contain w-40 overflow-hidden rounded-md">
                                    <a href="{{ Storage::url($gallery->image_url) }}" target="_blank">
                                        <img class="w-full" src="{{ Storage::url($gallery->image_url) }}"
                                            alt="Gambar Wisata">
                                    </a>
                                </div>
                                <form
                                    action="{{ route(auth()->user()->role . '.destinations.destroyGallery', [$destination->id, $gallery->id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-4 py-2 text-white rounded-md bg-danger ">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach

                    <!-- Main modal -->
                    <div id="crud-modal-4" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full p-4">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div
                                    class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        Tambah Galeri
                                    </h3>
                                    <button type="button"
                                        class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-toggle="crud-modal-4">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <form
                                    action="{{ route(auth()->user()->role . '.destinations.addGalleries', $destination->id) }}"
                                    method="POST" enctype="multipart/form-data" class="p-4 md:p-5">
                                    @csrf
                                    @method('POST')

                                    <div class="px-6 py-6 mb-6 bg-white rounded-lg dark:bg-black">
                                        <label for="galleries"
                                            class="block mb-2 text-sm font-medium text-black dark:text-white">
                                            Masukan Foto <span class="text-red-500">*</span>
                                        </label>
                                        <p class="text-xs font-medium text-red-500">* Menambahkan foto bisa lebih dari
                                            satu</p>
                                        <p class="text-xs font-medium text-red-500">* Pastikan file bertipe jpeg, jpg,
                                            png</p>
                                        <p class="text-xs font-medium text-red-500">* Maksimal file 1MB</p>
                                        <input type="file" required multiple accept="image/*" name="galleries[]"
                                            id="galleries" class="mt-3">
                                        <x-partials.dashboard.input-error :messages="$errors->get('galleries.')" />
                                    </div>
                                    <div class="pb-4 text-center ">

                                        <button type="submit"
                                            class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            <svg class="w-5 h-5 me-1 -ms-1" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            Kirim
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- End --}}
                </div>
            </div>
            {{-- END TAB CONTENT GALLERY --}}

            {{-- START TAB CONTENT OPENING HOURS --}}
            <div class="hidden p-4 rounded-lg" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                {{-- Jadwal operasional --}}
                <div class="mb-6 ">
                    <div class="">
                        <div class="text-center text-black dark:text-white">
                            <h2>Jadwal Operasional</h2>
                        </div>

                        {{-- Form Jadwal --}}
                        <form
                            action="{{ route(auth()->user()->role . '.destinations.updateOperational', $destination->id) }}"
                            method="POST">
                            @csrf
                            @method('PUT')

                            <div>
                                <div class="w-full mb-6">
                                    <label for="opening_hours-first_day"
                                        class="block mb-3 text-sm font-medium text-black dark:text-white">
                                        Hari Awal <span class="text-red-500">*</span>
                                    </label>
                                    <div x-data="{ isOptionSelected: false }"
                                        class="relative z-20 bg-transparent dark:bg-form-input">
                                        <select id="opening_hours-first_day" name="opening_hours[first_day]" required
                                            class="relative z-20 w-full px-5 py-3 transition bg-transparent bg-white border border-black rounded outline-none appearance-none days focus:border-primary active:border-primary dark:bg-black-dashboard dark:border-form-strokedark dark:focus:border-primary"
                                            :class="isOptionSelected && 'text-black dark:text-white'"
                                            @change="isOptionSelected = true">
                                            <option value="" hidden class="dark:text-gray-300">
                                                Hari Operasional
                                            </option>
                                            <option value="senin" class="dark:text-gray-300"
                                                {{ $openingHours[0] == 'senin' ? 'selected' : '' }}>
                                                Senin
                                            </option>
                                            <option value="selasa" class="dark:text-gray-300"
                                                {{ $openingHours[0] == 'selasa' ? 'selected' : '' }}>
                                                Selasa
                                            </option>
                                            <option value="rabu" class="dark:text-gray-300"
                                                {{ $openingHours[0] == 'rabu' ? 'selected' : '' }}>
                                                Rabu
                                            </option>
                                            <option value="kamis" class="dark:text-gray-300"
                                                {{ $openingHours[0] == 'kamis' ? 'selected' : '' }}>
                                                Kamis
                                            </option>
                                            <option value="jumat" class="dark:text-gray-300"
                                                {{ $openingHours[0] == 'jumat' ? 'selected' : '' }}>
                                                Jumat
                                            </option>
                                            <option value="sabtu" class="dark:text-gray-300"
                                                {{ $openingHours[0] == 'sabtu' ? 'selected' : '' }}>
                                                Sabtu
                                            </option>
                                            <option value="minggu" class="dark:text-gray-300"
                                                {{ $openingHours[0] == 'minggu' ? 'selected' : '' }}>
                                                Minggu
                                            </option>
                                        </select>
                                    </div>
                                    <x-partials.dashboard.input-error :messages="$errors->get('opening_hours-first_day')" />
                                </div>
                                <div class="w-full mb-6">
                                    <label for="opening_hours-last_day"
                                        class="block mb-3 text-sm font-medium text-black dark:text-white">
                                        Hari Akhir <span class="text-red-500">*</span>
                                    </label>
                                    <div x-data="{ isOptionSelected: false }"
                                        class="relative z-20 bg-transparent dark:bg-form-input">
                                        <select id="opening_hours-last_day" name="opening_hours[last_day]" required
                                            class="relative z-20 w-full px-5 py-3 transition bg-transparent bg-white border border-black rounded outline-none appearance-none days focus:border-primary active:border-primary dark:bg-black-dashboard dark:border-form-strokedark dark:focus:border-primary"
                                            :class="isOptionSelected && 'text-black dark:text-white'"
                                            @change="isOptionSelected = true">
                                            <option value="" hidden class="dark:text-gray-300">
                                                Hari Operasional
                                            </option>
                                            <option value="senin" class="dark:text-gray-300"
                                                {{ $openingHours[1] == 'senin' ? 'selected' : '' }}>
                                                Senin
                                            </option>
                                            <option value="selasa" class="dark:text-gray-300"
                                                {{ $openingHours[1] == 'selasa' ? 'selected' : '' }}>
                                                Selasa
                                            </option>
                                            <option value="rabu" class="dark:text-gray-300"
                                                {{ $openingHours[1] == 'rabu' ? 'selected' : '' }}>
                                                Rabu
                                            </option>
                                            <option value="kamis" class="dark:text-gray-300"
                                                {{ $openingHours[1] == 'kamis' ? 'selected' : '' }}>
                                                Kamis
                                            </option>
                                            <option value="jumat" class="dark:text-gray-300"
                                                {{ $openingHours[1] == 'jumat' ? 'selected' : '' }}>
                                                Jumat
                                            </option>
                                            <option value="sabtu" class="dark:text-gray-300"
                                                {{ $openingHours[1] == 'sabtu' ? 'selected' : '' }}>
                                                Sabtu
                                            </option>
                                            <option value="minggu" class="dark:text-gray-300"
                                                {{ $openingHours[1] == 'minggu' ? 'selected' : '' }}>
                                                Minggu
                                            </option>
                                        </select>
                                    </div>
                                    <x-partials.dashboard.input-error :messages="$errors->get('opening_hours-last_day')" />
                                </div>
                            </div>

                            <div class="flex gap-4 mb-6">
                                <div>
                                    <label for="opening_hours-open"
                                        class="block mb-3 text-sm font-medium text-black dark:text-white">
                                        Jam Buka
                                    </label>
                                    <input required id="opening_hours-open"
                                        class="rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                                        type="time" name="opening_hours[open]" value="{{ $openingHours[2] }}">
                                </div>
                                <div>
                                    <label for="opening_hours-close"
                                        class="block mb-3 text-sm font-medium text-black dark:text-white">
                                        Jam Tutup
                                    </label>
                                    <input required id="opening_hours-close"
                                        class="rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                                        type="time" name="opening_hours[close]" value="{{ $openingHours[3] }}">
                                </div>

                                <x-partials.dashboard.input-error :messages="$errors->get('opening_hours-open')" />
                                <x-partials.dashboard.input-error :messages="$errors->get('opening_hours-close')" />
                            </div>

                            <div class="">
                                <button type="submit"
                                    class="w-full p-3 font-medium text-white rounded bg-deep-koamaru-600 hover:bg-opacity-90">Update</button>
                            </div>
                        </form>
                        {{-- End --}}
                    </div>
                </div>
            </div>
            {{-- END TAB CONTENT OPENING HOURS --}}

            {{-- START TAB CONTENT FACILITY/FASILITAS --}}
            <div class="hidden p-4 rounded-lg " id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                <div class="mb-6 text-center text-black dark:text-white">
                    <h2>Fasilitas</h2>
                </div>

                @forelse ($destination->facilities as $facility)
                    <div class="flex gap-3 mb-6 ">
                        <div class="w-full ">
                            <input id="facility" disabled
                                class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                                type="text" maxlength="50" value="{{ $facility->name }}"
                                autocomplete="facilities" name="facility" placeholder="Masukkan Fasilitas">
                        </div>

                        {{-- Button Delete --}}
                        <form
                            action="{{ route(auth()->user()->role . '.destinations.destroyFacility', [$destination->id, $facility->id]) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')

                            <button
                                class="px-6 py-3 text-white transition-colors duration-300 ease-in-out rounded shadow-md bg-danger hover:bg-danger-dark focus:outline-none focus:ring-2 focus:ring-danger">Hapus</button>
                        </form>
                    </div>
                @empty
                    <p class="mb-5 text-center">Belum ada fasilitas</p>
                @endforelse


                <!-- Modal toggle -->
                <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button">
                    Tambah
                </button>

                <!-- Main modal -->
                <div id="crud-modal" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-md max-h-full p-4">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div
                                class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Tambah Fasilitas
                                </h3>
                                <button type="button"
                                    class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-toggle="crud-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <form class="p-4 md:p-5" method="POST"
                                action="{{ route(auth()->user()->role . '.destinations.storeFacility', $destination->id) }}">
                                @csrf
                                @method('POST')

                                <div class="px-3 mb-4">
                                    <label for="facility"
                                        class="block mb-3 text-sm font-medium text-black dark:text-white">
                                        Fasilitas
                                    </label>
                                    <input id="facility"
                                        class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal dark:bg-black text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:text-white dark:focus:border-primary"
                                        value="{{ old('facility') }}" type="text" maxlength="50" name="facility"
                                        placeholder="Masukkan Fasilitas">
                                    <x-partials.dashboard.input-error :messages="$errors->get('facility')" />
                                </div>
                                <div class="pb-4 text-center ">

                                    <button type="submit"
                                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <svg class="w-5 h-5 me-1 -ms-1" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        Kirim
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            {{-- END TAB CONTENT FACILITY/FASILITAS --}}

            {{-- START TAB CONTENT ACCOMMODATIONS/AKOMODASI --}}
            <div class="hidden p-4 rounded-lg " id="settings" role="tabpanel" aria-labelledby="settings-tab">
                <div class="mb-6 text-center text-black dark:text-white">
                    <h2>Akomodasi</h2>
                </div>

                @forelse ($destination->accommodations as $accommodation)
                    <div class="flex gap-3 mb-6 ">
                        <div class="w-full ">
                            <input id="accommodations" disabled
                                class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                                type="text" maxlength="50" value="{{ $accommodation->name }}"
                                autocomplete="accommodations" name="accommodations" placeholder="Masukkan Akomodasi">
                        </div>

                        {{-- Button Delete --}}
                        <form
                            action="{{ route(auth()->user()->role . '.destinations.destroyAccommodation', [$destination->id, $accommodation->id]) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')

                            <button
                                class="px-6 py-3 text-white transition-colors duration-300 ease-in-out rounded shadow-md bg-danger hover:bg-danger-dark focus:outline-none focus:ring-2 focus:ring-danger">Hapus</button>
                        </form>
                    </div>
                @empty
                    <p class="mb-5 text-center">Belum ada accomodation</p>
                @endforelse


                <!-- Modal toggle -->
                <button data-modal-target="crud-modal-2" data-modal-toggle="crud-modal-2"
                    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button">
                    Tambah
                </button>

                <!-- Main modal -->
                <div id="crud-modal-2" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-md max-h-full p-4">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div
                                class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Tambah Akomodasi
                                </h3>
                                <button type="button"
                                    class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-toggle="crud-modal-2">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <form class="p-4 md:p-5" method="POST"
                                action="{{ route(auth()->user()->role . '.destinations.storeAccommodation', $destination->id) }}">
                                @csrf
                                @method('POST')

                                <div class="px-3 mb-4">
                                    <label for="accommodation"
                                        class="block mb-3 text-sm font-medium text-black dark:text-white">
                                        Akomodasi
                                    </label>
                                    <input id="accommodation"
                                        class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal dark:bg-black text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:text-white dark:focus:border-primary"
                                        value="{{ old('accommodation') }}" type="text" maxlength="50"
                                        name="accommodation" placeholder="Masukkan Akomodasi">
                                    <x-partials.dashboard.input-error :messages="$errors->get('accommodation')" />
                                </div>
                                <div class="pb-4 text-center ">

                                    <button type="submit"
                                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <svg class="w-5 h-5 me-1 -ms-1" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        Kirim
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            {{-- END TAB CONTENT ACCOMMODATIONS/AKOMODASI --}}

            {{-- START TAB CONTENT CONTACT/KONTAK --}}
            <div class="hidden p-4 rounded-lg " id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
                <div class="">
                    <div class="text-center text-black dark:text-white-dahsboard">
                        <h2>Personal Kontak</h2>
                    </div>

                    {{-- START FORM KONTAK/CONTACT --}}
                    <form method="POST"
                        action="{{ route(auth()->user()->role . '.destinations.updateContactDetail', $destination->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-6">
                            <label for="contact_details.phone"
                                class="block mb-3 text-sm font-medium text-black dark:text-white">
                                Telepon
                            </label>
                            <div class="flex gap-4">
                                <input id="contact_details.phone"
                                    class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal dark:bg-black text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:text-white dark:focus:border-primary"
                                    value="{{ $destination->contactDetail->phone }}" type="number"
                                    name="contact_details[phone]" placeholder="Masukkan Telepon">
                                <x-partials.dashboard.input-error :messages="$errors->get('contact_details.phone')" />
                            </div>

                            <div class="mt-6 mb-6">
                                <label for="contact_details.email"
                                    class="block mb-3 text-sm font-medium text-black dark:text-white">
                                    Email
                                </label>

                                <div class="flex gap-4">
                                    <input id="contact_details.email" maxlength="50"
                                        class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal dark:bg-black text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:text-white dark:focus:border-primary"
                                        value="{{ $destination->contactDetail->email }}" type="email"
                                        name="contact_details[email]" placeholder="Masukkan Email">
                                    <x-partials.dashboard.input-error :messages="$errors->get('contact_details.email')" />

                                </div>
                            </div>

                            <div class="mb-6">
                                <label for="contact_details.social_media"
                                    class="block mb-1 text-sm font-medium text-black dark:text-white">
                                    Sosial Media
                                </label>
                                <p class="mb-3 text-xs font-medium text-gray-400">* Silahkan masukan URL media sosial
                                </p>
                                <div class="flex gap-4">
                                    <input id="contact_details.social_media" maxlength="100"
                                        class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal dark:bg-black text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:text-white dark:focus:border-primary"
                                        value="{{ $destination->contactDetail->social_media }}" type="text"
                                        name="contact_details[social_media]"
                                        placeholder="Contoh: https://www.instagram.com/instagram">
                                    <x-partials.dashboard.input-error :messages="$errors->get('contact_details.social_media')" />

                                </div>
                            </div>

                            <div class="">
                                <button type="submit"
                                    class="w-full p-3 font-medium text-white rounded bg-deep-koamaru-600 hover:bg-opacity-90">Update</button>
                            </div>
                    </form>
                    {{-- END FORM KONTAK/CONTACT --}}

                </div>
            </div>
            {{-- END TAB CONTENT CONTACT/KONTAK --}}

        </div>
    </div>
    {{-- END NAV TABS --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deletePhone = document.getElementById('delete-phone');
            const deleteEmail = document.getElementById('delete-email');
            const deleteSocialMedia = document.getElementById('delete-social-media');

            deletePhone.addEventListener('click', function() {
                document.getElementById('contact_details.phone').value = '';
            });
            deleteEmail.addEventListener('click', function() {
                document.getElementById('contact_details.email').value = '';
            });
            deleteSocialMedia.addEventListener('click', function() {
                document.getElementById('contact_details.social_media').value = '';
            });

        })
    </script>
</x-layouts.dashboard>
