<x-layouts.dashboard>
    <x-slot:title>Data Pengguna | </x-slot:title>

    <section>
        {{-- Breadcrumb --}}
        <nav class="mb-5">
            <ol class="flex items-center gap-2">
                <li>
                    <a class="font-medium" href="{{ route(auth()->user()->role . '.dashboard') }}">Dashboard /</a>
                </li>
                <li class="font-medium text-primary">Pengguna</li>
            </ol>
        </nav>

        {{-- Button add destination --}}
        <a href="{{ route(auth()->user()->role . '.users.create') }}"
            class="z-10 inline-block px-3 py-3 mb-5 rounded bg-primary text-white-dahsboard">Tambah
            Pengguna</a>

        <table id="crudTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Role</th>
                    <th>Email</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </section>

    @push('script')
        <script type="text/javascript">
            $(document).ready(function() {
                $('#crudTable').DataTable({
                    serverSide: true,
                    ajax: {
                        url: '{!! url()->current() !!}'
                    },
                    columns: [{
                            data: 'id',
                            name: 'id',
                            width: '5%'
                        },
                        {
                            data: 'role',
                            name: 'role',
                            width: "10%"
                        },
                        {
                            data: 'email',
                            name: 'email',
                            width: "20%"
                        },
                        {
                            data: 'name',
                            name: 'name',
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false,
                        }
                    ],
                    order: [
                        [0, 'desc']
                    ], // Default sorting
                });
            })
            // AJAX Datatable
        </script>
    @endpush
</x-layouts.dashboard>
