@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <div class="pb-5">
        <div class="row py-3" style="line-height: 32px;">
            <div class="col-12 text-center">
                <div class="section section-1">
                    <h2 class="font-weight-bolder">Pembelajaran Numerasi</h2>
                    <div class="col-md-9 text-justify mx-auto py-4">
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
                            seperti dalam <span class="text-mark-blue"> grafik, tabel,
                                atau bagan </span>.
                            Ini membantu
                            kita menganalisis dan memahami
                            data untuk
                            membuat perkiraan dan mengambil keputusan (Kemendikbud, 2017).
                        </p>
                        <h4 class="py-2 font-weight-bold" id="">
                            Mengapa numerasi itu penting?
                        </h4>
                        <p>Dengan numerasi, kita dapat mengaplikasikan konsep dan keterampilan matematika
                            untuk memecahkan masalah praktis di rumah, sekolah, atau dalam berbagai situasi kehidupan.
                            Contohnya, ketika kita berbelanja, kita menggunakan numerasi untuk menghitung harga barang,
                            mengelola uang, atau membuat estimasi dalam aktivitas sehari-hari. Dengan memahami numerasi,
                            kita dapat lebih percaya diri dalam membuat keputusan dan berpartisipasi aktif sebagai warga
                            yang cerdas dalam masyarakat.</p>
                    </div>
                </div>

                <div class="section section-2">
                    <div class="col-md-9 text-justify mx-auto py-2">
                        <h4 class="py-2 font-weight-bold">
                            Apakah belajar numerasi sama dengan matematika?
                        </h4>
                        <p>
                            Numerasi tidaklah sama dengan kompetensi matematika. Numerasi lebih fokus pada kemampuan
                            menggunakan matematika dalam kehidupan sehari-hari, sementara kompetensi matematika melibatkan
                            pemahaman dan penerapan konsep matematika secara umum. <b>Numerasi lebih praktis dan terkait
                                langsung dengan kehidupan sehari-hari </b>, sedangkan <b> matematika lebih bersifat
                                umum dan
                                teoritis </b>.
                        </p>
                    </div>
                </div>

                <div class="section section-3 mb-5">
                    <div class="col-md-9 text-justify mx-auto">
                        <h4 class="py-2 font-weight-bold" style="line-height: 1.5;">
                            Lalu, kapan keduanya digunakan?
                        </h4>
                        {{-- <div class="d-flex justify-content-between">
                            <div class="col-4 p-0">
                                <h5 class="text-mark-greyBaby text-sub-point text-uppercase">Menggunakan numerasi</h5>
                                <p>halo Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe vero laborum rerum
                                    laboriosam
                                    ipsum velit deleniti, hic esse ea quod, fuga, ipsa accusamus eum debitis.
                                </p>
                            </div>
                            <div class="col-4 p-0">
                                <h5 class="text-mark-greyBaby text-sub-point text-uppercase">Menggunakan matematika</h5>
                                <p>halo Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe vero laborum rerum
                                    laboriosam
                                    ipsum velit deleniti, hic esse ea quod, fuga, ipsa accusamus eum debitis.
                                </p>
                            </div>
                        </div> --}}
                        <div class="d-flex justify-content-center gap-3">

                            <button class="btn btn-m btn-primary shadow" data-bs-toggle="modal"
                                data-bs-target="#modalUsingNum">
                                Menggunakan Numerasi
                            </button>
                            <button class="btn btn-m btn-warning shadow" data-bs-toggle="modal"
                                data-bs-target="#modalUsingMath">
                                Menggunakan Matematika
                            </button>

                            <div class="modal fade" id="modalUsingNum" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Penggunaan Numerasi</h1>

                                        </div>
                                        <div class="modal-body">
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
                                                    <a class='carousel-control-prev' href='#carouselInf' role='button'
                                                        data-slide='prev'>
                                                        <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                                                        <span class='sr-only'>Previous</span>
                                                    </a>
                                                    <a class='carousel-control-next' href='#carouselInf' role='button'
                                                        data-slide='next'>
                                                        <span class='carousel-control-next-icon' aria-hidden='true'></span>
                                                        <span class='sr-only'>Next</span>
                                                    </a>
                                                </div>
                                            </div>


                                        </div>
                                        {{-- <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Ok</button>

                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="modalUsingMath" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Penggunaan Matematika</h1>

                                        </div>
                                        <div class="modal-body">
                                            <!-- carousel -->
                                            <div id='carouselInf' class='carousel slide' data-ride='carousel'>

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
                                                <a class='carousel-control-prev' href='#carouselInf' role='button'
                                                    data-slide='prev'>
                                                    <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                                                    <span class='sr-only'>Previous</span>
                                                </a>
                                                <a class='carousel-control-next' href='#carouselInf' role='button'
                                                    data-slide='next'>
                                                    <span class='carousel-control-next-icon' aria-hidden='true'></span>
                                                    <span class='sr-only'>Next</span>
                                                </a>
                                            </div>
                                        </div>
                                        {{-- <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Ok</button>

                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section section-4">
                    <div class="col-md-9 text-justify mx-auto">
                        <h4 class="py-2 font-weight-bold" style="line-height: 1.5;">
                            Aktivitas Belajar Numerasi
                        </h4>
                        <p>
                            Aktivitas belajar numerasi sangatlah menarik dan bermanfaat untuk memahami konsep matematika
                            dalam situasi sehari-hari. Salah satu aktivitas yang seru adalah berbelanja di toko. Ketika kita
                            pergi berbelanja, kita perlu menggunakan numerasi untuk menghitung harga barang, mengelola uang
                            yang dimiliki, dan bahkan membandingkan harga antar produk. Misalnya, jika kita memiliki uang Rp
                            50,000 dan ingin membeli dua barang yang masing-masing harganya Rp 20,000 dan Rp 25,000, kita
                            perlu menggunakan numerasi untuk menghitung total belanja, mengurangkan harga barang dari jumlah
                            uang yang dimiliki, dan menentukan sisa uang. Dengan melakukan aktivitas ini, kita tidak hanya
                            belajar mengenai konsep matematika, tetapi juga meningkatkan kemampuan numerasi kita untuk
                            diaplikasikan dalam kehidupan sehari-hari.
                        </p>
                    </div>
                </div>
                <div class="section section-5">
                    <div class="col-md-9 text-justify mx-auto">
                        <h4 class="py-2 font-weight-bold" style="line-height: 1.5;">
                            Keterkaitan numerasi dengan pengembangan diri
                        </h4>
                        <p>
                            Keterkaitan numerasi dengan pengembangan diri menunjukkan bahwa pemahaman dan penguasaan konsep
                            matematika tidak hanya berguna dalam konteks akademis, tetapi juga memberikan dampak positif
                            pada perkembangan pribadi seseorang. <br>

                        <h5 class="text-sub-point text-uppercase">Peningkatan Kemampuan Pemecahan Masalah</h5>
                        <ul>
                            <li>
                                Numerasi melibatkan keterampilan pemecahan masalah matematika, yang pada gilirannya dapat
                                diterapkan dalam situasi kehidupan sehari-hari.
                            </li>
                            <li>
                                Kemampuan memecahkan masalah secara sistematis dan logis dapat meningkatkan kemampuan
                                pengambilan keputusan dan pemecahan masalah dalam berbagai konteks.
                            </li>
                        </ul>
                        <h5 class="text-sub-point text-uppercase">Peningkatan Keterampilan Berfikir Kritis </h5>
                        <ul>
                            <li>
                                Proses berpikir ini dapat membantu pengembangan diri dalam hal kemampuan berfikir kritis,
                                yakni kemampuan mengevaluasi informasi, mengambil keputusan tepat, dan menyusun argumen
                                secara
                                rasional.
                            </li>
                        </ul>

                        <h5 class="text-sub-point text-uppercase">Pengembangan Ketelitian dan Keteraturan </h5>
                        <ul>
                            <li>
                                Numerasi memerlukan ketelitian dalam perhitungan dan pengelolaan data.
                            </li>
                            <li>
                                Dengan mempraktikkan numerasi, seseorang dapat mengembangkan keterampilan ketelitian dan
                                keteraturan, yang berguna dalam tugas-tugas sehari-hari dan pekerjaan.
                            </li>
                        </ul>

                        <h5 class="text-sub-point text-uppercase">Pengenalan Pola dan Hubungan </h5>
                        <ul>
                            <li>
                                Pemahaman terhadap pola dapat membantu dalam pengenalan pola-pola kehidupan, memahami
                                hubungan sebab-akibat, dan meramalkan konsekuensi tindakan.
                            </li>
                        </ul>

                        <h5 class="text-sub-point text-uppercase">Meningkatkan Rasa Percaya Diri</h5>
                        <ul>
                            <li>
                                Kemampuan menguasai konsep numerasi memberikan rasa percaya diri terhadap kemampuan
                                matematika
                                seseorang.
                            </li>
                            <li>
                                Peningkatan rasa percaya diri dapat membawa dampak positif pada pengembangan diri secara
                                keseluruhan.
                            </li>
                        </ul>
                        Dengan memahami dan menerapkan numerasi dalam kehidupan sehari-hari, seseorang dapat merasakan
                        dampak positif pada pengembangan diri melalui peningkatan keterampilan mental, pemecahan
                        masalah, dan ketelitian.
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

<style>
    .text-mark-blue {
        background-color: rgb(140, 203, 255);
        /* color: #fff; */
        padding: 0 2px;
    }

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
        height: 300px;
        width: 500px;
        background-size: cover;
        overflow: hidden;
    }

    .cr-item-text {
        padding: 0;
        margin: 0;
    }
</style>
