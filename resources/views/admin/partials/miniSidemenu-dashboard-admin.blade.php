<div class="col-lg-3">
    <button class="btn btn-secondary sidebar-profile-settings-btn d-lg-none" type="button" data-bs-toggle="offcanvas"
        data-bs-target="#sidebar-profile-settings" aria-controls="offcanvasResponsive"><i
            class="bi bi-gear-fill"></i></button>

    <div class="card profile-settings d-none d-lg-flex border-0">
        <a href="/dashboard-admin" class="profile-settings-item text-decoration-none px-3"><i
                class="fa-solid fa-table mr-2"></i>Overview</a>
        <a href="/dashboard-admin/data-user" class="profile-settings-item text-decoration-none px-3"><i
                class="fa-solid fa-users mr-2"></i> Data User</a>
        <a href="/dashboard-admin/data-module" class="profile-settings-item text-decoration-none px-3">
            <i class="fa-solid fa-book mr-2"></i>Data Module</a>
        <a href="/dashboard-admin/data-blog" class="profile-settings-item text-decoration-none px-3">
            <i class="fa-solid fa-newspaper mr-2"></i>Data Blog</a>
        <a href="/dashboard-admin/data-banksoal" class="profile-settings-item text-decoration-none px-3">
            <i class="fa-solid fa-list mr-2"></i>Data
            Banksoal</a>
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
                <a class="profile-settings-item m-2" aria-current="page" href="/dashboard-admin">Overview</a>
                <a class="profile-settings-item m-2" aria-current="page" href="/dashboard-admin/data-user">Data User</a>
                <a class="profile-settings-item m-2" aria-current="page" href="/dashboard-admin/data-module">Data
                    Module</a>
                <a class="profile-settings-item m-2" aria-current="page" href="/dashboard-admin/data-blog">Data Blog</a>
                <a class="profile-settings-item m-2" aria-current="page" href="/dashboard-admin/data-banksoal">Data
                    Banksoal</a>
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
        padding: 8px;
    }


    .profile-settings-item {
        text-decoration: none;
        padding-left: 8px;
        color: #111111;
        padding: 8px;
    }


    .bi-settings-icon {
        padding-right: 10px;
    }

    @media (max-width: 997px) {
        .sidebar-profile-settings-btn {
            display: block;
        }
    }

    .profile-settings {
        padding: 4px;
    }
</style>
