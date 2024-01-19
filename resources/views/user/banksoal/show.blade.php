@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <ol class="breadcrumb bg-light px-3">
        @foreach ($breadcrumbs as $label => $url)
            @if ($url)
                <li class="breadcrumb-item"><a href="{{ $url }}" class="text-decoration-none">{{ $label }}</a>
                </li>
            @else
                <li class="breadcrumb-item active" aria-current="page">{{ $label }}</li>
            @endif
        @endforeach
    </ol>

    <div class="pb-5">
        <div class="row py-3">
            <div class="col-12">
                <div class="card p-4 bg-purple border-0 rounded-4 mb-3 text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title fs-5 font-weight-bold">{{ $banksoal->title }}</h5>
                            <small><a href="" class="btn btn-sm btn-outline-light"><i
                                        class="fa-solid fa-download me-2"></i>Download
                                    Soal</a>
                            </small>
                        </div>
                        <p class="m-0 p-0">{!! $banksoal->desc !!}</p>
                        <span
                            class="badge bg-warning badge-pill p-1 px-2 mr-1 text-white">{{ $banksoal->banksoalQuestions->count() }}
                            soal</span>
                        <span class="badge bg-warning badge-pill p-1 px-2 mr-1 text-white">
                            {{ $banksoal->level == 1 ? 'Mudah' : ($banksoal->level == 2 ? 'Medium' : 'Sulit') }}
                        </span>
                        <span class="badge bg-warning badge-pill p-1 px-2 mr-1 text-white"><i
                                class="fa-solid fa-coins pe-1"></i>{{ $banksoal->banksoalQuestions->sum('point') }}
                            XP</span>
                    </div>
                </div>
            </div>

            @if ($latestExam)
                <div class="col-md-6">
                    <div class="card rounded-4">
                        <div class="card-body">
                            <p class="card-title border-bottom pb-1 font-weight-bold">Histori Pengerjaan</p>
                            @if ($latestExam)
                                <div class="d-flex justify-content-between bg-body-secondary rounded-3 px-3 py-2">

                                    <p class="m-0 info-estimated"> {{ $latestExam->created_at }}</p>

                                    <p class="m-0 info-estimated">
                                        <i class="fa-regular fa-clock me-2"></i>{{ $latestExam->timed }}
                                    </p>

                                </div>
                                <div class="d-flex justify-content-between my-3 px-3">
                                    <div class="count-benar">Benar<span class="text-success font-weight-bold">
                                            {{ $latestExam->benarCount ?? 0 }}</span></div>
                                    <div class="count-benar">Salah<span class="text-danger font-weight-bold">
                                            {{ $latestExam->salahCount ?? 0 }}</span></div>
                                    <div class="pointGet">Nilai <span class="font-weight-bold">
                                            {{ $latestExam->nilai }}</span>
                                    </div>
                                </div>
                            @else
                                <p class="card-text">Belum ada riwayat pengerjaan.</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card rounded-4">
                        <div class="card-body">
                            Nilaimu berada <span class="font-weight-bold"> di bawah rata-rata</span>.
                            Kamu dapat mencoba kembali dan memperbaiki hasil latihanmu!
                            <div class="col-12 pt-3 d-flex justify-content-end mt-4">
                                <button class="btn btn-m btn-secondary rounded-4 me-2">Ulangi Latihan</button>
                                <button class="btn btn-m btn-primary rounded-4">Lihat Pembahasan</button>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-md-6">
                    <div class="card rounded-4">
                        <div class="card-body">
                            <div
                                class="d-flex justify-content-between align-items-center bg-primary-subtle px-3 py-2 rounded-3">
                                <p class="m-0 info-estimated"><i class="fa-regular fa-clock me-2"></i>Estimasi Pengerjaan
                                </p>
                                <p class="m-0 info-estimated">{{ $banksoal->estimated_duration }} menit</p>
                            </div>

                            <p class="card-title border-bottom pt-3 pb-1 font-weight-bold">Topik yang diuji</p>
                            <ul>
                                <li>{{ $banksoal->topic }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card rounded-4">
                        <div class="card-body">
                            <p class="card-title border-bottom pb-1 font-weight-bold">Histori Pengerjaan</p>
                            @if ($latestExam)
                                <div class="d-flex justify-content-between bg-body-secondary rounded-3 px-3 py-2">

                                    <p class="m-0 info-estimated"> {{ $latestExam->created_at }}</p>

                                    <p class="m-0 info-estimated">
                                        <i class="fa-regular fa-clock me-2"></i>{{ $latestExam->timed }}
                                    </p>

                                </div>
                                <div class="d-flex justify-content-between my-3 px-3">
                                    <div class="count-benar">Benar<span class="text-success font-weight-bold">
                                            {{ $latestExam->benarCount ?? 0 }}</span></div>
                                    <div class="count-benar">Salah<span class="text-danger font-weight-bold">
                                            {{ $latestExam->salahCount ?? 0 }}</span></div>
                                    <div class="pointGet">Nilai <span class="font-weight-bold">
                                            {{ $latestExam->nilai }}</span>
                                    </div>
                                </div>
                            @else
                                <p class="card-text">Belum ada riwayat pengerjaan.</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endif


            @if ($latestExam)
            @else
                <div class="col-12 pt-3 ">
                    <a href="/banksoal/{{ $banksoal->slug }}/exercise"
                        class="btn btn-primary rounded-4 font-weight-bold py-2 w-100 shadow">Mulai mengerjakan</a>
                </div>
            @endif
        </div>
    </div>
@endsection

<style>
    .info-estimated {
        font-size: 14px;
    }
</style>
