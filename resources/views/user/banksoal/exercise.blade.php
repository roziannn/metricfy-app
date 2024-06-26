<link rel="shortcut icon" sizes="114x114" href="{{ asset('img/bxMath.png') }}">
@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <div class="pt-5"></div>

    <ol class="breadcrumb bg-light px-2">
        @foreach ($breadcrumbs as $label => $url)
            @if ($url)
                <li class="breadcrumb-item"><a href="{{ $url }}" class="text-decoration-none">{{ $label }}</a>
                </li>
            @else
                <li class="breadcrumb-item active" aria-current="page">{{ $label }}</li>
            @endif
        @endforeach
    </ol>
    <div class="pb-3">
        <div class="d-flex justify-content-between">
            <div class="d-flex align-items-center">
                <a href="/banksoal/{{ $banksoal->slug }}" class="text-decoration-none me-3">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
                <h6 class="font-weight-bolder m-0">{{ $banksoal->title }}</h6>

            </div>
            <div class="m-2 text-end">
                <p id="timer-display" class="fs-5 m-0 font-weight-bold px-3 rounded-3">
                    {{ $banksoal->estimated_duration }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="d-flex flex-wrap">
                    @foreach ($banksoal->banksoalQuestions as $item)
                        <button id="button{{ $loop->index }}" class="btn btn-outline-primary m-2"
                            onclick="showQuestion({{ $loop->index }})">
                            {{ $loop->index + 1 }}
                        </button>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                @foreach ($banksoal->banksoalQuestions as $item)
                    <div class="card card-question mb-3" id="item{{ $loop->index }}" style="display: none;">
                        <input type="hidden" name="answers[{{ $item->id }}][question_id]"
                            value="{{ $item->id }}">
                        <div class="card-body">
                            <h6 class="col-sm-3 px-0 card-title font-weight-bold">Soal {{ $loop->index + 1 }}</h6>
                            <p class="card-text">{!! $item->question !!}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-6">
                <form action="/submit-exam-banksoal/{{ $banksoal->id }}" method="POST" id="examForm">
                    <input type="hidden" name="timed" id="timedInput" value="">
                    @csrf
                    @foreach ($banksoal->banksoalQuestions as $item)
                        <div class="card card-options mb-3" id="options{{ $loop->index }}" style="display: none;">
                            <input type="hidden" name="answers[{{ $item->id }}][question_id]"
                                value="{{ $item->id }}">
                            <div class="card-body">
                                @php
                                    $options = range('A', 'E');
                                @endphp
                                @foreach (json_decode($item->options) as $key => $option)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            name="answers[{{ $item->id }}][answer][]" value="{{ $options[$key] }}"
                                            data-question-number="{{ $loop->index }}">
                                        <label class="form-check-label">
                                            {{ $options[$key] }} . {{ $option }}
                                        </label>
                                    </div>
                                @endforeach
                                <div class="d-flex mt-3">
                                    @unless ($loop->first)
                                        <button type="button"
                                            class="btn btn-sm btn-outline-secondary btn-back col-md-3 me-3">Kembali</button>
                                    @endunless
                                    @unless ($loop->last)
                                        <button type="button" class="btn btn-sm btn-primary btn-next col-md-3">Lanjut</button>
                                    @endunless
                                    @if ($loop->last)
                                        <button type="button" class="btn btn-sm btn-danger btn-submit col-md-3"
                                            data-bs-toggle="modal" data-bs-target="#submitModal">Kumpulkan</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </form>

            </div>
        </div>
    </div>
@endsection

{{-- modal for submit/kumpulkan jawaban --}}
<div class="modal fade" id="submitModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header border-0">
                <p class="modal-title fs-6">{{ $banksoal->title }}</p>
            </div>
            <div class="modal-body">
                <h5> <span class="text-danger" id="answered">0</span>/{{ count($banksoal->banksoalQuestions) }}
                    Soal terjawab</h5>
                <span id="modalText">Yakin ingin mengumpulkan
                    jawaban?</span>
            </div>
            {{-- script additional info/soal terjawab - blm terjawab --}}
            {{-- <script>
                document.addEventListener('DOMContentLoaded', function() {
                    //get all radio buttons di form
                    const radioButtons = document.querySelectorAll('input[type="checkbox"]');
                    const submitButton = document.getElementById('btn-submit');
                    const modalText = document.getElementById('modalText');

                    // Update number of answered questions when radio button is clicked
                    radioButtons.forEach(function(radioButton) {
                        radioButton.addEventListener('change', function() {
                            updateAnsweredCount();
                        });
                    });

                    // Func update answered count
                    function updateAnsweredCount() {
                        const answeredCount = document.querySelectorAll('input[type="radio"]:checked').length;
                        document.getElementById('answered').textContent = answeredCount;

                        // Enable/disable submit button based on answered count
                        if (answeredCount === {{ count($banksoal->banksoalQuestions) }}) {
                            submitButton.disabled = false;
                            modalText.textContent = "Yakin ingin mengumpulkan jawaban?";
                        } else {
                            submitButton.disabled = true;
                            modalText.textContent = "Jawab semua pertanyaan untuk mengumpulkan.";
                        }
                    }
                    updateAnsweredCount();
                });
            </script> --}}
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Mendapatkan semua checkbox dalam form
                    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
                    const submitButton = document.getElementById('btn-submit');
                    const modalText = document.getElementById('modalText');

                    // Menambahkan event listener ke setiap checkbox
                    checkboxes.forEach(function(checkbox) {
                        checkbox.addEventListener('change', function() {
                            updateAnsweredCount();
                        });
                    });

                    // Fungsi untuk mengupdate jumlah checkbox yang dipilih
                    function updateAnsweredCount() {
                        // Mendapatkan semua elemen pertanyaan
                        const questions = document.querySelectorAll('.card-options');
                        let answeredCount = 0;

                        // Iterasi melalui setiap elemen pertanyaan
                        questions.forEach(function(question) {
                            // Mendapatkan checkbox yang tercentang pada setiap pertanyaan
                            const checkedCheckboxes = question.querySelectorAll('input[type="checkbox"]:checked');

                            // Jika ada checkbox yang tercentang di pertanyaan tertentu, tambahkan 1 ke answeredCount
                            if (checkedCheckboxes.length > 0) {
                                answeredCount++;
                            }
                        });

                        // Mengatur jumlah pertanyaan yang dijawab pada elemen dengan ID 'answered'
                        document.getElementById('answered').textContent = answeredCount;

                        // Enable/disable tombol submit berdasarkan jumlah pertanyaan yang dijawab
                        if (answeredCount === {{ count($banksoal->banksoalQuestions) }}) {
                            submitButton.disabled = false;
                            modalText.textContent = "Yakin ingin mengumpulkan jawaban?";
                        } else {
                            submitButton.disabled = true;
                            modalText.textContent = "Jawab semua pertanyaan untuk mengumpulkan.";
                        }
                    }

                    // Memanggil fungsi updateAnsweredCount saat halaman dimuat
                    updateAnsweredCount();
                });
            </script>

            {{-- end js --}}
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" form="examForm" class="btn btn-sm btn-primary" id="btn-submit" disabled>Kumpulkan
                    Jawaban</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const totalQuestions = {{ count($banksoal->banksoalQuestions) }};
        let currentQuestionIndex = parseInt(sessionStorage.getItem('selectedCardIndex')) || 0;
        let initialDuration = parseDuration('{{ $banksoal->estimated_duration }}');
        let remaining = initialDuration;

        function showQuestion(index) {
            document.querySelectorAll('.card-question').forEach(card => card.style.display = 'none');
            document.querySelectorAll('.card-options').forEach(card => card.style.display = 'none');

            document.getElementById('item' + index).style.display = 'block';
            document.getElementById('options' + index).style.display = 'block';

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

        function submitForm(index) {
            var answer = document.querySelector('input[name="answers[' + index + ']"]:checked');
        }

        document.querySelectorAll('.btn-next').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                submitForm(currentQuestionIndex); // Simpan jawaban saat lanjut
                goToNextQuestion();
            });
        });

        document.querySelectorAll('.btn-back').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                submitForm(currentQuestionIndex); // Simpan jawaban saat kembali
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

