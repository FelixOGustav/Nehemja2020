@extends('Layouts/AdminTemplate')
@section('adminContent')
<!-- Charts.js import -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js" integrity="sha256-o8aByMEvaNTcBsw94EfRLbBrJBI+c3mjna/j4LrfyJ8=" crossorigin="anonymous"></script>
<div class="panel" style="width: 350px; height: 450px;">
    <h2 style="text-align:center;">Fördelning mellan församlingarna</h2>
    <canvas id="placesChart" width="250" height="250"></canvas>
</div>
<script>
    var ctx = document.getElementById('placesChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'pie',

        // The data for our dataset
        data: {
            labels: [
                "{{$placesStats[0]->place}}",
                "{{$placesStats[1]->place}}",
                "{{$placesStats[2]->place}}",
                "{{$placesStats[3]->place}}",
                "{{$placesStats[4]->place}}",
                "{{$placesStats[5]->place}}",
                "{{$placesStats[6]->place}}",
                "{{$placesStats[7]->place}}",
                "{{$placesStats[8]->place}}",
                "{{$placesStats[9]->place}}",
                "{{$placesStats[10]->place}}",
                "{{$placesStats[11]->place}}",
                "{{$placesStats[12]->place}}",
            ],
            datasets: [{
                label: "Fördelning mellan församlingar",
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(66, 158, 244)',
                    'rgb(65, 244, 140)',
                    'rgb(211, 244, 65)',
                    'rgb(244, 148, 65)',
                    'rgb(202, 65, 244)',
                    'rgb(244, 65, 65)',
                    'rgb(65, 65, 244)',
                    'rgb(244, 65, 145)',
                    'rgb(48, 153, 140)',
                    'rgb(140, 51, 76)',
                    'rgb(255, 246, 0)',
                    'rgb(135, 0, 255)'
                    ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(66, 158, 244)',
                    'rgb(65, 244, 140)',
                    'rgb(211, 244, 65)',
                    'rgb(244, 148, 65)',
                    'rgb(202, 65, 244)',
                    'rgb(244, 65, 65)',
                    'rgb(65, 65, 244)',
                    'rgb(244, 65, 145)',
                    'rgb(48, 153, 140)',
                    'rgb(140, 51, 76)',
                    'rgb(255, 246, 0)',
                    'rgb(135, 0, 255)'
                    ],
                data: [
                    {{$placesStats[0]->amount}}, 
                    {{$placesStats[1]->amount}},
                    {{$placesStats[2]->amount}},
                    {{$placesStats[3]->amount}},
                    {{$placesStats[4]->amount}},
                    {{$placesStats[5]->amount}},
                    {{$placesStats[6]->amount}},
                    {{$placesStats[7]->amount}},
                    {{$placesStats[8]->amount}},
                    {{$placesStats[9]->amount}},
                    {{$placesStats[10]->amount}},
                    {{$placesStats[11]->amount}},
                    {{$placesStats[12]->amount}},
                    ],
            }]
        },

        // Configuration options go here
        /*options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }*/
    });
</script>
@endsection