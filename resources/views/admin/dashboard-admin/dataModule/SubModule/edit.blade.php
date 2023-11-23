@extends('layouts.main')
@include('partials.navbar')
@section('container')

    @if (session()->has('successUpdate'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width:100% ;">
            {{ session('successUpdate') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <button class="btn btn-sm btn-secondary"> <a href="/dashboard-admin/data-module/{{ $module->slug }}"
            class="text-decoration-none text-white">Back</a></button>
    <div class="d-flex justify-content-between align-items-center">
        <h5 class="py-3">INI SHOW SUB MODULE EDIT ADMIN</h5>
        <button class="btn btn-sm btn-warning col-md-2 col-sm-12" type="submit">Tambah Latihan/Soal</button>
    </div>

    <form method="POST" action="/dashboard-admin/data-module/{{ $submodule->slug }}/update">
        @csrf
        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Judul Sub Module</label>
            <div class="col-sm-10">
                <input type="text" name="title" id="title" class="form-control" value="{{ $submodule->title }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="video_embed" class="col-sm-2 col-form-label">Video Materi</label>
            <div class="col-sm-10">
                <input type="text" name="video_embed" id="video_embed" class="form-control"
                    value="{{ $submodule->video_embed }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="content" class="col-sm-2 col-form-label">Content</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="content" name="content" placeholder="Ketik di sini" rows="4">{{ $submodule->content }}"</textarea>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button class="btn btn-m btn-success col-md-3 col-sm-12" type="submit">Simpan Perubahan</button>
        </div>
    </form>
@endsection
