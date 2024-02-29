@extends('layouts.main')
@include('partials.navbar')
@section('container')
    @if (session()->has('successUpdate'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width:100% ;">
            {{ session('successUpdate') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <div class="d-flex justify-content-start align-items-center">

        <a href="/dashboard-admin/data-module/{{ $module->slug }}" class="text-decoration-none text-dark"><i
                class="fa-solid fa-lg fa-angle-left me-3"></i></a>
        <h5 class="p-0 m-0">Edit Sub Materi</h5>

    </div>

    <form method="POST" class="mt-4" action="/dashboard-admin/data-module/{{ $submodule->slug }}/update">
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
                {{-- <textarea class="form-control" id="content" name="content" placeholder="Ketik di sini" rows="4">{{ $submodule->content }}"</textarea> --}}
                <input id="content" type="hidden" name="content" value="{{ old('content', $submodule->content) }}">
                <trix-editor input="content" class="bg-white"></trix-editor>
            </div>
            <div class="d-flex justify-content-end mt-4">
                <button class="btn btn-sm btn-success col-md-2 col-sm-12" type="submit"><i
                        class="fa-solid fa-floppy-disk me-2"></i>Simpan Perubahan</button>
            </div>
        </div>
    </form>
@endsection
