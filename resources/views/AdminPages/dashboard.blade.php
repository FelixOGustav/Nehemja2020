@extends('Layouts/AdminTemplate')
@section('adminContent')
<!-- Charts.js import -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js" integrity="sha256-o8aByMEvaNTcBsw94EfRLbBrJBI+c3mjna/j4LrfyJ8=" crossorigin="anonymous"></script>
<div class="panel" style="width: 350px; height: 450px;">
    <h2 style="text-align:center;">Fördelning mellan församlingarna</h2>
    <canvas id="placesChart" width="250" height="250"></canvas>
</div>

@endsection