@extends('layouts.main')
@include('partials.navbar')

<div class="pt-4">
    <div class="px-3 mb-4 bg-body-secondary">
        <div class="container">
            <div class="py-0">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md-8">
                        <h1 class="font-weight-bolder text-dark d-none d-md-block">Membaca Dapat Menambah <br> Banyak
                            Pengetahuanmu Lho!</h1>
                        <h2 class="font-weight-bolder text-dark mt-5 d-md-none">Membaca Dapat Menambah <br> Banyak
                            Pengetahuanmu Lho!</h2>
                        <p>Baca informasi seputar literasi numerasi dan kabar dunia pendidikan <br> di Metricfy Blog.
                        </p>
                    </div>
                    <div class="col-md-4 text-end">
                        <img src="{{ asset('img/partials/blogReading.png') }}" class="pt-5" alt="Responsive image"
                            width="95%">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@section('container')
    <div class="row">
        <h4 class="font-weight-bolder pb-3">Artikel Terbaru</h4>
        @foreach ($blogs as $blog)
            <div class="col-sm-12 col-md-4 mb-4 mt-2">
                <a href="/blog/{{ $blog['blog']->slug }}" class="card-title-name text-decoration-none">
                    <div class="card border-0 shadow rounded-3">
                        <img src="{{ asset('img/blog/' . $blog['blog']->thumbnail) }}" class="card-img-top rounded-3"
                            alt="..." height="200" width="200">
                        <div class="card-header border-0">
                            <small class="d-flex justify-content-between text-muted text-dark mb-3">
                                <span class="font-weight-bold">{{ $blog['blog']->created_at->format('F j,  Y') }}</span>
                                <span class="px-1"> <i class="fa-regular fa-xs fa-clock me-1"></i>
                                    {{ $blog['estimatedReadingTime'] }} minutes
                                    read</span>
                            </small>

                            <h5 class="text-dark font-weight-bold">{{ $blog['blog']->title }}</h5>
                            <p class="blog-text">{!! substr(strip_tags($blog['blog']->content), 0, 180) !!} ... </p>
                            <small class="text-muted">Baca selengkapnya..</small>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
