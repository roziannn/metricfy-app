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
    @if (session()->has('successDelete'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width:100% ;">
            {{ session('successDelete') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between">
        <div class="d-flex justify-content-start align-items-center">
            <a href="/dashboard-admin/data-module"><i class="fa-solid fa-chevron-left me-3 text-dark"></i></a>
            <h5 class="p-0 m-0">Modul: {{ $module->title }}</h5>
        </div>


        <div class="btn-group">
            <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                aria-expanded="false">
                Opsi Modul
            </button>
            <ul class="dropdown-menu">
                <li> <a href="/dashboard-admin/data-module/{{ $module->slug }}/create-sub-module"
                        class="dropdown-item">Tambah sub materi</a></li>
                <li><a class="dropdown-item" href="/dashboard-admin/data-module/{{ $module->slug }}/create-exercise">Daftar
                        soal</a></li>
                <li><a class="dropdown-item border-top" href="#" data-bs-toggle="modal"
                        data-bs-target="#deleteModal">Hapus modul</a>
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
                <form method="POST" action="{{ url('/dashboard-admin/module/' . $module->slug . '/delete') }}">
                    @csrf
                    <div class="modal-body py-0">
                        <p>Yakin ingin menghapus module <b>{{ $module->title }}</b> ?</p>
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

    {{-- <h5 class="py-3">Module</h5> --}}
    <form action="/dashboard-admin/module/{{ $module->id }}/update" class="mt-3" method="post"
        enctype="multipart/form-data">
        @csrf
        <div class="card border-0 shadow-sm">
            <div class="p-3">
                <div class="row justify-content between pb-3">
                    <div class="col-sm-6">
                        <label for="thumbnail" class="text-muted form-control-sm p-0 m-0">Thumbnail Module</label>
                        <input class="form-control form-control-sm" type="file" id="thumbnail" name="thumbnail">
                        <span class="text-secondary small"> Rasio 1 : 1 atau berukuran tidak lebih dari 2MB</span>
                    </div>
                    <div class="col-sm-6">
                        <label for="slug" class="text-muted form-control-sm p-0 m-0">Kategori</label>
                        <div class="input-group">
                            <select name="category" id="category" class="form-select">
                                <option class="text-muted" selected>Pilih kategori</option>
                                <option value="Bilangan" {{ $module->category == 'Bilangan' ? 'selected' : '' }}>Bilangan
                                </option>
                                <option value="Geometri" {{ $module->category == 'Geometri' ? 'selected' : '' }}>Geometri
                                </option>
                                <option value="Data" {{ $module->category == 'Data' ? 'selected' : '' }}>
                                    Data</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row justify-content between pb-3">
                    <div class="col-sm-6">
                        <label for="title" class="text-muted form-control-sm p-0 m-0">Nama Module</label>
                        <div class="input-group">
                            <input type="text" name="title" id="title" class="form-control"
                                placeholder="Ketik di sini" value="{{ $module->title }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="slug" class="text-muted form-control-sm p-0 m-0">Slug</label>
                        <div class="input-group">
                            <input type="text" name="slug" id="slug" class="form-control text-secondary"
                                placeholder="Ketik di sini" value="{{ $module->slug }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row justify-content between pb-3">
                    <div class="col-12">
                        <label for="description" class="text-muted form-control-sm p-0 m-0">Deskripsi</label>
                        <div class="input-group">
                            <textarea class="form-control" name="description" id="description" placeholder="Ketik di sini" rows="4">{{ $module->description }}</textarea>
                        </div>
                    </div>

                </div>

                <div class="d-flex justify-content-end py-3">
                    <button class="btn btn-sm btn-success" type="submit"><i
                            class="fa-solid fa-floppy-disk me-2"></i>Simpan</button>
                </div>
            </div>
        </div>
    </form>



    <h5 class="pt-3">
        Daftar Sub Materi
    </h5>


    {{-- <div class="col text-right">
            <a href="/dashboard-admin/data-module/{{ $module->slug }}/create-sub-module"
                class="btn btn-sm btn-primary me-2"><i class="fa-solid fa-plus me-2"></i>Tambah Sub Materi</a>
            <a href="/dashboard-admin/data-module/{{ $module->slug }}/create-exercise" class="btn btn-sm btn-warning"><i
                    class="fa-solid fa-plus me-2"></i>Tambah
                Soal</a>
        </div> --}}


    <table class="table">
        <thead class="table-dark">
            <tr>
                <th width="5%">No</th>
                <th scope="col" width="80%">Title</th>
                {{-- <th scope="col">Created at</th> --}}
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($module->submodules as $sub)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $sub->title }}</td>
                    {{-- <td>{{ $sub->created_at }}</td> --}}
                    <td>
                        <a href="/dashboard-admin/data-module/{{ $module->slug }}/{{ $sub->slug }}/edit"
                            class="btn btn-warning btn-sm">
                            <i class="fas fa-pen-to-square text-white"></i>
                        </a>
                        <a href="#" class="btn btn-danger btn-sm"data-bs-toggle="modal"
                            data-bs-target="#deleteSubModal{{ $sub->slug }}"><i class="fa-solid fa-trash"></i>
                        </a>

                        <div class="modal" id="deleteSubModal{{ $sub->slug }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form method="POST"
                                        action="{{ '/dashboard-admin/data-module/' . $module->slug . '/' . $sub->slug . '/delete' }}">
                                        @csrf
                                        <div class="modal-body">
                                            <p>Yakin ingin menghapus Submodule <b>{{ $sub->title }}</b> ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm btn-light"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-sm btn-danger">Ya,
                                                Hapus</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
@endsection
