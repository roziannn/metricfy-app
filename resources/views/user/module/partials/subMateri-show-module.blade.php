<div class="py-5">
    <h4 id="sub-materi">Materi</h4>

    @foreach ($show_module->submodules as $submodule)
        <div class="py-2">
            <div class="card">
                <div class="card-body d-flex align-items-center py-2">
                    <h6 class="card-title mb-0">{{ $submodule->title }}</h6>
                    @if ($submodule->locked)
                        <button class="btn btn-outline-secondary btn-m ml-auto" disabled><i class="fa-solid fa-lock"></i></button>
                    @else
                        <a href="/materi-belajar/{{ $show_module->slug }}/{{ $submodule->slug }}" class="btn btn-outline-primary btn-m ml-auto">Mulai</a>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>

