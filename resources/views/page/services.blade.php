@extends('layout.layout')
@section('header_services')
    <header class="intro-header" style="background-image: url('img/ourservice-bg.png')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <img class="img-responsive-header" src="img/logoukdw.png">
                        <h1>PUSAT PENGEMBANGAN PRIBADI</h1>
                        <p class="italic">People's development center</p>
                        <hr class="small">
                        <span class="subheading">Universitas Kristen Duta Wacana</span>
                    </div>
                </div>
            </div>
        </div>
        <div id="moto">
                <p class="moto">- Anda dilayani supaya anda dapat melayani. -</p>
        </div>
    </header>
@stop

@section('selected-services')
active
@endsection

@section('selected-services')
active
@endsection

@section('content')

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <h1 class="post-title text-center">Psikotes</h2><br>
                <hr class="star-light"><br>
                <h3>Konseling Internal UKDW</h3>
                    <li>Mahasiswa</li>
                    <li>Karyawan</li>
                <h3>Konseling Eksternal UKDW</h3>
                    <li>Siswa- siswi SD, SMP, SMA</li>
                    <li>Karyawan non-civitas UKDW</li>
                    <li>Umum (Sekolah, Gereja, dsb)</li>
                <br>
                <h1 class="post-title text-center"> Konseling</h2><br>
                <hr class="star-light"><br>
                    <li>Layanan konseling bagi siswa dan mahasiswa untuk bimbingan studi dan karier.</li>
                    <li>Konseling anak dan keluarga untuk mendampingi keluarga mengatasi masalah-masalah yang ada di dalamnya.</li>
                    <li>Konseling via internet juga tersedia bagi mereka yang mengalami kesulitan dan mengalamai kesulitan datang langsung ke PPP.</li>
                    <br><br>
                <h1 class="post-title text-center">Kenapa Memilih PPP UKDW?</h2><br>
                <hr class="star-light"><br>
            </div>

             <div class="text-center">
                    <div class="col-lg-4 col-lg-offset-1a form-group">
                        <img class="portfolio-item" src="img/prefesional1.png" alt="">
                        <p>Pelayanan yang Profesional</p>
                    </div>
                    <div class="col-lg-4 col-lg-offset-1a form-group">
                        <img class="portfolio-item" src="img/fast.png" alt="">
                        <p>Hasil test yang cepat dan berkualitas</p>
                    </div>
                    <div class="col-lg-4 col-lg-offset-1a form-group">
                        <img class="portfolio-item" src="img/partnership.png" alt="">
                        <p>Menjadikan konsumen sebagai mitra</p>
                    </div>

                    <div class="col-lg-4 col-lg-offset-1">
                        <img class="portfolio-item" src="img/paper.png" alt="">
                        <p>Menyediakan layanan pasca-test</p>
                    </div>

                    <div class="col-lg-4 col-lg-offset-1">
                        <img class="portfolio-item" src="img/jaringan.png" alt="">
                        <p>Memiliki jaringan dan relasi yang luas</p>
                    </div>
             </div>
        </div>
    </div>
@stop