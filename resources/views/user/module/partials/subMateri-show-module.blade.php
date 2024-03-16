<div class="py-5">
    <div class="d-flex justify-content-between">
        <h5 class="col-sm-6 font-weight-bold px-0">Pembahasan</h5>
        <div class="col-sm-3  px-0 text-end"><span class="badge bg-dark-subtle p-2 text-dark"><i
                    class="fa-solid fa-list-check pe-2"></i> {{ $totalCurrentSub }} Sub Materi</span></div>
    </div>

    @php
        $i = 1;
    @endphp
    @foreach ($show_module->submodules as $submodule)
        <div class="py-2">
            <div class="card">
                <div class="card-body d-flex align-items-center shadow-sm py-2">
                    <h6 class="card-title mb-0">{{ $i++ }}. {{ $submodule->title }}</h6>
                    @if ($submodule->locked)
                        <button class="btn btn-outline-secondary btn-m ml-auto" disabled><i
                                class="fa-solid fa-lock"></i></button>
                    @else
                        <a href="/materi-belajar/{{ $show_module->slug }}/{{ $submodule->slug }}"
                            class="btn btn-outline-primary btn-sm ml-auto">Mulai</a>
                    @endif
                </div>

            </div>
        </div>
    @endforeach

</div>
