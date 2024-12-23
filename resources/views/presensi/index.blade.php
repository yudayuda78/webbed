@extends('home.home-layouts.home-main')
@section('container')
    @include('home.home-layouts.home-navbar')
    @foreach ($artikel as $art)
        <p>{{ $art->link }}</p>
    @endforeach

    <form action="">
        <h1>sdfsdf</h1>
        <label for="nama">Nama</label>
        <input type="hidden" name="judul" value="">
        <input type="text" id="nama" name="nama">
        <label for="nomor">Nomor Telepon</label>
        <input type="tel" id="nomor" name="nomor">
        <label for="email">Email</label>
        <input type="email" id="email" name="email">
        <button type="submit">Kirim</button>
    </form>

    </div>

    @include('home.home-layouts.home-footer')
@endsection
