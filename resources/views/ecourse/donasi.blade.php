@extends('home.home-layouts.home-main-tw')
@section('container')
    <div class="bg-[#196ECD] pb-8 md:pb-10">
        @include('home.home-layouts.tw-home-navbar-ecourse')
    </div>
    <div class="bg-[#085FBF]">
        <h1 class="mx-auto max-w-[90%] py-4 font-inter font-bold text-white md:max-w-main">Halaman Donasi Sukarela
        </h1>
    </div>

    <div class="mx-auto mb-10 mt-6 flex max-w-[90%] flex-col justify-between gap-7 md:max-w-main md:flex-row">
        <div class="w-full md:w-[789px]">
            <div class="rounded-lg bg-[#EBF5FF] p-7">
                <h3 class="mb-2 text-xl font-bold">Donasi Sukarela ✨</h3>
                <p class="text-[#64748B]">Untuk mendukung kegiatan kami, anda dapat memberikan Donasi secara sukarela pada
                    kegiatan yang telah dilaksanakan, Anda dapat mengirimkan donasi pada nomor rekening berikut:</p>
            </div>
            <form class="row g-3 mt-1" action="{{ route('tambahdatadonasi') }}" method="POST" enctype="multipart/form-data">
                @csrf

                @if (auth()->check())
                    <div class="hidden">
                        {{ auth()->user()->namalengkap }}
                        {{ auth()->user()->nomortelepon }}
                    </div>
                @else
                    gagal
                @endif
                <div>
                    <input type="hidden" name="nama" value="{{ auth()->user()->namalengkap }}">
                    <input type="hidden" name="nomortelepon" value="{{ auth()->user()->nomortelepon }}">
                    <input type="hidden" name="email" value="{{ auth()->user()->email }}">
                    <input type="hidden" name="judul" value="{{ $dataDariShow->judul }}">
                </div>
                <label class="mb-2 mt-3 block font-semibold text-[#64748B]">Pilih Rekening</label>
                <ul
                    class="w-full items-center rounded-lg border border-gray-200 bg-white text-sm font-medium text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white sm:flex">
                    {{-- <li class="w-full border-b border-gray-200 dark:border-gray-600 sm:border-b-0 sm:border-r">
                        <div class="flex items-center ps-3">
                            <input id="mandiri" type="radio" name="bank" value="mandiri"
                                class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700 dark:focus:ring-blue-600 dark:focus:ring-offset-gray-700">
                            <label for="mandiri"
                                class="ms-2 w-full py-3 text-sm font-medium text-gray-900 dark:text-gray-300"><img class="ml-1 h-4" src="/img/ui/mandiri.png">
                            </label>
                        </div>
                    </li> --}}
                    {{-- <li class="w-full border-b border-gray-200 dark:border-gray-600 sm:border-b-0 sm:border-r">
                        <div class="flex items-center ps-3">
                            <input id="bri" type="radio" name="bank" value="bri"
                                class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700 dark:focus:ring-blue-600 dark:focus:ring-offset-gray-700">
                            <label for="bri"
                                class="ms-2 w-full py-3 text-sm font-medium text-gray-900 dark:text-gray-300"><img class="ml-1 h-4" src="/img/ui/bri.png"></label>
                        </div>
                    </li> --}}
                    <li class="w-full border-b border-gray-200 dark:border-gray-600 sm:border-b-0 sm:border-r">
                        <div class="flex items-center ps-3">
                            <input id="bni" type="radio" name="bank" value="bni"
                                class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700 dark:focus:ring-blue-600 dark:focus:ring-offset-gray-700">
                            <label for="bni"
                                class="ms-2 w-full py-3 text-sm font-medium text-gray-900 dark:text-gray-300"><img class="ml-1 h-4" src="/img/ui/bni.png">
                            </label>
                        </div>
                    </li>
                    {{-- <li class="w-full border-b border-gray-200 dark:border-gray-600 sm:border-b-0 sm:border-r">
                        <div class="flex items-center ps-3">
                            <input id="bca" type="radio" name="bank" value="bca"
                                class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700 dark:focus:ring-blue-600 dark:focus:ring-offset-gray-700">
                            <label for="bca"
                                class="ms-2 w-full py-3 text-sm font-medium text-gray-900 dark:text-gray-300"><img class="ml-1 h-4" src="/img/ui/bca.png">
                            </label>
                        </div>
                    </li> --}}
                    {{-- <li class="w-full dark:border-gray-600">
                        <div class="flex items-center ps-3">
                            <input id="dana" type="radio" name="bank" value="dana/shopeepay/linkaja"
                                class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700 dark:focus:ring-blue-600 dark:focus:ring-offset-gray-700">
                            <label for="dana"
                                class="ms-2 w-full py-3 text-sm font-medium text-gray-900 dark:text-gray-300">Lainnya</label>
                        </div>
                    </li> --}}
                </ul>
                {{-- <div id="div_mandiri" style="display: none" class="mt-2 rounded-lg border p-3">
                    <h3 class="mb-1 text-sm font-bold">Bank Mandiri</h3>
                    <p class="text-sm text-[#64748B]"><span class="font-semibold text-blue-600">1360031874040</span> an Arief Yudhananto Nugroho
                    </p>
                </div> --}}
                {{-- <div id="div_bri" style="display: none" class="mt-2 rounded-lg border p-3">
                    <h3 class="mb-1 text-sm font-bold">Bank BRI</h3>
                    <p class="text-sm text-[#64748B]"><span class="font-semibold text-blue-600">670501041539537</span> an
                        Arief Yudhananto Nugroho
                    </p>
                </div> --}}
                <div id="div_bni" style="display: none" class="mt-2 rounded-lg border p-3">
                    <h3 class="mb-1 text-sm font-bold">Bank BNI</h3>
                    <p class="text-sm text-[#64748B]"><span class="font-semibold text-blue-600">1853698982</span> an Arief Yudhananto Nugroho
                    </p>
                </div>
                {{-- <div id="div_bca" style="display: none" class="mt-2 rounded-lg border p-3">
                    <h3 class="mb-1 text-sm font-bold">Bank BCA</h3>
                    <p class="text-sm text-[#64748B]"><span class="font-semibold text-blue-600">3270924327</span> an Lawu
                        Arunawang
                    </p>
                </div>
                <div id="div_dana" style="display: none" class="mt-2 rounded-lg border p-3">
                    <h3 class="mb-1 text-sm font-bold">Dana, ShopeePay, LinkAja, Gopay, dll.</h3>
                    <p class="text-sm text-[#64748B]"><span class="font-semibold text-blue-600">0895331198431</span> an
                        Lawu
                        Arunawang
                    </p>
                </div> --}}
                <div>
                    <div>
                        <label class="mb-2 mt-3 block font-semibold text-[#64748B]">Nama</label>
                        <input
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                            type="text" class="form-control" placeholder="{{ auth()->user()->namalengkap }}" disabled>
                    </div>
                    <div>
                        <label class="mb-2 mt-3 block font-semibold text-[#64748B]">Email</label>
                        <input
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                            type="text" class="form-control" placeholder="{{ auth()->user()->email }}" disabled>
                    </div>
                    <div>
                        <label class="mb-2 mt-3 block font-semibold text-[#64748B]">Sertifikat Untuk</label>
                        <input
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                            type="text" class="form-control" placeholder="{{ $dataDariShow->judul }}" disabled>
                    </div>
                    <div>
                        <label for="image1" class="mb-2 mt-3 block font-semibold text-[#64748B]">Upload Bukti
                            transfer</label>
                        <Input
                            class="form-control block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 file:me-4 file:border-0 file:bg-[##64748B] file:px-3 file:py-2.5 focus:outline-none disabled:pointer-events-none disabled:opacity-50 dark:text-gray-400"
                            type="file" id="image1" name="image1">
                    </div>
                    <div>
                        <label for="nominal" class="mb-2 mt-3 block font-semibold text-[#64748B]">Jumlah Nominal</label>
                        <input type="number"
                            class="form-control block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                            id="nominal" name="nominal" placeholder="{{ $hargaInteger }}" value="{{ $hargaInteger }}">
                    </div>
                    <div>
                        <button type="submit"
                            class="mb-2 me-2 mt-5 rounded-lg bg-[#196ECD] px-4 py-2.5 text-base font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">Download
                            Sertifikat</button>
                    </div>
                </div>
        </div>
        <div class="max-w-[350px]">
            <a href="https://bacakembali.com" target="_blank"><img class="mb-5 rounded-lg border"
                    src="/img/ui/ticykitbanner3.jpg"></a>
            <a href="/ticykit" target="_blank"><img class="mb-5 rounded-lg border" src="/img/ui/ticykitbanner2.jpg"></a>
        </div>
    </div>
    @include('home.home-layouts.tw-home-footer')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const inputRadio = document.querySelectorAll('input[type="radio"]');

            inputRadio.forEach(function(input) {
                input.addEventListener('change', function() {
                    const idDiklik = this.id;

                    const semuaDiv = document.querySelectorAll('div[id^="div_"]');
                    semuaDiv.forEach(function(div) {
                        div.style.display = 'none';
                    });

                    const divKlik = document.getElementById(`div_${idDiklik}`);
                    if (divKlik) {
                        divKlik.style.display = 'block';
                    }
                });
            });
        });
    </script>
@endsection
