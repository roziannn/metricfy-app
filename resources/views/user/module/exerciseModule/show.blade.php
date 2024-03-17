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

        <div class="col-md-9">
            @foreach ($exerciseModule as $item)
                <div class="card mb-3" id="item{{ $loop->index }}" style="display: none;">
                    <input type="hidden" name="exercise_id" value="{{ $item->id }}">

                    <div class="card-body">

                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="col-sm-3 px-0 card-title font-weight-bold">Soal {{ $loop->index + 1 }}</h5>
                            <div class="col-sm-3 px-0 card-title text-end"> <span
                                    class="badge badge-pill {{ isset($userAlreadyAnswer[$item->id]) ? 'bg-danger' : 'bg-warning' }} p-2 small"><i
                                        class="fa-solid fa-coins pe-1"></i>{{ $item->point }} xp</span></div>
                        </div>
                        @if (isset($userAlreadyAnswer[$item->id]))
                            <div class="alert alert-primary">
                                <p class="card-text">{{ $item->question }}</p>
                                @foreach (json_decode($item->options) as $option)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="answer"
                                            id="answer{{ $loop->index + 1 }}" value="{{ chr(64 + $loop->index + 1) }}"
                                            @if ($userAlreadyAnswer[$item->id] === chr(64 + $loop->index + 1)) checked 
                                            @elseif ($userAlreadyAnswer[$item->id] && $userAlreadyAnswer[$item->id] !== chr(64 + $loop->index + 1)) disabled @endif>
                                        <label class="form-check-label" for="answer{{ $loop->index + 1 }}">
                                            {{ chr(64 + $loop->index + 1) }} . {{ $option }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <span class="text-muted">Pembahasan soal</span>
                        @else
                            <form
                                action="{{ route('submitAnswer', ['slug' => $item->module->slug, 'exerciseId' => $item->id]) }}"
                                method="post">
                                @csrf
                                @foreach (json_decode($item->options) as $option)
                                    <div class="form-check">
                                        @php
                                            $answerId = $loop->parent->index + 1;
                                            $optionId = $loop->index + 1;
                                            $inputId = "answer{$answerId}_{$optionId}";
                                            $isAnswered = in_array($item->id, $userAlreadyAnswer);
                                        @endphp
                                        <input class="form-check-input" type="radio" name="answer"
                                            id="{{ $inputId }}" value="{{ chr(64 + $optionId) }}"
                                            @if ($isAnswered && $isAnswered->is_correct) disabled @endif>
                                        <label class="form-check-label" for="{{ $inputId }}">
                                            {{ chr(64 + $optionId) }} . {{ $option }}
                                        </label>
                                    </div>
                                @endforeach
                                <div class="text-start pt-3">
                                    <button type="submit" class="btn btn-m btn-primary col-md-3 col-sm-12">Kirim
                                        Jawaban</button>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

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
</style>
