<link rel="shortcut icon" sizes="114x114" href="{{ asset('img/bxMath.png') }}">
@extends('layouts.main')
@include('partials.navbar')

<div class="pt-4">
    <div class="px-3 mb-4 bg-body-secondary">
        <div class="container">
            <div class="py-4">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md-6 my-3">
                        <span class="badge badge-secondary p-2 my-2 rounded-pill">Pojok Metric</span>
                        <h1 class="fw-bold text-dark">Introduction: Tentang Pembelajaran Numerasi <br></h1>
                        <p class="col-sm-12 px-0 pb-3 text-dark">Berkenalan dengan literasi numerasi <br> serta tujuan
                            kita mempelajarinya
                        </p>
                        <a href="#numerasiIntro" type="button"
                            class="btn btn-warning btn-m  py-2 col-sm-6 font-weight-bold shadow">Yuk, kenalan dengan
                            Numerasi</a>
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
    <div class="row" style="line-height: 24px;" id="numerasiIntro">
        <div class="col-12 mt-3 mb-5">
            <h6 class="font-weight-bolder text-purple">PEMBELAJARAN NUMERASI</h6>
            <h4 class="font-weight-bold mb-4">Pengertian apa itu numerasi?</h4>
            <div class="section border-bottom">
                <p>
                    Numerasi (disebut juga literasi numerasi dan literasi matematika),
                    diartikan sebagai <b> kemampuan untuk mengaplikasikan
                        konsep dan keterampilan matematika </b> untuk memecahkan masalah
                    praktis dalam berbagai ragam konteks kehidupan sehari-hari,
                    misalnya, di rumah, pekerjaan, dan partisipasi dalam kehidupan
                    masyarakat dan sebagai warga negara.
                </p>
                <p>
                    Numerasi mencakup kemampuan untuk memahami dan mengambil informasi berbentuk angka di sekitar
                    kita,
                    seperti <span class="bg-indigo p-1 text-white font-weight-bold"> grafik, tabel,
                        atau bagan </span> yang membantu
                    kita menganalisis dan memahami
                    data untuk
                    membuat perkiraan dan mengambil keputusan (Kemendikbud, 2017).
                </p>
            </div>
        </div>
        <div class="col-12 mb-5">
            <h6 class="font-weight-bolder text-purple">URGENSI NUMERASI</h6>
            <h4 class="font-weight-bold">Mengapa harus menggunakan numerasi?</h4>
            <div class="section border-bottom">
                <p>Dengan numerasi, kita dapat mengaplikasikan konsep dan keterampilan matematika
                    untuk memecahkan masalah praktis di rumah, sekolah, atau dalam berbagai situasi kehidupan.
                    Contohnya, ketika kita berbelanja, kita menggunakan numerasi untuk menghitung harga barang,
                    mengelola uang, atau membuat estimasi dalam aktivitas sehari-hari. Dengan memahami numerasi,
                    kita dapat lebih percaya diri dalam membuat keputusan dan berpartisipasi aktif sebagai warga
                    yang cerdas dalam masyarakat.</p>
            </div>
        </div>
        <div class="col-12 gap-3 mb-5">
            <div class="row border-bottom">
                <div class="col-md-7">
                    <h6 class="font-weight-bolder text-purple">NUMERASI DAN MATEMATIKA</h6>
                    <h4 class="font-weight-bold">Lalu, Apakah belajar numerasi sama dengan matematika?</h4>
                    <div class="section">
                        <p>Numerasi lebih fokus pada kemampuan menggunakan
                            matematika dalam kehidupan sehari-hari, sementara kompetensi matematika melibatkan pemahaman
                            dan
                            penerapan konsep matematika secara umum. Numerasi lebih praktis dan terkait langsung dengan
                            kehidupan sehari-hari, sedangkan matematika lebih bersifat umum dan teoritis . Lalu, kapan
                            keduanya harus
                            digunakan?</p>
                    </div>
                </div>
                <div class="col-md-5 d-flex align-items-center justify-content-center py-3">
                    <div class="d-flex justify-content-center gap-3">
                        <a href="#" class="text-decoration-none" data-bs-toggle="modal"
                            data-bs-target="#modalUsingNum">
                            <div class="card text-white bg-transparent border-0" style="width: 10rem;">
                                <div class="card-body rounded-3 bg-indigo shadow text-center">
                                    <i class="fa-regular fa-lightbulb fa-5x"></i>
                                    <br>
                                    Menggunakan <br> Numerasi
                                </div>
                            </div>
                        </a>
                        <a href="#" class="text-decoration-none" data-bs-toggle="modal"
                            data-bs-target="#modalUsingMath">
                            <div class="card text-purple bg-transparent border-0" style="width: 10rem;">
                                <div class="card-body rounded-3 bg-white shadow text-center">
                                    <i class="fa-solid fa-square-root-variable fa-5x"></i>
                                    <br>
                                    Menggunakan <br> Matematika
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mb-5">
            <h6 class="font-weight-bolder text-purple">PENGEMBANGAN DIRI</h6>
            <h4 class="font-weight-bold"> Keterkaitan numerasi dengan pengembangan diri</h4>
            <div class="section">
                <p>Keterkaitan numerasi dengan pengembangan diri menunjukkan bahwa pemahaman dan penguasaan konsep
                    matematika tidak hanya berguna dalam konteks akademis, tetapi juga memberikan dampak positif pada
                    perkembangan pribadi seseorang</p>
                <div class="row row-cols-1 row-cols-md-2 g-4 py-3">
                    <div class="col">
                        <div class="card bg-indigo p-4 border-0 rounded-4 my-3 shadow-lg">
                            <div class="row text-white">
                                <p class="display-4"> <i class="fa-solid fa-chart-column text-white"></i></p>
                                <h5 class="font-weight-bold">Pemecahan Masalah</h5>
                                <p>Kemampuan memecahkan masalah secara sistematis dan logis dapat meningkatkan kemampuan
                                    pengambilan keputusan dan pemecahan masalah dalam berbagai konteks</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card bg-white p-4 border-0 rounded-4">
                            <div class="row text-dark">
                                <p class="display-4"><i class="fa-solid fa-thumbs-up text-purple"></i> </p>
                                <h5 class="font-weight-bold">Berfikir Kritis</h5>
                                <p>Kemampuan memecahkan masalah secara sistematis dan logis dapat meningkatkan kemampuan
                                    pengambilan keputusan dan pemecahan masalah dalam berbagai konteks</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card bg-white p-4 border-0 rounded-4">
                            <div class="row text-dark">
                                <p class="display-4"> <i class="fa-solid fa-head-side-virus text-purple"></i></i></p>
                                <h5 class="font-weight-bold">Pemecahan Masalah</h5>
                                <p>Kemampuan memecahkan masalah secara sistematis dan logis dapat meningkatkan kemampuan
                                    pengambilan keputusan dan pemecahan masalah dalam berbagai konteks</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card bg-white p-4 border-0 rounded-4">
                            <div class="row text-dark">
                                <p class="display-4"> <i class="fa-solid fa-rocket text-purple"></i></p>
                                <h5 class="font-weight-bold">Pemecahan Masalah</h5>
                                <p>Kemampuan memecahkan masalah secara sistematis dan logis dapat meningkatkan kemampuan
                                    pengambilan keputusan dan pemecahan masalah dalam berbagai konteks</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="modalUsingNum" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content ">
                <div class="modal-header border-0">
                    <h5 class="font-weight-bold">Penggunaan Numerasi</h5>
                </div>
                <div class="modal-body">
                    <!-- carousel -->
                    <div id='carouselInf' class='carousel slide' data-ride='carousel'>
                        <div class='carousel-inner'>
                            <div class='carousel-item active'>
                                <img class='img-size'
                                    src='https://images.pexels.com/photos/5094486/pexels-photo-5094486.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'
                                    alt='First slide' />
                                <p class="cr-item-text"> <b>Penghitungan Barang</b>
                                    <br> Saat kita pergi ke toko dan menghitung berapa banyak
                                    barang
                                    yang akan kita beli, seperti jumlah buah-buahan atau mainan.
                            </div>
                            <div class='carousel-item'>
                                <img class='img-size'
                                    src='https://images.pexels.com/photos/7129700/pexels-photo-7129700.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'>
                                <p class="cr-item-text"> <b> Menentukan Waktu</b>
                                    <br>Ketika kita melihat jam dan mengidentifikasi pukul
                                    berapa
                                    sekarang atau berapa lama waktu yang telah berlalu.
                                </p>
                            </div>
                            <div class='carousel-item'>
                                <img class='img-size'
                                    src='https://images.pexels.com/photos/3867001/pexels-photo-3867001.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'
                                    alt='Second slide' />
                                <p class="cr-item-text"><b>Mengatur Kegiatan</b> <br>
                                    Saat membuat jadwal atau mengatur waktu untuk berbagai
                                    kegiatan, seperti berapa lama waktu belajar dan berapa lama
                                    istirahat.
                                </p>
                            </div>
                        </div>
                        <a class='carousel-control-prev' href='#carouselInf' role='button' data-slide='prev'>
                            <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                            <span class='sr-only'>Previous</span>
                        </a>
                        <a class='carousel-control-next' href='#carouselInf' role='button' data-slide='next'>
                            <span class='carousel-control-next-icon' aria-hidden='true'></span>
                            <span class='sr-only'>Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalUsingMath" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="font-weight-bold">Penggunaan Matematika</h5>
                </div>
                <div class="modal-body">
                    <!-- carousel -->
                    <div id='carouselInf2' class='carousel slide' data-ride='carousel'>
                        <div class='carousel-inner'>
                            <div class='carousel-item active'>
                                <img class='img-size'
                                    src='https://images.pexels.com/photos/3380743/pexels-photo-3380743.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'
                                    alt='First slide' />
                                <p class="cr-item-text"> <b>Penyelesaian Masalah</b>
                                    <br>Saat kita menggunakan rumus dan operasi
                                    matematika untuk menyelesaikan masalah yang lebih kompleks,
                                    seperti menghitung luas sebuah bangun datar atau menyelesaikan
                                    persamaan.
                                </p>
                            </div>
                            <div class='carousel-item'>
                                <img class='img-size'
                                    src='https://images.pexels.com/photos/669621/pexels-photo-669621.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'>
                                <p class="cr-item-text"> <b>Analisis Data</b>
                                    <br>Ketika kita menggunakan statistik untuk menganalisis data,
                                    seperti menghitung rata-rata, median, atau membuat grafik.
                                </p>
                            </div>
                            <div class='carousel-item'>
                                <img class='img-size'
                                    src='https://images.pexels.com/photos/1005731/pexels-photo-1005731.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'
                                    alt='Second slide' />
                                <p class="cr-item-text"><b>Pengukuran yang Tepat</b> <br>
                                    Saat kita menggunakan satuan pengukuran yang tepat, seperti
                                    meter, liter, atau kilogram untuk mengukur benda-benda dalam
                                    kehidupan sehari-hari.
                                </p>
                            </div>
                        </div>
                        <a class='carousel-control-prev' href='#carouselInf2' role='button' data-slide='prev'>
                            <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                            <span class='sr-only'>Previous</span>
                        </a>
                        <a class='carousel-control-next' href='#carouselInf2' role='button' data-slide='next'>
                            <span class='carousel-control-next-icon' aria-hidden='true'></span>
                            <span class='sr-only'>Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .text-mark-greyBaby {
        background-color: rgb(198, 203, 207);
        /* color: #fff; */
        padding: 5px;
    }

    .text-sub-point {
        font-size: 16px;
        font-weight: 700;
    }

    .img-size {
        height: auto;
        width: 380px;
        background-size: cover;
        overflow: hidden;
    }

    .cr-item-text {
        padding: 0;
        margin: 0;
    }
</style>
