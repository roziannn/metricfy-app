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

<h5>
{{ $submodule->title}}
</h5>

<p>{{ $submodule->content }}</p>

@endsection
