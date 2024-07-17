<x-layouts.dashboard>
    <x-slot:title>Data Artikel | </x-slot:title>

    <section>
        {{-- Breadcrumb --}}
        <nav class="mb-5">
            <ol class="flex items-center gap-2">
                <li>
                    <a class="font-medium" href="{{ route(auth()->user()->role . '.dashboard') }}">Dashboard /</a>
                </li>
                <li class="font-medium text-primary">Artikel</li>
            </ol>
        </nav>

        {{-- Button add destination --}}
        <a href="{{ route(auth()->user()->role . '.articles.create') }}"
            class="flex justify-center px-3 py-3 mb-5 rounded w-44 bg-primary text-white-dahsboard">Tambah Artikel</a>

        <table id="crudTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul Artikel</th>
                    <th>Penulis</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </section>

    <!-- Delete Confirmation Modal -->
    <x-partials.dashboard.modal-delete title="artikel" />


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
                            data: 'title',
                            name: 'title',
                            width: "35%"
                        },
                        {
                            data: 'writer',
                            name: 'writer',
                            "className": 'text-center'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false,
                        },
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
