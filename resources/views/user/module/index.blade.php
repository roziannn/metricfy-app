<link rel="shortcut icon" sizes="114x114" href="{{ asset('img/bxMath.png') }}">
@extends('layouts.main')
@include('partials.navbar')
<div class="pt-4">
    <div class="px-lg-3 px-sm-0 bg-body-secondary">
        <div class="container">
            <div class="py-lg-5 py-3">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md-6 my-3">
                        <h1 class="fw-bold text-dark">Materi Belajar Numerasi<br></h1>
                        <p class="col-sm-12 px-0 text-dark">Kamu bisa akses seluruh module dibawah ini <br> untuk mulai
                            belajar literasi numerasi
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('container')
    <div class="text-left">
        {{-- <h4 class="font-weight-bolder pt-4">Materi Belajar Numerasi</h4> --}}
        @foreach (['Bilangan', 'Geometri', 'Data'] as $category)
            <div class="row rounded-3">
                <p class="fs-5 font-weight-bold pt-3">{{ $category }}</p>
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
