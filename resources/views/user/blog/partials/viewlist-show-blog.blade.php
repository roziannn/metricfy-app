<div class="col-md-12 col-lg-4 border-left">
    <h5 class="font-weight-bold py-3">Baca Artikel Lainnya</h5>
    
    @foreach ($viewlist as $item)
        <div class="row mb-3">
            <div class="col-sm-4 col-md-6">
                <img src="{{ asset('img/blog/' . $item->thumbnail) }}" class="rounded img-fluid" alt="">
            </div>
            <div class="col-sm-8 col-md-6 px-0">
                <a href="/blog/{{ $item->slug }}" class="text-decoration-none">{{ $item->title }}</a>
            </div>
        </div>
    @endforeach
</div>
