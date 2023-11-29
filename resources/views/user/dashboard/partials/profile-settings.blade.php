<div class="col-lg-8 p-0">
    <div class="card border-0">
        <div class="card-body" id="accountSettings">
            <div class="account-settings">
                <p class="font-weight-bold"> <i class="fa-solid fa-gear pe-2 text-primary"></i> Pengaturan Akun</p>
                <div class="px-4">
                    <div class="d-flex justify-content-between">
                        <a href="#" class="pb-3 text-decoration-none text-secondary"
                            onclick="toggleEditProfile()">Ubah Profil</a>
                        <i class="fa-solid fa-angle-right"></i>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p>Ubah Password</p>
                        <i class="fa-solid fa-angle-right"></i>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p>Keluar</p>
                        <i class="fa-solid fa-angle-right"></i>
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
</script>
