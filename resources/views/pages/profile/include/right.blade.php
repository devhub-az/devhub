<div class="mb-2">
    <div class="border rounded bg-white dark:bg-dpaper dark:border-gray-700">
        <canvas id="active" style="width: 102%; height: 4rem" class="-ml-2"></canvas>
    </div>
</div>

<div class="border p-2 rounded mb-2 dark:bg-dpaper dark:border-gray-700">
    <p class="font-medium mb-3 dark:text-gray-300">İzləyicilər</p>
    <div class="flex flex-row-reverse justify-end mr-2">
        @if (count($author->relationships->followers->data) > 0)
            @foreach($author->relationships->followers->data as $follower)
                <img
                    src="{{ $follower->attributes->avatar }}"
                    alt="User profili"
                    class="border-2 border-white rounded-full h-10 w-10 -mr-2">
            @endforeach
        @else
            <p class="dark:text-gray-400">Heç kim izləmir</p>
        @endif
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    <script>
        const ctx = document.getElementById('active').getContext('2d');
        const gradient = ctx.createLinearGradient(0, 0, 0, 600);
        gradient.addColorStop(0, "rgba(0, 174, 239, .3)");
        gradient.addColorStop(0.35, "rgba(255, 255, 255, 0)");
        gradient.addColorStop(1, "rgba(255, 255, 255, 0)");

        function randomScalingFactor() {
            return Math.random() * 3;
        }

        const myLineChart = new Chart(ctx, {
            type: 'line',
            data: {

                labels: [{{ implode(', ', array_fill(0, 31, "`Paylasma`")) }}],
                datasets: [{
                    backgroundColor: gradient,
                    borderColor: '#095c79',
                    label: 'Paylasma',
                    data: [
                        {{ implode(', ', $count) }}
                    ],
                    fill: true,
                }]
            },
            options: {
                tooltips: {enabled: false},
                hover: {mode: null},
                legend: {
                    display: false
                },
                elements: {
                    point: {
                        radius: 0
                    }
                },
                responsive: false,
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        display: false,
                    }],
                    yAxes: [{
                        gridLines: {
                            display: false,
                            drawBorder: false,
                        },
                        ticks: {
                            display: false,
                            min: 0,
                            max: 5,
                            stepSize: 1
                        }
                    }]
                },
            }
        });
    </script>
@endpush

