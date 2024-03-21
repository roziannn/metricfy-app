@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <div class="pt-5"></div>
    <ol class="breadcrumb bg-light m-0">
        @foreach ($breadcrumbs as $label => $url)
            @if ($url)
                <li class="breadcrumb-item"><a href="{{ $url }}" class="text-decoration-none">{{ $label }}</a>
                </li>
            @else
                <li class="breadcrumb-item active" aria-current="page">{{ $label }}</li>
            @endif
        @endforeach
    </ol>
    <div class="pb-5">
        {{-- @include('user.module.partials.hero-show-module') --}}
        @include('user.module.partials.about-show-module')
        @include('user.module.partials.subMateri-show-module')
    @endsection
