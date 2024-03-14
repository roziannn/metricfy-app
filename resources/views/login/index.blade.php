@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <div class="col-lg-4 col-md-9 mx-auto px-3">
        <img src="{{ asset('img/partials/studyImg.jpg') }}" width="200px" alt="">
        <h5 class="my-3 font-weight-bold">
            Masuk untuk belajar
        </h5>

        <form action="/login" method="post">
            @csrf
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control rounded-3 @error('email') is-invalid @enderror"
                    id="email" placeholder="Ketik di sini" required autofocus value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

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
            </div>
            <button type="submit" class="btn btn-primary my-2  rounded-3" style="width: 100%">Masuk</button>
        </form>
        <p class="text-center py-3">Belum punya akun?<a href="/register" style=" text-decoration:none;"> Daftar sekarang</a>
        </p>
    </div>
@endsection

<script>
    Swal.fire({
        title: 'Error!',
        text: 'Do you want to continue',
        icon: 'error',
        confirmButtonText: 'Cool'
    })
</script>
