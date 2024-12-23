@extends('home.home-layouts.home-main-tw')
@section('container')
    <div class="">
        <div class="md:pb-13 pb-8">
            @include('home.home-layouts.tw-home-navbar')
        </div>
        <div
            class="mx-auto mb-7 flex h-fit max-w-[90%] items-center justify-center rounded-2xl border bg-gray-50 p-7 pb-7 md:mb-10 md:h-[580px] md:max-w-main md:p-0">
            <div class="max-w-[440px] space-y-1.5">
                <img src="/img/ui/Telecommuting-pana.png">
                <h1 class="mb-3 text-2xl font-bold">Presensi Telah Ditutup</h1>
                <p class="pb-3 text-gray-500">Jika terdapat kendala mengenai proses presensi silahkan hubungi admin kami pada
                    link dibawah</p>
                <a href="https://wa.link/rr7ryz">
                    <button type="button"
                        class="rounded-lg bg-blue-700 px-3 py-2 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600">https://wa.link/rr7ryz</button>
                </a>
            </div>
        </div>
    </div>
    @include('home.home-layouts.tw-home-footer')
@endsection
