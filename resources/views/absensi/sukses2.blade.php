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
                    <h5 class="mt-2"><b>{{ $dataDariShow->judul }} ✨</b></h5>
                    <h5 class="mt-2"><b>Data berhasil disimpan ✨</b></h5>
                    <p>
                        Untuk informasi lebih lanjut terkait Fasilitas dan Sertifikat kegiatan, silahkan bergabung ke Channel Telegram
                        <br>
                        

                        Channel Telegram Webinar Series PowerPoint

                        <br>
                        <a href="https://t.me/Webpptbedsc">https://t.me/Webpptbedsc </a><br><br>

                        <!-- Tampilkan pesan sukses -->
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <!-- Tambahkan elemen atau tautan ke halaman lain jika diperlukan -->
                        <a href="/">Kembali ke Beranda</a>
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
