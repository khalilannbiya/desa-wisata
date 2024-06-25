<x-layouts.dashboard>
    <x-slot:title>Data Acara | </x-slot:title>

    <section>
        {{-- Breadcrumb --}}
        <nav class="mb-5">
            <ol class="flex items-center gap-2">
                <li>
                    <a class="font-medium" href="{{ route(auth()->user()->role . '.dashboard') }}">Dashboard /</a>
                </li>
                <li class="font-medium text-primary">Acara</li>
            </ol>
        </nav>

        {{-- Button add destination --}}
        <a href="{{ route(auth()->user()->role . '.events.create') }}"
            class="flex justify-center px-3 py-3 mb-5 rounded w-44 bg-primary text-white-dahsboard">Tambah Acara</a>

        <table id="crudTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Acara</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Akhir</th>
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
                        url: '{!! url()->current() !!}',
                        type: 'GET'
                    },
                    columns: [{
                            data: 'id',
                            name: 'id',
                            width: '5%',
                            orderable: true
                        },
                        {
                            data: 'name',
                            name: 'name',
                        },
                        {
                            data: 'start_date',
                            name: 'start_date',
                        },
                        {
                            data: 'end_date',
                            name: 'end_date',
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
