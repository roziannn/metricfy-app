<div class="col-lg-3">
    <button class="btn btn-secondary sidebar-profile-settings-btn d-lg-none" type="button" data-bs-toggle="offcanvas"
        data-bs-target="#sidebar-profile-settings" aria-controls="offcanvasResponsive"><i
            class="bi bi-gear-fill"></i></button>

    <div class="card profile-settings d-none d-lg-flex border-0">
        <div class="header-title d-flex flex-column align-items-start">
            <div class="row align-items-center">
                <div class="col">
                    <strong class="fs-6">Shania Gracia Harlan</strong>
                    <small>gracia@gmail.com</small>
                </div>
            </div>
        </div>


        <a href="/dashboard/posts" class="profile-settings-item my-3 active">Proyek Saya</a>
        <a href="/dashboard/my-workshop" class="profile-settings-item mb-3"> Event</a>
        <a href="/account/profile" class="profile-settings-item">
            Pengaturan</a>


    </div>

    <div class="offcanvas-lg offcanvas-start" tabindex="-1" id="sidebar-profile-settings"
        aria-labelledby="offcanvasResponsiveLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasResponsiveLabel">Pengaturan Akun</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                data-bs-target="#sidebar-profile-settings" aria-label="Close"></button>
        </div>
        <div class="d-lg-none sidebar-offcanvas sidebar-offcanvas-profile-settings">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <a class="profile-settings-item m-2" aria-current="page" href="/account/profile">Data Akun</a>

                <a class="profile-settings-item m-2" aria-current="page" href="#">Data Instansi</a>

                <a class="profile-settings-item m-2" href="/account/change-password">Ubah Kata Sandi</a>
            </ul>
        </div>
    </div>
</div>

<script>
    // menu link active
    document.addEventListener("DOMContentLoaded", function() {
        var url = window.location.pathname;


        var links = document.querySelectorAll('.profile-settings-item');

        links.forEach(function(link) {
            var href = link.getAttribute('href');
            if (url === href) {
                link.classList.add('active');
            }
        });
    });
</script>


<style>
    .profile-settings-item.active {
        background-color: rgb(229, 233, 237);
        border-radius: 5px;
        color: #1b1b1b;
        padding: 8px;
    }

    .sidebar-profile-settings-btn {
        position: fixed;
        top: 80px;
        left: 0;
        z-index: 10;
        padding: 1rem;
    }

    .profile-settings {
        padding: 20px;
    }

    .profile-settings-item {
        text-decoration: none;
        padding-left: 8px;
        color: #111111;
    }

    .bi-settings-icon {
        padding-right: 10px;
    }

    @media (max-width: 997px) {
        .sidebar-profile-settings-btn {
            display: block;
        }
    }
</style>
