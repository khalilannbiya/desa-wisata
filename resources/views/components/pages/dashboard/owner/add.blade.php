<x-layouts.dashboard>

    <form action="{{ route('posts') }}" method="POST">
        @csrf

        <div class="form-1">
            <div class="">
                <h1 class="text-black dark:text-white font-bold text-xl mb-6"> Tambah Tempat Wisata </h1>
            </div>
            <div class="bg-white dark:bg-form-input shadow-lg px-6 py-6 rounded-lg mb-6">
                <div class="w-full mb-6 ">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Nama Wisata
                    </label>
                    <input required name="name_destination" type="text" placeholder="Nama Tempat Wisata"
                        class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                </div>


                <div class="mb-4.5">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Status Tempat Wisata
                    </label>
                    <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent dark:bg-form-input">
                        <select required name="status"
                            class="relative z-20 w-full appearance-none rounded border border-black bg-transparent px-5 py-3 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                            :class="isOptionSelected && 'text-black dark:text-white'" @change="isOptionSelected = true">
                            <option value="" hidden class="text-body">
                                Pilih Status Tempat Wisata
                            </option>
                            <option value="active" class="text-body">Aktif</option>
                            <option value="inactive" class="text-body">Tidak Aktif</option>
                        </select>
                        <span class="absolute right-4 top-1/2 z-30 -translate-y-1/2">

                        </span>
                    </div>
                </div>

                <div class="w-full mb-6 ">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Lokasi Tempat Wisata
                    </label>
                    <input name="location" required type="text" placeholder="Lokasi Tempat Wisata"
                        class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                </div>
                <div class="w-full mb-6 ">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Harga Tempat Wisata
                    </label>
                    <input required name="price_range" type="number" placeholder="Harga Tempat Wisata"
                        class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                </div>


                <div class="mb-6">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Deskripsi
                    </label>
                    <textarea required name="description" rows="6" placeholder="Deskripsi Tempat Wisata"
                        class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"></textarea>
                </div>
            </div>



            <div class="grid sm:grid-cols-2 gap-4 mb-6 ">
                <div class="bg-white dark:bg-form-input shadow-lg px-6 py-6 rounded-lg">
                    <div class="text-center text-black">
                        <h2>Jadwal Operasional</h2>
                    </div>

                    {{-- Jadwal operasional --}}
                    <div>
                        <div class="w-full mb-6">
                            <label for="days" class="mb-3 block text-sm font-medium text-black dark:text-white">
                                Hari
                            </label>
                            <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent dark:bg-form-input">
                                <select id="days" name="day[1][day]"
                                    class="days  relative z-20 w-full appearance-none rounded border border-black bg-transparent px-5 py-3 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:focus:border-primary"
                                    :class="isOptionSelected && 'text-black dark:text-white'"
                                    @change="isOptionSelected = true">
                                    <option value="" hidden class="text-body">
                                        Hari Operasional
                                    </option>
                                    <option value="senin" class="text-body">Senin</option>
                                    <option value="selasa" class="text-body">Selasa</option>
                                    <option value="rabu" class="text-body">Rabu</option>
                                    <option value="kamis" class="text-body">Kamis</option>
                                    <option value="jumat" class="text-body">Jumat</option>
                                    <option value="sabtu" class="text-body">Sabtu</option>
                                    <option value="minggu" class="text-body">Minggu</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-6">

                            <div class="flex gap-2 items-center">


                                <label class="block text-sm font-medium text-black dark:text-white">
                                    Tutup
                                    <input id="close" value="false" type="checkbox" class="close"
                                        data-target="time-close-1" name="is_closed[1][is_closed]">
                                </label>
                            </div>
                        </div>

                        <div id="time-close-1" class="flex gap-4 mb-6">
                            <div>
                                <label for="openTime" class="mb-3 block text-sm font-medium text-black dark:text-white">
                                    Jam Buka
                                </label>
                                <input required id="openTime"
                                    class="rounded border-[1.5px]  border-black bg-transparent px-5 py-3 font-normal  text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                                    type="time" value="00:00" name="open[1][open]">
                            </div>
                            <div>
                                <label for="closeTime"
                                    class="mb-3 block text-sm font-medium text-black dark:text-white">
                                    Jam Tutup
                                </label>
                                <input required id="closeTime"
                                    class="rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                                    type="time" value="00:00" name="close[1][close]">
                            </div>
                        </div>
                    </div>

                    <div id="jadwalBaru" class="mt-6">
                        <!-- Tempat untuk menampilkan hasil jadwal operasional -->
                    </div>


                    <div class="flex flex-wrap gap-4">
                        <button type="button" id="tombolTambahJadwal"
                            class="rounded bg-deep-koamaru-600 py-3 px-6 text-white shadow-md hover:bg-deep-koamaru-600-dark transition-colors duration-300 ease-in-out focus:outline-none dark:bg-white dark:text-black focus:ring-2 focus:ring-primary">
                            Tambah Jadwal
                        </button>

                        <button type="button" id="tombolHapusJadwal"
                            class="rounded  bg-danger py-3 px-6 text-white shadow-md hover:bg-deep-koamaru-600-dark transition-colors duration-300 ease-in-out focus:outline-none dark:bg-white dark:text-black focus:ring-2 focus:ring-primary">Hapus
                        </button>
                    </div>
                </div>

                <div class="bg-white dark:bg-form-input shadow-lg px-6 py-6 rounded-lg">
                    <div class="text-center text-black">
                        <h2>Personal Kontak</h2>
                    </div>
                    <div class="w-full my-6">
                        <label for="media" class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Akun Media Sosial
                        </label>
                        <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent dark:bg-form-input">
                            <select name="type[1][type]"
                                class="relative z-20 w-full appearance-none rounded border border-black bg-transparent px-5 py-3 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:focus:border-primary"
                                :class="isOptionSelected && 'text-black dark:text-white'"
                                @change="isOptionSelected = true">
                                <option value="" hidden class="text-body">
                                    Personal Kontak
                                </option>
                                <option value="phone" class="text-body">Phone</option>
                                <option value="email" class="text-body">Email</option>
                                <option value="fax" class="text-body">Fax</option>
                                <option value="social_media" class="text-body">Sosial Media</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-6">
                        <input id="value"
                            class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                            type="text" name="value[1][value]" placeholder="Masukkan Kontak">
                    </div>



                    <div id="mediaSosialBaru" class="mt-6"></div>


                    <div class="flex gap-4 flex-wrap">
                        <button type="button" id="tambahMediaSosial"
                            class="rounded bg-deep-koamaru-600 dark:bg-white dark:text-black py-3 px-6 text-white shadow-md hover:bg-deep-koamaru-600-dark transition-colors duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-primary">
                            Tambah Kontak </button>
                        <button
                            class="rounded bg-danger py-3 px-6 dark:bg-white dark:text-black text-white shadow-md hover:bg-deep-koamaru-600-dark transition-colors duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-primary">Hapus</button>
                    </div>

                </div>
            </div>

            <div class="grid sm:grid-cols-2 gap-4 mb-6">

                <div class="bg-white dark:bg-form-input shadow-lg px-6 py-6 rounded-lg">
                    <div class="text-center dark:text-white mb-6 text-black">
                        <h2>Fasilitas</h2>
                    </div>
                    <div class="mb-6">
                        <input id="facilities"
                            class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                            type="text" name="facilities[1][facilities]" placeholder="Masukkan Fasilitas">
                    </div>

                    {{-- Start --}}
                    <div id="tambahFacilities" class="mt-6"></div>
                    {{-- End --}}

                    <div class="flex gap-4 flex-wrap">
                        <button type="button" id="tomboltambahFacilities"
                            class="rounded bg-deep-koamaru-600 dark:bg-white dark:text-black py-3 px-6 text-white shadow-md hover:bg-deep-koamaru-600-dark transition-colors duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-primary">
                            Tambah Fasilitas </button>

                        <button
                            class="rounded bg-danger dark:bg-white dark:text-black py-3 px-6 text-white shadow-md hover:bg-deep-koamaru-600-dark transition-colors duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-primary">Hapus</button>
                    </div>

                </div>
                <div class="bg-white shadow-lg dark:bg-form-input px-6 py-6 rounded-lg">
                    <div class="text-center mb-6 text-black dark:text-white">
                        <h2>Akomodasi</h2>
                    </div>
                    <div class="mb-6">
                        <input id="accommodations"
                            class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                            type="text" name="accommodations[1][accommodations]" placeholder="Masukkan Akomodasi">
                    </div>
                    <div id="tambahAccommodations" class="mt-6"></div>
                    <div class="flex gap-4 flex-wrap">
                        <button type="button" id="tombolTambahAccommodations"
                            class="rounded bg-deep-koamaru-600 dark:bg-white dark:text-black py-3 px-6 text-white shadow-md hover:bg-deep-koamaru-600-dark transition-colors duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-primary">
                            Tambah Akomodasi </button>
                        <button
                            class="rounded bg-danger py-3 px-6 dark:bg-white dark:text-black text-white shadow-md hover:bg-deep-koamaru-600-dark transition-colors duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-primary">Hapus</button>
                    </div>
                </div>

            </div>


        </div>






        <div class="" id="formWisatabaru">

            <div class="mb-6 flex flex-wrap gap-3 justify-around">

                {{-- dummy Gambar 1 --}}
                <div class="relative w-[300px] h-[300px] overflow-hidden rounded-lg">
                    <img class="absolute inset-0 w-full h-full object-cover transition duration-300 hover:grayscale-0"
                        src="{{ asset('assets/img/dummy-vilage.jpg') }}" alt="">

                    <div
                        class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 text-white opacity-0 transition duration-300 hover:opacity-100">
                        <button type="button"
                            class="text-sm font-medium px-4 py-3 dark:bg-white dark:text-black bg-deep-koamaru-600 hover:bg-deep-koamaru-500 transition-all duration-500 rounded-lg">Hapus</button>
                    </div>
                </div>
                {{-- dummy Gambar 2 --}}
                <div class="relative w-[300px] h-[300px] overflow-hidden rounded-lg">
                    <img class="absolute inset-0 w-full h-full object-cover transition duration-300 hover:grayscale-0"
                        src="{{ asset('assets/img/dummy-vilage.jpg') }}" alt="">

                    <div
                        class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 text-white opacity-0 transition duration-300 hover:opacity-100">
                        <button type="button"
                            class="text-sm font-medium px-4 py-3 dark:bg-white dark:text-black bg-deep-koamaru-600 hover:bg-deep-koamaru-500 transition-all duration-500 rounded-lg">Hapus</button>
                    </div>
                </div>
                {{-- dummy Gambar 3 --}}
                <div class="relative w-[300px] h-[300px] overflow-hidden rounded-lg">
                    <img class="absolute inset-0 w-full h-full object-cover transition duration-300 hover:grayscale-0"
                        src="{{ asset('assets/img/dummy-vilage.jpg') }}" alt="">

                    <div
                        class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 text-white opacity-0 transition duration-300 hover:opacity-100">
                        <button type="button"
                            class="text-sm font-medium px-4 py-3 dark:bg-white dark:text-black bg-deep-koamaru-600 hover:bg-deep-koamaru-500 transition-all duration-500 rounded-lg">Hapus</button>
                    </div>
                </div>

            </div>


            <button type="submit"
                class="flex w-full justify-center dark:bg-white dark:text-black rounded bg-deep-koamaru-600 p-3 font-medium text-white hover:bg-opacity-90">
                Kirim
            </button>
    </form>



    {{-- Jadwal Operasional --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const formWisatabaru = document.getElementById('formWisatabaru');
            const tambahWisataBaruButton = document.getElementById('tambahWisata');
            const jadwalBaru = document.getElementById('jadwalBaru');
            const tombolTambahJadwal = document.getElementById('tombolTambahJadwal');
            const mediaSosialBaru = document.getElementById('mediaSosialBaru');
            const tambahMediaSosial = document.getElementById('tambahMediaSosial');
            const tambahFacilities = document.getElementById('tambahFacilities');
            const tomboltambahFacilities = document.getElementById('tomboltambahFacilities');
            const tambahAccommodations = document.getElementById('tambahAccommodations');
            const tombolTambahAccommodations = document.getElementById('tombolTambahAccommodations');

            const buttonClose = document.querySelectorAll('.close');
            let jadwalCount = 1;
            let mediaSosialCount = 1;
            let facilitiesCount = 1;
            let accommodationsCount = 1;
            let jamCount = 1;



            buttonClose.forEach(button => {
                button.addEventListener('change', function() {
                    const targetId = button.getAttribute('data-target');
                    const targetElement = document.getElementById(targetId);

                    if (button.checked) {
                        targetElement.classList.add('hidden');
                    } else {
                        targetElement.classList.remove('hidden');
                    }
                })
            });







            tombolTambahAccommodations.addEventListener('click', function() {
                tambahAccommodations.insertAdjacentHTML('beforeend', `
                    <div class="mb-6">
                        <input id="accommodations"
                        class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                        type="text" name="accommodations[${accommodationsCount}][accommodations]"
                        placeholder="Masukkan Akomodasi">
                    </div>`)
            })

            tomboltambahFacilities.addEventListener('click', function() {
                tambahFacilities.insertAdjacentHTML('beforeend', `
                <div class="mb-6">
                        <input id="facilities"
                            class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                            type="text" name="facilities[${facilitiesCount}][facilities]" placeholder="Masukkan Fasilitas">
                    </div>
                    `)
            })

            tambahMediaSosial.addEventListener('click', function() {
                mediaSosialBaru.insertAdjacentHTML('beforeend', `
                    <div class="w-full my-6">
                        <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent dark:bg-form-input">
                            <select  name="type[${mediaSosialCount}][type]"
                                class="relative z-20 w-full appearance-none rounded border border-black bg-transparent px-5 py-3 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:focus:border-primary"
                                :class="isOptionSelected && 'text-black dark:text-white'"
                                @change="isOptionSelected = true">
                                <option value="" hidden class="text-body">
                                    Personal Kontak
                                </option>
                                <option value="phone" class="text-body">Phone</option>
                                <option value="email" class="text-body">Email</option>
                                <option value="fax" class="text-body">Fax</option>
                                <option value="social_media" class="text-body">Sosial Media</option>
                            </select>
                        </div>
                    </div>
                         <div class="mb-6">
                        <input id="value"
                            class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                            type="text" name="value[${mediaSosialCount}][value]" placeholder="Masukkan Kontak">
                    </div>`)
            })


            tombolTambahJadwal.addEventListener('click', function() {
                jadwalCount++;


                const html = `<div>
                        <div class="w-full mb-6">
                            <label for="days" class="mb-3 block text-sm font-medium text-black dark:text-white">
                                Hari
                            </label>
                            <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent dark:bg-form-input">
                                <select id="days" name="day[1][day]"
                                    class="days  relative z-20 w-full appearance-none rounded border border-black bg-transparent px-5 py-3 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:focus:border-primary"
                                    :class="isOptionSelected && 'text-black dark:text-white'"
                                    @change="isOptionSelected = true">
                                    <option value="" hidden class="text-body">
                                        Hari Operasional
                                    </option>
                                    <option value="senin" class="text-body">Senin</option>
                                    <option value="selasa" class="text-body">Selasa</option>
                                    <option value="rabu" class="text-body">Rabu</option>
                                    <option value="kamis" class="text-body">Kamis</option>
                                    <option value="jumat" class="text-body">Jumat</option>
                                    <option value="sabtu" class="text-body">Sabtu</option>
                                    <option value="minggu" class="text-body">Minggu</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-6">

                            <div class="flex gap-2 items-center">


                                <label class="block text-sm font-medium text-black dark:text-white">
                                    Tutup
                                    <input id="close" value="false" type="checkbox" class="close"
                                        data-target="time-close-${jadwalCount}" name="is_closed[1][is_closed]">
                                </label>
                            </div>
                        </div>

                        <div id="time-close-${jadwalCount}" class="flex gap-4 mb-6">
                            <div>
                                <label for="openTime" class="mb-3 block text-sm font-medium text-black dark:text-white">
                                    Jam Buka
                                </label>
                                <input required id="openTime"
                                    class="rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                                    type="time" value="00:00" name="open[1][open]">
                            </div>
                            <div>
                                <label for="closeTime"
                                    class="mb-3 block text-sm font-medium text-black dark:text-white">
                                    Jam Tutup
                                </label>
                                <input required id="closeTime"
                                    class="rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                                    type="time" value="00:00" name="close[1][close]">
                            </div>
                        </div>
                    </div>`

                const newRow = document.createElement("div");
                newRow.innerHTML = html;
                jadwalBaru.appendChild(newRow);

            })



        });
    </script>


</x-layouts.dashboard>
