<div>
    <div id="deleteModal" tabindex="-1" class="fixed   inset-0 z-50 flex items-center justify-center hidden">
        <div
            class="bg-white dark:bg-black rounded-lg space-y-4 shadow-2xl dark:shadow-gray-500 dark:shadow-md border p-6">
            <div class="flex justify-center items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="86" height="86" viewBox="0 0 24 24"
                    style="fill: rgb(220 80 80);transform: ;msFilter:;">
                    <path
                        d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z">
                    </path>
                    <path
                        d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z">
                    </path>
                </svg>
            </div>
            <h2 class="mb-4 text-xl dark:text-white font-semibold text-center ">Konfirmasi Hapus</h2>
            <p class="mb-5 dark:text-white text-center">Apakah Anda yakin ingin menghapus {{ $title }} ini?</p>
            <form id="deleteForm" method="post">
                @method('delete')
                @csrf
                <div class="flex justify-end gap-3">
                    <button type="button" class="px-4 py-2 text-white bg-gray-500 rounded"
                        onclick="closeModal()">Batal</button>
                    <button type="submit" class="px-4 py-2 text-white bg-red-600 rounded">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function closeModal() {
        $('#deleteModal').addClass('hidden');
    }
</script>
