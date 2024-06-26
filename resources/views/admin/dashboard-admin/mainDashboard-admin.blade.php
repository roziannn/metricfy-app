@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <div class="pt-5"></div>
    <div class="row">
        @include('admin.partials.miniSidemenu-dashboard-admin')
        <div class="col-lg-9 col-md-12 mb-5">
            <div class="card card-content border-0 shadow-sm p-3">
                <div class="text-muted text-start">
                    <h5 class="">Dashboard Admin</h5>
                    @php
                        $nowTime = Carbon\Carbon::now();
                        echo $nowTime->format('l, j F Y, H:i');
                    @endphp
                </div>
                <div class="col-lg-12 mt-4">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <div class="col">
                            <div class="card bg-primary mb-3" style="max-width: 15rem;">
                                <div class="card-body text-white">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <div class="card-body-icon">
                                            <i class="fa-solid fa-2xl fa-users mr-3"></i>
                                        </div>
                                        <div class="card-body-info">
                                            <p class="card-title m-0 p-0">USER AKTIF</p>
                                            <h5 class="card-text font-weight-bolder">{{ $userCount }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card bg-danger mb-3" style="max-width: 15rem;">
                                <div class="card-body text-white">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <div class="card-body-icon">
                                            <i class="fa-solid fa-book fa-2xl mr-3"></i>
                                        </div>
                                        <div class="card-body-info">
                                            <p class="card-title m-0 p-0">MATERI BELAJAR</p>
                                            <h5 class="card-text font-weight-bolder">{{ $moduleCount }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card bg-secondary mb-3" style="max-width: 15rem;">
                                <div class="card-body text-white">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <div class="card-body-icon">
                                            <i class="fa-solid fa-book fa-2xl mr-3"></i>
                                        </div>
                                        <div class="card-body-info">
                                            <p class="card-title m-0 p-0">BANKSOAL</p>
                                            <h5 class="card-text font-weight-bolder">{{ $banksoalCount }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card bg-success mb-3" style="max-width: 15rem;">
                                <div class="card-body text-white">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <div class="card-body-icon">
                                            <i class="fa-solid fa-newspaper fa-2xl mr-3"></i>
                                        </div>
                                        <div class="card-body-info">
                                            <p class="card-title m-0 p-0">ARTIKEL BLOG</p>
                                            <h5 class="card-text font-weight-bolder">{{ $blogCount }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
