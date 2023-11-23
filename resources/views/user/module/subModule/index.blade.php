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
        {{ $submodule->title }}
    </h5>


    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-8 my-3 pr-3 p-0">
                @php
                    $embed = 'https://www.youtube.com/embed/';
                    $youtube = $submodule->video_embed;

                    $url = $embed . $youtube;
                @endphp

                {{-- Gunakan sintaks Blade untuk menyusun iframe --}}
                <iframe width="100%" height="360" src="{{ $url }}" title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
                <p class="pt-3 text-justify">{{ $submodule->content }}</p>
            </div>
            <div class="col-md-4 m-0 p-0 py-3">
                <div class="card">
                    <div class="card-body">
                        <li class="d-flex justify-content-between align-items-center py-2">
                            A list item
                        </li>
                        <li class="d-flex justify-content-between align-items-center py-2">
                            A second list item
                        </li>
                        <li class="d-flex justify-content-between align-items-center py-2">
                            A third list item
                        </li>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
