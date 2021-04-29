@extends('admin.layouts.base')


@section('content')
    <div class="table-list mt-6 w-full">
        <div class="table-list-header flex items-center justify-between">
            <div class="table-list-header-text">
                <h2>{{ __("Dashboard") }}</h2>
            </div>
        </div>
        <div class="w-full flex d-flex justify-between content-center">
            <div class="w-1/3 h-500px" >
                <canvas id="myChart" width="400" height="400" style="height: 200px;"></canvas>
            </div>

        </div>
    </div>
@endsection

@section('bb-javascript')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.2.0/dist/chart.min.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: JSON.parse('{!! json_encode($daily_visitor['dates']) !!}'),
                datasets: [{
                    label: '{{ __("# of Visitors") }}',
                    data: JSON.parse('{!! json_encode($daily_visitor['visitors']) !!}'),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
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
@endsection
