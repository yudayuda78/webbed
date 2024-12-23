@extends('home.home-layouts.home-main-tw')
@section('container')
    <div class="bg-ticykit-bg-blue md:bg-[url(https://tailwindui.com/img/beams-basic-transparent.png)]">
        @include('home.home-layouts.tw-home-navbar-ecourse')
        <div class="mx-auto flex max-w-[90%] flex-col justify-between gap-3 py-14 text-white md:max-w-main md:flex-row">
            <div class="max-w-full md:max-w-[420px]">
                <h2 class="text-4xl font-bold md:text-5xl">Live Event Diklat Nasional</h2>
            </div>
            <div class="max-w-[490px]">
                <p>
                    Upgrade softskill dan dapatkan sertifikat resmi dari tim BED dengan mengikuti berbagai
                    event diklat nasional di bawah ini!
                </p>
                <div class="mt-4">
                    <a href="#event"
                        class="me-1 rounded-full border border-yellow-400 bg-yellow-400 px-5 py-1.5 font-medium text-black hover:bg-yellow-500">Lanjut</a>
                    <a href="#faq"
                        class="me-1 rounded-full border border-white px-5 py-1.5 font-medium hover:bg-blue-500">FAQ</a>
                </div>
            </div>
        </div>
    </div>
    <div id="event" class="mx-auto max-w-[90%] scroll-mt-14 pt-3 md:max-w-main md:pt-4">
        <div class="border-b border-gray-200 text-center font-medium text-ticykit-secondary">
            <ul class="-mb-px flex flex-wrap">
                @if (!isset($search))
                    <li class="me-7">
                        <button
                            class="tab-link inline-block rounded-t-lg border-b-2 border-black border-transparent py-5 text-sm hover:border-gray-300 hover:text-gray-600 md:text-base"
                            aria-current="page" onclick="openTab(event, 'tab1')">Semua Event
                            ({{ $isiEventCount->count() }})</a>
                    </li>
                    <li class="me-7">
                        <button
                            class="tab-link inline-block rounded-t-lg border-b-2 border-black border-transparent py-5 text-sm hover:border-gray-300 hover:text-gray-600 md:text-base"
                            aria-current="page" onclick="openTab(event, 'tab2')">Dibuka ({{ $isiEventOpen->count() }})</a>
                    </li>
                @else
                    <li class="me-7">
                        <a href="/event"
                            class="inline-block rounded-t-lg border-b-2 border-black py-5 text-sm text-black hover:border-gray-300 hover:text-gray-600 md:text-base">Semua
                            Event ({{ $isiEventCount->count() }})</a>
                    </li>
                    <li class="me-7">
                        <a href="/event"
                            class="inline-block rounded-t-lg border-b-2 border-black border-transparent py-5 text-sm hover:border-gray-300 hover:text-gray-600 md:text-base">Dibuka
                            ({{ $isiEventOpen->count() }})</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
    <div class="mx-auto max-w-[90%] pt-4 md:max-w-main md:pt-6">
        <form action="{{ route('event.search') }}" role="search" method="GET">
            <label for="default-search" class="sr-only mb-2 text-sm font-medium text-gray-900">Search</label>
            <div class="relative">
                <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-5">
                    <svg class="h-4 w-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" id="default-search" name="search"
                    class="block w-full rounded-md bg-[#F0F0F0] p-4 ps-12 text-base text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                    placeholder="Cari nama kegiatan..." required />
                <button type="submit"
                    class="absolute bottom-2.5 end-2.5 rounded-md bg-ticykit-bg-blue px-4 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">Search</button>
            </div>
        </form>
        @if (isset($search))
            <div class="flex items-center rounded-lg border border-gray-300 bg-gray-50 p-4 text-sm text-gray-800"
                role="alert">
                <svg class="me-3 inline h-4 w-4 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    Hasil pencarian untuk <b>{{ $search }}</b>
                </div>
            </div>
        @endif
    </div>
    <div id="tab1" class="tab-content">
        <div
            class="mx-auto grid max-w-[90%] grid-cols-1 justify-between gap-5 pb-3 pt-4 md:max-w-main md:grid-cols-3 md:pt-5">
            @foreach ($isiEvent as $isi)
                <div class="flex max-w-[378px] flex-col justify-between rounded-2xl border p-3">
                    <div>
                        <a href="/event/{{ $isi->slug }}"
                            class="relative block aspect-square overflow-hidden rounded-[10px]">
                            <img class="h-full w-full rounded-[10px] object-cover object-top transition duration-300"
                                src="/pendaftaran/{{ $isi->image }}" alt="{{ $isi->judul }}">
                            <div
                                class="absolute inset-0 bg-ticykit-bg-blue opacity-0 transition duration-300 hover:opacity-50">
                            </div>
                        </a>
                        <p class="pb-1 pt-3 text-ticykit-secondary">{{ $isi->oleh }}</p>
                        <p class="mb-1 pb-1 text-sm text-ticykit-secondary"><i
                                class="ri-calendar-schedule-line rounded-sm border p-1 text-ticykit-bg-blue"></i>
                            {{ $isi->tanggalpelaksanaan }}</p>
                        <a href="/event/{{ $isi->slug }}">
                            @php
                                $judul_terbaru = $isi->judul;
                                $lastPos = strrpos($judul_terbaru, '(');

                                if ($lastPos !== false) {
                                    $judul_terbaru = substr($judul_terbaru, 0, $lastPos);
                                }
                            @endphp
                            <h1 class="pb-1 text-[17px] font-bold leading-snug">{{ trim($judul_terbaru) }}</h1>
                        </a>

                    </div>
                    @if ($isi->statuspelaksanaan == 1)
                        <div class="mt-1">
                            <a href="/event/{{ $isi->slug }}"
                                class="me-2 mt-1 flex justify-center rounded-lg bg-green-600 px-4 py-2 text-base font-medium text-white hover:bg-green-700">
                                <i class="ri-checkbox-circle-line me-1"></i>Pendaftaran Dibuka
                            </a>
                        </div>
                    @else
                        <div class="mt-1">
                            <a href="/event/{{ $isi->slug }}"
                                class="me-2 mt-1 flex justify-center rounded-lg bg-red-600 px-4 py-2 text-base font-medium text-white hover:bg-red-700">
                                <i class="ri-lock-line me-1"></i>Pendaftaran Ditutup
                            </a>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
        <div class="mx-auto max-w-[90%] md:max-w-main">
            {{ $isiEvent->links('vendor.pagination.tailwind') }}
        </div>
    </div>
    <div id="tab2" class="tab-content">
        <div
            class="mx-auto grid max-w-[90%] grid-cols-1 justify-between gap-5 pb-3 pt-4 md:max-w-main md:grid-cols-3 md:pt-5">
            @foreach ($isiEventOpen as $isi)
                <div class="flex max-w-[378px] flex-col justify-between rounded-2xl border p-3">
                    <div>
                        <a href="/event/{{ $isi->slug }}"
                            class="relative block aspect-square overflow-hidden rounded-[10px]">
                            <img class="h-full w-full rounded-[10px] object-cover object-top transition duration-300"
                                src="/pendaftaran/{{ $isi->image }}" alt="{{ $isi->judul }}">
                            <div
                                class="absolute inset-0 bg-ticykit-bg-blue opacity-0 transition duration-300 hover:opacity-50">
                            </div>
                        </a>
                        <p class="pb-1 pt-3 text-ticykit-secondary">{{ $isi->oleh }}</p>
                        <p class="mb-1 pb-1 text-sm text-ticykit-secondary"><i
                                class="ri-calendar-schedule-line rounded-sm border p-1 text-ticykit-bg-blue"></i>
                            {{ $isi->tanggalpelaksanaan }}</p>
                        <a href="/event/{{ $isi->slug }}">
                            @php
                                $judul_terbaru = explode('(', $isi->judul)[0];
                            @endphp
                            <h1 class="pb-1 text-[17px] font-bold leading-snug">{{ trim($judul_terbaru) }}</h1>
                        </a>

                    </div>
                    @if ($isi->statuspelaksanaan == 1)
                        <div class="mt-1">
                            <a href="/event/{{ $isi->slug }}"
                                class="me-2 mt-1 flex justify-center rounded-lg bg-green-600 px-4 py-2 text-base font-medium text-white hover:bg-green-700">
                                <i class="ri-checkbox-circle-line me-1"></i>Pendaftaran Dibuka
                            </a>
                        </div>
                    @else
                        <div class="mt-1">
                            <a href="/event/{{ $isi->slug }}"
                                class="me-2 mt-1 flex justify-center rounded-lg bg-red-600 px-4 py-2 text-base font-medium text-white hover:bg-red-700">
                                <i class="ri-lock-line me-1"></i>Pendaftaran Ditutup
                            </a>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
    <div id="faq" class="mx-auto mb-20 max-w-[90%] scroll-mt-20 md:max-w-main">
        <div class="my-8 flex flex-col items-center justify-between gap-3 md:my-12 md:flex-row" data-aos="flip-up"
            data-aos-duration="950" data-aos-once="true">
            <h2 class="max-w-[420px] text-4xl font-semibold md:text-5xl">Frequently Asked Question</h2>
            <p class="max-w-[461px] text-base text-ticykit-secondary md:text-lg">Jelajahi Ragam Unggulan Produk dan
                Layanan
                Kami yang
                sudah kami siapkan untuk Pengembangan Profesional Guru</p>
        </div>
        @include('home.home-layouts.tw-home-faq')
    </div>
    @include('home.home-layouts.tw-home-footer')
@endsection
<script>
    function openTab(evt, tabName) {
        var i, tabcontent, tablinks;

        // Hide all tab content
        tabcontent = document.getElementsByClassName("tab-content");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].classList.add("hidden");
        }

        // Remove the active class from all tab links
        tablinks = document.getElementsByClassName("tab-link");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].classList.remove("active");
            tablinks[i].classList.remove("text-black");
            tablinks[i].classList.add("border-transparent");
            tablinks[i].classList.add("text-gray-600");
        }

        // Show the current tab and add an active class to the button
        document.getElementById(tabName).classList.remove("hidden");
        evt.currentTarget.classList.add("active");
        evt.currentTarget.classList.add("text-black");
        evt.currentTarget.classList.remove("border-transparent");
        evt.currentTarget.classList.remove("text-gray-600");
    }

    // Set the default active tab
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('.tab-link').click();
    });
</script>
