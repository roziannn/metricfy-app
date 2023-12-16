@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <div class="pb-5">
        <div class="row py-3">
            <div class="col-12">
                <div class="card p-4 bg-primary bg-gradient mb-3 text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title fs-5 font-weight-bold">Literasi Pendahuluan - 1</h5>
                            <a href="" class="btn btn-outline-light "><i class="fa-solid fa-download me-2"></i>Download
                                Soal</a>
                        </div>
                        <P>Basic pengantar literasi</P>
                        <span class="badge badge-warning badge-pill p-2 mr-2 text-white">10 Soal</span>
                        <span class="badge badge-warning badge-pill p-2 mr-2 text-white">Mudah</span>
                        <span class="badge badge-warning badge-pill p-2 mr-2 text-white"><i
                                class="fa-solid fa-coins pe-1"></i>500
                            XP</span>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center bg-primary-subtle px-3 py-2 rounded-3">
                            <p class="m-0"><i class="fa-regular fa-clock me-2"></i>Estimasi Pengerjaan</p>
                            <p class="m-0">0 jam 30 menit</p>
                        </div>
                        
                        <p class="card-title border-bottom pt-3">Topik yang diuji</p>
                        <p class="card-text">Pengenalan Literasi</p>
                        <p class="card-text">Pengenalan Literasi</p>
                        <p class="card-text">Pengenalan Literasi</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title border-bottom">Histori Pengerjaan</p>

                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 pt-5">


                <button class="btn btn-dark w-100">Mulai mengerjakan</button>
            </div>
        </div>
    </div>
@endsection
