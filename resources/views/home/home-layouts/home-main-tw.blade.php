<!doctype html>
<html class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css?v=11.11.24a') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.1.0/remixicon.css"
        integrity="sha512-dUOcWaHA4sUKJgO7lxAQ0ugZiWjiDraYNeNJeRKGOIpEq4vroj1DpKcS3jP0K4Js4v6bXk31AAxAxaYt3Oi9xw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @if (str_contains(request()->path(), 'ticykit'))
        <title>TicyKit</title>
        <link rel="icon" type="x-icon" href="/img/ui/favicon-ticykit.png">
    @else
        <title>Belajar Era Digital</title>
        <link rel="icon" type="x-icon" href="/img/ui/favicon-bed.png">
    @endif
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9697129609724227"
        crossorigin="anonymous"></script>

</head>

<body class="custom-scrollbar">
    @yield('container')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
