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
                <p class="text-xs font-medium text-gray-400">* Menambahkan foto bisa lebih dari satu</p>
                <p class="text-xs font-medium text-gray-400">* Pastikan file bertipe jpeg, jpg, png</p>
                <p class="text-xs font-medium text-gray-400">* Maksimal file 1MB</p>
                <div id="imagePreviewContainer" class="flex flex-wrap gap-5 mt-3"></div>
                <input type="file" required multiple accept="image/*" name="galleries[]" id="galleries"
                    class="mt-3">
                <x-partials.dashboard.input-error :messages="$errors->get('galleries.')" />
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
                                Beroperasi</option>
                            <option value="inactive" class="text-body"
                                {{ old('status') == 'inactive' ? 'selected' : '' }}>Tidak Beroperasi</option>
                        </select>
                        <x-partials.dashboard.input-error :messages="$errors->get('status')" />
                    </div>
                </div>

                <div class="w-full mb-6 ">
                    <label for="location" class="block mb-1 text-sm font-medium text-black dark:text-white">
                        Lokasi Tempat Wisata <span class="text-red-500">*</span>
                    </label>
                    <p class="mb-3 text-xs font-medium text-gray-400">* Silahkan masukkan alamat lengkap</p>
                    <input name="location" id="location" value="{{ old('location') }}" autocomplete="location" required
                        type="text" placeholder="Lokasi Tempat Wisata"
                        class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                    <x-partials.dashboard.input-error :messages="$errors->get('location')" />
                </div>

                <div class="w-full mb-6 ">
                    <label for="gmaps_url" class="block mb-1 text-sm font-medium text-black dark:text-white">
                        Google Maps URL <span class="text-red-500">*</span>
                    </label>
                    <p class="mb-3 text-xs font-medium text-gray-400">* Silahkan masukkan URL/link google maps</p>
                    <input name="gmaps_url" id="gmaps_url" value="{{ old('gmaps_url') }}" autocomplete="gmaps_url"
                        required type="text" placeholder="Google Maps URL"
                        class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                    <x-partials.dashboard.input-error :messages="$errors->get('gmaps_url')" />
                </div>

                <div class="w-full mb-6 ">
                    <label for="price_range" class="block mb-3 text-sm font-medium text-black dark:text-white">
                        Harga Tempat Wisata <span class="text-red-500">*</span>
                    </label>
                    <p class="text-xs font-medium text-gray-400">* Jika gratis/free masukan nilai 0</p>
                    <input id="price_range" value="{{ old('price_range') }}" required name="price_range"
                        type="number" placeholder="Harga Tempat Wisata"
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

            {{-- Jadwal operasional --}}
            <div class="grid gap-4 mb-6 ">
                <div class="px-6 py-6 bg-white rounded-lg shadow-lg dark:bg-black">
                    <div class="text-center text-black dark:text-white">
                        <h2>Jadwal Operasional</h2>
                    </div>

                    <section>
                        <div>
                            <div class="w-full mb-6">
                                <label for="opening_hours-first_day"
                                    class="block mb-3 text-sm font-medium text-black dark:text-white">
                                    Hari Awal <span class="text-red-500">*</span>
                                </label>
                                <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent dark:bg-form-input">
                                    <select id="opening_hours-first_day" name="opening_hours[first_day]"
                                        class="relative z-20 w-full px-5 py-3 transition bg-transparent bg-white border border-black rounded outline-none appearance-none days focus:border-primary active:border-primary dark:bg-black-dashboard dark:border-form-strokedark dark:focus:border-primary"
                                        :class="isOptionSelected && 'text-black dark:text-white'"
                                        @change="isOptionSelected = true">
                                        <option value="" hidden class="dark:text-gray-300">
                                            Hari Operasional
                                        </option>
                                        <option value="senin" class="dark:text-gray-300"
                                            {{ old('opening_hours-first_day') == 'senin' ? 'selected' : '' }}>Senin
                                        </option>
                                        <option value="selasa" class="dark:text-gray-300"
                                            {{ old('opening_hours-first_day') == 'selasa' ? 'selected' : '' }}>Selasa
                                        </option>
                                        <option value="rabu" class="dark:text-gray-300"
                                            {{ old('opening_hours-first_day') == 'rabu' ? 'selected' : '' }}>Rabu
                                        </option>
                                        <option value="kamis" class="dark:text-gray-300"
                                            {{ old('opening_hours-first_day') == 'kamis' ? 'selected' : '' }}>Kamis
                                        </option>
                                        <option value="jumat" class="dark:text-gray-300"
                                            {{ old('opening_hours-first_day') == 'jumat' ? 'selected' : '' }}>Jumat
                                        </option>
                                        <option value="sabtu" class="dark:text-gray-300"
                                            {{ old('opening_hours-first_day') == 'sabtu' ? 'selected' : '' }}>Sabtu
                                        </option>
                                        <option value="minggu" class="dark:text-gray-300"
                                            {{ old('opening_hours-first_day') == 'minggu' ? 'selected' : '' }}>Minggu
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
                                <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent dark:bg-form-input">
                                    <select id="opening_hours-last_day" name="opening_hours[last_day]"
                                        class="relative z-20 w-full px-5 py-3 transition bg-transparent bg-white border border-black rounded outline-none appearance-none days focus:border-primary active:border-primary dark:bg-black-dashboard dark:border-form-strokedark dark:focus:border-primary"
                                        :class="isOptionSelected && 'text-black dark:text-white'"
                                        @change="isOptionSelected = true">
                                        <option value="" hidden class="dark:text-gray-300">
                                            Hari Operasional
                                        </option>
                                        <option value="senin" class="dark:text-gray-300"
                                            {{ old('opening_hours-last_day') == 'senin' ? 'selected' : '' }}>Senin
                                        </option>
                                        <option value="selasa" class="dark:text-gray-300"
                                            {{ old('opening_hours-last_day') == 'selasa' ? 'selected' : '' }}>Selasa
                                        </option>
                                        <option value="rabu" class="dark:text-gray-300"
                                            {{ old('opening_hours-last_day') == 'rabu' ? 'selected' : '' }}>Rabu
                                        </option>
                                        <option value="kamis" class="dark:text-gray-300"
                                            {{ old('opening_hours-last_day') == 'kamis' ? 'selected' : '' }}>Kamis
                                        </option>
                                        <option value="jumat" class="dark:text-gray-300"
                                            {{ old('opening_hours-last_day') == 'jumat' ? 'selected' : '' }}>Jumat
                                        </option>
                                        <option value="sabtu" class="dark:text-gray-300"
                                            {{ old('opening_hours-last_day') == 'sabtu' ? 'selected' : '' }}>Sabtu
                                        </option>
                                        <option value="minggu" class="dark:text-gray-300"
                                            {{ old('opening_hours-last_day') == 'minggu' ? 'selected' : '' }}>Minggu
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
                                    Jam Buka <span class="text-red-500">*</span>
                                </label>
                                <input required id="opening_hours-open"
                                    class="rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                                    type="time" name="opening_hours[open]"
                                    value="{{ old('opening_hours-open', '00:00') }}">
                            </div>
                            <div>
                                <label for="opening_hours-close"
                                    class="block mb-3 text-sm font-medium text-black dark:text-white">
                                    Jam Tutup <span class="text-red-500">*</span>
                                </label>
                                <input required id="opening_hours-close"
                                    class="rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                                    type="time" name="opening_hours[close]"
                                    value="{{ old('opening_hours.close', '00:00') }}">
                            </div>

                            <x-partials.dashboard.input-error :messages="$errors->get('opening_hours-open')" />
                            <x-partials.dashboard.input-error :messages="$errors->get('opening_hours-close')" />
                        </div>
                    </section>
                </div>
            </div>

            <div class="px-6 py-6 mb-6 bg-white rounded-lg shadow-lg dark:bg-black">
                <div class="text-center text-black dark:text-white-dahsboard">
                    <h2>Personal Kontak</h2>
                </div>

                <div>
                    <div class="mb-6">
                        <label for="contact_details.phone"
                            class="block mb-3 text-sm font-medium text-black dark:text-white">
                            Telepon
                        </label>
                        <input id="contact_details.phone"
                            class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal dark:bg-black text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:text-white dark:focus:border-primary"
                            value="{{ old('contact_details.phone') }}" type="number" name="contact_details[phone]"
                            placeholder="Masukkan Telepon">
                        <x-partials.dashboard.input-error :messages="$errors->get('contact_details.phone')" />
                    </div>

                    <div class="mb-6">
                        <label for="contact_details.email"
                            class="block mb-3 text-sm font-medium text-black dark:text-white">
                            Email
                        </label>
                        <input id="contact_details.email"
                            class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal dark:bg-black text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:text-white dark:focus:border-primary"
                            value="{{ old('contact_details.email') }}" type="email" name="contact_details[email]"
                            placeholder="Masukkan Email">
                        <x-partials.dashboard.input-error :messages="$errors->get('contact_details.email')" />
                    </div>

                    <div class="mb-6">
                        <label for="contact_details.social_media"
                            class="block mb-1 text-sm font-medium text-black dark:text-white">
                            Sosial Media
                        </label>
                        <p class="mb-3 text-xs font-medium text-gray-400">* Silahkan masukan URL media sosial</p>
                        <input id="contact_details.social_media"
                            class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal dark:bg-black text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:text-white dark:focus:border-primary"
                            value="{{ old('contact_details.social_media') }}" type="text"
                            name="contact_details[social_media]"
                            placeholder="Contoh: https://www.instagram.com/instagram">
                        <x-partials.dashboard.input-error :messages="$errors->get('contact_details.social_media')" />
                    </div>
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
                    <h2>Akomodasi</h2>
                </div>

                <div class="mb-6">
                    <input id="accommodations.1"
                        class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                        type="text" autocomplete="accommodations[1]" value="{{ old('accommodations.1') }}"
                        name="accommodations[1]" placeholder="Masukkan Akomodasi ke 1">
                    <x-partials.dashboard.input-error :messages="$errors->get('accommodations.1')" />
                </div>

                <div id="newAccommodationRow" class="mt-6"></div>

                <div class="">
                    <button type="button" id="addAccommodationRowButton"
                        class="px-6 py-3 text-white transition-colors duration-300 ease-in-out rounded shadow-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary">
                        Tambah Akomodasi </button>
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
                            name="accommodations[${accommodationCount}]" placeholder="Masukkan Akomodasi ke ${accommodationCount}">
                        <x-partials.dashboard.input-error :messages="$errors->get('accommodations.${accommodationCount}')" />
                    </div>
            `;

            const newRow = document.createElement("div");
            newRow.innerHTML = html;
            newAccommodationRow.appendChild(newRow);
        });
    </script>


</x-layouts.dashboard>
