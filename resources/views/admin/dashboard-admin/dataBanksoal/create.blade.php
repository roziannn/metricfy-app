@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <button class="btn btn-sm btn-secondary"> <a href="/dashboard-admin/data-blog"
            class="text-decoration-none text-white">Back</a></button>
    <form method="POST" action="/dashboard-admin/blog/store" enctype="multipart/form-data">
        @csrf
        <h5 class="py-3">Buat Paket Soal Baru</h5>
        <div class="row justify-content between pb-3">
            <div class="col-sm-6">
                <label for="title" class="text-muted form-control-sm p-0 m-0">Judul</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Ketik di sini">
            </div>
            <div class="col-sm-3">
                <label for="title" class="text-muted form-control-sm p-0 m-0">Token</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Ketik di sini">
            </div>
            <div class="col-sm-3">
                <label for="estimated_duration" class="text-muted form-control-sm p-0 m-0">Durasi (dalam menit)</label>
                <input type="text" name="estimated_duration" id="estimated_duration" class="form-control">
            </div>
            
            <script>
                // Aktifkan flatpickr dengan mode "duration"
                flatpickr("#estimated_duration", {
                    enableTime: true,
                    noCalendar: true,
                    dateFormat: "H:i",
                    time_24hr: true,
                    minuteIncrement: 5, // Atur langkah waktu, misalnya 10 menit
                    defaultDate: "00:00", // Waktu default
                    allowInput: true
                });
            </script>
            
        </div>
        <div class="row justify-content pb-3">
            <div class="col-sm-6">
                <label for="title" class="text-muted form-control-sm p-0 m-0">Deskripsi Paket</label>
                {{-- <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea> --}}
                <input id="content" type="hidden" name="content" value="{{ old('content') }}">
                <trix-editor input="content"></trix-editor>
            </div>
            <div class="col-sm-3">
                <label for="title" class="text-muted form-control-sm p-0 m-0">Level (tingkat kesulitan)</label>
                <select class="form-select" aria-label="Small select example">
                    <option disabled selected>Pilih level</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
            </div>
            <div class="col-sm-3">
                <label for="title" class="text-muted form-control-sm p-0 m-0">Topik yang diujikan</label>
                <select class="form-select" aria-label="Small select example">
                    <option disabled selected>Pilih level</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button class="btn btn-m btn-success col-md-3 col-sm-12" type="submit">Buat Module</button>
        </div>
    </form>
@endsection
