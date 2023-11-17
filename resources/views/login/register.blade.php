@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <div class="content-wrapper">
        <div class="col-md-4 mx-auto px-3">
            <h4>
                Daftar akun Metricfy
            </h4>
            <p class="text-muted">Lengkapi form berikut</p>
            <form action="/register-store" method="post">
                @csrf
                <div class="form-group my-3">
                    <label for="name"> Nama Lengkap</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        id="name" placeholder="Ketik di sini" required value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group my-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
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
                    <label for="password">Kata Sandi</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                        id="password" placeholder="Ketik di sini" required>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <small class="text-muted">Gunakan minimal 8 karakter dengan kombinasi huruf dan angka</small>
                </div>
                <button type="submit" class="btn btn-primary my-3" style="width: 100%">Daftar Akun</button>
            </form>
            <p>Sudah punya akun?<a href="/login" style=" text-decoration:none;"> Masuk</a></p>
        </div>
    </div>
@endsection
