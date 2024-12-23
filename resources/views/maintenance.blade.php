@extends('layouts.main2')
@section('container')
    @include('layouts.navbar')
    <div class="container">
        <div class="maintenance-page-wrapper">
            <div class="maintenance-page">
                <h1><span class="span-maintenance"></span></h1>

            </div>
            <button type="button" class="maintenance-button btn btn-danger rounded-pill"><a href="/"
                    class="text-light text-center">Back</a></button>
        </div>

    </div>
    @include('tombolwa')
    @include('layouts.footer')

    <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        var typed = new Typed(".span-maintenance", {
            strings: ["Maaf, Laman Sedang Dalam Perbaikan!"],
            typeSpeed: 50,
            backSpeed: 50,
            loop: true
        });
    </script>
@endsection
