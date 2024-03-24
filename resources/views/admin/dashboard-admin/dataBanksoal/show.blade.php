@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <div class="pt-5"></div>
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

    @if (session()->has('successUpdatePertanyaan'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width:100% ;">
            {{ session('successUpdatePertanyaan') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session()->has('successDelete'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width:100% ;">
            {{ session('successDelete') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- <button class="btn btn-sm btn-secondary"> <a href="/dashboard-admin/data-banksoal"
            class="text-decoration-none text-white">Back</a></button> --}}
    <div class="d-flex justify-content-between">
        <div class="d-flex justify-content-start align-items-center">
            <a href="/dashboard-admin/data-banksoal"><i class="fa-solid fa-chevron-left me-3 text-dark"
                    aria-hidden="true"></i></a>
            <h5 class="p-0 m-0">Paket Soal: {{ $banksoal->title }}</h5>
        </div>

        <div class="btn-group">
            <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                aria-expanded="false">
                Opsi Paket Soal
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#banksoalDaftarSoal">Daftar Soal</a></li>
                <li><a class="dropdown-item border-top" href="#" data-bs-toggle="modal"
                        data-bs-target="#deleteModal">Hapus Paket Soal</a>
                </li>

            </ul>
        </div>
    </div>

    {{-- Modal delete-confirm --}}
    <div class="modal" id="deleteModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ url('/dashboard-admin/banksoal/' . $banksoal->slug . '/delete') }}">
                    @csrf
                    <div class="modal-body py-0">
                        <p>Yakin ingin menghapus module <b>{{ $banksoal->title }}</b> ?</p>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-sm btn-light" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-sm btn-danger">Ya, Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Modal delete-confirm --}}


    <form method="POST" action="/dashboard-admin/banksoal/{{ $banksoal->slug }}/update" class="mt-3">
        @csrf
        <div class="card border-0 shadow-sm p-3">
            <div class="row justify-content between pb-3">
                <div class="col-sm-4">
                    <label for="title" class="text-muted form-control-sm p-0 m-0">Judul</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $banksoal->title }}"
                        placeholder="Ketik di sini">
                </div>
                <div class="col-sm-4" hidden>
                    <label for="slug" class="text-muted form-control-sm p-0 m-0">Slug</label>
                    <input type="text" name="slug" id="slug" class="form-control" value="{{ $banksoal->slug }}"
                        placeholder="Ketik di sini" readonly>
                </div>
                {{-- <div class="col-sm-3">
                <label for="title" class="text-muted form-control-sm p-0 m-0">Token</label>
                <input type="text" name="token" id="token" class="form-control" placeholder="Ketik di sini">
            </div> --}}
                <div class="col-sm-2">
                    <label for="estimated_duration" class="text-muted form-control-sm p-0 m-0">Durasi (dalam menit)</label>
                    <input type="text" name="estimated_duration" id="estimated_duration" class="form-control"
                        @if (isset($banksoal->estimated_duration)) value="{{ $banksoal->estimated_duration }}" @endif>
                </div>

                <script>
                    // Pastikan nilai value sudah ada sebelum inisialisasi picker
                    var estimatedDurationValue = @json($banksoal->estimated_duration ?? ''); // Jika data tidak ada, inisialisasi dengan string kosong

                    // Aktifkan flatpickr dengan mode "duration"
                    flatpickr("#estimated_duration", {
                        enableTime: true,
                        noCalendar: true,
                        dateFormat: "H:i",
                        time_24hr: true,
                        minuteIncrement: 5, // Atur langkah waktu, misalnya 10 menit
                        defaultDate: estimatedDurationValue, // Tetapkan nilai value sebagai defaultDate
                        allowInput: true
                    });
                </script>


                <div class="col-sm-2">
                    <label for="title" class="text-muted form-control-sm p-0 m-0">Level (tingkat kesulitan)</label>
                    <select class="form-select" id="level" name="level" aria-label="Small select example">
                        <option selected>{{ $banksoal->level }}</option>
                        <option disabled><small>Pilih level</small></option>
                        <option value="1">Mudah</option>
                        <option value="2">Menengah</option>
                        <option value="3">Sulit</option>
                    </select>
                </div>

                <div class="col-sm-4">
                    <label for="topic" class="text-muted form-control-sm p-0 m-0">Topik yang diujikan</label>
                    <select class="form-select" id="topic" name="topic" aria-label="Small select example">
                        <option selected>{{ $banksoal->topic }}</option>
                        <option disabled><small>Pilih topik</small></option>
                        @foreach ($topic as $item)
                            <option value="{{ $item->title }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row justify-content pb-3">
                <div class="col-12">
                    <label for="title" class="text-muted form-control-sm p-0 m-0">Deskripsi Paket</label>
                    <input id="desc" type="hidden" name="desc" value="{{ old('desc', $banksoal->desc) }}">
                    <trix-editor class="bg-white" input="desc"></trix-editor>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn btn-sm btn-success" type="submit"><i
                        class="fa-solid fa-floppy-disk me-2"></i>Simpan</button>
            </div>
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
            <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal">Buat
                pertanyaan
                baru
            </a>
            {{-- <a href="/dashboard-admin/banksoal/{{ $banksoal->slug }}/create" class="btn btn-m btn-primary">Tambah
                Soal</a> --}}
        </div>
    </div>

    <div class="bd-example">
        <table class="table" id="banksoalDaftarSoal">
            <thead class="table-light">
                <tr>
                    <th scope="col">Pertanyaan</th>
                    <th scope="col" class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($banksoal->banksoalQuestions as $soal)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{!! $soal->question !!}</td>
                        <td class="text-end">
                            <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modal-edit{{ $soal->id }}">
                                <i class="fas
                                fa-pen-to-square text-white"></i>
                            </a>
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
    <div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="model-title mb-0">Paket soal: {{ $banksoal->title }}</h5>
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

                            <div class="px-4">
                                <input class="form-check-input" type="checkbox" id="answer_1" name="answer[]"
                                    value="A">
                                <label class="form-check-label" for="answer_1">A</label><br>
                                <input class="form-check-input" type="checkbox" id="answer_2" name="answer[]"
                                    value="B">
                                <label class="form-check-label" for="answer_2">B</label><br>
                                <input class="form-check-input" type="checkbox" id="answer_3" name="answer[]"
                                    value="C">
                                <label class="form-check-label" for="answer_3">C</label><br>
                                <input class="form-check-input" type="checkbox" id="answer_4" name="answer[]"
                                    value="D">
                                <label class="form-check-label" for="answer_4">D</label><br>
                                <input class="form-check-input" type="checkbox" id="answer_5" name="answer[]"
                                    value="E">
                                <label class="form-check-label" for="answer_5">E</label><br>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-check-label" for="discussion">Pembahasan Kunci Jawaban</label>
                            <textarea class="form-control my-2" type="text" id="discussion" name="discussion" rows="3"></textarea>
                        </div>

                        <div class="text-right justify-content-around mt-3">
                            <button type="submit" class="btn btn-primary w-100">Buat Pertanyaan</a></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit-->
    @foreach ($banksoal->banksoalQuestions as $soal)
        <div class="modal" id="modal-edit{{ $soal->id }}">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="model-title mb-0">Paket soal: {{ $banksoal->title }}</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                    </div>
                    <form action="/dashboard-admin/banksoal/{{ $soal->banksoal_id }}/{{ $soal->id }}/update"
                        method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group mb-3">
                                <label for="question">Pertanyaan</label>
                                <textarea class="form-control" name="question" id="question" cols="10" rows="3" autofocus>{{ $soal->question }}
                                </textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="options">Jawaban <small class="text-danger">*Minimal 1 Opsi
                                        Jawaban</small></label>
                                @php
                                    $options = json_decode($soal->options);
                                @endphp
                                @foreach ($options as $key => $option)
                                    <input class="form-control my-2" type="text" id="options_{{ $key }}"
                                        name="options[]" placeholder="Opsi {{ $key + 1 }}"
                                        value="{{ $option }}">
                                @endforeach
                            </div>
                            <div class="form-group mb-3">
                                <label for="question">Jawaban Benar</label> <br>
                                @php
                                    $options = json_decode($soal->options);
                                    $selectedAnswers = str_split($soal->answer);
                                @endphp
                                @foreach ($options as $key => $option)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="answer[]"
                                            id="answer_{{ $key }}" value="{{ chr(65 + $key) }}"
                                            @if (in_array(chr(65 + $key), $selectedAnswers)) checked @endif>
                                        <label class="form-check-label"
                                            for="answer_{{ $key }}">{{ chr(65 + $key) }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group mb-2">
                                <label class="form-check-label" for="discussion">Pembahasan Kunci
                                    Jawaban</label>
                                <textarea class="form-control my-2" type="text" id="discussion" name="discussion" rows="3">{{ $soal->discussion }}</textarea>
                            </div>

                            <div class="text-right justify-content-around mt-3">
                                <button type="submit" class="btn btn-primary w-100">Simpan Pertanyaan</a></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach


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
