@extends('layouts.main')
{{-- @include('partials.navbar') --}}
{{-- @section('container') --}}
<div class="content-wrapper">
    <div class="col-md-4 mx-auto px-3">

        <div class="logo">
            <a class="link-body-emphasis text-decoration-none fs-4 nav-logo" style="margin-right: 50px;"
                href="/">METRICFY</a>
            <h4 class="my-4">
                Buat akun baru
            </h4>
        </div>
        {{-- <p class="text-muted">Lengkapi form berikut</p> --}}
        <form action="/register-store" method="post">
            @csrf
            <div class="form-group my-3">
                <label for="name" class="text-secondary"> Nama Lengkap</label>
                <input type="text" name="name" class="form-control rounded-3 @error('name') is-invalid @enderror"
                    id="name" placeholder="Ketik di sini" required value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group my-3">
                <label for="email" class="text-secondary">Email</label>
                <input type="email" name="email" class="form-control rounded-3 @error('email') is-invalid @enderror"
                    id="email" placeholder="Alamat Email" required value="{{ old('email') }}">
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

            <div class="form-group my-3">
                <label for="password" class="text-secondary">Kata Sandi</label>
                <input type="password" name="password"
                    class="form-control rounded-3 @error('password') is-invalid @enderror" id="password"
                    placeholder="Ketik di sini" required>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <small class="text-muted">Gunakan minimal 8 karakter dengan kombinasi huruf dan angka</small>
            </div>
            <button type="submit" class="btn btn-primary rounded-3 my-2" style="width: 100%;">Daftar Akun</button>
        </form>
        <p>Sudah punya akun?<a href="/login" style=" text-decoration:none;"> Masuk</a></p>
    </div>
</div>
{{-- @endsection --}}
