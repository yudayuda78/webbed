@extends('home.home-layouts.home-main')
@include('home.home-layouts.home-navbar')
@section('container')
    {{-- @include('layouts.navbar') --}}
    <div class="title-event-container">
        <div class="title-event-wrapper">
            <p>Revisi Sertifikat</p>
            <p>Diklat Nasional 32JP : Strategi Penyusunan Rapor P5 dalam Satuan Pendidikan Pelaksanaan 16-19 November 2023
            </p>
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

        </p>
    </div>
    <div class="sertif-container">
        <div class="sertif-main">
            <div style="overflow-x:auto;">
                <div class="tablewrapper">
                    <table id="myTable" class="table-striped table">
                        <div class="search-bar">
                            <form action="{{ route('search16-19novrev') }}" method="GET">
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
                                                href="{{ url('https://s.id/FasilNov2') }}"
                                                target="blank">Download</a></button></td>
                                    <td class="tbld"><button class="btn-sertif btn btn-warning"><a
                                                href="{{ route('sertif.download16-19rev', ['id' => $data->id]) }}">Download</a></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        </thead>
                    </table>
                    <div class="pagi-sertif pagination">
                        {{ $datas->links() }}
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
        </div>
    </div>
    <p class="event-lainnya">Event Lainnya</p>
    <div class="event-grid">
        @foreach ($event->reverse() as $isiEvent)
            <div class="card-event">
                <a href="/event/{{ $isiEvent->slug }}"><img src="/img/{{ $isiEvent->image }}" alt="Denim Jeans"
                        style="width:100%"></a>
                <div class="text-event-wrapper">
                    <p class="tags-event">Career Expo</p>
                    <a href="/event/{{ $isiEvent->slug }}" class="judul-event">{{ $isiEvent->judul }}</a>
                    <p class="tangal-event">{{ $isiEvent->tanggalpelaksanaan }} <b>{{ $isiEvent->statuspelaksanaan }}</b>
                    </p>
                </div>
            </div>
        @endforeach
    </div>

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
