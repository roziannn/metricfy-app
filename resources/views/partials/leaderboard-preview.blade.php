<div class="row px-0 py-5 mt-3">
    <div class="col-lg-5 order-lg-first align-items-center mb-4 mb-lg-0">
        <h3 class="mb-3 font-weight-bold">Peringkat Belajar</h3>

        <p>Dapatkan point dan jadi yang teratas diantara pengguna lainnya. Selesaikan tantangan dan latihan soal
            untuk mengumpulkan poin</p>

        <button class="btn btn-m py-2 font-weight-bold btn-primary col-sm-4 shadow">Mulai Belajar</button>
    </div>

    <div class="col-lg-5 ml-auto">
        <div class="card border rounded-5 shadow-lg">
            <div class="card-header bg-purple d-flex justify-content-between align-items-center">
                <h3 class="mb-0 text-white">RANKING</h3>
                <div class="text-center">
                    <img src="{{ asset('img/partials/badge.png') }}" style="width:60px">
                </div>
            </div>

            <div class="card-body">
                <ul class="list-group list-group-flush">
                    @foreach ($leaderboard as $item)
                        <li class="list-group-item rounded-3 mb-2 {{ $loop->first ? 'glowing-purple bg-purple' : '' }}">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex justify-content-start align-items-center">
                                    <span class="me-3 fs-3 {{ $loop->first ? 'text-white font-weight-bold' : '' }}">
                                        {{ $loop->iteration }}</span>
                                    <div class="list-ava">
                                        @php
                                            $avatar_url = $item->avatar
                                                ? asset('img/avatar/' . $item->avatar)
                                                : 'https://ui-avatars.com/api/?size=128&background=random&name=' .
                                                    $item->name;
                                        @endphp
                                        <img src="{{ $avatar_url }}" class="rounded-circle" width="36px"
                                            height="36px" alt="">
                                    </div>
                                    <div class="list-name ps-3 {{ $loop->first ? 'text-white' : '' }}">
                                        {{ $item->name }}</div>
                                </div>
                                <div class="list-point">
                                    <span class="badge badge-pill badge-primary py-2"><i
                                            class="fa-solid fa-bolt text-warning"></i> {{ $item->point }} XP</span>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

<style>
    .glowing-purple {
        background-color: #6f42c1;
        animation: glow 0.5s ease-in-out infinite alternate;
    }

    @keyframes glow {
        0% {
            box-shadow: 0 0 10px #6f42c1;
        }

        100% {
            box-shadow: 0 0 30px #6f42c1;
        }
    }
</style>
