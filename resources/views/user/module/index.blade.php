@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <div class="pb-5">
        <div class="row py-3">
            <h4 class="font-weight-bolder py-3">Materi Belajar Numerasi</h4>
            @foreach ($data_module as $module)
                <div class="col-12 col-md-3 mb-4">
                    <a href="/materi-belajar/{{ $module->slug }}">
                        <div class="card rounded-4 border-0">
                            <img src="{{ asset('img/module/' . $module->thumbnail) }}" class="card-img-top " alt="...">
                            <div class="card-body">
                                <a href="/materi-belajar/{{ $module->slug }}" class="card-title-name text-decoration-none">
                                    <h6 class="card-title font-weight-bold text-dark p-0 m-0">{{ $module->title }}</h6>
                                </a>
                                <div class="d-flex justify-content-between">
                                    <small></small>
                                    <strong class="text-tag rounded bg-warning"></strong>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
