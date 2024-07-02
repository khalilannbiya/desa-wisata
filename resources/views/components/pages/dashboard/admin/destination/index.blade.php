<x-layouts.dashboard>
    <x-slot:title>Data Wisata | </x-slot:title>

    <section>
        {{-- Breadcrumb --}}
        <nav class="mb-5">
            <ol class="flex items-center gap-2">
                <li>
                    <a class="font-medium" href="{{ route(auth()->user()->role . '.dashboard') }}">Dashboard /</a>
                </li>
                <li class="font-medium text-primary">Wisata</li>
            </ol>
        </nav>

        {{-- Button add destination --}}
        <a href="{{ route(auth()->user()->role . '.destinations.create') }}"
            class="flex justify-center px-3 py-3 mb-5 rounded w-44 bg-primary text-white-dahsboard">Tambah Wisata</a>

        <table id="crudTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Wisata</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </section>

    <!-- Delete Confirmation Modal -->
    <x-partials.dashboard.modal-delete title="wisata" />


    @push('script')
        <script type="text/javascript">
            $(document).ready(function() {
                $('#crudTable').DataTable({
                    serverSide: true,
                    ajax: {
                        url: '{!! url()->current() !!}'
                    },
                    columns: [{
                            "data": 'id',
                            "orderable": true,
                            "searchable": false,
                            "className": 'text-center'
                        },
                        {
                            data: 'name',
                            name: 'name',
                        },
                        {
                            data: 'status',
                            name: 'status',
                            "className": 'text-center',
                            render: function(data, type, row) {
                                if (data === 'active') {
                                    return '<button type="button" class="focus:outline-none text-white bg-green-700 focus:ring-4 focus:ring-green-300 px-3 py-2 text-xs font-medium text-center text-white dark:bg-green-600  dark:focus:ring-green-800 rounded-lg cursor-default">Beroperasi</button>';
                                } else {
                                    return '<button type="button" class="focus:outline-none text-white bg-red-700 focus:ring-4 focus:ring-red-300 px-3 py-2 text-xs font-medium text-center text-white dark:bg-red-600 dark:focus:ring-red-900 rounded-lg cursor-default">Tidak Beroperasi</button>';
                                }
                            }
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
                    drawCallback: function(settings) {
                        var api = this.api();
                        var start = api.page.info().start;
                        api.column(0, {
                            search: 'applied',
                            order: 'applied'
                        }).nodes().each(function(cell, i) {
                            cell.innerHTML = start + i + 1;
                        });
                    }
                });
            });

            function openModal(formAction) {
                $('#deleteForm').attr('action', formAction);
                $('#deleteModal').removeClass('hidden');
            }

            function closeModal() {
                $('#deleteModal').addClass('hidden');
            }

            $(document).on('click', '[data-modal-target]', function(e) {
                e.preventDefault();
                var formAction = $(this).closest('form').attr('action');
                openModal(formAction);
            });
            // AJAX Datatable
        </script>
    @endpush
</x-layouts.dashboard>
