@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <div class="pb-5">
        <div class="row justify-content-between">
            <div class="col-md-12 col-lg-8 py-3 pe-5">
                <div class="head-content row">
                    <h3 class="font-weight-bold">{{ $blog->title }}</h3>
                    <span class="text-publish-info font-weight-bold text-muted">{{ $blog->updated_at->format('M j, Y') }} <span
                            class="px-1"> &#8226; </span> {{ $estimatedReadingTime }} minutes read</span>
                    <img src="{{ asset('img/blog/' . $blog->thumbnail) }}" class="py-4" alt="">
                </div>

                <div class="body-content">
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
    </div>
@endsection

<style>
    .text-publish-info{
        font-size: 14px;
    }
</style>