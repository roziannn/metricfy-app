<div class="col-md-12 col-lg-4 ">
    <h5 class="py-3 font-weight-bold">Baca Artikel Lainnya</h5>
    @foreach ($viewlist as $item)
        <a href="/blog/{{ $item->slug }}" class="text-decoration-none text-dark">
            <div class="d-flex mb-3">
                <div class="col-4 col-sm-4 col-md-6">
                    <img src="{{ asset('img/blog/' . $item->thumbnail) }}" class="rounded-1 img-fluid" alt=""
                        style="max-width: 100%;">
                </div>
                <div class="col-8 col-sm-9 col-md-8 d-flex flex-column justify-content-center">
                    <p class="font-weight-bold m-0">{{ $item->title }}</p>
                    <small class="text-muted blog-info-date">{{ $item->updated_at->format('M d, Y') }}</small>
                </div>
            </div>
        </a>
    @endforeach
</div>

<style>
    .blog-info-date {
        font-size: 13px;
    }
</style>
