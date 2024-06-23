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

    <form action="{{ route(strtolower(auth()->user()->role) . '.destinations.update', [$destination->id]) }}" enctype="multipart/form-data"
        method="POST">
        @csrf
        @method('PUT')
        <div class="">
            <div class="">
                <h1 class="text-black-dashboard dark:text-white-dahsboard font-bold text-xl mb-6"> Ubah Tempat
                    Wisata
                </h1>
            </div>


            <div class="bg-white dark:bg-black shadow-lg px-6 py-6 rounded-lg mb-6">
                <div class="w-full mb-6">
                    <label for="name_destination" class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Nama Wisata <span class="text-red-500">*</span>
                    </label>
                    <input required id="name_destination" name="name_destination" autofocus
                        autocomplete="name_destination" value="{{ $destination->name }}" type="text"
                        placeholder="Nama Tempat Wisata"
                        class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                    <x-partials.dashboard.input-error :messages="$errors->get('name_destination')" />
                </div>

                <div class="mb-4.5">
                    <label for="status" class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Status Tempat Wisata <span class="text-red-500">*</span>
                    </label>
                    <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent dark:bg-form-input">
                        <select id="status" required name="status"
                            class="relative z-20 w-full appearance-none rounded border border-black bg-transparent px-5 py-3 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                            :class="isOptionSelected && 'text-black dark:text-white'" @change="isOptionSelected = true">
                            <option value="" hidden class="text-body">
                                Pilih Status Tempat Wisata
                            </option>
                            <option value="active" class="text-body" {{ $destination->status == 'active' ? 'selected' : '' }}>
                                Aktif</option>
                            <option value="inactive" class="text-body"
                                {{ $destination->status == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
                        <x-partials.dashboard.input-error :messages="$errors->get('status')" />
                    </div>
                </div>

                <div class="w-full mb-6 ">
                    <label for="location" class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Lokasi Tempat Wisata <span class="text-red-500">*</span>
                    </label>
                    <input name="location" id="location" value="{{ $destination->location }}" autocomplete="location" required
                        type="text" placeholder="Lokasi Tempat Wisata"
                        class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                    <x-partials.dashboard.input-error :messages="$errors->get('location')" />
                </div>

                <div class="w-full mb-6 ">
                    <label for="price_range" class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Harga Tempat Wisata <span class="text-red-500">*</span>
                    </label>
                    <p class="text-red-500 font-medium text-xs">* Jika gratis/free masukan nilai 0</p>
                    <input id="price_range" value="{{ $destination->price_range }}" required name="price_range" type="number"
                        placeholder="Harga Tempat Wisata"
                        class="w-full mt-3 rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                </div>

                <div class="mb-6">
                    <label for="description" class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Deskripsi <span class="text-red-500">*</span>
                    </label>
                    <textarea id="description" required name="description" rows="6" placeholder="Deskripsi Tempat Wisata"
                        class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary">{{ $destination->description }}</textarea>
                    <x-partials.dashboard.input-error :messages="$errors->get('description')" />
                </div>
            </div>
        </div>
        <button type="submit"
            class="flex w-full justify-center rounded bg-deep-koamaru-600 p-3 font-medium text-white hover:bg-opacity-90">
            Kirim
        </button>
    </form>

    {{-- Nav Tab --}}

    <div class="bg-white dark:bg-black shadow-lg px-6 py-6 rounded-lg mb-6 mt-6">
        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
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
                        aria-controls="settings" aria-selected="false">Akomondasi</button>
                </li>
                <li role="presentation">
                    <button
                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="contacts-tab" data-tabs-target="#contacts" type="button" role="tab"
                        aria-controls="contacts" aria-selected="false">Kontak </button>
                </li>

            </ul>
        </div>
        <div id="default-tab-content">
            <div class="hidden p-4 rounded-lg " id="gallery" role="tabpanel" aria-labelledby="gallery-tab">
                <div class="">
                    <div class="text-center text-black dark:text-white-dahsboard">
                        <h2>Galeri</h2>
                    </div>

                    <div class="mb-4">
                        <button data-modal-target="crud-modal-4" data-modal-toggle="crud-modal-4"
                            class="bg-deep-koamaru-600 py-2
                            px-4 text-white rounded-md">Tambah
                            Galeri</button>
                    </div>

                    {{-- Form Galeri --}}
                    @foreach ( $destination->galleries as $gallery )
                    <div class="border-b-2 border-stone-200 py-2">
                        <div class="flex justify-between items-center ">
                            <div class="w-40 object-contain rounded-md overflow-hidden">
                                <img src={{ asset('storage/'. $gallery->image_url) }} alt="">
                            </div>
                            <div class="">
                                <form action="{{ route(auth()->user()->role . '.gallery.destroy', [$gallery->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="bg-danger py-2  px-4 text-white rounded-md ">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <!-- Main modal -->
                    <div id="crud-modal-4" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div
                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        Tambah Galeri
                                    </h3>
                                    <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
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
                                <form action="{{ route(auth()->user()->role . '.gallery.store') }}" enctype="multipart/form-data" method="POST" class="p-4 md:p-5">
                                    @csrf
                                    <div class="bg-white dark:bg-black  px-6 py-6 rounded-lg mb-6">
                                        <label for="galleries"
                                            class="block mb-2 text-sm text-black dark:text-white font-medium">
                                            Masukan Foto <span class="text-red-500">*</span>
                                        </label>
                                        <p class="text-red-500 font-medium text-xs">* Menambahkan foto bisa lebih dari
                                            satu</p>
                                        <p class="text-red-500 font-medium text-xs">* Pastikan file bertipe jpeg, jpg,
                                            png</p>
                                        <p class="text-red-500 font-medium text-xs">* Maksimal file 1MB</p>
                                        <input type="file" required multiple accept="image/*" name="galleries[]"
                                            id="galleries" class="mt-3">
                                            <input type="hidden" name="destination_id" value="{{ $destination->id }}">
                                        <x-partials.dashboard.input-error :messages="$errors->get('galleries.*')" />
                                    </div>
                                    <div class="text-center pb-4 ">

                                        <button type="submit"
                                            class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
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


            <div class="hidden p-4 rounded-lg " id="profile" role="tabpanel" aria-labelledby="profile-tab">
                {{-- Jadwal operasional --}}
                <div class=" mb-6 ">
                    <div class="">
                        <div class="text-center text-black dark:text-white">
                            <h2>Jadwal Operasional</h2>
                        </div>

                        {{-- Form Jadwal --}}
                        <form action="{{ route(strtolower(auth()->user()->role) . '.openingHour.update', [$destination->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            {{-- <input type="hidden" name="destination_id" value="{{ $destination->id }}"> --}}
    <div>
        <div class="w-full mb-6">
            <label for="opening_hours-first_day"
                class="block mb-3 text-sm font-medium text-black dark:text-white">
                Hari Awal <span class="text-red-500">*</span>
            </label>
            <div x-data="{ isOptionSelected: false }"
                class="relative z-20 bg-transparent dark:bg-form-input">
                <select id="opening_hours-first_day" name="opening_hours[first_day]"
                    class="relative z-20 w-full px-5 py-3 transition bg-transparent bg-white border border-black rounded outline-none appearance-none days focus:border-primary active:border-primary dark:bg-black-dashboard dark:border-form-strokedark dark:focus:border-primary"
                    :class="isOptionSelected && 'text-black dark:text-white'"
                    @change="isOptionSelected = true">
                    <option value="" hidden class="dark:text-gray-300">
                        Hari Operasional
                    </option>
                    <option value="senin" class="dark:text-gray-300"
                        {{ $destination->openingHours->first()->day == 'senin' ? 'selected' : '' }}>
                        Senin
                    </option>
                    <option value="selasa" class="dark:text-gray-300"
                        {{ $destination->openingHours->first()->day == 'selasa' ? 'selected' : '' }}>
                        Selasa
                    </option>
                    <option value="rabu" class="dark:text-gray-300"
                        {{ $destination->openingHours->first()->day == 'rabu' ? 'selected' : '' }}>
                        Rabu
                    </option>
                    <option value="kamis" class="dark:text-gray-300"
                        {{ $destination->openingHours->first()->day == 'kamis' ? 'selected' : '' }}>
                        Kamis
                    </option>
                    <option value="jumat" class="dark:text-gray-300"
                        {{ $destination->openingHours->first()->day == 'jumat' ? 'selected' : '' }}>
                        Jumat
                    </option>
                    <option value="sabtu" class="dark:text-gray-300"
                        {{ $destination->openingHours->first()->day == 'sabtu' ? 'selected' : '' }}>
                        Sabtu
                    </option>
                    <option value="minggu" class="dark:text-gray-300"
                        {{ $destination->openingHours->first()->day == 'minggu' ? 'selected' : '' }}>
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
                <select id="opening_hours-last_day" name="opening_hours[last_day]"
                    class="relative z-20 w-full px-5 py-3 transition bg-transparent bg-white border border-black rounded outline-none appearance-none days focus:border-primary active:border-primary dark:bg-black-dashboard dark:border-form-strokedark dark:focus:border-primary"
                    :class="isOptionSelected && 'text-black dark:text-white'"
                    @change="isOptionSelected = true">
                    <option value="" hidden class="dark:text-gray-300">
                        Hari Operasional
                    </option>
                    <option value="senin" class="dark:text-gray-300"
                        {{ $destination->openingHours->last()->day == 'senin' ? 'selected' : '' }}>
                        Senin
                    </option>
                    <option value="selasa" class="dark:text-gray-300"
                        {{ $destination->openingHours->last()->day == 'selasa' ? 'selected' : '' }}>
                        Selasa
                    </option>
                    <option value="rabu" class="dark:text-gray-300"
                        {{ $destination->openingHours->last()->day == 'rabu' ? 'selected' : '' }}>
                        Rabu
                    </option>
                    <option value="kamis" class="dark:text-gray-300"
                        {{ $destination->openingHours->last()->day == 'kamis' ? 'selected' : '' }}>
                        Kamis
                    </option>
                    <option value="jumat" class="dark:text-gray-300"
                        {{ $destination->openingHours->last()->day == 'jumat' ? 'selected' : '' }}>
                        Jumat
                    </option>
                    <option value="sabtu" class="dark:text-gray-300"
                        {{ $destination->openingHours->last()->day == 'sabtu' ? 'selected' : '' }}>
                        Sabtu
                    </option>
                    <option value="minggu" class="dark:text-gray-300"
                        {{ $destination->openingHours->last()->day == 'minggu' ? 'selected' : '' }}>
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
                type="time" name="opening_hours[open]"
                value="{{ date('H:i', strtotime($destination->openingHours->first()->open))  }}">
        </div>
        <div>
            <label for="opening_hours-close"
                class="block mb-3 text-sm font-medium text-black dark:text-white">
                Jam Tutup
            </label>
            <input required id="opening_hours-close"
                class="rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                type="time" name="opening_hours[close]"
                value="{{ date('H:i', strtotime($destination->openingHours->first()->close)) }}">
        </div>

        <x-partials.dashboard.input-error :messages="$errors->get('opening_hours-open')" />
        <x-partials.dashboard.input-error :messages="$errors->get('opening_hours-close')" />
    </div>

    <div>
        <button type="submit"
            class="w-full rounded bg-deep-koamaru-600 p-3 font-medium text-white hover:bg-opacity-90">Ubah</button>
    </div>
</form>
                        {{-- End --}}
                    </div>
                </div>
            </div>





            <div class="hidden p-4 rounded-lg " id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">

                {{-- Form Fasilitas --}}
                <div class="">
                    <div class="mb-6 text-center text-black dark:text-white">
                        <h2>Fasilitas</h2>
                    </div>
                    @foreach ( $destination->facilities as $facility)
                    <div class="mb-6 flex gap-3 ">
                        <div class="w-full ">
                            <input id="facilities.1"
                                class="w-full  rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                                type="text" value="{{ $facility->name }}">
                            <x-partials.dashboard.input-error :messages="$errors->get('facilities.1')" />
                        </div>


                        {{-- Delete --}}
                        <form action="{{ route(auth()->user()->role .'.facility.destroy', [$facility->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button
                                class="px-6 py-3 text-white transition-colors duration-300 ease-in-out rounded shadow-md bg-danger hover:bg-danger-dark focus:outline-none focus:ring-2 focus:ring-danger">Hapus</button>
                        </form>
                    </div>
                    @endforeach

                    <!-- Modal toggle -->
                    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button">
                        Tambah
                    </button>

                    <!-- Main modal -->
                    <div id="crud-modal" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div
                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        Tambah Fasilitas
                                    </h3>
                                    <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-toggle="crud-modal">
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
                                <form action="{{ route(auth()->user()->role . '.facility.store') }}" method="POST" class="p-4 md:p-5">
                                    @csrf
                                    <div class="mb-4 px-3">
                                        <label for="contact_details.social_media"
                                            class="block mb-3 text-sm font-medium text-black dark:text-white">
                                            Fasilitas
                                        </label>
                                        <input id="facilities"
                                            class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal dark:bg-black text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:text-white dark:focus:border-primary"
                                            value="{{ old('name_facility') }}" type="text"
                                            name="name_facility" placeholder="Masukkan Fasilitas">
                                            <input type="hidden" name="destination_id" value="{{ $destination->id }}" >
                                        <x-partials.dashboard.input-error :messages="$errors->get('facilities')" />
                                    </div>
                                    <div class="text-center pb-4 ">
                                        <button type="submit"
                                            class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
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
                {{-- End --}}
            </div>
            <div class="hidden p-4 rounded-lg " id="settings" role="tabpanel" aria-labelledby="settings-tab">

                {{-- Form Akomondasi --}}
                    <div class="mb-6 text-center text-black dark:text-white">
                        <h2>Akomondasi</h2>
                    </div>
                    @foreach ( $destination->accommodations as $accommodation )
                    <div class="mb-6 flex gap-3 ">
                        <div class="w-full ">
                            <input id="accommodations"
                                class="w-full  rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                                type="text" value="{{ $accommodation->name }}"
                                autocomplete="accommodations" name="name_accommodation"
                                placeholder="Masukkan Akomondasi ke ">
                            <x-partials.dashboard.input-error :messages="$errors->get('accommodations')" />
                        </div>


                        {{-- Delete --}}
                         <form action="{{ route(auth()->user()->role .'.accommodation.destroy', [$accommodation->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button
                                class="px-6 py-3 text-white transition-colors duration-300 ease-in-out rounded shadow-md bg-danger hover:bg-danger-dark focus:outline-none focus:ring-2 focus:ring-danger">Hapus</button>
                        </form>
                    </div>
                    @endforeach
                    <!-- Modal toggle -->
                    <button data-modal-target="crud-modal-2" data-modal-toggle="crud-modal-2"
                        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button">
                        Tambah
                    </button>

                    <!-- Main modal -->
                    <div id="crud-modal-2" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div
                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        Tambah Akomondasi
                                    </h3>
                                    <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-toggle="crud-modal-2">
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
                                <form action="{{ route(auth()->user()->role . '.accommodation.store') }}" method="POST" class="p-4 md:p-5">
                                    @csrf
                                    <div class="mb-4 px-3">
                                        <label for="accommodation"
                                            class="block mb-3 text-sm font-medium text-black dark:text-white">
                                            Akomondasi

                                        </label>
                                        <input id="accommodation"
                                            class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal dark:bg-black text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:text-white dark:focus:border-primary"
                                            value="{{ old('name_accommodation') }}" type="text"
                                            name="name_accommodation" placeholder="Masukkan Akomondasi">
                                            <input type="hidden" name="destination_id" value="{{ $destination->id }}" >
                                        <x-partials.dashboard.input-error :messages="$errors->get('accommodation')" />
                                    </div>
                                    <div class="text-center pb-4 ">

                                        <button type="submit"
                                            class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
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
            <div class="hidden p-4 rounded-lg " id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
                <div class="">
                    <div class="text-center text-black dark:text-white-dahsboard">
                        <h2>Personal Kontak</h2>
                    </div>

                    {{-- Form Kontak --}}
                    <form action="{{ route(auth()->user()->role . '.contact.update', [$destination->contactDetails->id]) }}"  method="POST">
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
                                    value="{{ $destination->contactDetails->phone }}" type="number"
                                    name="phone" placeholder="Masukkan Telepon">
                                <x-partials.dashboard.input-error :messages="$errors->get('contact_details.phone')" />
                                <button id="delete-phone" type="button"
                                    class="px-6 py-3 text-white transition-colors duration-300 ease-in-out rounded shadow-md bg-danger hover:bg-danger-dark focus:outline-none focus:ring-2 focus:ring-danger">Hapus</button>

                            </div>
                        </div>

                        <div class="mb-6">
                            <label for="contact_details.email"
                                class="block mb-3 text-sm font-medium text-black dark:text-white">
                                Email
                            </label>

                            <div class="flex gap-4">

                                <input id="contact_details.email"
                                    class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal dark:bg-black text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:text-white dark:focus:border-primary"
                                    value="{{ $destination->contactDetails->email }}" type="email"
                                    name="email" placeholder="Masukkan Email">
                                <x-partials.dashboard.input-error :messages="$errors->get('contact_details.email')" />
                                <button id="delete-email" type="button"
                                    class="px-6 py-3 text-white transition-colors duration-300 ease-in-out rounded shadow-md bg-danger hover:bg-danger-dark focus:outline-none focus:ring-2 focus:ring-danger">Hapus</button>

                            </div>
                        </div>

                        <div class="mb-6">
                            <label for="contact_details.social_media"
                                class="block mb-3 text-sm font-medium text-black dark:text-white">
                                Sosial Media

                            </label>
                            <div class="flex gap-4">

                                <input id="contact_details.social_media"
                                    class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal dark:bg-black text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:text-white dark:focus:border-primary"
                                    value="{{ $destination->contactDetails->social_media }}" type="text"
                                    name="social_media" placeholder="Masukkan URL">
                                <x-partials.dashboard.input-error :messages="$errors->get('contact_details.social_media')" />
                                <button id="delete-social-media" type="button"
                                    class="px-6 py-3 text-white transition-colors duration-300 ease-in-out rounded shadow-md bg-danger hover:bg-danger-dark focus:outline-none focus:ring-2 focus:ring-danger">Hapus</button>

                            </div>
                        </div>

                        <div class="">

                            <button type="submit"
                                class="w-full rounded bg-deep-koamaru-600 p-3 font-medium text-white hover:bg-opacity-90">Ubah</button>
                        </div>

                    </form>
                    {{-- End --}}
                </div>
            </div>
        </div>
    </div>

    {{-- END --}}


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const phone = document.getElementById('contact_details.phone').value;
            const email = document.getElementById('contact_details.email').value;
            const socialMedia = document.getElementById('contact_details.social_media').value;

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
