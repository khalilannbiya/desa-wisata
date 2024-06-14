<x-layouts.dashboard>

    <form action="#" method="POST">
        <div class="w-full mb-6 ">
            <label
              class="mb-3 block text-sm font-medium text-black dark:text-white"
            >
              Nama Wisata
            </label>
            <input
            required
            name="name_destination"
              type="text"
              placeholder="Nama Tempat Wisata"
              class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
            />
          </div>


          <div class="mb-4.5">
            <label
              class="mb-3 block text-sm font-medium text-black dark:text-white"
            >
              Status Tempat Wisata
            </label>
            <div
              x-data="{ isOptionSelected: false }"
              class="relative z-20 bg-transparent dark:bg-form-input"
            >
              <select
              required
              name="status"
                class="relative z-20 w-full appearance-none rounded border border-black bg-transparent px-5 py-3 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                :class="isOptionSelected && 'text-black dark:text-white'"
                @change="isOptionSelected = true"
              >
                <option value="" hidden class="text-body">
                  Pilih Status Tempat Wisata
                </option>
                <option value="active" class="text-body">Aktif</option>
                <option value="inactive" class="text-body">Tidak Aktif</option>
              </select>
              <span
                class="absolute right-4 top-1/2 z-30 -translate-y-1/2"
              >

              </span>
            </div>
          </div>

          <div class="w-full mb-6 ">
            <label
              class="mb-3 block text-sm font-medium text-black dark:text-white"
            >
              Lokasi Tempat Wisata
            </label>
            <input
            name="location"
            required
              type="text"
              placeholder="Lokasi Tempat Wisata"
              class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
            />
          </div>
          <div class="w-full mb-6 ">
            <label
              class="mb-3 block text-sm font-medium text-black dark:text-white"
            >
              Harga Tempat Wisata
            </label>
            <input
            required
            name="price_range"
              type="number"
              placeholder="Harga Tempat Wisata"
              class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
            />
          </div>


            <div class="mb-6">
                <label
                  class="mb-3 block text-sm font-medium text-black dark:text-white"
                >
                  Deskripsi
                </label>
                <textarea
                required
                  name="description"
                  rows="6"
                  placeholder="Deskripsi Tempat Wisata"
                  class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                ></textarea>
              </div>

          <button
            class="flex w-full justify-center rounded bg-deep-koamaru-600 p-3 font-medium text-white hover:bg-opacity-90"
          >
            Send Message
          </button>
        </div>
      </form>

</x-layouts.dashboard>
