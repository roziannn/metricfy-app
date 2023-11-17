@extends('layouts.main')
@include('partials.navbar')
@section('container')

    <div class="content-wrapper">
        <div class="col-md-4 mx-auto px-3">
            <h4>
              Masuk
            </h4>
            <form action="/login" method="post">
                @csrf
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

                <div class="form-group my-3">
                    <label for="password">Kata Sandi</label>
                    <input type="password" name="password"
                        class="form-control @error('password') is-invalid @enderror" id="password"
                        placeholder="Ketik di sini" required>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary my-3" style="width: 100%">Masuk</button>
            </form>
            <p>Belum punya akun?<a href="/register"  style=" text-decoration:none;"> Daftar sekarang</a></p>
        </div>
    </div>

@endsection
