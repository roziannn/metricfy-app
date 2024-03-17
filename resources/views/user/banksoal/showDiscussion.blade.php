@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <div class="pt-5"></div>
    <div class="pb-3">
        <div class="d-flex align-items-center">
            <a href="/banksoal/{{ $banksoal->slug }}" class="text-decoration-none me-3">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <h5 class="font-weight-bolder"> Pembahasan: {{ $banksoal->title }}</h5>
        </div>
    </div>
    <div class="col-md-3 mb-3 px-0">
        <div class="d-flex flex-wrap">
            @foreach ($banksoal->banksoalQuestions as $item)
                <button id="button{{ $loop->index }}" class="btn btn-outline-primary m-2"
                    onclick="showQuestion({{ $loop->index }})">
                    {{ $loop->index + 1 }}
                </button>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            @foreach ($banksoal->banksoalQuestions as $item)
                <div class="card card-question mb-3" id="item{{ $loop->index }}" style="display: none;">
                    <input type="hidden" name="answers[{{ $item->id }}][question_id]" value="{{ $item->id }}">
                    <div class="card-body">
                        <p class="card-text">{{ $item->question }}</p>
                        @foreach (json_decode($item->options) as $optionIndex => $option)
                            {{-- optionIndex-> indeks elemen jawaban saat ini dalam array
                      option -> nilai opsi jawaban itu sendiri --}}
                            @php
                                $questionId = $item->id;
                                $answerKey = (string) $questionId;
                                $answerData = json_decode($alreadyDoneByUser->response_data, true)[$answerKey] ?? null;
                            @endphp
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="answers[{{ $item->id }}][answer]"
                                    value="{{ chr(65 + $optionIndex) }}" data-question-number="{{ $loop->index }}"
                                    @if ($answerData && $answerData['answer'] === chr(65 + $optionIndex)) checked
                              @else disabled @endif>
                                <label class="form-check-label">
                                    {{ chr(65 + $optionIndex) }} . {{ $option }}

                                </label>
                                @if ($answerData)
                                    @if ($answerData['answer'] === chr(65 + $optionIndex))
                                        @if ($answerData['isCorrect'])
                                            <p class="my-2 p-2 text-isCorrect bg-success">(Jawabanmu benar!) <i
                                                    class="fa-solid fa-check text-light ms-2 rounded"></i>
                                            </p>
                                        @else
                                            <p class="my-2 p-2 text-isCorrect bg-danger">(Jawabanmu
                                                salah!) <i class="fa-solid fa-xmark text-light ms-2 rounded"></i>
                                            </p>
                                        @endif
                                    @endif
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-md-6">
            @foreach ($banksoal->banksoalQuestions as $item)
                <div class="card card-answers mb-3" id="answers{{ $loop->index }}" style="display: none;">
                    <div class="card-body">
                        <span class="text-muted"> Pembahasan soal</span>
                        <p class="font-weight-bold">Jawaban yang tepat:</p>

                        @php
                            // Parse JSON get mendapatkan array opsi jawaban
                            $options = json_decode($item->options);
                            // get correct answer
                            $correctAnswer = $item->answer;
                            // Mencari opsi jawaban yang sesuai dengan jawaban benar
                            $correctOption = $options[ord($correctAnswer) - ord('A')];
                        @endphp
                        <span id="correctAnswer" class="font-weight-bold">
                            {{ $correctAnswer }}. {{ $correctOption }} {{-- digabung --}}
                        </span>

                        <p class="mt-3">
                            Skimming adalah membaca dengan cepat untuk mendapatkan gambaran umum atau ide pokok dari
                            teks.
                            Ini melibatkan membaca judul, subjudul, dan paragraf pertama atau terakhir, serta
                            mencari
                            kata
                            kunci atau informasi yang menonjol.
                        </p>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const totalQuestions = {{ count($banksoal->banksoalQuestions) }};
        let currentQuestionIndex = parseInt(sessionStorage.getItem('selectedCardIndex')) || 0;

        function showQuestion(index) {
            document.querySelectorAll('.card-question').forEach(card => card.style.display = 'none');
            document.getElementById('item' + index).style.display = 'block';

            sessionStorage.setItem('selectedCardIndex', index);

            document.querySelectorAll('.btn-outline-primary').forEach(btn => btn.classList.remove('active'));
            document.getElementById('button' + index).classList.add('active');

            currentQuestionIndex = index;

            document.querySelectorAll('.card-answers').forEach(card => card.style.display = 'none');
            document.getElementById('answers' + index).style.display = 'block';
        }


        showQuestion(currentQuestionIndex);

        document.querySelectorAll('.btn-outline-primary').forEach(function(button, index) {
            button.addEventListener('click', function() {
                showQuestion(index);
            });
        });
    });
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

<style>
    .text-isCorrect {
        font-size: 15px;
        font-weight: 500;
        color: #fff;
        border-radius: 8px;
        opacity: 85%;
    }
</style>
