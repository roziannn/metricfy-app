@extends('layouts.main')
{{-- @include('partials.navbar') --}}
{{-- @section('container') --}}
<div class="content-wrapper">
    <div class="col-lg-4 col-md-9 mx-auto px-3">
        <div class="logo">
            <a class="link-body-emphasis text-decoration-none fs-4 nav-logo" style="margin-right: 50px;"
                href="/">METRICFY</a>
            <h4 class="my-4">
                Masuk untuk belajar dan latihan literasi
            </h4>
        </div>
        <form action="/login" method="post">
            @csrf
            <div class="form-group my-3">
                <label for="email" class="text-secondary">Email</label>
                <input type="email" name="email" class="form-control rounded-3 @error('email') is-invalid @enderror"
                    id="email" placeholder="ketik di sini" required value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

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
            </div>
            <button type="submit" class="btn btn-primary my-2  rounded-3" style="width: 100%">Masuk</button>
        </form>
        <p>Belum punya akun?<a href="/register" style=" text-decoration:none;"> Daftar sekarang</a></p>
    </div>
</div>
{{-- @endsection --}}
