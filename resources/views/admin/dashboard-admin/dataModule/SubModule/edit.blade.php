@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <div class="pt-5"></div>

    <div class="d-flex justify-content-start align-items-center">
        <a href="/dashboard-admin/data-module/{{ $module->slug }}" class="text-decoration-none text-dark"><i
                class="fa-solid fa-lg fa-angle-left me-3"></i></a>
        <h5 class="p-0 m-0">Edit Sub Materi</h5>
    </div>

    <form method="POST" class="mt-4" action="/dashboard-admin/data-module/{{ $submodule->slug }}/update"
        enctype="multipart/form-data">
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
            <label for="image" class="col-sm-2 col-form-label">Img Url</label>
            <div class="col-sm-10">
                <input type="file" name="image" id="image" class="form-control">
                @if ($submodule->image !== null)
                    <img src="{{ asset('img/submoduleContent/' . $submodule->image) }}" id="featuredImageDisplay"
                        style="display:block;margin-top:10px;" width="300px;" />
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="content" class="col-sm-2 col-form-label">Content</label>
            <div class="col-sm-10">
                <textarea name="content" id="content" cols="30" rows="10">{{ $submodule->content }}</textarea>
            </div>
        </div>
        <div class="d-flex justify-content-end mt-4">
            <button class="btn btn-sm btn-success col-md-2 col-sm-12" type="submit"><i
                    class="fa-solid fa-floppy-disk me-2"></i>Simpan Perubahan</button>
        </div>
    </form>

    <script>
        var editor = new FroalaEditor('#content', {
            attribution: false
        });
    </script>
@endsection
