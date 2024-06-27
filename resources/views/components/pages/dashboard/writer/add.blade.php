<x-layouts.dashboard>
    <x-slot:title>Tambah Acara | </x-slot:title>



    <form action="" method="POST">
        @csrf

        <div class="form-1">
            <div class="">
                <h1 class="text-black dark:text-white font-bold text-xl mb-6"> Tambah Tempat Wisata </h1>
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
                <x-partials.dashboard.input-error :messages="$errors->get('galleries.')" />
            </div>

            <div class="bg-white dark:bg-form-input shadow-lg px-6 py-6 rounded-lg mb-6">
                <div class="w-full mb-6 ">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Nama Acara
                    </label>
                    <input required name="name_destination" type="text" placeholder="Nama Tempat Wisata"
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

        </div>

        <button type="submit"
            class="flex w-full justify-center dark:bg-white dark:text-black rounded bg-deep-koamaru-600 p-3 font-medium text-white hover:bg-opacity-90">
            Kirim
        </button>
    </form>



</x-layouts.dashboard>
