@extends('home.home-layouts.home-main')
@section('container')
    <div class="accordion">
        <div class="accordion-item" onclick="toggleVideo('video1')">
            Video 1
        </div>
        <div class="accordion-content" id="video1">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/saHgl59asYE" frameborder="0"
                allowfullscreen></iframe>
        </div>

        <div class="accordion-item" onclick="toggleVideo('video2')">
            Video 2
        </div>
        <div class="accordion-content" id="video2">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/LnWBlvnTg8g" frameborder="0"
                allowfullscreen></iframe>
        </div>

    </div>
    @include('home.home-layouts.home-navbar')
    @include('home.home-layouts.home-kerjasama')
    @include('home.home-layouts.home-footer')
@endsection
