<x-layouts.auth>
    <x-slot:title>Login | </x-slot:title>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-28 w-auto" src="{{ asset('assets/img/logo.png') }}" alt="Desa Sukarame">
            <h2 class="mt-10 text-center text-3xl font-bold leading-9 tracking-tight text-gray-900">Masuk</h2>
        </div>

        <div class="mt-2 sm:mx-auto sm:w-full">
            <form class="space-y-6" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="">
                    <div>
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" autocomplete="username" required
                                autofocus
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-new sm:text-sm sm:leading-6">
                        </div>
                        <x-partials.dashboard.input-error :messages="$errors->get('email')" />
                    </div>
                    <div>
                        <div class="flex items-center justify-between mt-2">
                            <label for="password"
                                class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        </div>
                        <div class="mt-2">
                            <input id="password" name="password" type="password" autocomplete="current-password"
                                required
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-new sm:text-sm sm:leading-6">

                        </div>
                        <x-partials.dashboard.input-error :messages="$errors->get('password')" />
                    </div>
                </div>
                <div class="flex items-center">
                    <input class="border" type="checkbox" name="remember" id="remember_me">
                    <label class="ml-2 block text-sm text-gray-900" for="remember_me">ingat saya</label>
                </div>

                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-green-new px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-new transition-all duration-500">Masuk</button>
                </div>
            </form>


            <div class="mt-4">
                <a href="/"
                    class="flex w-full justify-center rounded-md  border-2 border-green-new px-3 py-1.5 text-sm font-semibold leading-6 text-green-new shadow-sm ">Kembali</a>
            </div>
        </div>
</x-layouts.auth>
