<div class="col-lg-8">
    @if (session()->has('successUpdate'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width:100% ;">
            {{ session('successUpdate') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('successUpdatePassword'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width:100% ;">
            {{ session('successUpdatePassword') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if ($errors->has('new_password'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="width:100%;">
            {{ $errors->first('new_password') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body" id="accountSettings">
            <div class="account-settings">
                <p class="font-weight-bold"> <i class="fa-solid fa-gear pe-2 text-primary"></i> Pengaturan Akun</p>
                <div class="px-4">
                    <div class="d-flex justify-content-between">
                        <a href="#" class="pb-3 text-decoration-none text-dark" onclick="toggleEditProfile()">Ubah
                            Profil</a>
                        <i class="fa-solid fa-angle-right"></i>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="#" class="pb-3 text-decoration-none text-dark"
                            onclick="toggleEditPassword()">Ubah Kata Sandi</a>
                        <i class="fa-solid fa-angle-right"></i>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="/logout"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="text-decoration-none text-dark">
                            Keluar
                        </a>
                        <i class="fa-solid fa-angle-right"></i>
                        <form id="logout-form" action="/logout" method="post" style="display: none;">
                            @csrf
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div id="editProfileCard" class="card border-1" style="display: none;">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h6>Ubah Profil</h6>
                <button type="button" class="btn-close" aria-label="Close" onclick="closeEditProfile()"></button>
            </div>

            <form action="/profile/update" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-sm-6 my-3 px-0">
                    <div class="align-items-center">
                        <label for="avatar" class="text-muted form-control-sm p-0 m-0">Avatar Profil</label>
                        <input class="form-control form-control-sm" type="file" id="avatar" name="avatar">
                        <span class="text-secondary small"> Rasio 1 : 1 atau berukuran tidak lebih dari 2MB</span>
                    </div>
                </div>

                <div class="row justify-content-around">
                    <div class="col-sm-6  mb-2">
                        <label for="name" class="text-muted form-control-sm p-0 m-0">Nama Lengkap</label>
                        <div class="input-group">
                            <input type="name" name="name" class="form-control form-control-sm" id="name"
                                value="{{ $user->name }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="email" class="text-muted form-control-sm p-0 m-0">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"> <i class="fa-solid fa-envelope"></i></span>
                            <input type="type" name="email" class="form-control form-control-sm text-secondary"
                                id="email" value="{{ $user->email }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-around mt-3 mb-2">
                    <div class="col-sm-6">
                        <label for="name" class="text-muted form-control-sm p-0 m-0">Kelas</label>
                        <div class="input-group">
                            <select name="kelas" id="kelas" class="form-select form-select-sm">
                                <option class="text-muted" selected>Pilih kelas</option>
                                <option value="10" {{ $user->kelas == 10 ? 'selected' : '' }}>Kelas 10</option>
                                <option value="11" {{ $user->kelas == 11 ? 'selected' : '' }}>Kelas 11</option>
                                <option value="12" {{ $user->kelas == 12 ? 'selected' : '' }}>Kelas 12</option>
                                <option value="gapyear" {{ $user->kelas == 'gapyear' ? 'selected' : '' }}>Gap Year
                                </option>
                            </select>
                        </div>
                        @if ($user->kelas === null)
                            <div class="my-2">
                                <span class="text-danger small"><i class="fa-solid fa-triangle-exclamation"></i> kelas
                                    belum dipilih!</span>
                            </div>
                        @endif
                    </div>
                    <div class="col-sm-6">
                        <label for="phone" class="text-muted form-control-sm p-0 m-0">Nomor HP</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                            <input type="number" name="phone" class="form-control form-control-sm" id="phone"
                                value="{{ $user->phone }}" placeholder="Ketik disini">
                        </div>
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-m btn-primary mt-3">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <div id="editPasswordCard" class="card border-1" style="display: none;">
        <div class="card-body">
            <div class="d-flex justify-content-between pb-3">
                <h6>Ubah Kata Sandi</h6>
                <button type="button" class="btn-close" aria-label="Close" onclick="closeEditPassword()"></button>
            </div>

            <form action="/profile/password/update" method="post">
                @csrf
                <div class="row">
                    <div class="col-12 col-sm-6 mb-2">

                        <label for="new_password" class="text-muted form-control-sm">Kata Sandi
                            Baru</label>
                        <input type="password" class="form-control" id="new_password" name="new_password">

                    </div>
                    <div class="col-12 col-sm-6 mb-2">
                        <label for="new_password_confirmation" class="text-muted form-control-sm">Konfirmasi Kata
                            Sandi</label>
                        <input type="password" class="form-control" id="new_password_confirmation"
                            name="new_password_confirmation">
                        @error('new_password_confirmation')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-m btn-primary mt-3">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function toggleEditProfile() {
        var editProfileCard = document.getElementById('editProfileCard');
        var accountSettingsCard = document.getElementById('accountSettings');

        editProfileCard.style.display = (editProfileCard.style.display === 'none' || editProfileCard.style.display ===
            '') ? 'block' : 'none';
        accountSettingsCard.style.display = (editProfileCard.style.display === 'none') ? 'block' : 'none';
    }

    function closeEditProfile() {
        var editProfileCard = document.getElementById('editProfileCard');
        var accountSettingsCard = document.getElementById('accountSettings');

        editProfileCard.style.display = 'none';
        accountSettingsCard.style.display = 'block';
    }

    function toggleEditPassword() {
        var editProfileCard = document.getElementById('editPasswordCard');
        var accountSettingsCard = document.getElementById('accountSettings');

        editProfileCard.style.display = (editProfileCard.style.display === 'none' || editProfileCard.style.display ===
            '') ? 'block' : 'none';
        accountSettingsCard.style.display = (editProfileCard.style.display === 'none') ? 'block' : 'none';
    }

    function closeEditPassword() {
        var editProfileCard = document.getElementById('editPasswordCard');
        var accountSettingsCard = document.getElementById('accountSettings');

        editProfileCard.style.display = 'none';
        accountSettingsCard.style.display = 'block';
    }
</script>
