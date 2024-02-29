@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <div class="pb-5">
        {{-- @include('user.module.partials.hero-show-module') --}}
        @include('user.module.partials.about-show-module')
        @include('user.module.partials.subMateri-show-module')
    @endsection
