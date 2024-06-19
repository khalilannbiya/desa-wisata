<x-layouts.dashboard>

    {{-- Breadcrumb --}}
    <nav class="mb-5">
        <ol class="flex items-center gap-2">
            <li>
                <a class="font-medium" href="{{ route(auth()->user()->role . '.dashboard') }}">Dashboard /</a>
            </li>
            <li>
                <a class="font-medium" href="{{ route(auth()->user()->role . '.destinations.index') }}">Data Wisata
                    /</a>
            </li>
            <li class="font-medium text-primary">Tambah Wisata</li>
        </ol>
    </nav>

    <form action="{{ route(strtolower(auth()->user()->role) . '.destinations.store') }}" enctype="multipart/form-data"
        method="POST">
        @csrf

        <div class="form-1">
            <div class="">
                <h1 class="mb-6 text-xl font-bold text-black-dashboard dark:text-white-dahsboard"> Tambah Tempat Wisata
                </h1>
            </div>
            <div class="px-6 py-6 mb-6 bg-white rounded-lg shadow-lg dark:bg-black">
                <label for="galleries" class="block mb-2 text-sm font-medium text-black dark:text-white">
                    Masukan Foto <span class="text-red-500">*</span>
                </label>
                <p class="text-xs font-medium text-red-500">* Menambahkan foto bisa lebih dari satu</p>
                <p class="text-xs font-medium text-red-500">* Pastikan file bertipe jpeg, jpg, png</p>
                <p class="text-xs font-medium text-red-500">* Maksimal file 1MB</p>
                <div id="imagePreviewContainer" class="flex flex-wrap gap-5 mt-3"></div>
                <input type="file" required multiple accept="image/*" name="galleries[]" id="galleries"
                    class="mt-3">
                <x-partials.dashboard.input-error :messages="$errors->get('galleries.*')" />
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
                                        {{ old('owner') == $owner->id ? 'selected' : '' }}>
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
                        autocomplete="name_destination" value="{{ old('name_destination') }}" type="text"
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
                            <option value="active" class="text-body" {{ old('status') == 'active' ? 'selected' : '' }}>
                                Aktif</option>
                            <option value="inactive" class="text-body"
                                {{ old('status') == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
                        <x-partials.dashboard.input-error :messages="$errors->get('status')" />
                    </div>
                </div>

                <div class="w-full mb-6 ">
                    <label for="location" class="block mb-3 text-sm font-medium text-black dark:text-white">
                        Lokasi Tempat Wisata <span class="text-red-500">*</span>
                    </label>
                    <input name="location" id="location" value="{{ old('location') }}" autocomplete="location" required
                        type="text" placeholder="Lokasi Tempat Wisata"
                        class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                    <x-partials.dashboard.input-error :messages="$errors->get('location')" />
                </div>

                <div class="w-full mb-6 ">
                    <label for="price_range" class="block mb-3 text-sm font-medium text-black dark:text-white">
                        Harga Tempat Wisata <span class="text-red-500">*</span>
                    </label>
                    <p class="text-xs font-medium text-red-500">* Jika gratis/free masukan nilai 0</p>
                    <input id="price_range" value="{{ old('price_range') }}" required name="price_range" type="number"
                        placeholder="Harga Tempat Wisata"
                        class="w-full mt-3 rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                </div>

                <div class="mb-6">
                    <label for="description" class="block mb-3 text-sm font-medium text-black dark:text-white">
                        Deskripsi <span class="text-red-500">*</span>
                    </label>
                    <textarea id="description" required name="description" rows="6" placeholder="Deskripsi Tempat Wisata"
                        class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary">{{ old('description') }}</textarea>
                    <x-partials.dashboard.input-error :messages="$errors->get('description')" />
                </div>
            </div>

            <div class="grid gap-4 mb-6 sm:grid-cols-2 ">
                <div class="px-6 py-6 bg-white rounded-lg shadow-lg dark:bg-black">
                    <div class="text-center text-black dark:text-white">
                        <h2>Jadwal Operasional</h2>
                    </div>

                    {{-- Jadwal operasional --}}
                    <section>
                        <div>
                            <div class="w-full mb-6">
                                <label for="opening_hours-1-day"
                                    class="block mb-3 text-sm font-medium text-black dark:text-white">
                                    Hari <span class="text-red-500">*</span>
                                </label>
                                <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent dark:bg-form-input">
                                    <select id="opening_hours-1-day" name="opening_hours[1][day]"
                                        class="relative z-20 w-full px-5 py-3 transition bg-transparent bg-white border border-black rounded outline-none appearance-none days focus:border-primary active:border-primary dark:bg-black-dashboard dark:border-form-strokedark dark:focus:border-primary"
                                        :class="isOptionSelected && 'text-black dark:text-white'"
                                        @change="isOptionSelected = true">
                                        <option value="" hidden class="dark:text-gray-300">
                                            Hari Operasional
                                        </option>
                                        <option value="senin" class="dark:text-gray-300"
                                            {{ old('opening_hours.1.day') == 'senin' ? 'selected' : '' }}>Senin
                                        </option>
                                        <option value="selasa" class="dark:text-gray-300"
                                            {{ old('opening_hours.1.day') == 'selasa' ? 'selected' : '' }}>Selasa
                                        </option>
                                        <option value="rabu" class="dark:text-gray-300"
                                            {{ old('opening_hours.1.day') == 'rabu' ? 'selected' : '' }}>Rabu</option>
                                        <option value="kamis" class="dark:text-gray-300"
                                            {{ old('opening_hours.1.day') == 'kamis' ? 'selected' : '' }}>Kamis
                                        </option>
                                        <option value="jumat" class="dark:text-gray-300"
                                            {{ old('opening_hours.1.day') == 'jumat' ? 'selected' : '' }}>Jumat
                                        </option>
                                        <option value="sabtu" class="dark:text-gray-300"
                                            {{ old('opening_hours.1.day') == 'sabtu' ? 'selected' : '' }}>Sabtu
                                        </option>
                                        <option value="minggu" class="dark:text-gray-300"
                                            {{ old('opening_hours.1.day') == 'minggu' ? 'selected' : '' }}>Minggu
                                        </option>
                                    </select>
                                </div>
                                <x-partials.dashboard.input-error :messages="$errors->get('opening_hours.1.day')" />
                            </div>

                            <div class="mb-6">
                                <div class="flex items-center gap-2">
                                    <label for="opening_hours-1-is_closed"
                                        class="block text-sm font-medium text-black dark:text-white">
                                        Tutup
                                        <input id="opening_hours-1-is_closed" type="checkbox" class="close"
                                            data-target="time-close-1" name="opening_hours[1][is_closed]"
                                            value="1" {{ old('opening_hours.1.is_closed') ? 'checked' : '' }}>
                                    </label>
                                </div>
                                <x-partials.dashboard.input-error :messages="$errors->get('opening_hours.1.is_closed')" />
                            </div>


                            <div id="time-close-1" class="flex gap-4 mb-6">
                                <div>
                                    <label for="opening_hours-1-open"
                                        class="block mb-3 text-sm font-medium text-black dark:text-white">
                                        Jam Buka
                                    </label>
                                    <input required id="opening_hours-1-open"
                                        class="rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                                        type="time" name="opening_hours[1][open]"
                                        value="{{ old('opening_hours.1.open', '00:00') }}">
                                </div>
                                <div>
                                    <label for="opening_hours-1-close"
                                        class="block mb-3 text-sm font-medium text-black dark:text-white">
                                        Jam Tutup
                                    </label>
                                    <input required id="opening_hours-1-close"
                                        class="rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                                        type="time" name="opening_hours[1][close]"
                                        value="{{ old('opening_hours.1.close', '00:00') }}">
                                </div>

                                <x-partials.dashboard.input-error :messages="$errors->get('opening_hours-1-open')" />
                                <x-partials.dashboard.input-error :messages="$errors->get('opening_hours-1-close')" />
                            </div>
                        </div>

                        <div id="newTimeRow" class="mt-6">
                            <!-- Tempat untuk menampilkan hasil jadwal operasional -->
                        </div>


                        <div class="flex gap-4">
                            <button type="button" id="addTimeRowButton"
                                class="px-6 py-3 text-white transition-colors duration-300 ease-in-out rounded shadow-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary">
                                Tambah Jadwal
                            </button>

                            <button type="button" id="tombolHapusJadwal"
                                class="hidden px-6 py-3 text-white transition-colors duration-300 ease-in-out rounded shadow-md bg-danger hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary">Hapus
                                Jadwal
                            </button>
                        </div>
                    </section>
                </div>

                <div class="px-6 py-6 bg-white rounded-lg shadow-lg dark:bg-black">
                    <div class="text-center text-black dark:text-white-dahsboard">
                        <h2>Personal Kontak</h2>
                    </div>

                    <div>
                        <div class="w-full my-6">
                            <label for="contact_details.1.type"
                                class="block mb-3 text-sm font-medium text-black dark:text-white">
                                Akun Media Sosial <span class="text-red-500">*</span>
                            </label>
                            <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent dark:bg-form-input">
                                <select id="contact_details.1.type" name="contact_details[1][type]"
                                    class="relative z-20 w-full px-5 py-3 transition bg-transparent border border-black rounded outline-none appearance-none dark:bg-black-dashboard focus:border-primary active:border-primary dark:border-form-strokedark dark:focus:border-primary"
                                    :class="isOptionSelected && 'text-black dark:text-white'"
                                    @change="isOptionSelected = true">
                                    <option value="" hidden class="dark:text-gray-300">
                                        Personal Kontak
                                    </option>
                                    <option value="phone" class="dark:text-gray-300"
                                        {{ old('contact_details.1.type') == 'phone' ? 'selected' : '' }}>
                                        Phone
                                    </option>
                                    <option value="email" class="dark:text-gray-300"
                                        {{ old('contact_details.1.type') == 'email' ? 'selected' : '' }}>
                                        Email
                                    </option>
                                    <option value="fax" class="dark:text-gray-300"
                                        {{ old('contact_details.1.type') == 'fax' ? 'selected' : '' }}>
                                        Fax
                                    </option>
                                    <option value="social_media" class="dark:text-gray-300"
                                        {{ old('contact_details.1.type') == 'social_media' ? 'selected' : '' }}>
                                        Sosial Media
                                    </option>
                                </select>
                            </div>
                            <x-partials.dashboard.input-error :messages="$errors->get('contact_details.1.type')" />
                        </div>

                        <div class="mb-6">
                            <label for="contact_details.1.value"
                                class="block mb-3 text-sm font-medium text-black dark:text-white">
                                Identitas akun <span class="text-red-500">*</span>
                            </label>
                            <input id="contact_details.1.value"
                                class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal dark:bg-black text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:text-white dark:focus:border-primary"
                                value="{{ old('contact_details.1.value') }}" type="text"
                                name="contact_details[1][value]" placeholder="Masukkan Identitas| Ex: @example">
                            <x-partials.dashboard.input-error :messages="$errors->get('contact_details.1.value')" />
                        </div>
                    </div>

                    <div id="newContactDetailRow" class="mt-6"></div>

                    <div class="">
                        <button type="button" id="addContactDetailRowButton"
                            class="px-6 py-3 text-white transition-colors duration-300 ease-in-out rounded shadow-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary">
                            Tambah Kontak </button>
                    </div>
                </div>
            </div>

            <div class="grid gap-4 mb-6 sm:grid-cols-2">
                <div class="px-6 py-6 bg-white rounded-lg shadow-lg dark:bg-black">
                    <div class="mb-6 text-center text-black dark:text-white">
                        <h2>Fasilitas</h2>
                    </div>

                    <div class="mb-6">
                        <input id="facilities.1"
                            class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                            type="text" value="{{ old('facilities.1') }}" autocomplete="facilities[1]"
                            name="facilities[1]" placeholder="Masukkan Fasilitas ke 1">
                        <x-partials.dashboard.input-error :messages="$errors->get('facilities.1')" />
                    </div>

                    <div id="newFacilityRow" class="mt-6"></div>

                    <div class="">
                        <button type="button" id="addFacilityRowButton"
                            class="px-6 py-3 text-white transition-colors duration-300 ease-in-out rounded shadow-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary">
                            Tambah Fasilitas </button>
                    </div>
                </div>

                <div class="px-6 py-6 bg-white rounded-lg shadow-lg dark:bg-black">
                    <div class="mb-6 text-center text-black dark:text-white">
                        <h2>Akomondasi</h2>
                    </div>

                    <div class="mb-6">
                        <input id="accommodations.1"
                            class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                            type="text" autocomplete="accommodations[1]" value="{{ old('accommodations.1') }}"
                            name="accommodations[1]" placeholder="Masukkan Akomondasi ke 1">
                        <x-partials.dashboard.input-error :messages="$errors->get('accommodations.1')" />
                    </div>

                    <div id="newAccommodationRow" class="mt-6"></div>

                    <div class="">
                        <button type="button" id="addAccommodationRowButton"
                            class="px-6 py-3 text-white transition-colors duration-300 ease-in-out rounded shadow-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary">
                            Tambah Akomondasi </button>
                    </div>
                </div>
            </div>
        </div>

        <button type="submit"
            class="flex justify-center w-full p-3 font-medium text-white rounded bg-deep-koamaru-600 hover:bg-opacity-90">
            Kirim
        </button>
    </form>

    <script>
        document.getElementById('galleries').addEventListener('change', function(event) {
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
        const newTimeRow = document.getElementById("newTimeRow");
        const addTimeRowButton = document.getElementById("addTimeRowButton");

        const newContactDetailRow = document.getElementById("newContactDetailRow");
        const addContactDetailRowButton = document.getElementById("addContactDetailRowButton");

        const newFacilityRow = document.getElementById("newFacilityRow");
        const addFacilityRowButton = document.getElementById("addFacilityRowButton");

        const newAccommodationRow = document.getElementById("newAccommodationRow");
        const addAccommodationRowButton = document.getElementById("addAccommodationRowButton");


        let timeCount = 1;

        // Function to handle changes in 'Tutup' checkbox
        function handleCheckboxChange() {
            const buttonClose = document.querySelectorAll('.close');
            buttonClose.forEach(button => {
                button.addEventListener('change', function() {
                    const targetId = button.getAttribute('data-target');
                    const targetElement = document.getElementById(targetId);

                    if (button.checked) {
                        targetElement.classList.add('hidden');
                    } else {
                        targetElement.classList.remove('hidden');
                    }
                });
            });
        }

        // Initial call to set up event listeners for existing elements
        handleCheckboxChange();

        addTimeRowButton.addEventListener("click", () => {
            timeCount++;

            const html = `
        <div>
            <div class="my-3 border"></div>
            <div class="w-full mb-6">
                <label for="opening_hours-${timeCount}-day"
                    class="block mb-3 text-sm font-medium text-black dark:text-white">
                    Hari
                </label>
                <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent dark:bg-form-input">
                    <select id="opening_hours-${timeCount}-days" name="opening_hours[${timeCount}][day]"
                        class="relative z-20 w-full px-5 py-3 transition bg-transparent border border-black rounded outline-none appearance-none days focus:border-primary active:border-primary dark:border-form-strokedark dark:focus:border-primary"
                        :class="isOptionSelected && 'text-black dark:text-white'"
                        @change="isOptionSelected = true">
                        <option value="" hidden class="text-body">
                            Hari Operasional
                        </option>
                         <option value="senin" class="dark:text-gray-300" {{ old('opening_hours.1.day') == 'senin' ? 'selected' : '' }}>Senin</option>
                         <option value="selasa" class="dark:text-gray-300" {{ old('opening_hours.1.day') == 'selasa' ? 'selected' : '' }}>Selasa</option>
                         <option value="rabu" class="dark:text-gray-300" {{ old('opening_hours.1.day') == 'rabu' ? 'selected' : '' }}>Rabu</option>
                         <option value="kamis" class="dark:text-gray-300" {{ old('opening_hours.1.day') == 'kamis' ? 'selected' : '' }}>Kamis</option>
                         <option value="jumat" class="dark:text-gray-300" {{ old('opening_hours.1.day') == 'jumat' ? 'selected' : '' }}>Jumat</option>
                         <option value="sabtu" class="dark:text-gray-300" {{ old('opening_hours.1.day') == 'sabtu' ? 'selected' : '' }}>Sabtu</option>
                         <option value="minggu" class="dark:text-gray-300" {{ old('opening_hours.1.day') == 'minggu' ? 'selected' : '' }}>Minggu</option>
                    </select>
                </div>
                 <x-partials.dashboard.input-error :messages="$errors->get('opening_hours.${timeCount}.day')" />
            </div>

             <div class="mb-6">
                <div class="flex items-center gap-2">
                    <label for="opening_hours-${timeCount}-is_closed" class="block text-sm font-medium text-black dark:text-white">Tutup
                        <input id="opening_hours-${timeCount}-is_closed" type="checkbox" class="close" data-target="time-close-${timeCount}" value="1" name="opening_hours[${timeCount}][is_closed]"
                        {{ old('opening_hours.${timeCount}.is_closed') ? 'checked' : '' }}>
                         </label>
                         </div>
                         <x-partials.dashboard.input-error :messages="$errors->get('opening_hours.${timeCount}.is_closed')" />
            </div>

            <div id="time-close-${timeCount}" class="flex gap-4 mb-6">
               <div>
                <label for="opening_hours-${timeCount}-open" class="block mb-3 text-sm font-medium text-black dark:text-white"> Jam Buka
                </label>
                <input required id="opening_hours-${timeCount}-open" class="rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" type="time" name="opening_hours[${timeCount}][open]" value="{{ old('opening_hours.${timeCount}.open', '00:00') }}">
                </div>

                <div>
                    <label for="opening_hours-${timeCount}-close" class="block mb-3 text-sm font-medium text-black dark:text-white">Jam Tutup
                    </label>
                    <input required id="opening_hours-${timeCount}-close"
                    class="rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                    type="time" name="opening_hours[${timeCount}][close]"
                    value="{{ old('opening_hours.${timeCount}.close', '00:00') }}">
                </div>

                <x-partials.dashboard.input-error :messages="$errors->get('opening_hours-${timeCount}-open')" />
                <x-partials.dashboard.input-error :messages="$errors->get('opening_hours-${timeCount}-close')" />
            </div>
        </div>
    `;

            const newRow = document.createElement("div");
            newRow.innerHTML = html;
            newTimeRow.appendChild(newRow);

            // Call function to handle checkbox change for the newly added row
            handleCheckboxChange();
        });

        let detailContactCount = 1;

        addContactDetailRowButton.addEventListener("click", () => {
            detailContactCount++;

            const html = `
                <div>
                    <div class="my-3 border"></div>
                    <div class="w-full my-6">
                        <label for="contact_details.${detailContactCount}.type" class="block mb-3 text-sm font-medium text-black dark:text-white">
                            Akun Media Sosial
                        </label>
                        <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent dark:bg-form-input">
                            <select id="contact_details.${detailContactCount}.type" name="contact_details[${detailContactCount}][type]"
                            class="relative z-20 w-full px-5 py-3 transition bg-transparent border border-black rounded outline-none appearance-none dark:bg-black-dashboard focus:border-primary active:border-primary dark:border-form-strokedark dark:focus:border-primary"
                            :class="isOptionSelected && 'text-black dark:text-white'"
                            @change="isOptionSelected = true">
                            <option value="" hidden class="dark:text-gray-300">
                                Personal Kontak
                            </option>
                            <option value="phone" class="dark:text-gray-300"
                                {{ old('contact_details.${detailContactCount}.type') == 'phone' ? 'selected' : '' }}> Phone
                            </option>
                                    <option value="email" class="dark:text-gray-300"
                                        {{ old('contact_details.${detailContactCount}.type') == 'email' ? 'selected' : '' }}>
                                        Email
                                    </option>
                                    <option value="fax" class="dark:text-gray-300"
                                        {{ old('contact_details.${detailContactCount}.type') == 'fax' ? 'selected' : '' }}>
                                        Fax
                                    </option>
                                    <option value="social_media" class="dark:text-gray-300"
                                        {{ old('contact_details.${detailContactCount}.type') == 'social_media' ? 'selected' : '' }}>
                                        Sosial Media
                                    </option>
                                </select>
                            </div>
                            <x-partials.dashboard.input-error :messages="$errors->get('contact_details.${detailContactCount}.type')" />
                        </div>

                        <div class="mb-6">
                            <label for="contact_details.${detailContactCount}.value"
                                class="block mb-3 text-sm font-medium text-black dark:text-white">
                                Identitas akun
                            </label>
                            <input id="contact_details.${detailContactCount}.value"
                                class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal dark:bg-black text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:text-white dark:focus:border-primary"
                                value="{{ old('contact_details.${detailContactCount}.value') }}" type="text"
                                name="contact_details[${detailContactCount}][value]" placeholder="Masukkan Identitas| Ex: @example">
                            <x-partials.dashboard.input-error :messages="$errors->get('contact_details.${detailContactCount}.value')" />
                        </div>
                    </div>
            `;

            const newRow = document.createElement("div");
            newRow.innerHTML = html;
            newContactDetailRow.appendChild(newRow);
        });

        let facilityCount = 1;
        addFacilityRowButton.addEventListener('click', () => {
            facilityCount++;

            const html = `
                 <div class="mb-6">
                    <div class="my-5 border"></div>
                        <input id="facilities.${facilityCount}"
                            class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                            type="text" value="{{ old('facilities.${facilityCount}') }}" autocomplete="facilities[${facilityCount}]"
                            name="facilities[${facilityCount}]" placeholder="Masukkan Fasilitas ke ${facilityCount}">
                        <x-partials.dashboard.input-error :messages="$errors->get('facilities.${facilityCount}')" />
                    </div>
            `;

            const newRow = document.createElement("div");
            newRow.innerHTML = html;
            newFacilityRow.appendChild(newRow);
        });

        let accommodationCount = 1;

        addAccommodationRowButton.addEventListener('click', () => {
            accommodationCount++;

            const html = `
                  <div class="mb-6">
                    <div class="my-5 border"></div>
                        <input id="accommodations.${accommodationCount}"
                            class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                            type="text" autocomplete="accommodations[${accommodationCount}]" value="{{ old('accommodations.${accommodationCount}') }}"
                            name="accommodations[${accommodationCount}]" placeholder="Masukkan Akomondasi ke ${accommodationCount}">
                        <x-partials.dashboard.input-error :messages="$errors->get('accommodations.${accommodationCount}')" />
                    </div>
            `;

            const newRow = document.createElement("div");
            newRow.innerHTML = html;
            newAccommodationRow.appendChild(newRow);
        });
    </script>


</x-layouts.dashboard>
