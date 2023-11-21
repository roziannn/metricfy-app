<div class="col-md-9 mb-5">
    <div class="card card-content p-3">
        <div class="fs-5 font-weight-bold">Data User</div>
        <div class="text-right">
            <a href="#" class="btn btn-primary btn-sm shadow" data-bs-toggle="modal"
                data-bs-target="#createUser">Tambah User</a>
        </div>
        <div class="bd-example py-3">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th scope="col">Email</th>
                        <th scope="col">Roles</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_user as $user)
                        <tr>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->roles }}</td>
                            <td>
                                <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modal{{ $user->id }}">
                                    <i class="fas fa-pen-to-square text-white"></i>
                                </a>
                                <a href="#" class="btn btn-danger btn-sm"data-toggle="modal"
                                    data-target="#modal-danger{{ $user->id }}"><i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal" id="createUser">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="model-title mb-0">Tambah User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
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
                        <div class="text-right justify-content-around mt-3">
                            <button type="button" class="btn btn-sm btn-danger pull-left"
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
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Data</h5>
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button> --}}
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/edit-user' . $user->id) }}" method="POST">
                            {{ csrf_field() }}
                            <div class="col-sm-12 mb-3">
                                <label class="small" for="name">Nama Lengkap</label>
                                <input class="form-control" id="name" name="name" type="text"
                                    value="{{ $user->name }}" autocomplete="off">
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="small" for="email">Email</label>
                                <input class="form-control" id="email" name="email" type="text"
                                    value="{{ $user->email }}" autocomplete="off">
                            </div>
                            <div class="col-sm-12 mb-3">
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
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-m btn-danger pull-left"
                            data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary btn-m">Simpan Perubahan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    {{-- MODAL FOR DELETE USER --}}
    @foreach ($data_user as $user)
    <div class="modal modal-danger fade" id="modal-danger{{ $user->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi</h5>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button> --}}
                </div>
                <div class="modal-body">
                    <form action="{{ url('/delete-user' . $user->id) }}" method="GET">
                        {{ csrf_field() }}
                        <p>Yakin ingin menghapus data?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-m btn-outline pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-m btn-danger">Hapus</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
</div>
