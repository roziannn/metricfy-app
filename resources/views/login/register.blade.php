@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <div class="col-md-6 col-lg-4 mx-auto px-3">
        <img src="{{ asset('img/partials/registrationImg.png') }}" class="pt-3" width="200px" alt="">
        <div class="row my-3">
            <h5 class="font-weight-bold">
                Buat akun baru
            </h5>
            <small class="text-muted">Lengkapi form berikut</small>
        </div>
        <form action="/register-store" method="post">
            @csrf
            <div class="form-group mb-3">
                <label for="name"> Nama Lengkap</label>
                <input type="text" name="name" class="form-control rounded-3 @error('name') is-invalid @enderror"
                    id="name" placeholder="Ketik di sini" required autofocus value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control rounded-3 @error('email') is-invalid @enderror"
                    id="email" placeholder="Ketik di sini" required value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- <div class="form-group my-3">
                    <label for="kelas">Kelas</label>
                    <div class="form-check form-check-inline ms-5">
                        <input class="form-check-input" type="radio" name="kelas" id="kls_10">
                        <label class="form-check-label" for="kls_10">
                            X
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="kelas" id="kls_11" checked>
                        <label class="form-check-label" for="kls_11">
                            XI
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="kelas" id="kls_12">
                        <label class="form-check-label" for="kls_12">
                            XII
                        </label>
                    </div>
                </div> --}}

            <div class="form-group">
                <label for="password">Kata Sandi</label>
                <input type="password" name="password"
                    class="form-control rounded-3 @error('password') is-invalid @enderror" id="password"
                    placeholder="Ketik di sini" required>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <small class="text-muted">*8 karakter dengan kombinasi huruf dan angka</small>
            </div>
            <button type="submit" class="btn btn-primary rounded-3 my-2" style="width: 100%;">Daftar
                Akun</button>
        </form>
        <p class="text-center py-3">Sudah punya akun?<a href="/login" style=" text-decoration:none;"> Masuk</a></p>
    </div>
@endsection
