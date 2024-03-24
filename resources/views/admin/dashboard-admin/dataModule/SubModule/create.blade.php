@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <div class="pt-5"></div>

    <div class="d-flex justify-content-start align-items-center">
        <a href="/dashboard-admin/data-module" class="text-decoration-none text-dark"><i
                class="fa-solid fa-lg fa-angle-left me-3"></i></a>
        <h5 class="p-0 m-0">Create Sub Materi</h5>
    </div>
    <form method="POST" action="/dashboard-admin/data-module/{{ $data_module->id }}/store-sub-module"
        enctype="multipart/form-data">
        @csrf
        <h5 class="py-3">Module : <strong> {{ $data_module->title }} </strong></h5>
        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Judul Sub Module</label>
            <div class="col-sm-10">
                <input type="text" name="title" id="title" class="form-control" placeholder="Ketik di sini">
            </div>
        </div>
        <div class="form-group row">
            <label for="video_embed" class="col-sm-2 col-form-label">Video Materi</label>
            <div class="col-sm-10">
                <input type="text" name="video_embed" id="video_embed" class="form-control" placeholder="Ketik di sini">
            </div>
        </div>
        <div class="form-group row">
            <label for="image" class="col-sm-2 col-form-label">Img Url</label>
            <div class="col-sm-10">
                <input type="file" name="image" id="image" class="form-control" placeholder="Ketik di sini">
            </div>
        </div>
        <div class="form-group row">
            <label for="content" class="col-sm-2 col-form-label">Content</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="content" name="content" placeholder="Ketik dsini" rows="4"></textarea>

            </div>


        </div>
        <div class="d-flex justify-content-end">
            <button class="btn btn-m btn-success col-md-3 col-sm-12" type="submit">Buat Module</button>
        </div>
    </form>
@endsection
