@extends('layouts.main')
@include('partials.navbar')
<div class="pt-4">
    <div class="px-lg-3 px-sm-0 bg-body-secondary">
        <div class="container">
            <div class="py-lg-5 py-3">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md-6 my-3">
                        <h1 class="fw-bold text-dark">Kumpulan Soal Numerasi <br></h1>
                        <p class="col-sm-12 px-0 text-dark">Kamu bisa akses seluruh module berikut untuk mulai belajar
                            numerasi
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row pt-4">
        @foreach ($banksoal as $item)
            {{-- <h4 class="font-weight-bolder py-3">Kumpulan Soal Numerasi</h4> --}}
            <div class="col-sm-12 col-md-4 mb-4">
                <a href="/banksoal/{{ $item->slug }}" class="text-decoration-none">
                    <div class="card rounded-3 shadow border-0">
                        <div class="card-body ">
                            <h5 class="card-title fs-6 font-weight-bold">{{ $item->title }}</h5>
                            <p>{!! $item->desc !!}</p>
                            <div class="my-3 ">
                                <small class="badge bg-warning badge-pill p-1 px-2 mr-1 text-white">
                                    {{ $item->banksoalQuestions->count() }} Soal</small>
                                <small
                                    class="badge {{ $item->level == 1 ? 'bg-success' : ($item->level == 2 ? 'bg-primary' : 'bg-danger') }} badge-pill p-1 px-2 mr-1 text-white">
                                    {{ $item->level == 1 ? 'Mudah' : ($item->level == 2 ? 'Medium' : 'Sulit') }}
                                </small>

                                <small class="badge bg-warning badge-pill p-1 px-2 mr-1 text-white"><i
                                        class="fa-solid fa-coins pe-1"></i>
                                    {{ $item->banksoalQuestions->sum('point') }} xp</small>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
