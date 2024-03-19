@extends('layouts.main')
@include('partials.navbar')
<div class="pt-5"></div>
@section('container')
    <ol class="breadcrumb bg-light">
        @foreach ($breadcrumbs as $label => $url)
            @if ($url)
                <li class="breadcrumb-item"><a href="{{ $url }}" class="text-decoration-none">{{ $label }}</a>
                </li>
            @else
                <li class="breadcrumb-item active" aria-current="page">{{ $label }}</li>
            @endif
        @endforeach
    </ol>
    <div class="row justify-content-between">
        <div class="col-md-12 col-lg-8 py-3 pe-lg-5">
            <div class="head-content row">
                <h2 class="font-weight-bold mb-3">{{ $blog->title }}</h2>
                <small class="d-flex justify-content-between text-muted text-dark">
                    <span class="font-weight-bold">{{ $blog->updated_at->format('F j, Y') }}

                    </span>
                    <span class="px-1"><i class="fa-regular fa-xs fa-clock me-1"></i>
                        {{ $estimatedReadingTime }} minutes read</span>
                </small>
                <img src="{{ asset('img/blog/' . $blog->thumbnail) }}" class="pt-3" alt="">
            </div>

            <div class="body-content text-justify">
                <p>{!! $blog->content !!}</p>
            </div>
            <div class="py-3">
                <p class="fs-5">Bagikan artikel ini</p>
                <div class="d-flex">
                    <i class="fa-brands fa-square-facebook fa-2x me-3" style="color: #0866FF"></i>
                    <i class="fa-brands fa-square-x-twitter fa-2x me-3"></i>
                    <i class="fa-brands fa-square-whatsapp fa-2x me-3" style="color: #12AF0A"></i>
                    <i class="fa-brands fa-linkedin fa-2x me-3" style="color:#007BB5"></i>

                </div>

            </div>
        </div>
        @include('user.blog.partials.viewlist-show-blog')
    </div>
@endsection
