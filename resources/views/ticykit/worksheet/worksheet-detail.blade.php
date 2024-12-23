@extends('home.home-layouts.home-main-tw')
@section('container')
    <x-ticykit.navbar />
    <div class="mt-4 bg-ticykit-bg py-5 md:mt-8 md:py-7">
        <div class="mx-auto max-w-[90%] md:max-w-main">
            <div class="max-w-main">
                <h1 class="text-lg font-bold capitalize md:text-2xl">{{ $content->title }}</h1>
                <p class="text-base text-ticykit-secondary md:text-lg">Worksheet</p>
            </div>
        </div>
    </div>
    <div class="mx-auto my-7 flex max-w-[90%] flex-col justify-between gap-4 md:max-w-main md:flex-row">
        <div class="w-full md:w-[822px]">
            <div class="flex max-h-[550px] justify-center rounded-lg border border-ticykit-bg-border bg-ticykit-bg p-2">
                <img src="{{ asset('img/' . $content->image) }}" class="h-full max-h-[550px]">
            </div>
            <div class="mt-5">
                <h3 class="text-lg font-bold leading-normal md:text-2xl">Deskripsi</h3>
                <p class="text-base text-ticykit-secondary md:text-lg">{{ $content->deskripsi }}</p>
            </div>
        </div>
        <div class="w-[318px]">
            <div class="rounded-lg border border-ticykit-bg-border p-6">
                <div class="border-b border-ticykit-bg-border pb-4">
                    <h3 class="font-bold capitalize">{{ $content->title }}</h3>
                    <h4 class="text-ticykit-secondary">Worksheet</h4>
                </div>
                <div class="flex justify-between border-b border-ticykit-bg-border py-4 text-sm">
                    <p>Kategori</p>
                    <p>Worksheet</p>
                </div>
                <div class="flex justify-between border-b border-ticykit-bg-border py-4 text-sm">
                    <p>Jenjang</p>
                    <p>TK</p>
                </div>
                {{-- <div class="flex justify-between border-b border-ticykit-bg-border py-4 text-sm">
                    <p>Mapel</p>
                    <p>Sains</p>
                </div> --}}
                <a href="{{ route('content.download', ['id' => $content->id]) }}"
                    class="mt-5 block rounded-lg bg-ticykit-primary p-3 text-center font-medium text-white hover:bg-orange-800 focus:outline-none focus:ring-4 focus:ring-orange-300"><i
                        class="ri-download-2-fill"></i> <b>Download Gratis</b>
                </a>
            </div>
            <div class="mt-5 rounded-lg border border-ticykit-bg-border p-6">
                <div class="">
                    <h3 class="font-bold">Informasi Download</h3>
                    <p class="mt-1 text-[15px] text-ticykit-secondary">Login diperlukan untuk mengunduh file ini, silahkan
                        masuk atau daftarkan diri anda pada link dibawah!
                    </p>
                </div>
                <div class="mt-5 flex justify-between gap-3">
                    <a href="/register"
                        class="block w-full rounded-lg bg-ticykit-primary p-3 text-center font-medium text-white hover:bg-orange-800 focus:outline-none focus:ring-4 focus:ring-orange-300"><i
                            class="ri-user-add-line"></i> <b>
                            Daftar</b></a>
                    <a href="/login"
                        class="block w-full rounded-lg border border-ticykit-primary bg-white p-3 text-center font-medium text-black hover:bg-orange-100 focus:outline-none focus:ring-4 focus:ring-orange-300"><i
                            class="ri-login-box-fill"></i> <b>
                            Masuk</b></a>
                </div>
            </div>
        </div>
    </div>
    <x-ticykit.selling-point />
    @include('home.home-layouts.tw-home-footer')
@endsection
