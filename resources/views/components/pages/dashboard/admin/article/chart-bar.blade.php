<x-layouts.dashboard>

    <div style="width: 80%; margin: auto;">
        <canvas id="barChart2"></canvas>
    </div>


</x-layouts.dashboard>




<script>
    var ctx = document.getElementById('barChart2').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($data['articlesLabels']),
            datasets: [{
                label: 'Views',
                data: @json($data['articlesData']),
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
