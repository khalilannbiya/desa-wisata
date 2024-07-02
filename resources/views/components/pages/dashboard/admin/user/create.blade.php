<x-layouts.dashboard>

    {{-- Breadcrumb --}}
    <nav class="mb-5">
        <ol class="flex items-center gap-2">
            <li>
                <a class="font-medium" href="{{ route(auth()->user()->role . '.dashboard') }}">Dashboard /</a>
            </li>
            <li>
                <a class="font-medium" href="{{ route(auth()->user()->role . '.users.index') }}">Pengguna
                    /</a>
            </li>
            <li class="font-medium text-primary">Tambah Pengguna</li>
        </ol>
    </nav>

    <form action="{{ route(strtolower(auth()->user()->role) . '.users.store') }}" method="POST">
        @csrf

        <div class="form-1">
            <div class="">
                <h1 class="mb-6 text-xl font-bold text-black-dashboard dark:text-white-dahsboard"> Tambah Pengguna
                </h1>
            </div>

            <div class="px-6 py-6 mb-6 bg-white rounded-lg shadow-lg dark:bg-black">
                <div class="mb-4.5">
                    <label for="role"
                        class="mb-3 block text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                        Role <span class="text-red-500">*</span>
                    </label>
                    <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent dark:bg-form-input">
                        <select required name="role"
                            class="relative z-20 w-full appearance-none capitalize rounded border border-stroke bg-transparent px-5 py-3 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                            :class="isOptionSelected && 'text-black dark:text-white'" @change="isOptionSelected = true">
                            <option disabled selected class="text-body capitalize">Pilih Role</option>
                            <option value="admin" class="text-body capitalize"
                                {{ old('role') == 'admin' ? 'selected' : '' }}>
                                Admin</option>
                            <option value="owner" class="text-body capitalize"
                                {{ old('role') == 'owner' ? 'selected' : '' }}>
                                Penanggung Jawab Wisata</option>
                            <option value="writer" class="text-body capitalize"
                                {{ old('role') == 'writer' ? 'selected' : '' }}>
                                Penulis Konten</option>
                        </select>
                        <x-partials.dashboard.input-error :messages="$errors->get('role')" />
                    </div>
                </div>

                <div class="mb-4.5">
                    <label for="name"
                        class="mb-3 block text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                        Nama <span class="text-red-500">*</span>
                    </label>
                    <input type="text" required name="name" autocomplete="name" maxlength="100"
                        placeholder="Masukan Nama" value="{{ old('name') }}"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard dark:focus:border-primary" />
                    <x-partials.dashboard.input-error :messages="$errors->get('name')" />
                </div>

                <div class="mb-4.5">
                    <label for="email"
                        class="mb-3 block text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                        Email <span class="text-red-500">*</span>
                    </label>
                    <input type="email" required name="email" autocomplete="email" placeholder="Masukan Email"
                        maxlength="100" value="{{ old('email') }}"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard dark:focus:border-primary" />
                    <x-partials.dashboard.input-error :messages="$errors->get('email')" />
                </div>

                <div class="mb-4.5">
                    <label for="password"
                        class="mb-3 block text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                        Password <span class="text-red-500">*</span>
                    </label>
                    <input type="password" required name="password" placeholder="Masukan Password"
                        autocomplete="new-password" value="{{ old('password') }}"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard dark:focus:border-primary" />
                    <x-partials.dashboard.input-error :messages="$errors->get('password')" />
                </div>

                <div class="mb-4.5">
                    <label for="password_confirmation"
                        class="mb-3 block text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                        Password <span class="text-red-500">*</span>
                    </label>
                    <input type="password" required name="password_confirmation" autocomplete="new-password"
                        placeholder="Konfirmasi Password" value="{{ old('password_confirmation') }}"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard dark:focus:border-primary" />
                </div>
            </div>

        </div>

        <button type="submit"
            class="flex justify-center w-full p-3 font-medium text-white rounded bg-deep-koamaru-600 hover:bg-opacity-90">
            Kirim
        </button>
    </form>

</x-layouts.dashboard>
