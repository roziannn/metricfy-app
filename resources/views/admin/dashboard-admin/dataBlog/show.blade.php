@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex justify-content-start align-items-center">
            <a href="/dashboard-admin/data-blog" class="text-decoration-none text-white"><i
                    class="fa-solid fa-chevron-left me-3 text-dark"></i></a>
            <h5 class="p-0 m-0">Blog : {{ $blog->title }} </h5>
        </div>
        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal"><i
                class="fa-solid fa-trash me-2"></i>Hapus
            Artikel</button>
    </div>

    {{-- Modal delete-confirm --}}
    <div class="modal" id="deleteModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ url('/dashboard-admin/blog/' . $blog->slug . '/delete') }}">
                    @csrf
                    <div class="modal-body py-0">
                        <p>Yakin ingin menghapus module <b>{{ $blog->title }}</b> ?</p>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-sm btn-light" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-sm btn-danger">Ya, Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Modal delete-confirm --}}

    <div class="card p-3 my-4">
        <form action="/dashboard-admin/blog/{{ $blog->id }}/update" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content between pb-3">
                <div class="col-sm-6">
                    <label for="thumbnail" class="text-muted form-control-sm p-0 m-0">Thumbnail Blog</label>
                    <input class="form-control form-control-sm" type="file" id="thumbnail" name="thumbnail">
                    <span class="text-secondary small"> Rasio 1 : 1 atau berukuran tidak lebih dari 2MB</span>
                </div>
                <div class="col-sm-6">
                    <label for="title" class="text-muted form-control-sm p-0 m-0">Created at</label>
                    <div class="input-group">
                        <input type="text" name="title" id="title" class="form-control" placeholder="Ketik di sini"
                            value="{{ $blog->created_at->format('l, d M Y, H:i') }}" readonly>
                    </div>
                </div>

            </div>

            <div class="row justify-content between pb-3">
                <div class="col-sm-6">
                    <label for="title" class="text-muted form-control-sm p-0 m-0">Judul</label>
                    <div class="input-group">
                        <input type="text" name="title" id="title" class="form-control" placeholder="Ketik di sini"
                            value="{{ $blog->title }}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <label for="slug" class="text-muted form-control-sm p-0 m-0">Slug</label>
                    <div class="input-group">
                        <input type="text" name="slug" id="slug" class="form-control text-secondary"
                            placeholder="Ketik di sini" value="{{ $blog->slug }}" readonly>
                    </div>
                </div>
            </div>
            <div class="row pb-3">
                <div class="col-sm-12">
                    <label for="title" class="text-muted form-control-sm p-0 m-0">Blog Content</label>
                    <input id="content" type="hidden" name="content" value="{{ old('content', $blog->content) }}">
                    <trix-editor input="content"></trix-editor>
                </div>
            </div>
            {{-- <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{ $blog->content }}</textarea> --}}
            <div class="d-flex justify-content-end ">
                <button class="btn btn-sm btn-success col-md-2 col-sm-12" type="submit"><i
                        class="fa-solid fa-floppy-disk"></i> Simpan Perubahan</button>
            </div>
        </form>
    </div>
@endsection
