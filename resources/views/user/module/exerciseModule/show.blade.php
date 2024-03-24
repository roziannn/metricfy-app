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

    <div class="row">
        <div class="col-md-3 mb-3">
            <div class="d-flex flex-wrap">
                @foreach ($exerciseModule as $item)
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
            @foreach ($exerciseModule as $item)
                <div class="card card-questions mb-3" id="item{{ $loop->index }}" style="display: none;">
                    <input type="hidden" name="exercise_id" value="{{ $item->id }}">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="col-sm-3 px-0 card-title font-weight-bold">Soal {{ $loop->index + 1 }}</h6>
                            <div class="col-sm-3 px-0 card-title text-end">
                                <span
                                    class="badge badge-pill {{ isset($userAlreadyAnswer[$item->id]) ? 'bg-body-secondary' : 'bg-warning' }} p-2 small">
                                    <i class="fa-solid fa-coins pe-1"></i>{{ $item->point }} xp
                                </span>
                            </div>
                        </div>
                        <p class="card-text">{!! $item->question !!}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="col-md-6">
            @foreach ($exerciseModule as $item)
                <div class="card card-options mb-3" id="options{{ $loop->index }}" style="display: none;">
                    <input type="hidden" name="exercise_id" value="{{ $item->id }}">
                    <div class="card-body">
                        <form
                            action="{{ route('submitAnswer', ['slug' => $item->module->slug, 'exerciseId' => $item->id]) }}"
                            method="post" class="m-0">
                            @csrf
                            @foreach (json_decode($item->options) as $optionIndex => $option)
                                <div class="form-check">
                                    @php
                                        $questionId = $item->id;
                                        $answerKey = (string) $questionId;
                                        $answerData = isset($userAlreadyAnswer[$answerKey])
                                            ? json_decode($userAlreadyAnswer[$answerKey], true)
                                            : null;
                                        $isAnswered = $answerData ? $answerData[$questionId]['answer'] : null;
                                        $isChecked = $isAnswered && in_array(chr(65 + $optionIndex), $isAnswered);
                                        $isDisabled = $isAnswered && !in_array(chr(65 + $optionIndex), $isAnswered);
                                    @endphp

                                    <input class="form-check-input" type="checkbox"
                                        name="answers[{{ $item->id }}][answer][]" value="{{ chr(65 + $optionIndex) }}"
                                        data-question-number="{{ $loop->index }}" {{ $isChecked ? 'checked' : '' }}
                                        {{ $isDisabled ? 'disabled' : '' }}>
                                    <label class="form-check-label">
                                        {{ chr(65 + $optionIndex) }} . {{ $option }}
                                    </label>
                                    @if ($isChecked)
                                        @if (!$item->is_correct)
                                            <p class="my-2 p-2 text-isCorrect bg-success">(Jawabanmu benar!) <i
                                                    class="fa-solid fa-check text-light ms-2 rounded"></i></p>
                                        @else
                                            <p class="my-2 p-2 text-isCorrect bg-danger">(Jawabanmu salah!) <i
                                                    class="fa-solid fa-xmark text-light ms-2 rounded"></i></p>
                                        @endif
                                    @endif
                                </div>
                            @endforeach

                            @unless (isset($userAlreadyAnswer[$item->id]))
                                <div class="text-start pt-3">
                                    <button type="submit" class="btn btn-sm btn-primary col-sm-12">Kirim Jawaban</button>
                                </div>
                            @endunless
                            @if (isset($userAlreadyAnswer[$item->id]))
                                <div class="card-footer bg-white">
                                    <div class="row">
                                        <span class="text-muted px-0">Pembahasan soal</span>

                                        <span class="font-weight-bold px-0 mb-3">Jawaban yang tepat:</span>


                                        <span class="p-0">

                                            {!! $item->discussion !!}
                                        </span>
                                    </div>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

<script>
    function showQuestion(index) {
        document.querySelectorAll('.card-questions').forEach(card => card.style.display = 'none');
        document.querySelectorAll('.card-options').forEach(card => card.style.display = 'none');

        document.getElementById('item' + index).style.display = 'block';
        document.getElementById('options' + index).style.display = 'block';

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
    .alert-container {
        position: absolute;
        z-index: 1000;
        width: 100%;
        height: 0;
    }

    .custom-alert {
        width: 100%;
    }

    .btn-outline-primary:hover {
        background-color: #007bff;
        color: #fff;
    }

    #alreadyAnswer {
        opacity: 70%;
        color:
    }

    .text-isCorrect {
        font-size: 15px;
        font-weight: 500;
        color: #fff;
        border-radius: 8px;
        opacity: 85%;
    }
</style>
