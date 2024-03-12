@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <div class="pb-5 text-center">
        <h4 class="font-weight-bolder py-3">Materi Belajar Numerasi</h4>
        @foreach (['Bilangan', 'Geometri', 'Data'] as $category)
            <div class="row rounded-3 p-3 bg-white mb-5">
                <p class="fs-5 font-weight-bold py-3">{{ $category }}</p>
                @foreach ($data_module as $module)
                    @if ($module->category === $category)
                        <div class="col-6 col-sm-4 col-lg-3 col-md-4 mb-4">
                            <a href="/materi-belajar/{{ $module->slug }}">
                                <div class="card shadow rounded-4 border-0">
                                    <img src="{{ asset('img/module/' . $module->thumbnail) }}" class="card-img-top"
                                        alt="...">
                                    <div class="card-body p-2 my-2">
                                        <a href="/materi-belajar/{{ $module->slug }}"
                                            class="card-title-name text-decoration-none">
                                            <p class="font-weight-bold text-dark p-0 m-0">{{ $module->title }}</p>
                                        </a>
                                        <div class="d-flex justify-content-between">
                                            <small></small>
                                            <strong class="text-tag rounded bg-warning"></strong>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        @endforeach
    </div>
@endsection
