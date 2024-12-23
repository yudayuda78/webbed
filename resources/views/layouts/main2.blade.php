<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ticy Kit | {{ $title }}</title>
    <link rel="icon" type="x-icon" href="{{ asset('asset/logo.webp') }}">

    <link href="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css') }}" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    {{-- <link href="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css') }}" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"> --}}
    {{-- <script src="{{ url('https://code.jquery.com/jquery-3.7.1.min.js') }}"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ url('//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js') }}"></script> --}}
    <link rel="stylesheet" href="{{ asset('css/style2.css?v=8.1.24a') }}">
    {{-- <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="{{ url('//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css') }}" />
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="{{ url('//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css') }}" /> --}}

    <link rel="preconnect" href="{{ url('https://fonts.googleapis.com') }}">
    <link rel="preconnect" href="{{ url('https://fonts.gstatic.com') }}" crossorigin>
    <link href="{{ url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700;900&display=swap') }}"
        rel="stylesheet">

    <!-- Link icon -->
    <link rel="stylesheet" href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css') }}"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ url('https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css') }}" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&family=Sora&display=swap" rel="stylesheet">
    {{-- <link href="{{ url('https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ url('//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css') }}">
    <script src="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js') }}"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</head>

<body>

    @yield('container')

    {{-- <script src="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js') }}"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script> --}}

</body>

</html>
