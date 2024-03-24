<link rel="shortcut icon" sizes="114x114" href="{{ asset('img/bxMath.png') }}">
@extends('layouts.main')
@include('partials.navbar')

<div class="pt-4">
    <div class="px-3 mb-4 bg-dark">
        <div class="container">
            <div class="py-4">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md-6 my-3">
                        <span class="badge badge-secondary p-2 my-2 rounded-pill text-warning">Pojok Metric</span>
                        <h1 class="fw-bold text-white">About Us <br></h1>
                        <p class="col-sm-12 px-0 pb-3  text-white">Metricfy adalah sebuah platform pembelajaran
                            numerasi
                            yang dirancang khusus untuk membantu anak SMP meningkatkan pemahaman mereka tentang
                            konsep dasar numerasi.
                        </p>
                    </div>
                    <div class="col-md-6 text-end">
                        {{-- <img src="{{ asset('img/actor/lia.png') }}" alt="" class="img-fluid"> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('container')
    <!-- About Wrapper Start -->
    <div class="row mb-5">
        <div class="d-flex justify-content-between my-3 flex-column flex-lg-row">
            <div class="col-lg-6 col-sm-12 mb-3">
                <span class="fs-4 font-weight-bold">Misi</span>
                <p>Membantu siswa dalam memahami basic materi numerasi dan menginspirasi minat belajar mereka.</p>
            </div>
            <div class="col-lg-6 col-sm-12">
                <span class="fs-4 font-weight-bold">Tujuan</span>
                <p class="mt-2"> ✅ Akses mudah dan praktis ke berbagai sumber belajar numerasi</p>
                <p> ✅ Mendorong pembelajaran yang interaktif melalui teknologi</p>
                <p> ✅ Menyediakan konten yang disesuaikan dengan kebutuhan siswa</p>
            </div>
        </div>
    </div>



    <div class="row my-5 pb-4">
        <div class="fs-4 text-center font-weight-bold">Apa saja yang ada di Metricfy?</div>
        <div class="col-lg-4">
            <div class="card mt-3 shadow border-0">
                <div class="card-body text-center">
                    <div class="about_icon bg-indigo p-2 rounded">
                        <i class="fas fa-book fa-xl my-3 text-white"></i>
                    </div>
                    <h5 class="text-dark text-capitalize mt-3 font-weight-bold">Materi Pelajaran</h5>
                    <p class="edu_desc mt-3 mb-0 text-muted">Modul latihan interaktif untuk memperkuat pemahaman
                        konsep-konsep numerasi </p>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card mt-3 shadow border-0">
                <div class="card-body text-center">
                    <div class="about_icon bg-indigo p-2 rounded">
                        <i class="fa-solid fa-rectangle-list fa-xl my-3 text-white"></i>
                    </div>
                    <h5 class="text-dark mt-3 font-weight-bold">Kuis & Latihan Soal</h5>
                    <p class="edu_desc mb-0 mt-3 text-muted">Kuis san latihan online untuk mengukur pemahaman siswa tentang
                        materi yang diajarkan</p>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card mt-3 shadow border-0">
                <div class="card-body text-center">
                    <div class="about_icon bg-indigo p-2 rounded">
                        <i class="fa-solid fa-comments fa-xl my-3 text-white"></i>
                    </div>
                    <h5 class="text-dark text-capitalize mt-3 font-weight-bold">Ruang Belajar Kolaboratif </h5>
                    <p class="edu_desc mb-0 mt-3 text-muted">Forum diskusi untuk siswa berinteraksi, berbagi ide, dan
                        membantu satu sama lain dalam memecahkan masalah </p>
                </div>
            </div>
        </div>
    </div>


    <div class="row my-5">
        <div class="d-flex justify-content-between my-3 flex-column flex-lg-row">
            <div class="col-lg-6 col-sm-12 mb-3">
                <span class="fs-4 font-weight-bold">Komitmen kami</span>
                <p class="font-italic fs-4">"Metricfy berkomitmen untuk memberikan pengalaman pembelajaran yang berkualitas,
                    meningkatkan
                    keterampilan numerasi siswa, dan memberikan dukungan yang diperlukan untuk mencapai keberhasilan
                    akademis"</p>
            </div>
            <div class="col-lg-6 col-sm-12  text-end">
                <img src="{{ asset('img/commite.jpg') }}" class="img-fluid rounded" width="90%" alt="">
            </div>
        </div>
    </div>

    <div class="row my-5">
        <div class="text-center">
            <span class="fs-4 font-weight-bold">Beri Kami Tanggapan Anda</span>
            <p>Apakah Anda memiliki saran atau fitur baru yang ingin Anda lihat di Metricfy? <br> Jangan ragu untuk memberi
                tahu
                kami
                di sini 📩</p>
            <div class="col-lg-6 mx-auto col-12">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label small text-left">Email kamu</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label small">Saran atau tanggapan</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Ketik saran ..."></textarea>
                </div>
                <button class="btn bg-indigo w-100 p-3 text-white" type="submit">Kirim tanggapan</button>
            </div>
        </div>
    </div>
@endsection
