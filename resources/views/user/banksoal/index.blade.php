@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <div class="pb-5">
        <div class="row py-3">
            <h5 class="font-weight-bolder py-3">Kumpulan Soal Literasi Bahasa Indonesia</h5>
            <p class="font-weight-bold">Level 0 </p>
            <div class="col-sm-12 col-md-4 mb-4">
                <div class="card">
                    <div class="card-body bg-light">
                        <h5 class="card-title fs-6 font-weight-bold">Literasi Pendahuluan - 1</h5>
                        <P>Basic pengantar literasi</P>
                        <div class="my-3">
                            <span class="badge badge-warning badge-pill p-2 mr-2 text-white">10 Soal</span>
                            <span class="badge badge-warning badge-pill p-2 mr-2 text-white">Mudah</span>
                            <span class="badge badge-warning badge-pill p-2 mr-2 text-white"><i class="fa-solid fa-coins pe-1"></i>500 XP</span>
                        </div>
                        <a href="/banksoal/mulai">
                        <button class="btn btn-m btn-primary w-100">Kerjakan</button>
                    </a>
                    </div>
                </div>
            </div>
            <p class="font-weight-bold">Level 1</p>
            <p class="font-weight-bold">Level 2</p>
        </div>
    </div>
@endsection
