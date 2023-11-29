@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <ol class="breadcrumb">
        @foreach ($breadcrumbs as $label => $url)
            @if ($url)
                <li class="breadcrumb-item"><a href="{{ $url }}">{{ $label }}</a></li>
            @else
                <li class="breadcrumb-item active" aria-current="page">{{ $label }}</li>
            @endif
        @endforeach
    </ol>

    <div class="d-flex justify-content-start mb-3">
        @foreach ($exerciseModule as $item)
            <button class="btn btn-outline-primary mx-2" onclick="showQuestion({{ $loop->index }})">
                {{ $loop->index + 1 }}
            </button>
        @endforeach
    </div>

    @foreach ($exerciseModule as $item)
        <div class="card mb-3" id="item{{ $loop->index }}" style="display: none;">
            <input type="hidden" name="exercise_id" value="{{ $item->id }}">
            <div class="alert-container">
                @if (session('message'))
                    <div class="alert custom-alert {{ strpos(session('message'), 'Benar') !== false ? 'alert-success' : 'alert-danger' }} d-flex align-items-center justify-content-between"
                        id="alert" role="alert">
                        <div>
                            @if (strpos(session('message'), 'Benar') == false)
                                <i class="fas fa-triangle-exclamation px-2"></i>
                            @endif
                            {{ session('message') }}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>

            <div class="card-body">
                <h5 class="card-title">Soal {{ $loop->index + 1 }}</h5>
                <p class="card-text">{{ $item->question }}</p>
                @foreach (json_decode($item->options) as $option)
                    <form action="{{ route('submitAnswer', ['slug' => $item->module->slug, 'exerciseId' => $item->id]) }}"
                        method="post">
                        @csrf
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answer" id="answer{{ $loop->index + 1 }}"
                                value="{{ chr(64 + $loop->index + 1) }}">
                            <label class="form-check-label" for="answer{{ $loop->index + 1 }}">
                                {{ chr(64 + $loop->index + 1) }} . {{ $option }}
                            </label>
                        </div>
                @endforeach
                <div class="text-start">
                    <button type="submit" class="btn btn-m btn-primary col-md-2 col-sm-12">Kirim Jawaban</button>
                </div>
                </form>
            </div>
        </div>
    @endforeach
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        function showQuestion(index) {
            document.querySelectorAll('.card').forEach(card => card.style.display = 'none');
            document.getElementById('item' + index).style.display =
                'block'; // show specific question card by index

            sessionStorage.setItem('selectedCardIndex',
                index); // Store the selected card index in a session or localStorage
        }

        const selectedCardIndex = parseInt(sessionStorage.getItem('selectedCardIndex')) || 0;

        showQuestion(selectedCardIndex);

        document.querySelectorAll('.btn-outline-primary').forEach(function(button, index) {
            button.addEventListener('click', function() {
                showQuestion(index);

                document.querySelectorAll('.btn-outline-primary').forEach(btn => btn.classList
                    .remove('active'));
                button.classList.add('active');
            });
        });
    });
</script>
<style>
    .alert-container {
        position: relative;
        height: 0;
    }

    .custom-alert {
        position: absolute;
        z-index: 1000;
        width: 100%;
    }
    
    .btn-outline-primary:hover {
        background-color: #007bff;
        color: #fff;
    }
</style>
