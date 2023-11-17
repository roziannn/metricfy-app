@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <div class="pb-5">
        <div class="sub-text pb-3">
            <h4>Belajar Numerasi #dari Nol</h4>
        </div>
        <div class="card text-center" style="background-image: url('img/gracia1.jpg'); background-size: cover; height:220px;">
            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                <h5 class="card-title text-white">Basic Matematika</h5>
                <p class="card-text text-white">Pengantar Matematika Dasar</p>
                <a href="/materi-belajar/numerasi-dasar-matematika" class="btn btn-primary">Mulai Belajar</a>
            </div>
        </div>
    </div>
@endsection
