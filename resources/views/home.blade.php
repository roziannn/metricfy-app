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


{{-- @foreach ($data as $item )
    

@if(auth()->check())
    @if(auth()->user()->id == $item->id)
        <p>{{ $item->kelas }}</p>
    @else
        <!-- Pengecekan lebih lanjut di dalam blok else -->
        @if(auth()->user()->kelas == isNotNull)
            <!-- Tambahkan logika khusus jika pengguna adalah admin -->
            <p>Anda adalah seorang admin.</p>
        @else
            <p>Anda tidak memiliki hak akses untuk melihat data ini.</p>
        @endif
    @endif
@else
    <p>Silakan login untuk melihat data.</p>
@endif

@endforeach --}}

@include('partials.hero-preview')
@include('partials.feature-preview')
@include('partials.materi-preview')
@include('partials.leaderboard-preview')
@include('partials.program-preview')
@include('partials.blog-preview')
@endsection