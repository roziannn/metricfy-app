@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <div class="pb-5">
        <div class="row justify-content-between">
            <div class="col-md-12 col-lg-8 pt-2">
                {{-- <ol class="breadcrumb bg-light px-0">
                    @foreach ($breadcrumbs as $label => $url)
                        @if ($url)
                            <li class="breadcrumb-item"><a href="{{ $url }}">{{ $label }}</a></li>
                        @else
                            <li class="breadcrumb-item active" aria-current="page">{{ $label }}</li>
                        @endif
                    @endforeach
                </ol> --}}
                <div class="head-content row">
                    <h3 class="font-weight-bold">{{ $blog->title }}</h3>
                    <span class="font-weight-bold text-black-50">{{ $blog->updated_at->format('M j, Y') }} <span class="px-1"> &#8226; </span> {{ $estimatedReadingTime }} minutes read</span>
                    <img src="{{ asset('img/blog/' . $blog->thumbnail) }}" class="py-4" alt="">
                </div>
                
                <div class="body-content">
                    <p>{!! $blog->content !!}</p>

                </div>
            </div>
            @include('user.blog.partials.viewlist-show-blog') 
        </div>
    @endsection
