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
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </section>

       <!-- Delete Confirmation Modal -->
    <div id="deleteModal" tabindex="-1" class="fixed inset-0 z-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="mb-4 text-lg font-semibold">Konfirmasi Hapus</h2>
            <p class="mb-5">Apakah Anda yakin ingin menghapus Acara ini?</p>
            <form id="deleteForm" method="post">
                @method('delete')
                @csrf
                <div class="flex justify-end gap-3">
                    <button type="button" class="px-4 py-2 text-white bg-gray-500 rounded" onclick="closeModal()">Batal</button>
                    <button type="submit" class="px-4 py-2 text-white bg-red-600 rounded">Hapus</button>
                </div>
            </form>
        </div>
    </div>

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
                            "data": 'id',
                            "orderable": true,
                            "searchable": false,
                            "className" : 'text-center'
                        },
                        {
                            data: 'name',
                            name: 'name',
                            width : "15%"
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
                            data: 'status',
                            name: 'status',
                            orderable: false,
                            searchable: false,
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false,
                        }
                    ],
                    order: [
                        [2, 'desc']
                    ], // Default sorting
                    drawCallback: function(settings) {
                    var api = this.api();
                    var start = api.page.info().start;
                    api.column(0, {search: 'applied', order: 'applied'}).nodes().each(function(cell, i) {
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