<script>
    function startTimer() {
        var timerDisplay = document.getElementById('timer-display');
        var estimatedDuration = '{{ $banksoal->estimated_duration }}';
        // add buat ambil durasi yang dipakai ketika kumpulin jawaban
        var initialDuration = parseDuration(estimatedDuration);
        var remaining = initialDuration;

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

        //handle btn-kumpulkan ketika click
        var submitBtn = document.getElementById('btn-submit');
        submitBtn.addEventListener('click', function() {

            clearInterval(intervalId);

            remaining = totalSeconds;

            var waktuDigunakanDetik = initialDuration - remaining;
            var waktuDigunakan = pad(Math.floor(waktuDigunakanDetik / 60)) + ':' +
                pad(waktuDigunakanDetik % 60);

            document.getElementById('timedInput').value = waktuDigunakan;
            document.getElementById('examForm').submit();
        });
    }

    function parseDuration(duration) {
        var parts = duration.split(':');
        return parseInt(parts[0]) * 3600 + parseInt(parts[1]) * 60 + parseInt(parts[2]);
    }

    document.addEventListener('DOMContentLoaded', startTimer);
</script>

{{-- mini-button list question -> klik -> munculin card questionnya --}}
<script>
    function showQuestion(index) {
        document.querySelectorAll('.card-qeustion').forEach(card => card.style.display = 'none');
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
