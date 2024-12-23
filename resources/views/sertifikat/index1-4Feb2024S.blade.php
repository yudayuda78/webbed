@extends('home.home-layouts.home-main')
@include('home.home-layouts.home-navbar')
@section('container')
    {{-- @include('layouts.navbar') --}}
    <div class="title-event-container">
        <div class="title-event-wrapper">
            <p>Sertifikat Revisi</p>
            <p>Diklat 32JP : Pengelolaan Kinerja Guru dan Kepala Sekolah pada Platfrom Merdeka Mengajar 1-4 Februari
                "Abjad S" </p>
        </div>
    </div>

    <div class="video-sertif-container">
        <div class="video-sertif-flex">
            <h1>Bingung Cara <b>Download Sertifikat?</b> Tonton Video Ini</h1>
            <div class="youtube-embed embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/RMSJcOzb_Co?si=sL3CKW_73jhg0K-v"
                    allowfullscreen></iframe>
            </div>
        </div>
    </div>
    <div class="sertif-peringatan">
        <p>
            Cari dengan mengetikan nama anda, apabila nama tidak ditemukan atau terjadi kesalahan pada pengetikan silahkan
            hubungi Admin.
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9697129609724227"
                crossorigin="anonymous"></script>
            <ins class="adsbygoogle" style="display:block; text-align:center;" data-ad-layout="in-article"
                data-ad-format="fluid" data-ad-client="ca-pub-9697129609724227" data-ad-slot="1581340639">
            </ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </p>
    </div>

    <div class="tomboldarurat">
        <div class="tomboldarurat1">
            <a href="{{ route('eventsertif1-4febab') }}" class="join-event-btn btn btn-primary" target="_self">Abjad
                A-B</a>
            <a href="{{ route('eventsertif1-4febcd') }}" class="join-event-btn btn btn-primary" target="_self">Abjad
                C-D</a>
            <a href="{{ route('eventsertif1-4febef') }}" class="join-event-btn btn btn-primary" target="_self">Abjad
                E-F</a>
            <a href="{{ route('eventsertif1-4febgi') }}" class="join-event-btn btn btn-primary" target="_self">Abjad
                G-I</a>
            <a href="{{ route('eventsertif1-4febjl') }}" class="join-event-btn btn btn-primary" target="_self">Abjad
                J-L</a>
            <a href="{{ route('eventsertif1-4febm') }}" class="join-event-btn btn btn-primary" target="_self">Abjad
                M</a>
            <a href="{{ route('eventsertif1-4febn') }}" class="join-event-btn btn btn-primary" target="_self">Abjad
                N</a>
            <a href="{{ route('eventsertif1-4febor') }}" class="join-event-btn btn btn-primary" target="_self">Abjad
                O-R</a>
            <a href="{{ route('eventsertif1-4febs') }}" class="join-event-btn btn btn-primary" target="_self">Abjad
                S</a>
            <a href="{{ route('eventsertif1-4febtz') }}" class="join-event-btn btn btn-primary" target="_self">Abjad
                T-Z</a>
        </div>
    </div>

    <div class="sertif-container">

        <div class="sertif-main">
            <div style="overflow-x:auto;">
                <div class="tablewrapper">
                    <table id="myTable" class="table-striped table">
                        <div class="search-bar">
                            <form action="{{ route('search1-4febs') }}" method="GET">
                                <input class="form-control" type="search" name="search"
                                    placeholder="Cari nama anda disini">
                                <button class="btn-sertif btn btn-primary">Search</button>
                            </form>
                        </div>
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th style="width: 35%" scope="col">Instansi</th>
                                <th scope="col">Fasilitas</th>
                                <th scope="col">Sertifikat</th>
                            </tr>
                        <tbody>
                            @foreach ($datas as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td class="tbld">{{ $data->nama }}</td>
                                    <td class="tbld">{{ $data->instansi }}</td>
                                    <td class="tbld"><button class="btn-fasilitas btn btn-warning"><a
                                                href="{{ url('https://drive.google.com/drive/folders/1szOFgLCtTe0j9ApXdej6vjhLHAPhXm8s?usp=sharing') }}"
                                                target="blank">Fasilitas</a></button></td>
                                    <td class="tbld"><button class="btn-sertif btn btn-warning"><a
                                                href="{{ route('sertif.download1febs', ['id' => $data->id]) }}">Sertifikat</a></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        </thead>
                    </table>
                    <div class="pagi-sertif pagination">
                        {{ $datas->withQueryString()->links() }}
                    </div>
                </div>
            </div>
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
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9697129609724227"
                crossorigin="anonymous"></script>
            <!-- vertical -->
            <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-9697129609724227"
                data-ad-slot="7790977021" data-ad-format="auto" data-full-width-responsive="true"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
    </div>
    <p class="event-lainnya">Event Lainnya</p>
    <div class="event-grid">
        @foreach ($rekomendasi as $isi)
            <div class="list-event-card card">
                <a href="/event/{{ $isi->slug }}"><img src="/img/{{ $isi->image }}" class="card-img-top"></a>
                <div class="card-body">
                    <p class="card-text mb-2">
                        Oleh <b>{{ $isi->oleh }}</b></p>
                    <a href="/event/{{ $isi->slug }}">
                        <h5 class="judul-event card-title mb-2">{{ $isi->judul }}</h5>
                    </a>
                    <p class="card-text mb-2">{{ $isi->tanggalpelaksanaan }}</p>
                    <a href="#"
                        class="{{ $isi->statuspelaksanaan == 'Dibuka' ? 'bg-success' : 'bg-danger' }} join-event-btn btn btn-primary">{{ $isi->statuspelaksanaan }}</a>
                </div>
            </div>
        @endforeach
    </div>

    {{-- @include('tombolwa') --}}
    @include('home.home-layouts.home-footer')
@endsection
