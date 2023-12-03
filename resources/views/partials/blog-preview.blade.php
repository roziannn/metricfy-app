<div class="py-3 row align-items-center flex-column flex-md-row justify-content-between">
    <div class="col-12 col-md-6 my-3">
        <h3 class="font-weight-bolder">Artikel untuk dibaca</h3>
    </div>
    <div class="col-12 col-md-3 text-end my-3">
        <a href="/blog" class="btn btn-sm btn-outline-danger">Lihat Semua</a>
    </div>
</div>


<div class="row row-cols-1 row-cols-md-4 g-4 mb-5">
    @foreach ($artikel_blog as $artikel)
        <div class="col">
            <div class="card border-0">
                <img src="{{ asset('img/blog/' . $artikel->thumbnail) }}" class="card-img-top rounded-4">
                <div class="card-body">
                    <a href="/blog/{{ $artikel->slug }}"
                        class="card-title fs-5 font-weight-bold text-decoration-none">{{ $artikel->title }}</a>
                    <p class="card-text text-truncate">This is a longer card with supporting text below as a natural
                        lead-in to
                        additional
                        content. This content is a little bit longer.</p>
                </div>
            </div>
        </div>
    @endforeach
</div>
