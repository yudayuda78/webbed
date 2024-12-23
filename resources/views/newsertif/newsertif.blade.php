@extends('home.home-layouts.home-main-tw')
@section('container')
    <div class="md:pb-13 bg-[url(/img/ui/bg-sertif.png)] pb-8">
        @include('home.home-layouts.tw-home-navbar')
        <div class="mx-auto max-w-[90%] pt-5 md:max-w-main md:pt-5">
            <p class="text-base text-[#64748B] md:text-lg">Sertifikat</p>
            <p class="text-lg font-bold md:text-xl">{{ $newsertif->judul }}
            </p>
        </div>
    </div>
    <div id="divToHide" class="bg-[#1B7BE7] py-8">
        <div class="mx-auto flex max-w-[90%] flex-col justify-between gap-4 md:max-w-main md:flex-row md:items-center">
            <div>
                <i class="ri-file-download-line rounded-full bg-white p-3 text-xl text-[#1B7BE7] md:text-3xl"></i>
                <h3 class="mt-5 max-w-96 text-xl leading-snug text-white md:text-4xl">Masih Bingung Cara Download Sertifikat?
                    <b>Tonton Video Ini!</b>
                </h3>
                <button id="hideButton"
                    class="mt-3 rounded-lg bg-white px-3 py-2 text-sm font-medium text-black hover:bg-blue-100 focus:outline-none focus:ring-4 focus:ring-blue-300">Sudah
                    Mengerti</button>
            </div>
            <div class="w-full md:h-[395px] md:w-[702px]">
                <div class="relative aspect-video w-full rounded-xl" id="video-container">
                    <button id="play-button">
                        <img src="/img/ui/thumbnail-yt.jpg" alt="Video Thumbnail"
                            class="h-full w-full cursor-pointer rounded-xl object-cover" id="thumbnail">
                        <div class="absolute inset-0 flex items-center justify-center">
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="mx-auto mb-2 mt-6 flex max-w-[90%] flex-col justify-between gap-7 md:max-w-main md:flex-row">
        <div class="w-full md:w-[789px]">
            <div class="mb-5 rounded-lg bg-[#EBF5FF] p-7">
                <h3 class="mb-2 text-xl font-bold">Download Sertifikat ✨</h3>
                <p class="text-[#64748B]">Cari dengan mengetikan nama anda, apabila nama tidak ditemukan atau terjadi
                    kesalahan pada pengetikan silahkan hubungi Admin.
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9697129609724227"
                        crossorigin="anonymous"></script>
                    <ins class="adsbygoogle" style="display:block; text-align:center;" data-ad-layout="in-article"
                        data-ad-format="fluid" data-ad-client="ca-pub-9697129609724227" data-ad-slot="1581340639"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </p>
            </div>
            <form class="mb-5 flex gap-2" action="{{ route('sertifikat.search', ['newsertif' => $newsertif->slug]) }}"
                method="GET">
                <input
                    class="form-control block w-full rounded-lg border bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                    type="search" name="search" placeholder="Cari nama anda disini"
                    @if (isset($search)) value="{{ $search }}" @endif>
                <button
                    class="rounded-lg bg-[#196ECD] px-4 py-2.5 text-base font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">Cari</button>
            </form>
            @if (isset($search))
                <div id="alert-5" class="mb-5 flex items-center rounded-lg border bg-gray-50 p-4 dark:bg-gray-800"
                    role="alert">
                    <svg class="h-4 w-4 flex-shrink-0 dark:text-gray-300" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="ms-3 text-sm font-medium text-gray-800 dark:text-gray-300">
                        Hasil pencarian untuk <b>{{ $search }}</b>
                    </div>
                    <button type="button"
                        class="-mx-1.5 -my-1.5 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-gray-50 p-1.5 text-gray-500 hover:bg-gray-200 focus:ring-2 focus:ring-gray-400 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-white"
                        data-dismiss-target="#alert-5" aria-label="Close">
                        <span class="sr-only">Dismiss</span>
                        <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            @endif
            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="inline-block min-w-full p-1.5 align-middle">
                        <div id="accordion-collapse" data-accordion="collapse">
                            @foreach ($datas as $data)
                                <h2 id="accordion-collapse-heading-{{ $data->id }}">
                                    <button type="button"
                                        class="{{ $loop->first ? 'rounded-t-xl' : '' }} {{ $loop->last ? 'border-b' : '' }} flex w-full items-center justify-between gap-3 border-x border-t border-gray-200 px-3 py-3 text-sm font-medium text-gray-900 hover:bg-gray-100 focus:outline-none md:px-6 md:text-[15px] rtl:text-right"
                                        data-accordion-target="#accordion-collapse-body-{{ $data->id }}"
                                        aria-expanded="false" aria-controls="accordion-collapse-body-{{ $data->id }}">
                                        <div class="flex items-center gap-3.5">
                                            <i
                                                class="ri-folder-download-line rounded-lg bg-ticykit-bg-blue px-2 py-1 text-lg text-white"></i>
                                            <span style="color: rgb(54, 54, 54)"
                                                class="w-fit text-left leading-tight md:w-[259px]">{{ $data->nama }}
                                                <span class="block text-xs font-normal text-gray-400 md:hidden md:text-sm">
                                                    <i class="ri-user-shared-line"></i> {{ $data->id }}
                                                    <i class="ri-community-line ms-1"></i> {{ $data->instansi }}
                                                </span>
                                            </span>
                                            <span class="hidden text-xs font-normal text-gray-400 md:block md:text-sm">
                                                <i class="ri-community-line me-1"></i> {{ $data->instansi }}
                                            </span>
                                        </div>
                                        <div class="flex items-center gap-4 pr-1 md:pr-0">
                                            <svg data-accordion-icon class="h-3 w-3 shrink-0 rotate-180" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="M9 5 5 1 1 5" />
                                            </svg>
                                        </div>
                                    </button>
                                </h2>
                                <div id="accordion-collapse-body-{{ $data->id }}" class="hidden"
                                    aria-labelledby="accordion-collapse-heading-{{ $data->id }}">
                                    <div
                                        class="{{ $loop->last ? 'border-b ' : '' }} border-x border-t border-gray-200 px-5 py-5 md:py-7">
                                        <p class="mb-1 font-bold text-gray-700">{{ $data->nama }}</p>
                                        <p class="text-sm text-gray-500">Sertifikat dan Fasilitas atas nama
                                            <b>{{ $data->nama }}</b> dapat diunduh pada link di bawah ini
                                        </p>
                                        <div class="mb-1 mt-3 flex flex-col gap-2 text-center md:mt-2 md:flex-row">
                                            <a href="{{ route('sertif.download01', ['id' => $data->id]) }}"
                                                class="flex justify-between gap-1 rounded-lg bg-gradient-to-r from-blue-500 to-ticykit-bg-blue px-3 py-2 text-sm font-medium text-white hover:bg-gradient-to-r hover:from-blue-600 hover:to-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300">
                                                <i class="ri-attachment-fill"></i>Unduh Sertifikat<i
                                                    class="ri-arrow-right-up-line block md:hidden"></i>
                                            </a>
                                            <a href="{{ $data->fasilitas }}"
                                                class="flex justify-between gap-1 rounded-lg bg-gradient-to-r from-orange-300 to-ticykit-primary px-3 py-2 text-sm font-medium text-white hover:bg-gradient-to-r hover:from-orange-500 hover:to-orange-600 focus:outline-none focus:ring-4 focus:ring-blue-300">
                                                <i class="ri-attachment-fill"></i>Unduh Fasilitas<i
                                                    class="ri-arrow-right-up-line block md:hidden"></i>
                                            </a>
                                            <a href="{{ route('sertifikat.user', ['newsertif' => $newsertif->slug, 'datas' => $data->slug]) }}"
                                                class="flex justify-between gap-1 rounded-lg bg-gradient-to-r from-green-400 to-green-500 px-3 py-2 text-sm font-medium text-white hover:bg-gradient-to-r hover:from-green-600 hover:to-green-700 focus:outline-none focus:ring-4 focus:ring-blue-300">
                                                <i class="ri-checkbox-circle-fill"></i>Cek Verifikasi<i
                                                    class="ri-arrow-right-up-line block md:hidden"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{-- <div class="overflow-hidden rounded-md border">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr class="bg-[#F9FAFB]">
                                        <th scope="col" class="py-3 pl-6 text-start text-sm font-bold">No</th>
                                        <th scope="col" class="px-3 py-3 text-start text-sm font-bold">Nama</th>
                                        <th scope="col" class="px-3 py-3 text-start text-sm font-bold">Instansi</th>
                                        <th scope="col" class="px-3 py-3 text-start text-sm font-bold">Fasilitas</th>
                                        <th scope="col" class="px-3 py-3 text-start text-sm font-bold">Sertifikat</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @foreach ($datas as $data)
                                        <tr>
                                            <td class="whitespace-nowrap py-3 pl-6 text-sm font-medium text-[#64748B]">
                                                <a
                                                    href="{{ route('sertifikat.user', ['newsertif' => $newsertif->slug, 'datas' => $data->slug]) }}">{{ $data->id }}
                                                </a>
                                            </td>
                                            <td class="max-w-72 px-3 py-3 text-sm font-medium text-[#1B7BE7]">
                                                <a
                                                    href="{{ route('sertifikat.user', ['newsertif' => $newsertif->slug, 'datas' => $data->slug]) }}">{{ $data->nama }}
                                                </a>
                                            </td>
                                            <td class="p max-w-72 px-3 py-3 text-sm font-medium text-[#64748B]">
                                                {{ $data->instansi }}</td>
                                            <td class="whitespace-nowrap px-3 py-3 text-sm font-bold text-[#1B7BE7]"><button
                                                    class="btn-fasilitas btn btn-warning"><a href="{{ $data->fasilitas }}"
                                                        target="blank">Fasilitas</a></button></td>
                                            <td class="whitespace-nowrap px-3 py-3 text-sm font-bold text-[#1B7BE7]"><button
                                                    class="btn-sertif btn btn-warning"><a
                                                        href="{{ route('sertif.download01', ['id' => $data->id]) }}">Sertifikat</a></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="mb-6 mt-5">
                {{ $datas->withQueryString()->links('vendor.pagination.tailwind') }}
            </div>
        </div>
        <div class="hidden max-w-[350px] md:block">
            <a href="https://bacakembali.com" target="_blank"><img class="mb-5 rounded-lg border"
                    src="/img/ui/ticykitbanner3.jpg"></a>
            <a href="/ticykit" target="_blank"><img class="mb-5 rounded-lg border" src="/img/ui/ticykitbanner2.jpg"></a>
        </div>
    </div>
    <div
        class="mx-auto grid max-w-[90%] grid-cols-1 justify-between gap-5 py-7 md:max-w-main md:grid-cols-3 md:pb-10 md:pt-0">
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
                            $judul_terbaru = explode('(', $isi->judul)[0];
                        @endphp
                        <h1 class="pb-1 text-[17px] font-bold leading-snug">{{ trim($judul_terbaru) }}</h1>
                    </a>

                </div>
                <div class="mt-1">
                    <a href="/event/{{ $isi->slug }}"
                        class="me-2 mt-1 flex justify-center rounded-lg bg-green-600 px-4 py-2 text-base font-medium text-white hover:bg-green-700">
                        <i class="ri-checkbox-circle-line me-1"></i>Pendaftaran Dibuka
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    @include('home.home-layouts.tw-home-footer')
    <script>
        document.getElementById('thumbnail').addEventListener('click', function() {
            const videoContainer = document.getElementById('video-container');
            videoContainer.innerHTML = `<iframe class="aspect-video w-full rounded-xl" src="https://www.youtube.com/embed/cbTPAdL9kV0?autoplay=1"
                title="Panduan Mendownload Sertifikat" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>`;
        });

        // Optional: make the play button clickable too
        document.getElementById('play-button').addEventListener('click', function() {
            document.getElementById('thumbnail').click();
        });
    </script>
    <script>
        document.getElementById("hideButton").addEventListener("click", function() {
            document.getElementById("divToHide").classList.add("hidden");
        });
    </script>
@endsection
