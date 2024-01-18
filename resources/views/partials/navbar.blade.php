<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow p-2 fixed-top" aria-label="Offcanvas navbar large">
    <div class="container">
        <a class="navbar-brand nav-logo" style="margin-right: 50px;" href="/">METRICFY</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar2"
            aria-controls="offcanvasNavbar2" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasNavbar2"
            aria-labelledby="offcanvasNavbar2Label">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbar2Label"><strong>Metricfy</strong></h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
                    <li class="nav-item px-3 {{ Request::is('/') ? 'active' : '' }}">
                        <a class="nav-link" href="/">Beranda</a>
                    </li>
                    <li class="nav-item px-3 {{ Request::is('materi-belajar') ? 'active' : '' }}">
                        <a class="nav-link" href="/materi-belajar">Materi Belajar</a>
                    </li>
                    <li class="nav-item px-3 {{ Request::is('banksoal') ? 'active' : '' }}">
                        <a class="nav-link" href="/banksoal">Banksoal</a>
                    </li>
                    <li class="nav-item px-3 {{ Request::is('blog') ? 'active' : '' }}">
                        <a class="nav-link" href="/blog">Blog</a>
                    </li>
                    <li class="nav-item px-3 {{ Request::is('games') ? 'active' : '' }}">
                        <a class="nav-link" href="/blog">Daily Games</a>
                    </li>
                    {{-- <li
                        class="nav-item dropdown px-3 {{ Request::is('wikimedia') || Request::is('kamus') ? 'active' : '' }}
                    ">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Pojok Literasi
                        </a>
                        <ul class="dropdown-menu border-0 shadow">
                            <li><a class="dropdown-item py-2 {{ Request::is('wikimedia') ? 'active' : '' }}"
                                    href="/wikimedia">Cari Kata</a></li>
                            <li><a class="dropdown-item py-2 {{ Request::is('kamus') ? 'active' : '' }}"
                                    href="/kamus">Kamus Bahasa</a></li>
                            <li><a class="dropdown-item py-2" href="#">Buku & Sastra</a></li>
                            <li><a class="dropdown-item py-2" href="#">Strategi Membaca</a></li>
                        </ul>
                    </li> --}}
                    <li class="nav-item dropdown px-3">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Pojok Numerasi
                        </a>
                        <ul class="dropdown-menu border-0 shadow">
                            <li><a class="dropdown-item py-2" href="#">Alur Belajar</a></li>
                            <li><a class="dropdown-item py-2" href="#">Fungsi Logika</a></li>
                            <li><a class="dropdown-item py-2" href="#">Perhitungan Matriks</a></li>
                            <li><a class="dropdown-item py-2" href="#">Modus Hitungan</a></li>
                            {{-- <li><a class="dropdown-item py-2" href="#">Something else here</a></li> --}}
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        {{-- @auth
            <span class="username-name text-light">Halo, {{ explode(' ', auth()->user()->name)[0] }}</span>
            <form class="mb-0" action="/logout" method="post">
                @csrf
                <button type="submit" class="btn btn-sm btn-danger">Logout</button>
            </form>
        @else
            <button class="btn btn-sm btn-primary px-3" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
        @endauth --}}
        @auth
            <div class="navbar ms-auto">
                <div class="nav-item">
                    <a class="nav-link p-0 dropdown" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="username-name text-dark font-weight-bold">Halo,
                            {{ explode(' ', auth()->user()->name)[0] }}</span>
                    </a>

                    <ul class="dropdown-menu border-0 shadow-sm dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li class="m-3 pb-2 border-bottom">
                            @php
                                $avatar_url = auth()->user()->avatar ? asset('img/avatar/' . auth()->user()->avatar) : 'https://ui-avatars.com/api/?size=128&background=random&name=' . auth()->user()->name;
                            @endphp
                            <img src="{{ $avatar_url }}" class="rounded-circle" style="width: 36px; height: 36px;"
                                alt="">

                            <span class="px-1 font-weight-bold">{{ explode(' ', auth()->user()->name)[0] }}</span>
                            <span class="px-1 small"><i class="fa-solid fa-coins pe-1 text-warning"></i>
                                {{ auth()->user()->point }} xp</span>
                        </li>
                        <li><a class="dropdown-item px-3" href="/profile">Profil</a>
                        </li>
                        @if (auth()->user()->roles === 'USER')
                            <li><a class="dropdown-item px-3" href="/dashboard/posts">Dashboard</a>
                            </li>
                        @endif

                        @if (auth()->user()->roles === 'ADMIN')
                            {{-- <li class="header px-3 small text-muted">Admin</li> --}}
                            <li><a class="dropdown-item px-3" href="/main-dashboard-admin">
                                    Dashboard</a></li>
                            <li>
                        @endif
                        <form action="/logout" method="post" class="px-3 pt-3">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-danger w-100">Logout</button>
                        </form>
                        </li>
                    </ul>
                </div>
            @else
                <div class="nav-item">
                    <button type="button" class="btn btn-outline-primary " data-bs-toggle="modal"
                        data-bs-target="#loginModal">Masuk/Daftar</button>
                </div>
            </div>
        @endauth
    </div>
</nav>

<div class="modal" id="loginModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="model-title mb-0">Masuk Akun</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert" style="width:100% ;">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif
                <form action="/login" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="email">Masukkan Email kamu</label>
                        <input type="email" name="email"
                            class="form-control @error('email') is-invalid @enderror" id="email" required
                            placeholder="Ketik disini" autofocus required value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Kata Sandi</label>
                        <div class="input-group">
                            <input type="password" name="password" class="form-control" id="password" required
                                placeholder="Ketik disini" required>
                            <span class="input-group-text">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                        <p class="mt-2 mb-4 text-end"><a href="/forgotpass"
                                style="font-size: 13px; text-decoration:none; font-weight:500">Lupa
                                kata sandi?</a></p>
                    </div>
                    <div class="text-right justify-content-around mt-3">
                        <button type="submit" class="btn btn-primary w-100">Masuk</a></button>
                    </div>
                </form>
                <p class="py-3">Belum punya akun?<a href="/register" style=" text-decoration:none;"> Daftar
                        sekarang</a></p>
                Dengan masuk atau daftar Metricfy, saya menyetujui <br> Syarat & Ketentuan serta Kebijakan Privasi yang
                berlaku.
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelector('.input-group-text').addEventListener('click', function(event) {
        event.preventDefault();
        var passwordInput = document.getElementById('password');
        var eyeIcon = this.querySelector('i');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
            eyeIcon.setAttribute('title', 'Sembunyikan');
            eyeIcon.parentNode.setAttribute('aria-label', 'Sembunyikan');
        } else {
            passwordInput.type = 'password';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
            eyeIcon.setAttribute('title', 'Lihat');
            eyeIcon.parentNode.setAttribute('aria-label', 'Lihat');
        }
    });
</script>

<style>
    /* .bg-purple {
        background-color: #370665;
    } */
    .dropdown-menu {
        width: 200px;
    }
</style>
