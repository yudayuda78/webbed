@extends('home.home-layouts.home-main-tw')
@section('container')
    <div class="bg-[#196ECD]">
        <div>
            @include('home.home-layouts.tw-home-navbar-ecourse')
        </div>
        <div class="mx-auto max-w-[90%] md:max-w-main">
            <div class="flex flex-col-reverse items-center justify-between pb-0 pt-10 md:flex-row md:pb-8">
                <div class="max-w-[570px]">
                    <h1 class="mb-2 font-inter text-lg text-white md:mb-4 md:text-xl">Ecourse</h1>
                    <h2 class="mb-2 font-inter text-3xl font-bold leading-tight text-white md:mb-4 md:text-[40px]">Kuasai
                        Ratusan Skill, Bangun Portfolio & Bersertifikat.
                    </h2>
                    <p class="mb-8 font-inter text-base text-white md:text-xl">Akses semua materi sekali bayar. Lebih dari
                        sekadar nonton rekaman tapi juga dengan Case Study & Praktik.</p>
                    <div class="hidden justify-between md:flex">
                        <p class="font-inter text-white">
                            <i class="ri-price-tag-3-fill me-3 rounded-full bg-[#7311F6] p-2"></i><b>Gratis dan
                                Berbayar</b>
                        </p>
                        <p class="font-inter text-white">
                            <i class="ri-file-paper-2-line me-3 rounded-full bg-[#7311F6] p-2"></i><b>Bersertifikat</b>
                        </p>
                        <p class="font-inter text-white">
                            <i class="ri-verified-badge-line me-3 rounded-full bg-[#7311F6] p-2"></i><b>Mudah
                                Digunakan</b>
                        </p>
                    </div>
                </div>
                <img class="w-10/12 md:w-fit" src="/img/ui/ecoursetillus.png">
            </div>
            <div class="flex flex-col justify-between gap-3 pb-8 md:flex md:flex-row md:gap-7 md:pb-12">
                <div class="flex w-full items-center gap-4 rounded-xl bg-[#085FBF] p-6 text-white">
                    <img class="" src="/img/ui/responsive-icon.png">
                    <div class="border-l border-white pl-4 pr-3">
                        <p class="text-[15px] font-bold">Responsive</p>
                        <p class="text-[15px]">Dekstop atau Mobile!</p>
                    </div>
                </div>
                <div class="flex w-full items-center gap-4 rounded-xl bg-[#085FBF] p-6 text-white">
                    <img class="" src="/img/ui/responsive-icon.png">
                    <div class="border-l border-white pl-4 pr-3">
                        <p class="text-[15px] font-bold">Fleksibel</p>
                        <p class="text-[15px]">Bisa dilakukan dimana saja!</p>
                    </div>
                </div>
                <div class="flex w-full items-center gap-4 rounded-xl bg-[#085FBF] p-6 text-white">
                    <img class="" src="/img/ui/responsive-icon.png">
                    <div class="border-l border-white pl-4 pr-3">
                        <p class="text-[15px] font-bold">Single Device</p>
                        <p class="text-[15px]">Cukup satu Perangkat!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-[#085FBF]">
        <h1 class="mx-auto max-w-[90%] py-4 font-inter font-bold text-white md:max-w-main">Akses semua materi sekali bayar.
            Lebih dari sekadar nonton rekaman tapi juga dengan Case Study & Praktik.
        </h1>
    </div>
    <div class="mx-auto max-w-[90%] md:max-w-main">
        <div class="my-7">
            <p class="mb-1 font-inter text-xl font-bold">Topik Ecourse 🔥</p>
            <p class="mb-3 font-inter">Pilih berbagai topik Ecourse dibawah untuk mulai belajar dan mengunduh sertifikat</p>
            <div class="flex gap-2">
                <div class="rounded-full bg-yellow-400 px-3 py-1 font-inter"><i class="ri-bar-chart-box-fill me-1"></i>Semua
                </div>
                <div class="rounded-full bg-slate-200 px-3 py-1 font-inter"><i class="ri-bar-chart-box-fill me-1"></i>Umum
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 gap-5 md:grid-cols-3">
            @foreach ($ecourse as $ecours)
                <div class="relative mb-3">
                    {{-- <a
                        href="{{ $ecours->bayar == 0 || $ecours->bayar == 1 ? '/ecourse/' . $ecours->slug : route('pembayaran', ['ecourse' => $ecours->slug]) }}">
                        <div class="group relative">
                            <img class="rounded-lg border" src="{{ asset('imgecourse/' . $ecours->img . '.webp') }}"
                                alt="Course Image">
                            <div
                                class="absolute inset-0 rounded-lg bg-blue-500 opacity-0 transition-opacity duration-300 group-hover:opacity-50">
                            </div>
                        </div>
                        @if ($ecours->bayar)
                            <span class="absolute right-2 top-2 rounded bg-yellow-400 px-2 py-1 text-xs font-bold shadow"><i
                                    class="ri-star-fill font-normal"></i> Premium</span>
                        @endif
                    </a> --}}
                    <a
                        href="{{'/ecourse/' . $ecours->slug}}">
                        <div class="group relative">
                            <img class="rounded-lg border" src="{{ asset('imgecourse/' . $ecours->img . '.webp') }}"
                                alt="Course Image">
                            <div
                                class="absolute inset-0 rounded-lg bg-blue-500 opacity-0 transition-opacity duration-300 group-hover:opacity-50">
                            </div>
                        </div>
                        @if ($ecours->bayar)
                            <span class="absolute right-2 top-2 rounded bg-yellow-400 px-2 py-1 text-xs font-bold shadow"><i
                                    class="ri-star-fill font-normal"></i> Premium</span>
                        @endif
                    </a>
                    <div class="mt-2">
                        {{-- <a
                            href="{{ $ecours->bayar == 0 || $ecours->bayar == 1 ? '/ecourse/' . $ecours->slug : route('pembayaran', ['ecourse' => $ecours->slug]) }}">
                            <p class="font-inter font-medium">{{ $ecours->judul }} {!! $ecours->bayar == 0
                                ? ''
                                : ($ecours->bayar == 1
                                    ? 'Premium'
                                    : '<span class="me-2 ms-0.5 rounded bg-green-300 px-1 py-0.5 text-xs font-medium text-gray-800">Diskon</span>') !!}
                            </p>
                        </a> --}}
                        <a
                            href="{{'/ecourse/' . $ecours->slug }}">
                            <p class="font-inter font-medium">{{ $ecours->judul }} {!! $ecours->bayar == 0
                                ? ''
                                : ($ecours->bayar == 1
                                    ? 'Premium'
                                    : '<span class="me-2 ms-0.5 rounded bg-green-300 px-1 py-0.5 text-xs font-medium text-gray-800">Diskon</span>') !!}
                            </p>
                        </a>
                        <div>
                            <p class="mt-2 font-inter text-sm font-semibold text-ticykit-secondary">
                                <i
                                    class="ri-shopping-cart-2-line {{ $ecours->bayar ? 'bg-yellow-400 text-black' : 'bg-blue-700 text-white' }} me-1 rounded p-1 font-normal"></i>
                                <span
                                    class="font-bold text-red-500 line-through">{{ $ecours->bayar == 0 ? '' : ($ecours->bayar == 1 ? 'Premium' : $ecours->hargaawal) }}</span>
                                {{ $ecours->bayar == 0 ? 'Free' : ($ecours->bayar == 1 ? 'Premium' : $ecours->harga) }}
                            </p>
                            <p class="mt-2 font-inter text-sm font-semibold text-ticykit-secondary">
                                <i class="ri-chat-voice-fill me-1 rounded bg-blue-700 p-1 font-normal text-white"></i>
                                Belajar Era Digital
                            </p>
                            {{-- <a
                                href="{{ $ecours->bayar == 0 || $ecours->bayar == 1 ? '/ecourse/' . $ecours->slug : route('pembayaran', ['ecourse' => $ecours->slug]) }}">
                                <button type="button"
                                    class="me-2 mt-2 rounded bg-blue-700 px-3 py-1.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ikuti
                                    Ecourse</button>
                            </a> --}}
                            <a
                                href="{{'/ecourse/' . $ecours->slug}}">
                                <button type="button"
                                    class="me-2 mt-2 rounded bg-blue-700 px-3 py-1.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ikuti
                                    Ecourse</button>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $ecourse->withQueryString()->links() }}
    </div>
    <x-faq.tw-home-faq-new />
    @include('home.home-layouts.tw-home-footer')
@endsection
