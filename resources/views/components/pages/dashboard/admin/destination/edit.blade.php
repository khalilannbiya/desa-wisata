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
            <div class="flex justify-between">
                <div class="">

                    <h1 class="text-black-dashboard dark:text-white-dahsboard font-bold text-xl mb-6"> Tambah Tempat
                        Wisata
                    </h1>
                </div>
            </div>
            <div class="bg-white dark:bg-black shadow-lg px-6 py-6 rounded-lg mb-6">
                <label for="galleries" class="block mb-2 text-sm text-black dark:text-white font-medium">
                    Masukan Foto <span class="text-red-500">*</span>
                </label>
                <p class="text-red-500 font-medium text-xs">* Menambahkan foto bisa lebih dari satu</p>
                <p class="text-red-500 font-medium text-xs">* Pastikan file bertipe jpeg, jpg, png</p>
                <p class="text-red-500 font-medium text-xs">* Maksimal file 1MB</p>
                <input type="file" required multiple accept="image/*" name="galleries[]" id="galleries"
                    class="mt-3">
                <x-partials.dashboard.input-error :messages="$errors->get('galleries.*')" />
            </div>

            <div class="bg-white dark:bg-black shadow-lg px-6 py-6 rounded-lg mb-6">
                <div class="w-full mb-6">
                    <label for="name_destination" class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Nama Wisata <span class="text-red-500">*</span>
                    </label>
                    <input required id="name_destination" name="name_destination" autofocus
                        autocomplete="name_destination" value="{{ old('name_destination') }}" type="text"
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
                            <option value="active" class="text-body" {{ old('status') == 'active' ? 'selected' : '' }}>
                                Aktif</option>
                            <option value="inactive" class="text-body"
                                {{ old('status') == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
                        <x-partials.dashboard.input-error :messages="$errors->get('status')" />
                    </div>
                </div>

                <div class="w-full mb-6 ">
                    <label for="location" class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Lokasi Tempat Wisata <span class="text-red-500">*</span>
                    </label>
                    <input name="location" id="location" value="{{ old('location') }}" autocomplete="location" required
                        type="text" placeholder="Lokasi Tempat Wisata"
                        class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                    <x-partials.dashboard.input-error :messages="$errors->get('location')" />
                </div>

                <div class="w-full mb-6 ">
                    <label for="price_range" class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Harga Tempat Wisata <span class="text-red-500">*</span>
                    </label>
                    <p class="text-red-500 font-medium text-xs">* Jika gratis/free masukan nilai 0</p>
                    <input id="price_range" value="{{ old('price_range') }}" required name="price_range" type="number"
                        placeholder="Harga Tempat Wisata"
                        class="w-full mt-3 rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                </div>

                <div class="mb-6">
                    <label for="description" class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Deskripsi <span class="text-red-500">*</span>
                    </label>
                    <textarea id="description" required name="description" rows="6" placeholder="Deskripsi Tempat Wisata"
                        class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary">{{ old('description') }}</textarea>
                    <x-partials.dashboard.input-error :messages="$errors->get('description')" />
                </div>
            </div>

            <div class="grid  gap-4 mb-6 ">
                <div class="bg-white dark:bg-black shadow-lg px-6 py-6 rounded-lg">
                    <div class="text-center text-black dark:text-white">
                        <h2>Jadwal Operasional</h2>
                    </div>

                    {{-- Jadwal operasional --}}
                    <section>
                        <div>
                            <div class="w-full mb-6">
                                <label for="opening_hours-1-day"
                                    class="block mb-3 text-sm font-medium text-black dark:text-white">
                                    Hari Awal <span class="text-red-500">*</span>
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
                            <div class="w-full mb-6">
                                <label for="opening_hours-1-day"
                                    class="block mb-3 text-sm font-medium text-black dark:text-white">
                                    Hari Akhir <span class="text-red-500">*</span>
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



                    </section>
                </div>

                <div class="px-6 py-6 mb-6 bg-white rounded-lg shadow-lg dark:bg-black">
                    <div class="text-center text-black dark:text-white-dahsboard">
                        <h2>Personal Kontak</h2>
                    </div>

                    <div>
                        <div class="w-full my-6">
                            <x-partials.dashboard.input-error :messages="$errors->get('contact_details.1.type')" />
                        </div>

                        <div class="mb-6">
                            <label for="contact_details.1.value"
                                class="block mb-3 text-sm font-medium text-black dark:text-white">
                                Telepon <span class="text-red-500">*</span>
                            </label>
                            <input id="contact_details.1.value"
                                class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal dark:bg-black text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:text-white dark:focus:border-primary"
                                value="{{ old('contact_details.1.value') }}" type="text"
                                name="contact_details[1][value]" placeholder="Masukkan Telepon">
                            <x-partials.dashboard.input-error :messages="$errors->get('contact_details.1.value')" />
                        </div>
                        <div class="mb-6">
                            <label for="contact_details.1.value"
                                class="block mb-3 text-sm font-medium text-black dark:text-white">
                                Email <span class="text-red-500">*</span>
                            </label>
                            <input id="contact_details.1.value"
                                class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal dark:bg-black text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:text-white dark:focus:border-primary"
                                value="{{ old('contact_details.1.value') }}" type="text"
                                name="contact_details[1][value]" placeholder="Masukkan Email">
                            <x-partials.dashboard.input-error :messages="$errors->get('contact_details.1.value')" />
                        </div>
                        <div class="mb-6">
                            <label for="contact_details.1.value"
                                class="block mb-3 text-sm font-medium text-black dark:text-white">
                                Sosial Media
                                <span class="text-red-500">*</span>
                            </label>
                            <input id="contact_details.1.value"
                                class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal dark:bg-black text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:text-white dark:focus:border-primary"
                                value="{{ old('contact_details.1.value') }}" type="text"
                                name="contact_details[1][value]" placeholder="Masukkan URL">
                            <x-partials.dashboard.input-error :messages="$errors->get('contact_details.1.value')" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid sm:grid-cols-2 gap-4 mb-6">
                <div class="bg-white dark:bg-black shadow-lg px-6 py-6 rounded-lg">
                    <div class="text-center mb-6 text-black dark:text-white">
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
                            class="rounded bg-primary py-3 px-6 text-white shadow-md hover:bg-primary-dark transition-colors duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-primary">
                            Tambah Fasilitas </button>
                    </div>
                </div>

                <div class="bg-white dark:bg-black shadow-lg px-6 py-6 rounded-lg">
                    <div class="text-center mb-6 text-black dark:text-white">
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
                            class="rounded bg-primary py-3 px-6 text-white shadow-md hover:bg-primary-dark transition-colors duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-primary">
                            Tambah Akomondasi </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Gallery 1 --}}
        {{-- Start --}}



        <div id="controls-carousel" class="relative w-full mb-10" data-carousel="static">
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">

                @for ($i = 1; $i <= 5; $i++)
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('assets/img/dummy-vilage.jpg') }}"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="...">
                        <div class="">
                            <button type="button" data-confirm-delete="true"
                                class="absolute bg-danger  py-4   text-white shadow-md bottom-0 left-0 right-0 ">
                                Hapus
                            </button>
                        </div>
                    </div>
                @endfor

            </div>
            <!-- Slider controls -->
            <button type="button"
                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button"
                class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>


        {{-- END --}}


        <button type="submit"
            class="flex w-full justify-center rounded bg-deep-koamaru-600 p-3 font-medium text-white hover:bg-opacity-90">
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
