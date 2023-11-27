<div class="col-md-4 m-0 p-0 py-3">
    <div class="card">
        <div class="card-body">
            <h5>{{ $module->title }}</h5>
            @foreach ($playlist as $item)
                <li class="d-flex justify-content-between align-items-center py-2">
                    @if (!$item->locked)
                        <a href="/materi-belajar/{{ $module->slug }}/{{ $item->slug }}"
                            class="text-decoration-none text-dark">
                            <i class="fa-regular fa-circle-play px-2"></i>{{ $item->title }}
                        </a>
                    @else
                        <span class="text-muted">
                            <i class="fa-solid fa-lock px-2"></i>{{ $item->title }}
                        </span>
                    @endif
                </li>
            @endforeach

            @php
                function allSubmodulesDone($userProgressList, $playlist)
                {
                    return collect($playlist)
                        ->pluck('id')
                        ->diff($userProgressList)
                        ->isEmpty();
                }

                $allSubmodulesAccessed = count($userProgressList) === count($playlist) && allSubmodulesDone($userProgressList, $playlist);
            @endphp

            <li class="d-flex justify-content-between align-items-center py-2">
                @if ($allSubmodulesAccessed)
                    <a href="/{{ $module->slug }}/latihan-soal" class="text-decoration-none text-dark">
                        <i class="fa-solid fa-dumbbell px-2"></i>
                        Latihan Soal {{ $module->title }}
                    </a>
                @else
                    <span class="text-muted">
                        <i class="fa-solid fa-lock px-2"></i>Latihan Soal {{ $module->title }}
                    </span>
                @endif
            </li>


        </div>
    </div>
</div>
