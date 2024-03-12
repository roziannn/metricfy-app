@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <div class="pb-5">
        <div class="row py-3">
            <h4 class="font-weight-bolder py-3">Artikel Terbaru</h4>
            @foreach ($data_blog as $blog)
                <div class="col-sm-12 col-md-4 mb-4">
                    <div class="card border-0 shadow rounded-3">
                        <img src="{{ asset('img/blog/' . $blog->thumbnail) }}" class="card-img-top rounded-3" alt="..."
                            height="200" width="200">
                        <div class="card-body ">
                            <small class="card-title text-muted text-dark"> on
                                <span class="font-weight-bold">{{ $blog->created_at->format('M j,  Y') }}</span></small>
                            <br>
                            <a href="/blog/{{ $blog->slug }}" class="card-title-name text-decoration-none">
                                <h5 class="card-title text-dark font-weight-bold">{{ $blog->title }}</h5>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
