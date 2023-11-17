@extends('layouts.main')
@include('partials.navbar')
@section('container')

@if (session()->has('loginError'))
<div class="alert alert-danger alert-dismissible fade show" role="alert" style="width:100% ;">
    {{ session('loginError') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if (session()->has('successRegister'))
<div class="alert alert-success alert-dismissible fade show" role="alert" style="width:100% ;">
    {{ session('successRegister') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@include('partials.hero-preview')
@include('partials.feature-preview')
@include('partials.materi-preview')
@include('partials.program-preview')
@include('partials.blog-preview')
@endsection