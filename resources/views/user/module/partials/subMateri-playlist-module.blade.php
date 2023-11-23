 <div class="col-md-4 m-0 p-0 py-3">
     <div class="card">
         <div class="card-body">
            <h5>{{ $module->title }}</h5>
             @foreach ($playlist as $item)
                 <li class="d-flex justify-content-between align-items-center py-2">
                    <a href="/materi-belajar/{{ $module->slug }}/{{ $item->slug }}"
                        class="text-decoration-none"><i class="fa-regular fa-circle-play px-2"></i>{{ $item->title}}</a>
                 </li>
             @endforeach
             <li class="d-flex justify-content-between align-items-center py-2">
                <a href="/{{ $module->slug }}/latihan-soal"
                    class="text-decoration-none"><i class="fa-solid fa-dumbbell px-2"></i>Latihan Soal {{ $module->title }}</a>
             </li>
         </div>
     </div>
 </div>
