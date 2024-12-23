@extends('home.home-layouts.home-main')
@include('home.home-layouts.home-navbar')
@section('container')
    {{-- @include('layouts.navbar') --}}
    <div class="title-event-container">
        <div class="title-event-wrapper">
            <p>Pendaftaran</p>
            <p>{{ $pendaftarandiklat->judul }} </p>
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
                            <form action="{{ route('pendaftaran.lacak') }}" method="GET">
                                <input class="form-control" type="search" name="search"
                                    placeholder="Cari nama anda disini">
                                <button class="btn-sertif btn btn-primary">Search</button>
                            </form>
                        </div>
                        <thead>
                            <tr>
                                <th scope="col">No Pendaftaran</th>
                                <th scope="col">Nama</th>
                                <th style="width: 35%" scope="col">Instansi</th>
                            </tr>
                            @if ($search)
                        <tbody>
                            @foreach ($datas as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td class="tbld">{{ $data->nama }}</td>
                                    <td class="tbld">{{ $data->instansi }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        @endif
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
        </div>
    </div>

    {{-- @include('tombolwa') --}}
    @include('home.home-layouts.home-footer')
@endsection
