<div class="col-md-9 mb-5">
    <div class="card border-0 card-content p-3">
        <div class="d-flex justify-content-between ">
            <div class="fs-5 text-muted">Data User</div>
            <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createUser"><i
                    class="fa-solid fa-plus mr-2"></i>Tambah
                User</a>
        </div>
        <div class="bd-example mt-4">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="row">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($data_user as $user)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $user->name }}</td>
                            <td>
                                <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modal{{ $user->id }}">
                                    <i class="fas fa-pen-to-square text-white"></i>
                                </a>
                                <a href="#" class="btn btn-danger btn-sm"data-toggle="modal"
                                    data-target="#modal-danger{{ $user->id }}"><i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal" id="createUser">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <div class="fs-5 model-title">Tambah User Baru</div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body py-0">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert"
                            style="width:100% ;">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    <form action="/login" method="post">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="email">Nama Lengkap</label>
                            <input type="email" name="email"
                                class="form-control @error('email') is-invalid @enderror" id="email" required
                                placeholder="Ketik nama" autofocus required value="{{ old('email') }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="password">Email</label>
                            <div class="input-group">
                                <input type="password" name="password" class="form-control" id="password" required
                                    placeholder="Ketik email" required>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <label for="password">Roles</label>
                            <select class="form-select" name="roles" id="roles">
                                <option value="USER">USER</option>
                                <option value="ADMIN">ADMIN</option>
                            </select>

                        </div>
                        <div class="modal-footer p-0 border-0">
                            <button type="button" class="btn btn-sm btn-light pull-left"
                                data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-sm btn-primary">Simpan</a></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL FOR EDIT USER DATA --}}
    @foreach ($data_user as $user)
        <div class="modal fade" id="modal{{ $user->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <h5 class="modal-title">Edit Data</h5>
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button> --}}
                    </div>
                    <div class="modal-body py-0">
                        <form action="{{ url('/edit-user' . $user->id) }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group mb-2">
                                <label class="small" for="name">Nama Lengkap</label>
                                <input class="form-control" id="name" name="name" type="text"
                                    value="{{ $user->name }}" autocomplete="off">
                            </div>
                            <div class="form-group mb-2">
                                <label class="small" for="email">Email</label>
                                <input class="form-control" id="email" name="email" type="text"
                                    value="{{ $user->email }}" autocomplete="off">
                            </div>
                            <div class="form-group mb-2">
                                <label class="small" for="roles">Roles</label>
                                <select class="form-select input-sm" name="roles" id="roles"
                                    value="{{ $user->roles }}" required>
                                    <option disabled> --- Roles ---</option>
                                    <option value="USER"{{ $user->roles == 'USER' ? 'selected' : '' }}>
                                        USER</option>
                                    <option value="ADMIN"{{ $user->roles == 'ADMIN' ? 'selected' : '' }}>
                                        ADMIN</option>
                                </select>
                            </div>
                            <div class="modal-footer p-0 border-0">
                                <button type="button" class="btn btn-sm btn-light pull-left"
                                    data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary btn-sm">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
@endforeach

{{-- MODAL FOR DELETE USER --}}
@foreach ($data_user as $user)
    <div class="modal modal-danger fade" id="modal-danger{{ $user->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">Konfirmasi</h5>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button> --}}
                </div>
                <div class="modal-body py-0">
                    <form action="{{ url('/delete-user' . $user->id) }}" method="GET">
                        {{ csrf_field() }}
                        <p>Yakin ingin menghapus data?</p>
                </div>
                <div class="modal-footer pt-0 border-0">
                    <button type="button" class="btn btn-sm btn-outline pull-left"
                        data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-sm btn-danger">Ya, Hapus</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
</div>

<style>
    label {
        font-size: 14px;
    }
</style>
