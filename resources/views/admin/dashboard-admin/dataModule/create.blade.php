@extends('layouts.main')
@include('partials.navbar')
@section('container')
<button class="btn btn-sm btn-secondary"> <a href="/dashboard-admin/data-module" class="text-decoration-none text-white">Back</a></button>
<form method="POST" action="/dashboard-admin/module/store">
    @csrf
    <h5 class="py-3">Buat Module Baru</h5>
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
        <button class="btn btn-m btn-success col-md-3 col-sm-12" type="submit">Buat Module</button>
    </div>
</form>
@endsection
