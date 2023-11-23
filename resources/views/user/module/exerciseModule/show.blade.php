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
            <div class="card-body">
                <h5 class="card-title">Soal {{ $loop->index + 1 }}</h5>
                <p class="card-text">{{ $item->question }}</p>

                @foreach (json_decode($item->options) as $option)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="answer"
                            id="answer{{ $loop->index + 1 }}" value="{{ $option }}">
                        <label class="form-check-label" for="answer{{ $loop->index + 1 }}">
                            {{ $option }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
@endsection

<script>
  function showQuestion(index) {
      document.querySelectorAll('.card').forEach(card => card.style.display = 'none');
      document.getElementById('item' + index).style.display = 'block';
  }
</script>

