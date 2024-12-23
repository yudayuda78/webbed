@extends('home.home-layouts.home-main')
@section('container')
    @include('home.home-layouts.home-navbar')
    <div class="about-header">
        <h2>Tentang Kami</h2>
        <h1>Profil Belajar Era Digital</h1>
        {{-- <div class="img-header">
        <img src="/img/about1.jpg" class="img-fluid">
        <img src="/img/about2.jpg" class="img-fluid">
        <img src="/img/about3.jpg" class="img-fluid">
    </div> --}}
    </div>
    <div class="img-header">
        <img src="/img/about1.jpg" class="img-fluid">
        <img src="/img/about2.jpg" class="img-fluid">
        <img src="/img/about3.jpg" class="img-fluid">
    </div>
    <div class="about-deskripsi">
        <h2>Profil Belajar Era Digital</h2>
        <p>Selamat datang di Belajar Era Digital, sebuah pionir di dunia pembuatan dan pengembangan Diklat (Pendidikan dan
            Pelatihan) yang berdedikasi untuk memberikan solusi pendidikan berkualitas tinggi. Sejak didirikan, kami telah
            mengukir jejak sebagai pemimpin industri yang menghadirkan program Diklat inovatif dan relevan, membantu
            individu dan organisasi mencapai potensi penuh mereka.<br>
            Bergabunglah dengan kami untuk pengalaman Diklat yang tidak hanya membangun pengetahuan, tetapi juga merangsang
            pertumbuhan profesional dan pribadi. Kami berkomitmen untuk membantu Anda mencapai tingkat keunggulan tertinggi
            dalam karir Anda.
        </p>
    </div>
    <div class="about-value-container">
        <div class="about-value">
            <div class="text-value">
                <h2>Value Yang Kami Pegang</h2>
                <p>Value atau keyakinan mendasar yang selalu kami pegang teguh dalam pelaksamaan semua kegiatan di Belajar
                    Era Digital</p>
            </div>
            <div class="value-flex">
                <div class="value-flex-item">
                    <i class="ri-inbox-2-fill"></i>
                    <h5>Make Education Accessible</h5>
                    <p>Quis cursus turpis in habitant sagittis amet dolor malesuada ut. Volutpat nunc id blanvolutpat nunc.
                    </p>
                </div>
                <div class="value-flex-item">
                    <i class="ri-inbox-2-fill"></i>
                    <h5>Make Education Accessible</h5>
                    <p>Quis cursus turpis in habitant sagittis amet dolor malesuada ut. Volutpat nunc id blanvolutpat nunc.
                    </p>
                </div>
                <div class="value-flex-item">
                    <i class="ri-inbox-2-fill"></i>
                    <h5>Make Education Accessible</h5>
                    <p>Quis cursus turpis in habitant sagittis amet dolor malesuada ut. Volutpat nunc id blanvolutpat nunc.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="about-pencapaian">
        <div class="about-pencapaian-opener">
            <h2>Pencapaian Kami</h2>
            <p>Selama perjalanan kami yang inspiratif, kami telah berhasil menorehkan sejumlah pencapaian berikut ini</p>
        </div>
        <div class="about-pencapaian-grid">
            <div class="about-pencapaian-item">
                <h3>400K+</h3>
                <p>Peserta Diklat</p>
            </div>
            <div class="about-pencapaian-item">
                <h3>40+</h3>
                <p>Event Diklat</p>
            </div>
            <div class="about-pencapaian-item">
                <h3>300+</h3>
                <p>Media Pembelajaran</p>
            </div>
            <div class="about-pencapaian-item">
                <h3>370K+</h3>
                <p>Youtube Subscriber</p>
            </div>
        </div>
        <div class="pencapaian-image">
            <img src="/img/foto1.jpg" class="img-fluid">
            <img src="/img/foto2.jpg" class="img-fluid">
        </div>
    </div>
    <div class="about-team">
        <h2>Team Kami</h2>
        <div class="about-team-grid">
            <div class="about-team-item">
                <img src="/img/foto-team.jpg" class="img-fluid">
                <h3>Yudha Setiawan</h3>
                <p>Backend Web Developer</p>
                <div class="about-team-icons">
                    <a href="#" target="_blank"><i class="ri-instagram-line"></i></a>
                    <a href="#" target="_blank"><i class="ri-twitter-line"></i></a>
                </div>
            </div>
            <div class="about-team-item">
                <img src="/img/foto-team.jpg" class="img-fluid">
                <h3>Yudha Setiawan</h3>
                <p>Backend Web Developer</p>
                <div class="about-team-icons">
                    <a href="#" target="_blank"><i class="ri-instagram-line"></i></a>
                    <a href="#" target="_blank"><i class="ri-twitter-line"></i></a>
                </div>
            </div>
            <div class="about-team-item">
                <img src="/img/foto-team.jpg" class="img-fluid">
                <h3>Yudha Setiawan</h3>
                <p>Backend Web Developer</p>
                <div class="about-team-icons">
                    <a href="#" target="_blank"><i class="ri-instagram-line"></i></a>
                    <a href="#" target="_blank"><i class="ri-twitter-line"></i></a>
                </div>
            </div>
            <div class="about-team-item">
                <img src="/img/foto-team.jpg" class="img-fluid">
                <h3>Yudha Setiawan</h3>
                <p>Backend Web Developer</p>
                <div class="about-team-icons">
                    <a href="#" target="_blank"><i class="ri-instagram-line"></i></a>
                    <a href="#" target="_blank"><i class="ri-twitter-line"></i></a>
                </div>
            </div>
            <div class="about-team-item">
                <img src="/img/foto-team.jpg" class="img-fluid">
                <h3>Yudha Setiawan</h3>
                <p>Backend Web Developer</p>
                <div class="about-team-icons">
                    <a href="#" target="_blank"><i class="ri-instagram-line"></i></a>
                    <a href="#" target="_blank"><i class="ri-twitter-line"></i></a>
                </div>
            </div>
            <div class="about-team-item">
                <img src="/img/foto-team.jpg" class="img-fluid">
                <h3>Yudha Setiawan</h3>
                <p>Backend Web Developer</p>
                <div class="about-team-icons">
                    <a href="#" target="_blank"><i class="ri-instagram-line"></i></a>
                    <a href="#" target="_blank"><i class="ri-twitter-line"></i></a>
                </div>
            </div>
            <div class="about-team-item">
                <img src="/img/foto-team.jpg" class="img-fluid">
                <h3>Yudha Setiawan</h3>
                <p>Backend Web Developer</p>
                <div class="about-team-icons">
                    <a href="#" target="_blank"><i class="ri-instagram-line"></i></a>
                    <a href="#" target="_blank"><i class="ri-twitter-line"></i></a>
                </div>
            </div>
            <div class="about-team-item">
                <img src="/img/foto-team.jpg" class="img-fluid">
                <h3>Yudha Setiawan</h3>
                <p>Backend Web Developer</p>
                <div class="about-team-icons">
                    <a href="#" target="_blank"><i class="ri-instagram-line"></i></a>
                    <a href="#" target="_blank"><i class="ri-twitter-line"></i></a>
                </div>
            </div>
        </div>
    </div>
    @include('home.home-layouts.home-footer')
