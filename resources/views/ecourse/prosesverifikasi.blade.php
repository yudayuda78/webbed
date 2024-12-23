@extends('home.home-layouts.home-main-tw')
@section('container')
    <div class="bg-[#196ECD] pb-8 md:pb-10">
        @include('home.home-layouts.tw-home-navbar-ecourse')
    </div>
    <div class="bg-[#085FBF]">
        <h1 class="mx-auto max-w-[90%] py-4 font-inter font-bold text-white md:max-w-main">Download Sertifikat Ecourse
        </h1>
    </div>
    <div class="mx-auto mb-7 mt-9 max-w-[90%] justify-between md:max-w-main">
        <div class="flex w-full flex-col items-center gap-5 rounded-lg bg-[#EBF5FF] p-5 md:flex-row md:gap-14 md:p-10">
            <img class="w-[250px] md:ms-8" src="/img/ui/ecoursetillus.png">
            <div class="pb-0 md:pb-6">
                <div class="mb-3">
                    <h3 class="mb-2 text-xl font-bold md:text-2xl">Mohon Ditunggu, Pembayaran Anda Sedang Dalam Proses Verifikasi</h3>
                    <div class="max-w-[600px] text-base text-[#64748B] md:text-lg" id="countdown"></div>
                    <p class="max-w-[600px] text-base text-[#64748B] md:text-lg">Anda akan dikabari via WhatsApp oleh admin
                        setelah verifikasi pembayaran, untuk mempercepat proses ini silahkan segera konfirmasi admin pada
                        nomor <a class="font-bold text-[#085FBF]" href="">000 000 000 000</a></p>
                </div>
                {{-- <div class="hidden flex-col gap-2 md:flex md:flex-row">
                    <a class="rounded-full bg-[#196ECD] px-3 py-2 text-sm text-white" href="/ecourse">Ecourse Lainnya</a>
                    <a class="rounded-full bg-slate-300 px-3 py-2 text-sm text-black" href="/event">Event Diklat</a>
                    <a class="rounded-full bg-slate-300 px-3 py-2 text-sm text-black" href="/ticykit">Bahan Ajar</a>
                    <a class="rounded-full bg-slate-300 px-3 py-2 text-sm text-black" target="_blank"
                        href="https://bacakembali.com">Artikel Pendidikan</a>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="mb-10"></div>
    {{-- 
    <div class="mb-4">
        <p class="mx-auto mb-1 max-w-[90%] font-inter text-xl font-bold md:max-w-main">Ecourse Lainnya</p>
    </div>
    <div class="mx-auto mb-10 grid max-w-[90%] grid-cols-1 gap-5 md:max-w-main md:grid-cols-3">
        @foreach ($EcourseLainnya as $ecours)
            <div class="">
                <a href="/ecourse/{{ $ecours->slug }}"><img class="rounded-xl border"
                        src="{{ asset('imgecourse/' . $ecours->img . '.webp') }}" alt=""></a>
                <div class="mt-2 flex gap-1">
                    <a href="/ecourse/{{ $ecours->slug }}">
                        <p class="font-inter font-medium">{{ $ecours->judul }}</p>
                    </a>
                    <p class="font-inter font-bold">{{ $ecours->bayar == 1 ? 'Premium' : 'Free' }}</p>
                </div>
                <p class="mt-2 font-inter text-sm text-slate-500">Oleh <b>Belajar Era Digital</b></p>
            </div>
        @endforeach
    </div> --}}
    @include('home.home-layouts.tw-home-footer')
@endsection

{{-- <a
        href="{{ route('downloadsertifikatecourse') }}">Download Sertifikat Disini
    </a><br> --}}
