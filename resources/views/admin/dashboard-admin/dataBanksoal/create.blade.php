@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <div class="pt-5"></div>
    <div class="d-flex justify-content-start align-items-center">
        <a href="/dashboard-admin/data-banksoal" class="text-decoration-none text-dark"><i
                class="fa-solid fa-chevron-left me-3"></i></a>
        <h5 class="p-0 m-0">Buat Paket Soal Baru</h5>
    </div>

    <div class="card p-3 mt-4">
        <form method="POST" action="/dashboard-admin/banksoal/store">
            @csrf
            <div class="row justify-content between pb-3">
                <div class="col-sm-6">
                    <label for="title" class="text-muted form-control-sm p-0 m-0">Judul</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Ketik di sini">
                </div>
                {{-- <div class="col-sm-2">
                    <label for="title" class="text-muted form-control-sm p-0 m-0">Token</label>
                    <input type="text" name="token" id="token" class="form-control" placeholder="Ketik di sini">
                </div> --}}
                <div class="col-sm-2">
                    <label for="estimated_duration" class="text-muted form-control-sm p-0 m-0">Durasi (dalam menit)</label>
                    <input type="text" name="estimated_duration" id="estimated_duration" class="form-control">
                </div>
                <div class="col-sm-2">

                    <label for="title" class="text-muted form-control-sm p-0 m-0">Level (tingkat kesulitan)</label>
                    <select class="form-select" id="level" name="level" aria-label="Small select example">
                        <option disabled selected>Pilih level</option>
                        <option value="1">Mudah</option>
                        <option value="2">Menengah</option>
                        <option value="3">Sulit</option>
                    </select>
                </div>

                <div class="col-sm-2">
                    <label for="title" class="text-muted form-control-sm p-0 m-0">Topik yang diujikan</label>
                    <select class="form-select" id="topic" name="topic" aria-label="Small select example">
                        <option disabled selected>Pilih topik</option>
                        @foreach ($topic as $item)
                            <option value="{{ $item->title }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
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
                <div class="col-12">
                    <label for="title" class="text-muted form-control-sm p-0 m-0">Deskripsi Paket</label>
                    <input id="desc" type="hidden" name="desc" value="{{ old('desc') }}">
                    <trix-editor input="desc"></trix-editor>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn btn-sm col-md-2 btn-success col-sm-12" type="submit">Buat Paket Soal</button>
            </div>
        </form>
    </div>
@endsection
