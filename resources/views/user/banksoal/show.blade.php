@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <ol class="breadcrumb bg-white px-3">
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
        <div class="row">
            <div class="col-12">
                <div class="card bg-purple border-0 rounded-3 py-4 mb-3 text-white">
                    <div class="card-body">
                        <h5 class="card-title fs-5 font-weight-bold">{{ $banksoal->title }}</h5>

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
                <div class="col-md-6 mb-3">
                    <div class="card">
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
                                            {{ $latestExam->nilai }}/{{ $latestExam->totalSoal }}</span>
                                    </div>
                                </div>
                            @else
                                <p class="card-text">Belum ada riwayat pengerjaan.</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card rounded-3">
                        <div class="card-body">
                            {{ $latestExam->evaluasiExam }}
                            <div class="col-12 pt-3 d-flex justify-content-end mt-4">
                                <button class="btn btn-sm btn-secondary me-2" data-bs-toggle="modal"
                                    data-bs-target="#ulangiModal">Ulangi Latihan</button>
                                <button class="btn btn-sm btn-primary " data-bs-toggle="modal"
                                    data-bs-target="#pembahasanModal">Lihat Pembahasan</button>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-md-6 mb-3">
                    <div class="card rounded-3">
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


    {{-- ulangi latihan modal --}}
    <div class="modal fade" id="ulangiModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title fs-6 font-weight-bold" id="exampleModalLabel">Ulangi Latihan</p>
                </div>
                <div class="modal-body">

                    Kerjakan lagi paket soal ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-light me-3" data-bs-dismiss="modal">Batal</button>

                    <a href="/banksoal/{{ $banksoal->slug }}/exercise" class="btn btn-sm btn-primary">
                        Ya,
                        ulangi</a>
                </div>
            </div>
        </div>
    </div>

    {{-- lihat pembahasan latihan modal --}}
    <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="pembahasanModal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <p class="modal-title fs-5 font-weight-bold" id="exampleModalLabel">Lihat Pembahasan?</p>
                </div>
                <div class="modal-body">
                    Kamu tidak bisa mendapatkan poin lagi ketika mengerjakan soal ini jika sudah melihat pembahasan soal.
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-sm me-3 btn-light" data-bs-dismiss="modal">Batal</button>

                    <a href="/banksoal/{{ $banksoal->slug }}/exercise" class="btn btn-sm btn-primary">
                        Ya,
                        lihat pembahasan</a>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .info-estimated {
        font-size: 14px;
    }
</style>
