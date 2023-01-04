<div class="w-75 mx-auto">
    <h4 class="text-center">Desempeño</h4>

    <div class="position-relative d-flex flex-row justify-content-center">
        <h3 class="position-absolute top-50 start-50 translate-middle"> {{100-$terminado}} %</h3>
        <canvas id="grafica-desempenio" class="w-100"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('grafica-desempenio');

        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Realizadas', 'Restantes'],
                datasets: [{
                    data: [ {!! $terminado !!} , {!! 100 - $terminado !!}],
                    backgroundColor: ['rgba(0,51,204,0.3)', 'rgba(130,131,131,0.3)'],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    }
                },
                // cutout: 50,
            }
        });
    </script>

</div>