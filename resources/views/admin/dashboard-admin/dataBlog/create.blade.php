@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <div class="d-flex justify-content-start align-items-center">
        <a href="/dashboard-admin/data-blog" class="text-decoration-none text-dark"><i
                class="fa-solid fa-chevron-left me-3"></i></a>
        <h5 class="p-0 m-0">Buat Blog Baru</h5>
    </div>
    <form method="POST" action="/dashboard-admin/blog/store" enctype="multipart/form-data">
        @csrf
        <div class="card p-3 mt-4">
            <div class="row justify-content between pb-3">
                <div class="col-sm-6">
                    <label for="title" class="text-muted form-control-sm p-0 m-0">Judul</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Ketik di sini">
                </div>
                <div class="col-sm-6">
                    <label for="thumbnail" class="text-muted form-control-sm p-0 m-0">Thumbnail Blog</label>
                    <input class="form-control form-control-sm" type="file" id="thumbnail" name="thumbnail">
                    <span class="text-secondary small"> Rasio 1 : 1 atau berukuran tidak lebih dari 2MB</span>
                </div>
            </div>
            <div class="row pb-3">
                <div class="col-sm-12">
                    <label for="title" class="text-muted form-control-sm p-0 m-0">Blog Content</label>
                    {{-- <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea> --}}
                    <input id="content" type="hidden" name="content" value="{{ old('content') }}">
                    <trix-editor input="content" class="bg-white"></trix-editor>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn btn-m btn-success col-md-2 col-sm-12" type="submit">Buat Blog</button>
            </div>
        </div>
    </form>
@endsection
