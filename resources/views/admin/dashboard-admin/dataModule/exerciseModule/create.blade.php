@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <div class="pt-5"></div>
    @if (session()->has('successDelete'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width:100% ;">
            {{ session('successDelete') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session()->has('successUpdatePertanyaan'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width:100% ;">
            {{ session('successUpdatePertanyaan') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session()->has('successStore'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width:100% ;">
            {{ session('successStore') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <div class="d-flex justify-content-between ">
        <div class="d-flex justify-content-start align-items-center">
            <a href="/dashboard-admin/data-module" class="text-decoration-none text-dark"><i
                    class="fa-solid fa-chevron-left me-3"></i></a>
            <h5 class="p-0 m-0">Latihan Soal Module : {{ $module->title }}</h5>
        </div>
        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal">+ Tambah soal</button>
    </div>

    <div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="model-title mb-0">Latihan Soal : {{ $module->title }}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="/dashboard-admin/data-module/{{ $module->id }}/store-exercise" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="question">Pertanyaan</label>
                            <textarea class="form-control" name="question" id="question" cols="10" rows="3" autofocus></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="options">Jawaban <small class="text-danger">*Minimal 1 Opsi Jawaban</small></label>
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

                        <div class="form-group mb-3">
                            <label for="question">Pembahasan Kunci Jawaban</label>
                            <textarea class="form-control" name="discussion" id="discussion" cols="10" rows="3">
                            </textarea>
                        </div>

                        <div class="text-right justify-content-around mt-3">
                            <button type="submit" class="btn btn-primary w-100">Buat Pertanyaan</a></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <h6 class="mt-4">Daftar Soal</h6>
    <div class="card border-0 shadow-sm p-3 mb-5">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th width="5%">No</th>
                    <th scope="col">Pertanyaan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $i=1 @endphp
                @foreach ($available_questions as $item)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{!! Str::limit($item->question, 80) !!}</td>
                        <td>
                            <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modal-update{{ $item->id }}">
                                <i class="fas fa-pen-to-square text-white"></i>
                            </a>
                            <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modal-danger{{ $item->id }}"><i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <!-- Modal Danger Delete-->
                    <div class="modal fade" id="modal-danger{{ $item->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header border-0">
                                    <h6 class="modal-title">Konfirmasi</h6>
                                </div>
                                <form method="post"
                                    action="{{ '/dashboard-admin/data-module/' . $module->slug . '/' . 'exercise/' . $item->id . '/delete' }}">
                                    @csrf
                                    <div class="modal-body py-0">
                                        Hapus Pertanyaan?
                                    </div>
                                    <div class="modal-footer border-0">
                                        <button type="button" class="btn btn-sm btn-light"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Update -->
                    <div class="modal fade" id="modal-update{{ $item->id }}" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="model-title mb-0">Edit Pertanyaan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="close"></button>
                                </div>
                                <div class="modal-body">

                                    <form
                                        action="/dashboard-admin/data-module/{{ $module->slug }}/exercise/{{ $item->id }}/update"
                                        method="post">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <label for="question">Pertanyaan</label>
                                            <textarea class="form-control" name="question" id="question" cols="10" rows="3" autofocus>{{ $item->question }}
                                                    </textarea>

                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="options">Jawaban <small class="text-danger">*Minimal 1 Opsi
                                                    Jawaban</small></label>
                                            @php
                                                $options = json_decode($item->options);
                                            @endphp
                                            @foreach ($options as $key => $option)
                                                <input class="form-control my-2" type="text"
                                                    id="options_{{ $key }}" name="options[]"
                                                    placeholder="Opsi {{ $key + 1 }}" value="{{ $option }}">
                                            @endforeach
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="question">Jawaban Benar</label> <br>
                                            @php
                                                $options = json_decode($item->options);
                                                $selectedAnswers = str_split($item->answer);
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

                                        <div class="form-group mb-3">
                                            <label for="question">Pembahasan Kunci Jawaban</label>
                                            <textarea class="form-control" name="discussion" id="discussion" cols="10" rows="3" autofocus>{{ $item->discussion }}
                                                    </textarea>
                                        </div>

                                        <div class="text-right justify-content-around mt-3">
                                            <button type="submit" class="btn btn-primary w-100">Simpan
                                                Pertanyaan</a></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
