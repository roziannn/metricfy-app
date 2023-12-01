@extends('layouts.main')
@include('partials.navbar')
@section('container')
    @if (session()->has('successStore'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width:100% ;">
            {{ session('successStore') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <button class="btn btn-sm btn-secondary"> <a href="/dashboard-admin/data-module"
            class="text-decoration-none text-white">Back</a></button>
    <h5 class="py-3">Module</h5>
    <form action="/dashboard-admin/module/{{ $module->id }}/update" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-sm-3 my-3 px-0">
            <label for="thumbnail" class="text-muted form-control-sm p-0 m-0">Thumbnail Module</label>
            <input class="form-control form-control-sm" type="file" id="thumbnail" name="thumbnail">
            <span class="text-secondary small"> Rasio 1 : 1 atau berukuran tidak lebih dari 2MB</span>
        </div>
        
        <div class="row justify-content between pb-3">
            <div class="col-sm-6">
                <label for="title" class="text-muted form-control-sm p-0 m-0">Nama Module</label>
                <div class="input-group">
                    <input type="text" name="title" id="title" class="form-control" placeholder="Ketik di sini"
                        value="{{ $module->title }}">
                </div>
            </div>
            <div class="col-sm-6">
                <label for="slug" class="text-muted form-control-sm p-0 m-0">Slug</label>
                <div class="input-group">
                    <input type="text" name="slug" id="slug" class="form-control text-secondary"
                        placeholder="Ketik di sini" value="{{ $module->slug }}" readonly>
                </div>
            </div>
        </div>
        <div class="row justify-content between pb-3">
            <div class="col-sm-6">
                <label for="description" class="text-muted form-control-sm p-0 m-0">Deskripsi</label>
                <div class="input-group">
                    <textarea class="form-control" name="description" id="description" placeholder="Ketik di sini" rows="4">{{ $module->description }}</textarea>
                </div>
            </div>
            <div class="col-sm-6">
                <label for="content" class="text-muted form-control-sm p-0 m-0">Content</label>
                <div class="input-group">
                    <textarea class="form-control" id="content" name="content" placeholder="Ketik di sini" rows="4">{{ $module->content }}</textarea>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end py-3">
            <button class="btn btn-m btn-success col-md-2 col-sm-12" type="submit">Simpan Perubahan</button>
        </div>
    </form>

    <div class="py-3"></div>
    <div class="row">
        <div class="col">
            <h5 class="py-2">
                Sub Materi
            </h5>
        </div>
        <div class="col text-right">
            <a href="/dashboard-admin/data-module/{{ $module->slug }}/create-sub-module"
                class="btn btn-m btn-primary">Tambah Sub Materi</a>
            <a href="/dashboard-admin/data-module/{{ $module->slug }}/create-exercise" class="btn btn-m btn-warning">Tambah
                Soal/Latihan</a>
        </div>
    </div>

    <div class="bd-example">
        <table class="table">
            <thead class="table-light">
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($module->submodules as $sub)
                    <tr>
                        <td>{{ $sub->title }}</td>
                        <td>
                            <a href="/dashboard-admin/data-module/{{ $module->slug }}/{{ $sub->slug }}/edit"
                                class="btn btn-warning btn-sm">
                                <i class="fas fa-pen-to-square text-white"></i>
                            </a>
                            <a href="/dashboard-admin/data-module/{moduleSlug}/{submoduleSlug}/edit"
                                class="btn btn-danger btn-sm"data-toggle="modal" data-target="#modal-danger"><i
                                    class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
