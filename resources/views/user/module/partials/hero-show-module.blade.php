<div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
    <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
      <h1 class="display-5 fw-bold lh-1 text-body-emphasis">{{ $show_module->title }}</h1>
      <p class="lead text-justify">{{ $show_module->description }}</p>
      <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
        <button type="button" class="btn btn-primary btn-lg px-4 me-md-2 fw-bold" onclick="toSubMateri()">Lanjut ke Materi</button>
      </div>
    </div>
    <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
        <img class="rounded-lg-3" src="/img/gracia1.jpg" alt="" width="520">
    </div>
  </div>

  <script>
    function toSubMateri() {
        window.location.href = '#sub-materi';
    }
  </script>
