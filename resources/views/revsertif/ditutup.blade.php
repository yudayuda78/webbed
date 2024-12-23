@extends('home.home-layouts.home-main')
@include('home.home-layouts.home-navbar')
@section('container')
    {{-- @include('layouts.navbar') --}}
    {{-- <div class="title-event-container">
        <div class="title-event-wrapper">
          <p>Daftar Hadir & Posttest</p>
          <p>[Hari ke-1] Daftar Hadir & Posttest Diklat Nasional 32P : Strategi Penerapan Asesmen dalam Kurikulum Merdeka</p>
        </div>
      </div> --}}

    <div class="video-sertif-container" style="padding-top: 70px">
        <div class="video-sertif-flex">
            {{-- <img src="{{ asset('header/' . $presensi->header->image) }}" class="img-fluid" alt="..."> --}}
        </div>
    </div>

    <div class="absensi-container">
        <div class="absensi2-left sertif-main">
            <div class="absensi-opener-container card mt-1">
                <div class="absensi-opener card-body">
                    <h5 class="mt-2"><b>Revisi DITUTUP ✨</b></h5>
                    <p>
                        <b>PENTING!!!</b><br>
                        
                        Silakan masuk grup agar anda dapat mengikuti
                        informasi kegiatan, pembagian fasilitas dan sertifikat:<br>
                        Grup Diskusi Kegiatan<br>
                        👇👇👇<br>
                        <a href="https://linktr.ee/eventbed2024">https://linktr.ee/eventbed2024</a><br><br>

                        Komunitas PMM Belajar Era Digital<br>
                        <a href="https://bit.ly/KomunitasPMMBED">https://bit.ly/KomunitasPMMBED</a><br><br>

                        Silahkan kunjungi media sosial kami:<br>
                        Telegram : <a href="https://t.me/eventBED">https://t.me/eventBED</a> <br>
                        Instagram : <a
                            href="https://instagram.com/belajarera.digital">https://instagram.com/belajarera.digital</a><br>
                        Youtube : <a
                            href="https://www.youtube.com/@BelajarEraDigital">https://www.youtube.com/@BelajarEraDigital</a><br>
                        Layanan admin : <a href="https://linktr.ee/adminbed">https://linktr.ee/adminbed</a><br>
                        Website : <a href="https://belajareradigital.com/">https://belajareradigital.com/</a> <br>
                        <br>
                        

                        
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        
                    </p>
                </div>
            </div>
            <p></p>

        </div>

        <div class="sertif-sidebar">
            <h5><b>Produk Kami</b></h5>
            <div class="card" style="width: 100%;">
                <img src="/img/bacakembalibanner2.jpg" class="img-fluid">
                <div class="card-body">
                    <p class="card-text">Sumber terbaik untuk memperoleh wawasan seputar dunia pendidikan!</p>
                    <a href="#" class="btn-sertif btn btn-primary">BacaKembali.com</a>
                </div>
            </div>
            <div class="card" style="width: 100%;">
                <img src="/img/ticykitbanner2.jpg" class="img-fluid">
                <div class="card-body">
                    <p class="card-text">Semua Resource yang anda butuhkan dalam pembelajaran ada di Disini!</p>
                    <a href="#" class="btn-sertif btn btn-primary">TicyKit</a>
                </div>
            </div>
        </div>
    </div>

    @include('home.home-layouts.home-faq')

    {{-- @include('tombolwa') --}}
    @include('home.home-layouts.home-footer')
@endsection

<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    var DataTable = require('datatables.net');
    require('datatables.net-responsive');

    let table = new DataTable('#myTable', {
        responsive: true
    });
    console.log(table);
</script>
