@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <div class="pt-5"></div>
    <ol class="breadcrumb bg-light px-3">
        @foreach ($breadcrumbs as $label => $url)
            @if ($url)
                <li class="breadcrumb-item"><a href="{{ $url }}" class="text-decoration-none">{{ $label }}</a>
                </li>
            @else
                <li class="breadcrumb-item active" aria-current="page">{{ $label }}</li>
            @endif
        @endforeach
    </ol>

    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-8 px-0 my-3 pr-lg-3">
                <div class="card p-3 rounded-3">
                    @php
                        $embed = 'https://www.youtube.com/embed/';
                        $youtube = $submodule->video_embed;

                        $url = $embed . $youtube;
                    @endphp
                    <h5>
                        {{ $submodule->title }}
                    </h5>
                    @if ($submodule->video_embed != null && $submodule->video_embed !== '')
                        <iframe width="100%" height="360" src="{{ $url }}" title="YouTube video player"
                            frameborder="0" id="player"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen class="rounded-4"></iframe>
                        <p class="text-justify pt-3">{{ $submodule->content }}</p>
                    @else
                        <p class="text-justify bg-white">{!! $submodule->content !!}</p>
                    @endif
                </div>
            </div>
            @include('user.module.partials.subMateri-playlist-module')
        </div>
    </div>
@endsection
