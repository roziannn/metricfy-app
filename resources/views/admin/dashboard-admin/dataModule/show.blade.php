@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <button class="btn btn-sm btn-secondary"> <a href="/dashboard-admin/data-module"
            class="text-decoration-none text-white">Back</a></button>
    <h5 class="py-3">Module</h5>
    <form action="/dashboard-admin/module/{{ $module->id }}/update" method="post">
        @csrf
        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Nama Module</label>
            <div class="col-sm-10">
                <input type="text" name="title" id="title" class="form-control" placeholder="Ketik di sini"
                    value="{{ $module->title }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="slug" class="col-sm-2 col-form-label">Slug</label>
            <div class="col-sm-10">
                <input type="text" name="slug" id="slug" class="form-control" placeholder="Ketik di sini"
                    value="{{ $module->slug }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="description" id="description" placeholder="Ketik di sini" rows="4">{{ $module->description }}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="content" class="col-sm-2 col-form-label">Content</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="content" name="content" placeholder="Ketik di sini" rows="4">{{ $module->content }}</textarea>
            </div>
        </div>
        <div class="d-flex justify-content-end py-3">
            <button class="btn btn-m btn-success col-md-3 col-sm-12" type="submit">Simpan Perubahan</button>
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
            <a href="#" class="btn btn-primary btn-m shadow">Tambah Sub Materi</a>
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
                <tr>
                    <td></td>
                    <td>
                        <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modal">
                            <i class="fas fa-pen-to-square text-white"></i>
                        </a>
                        <a href="#" class="btn btn-danger btn-sm"data-toggle="modal" data-target="#modal-danger"><i
                                class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
