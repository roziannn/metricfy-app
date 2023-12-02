@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <div class="pb-5">
        <div class="row py-3">
            @foreach ($data_blog as $blog)
                <div class="col-12 col-md-3 mb-4">
                    <div class="card white-bg">
                        <img src="{{ asset('img/blog/' . $blog->thumbnail) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a href="/blog/{{ $blog->slug }}" class="card-title-name text-decoration-none">
                                <span class="card-title fs-6 text-dark">{{ $blog->title }}</span>
                            </a>
                            <div class="d-flex justify-content-between">
                                <small></small>
                                <strong class="text-tag rounded bg-warning"></strong>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

