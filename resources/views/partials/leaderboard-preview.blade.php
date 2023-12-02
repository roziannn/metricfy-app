<div class="row py-5">
    <div class="col-lg-4">
        <h2 class="mb-3 font-weight-500">Peringkat Belajar</h2>
        <p>Jadi yang teratas diantara pengguna lainnya dengan belajar sekarang!</p>
    </div>

    <div class="col-lg-5 ml-auto">
        <div class="card border">
            <div class="card-body">
                <div class="text-center">
                    <h3 class="card-title py-2"><i class="fa-solid fa-medal text-danger"></i> Leaderboard <i class="fa-solid fa-medal text-danger"></i></h3>
                </div>

                {{-- <p class="card-text">Peringkat teratas metricfy</p> --}}
                <ul class="list-group list-group-flush">
                    @foreach ($leaderboard as $item)
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <div class="list-name">
                                    {{ $item->name }}</div>
                                <div class="list-point">
                                    <span class="badge badge-pill badge-primary"><i class="fa-solid fa-bolt text-warning"></i> {{ $item->point }} XP</span>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
