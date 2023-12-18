@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <div class="pb-5">
        <div class="d-flex align-items-center justify-content-between py-3">
            <h5 class="font-weight-bolder py-3"><a href="/banksoal/{{ $banksoal->slug }}"><i
                        class="fa-solid fa-arrow-left me-3"></i></a>{{ $banksoal->title }}</h5>
            <p id="timer-display">{{ $banksoal->estimated_duration }}</p>
            <a href="#" class="btn btn-sm btn-danger">Selesai</a>
        </div>
    </div>

    <script>
        function startTimer() {
            var timerDisplay = document.getElementById('timer-display');
            var estimatedDuration = '{{ $banksoal->estimated_duration }}';

            // Parse hours, minutes, and seconds dari estimated_duration string
            var parts = estimatedDuration.split(':');
            var hours = parseInt(parts[0], 10);
            var minutes = parseInt(parts[1], 10);
            var seconds = parseInt(parts[2], 10);

            // Convert ke detik
            var totalSeconds = hours * 3600 + minutes * 60 + seconds;

            function updateTimer() {
                var minutes = Math.floor(totalSeconds / 60);
                var seconds = totalSeconds % 60;

                timerDisplay.textContent = pad(minutes) + ':' + pad(seconds);

                if (--totalSeconds < 0) {
                    clearInterval(intervalId);
                    timerDisplay.textContent = 'Waktunya habis!';
                }
            }

            function pad(val) {
                return val < 10 ? '0' + val : val;
            }

            updateTimer(); //update setiap detik
            var intervalId = setInterval(updateTimer, 1000);
        }
        document.addEventListener('DOMContentLoaded', startTimer);
    </script>
@endsection
