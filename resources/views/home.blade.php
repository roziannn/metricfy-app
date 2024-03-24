<link rel="shortcut icon" sizes="114x114" href="{{ asset('img/bxMath.png') }}">
@extends('layouts.main')
@include('partials.navbar')
@include('partials.hero-preview')
@section('container')
    @include('partials.intro-preview')
    @include('partials.materi-preview')
    @include('partials.program-preview')
    @include('partials.leaderboard-preview')
    @include('partials.blog-preview')
@endsection
