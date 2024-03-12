<div class="container my-5">
    <span class="font-weight-bold fs-3">Mau Belajar Apa Hari Ini?</span>

    <div class="row row-cols-2 row-cols-lg-4 g-5 py-4">
        @foreach ($modules as $item)
            <div class="col d-flex align-items-start">
                <div>
                    <img src="{{ asset('img/module/' . $item->thumbnail) }}" class="card-img-top" alt="...">
                    <p class="mb-0 fs-5 text-body-emphasis mt-3">{{ $item->title }}</p>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <a href="/materi-belajar" class="text-end text-black-50 font-weight-bold p-0 m-0">Materi lainnya <i
                class="fa-solid fa-sm fa-arrow-up-right-from-square ms-2"></i></a>
    </div>
</div>
