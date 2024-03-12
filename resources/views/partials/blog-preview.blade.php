<div class="container my-5">
    <span class="font-weight-bold fs-3">Artikel Terbaru</span>

    <div class="row row-cols-1 row-cols-md-4 g-4 py-4">
        @foreach ($artikel_blog as $artikel)
            <div class="col">
                <div class="card rounded-3 shadow-sm border-0">
                    <img src="{{ asset('img/blog/' . $artikel->thumbnail) }}" class="img-fluid">
                    <div class="card-body">
                        <a href="/blog/{{ $artikel->slug }}"
                            class="card-title fs-6 font-weight-bold text-decoration-none">{{ $artikel->title }}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <a href="/blog" class="text-end text-black-50 font-weight-bold p-0 m-0">Artikel lainnya <i
                class="fa-solid fa-sm fa-arrow-up-right-from-square ms-2"></i></a>
    </div>
