@extends('layouts.main')
@include('partials.navbar')
@section('container')
    {{-- @if (session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="width:100% ;">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session()->has('successRegister'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width:100% ;">
            {{ session('successRegister') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session()->has('successUpdate'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width:100% ;">
            {{ session('successUpdate') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session()->has('successDelete'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width:100% ;">
            {{ session('successDelete') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif --}}

    <div class="row">
        @include('admin.partials.miniSidemenu-dashboard-admin')
        <div class="col-lg-9 col-md-12 mb-5">
            <div class="card card-content p-3">
                <div class="fs-5">All data</div>
                <div class="col-lg-12 mt-4">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <div class="col">
                            <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                                <div class="card-body">
                                  <h6 class="card-title">User Aktif</h6>
                                  <p class="card-text">{{ $userCount }}</p>
                                </div>
                              </div>
                        </div>
                        <div class="col">
                            <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                                <div class="card-body">
                                  <h6 class="card-title">Materi Belajar Aktif</h6>
                                  <p class="card-text">300</p>
                                </div>
                              </div>
                        </div>
                        <div class="col">
                            <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                                <div class="card-body">
                                  <h6 class="card-title">Artikel Publish</h6>
                                  <p class="card-text">150</p>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
