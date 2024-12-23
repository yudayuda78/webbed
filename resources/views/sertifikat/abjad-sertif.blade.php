@extends('home.home-layouts.home-main')
@section('container')
    @include('home.home-layouts.home-popup')
    @include('home.home-layouts.home-navbar')
    <div class="title-event-container">
        <div class="title-event-wrapper">
            <p>Sertifikat</p>
            <p>Kegiatan Diklat 32 JP 1-4 November 2023</p>
        </div>
    </div>
    <div class="abjad-sertif-container">
        <div class="abjad-dertif-wrapper">
            <a href="/event/sertif/abc">
                <p class="abjad-sertif">ABC</p>
            </a>
            <a href="/event/sertif/abc">
                <p class="abjad-sertif">DEF</p>
            </a>
            <a href="/event/sertif/abc">
                <p class="abjad-sertif">GHI</p>
            </a>
            <a href="/event/sertif/abc">
                <p class="abjad-sertif">JKL</p>
            </a>
            <a href="/event/sertif/abc">
                <p class="abjad-sertif">MNO</p>
            </a>
            <a href="/event/sertif/abc">
                <p class="abjad-sertif">PQR</p>
            </a>
            <a href="/event/sertif/abc">
                <p class="abjad-sertif">STU</p>
            </a>
            <a href="/event/sertif/abc">
                <p class="abjad-sertif">VWX</p>
            </a>
            <a href="/event/sertif/abc">
                <p class="abjad-sertif">YZ</p>
            </a>
        </div>
    </div>

    @include('home.home-layouts.home-footer')
@endsection
