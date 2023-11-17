@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <div class="pb-5">
        @include('page.study.partials.hero-show-study')
        @include('page.study.partials.about-show-study')
        @include('page.study.partials.subMateri-show-study')
    </div>
@endsection
