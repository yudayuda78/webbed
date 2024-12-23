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
            <img src="/img/form1.jpg" class="img-fluid" alt="...">
        </div>
    </div>
    <div class="absensi-container">
        {{-- <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSewqsf8xai3KUaP2tcl0KLgMb3MkcwuIL0ur-3SByEOrRh6Hg/viewform?embedded=true" width="100%" height="1500px" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe> --}}
        <div class="absensi-left sertif-main">
            <iframe
                src="https://docs.google.com/forms/d/e/1FAIpQLSewqsf8xai3KUaP2tcl0KLgMb3MkcwuIL0ur-3SByEOrRh6Hg/viewform?embedded=true"
                width="100%" height="1500px" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>
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

    <iframe src="https://bacakembali.com/2023/11/16/memahami-urgensi-proyek-penguatan-profil-pelajar-pancasila/"
        frameborder="0" width="500px"></iframe>

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
