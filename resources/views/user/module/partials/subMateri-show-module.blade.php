<div class="py-5">
<h4>Materi</h4>


@foreach ($show_module->submodules as $sub  )
    <p>{{ $sub->title }}</p>
@endforeach
</div>