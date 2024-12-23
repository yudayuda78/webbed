@extends('home.home-layouts.home-main')
@include('home.home-layouts.home-navbar')
@section('container')

    <form class="row g-3 mt-1" action="/presensi/tambahdata" method="POST">
        @csrf
        {{-- <h3 class="form-header">{{ $presensi->judul }}</h3> --}}

        {{-- cek error --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h5 class="form-header"><b>{{ $presensi->judul }}</b></h5>
        <div class="col-12">
            <label for="nama" class="form-label">Nama Lengkap dan Gelar</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Contoh: Arga Dian, S.Pd"
                required>
        </div>
        <div class="col-md-6">
            <label for="instansi" class="form-label">Instansi</label>
            <input type="text" class="form-control" id="instansi" name="instansi"
                placeholder="Contoh: SD N 01 Sambirejo" required>
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="argadian@gmail.com"
                required>
        </div>
        <div class="col-md-6">
            <label for="whatsapp" class="form-label">WhatsApp (Diawali Dengan 0)</label>
            <input type="text" class="form-control" id="whatsapp" name="whatsapp" placeholder="085289764523" required>
        </div>
        <div class="col-md-6">
            <label for="provinsi" class="form-label">Provinsi Asal</label>
            <input type="text" class="form-control" id="provinsi" name="provinsi" placeholder="Contoh: Jawa Tengah"
                required>
        </div>
        <div class="col-md-6">
            <label for="kota" class="form-label">Kota/Kabupaten</label>
            <input type="text" class="form-control" id="kota" name="kota" placeholder="Contoh: Kota Semarang"
                required>
        </div>

        <div class="col-12">
            <button type="submit" class="join-event-btn btn btn-primary"> Kirim </button>
        </div>
    </form>

    @include('home.home-layouts.home-faq')

    {{-- @include('tombolwa') --}}
    @include('home.home-layouts.home-footer')
@endsection
