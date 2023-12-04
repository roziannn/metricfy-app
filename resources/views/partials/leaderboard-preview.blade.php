<div class="row py-5">
    <div class="col-lg-4">
        <h2 class="mb-3 font-weight-500">Peringkat Belajar</h2>
        <p>Jadi yang teratas diantara pengguna lainnya dengan belajar sekarang!</p>
    </div>

    <div class="col-lg-5 ml-auto">
        <div class="card border rounded-5 bg-danger bg-gradient">
            <div class="card-body">
                <div class="text-center text-white">
                    <h3 class="card-title py-2"><i class="fa-solid fa-medal"></i> Leaderboard <i class="fa-solid fa-medal"></i></h3>
                </div>

                {{-- <p class="card-text">Peringkat teratas metricfy</p> --}}
                <ul class="list-group list-group-flush">
                    @foreach ($leaderboard as $item)
                        <li class="list-group-item rounded-3 bg-body-tertiary mb-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex justify-content-start align-items-center">
                                <div class="list-ava">
                                    <img src="{{ asset('img/avatar/' . $item->avatar) }}" class="rounded-circle" width="36px" height="36px" alt="">
                                </div>
                                <div class="list-name ps-3">
                                    {{ $item->name }}</div></div>
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
