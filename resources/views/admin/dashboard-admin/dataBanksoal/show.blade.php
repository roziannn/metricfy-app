@extends('layouts.main')
@include('partials.navbar')
@section('container')

    @if (session()->has('successStore'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width:100% ;">
            {{ session('successStore') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session()->has('successUpdate'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width:100% ;">
            {{ session('successUpdate') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session()->has('successDelete'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width:100% ;">
            {{ session('successDelete') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <button class="btn btn-sm btn-secondary"> <a href="/dashboard-admin/data-banksoal"
            class="text-decoration-none text-white">Back</a></button>
    <form method="POST" action="/dashboard-admin/banksoal/store">
        @csrf
        <h5 class="py-3">Paket Soal: {{ $banksoal->title }}</h5>
        <div class="row justify-content between pb-3">
            <div class="col-sm-6">
                <label for="title" class="text-muted form-control-sm p-0 m-0">Judul</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $banksoal->title }}"
                    placeholder="Ketik di sini">
            </div>
            <div class="col-sm-3">
                <label for="title" class="text-muted form-control-sm p-0 m-0">Token</label>
                <input type="text" name="token" id="token" class="form-control" placeholder="Ketik di sini">
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
                <input id="desc" type="hidden" name="desc" value="{{ old('desc', $banksoal->desc) }}">
                <trix-editor input="desc"></trix-editor>
            </div>
            <div class="col-sm-3">
                <label for="title" class="text-muted form-control-sm p-0 m-0">Level (tingkat kesulitan)</label>
                <select class="form-select" id="level" name="level" aria-label="Small select example">
                    <option selected>{{ $banksoal->level }}</option>
                    <option disabled><small>Pilih level</small></option>
                    <option value="1">Mudah</option>
                    <option value="2">Menengah</option>
                    <option value="3">Sulit</option>
                </select>
            </div>
            <div class="col-sm-3">
                <label for="title" class="text-muted form-control-sm p-0 m-0">Topik yang diujikan</label>
                <select class="form-select" id="topic" name="topic" aria-label="Small select example">
                    <option selected>{{ $banksoal->topic }}</option>
                    <option disabled><small>Pilih topik</small></option>
                    @foreach ($topic as $item)
                        <option value="{{ $item->title }}">{{ $item->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button class="btn btn-m btn-success col-md-3 col-sm-12" type="submit">Simpan Perubahan</button>
        </div>
    </form>

    <div class="py-3"></div>
    <div class="row">
        <div class="col">
            <h5 class="py-2">
                Daftar Soal
            </h5>
        </div>
        <div class="col text-right">
            <a href="#" class="btn btn-m btn-primary" data-bs-toggle="modal" data-bs-target="#modal">Tambah
                Soal</a>
            {{-- <a href="/dashboard-admin/banksoal/{{ $banksoal->slug }}/create" class="btn btn-m btn-primary">Tambah
                Soal</a> --}}
        </div>
    </div>

    <div class="bd-example">
        <table class="table">
            <thead class="table-light">
                <tr>
                    <th scope="col">Pertanyaan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($banksoal->banksoalQuestions as $soal)
                    <tr>
                        <td>{{ $soal->question }}</td>
                        <td>
                            {{-- <a href="/dashboard-admin/banksoal/{{ $banksoal->slug }}/{{ $soal->slug }}/edit"
                                class="btn btn-warning btn-sm">
                                <i class="fas fa-pen-to-square text-white"></i>
                            </a> --}}
                            <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modal-danger{{ $soal->id }}"><i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Modal add soal baru --}}
    <div class="modal" id="modal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="model-title mb-0">Paket soal: {{ $banksoal->title }}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>
                <div class="modal-body">
                    <form action="/dashboard-admin/banksoal/{{ $banksoal->id }}/store" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="question">Pertanyaan</label>
                            <textarea class="form-control" name="question" id="question" cols="10" rows="3" autofocus></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="options">Jawaban <small class="text-danger">*Minimal 1 Opsi
                                    Jawaban</small></label>
                            <input class="form-control my-2" type="text" id="options_1" name="options[]"
                                placeholder="Opsi 1">
                            <input class="form-control my-2" type="text" id="options_2" name="options[]"
                                placeholder="Opsi 2">
                            <input class="form-control my-2" type="text" id="options_3" name="options[]"
                                placeholder="Opsi 3">
                            <input class="form-control my-2" type="text" id="options_4" name="options[]"
                                placeholder="Opsi 4">
                            <input class="form-control my-2" type="text" id="options_5" name="options[]"
                                placeholder="Opsi 5">
                        </div>
                        <div class="form-group mb-3">
                            <label for="question">Jawaban Benar</label> <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="answer" id="answer"
                                    value="A">
                                <label class="form-check-label" for="answer">
                                    A
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="answer" id="answer"
                                    value="B">
                                <label class="form-check-label" for="answer">
                                    B
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="answer" id="answer"
                                    value="C">
                                <label class="form-check-label" for="answer">
                                    C
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="answer" id="answer"
                                    value="D">
                                <label class="form-check-label" for="answer">
                                    D
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="answer" id="answer"
                                    value="E">
                                <label class="form-check-label" for="answer">
                                    E
                                </label>
                            </div>
                        </div>

                        <div class="text-right justify-content-around mt-3">
                            <button type="submit" class="btn btn-primary w-100">Buat Pertanyaan</a></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Danger Delete-->
    @foreach ($banksoal->banksoalQuestions as $soal)
        <div class="modal fade" id="modal-danger{{ $soal->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Konfirmasi</h6>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/dashboard-admin/banksoal/' . $soal->id . '/delete') }}" method="GET">
                            {{ csrf_field() }}
                            <p>Yakin ingin menghapus data?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            aria-label="close">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
