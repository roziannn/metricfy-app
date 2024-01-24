@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <div class="pb-5">
        <div class="row py-3">
            <h4 class="font-weight-bolder py-3">Kumpulan game yang bisa kamu coba! 🔢</h4>
            <div class="col-6 col-md-3 mb-4">
                <a href="/games/guess-the-number" class="card-title-name text-decoration-none">
                    <div class="card rounded-4 border-0">
                        <img src="{{ asset('img/games/guessTheNumber.png') }}" class="card-img-top " alt="...">
                        <div class="card-body">
                            <h6 class="card-title font-weight-bold text-dark p-0 m-0">Guess The Number❓ <br> Angka 1
                                sampai 100
                            </h6>
                            <div class="d-flex justify-content-between">
                                <small></small>
                                <strong class="text-tag rounded bg-warning"></strong>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-3 mb-4">
                <a href="/games/guess-the-number" class="card-title-name text-decoration-none">
                    <div class="card rounded-4 border-0">
                        <img src="{{ asset('img/module/struktur-naratif-1703045818.png') }}" class="card-img-top "
                            alt="...">
                        <div class="card-body">
                            <h6 class="card-title font-weight-bold text-dark p-0 m-0">Guess The Number❓ <br> Angka 1
                                sampai 100
                            </h6>
                            <div class="d-flex justify-content-between">
                                <small></small>
                                <strong class="text-tag rounded bg-warning"></strong>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-3 mb-4">
                <a href="/games/guess-the-number" class="card-title-name text-decoration-none">
                    <div class="card rounded-4 border-0">
                        <img src="{{ asset('img/module/struktur-naratif-1703045818.png') }}" class="card-img-top "
                            alt="...">
                        <div class="card-body">
                            <h6 class="card-title font-weight-bold text-dark p-0 m-0">Guess The Number❓ <br> Angka 1
                                sampai 100
                            </h6>
                            <div class="d-flex justify-content-between">
                                <small></small>
                                <strong class="text-tag rounded bg-warning"></strong>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-3 mb-4">
                <a href="/daily-games/guess-the-number" class="card-title-name text-decoration-none">
                    <div class="card rounded-4 border-0">
                        <img src="{{ asset('img/module/struktur-naratif-1703045818.png') }}" class="card-img-top "
                            alt="...">
                        <div class="card-body">
                            <h6 class="card-title font-weight-bold text-dark p-0 m-0">Guess The Number❓ <br> Angka 1
                                sampai 100
                            </h6>
                            <div class="d-flex justify-content-between">
                                <small></small>
                                <strong class="text-tag rounded bg-warning"></strong>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
