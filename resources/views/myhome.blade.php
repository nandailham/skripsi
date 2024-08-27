@extends('frontend.main')

@section('content')
    <div class="container-fluid header bg-danger p-0 mb-5">
        <div class="row g-0 align-items-center flex-column-reverse flex-lg-row">
            <div class="col-lg-6 p-5 wow fadeIn" data-wow-delay="0.1s">
                <h1 class="display-4 text-white mb-5">SD N 43 Pagar Alam</h1>
                <p class="text-white">Bersama SDN 43 Pagar Alam, Kita Raih Masa Depan Cerah dengan Pendidikan Berkualitas dan
                    Nilai-Nilai Kehidupan yang Luhur</p>

            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="owl-carousel header-carousel">
                    <div class="owl-carousel-item position-relative">
                        <img class="img-fluid" src="{{ asset('/img/head.jpeg') }}" alt="">
                        <div class="owl-carousel-text">
                            {{-- <h1 class="display-1 text-white mb-0">Cardiology</h1> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- About Start -->
    <section id="tentang-kami">
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-flex flex-column">
                        <img class="img-fluid rounded w-75 align-self-end" src="{{ 'img/about2.jpeg' }}" alt="">
                        <img class="img-fluid rounded w-50 bg-white pt-3 pe-3" src="{{ 'img/about1.jpeg' }}" alt=""
                            style="margin-top: -25%;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <p class="d-inline-block border rounded-pill py-1 px-4">Tentang Kami</p>
                    <h1 class="mb-4">SDN N 43 Pagar Alam</h1>

                    <p>
                        SDN 43 Pagar Alam adalah sebuah sekolah dasar yang berdiri pada 30 Juni 1986, berlokasi di Kel.
                        Gunung Dempo, Kec. Pagar Alam Sel, Kota Pagar Alam, Sumatera Selatan, yang berdedikasi untuk
                        memberikan pendidikan dasar berkualitas bagi anak-anak. Dengan lingkungan yang ramah dan mendukung,
                        kami berkomitmen untuk membentuk generasi muda yang berkarakter, cerdas, dan berakhlak mulia.
                    </p>
                    <h5>VISI</h5>
                    <p>
                        "Menjadi sekolah yang unggul dalam prestasi akademik dan non-akademik, serta membentuk peserta didik
                        yang beriman, bertakwa, berakhlak mulia, dan berwawasan lingkungan."
                    </p>
                    <h5>MISI</h5>
                    <ol>
                        <li>Menyediakan Pendidikan Berkualitas: Menyediakan program pendidikan yang berkualitas tinggi yang memadukan kurikulum nasional dengan pendekatan holistik, yang bertujuan untuk mengembangkan potensi akademik dan non-akademik siswa.</li>
                        <li>Pengembangan Karakter: Membangun karakter siswa yang berbudi pekerti luhur, mandiri, dan bertanggung jawab, melalui pembelajaran yang menyenangkan dan bermakna.</li>
                        <li>Peduli Lingkungan: Mendorong kesadaran akan pentingnya menjaga lingkungan melalui berbagai program pendidikan lingkungan.</li>
                        <li>Partisipasi Orang Tua dan Komunitas: Menjalin kemitraan yang erat dengan orang tua dan komunitas untuk mendukung perkembangan dan kesejahteraan siswa.</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    </section>
    </div>
    <!-- About End -->
@endsection

<!-- Header Start -->
