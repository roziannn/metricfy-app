@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <button class="btn btn-sm btn-secondary"> <a href="/dashboard-admin/data-blog"
            class="text-decoration-none text-white">Back</a></button>
    <h5 class="py-3">Blog : {{ $blog->title }} </h5>
    <form action="/dashboard-admin/blog/{{ $blog->id }}/update" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-sm-3 my-3 px-0">
            <label for="thumbnail" class="text-muted form-control-sm p-0 m-0">Thumbnail Blog</label>
            <input class="form-control form-control-sm" type="file" id="thumbnail" name="thumbnail">
            <span class="text-secondary small"> Rasio 1 : 1 atau berukuran tidak lebih dari 2MB</span>
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
        <div class="d-flex justify-content-end py-3">
            <button class="btn btn-m btn-success col-md-2 col-sm-12" type="submit">Simpan Perubahan</button>
        </div>
    </form>
@endsection
