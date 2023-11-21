<div class="py-5">
    <h4 id="sub-materi">Materi</h4>


    {{-- <p>{{ $sub->title }}</p> --}}
    @foreach ($show_module->submodules as $sub)
        <div class="py-2">
            <div class="card">
                <div class="card-body d-flex align-items-center py-2">
                    <h6 class="card-title mb-0">{{ $sub->title }}</h6>
                    <a href="/materi-belajar/{{ $show_module->slug }}/{{ $sub->slug }}" class="btn btn-outline-primary btn-m ml-auto">Mulai</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
