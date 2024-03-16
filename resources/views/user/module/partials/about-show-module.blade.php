<div class="pt-5"></div>
<div class="d-flex justify-content-between">
    <div class="col-sm-6 px-0">
        <h4 class="font-weight-bold">{{ $show_module->title }}</h4>
        <p class="text-justify">
            {{ $show_module->description }} <br>
        </p>
        <div class="progress" role="progressbar" aria-label="Default striped example" aria-valuenow="10" aria-valuemin="0"
            aria-valuemax="100">
            <div class="progress-bar progress-bar-striped progress-bar-animated" id="progress-bar-inner"></div>
        </div>
    </div>
</div>


{{-- kalkulasi hitung progress belajar user dalam module --}}
<script>
    var totalSubmodules = {{ $totalCurrentSub }};
    var userProgress = @json($userProgress);

    var readSubmodules = userProgress.length;

    var barProgress = (readSubmodules / totalSubmodules) * 100;
    document.getElementById('progress-bar-inner').style.width = barProgress + '%';
</script>
