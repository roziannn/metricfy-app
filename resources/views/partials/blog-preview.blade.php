<div class="container mb-5 px-0">
    <span class="font-weight-bold fs-3">Artikel Terbaru</span>
    <div class="row row-cols-1 row-cols-md-4 g-4 py-4">
        @foreach ($blogs as $blog)
            <div class="col">
                <div class="card rounded-4 shadow-sm border-0">
                    <img src="{{ asset('img/blog/' . $blog['blog']->thumbnail) }}" class="img-fluid">
                    <div class="card-header border-0 bg-transparent">
                        <small class="d-flex text-muted text-dark mb-3 justify-content-between">
                            <span class="font-weight-bold">{{ $blog['blog']->created_at->format('M j,  Y') }}</span>
                            <span> <i class="fa-regular fa-xs fa-clock me-1"></i>
                                {{ $blog['estimatedReadingTime'] }} minutes
                                read</span>
                        </small>
                        <a href="/blog/{{ $blog['blog']->slug }}"
                            class="card-title  fs-6 font-weight-bold text-decoration-none">{{ $blog['blog']->title }}
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <a href="/blog" class="text-end text-black-50 font-weight-bold m-0">Artikel lainnya <i
                class="fa-solid fa-sm fa-arrow-up-right-from-square ms-2"></i></a>
    </div>
</div>
