@extends('layouts.main')
@include('partials.navbar')
@section('container')
    @if (session()->has('successDelete'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width:100% ;">
            {{ session('successDelete') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <button class="btn btn-sm btn-secondary"> <a href="/dashboard-admin/data-module"
            class="text-decoration-none text-white">Back</a></button>
    <div class="d-flex justify-content-between align-items-center">
        <h5 class="py-3">Latihan Soal Module : {{ $module->title }}</h5>
        <button class="btn btn-m btn-primary" data-bs-toggle="modal" data-bs-target="#modal">+</button>
    </div>

    <div class="modal" id="modal">
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
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="answer" id="answer" value="A">
                                <label class="form-check-label" for="answer">
                                    A
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="answer" id="answer" value="B">
                                <label class="form-check-label" for="answer">
                                    B
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="answer" id="answer" value="C">
                                <label class="form-check-label" for="answer">
                                    C
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="answer" id="answer" value="D">
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

    <h6>Available</h6>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Pertanyaan</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($available_questions as $item)
                <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ Str::limit($item->question, 80) }}</td>
                    <td>
                        <a href="/dashboard-admin/data-module//edit" class="btn btn-warning btn-sm">
                            <i class="fas fa-pen-to-square text-white"></i>
                        </a>
                        <a href="/dashboard-admin/data-module/{{ $item->id }}/delete-exercise"
                            class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-danger"><i
                                class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal Danger Delete-->
    <div class="modal fade" id="modal-danger" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Konfirmasi</h6>
                </div>
                <div class="modal-body">
                    Hapus Pertanyaan?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger">Hapus</button>
                </div>
            </div>
        </div>
    </div>
@endsection
