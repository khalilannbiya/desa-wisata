<x-layouts.dashboard>

    @if (auth()->user()->role == 'super_admin' || auth()->user()->role == 'admin')
        <div class="">
            <div class="grid xl:grid-cols-4 md:grid-cols-2 gap-4 justify-items-center">
                <div class="border-2 border-black p-10 w-[250px] space-y-2 text-center rounded-lg">
                    <h1 class="text-4xl font-bold">200</h1>
                    <p class="text-lg">Jumlah Tempat Wisata</p>
                </div>
                <div class="border-2 border-black p-10 w-[250px] space-y-2 text-center rounded-lg">
                    <h1 class="text-4xl font-bold">200</h1>
                    <p class="text-lg">Jumlah Pengguna</p>
                </div>
                <div class="border-2 border-black p-10 w-[250px] space-y-2 text-center rounded-lg">
                    <h1 class="text-4xl font-bold">200</h1>
                    <p class="text-lg">Jumlah Acara</p>
                </div>

                <div class="border-2 border-black p-10 w-[250px] space-y-2 text-center rounded-lg">
                    <h1 class="text-4xl font-bold">200</h1>
                    <p class="text-lg">Jumlah Artikel</p>
                </div>
            </div>
            <div class="mt-6 w-full">
                <canvas id="myChart" class="w-full"></canvas>

            </div>
        </div>
    @endif

    @if (auth()->user()->role == 'owner')
        <div class="border-2 border-black p-10 w-full space-y-2 text-center rounded-lg">
            <h1 class="text-4xl font-bold">200</h1>
            <p class="text-lg">Jumlah Tempat Wisata</p>
        </div>
    @endif
    @if (auth()->user()->role == 'writer')
        <div class="border-2 border-black p-10 w-full space-y-2 text-center rounded-lg">
            <h1 class="text-4xl font-bold">200</h1>
            <p class="text-lg">Jumlah Artikel</p>
        </div>
    @endif
</x-layouts.dashboard>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Wisata', 'Pengguna', 'Acara', 'Artikel'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
