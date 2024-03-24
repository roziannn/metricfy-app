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
        <div class="d-flex align-items-center">
            <a href="/banksoal/{{ $banksoal->slug }}" class="text-decoration-none me-3">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <h6 class="font-weight-bolder  m-0"> Pembahasan: {{ $banksoal->title }}</h6>
        </div>
    </div>
    <div class="col-md-12 mb-3 px-0">
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
                        <h6 class="col-sm-3 px-0 card-title font-weight-bold">Soal {{ $loop->index + 1 }}</h6>
                        <p class="card-text">{!! $item->question !!}</p>
                        @foreach (json_decode($item->options) as $optionIndex => $option)
                            {{-- optionIndex-> indeks elemen jawaban saat ini dalam array
                      option -> nilai opsi jawaban itu sendiri --}}
                            @php
                                $questionId = $item->id;
                                $answerKey = (string) $questionId;
                                $answerData = isset(json_decode($alreadyDoneByUser->response_data, true)[$answerKey])
                                    ? json_decode($alreadyDoneByUser->response_data, true)[$answerKey]
                                    : null;
                                $isAnswered = $answerData ? $answerData['answer'] : null;
                                $isChecked = $isAnswered && in_array(chr(65 + $optionIndex), $isAnswered);
                                $isDisabled = $isAnswered && !in_array(chr(65 + $optionIndex), $isAnswered);

                            @endphp
                            <div class="form-check ps-0">
                                <input class="form-check-input" type="checkbox"
                                    name="answers[{{ $item->id }}][answer][]" value="{{ chr(65 + $optionIndex) }}"
                                    data-question-number="{{ $loop->index }}" {{ $isChecked ? 'checked' : '' }}
                                    {{ $isDisabled ? 'disabled' : '' }}>

                                <label class="form-check-label">
                                    {{ chr(65 + $optionIndex) }} . {{ $option }}
                                </label>
                                @if ($answerData && isset($answerData['isCorrect']) && in_array(chr(65 + $optionIndex), $answerData['answer']))
                                    <p
                                        class="my-2 p-2 text-isCorrect bg-{{ $answerData['isCorrect'] ? 'success' : 'danger' }}">
                                        (Jawabanmu {{ $answerData['isCorrect'] ? 'benar' : 'salah' }}!)
                                        <i
                                            class="fa-solid fa-{{ $answerData['isCorrect'] ? 'check' : 'xmark' }} text-light ms-2 rounded"></i>
                                    </p>
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
                            $options = json_decode($item->options);
                            //get semua jawaban yang benar
                            // Membuat daftar opsi jawaban yang sesuai dengan jawaban yang benar
                            $correctAnswers = json_decode($item->answer);
                            $correctOptions = [];
                            foreach ($correctAnswers as $answer) {
                                // Mendapatkan indeks opsi jawaban yang sesuai dengan kode jawaban
                                $index = ord($answer) - ord('A');
                                $correctOptions[] = $options[$index];
                            }
                        @endphp

                        {{-- Tampilkan jawaban yang benar --}}
                        @foreach ($correctOptions as $index => $correctOption)
                            <span class="font-weight-bold">
                                {{ $correctAnswers[$index] }}. {{ $correctOption }}
                            </span>
                            {{-- Tampilkan koma untuk pemisah jika masih ada jawaban yang tersisa --}}
                            @if ($index < count($correctOptions) - 1)
                                <br>
                            @endif
                        @endforeach

                        <p class="mt-3 text-justify">
                            {!! $item->discussion !!}
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

    /* input[type=checkbox] {
        height: 20px;
        width: 20px;
        border: 2px solid #c9c9c9;
        background-color: #dedbdb;

    } */

    input[type="checkbox"] {
        visibility: hidden;
        position: absolute;
    }

    input[type="checkbox"]+label:before {
        height: 14px;
        width: 14px;
        margin-right: 10px;
        content: " ";
        display: inline-block;
        vertical-align: baseline;
        border: 1px solid #bababa;
    }

    input[type="checkbox"]:checked+label:before {
        background-color: rgb(214, 214, 214);
    }

    input[type="checkbox"]+label:before {
        border-radius: 50%;
    }
</style>
