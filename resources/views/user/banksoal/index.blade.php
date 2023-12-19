@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <div class="pb-5">
        <div class="row py-3">
            <h5 class="font-weight-bolder py-3">Kumpulan Soal Literasi Bahasa Indonesia</h5>
            <p class="font-weight-bold">Level 0 </p>
            @foreach ($banksoal as $item)
                <div class="col-sm-12 col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body bg-light">
                            <h5 class="card-title fs-6 font-weight-bold">{{ $item->title }}</h5>
                            <P>{!! $item->desc !!}</P>
                            <div class="my-3">
                                <span class="badge badge-warning badge-pill p-2 mr-2 text-white">
                                    {{ $item->banksoalQuestions->count() }} Soal</span>
                                <span class="badge badge-warning badge-pill p-2 mr-2 text-white">
                                    {{ $item->level == 1 ? 'Mudah' : ($item->level == 2 ? 'Medium' : 'Sulit') }}
                                </span>
                                <span class="badge badge-warning badge-pill p-2 mr-2 text-white"><i
                                        class="fa-solid fa-coins pe-1"></i>
                                    {{ $item->banksoalQuestions->sum('point') }}</span>
                            </div>
                            <a href="/banksoal/{{ $item->slug }}">
                                <button class="btn btn-m btn-warning text-white w-100">Kerjakan</button>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
            <p class="font-weight-bold">Level 1</p>
            <p class="font-weight-bold">Level 2</p>
        </div>
    </div>
@endsection
