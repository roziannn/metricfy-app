<div class="col-lg-4">
    <div class="card">
        <div class="card-body">
            <div class="profile-head text-center">
                <h5 class="card-title fs-5">{{ auth()->user()->name }}</h5>
                <small class="card-title font-weight-bold"> <span class="badge badge-danger">Level 1</span>
                    <span>&#8226;</span> <i class="fa-solid fa-bolt text-warning"></i> {{ auth()->user()->point }} XP
                </small>
                <hr>
            </div>
            <div class="profile-info">
                <small class="card-title text-muted">Email
                </small>
                <p>{{ auth()->user()->email }}</p>
                <small class="card-title text-muted">Phone
                </small>
                <p>{{ auth()->user()->email }}</p>
                <small class="card-title text-muted">Roles
                </small>
                <p>{{ auth()->user()->roles }}</p>
            </div>
        </div>
    </div>
</div>
