@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <div class="pb-5">
        <div class="row justify-content-between">
            <div class="col-sm-8">
                <ol class="breadcrumb">
                    @foreach ($breadcrumbs as $label => $url)
                        @if ($url)
                            <li class="breadcrumb-item"><a href="{{ $url }}">{{ $label }}</a></li>
                        @else
                            <li class="breadcrumb-item active" aria-current="page">{{ $label }}</li>
                        @endif
                    @endforeach
                </ol>

                <div class="head-content row">
                    <h3 class="font-weight-bold">{{ $blog->title }}</h3>
                    <small>{{ $blog->updated_at }}</small>
                    <img src="{{ asset('img/blog/' . $blog->thumbnail) }}" class="py-4" width="130" alt="">
                </div>

                <div class="body-content">
                    <p>{{ $blog->content }}</p>
                </div>
            </div>
            @include('user.blog.partials.viewlist-show-blog') 
        </div>
    @endsection
