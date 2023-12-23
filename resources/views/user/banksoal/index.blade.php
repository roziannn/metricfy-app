@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <div class="pb-5">
        <div class="row py-3">
            <h5 class="font-weight-bolder py-3">Kumpulan Soal Literasi</h5>
            @foreach ($banksoal as $item)
                <div class="col-sm-12 col-md-4 mb-4">
                    <a href="/banksoal/{{ $item->slug }}" class="text-decoration-none">
                    <div class="card rounded-4 border-0">
                        <div class="card-body">
                            <h5 class="card-title fs-6 font-weight-bold">{{ $item->title }}</h5>
                            <p>{!! $item->desc !!}</p>
                            <div class="my-3 ">
                                <small class="badge bg-warning badge-pill p-1 px-2 mr-1 text-white">
                                    {{ $item->banksoalQuestions->count() }} Soal</small>
                                    <small class="badge {{ $item->level == 1 ? 'bg-success' : ($item->level == 2 ? 'bg-primary' : 'bg-danger') }} badge-pill p-1 px-2 mr-1 text-white">
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
@endsection
