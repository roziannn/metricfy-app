@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <div class="pb-5">
        <div class="row py-3">
            @foreach ($data_module as $module)
                <div class="col-12 col-md-3 mb-4">
                    <div class="card white-bg">
                        <img src="{{ asset('img/module/' . $module->thumbnail) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a href="/materi-belajar/{{ $module->slug }}" class="card-title-name text-decoration-none">
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
