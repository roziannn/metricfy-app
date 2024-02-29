@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <div class="d-flex justify-content-start align-items-center">

        <a href="/dashboard-admin/data-module" class="text-decoration-none text-dark"><i
                class="fa-solid fa-chevron-left me-3"></i></a>
        <h5 class="my-3">Tambah Module Baru</h5>
    </div>
    <form method="POST" action="/dashboard-admin/module/store">
        @csrf
        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Judul Module</label>
            <div class="col-sm-10">
                <input type="text" name="title" id="title" class="form-control" placeholder="Ketik di sini">
            </div>
        </div>
        <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="description" id="description" placeholder="Ketik di sini" rows="2"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="content" class="col-sm-2 col-form-label">Content</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="content" name="content" placeholder="Ketik di sini" rows="4"></textarea>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <a href="/dashboard-admin/data-module" class="btn btn-sm btn-light text-dark col-md-1 col-sm-12 me-2">Batal</a>

            <button class="btn btn-sm btn-success col-md-1 col-sm-12" type="submit"><i
                    class="fa-solid fa-floppy-disk me-2"></i>Simpan</button>
        </div>
    </form>
@endsection
