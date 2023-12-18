@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <ol class="breadcrumb bg-light px-0">
        @foreach ($breadcrumbs as $label => $url)
            @if ($url)
                <li class="breadcrumb-item"><a href="{{ $url }}" class="text-decoration-none">{{ $label }}</a>
                </li>
            @else
                <li class="breadcrumb-item active" aria-current="page">{{ $label }}</li>
            @endif
        @endforeach
    </ol>

    <div class="pb-5">
        <div class="d-flex align-items-center justify-content-between py-3">
            <h5 class="font-weight-bolder"><a href="/banksoal/{{ $banksoal->slug }}"><i
                        class="fa-solid fa-arrow-left me-3"></i></a>{{ $banksoal->title }}</h5>
            <a href="#" class="btn btn-sm btn-danger">Selesai</a>
        </div>

        <div class="d-flex bg-body-secondary justify-content-between align-items-center my-3 rounded-3 p-2">
            <p class="currentSoal m-0">Soal 1/20</p>
            <p id="timer-display" class="m-0 font-weight-bold">{{ $banksoal->estimated_duration }}</p>
        </div>


        <div class="row">
            <div class="col-md-3 mb-3">
                <div class="d-flex flex-wrap">
                    @foreach ($banksoal->banksoalQuestions as $item)
                        <button id="button{{ $loop->index }}" class="btn btn-outline-primary m-2"
                            onclick="showQuestion({{ $loop->index }})">
                            {{ $loop->index + 1 }}
                        </button>
                    @endforeach
                </div>
            </div>

            <div class="col-md-9">
                @foreach ($banksoal->banksoalQuestions as $item)
                    <div class="card mb-3" id="item{{ $loop->index }}" style="display: none;">
                        <input type="hidden" name="exercise_id" value="{{ $item->id }}">
                        <div class="card-body">
                            <p class="card-text">{{ $item->question }}</p>
                            @foreach (json_decode($item->options) as $option)
                                <form>
                                    @csrf
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="answer"
                                            id="answer{{ $loop->index + 1 }}" value="{{ chr(64 + $loop->index + 1) }}">
                                        <label class="form-check-label" for="answer{{ $loop->index + 1 }}">
                                            {{ chr(64 + $loop->index + 1) }} . {{ $option }}
                                        </label>
                                    </div>
                            @endforeach
                            <div class="d-flex justify-content-between mt-5">
                                <button type="submit"
                                    class="btn btn-m btn-outline-secondary btn-back col-md-2 me-5">Kembali</button>
                                <button type="submit" class="btn btn-m btn-primary btn-next col-md-2">Lanjut</button>
                            </div>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
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

    <script>
        function showQuestion(index) {
            document.querySelectorAll('.card').forEach(card => card.style.display = 'none');
            document.getElementById('item' + index).style.display = 'block';

            sessionStorage.setItem('selectedCardIndex', index);

            document.querySelectorAll('.btn-outline-primary').forEach(btn => btn.classList.remove('active'));
            document.getElementById('button' + index).classList.add('active');
        }

        document.addEventListener('DOMContentLoaded', function() {
            const selectedCardIndex = parseInt(sessionStorage.getItem('selectedCardIndex')) || 0;

            showQuestion(selectedCardIndex);

            document.querySelectorAll('.btn-outline-primary').forEach(function(button, index) {
                button.addEventListener('click', function() {
                    showQuestion(index);
                });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const totalQuestions = {{ count($banksoal->banksoalQuestions) }};
            let currentQuestionIndex = parseInt(sessionStorage.getItem('selectedCardIndex')) || 0;

            function showQuestion(index) {
                document.querySelectorAll('.card').forEach(card => card.style.display = 'none');
                document.getElementById('item' + index).style.display = 'block';

                sessionStorage.setItem('selectedCardIndex', index);

                document.querySelectorAll('.btn-outline-primary').forEach(btn => btn.classList.remove('active'));
                document.getElementById('button' + index).classList.add('active');

                currentQuestionIndex = index;
            }

            function goToNextQuestion() {
                const nextIndex = (currentQuestionIndex + 1) % totalQuestions;
                showQuestion(nextIndex);
            }

            function goToPreviousQuestion() {
                const prevIndex = (currentQuestionIndex - 1 + totalQuestions) % totalQuestions;
                showQuestion(prevIndex);
            }

            document.querySelectorAll('.btn-next').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    goToNextQuestion();
                });
            });

            document.querySelectorAll('.btn-back').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    goToPreviousQuestion();
                });
            });

            showQuestion(currentQuestionIndex);

            document.querySelectorAll('.btn-outline-primary').forEach(function(button, index) {
                button.addEventListener('click', function() {
                    showQuestion(index);
                });
            });
        });
    </script>
@endsection
