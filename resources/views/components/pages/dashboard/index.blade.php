<x-layouts.dashboard>

    @if (auth()->user()->role == 'super_admin' || auth()->user()->role == 'admin')
        <div class="">
            <div class="grid xl:grid-cols-4 md:grid-cols-2 gap-4 justify-items-center">
                <div class="border-2 border-black p-10 w-[250px] space-y-2 text-center rounded-lg">
                    <h1 class="text-4xl font-bold">{{ $totalDestination }}</h1>
                    <p class="text-lg">Jumlah Tempat Wisata</p>
                </div>
                <div class="border-2 border-black p-10 w-[250px] space-y-2 text-center rounded-lg">
                    <h1 class="text-4xl font-bold">{{ $totalUser }}</h1>
                    <p class="text-lg">Jumlah Pengguna</p>
                </div>
                <div class="border-2 border-black p-10 w-[250px] space-y-2 text-center rounded-lg">
                    <h1 class="text-4xl font-bold">{{ $totalEvent }}</h1>
                    <p class="text-lg">Jumlah Acara</p>
                </div>

                <div class="border-2 border-black p-10 w-[250px] space-y-2 text-center rounded-lg">
                    <h1 class="text-4xl font-bold">{{ $totalArticle }}</h1>
                    <p class="text-lg">Jumlah Artikel</p>
                </div>
            </div>
            <div class="mt-6 w-full">
                {{-- <canvas id="myChart" class="w-full"></canvas> --}}

            </div>
        </div>
    @endif

    @if (auth()->user()->role == 'owner')
        <div class="border-2 border-black p-10 w-full space-y-2 text-center rounded-lg">
            <h1 class="text-4xl font-bold">{{ $totalDestination }}</h1>
            <p class="text-lg">Jumlah Tempat Wisata</p>
        </div>
    @endif
    @if (auth()->user()->role == 'writer')
        <div class="border-2 border-black p-10 w-full space-y-2 text-center rounded-lg">
            <h1 class="text-4xl font-bold">{{ $totalArticle }}</h1>
            <p class="text-lg">Jumlah Artikel</p>
        </div>
    @endif


    @if (auth()->user()->role == 'super_admin' || auth()->user()->role == 'admin')
        <div style="width: 80%; margin: auto;">
            <canvas id="chartArticle"></canvas>
        </div>

        <div style="width: 80%; margin: auto;">
            <canvas id="chartDestination"></canvas>
        </div>

        <div style="width: 80%; margin: auto;">
            <canvas id="chartEvent"></canvas>
        </div>
    @endif

    @if (auth()->user()->role == 'writer')
        <div style="width: 80%; margin: auto;">
            <canvas id="chartArticle"></canvas>
        </div>
    @endif

    @if (auth()->user()->role == 'owner')
        <div style="width: 80%; margin: auto;">
            <canvas id="chartDestination"></canvas>
        </div>
    @endif


</x-layouts.dashboard>


@if (auth()->user()->role !== 'owner')
    <script>
        var ctx = document.getElementById('chartArticle').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($dataArticle['articleLabels']),
                datasets: [{
                    label: '5 Artikel Terpopuler',
                    data: @json($dataArticle['articleData']),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
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
@endif

@if (auth()->user()->role !== 'writer')
    <script>
        var ctx = document.getElementById('chartDestination').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($dataDestination['destinationLabels']),
                datasets: [{
                    label: '5 Wisata Terpopuler',
                    data: @json($dataDestination['destinationData']),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
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
@endif


@if (auth()->user()->role == 'admin' || auth()->user()->role == 'super_admin')
    <script>
        var ctx = document.getElementById('chartEvent').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($dataEvent['eventLabels']),
                datasets: [{
                    label: '5 Acara Terpopuler',
                    data: @json($dataEvent['eventData']),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
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
@endif
