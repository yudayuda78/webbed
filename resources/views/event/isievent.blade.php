@php
    $judul = $event->judul;
    $judul_terbaru = explode('(', $judul)[0];

    $parts = explode(':', $judul_terbaru)[0];
    $partspagar = explode('#', $judul_terbaru)[0];

    if (strpos($judul_terbaru, ':') !== false) {
        $judul_sebelum_titik_dua = $parts;
    } elseif (strpos($judul_terbaru, '#') !== false) {
        $judul_sebelum_titik_dua = $partspagar;
    } else {
        $judul_sebelum_titik_dua = $judul_terbaru;
    }
@endphp

@extends('home.home-layouts.home-main-tw')
@section('container')
    <div class="bg-[url(/img/ui/bg-short.png)] pb-8 md:pb-10">
        @include('home.home-layouts.tw-home-navbar')
    </div>
    <div class="bg-ticykit-bg-blue">
        <div class="mx-auto max-w-[90%] py-8 md:max-w-main">
            <h1 class="text-xl font-bold text-white md:text-xl">{{ $judul_terbaru }}</h1>
        </div>
    </div>
    <div id="detailevent"
        class="mx-auto flex max-w-[90%] flex-col-reverse justify-between pb-8 pt-5 md:max-w-main md:flex-row">
        <div class="w-full max-w-[725px]">
            <div class="flex flex-col gap-5">
                <div class="hidden flex-wrap justify-center gap-3 md:flex md:flex-row md:justify-start">
                    <div
                        class="flex items-center justify-center gap-2 rounded-full bg-ticykit-bg-blue px-4 py-0.5 text-xs text-white md:text-base">
                        <i class="ri-calendar-todo-line text-lg"></i>
                        <p class="text-[15px]">{{ $judul_sebelum_titik_dua }}</p>
                    </div>
                    <div
                        class="flex items-center justify-center gap-2 rounded-full border border-ticykit-bg-blue px-4 py-0.5 text-xs md:text-black">
                        <i class="ri-movie-line text-lg text-ticykit-bg-blue"></i>
                        <p class="text-[15px]">Zoom & YouTube</p>
                    </div>
                    <div
                        class="flex items-center justify-center gap-2 rounded-full border border-ticykit-bg-blue px-4 py-0.5 text-xs md:text-black">
                        <i class="ri-file-paper-2-line text-lg text-ticykit-bg-blue"></i>
                        <p class="text-[15px]">Free Sertifikat</p>
                    </div>
                </div>

                <img class="rounded-xl" src="/pendaftaran/{{ $event->image }}">
                <div>
                    <h2 class="mb-2.5 text-xl font-semibold md:text-2xl">Detail Event</h2>
                    <p class="text-lg text-ticykit-secondary">Diklat Nasional Gratis ini merupakan kesempatan berharga bagi
                        para pendidik untuk meningkatkan kemampuan dalam memanfaatkan teknologi pembelajaran sesuai dengan
                        Kurikulum
                        Merdeka. Program ini tidak hanya memberikan pengetahuan baru, tetapi juga menawarkan sertifikat
                        dengan
                        akreditasi 32JP/8 poin PMM, yang sangat berguna untuk pengembangan profesional.</p>
                </div>
                <x-faq.tw-home-faq-new text='FAQ'/>
            </div>
        </div>
        <div class="top-20 mb-7 mt-0 flex w-full self-start md:sticky md:mb-0 md:mt-[54px] md:w-[410px]">
            <div id="sidebar"
                class="w-full rounded-2xl border border-gray-200 bg-white p-6 text-ticykit-secondary md:p-8">
                <h2 class="text-xl font-semibold text-black">Detail Event</h2>
                <ul class="my-4 flex flex-col gap-1 text-base text-ticykit-secondary md:text-lg">
                    <li>
                        <i class="ri-calendar-schedule-line mr-3 text-xl text-ticykit-bg-blue"></i><span
                            class="text-ticykit-secondary">{{ $event->tanggalpelaksanaan }}</span>
                    </li>
                    <li>
                        <i class="ri-time-line mr-3 text-xl text-ticykit-bg-blue"></i><span
                            class="text-ticykit-secondary">Pukul {{ $event->jampelaksanaan }}</span>
                    </li>
                    <li>
                        @if ($event->statuspelaksanaan == 1)
                            <i class="ri-video-chat-line mr-3 text-lg text-ticykit-bg-blue"></i><span
                                class="text-ticykit-secondary">Status:</span><span class="font-bold text-ticykit-bg-blue">
                                Dibuka</span></i>
                        @else
                            <i class="ri-video-chat-line mr-3 text-lg text-ticykit-bg-blue"></i><span
                                class="text-ticykit-secondary">Status:</span><span class="font-bold text-red-600">
                                Ditutup</span></i>
                        @endif
                    </li>
                </ul>
                @if ($event->statuspelaksanaan == 1)
                    <div class="flex w-full flex-col gap-1 rounded-lg border border-gray-200 bg-[#F9FAFB] px-3 py-2">
                        <h2 class="font-bold text-green-600">Event Masih Dibuka!</h2>
                        <p class="text-sm text-gray-600">Untuk mengikuti kegiatan ini silahkan lakukan
                            pendaftaran melalui tombol dibawah ini!</p>
                    </div>
                @else
                    <div class="flex w-full flex-col gap-1 rounded-lg border border-gray-200 bg-[#F9FAFB] px-3 py-2">
                        <h2 class="font-bold text-red-600">Event Sudah Ditutup!</h2>
                        <p class="text-sm text-gray-600">Mohon Maaf Silakan Untuk mengikuti kegiatan
                            Lainnya</p>
                    </div>
                @endif
                <div class="mb-2 mt-5 grid grid-cols-1 gap-2 text-center font-bold text-ticykit-bg-blue md:grid-cols-2">
                    <a href="{{ $event->link_sertif }}"
                        class="rounded-lg border border-ticykit-bg-blue py-3 text-[15px] hover:bg-ticykit-bg-blue hover:text-white">
                        Sertif & Fasilitas
                    </a>
                    <a target="__blank" href="{{ $event->linktree }}"
                        class="rounded-lg border border-ticykit-bg-blue py-3 text-[15px] hover:bg-ticykit-bg-blue hover:text-white">
                        <button>Grup Kegiatan</button>
                    </a>
                </div>
                @if ($event->statuspelaksanaan == 1)
                    <a href="{{ url($event->link) }}"
                        class="flex items-center justify-center rounded-lg border border-green-600 bg-green-500 py-3 text-[15px] font-bold text-white hover:bg-green-600 focus:ring-4 focus:ring-green-300">
                        <i class="ri-flashlight-fill me-1 font-normal"></i>Daftar Sekarang
                    </a>
                @else
                    <div
                        class="flex cursor-not-allowed items-center justify-center rounded-lg border border-red-600 bg-red-500 py-3 text-[15px] font-bold text-white hover:bg-red-600 focus:ring-4 focus:ring-green-300">
                        <i class="ri-close-circle-line me-1 font-normal"></i>Pendaftaran Ditutup
                    </div>
                @endif
            </div>
        </div>
    </div>
    @include('home.home-layouts.tw-home-footer')

    <div id="marketing-banner" tabindex="-1"
        class="fixed bottom-6 left-1/2 z-50 flex w-[calc(100%-2rem)] -translate-x-1/2 flex-col justify-between rounded-lg border border-[#0156B2] bg-ticykit-bg-blue px-4 py-5 shadow-sm md:max-w-main md:flex-row md:py-2">
        <div class="mb-3 me-4 flex flex-col items-start md:mb-0 md:flex-row md:items-center">
            <p class="flex items-center text-sm font-normal text-white">{{ $event->judul }}</p>
        </div>
        <div class="flex flex-shrink-0 items-center">
            @if ($event->statuspelaksanaan == 1)
                <a href="{{ url($event->link) }}"
                    class="me-2 rounded-lg bg-[#0156B2] px-3 py-2.5 text-xs font-medium text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300"><i
                        class="ri-flashlight-fill mr-1"></i>Daftar Sekarang</a>
            @else
                <div
                    class="me-2 cursor-not-allowed rounded-lg bg-[#0156B2] px-3 py-2.5 text-xs font-medium text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                    <i class="ri-close-circle-line mr-1"></i>Pendaftaran Ditutup
                </div>
            @endif
            <button data-dismiss-target="#marketing-banner" type="button"
                class="inline-flex h-7 w-7 flex-shrink-0 items-center justify-center rounded-lg p-1.5 text-sm text-white hover:bg-[#0156B2] hover:text-gray-900">
                <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close banner</span>
            </button>
        </div>
    </div>
@endsection

<script>
    function scrollToElement(id) {
        var element = document.getElementById(id);
        if (element) {
            element.scrollIntoView({
                behavior: 'smooth'
            });
        }
    }
</script>
