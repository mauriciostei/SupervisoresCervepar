<div class="w-100 mx-auto">
    <h4 class="text-center">Mayores Incidencias</h4>

    <canvas id="mayor-incidencias"></canvas>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('mayor-incidencias');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    data: {!! json_encode($cantidades) !!},
                    fill: false,
                    backgroundColor: 'rgba(245,171,167,0.6)', //'#ffc107',
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y',
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    x: {
                        ticks: {
                            beginAtZero: true,
                            color: "white",
                            stepSize: 1,
                        }
                    },
                    y: {
                        ticks: {
                            color: "white"
                        }
                    }
                }
            }
        });
    </script>

</div>