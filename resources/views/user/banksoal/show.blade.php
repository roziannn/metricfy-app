@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <div class="pb-5">
        <div class="row py-3">
            <div class="col-12">
                <div class="card p-4 bg-primary bg-gradient mb-3 text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title fs-5 font-weight-bold">{{ $banksoal->title }}</h5>
                            <a href="" class="btn btn-sm btn-outline-light "><i class="fa-solid fa-download me-2"></i>Download
                                Soal</a>
                        </div>
                        <p class="m-0 p-0">{!! $banksoal->desc !!}</p>
                        <span class="badge badge-warning badge-pill p-2 mr-2 text-white">{{ $banksoal->banksoalQuestions->count() }} soal</span>
                        <span class="badge badge-warning badge-pill p-2 mr-2 text-white">{{ $banksoal->level }}</span>
                        <span class="badge badge-warning badge-pill p-2 mr-2 text-white"><i
                                class="fa-solid fa-coins pe-1"></i>{{ $banksoal->banksoalQuestions->sum('point') }}
                            XP</span>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center bg-primary-subtle px-3 py-2 rounded-3">
                            <p class="m-0"><i class="fa-regular fa-clock me-2"></i>Estimasi Pengerjaan</p>
                            <p class="m-0">{{ $banksoal->estimated_duration }} menit</p>
                        </div>
                        
                        <p class="card-title border-bottom pt-3 pb-1 font-weight-bold">Topik yang diuji</p>
                       <ul>
                        <li>{{ $banksoal->topic }}</li>
                       </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title border-bottom pb-1 font-weight-bold">Histori Pengerjaan</p>

                        <p class="card-text">Belum ada riwayat pengerjaan.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 pt-5">
                <a href="/banksoal/{{ $banksoal->slug }}/exercise" class="btn btn-dark w-100">Mulai mengerjakan</a>
            </div>
        </div>
    </div>
@endsection
