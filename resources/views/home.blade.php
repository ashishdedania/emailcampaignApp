@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <div class="container">
                        <h1>Campaign Performance Dashboard</h1>
                        <canvas id="campaignChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="application/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="application/javascript">
    var ctx = document.getElementById('campaignChart').getContext('2d');
    var campaignChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Sent', 'Delivered', 'Opened'],
            datasets: [{
                label: 'Emails',
                data: [{{ $sentCount }}, {{ $deliveredCount }}, {{ $openedCount }}],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)'
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)'
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
