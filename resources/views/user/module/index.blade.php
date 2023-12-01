@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <div class="pb-5">
        {{-- <div class="sub-text pb-3">
            <h4>Belajar Numerasi #dari Nol</h4>
        </div>
        <div class="card text-center" style="background-image: url('img/gracia1.jpg'); background-size: cover; height:220px;">
            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                <h5 class="card-title text-white">Basic Matematika</h5>
                <p class="card-text text-white">Pengantar Matematika Dasar</p>
                <a href="/materi-belajar/numerasi-dasar-matematika" class="btn btn-primary">Mulai Belajar</a>
            </div>
        </div> --}}
        <div class="row py-3">
            @foreach ($data_module as $module)
                <div class="col-12 col-md-3 mb-4">
                    <div class="card white-bg">
                        <img src="{{ asset('img/module/' . $module->thumbnail) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a href="/materi-belajar/{{ $module->slug }}" class="card-title-name">
                                <span class="card-title fs-6 text-dark">{{ $module->title }}</span>
                            </a>
                            <div class="d-flex justify-content-between">
                                <small></small>
                                <strong class="text-tag rounded bg-warning"></strong>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
