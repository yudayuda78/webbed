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
                    kegiatan yang telah dilaksanakan, Anda dapat mengirimkan donasi pada nomor rekening berikuts:</p>
            </div>
            <form class="row g-3 mt-1" action="{{ route('tambahdatadonasikegiatan') }}" method="POST"
                enctype="multipart/form-data">
                @csrf

                <div>

                    <input type="hidden" name="judul" value="{{ $dataDariShow->judul }}">
                </div>
                <label class="mb-2 mt-3 block font-semibold text-[#64748B]">Pilih Rekening</label>
                <ul
                    class="w-full items-center rounded-lg border border-gray-200 bg-white text-sm font-medium text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white sm:flex">
                    {{-- @if($dataDariShow->jenis == 'english')
                    <li class="w-full border-b border-gray-200 dark:border-gray-600 sm:border-b-0 sm:border-r">
                        <div class="flex items-center ps-3">
                            <input id="mandiri" type="radio" name="bank" value="mandiri"
                                class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700 dark:focus:ring-blue-600 dark:focus:ring-offset-gray-700">
                            <label for="mandiri"
                                class="ms-2 w-full py-3 text-sm font-medium text-gray-900 dark:text-gray-300"><img
                                    class="ml-1 h-4" src="/img/ui/mandiri.png">
                            </label>
                        </div>
                    </li> --}}
                    {{-- @else --}}
                    <li class="w-full border-b border-gray-200 dark:border-gray-600 sm:border-b-0 sm:border-r">
                        <div class="flex items-center ps-3">
                            <input id="mandiri" type="radio" name="bank" value="mandiri"
                                class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700 dark:focus:ring-blue-600 dark:focus:ring-offset-gray-700">
                            <label for="mandiri"
                                class="ms-2 w-full py-3 text-sm font-medium text-gray-900 dark:text-gray-300"><img
                                    class="ml-1 h-4" src="/img/ui/mandiri.png">
                            </label>
                        </div>
                    </li>
                    <li class="w-full border-b border-gray-200 dark:border-gray-600 sm:border-b-0 sm:border-r">
                        <div class="flex items-center ps-3">
                            <input id="bri" type="radio" name="bank" value="bri"
                                class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700 dark:focus:ring-blue-600 dark:focus:ring-offset-gray-700">
                            <label for="bri"
                                class="ms-2 w-full py-3 text-sm font-medium text-gray-900 dark:text-gray-300"><img
                                    class="ml-1 h-4" src="/img/ui/bri.png"></label>
                        </div>
                    </li>
                    <li class="w-full">
                        <div class="flex items-center ps-3">
                            <input id="bni" type="radio" name="bank" value="bni"
                                class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700 dark:focus:ring-blue-600 dark:focus:ring-offset-gray-700">
                            <label for="bni"
                                class="ms-2 w-full py-3 text-sm font-medium text-gray-900 dark:text-gray-300"><img
                                    class="ml-1 h-4" src="/img/ui/bni.png">
                            </label>
                        </div>
                    </li>
                    {{-- @endif --}}
                </ul>

                @if ($dataDariShow->jenis == 'tim1')
                    <div id="div_mandiri" style="display: none" class="mt-2 rounded-lg border p-3">
                        <h3 class="mb-1 text-sm font-bold">Bank Mandiri</h3>
                        <div class="flex items-center gap-1">
                            <p class="text-xl font-bold text-blue-600">1360033587848</p>
                            <button id="copyButton1" onclick="copyToClipboard(event, '1360033587848')"
                                class="ms-1 h-fit rounded-sm bg-slate-400 px-1.5 py-1 text-xs text-white hover:bg-none md:hover:bg-slate-500">
                                <i class="ri-clipboard-line me-1"></i>Copy</button>
                        </div>
                        <p class="text-sm text-[#64748B]">
                            an Reni Mujaenab
                        </p>
                    </div>
                    <div id="div_bri" style="display: none" class="mt-2 rounded-lg border p-3">
                        <h3 class="mb-1 text-sm font-bold">Bank BRI</h3>
                        <div class="flex items-center gap-1">
                            <p class="text-xl font-bold text-blue-600">127001019795503</p>
                            <button id="copyButton2" onclick="copyToClipboard(event, '127001019795503')"
                                class="ms-1 h-fit rounded-sm bg-slate-400 px-1.5 py-1 text-xs text-white hover:bg-none md:hover:bg-slate-500">
                                <i class="ri-clipboard-line me-1"></i>Copy</button>
                        </div>
                        <p class="text-sm text-[#64748B]">
                            an Reni Mujaenab
                        </p>
                    </div>
                    <div id="div_bni" style="display: none" class="mt-2 rounded-lg border p-3">
                        <h3 class="mb-1 text-sm font-bold">Bank BNI</h3>
                        <div class="flex items-center gap-1">
                            <p class="text-xl font-bold text-blue-600">1850809050</p>
                            <button id="copyButton3" onclick="copyToClipboard(event, '1850809050')"
                                class="ms-1 h-fit rounded-sm bg-slate-400 px-1.5 py-1 text-xs text-white hover:bg-none md:hover:bg-slate-500">
                                <i class="ri-clipboard-line me-1"></i>Copy</button>
                        </div>
                        <p class="text-sm text-[#64748B]">
                            an Reni Mujaenab
                        </p>
                    </div>
                @elseif ($dataDariShow->jenis == 'tim2')
                    <div id="div_mandiri" style="display: none" class="mt-2 rounded-lg border p-3">
                        <h3 class="mb-1 text-sm font-bold">Bank Mandiri</h3>
                        <div class="flex items-center gap-1">
                            <p class="text-xl font-bold text-blue-600">1360033184448</p>
                            <button id="copyButton4" onclick="copyToClipboard(event, '1360033184448')"
                                class="ms-1 h-fit rounded-sm bg-slate-400 px-1.5 py-1 text-xs text-white hover:bg-none md:hover:bg-slate-500">
                                <i class="ri-clipboard-line me-1"></i>Copy</button>
                        </div>
                        <p class="text-sm text-[#64748B]">
                            an Lawu Arunawang
                        </p>
                    </div>
                    <div id="div_bri" style="display: none" class="mt-2 rounded-lg border p-3">
                        <h3 class="mb-1 text-sm font-bold">Bank BRI</h3>
                        <div class="flex items-center gap-1">
                            <p class="text-xl font-bold text-blue-600">127001019552507</p>
                            <button id="copyButton5" onclick="copyToClipboard(event, '127001019552507')"
                                class="ms-1 h-fit rounded-sm bg-slate-400 px-1.5 py-1 text-xs text-white hover:bg-none md:hover:bg-slate-500">
                                <i class="ri-clipboard-line me-1"></i>Copy</button>
                        </div>
                        <p class="text-sm text-[#64748B]">
                            an Lawu Arunawang
                        </p>
                    </div>
                    <div id="div_bni" style="display: none" class="mt-2 rounded-lg border p-3">
                        <h3 class="mb-1 text-sm font-bold">Bank BNI</h3>
                        <div class="flex items-center gap-1">
                            <p class="text-xl font-bold text-blue-600">1816308863</p>
                            <button id="copyButton6" onclick="copyToClipboard(event, '1816308863')"
                                class="ms-1 h-fit rounded-sm bg-slate-400 px-1.5 py-1 text-xs text-white hover:bg-none md:hover:bg-slate-500">
                                <i class="ri-clipboard-line me-1"></i>Copy</button>
                        </div>
                        <p class="text-sm text-[#64748B]">
                            an Lawu Arunawang
                        </p>
                    </div>
                @elseif ($dataDariShow->jenis == 'english')
                    <div id="div_mandiri" style="display: none" class="mt-2 rounded-lg border p-3">
                        <h3 class="mb-1 text-sm font-bold">Bank Mandiri</h3>
                        <div class="flex items-center gap-1">
                            <p class="text-xl font-bold text-blue-600">1380024650512</p>
                            <button id="copyButton7" onclick="copyToClipboard(event, '1380024650512')"
                                class="ms-1 h-fit rounded-sm bg-slate-400 px-1.5 py-1 text-xs text-white hover:bg-none md:hover:bg-slate-500">
                                <i class="ri-clipboard-line me-1"></i>Copy</button>
                        </div>
                        <p class="text-sm text-[#64748B]">
                            an Ratna Wijayanti
                        </p>
                    </div>

                    <div id="div_bri" style="display: none" class="mt-2 rounded-lg border p-3">
                        <h3 class="mb-1 text-sm font-bold">Bank BRI</h3>
                        <div class="flex items-center gap-1">
                            <p class="text-xl font-bold text-blue-600">666201019705534</p>
                            <button id="copyButton11" onclick="copyToClipboard(event, '666201019705534')"
                                class="ms-1 h-fit rounded-sm bg-slate-400 px-1.5 py-1 text-xs text-white hover:bg-none md:hover:bg-slate-500">
                                <i class="ri-clipboard-line me-1"></i>Copy</button>
                        </div>
                        <p class="text-sm text-[#64748B]">
                            an Ratna Wijayanti
                        </p>
                    </div>

                    <div id="div_bni" style="display: none" class="mt-2 rounded-lg border p-3">
                        <h3 class="mb-1 text-sm font-bold">Bank BNI</h3>
                        <div class="flex items-center gap-1">
                            <p class="text-xl font-bold text-blue-600">1867489837</p>
                            <button id="copyButton9" onclick="copyToClipboard(event, '1867489837')"
                                class="ms-1 h-fit rounded-sm bg-slate-400 px-1.5 py-1 text-xs text-white hover:bg-none md:hover:bg-slate-500">
                                <i class="ri-clipboard-line me-1"></i>Copy</button>
                        </div>
                        <p class="text-sm text-[#64748B]">
                            an Ratna Wijayanti
                        </p>
                    </div>
                
                 
                @elseif ($dataDariShow->jenis == 'canva')
                  
                <div id="div_mandiri" style="display: none" class="mt-2 rounded-lg border p-3">
                    <h3 class="mb-1 text-sm font-bold">Bank Mandiri</h3>
                    <div class="flex items-center gap-1">
                        <p class="text-xl font-bold text-blue-600">1380024650512</p>
                        <button id="copyButton7" onclick="copyToClipboard(event, '1380024650512')"
                            class="ms-1 h-fit rounded-sm bg-slate-400 px-1.5 py-1 text-xs text-white hover:bg-none md:hover:bg-slate-500">
                            <i class="ri-clipboard-line me-1"></i>Copy</button>
                    </div>
                    <p class="text-sm text-[#64748B]">
                        an Ratna Wijayanti
                    </p>
                </div>

                <div id="div_bri" style="display: none" class="mt-2 rounded-lg border p-3">
                    <h3 class="mb-1 text-sm font-bold">Bank BRI</h3>
                    <div class="flex items-center gap-1">
                        <p class="text-xl font-bold text-blue-600">666201019705534</p>
                        <button id="copyButton11" onclick="copyToClipboard(event, '666201019705534')"
                            class="ms-1 h-fit rounded-sm bg-slate-400 px-1.5 py-1 text-xs text-white hover:bg-none md:hover:bg-slate-500">
                            <i class="ri-clipboard-line me-1"></i>Copy</button>
                    </div>
                    <p class="text-sm text-[#64748B]">
                        an Ratna Wijayanti
                    </p>
                </div>

                <div id="div_bni" style="display: none" class="mt-2 rounded-lg border p-3">
                    <h3 class="mb-1 text-sm font-bold">Bank BNI</h3>
                    <div class="flex items-center gap-1">
                        <p class="text-xl font-bold text-blue-600">1867489837</p>
                        <button id="copyButton9" onclick="copyToClipboard(event, '1867489837')"
                            class="ms-1 h-fit rounded-sm bg-slate-400 px-1.5 py-1 text-xs text-white hover:bg-none md:hover:bg-slate-500">
                            <i class="ri-clipboard-line me-1"></i>Copy</button>
                    </div>
                    <p class="text-sm text-[#64748B]">
                        an Ratna Wijayanti
                    </p>
                </div>

                @elseif ($dataDariShow->jenis == 'gamifikasi')
             
                <div id="div_mandiri" style="display: none" class="mt-2 rounded-lg border p-3">
                    <h3 class="mb-1 text-sm font-bold">Bank Mandiri</h3>
                    <div class="flex items-center gap-1">
                        <p class="text-xl font-bold text-blue-600">1380024650512</p>
                        <button id="copyButton7" onclick="copyToClipboard(event, '1380024650512')"
                            class="ms-1 h-fit rounded-sm bg-slate-400 px-1.5 py-1 text-xs text-white hover:bg-none md:hover:bg-slate-500">
                            <i class="ri-clipboard-line me-1"></i>Copy</button>
                    </div>
                    <p class="text-sm text-[#64748B]">
                        an Ratna Wijayanti
                    </p>
                </div>

                <div id="div_bri" style="display: none" class="mt-2 rounded-lg border p-3">
                    <h3 class="mb-1 text-sm font-bold">Bank BRI</h3>
                    <div class="flex items-center gap-1">
                        <p class="text-xl font-bold text-blue-600">666201019705534</p>
                        <button id="copyButton11" onclick="copyToClipboard(event, '666201019705534')"
                            class="ms-1 h-fit rounded-sm bg-slate-400 px-1.5 py-1 text-xs text-white hover:bg-none md:hover:bg-slate-500">
                            <i class="ri-clipboard-line me-1"></i>Copy</button>
                    </div>
                    <p class="text-sm text-[#64748B]">
                        an Ratna Wijayanti
                    </p>
                </div>

                <div id="div_bni" style="display: none" class="mt-2 rounded-lg border p-3">
                    <h3 class="mb-1 text-sm font-bold">Bank BNI</h3>
                    <div class="flex items-center gap-1">
                        <p class="text-xl font-bold text-blue-600">1867489837</p>
                        <button id="copyButton9" onclick="copyToClipboard(event, '1867489837')"
                            class="ms-1 h-fit rounded-sm bg-slate-400 px-1.5 py-1 text-xs text-white hover:bg-none md:hover:bg-slate-500">
                            <i class="ri-clipboard-line me-1"></i>Copy</button>
                    </div>
                    <p class="text-sm text-[#64748B]">
                        an Ratna Wijayanti
                    </p>
                </div>
                   
                @elseif ($dataDariShow->jenis == 'slidecenter')
                    <div id="div_mandiri" style="display: none" class="mt-2 rounded-lg border p-3">
                        <h3 class="mb-1 text-sm font-bold">Bank Mandiri</h3>
                        <div class="flex items-center gap-1">
                            <p class="text-xl font-bold text-blue-600">136003184448</p>
                            <button id="copyButton13" onclick="copyToClipboard(event, '136003184448')"
                                class="ms-1 h-fit rounded-sm bg-slate-400 px-1.5 py-1 text-xs text-white hover:bg-none md:hover:bg-slate-500">
                                <i class="ri-clipboard-line me-1"></i>Copy</button>
                        </div>
                        <p class="text-sm text-[#64748B]">
                            an Lawu Arunawang
                        </p>
                    </div>
                    <div id="div_bri" style="display: none" class="mt-2 rounded-lg border p-3">
                        <h3 class="mb-1 text-sm font-bold">Bank BRI</h3>
                        <div class="flex items-center gap-1">
                            <p class="text-xl font-bold text-blue-600">127001019552507</p>
                            <button id="copyButton14" onclick="copyToClipboard(event, '127001019552507')"
                                class="ms-1 h-fit rounded-sm bg-slate-400 px-1.5 py-1 text-xs text-white hover:bg-none md:hover:bg-slate-500">
                                <i class="ri-clipboard-line me-1"></i>Copy</button>
                        </div>
                        <p class="text-sm text-[#64748B]">
                            an Lawu Arunawang
                        </p>
                    </div>
                    <div id="div_bni" style="display: none" class="mt-2 rounded-lg border p-3">
                        <h3 class="mb-1 text-sm font-bold">Bank BNI</h3>
                        <div class="flex items-center gap-1">
                            <p class="text-xl font-bold text-blue-600">1816308863</p>
                            <button id="copyButton15" onclick="copyToClipboard(event, '1816308863')"
                                class="ms-1 h-fit rounded-sm bg-slate-400 px-1.5 py-1 text-xs text-white hover:bg-none md:hover:bg-slate-500">
                                <i class="ri-clipboard-line me-1"></i>Copy</button>
                        </div>
                        <p class="text-sm text-[#64748B]">
                            an Lawu Arunawang
                        </p>
                    </div>
                @else
                    <div id="div_mandiri" style="display: none" class="mt-2 rounded-lg border p-3">
                        <h3 class="mb-1 text-sm font-bold">Bank Mandiri</h3>
                        <div class="flex items-center gap-1">
                            <p class="text-xl font-bold text-blue-600">136003184448</p>
                            <button id="copyButton16" onclick="copyToClipboard(event, '136003184448')"
                                class="ms-1 h-fit rounded-sm bg-slate-400 px-1.5 py-1 text-xs text-white hover:bg-none md:hover:bg-slate-500">
                                <i class="ri-clipboard-line me-1"></i>Copy</button>
                        </div>
                        <p class="text-sm text-[#64748B]">
                            an Lawu Arunawang
                        </p>
                    </div>
                    <div id="div_bri" style="display: none" class="mt-2 rounded-lg border p-3">
                        <h3 class="mb-1 text-sm font-bold">Bank BRI</h3>
                        <div class="flex items-center gap-1">
                            <p class="text-xl font-bold text-blue-600">127001019552507</p>
                            <button id="copyButton17" onclick="copyToClipboard(event, '127001019552507')"
                                class="ms-1 h-fit rounded-sm bg-slate-400 px-1.5 py-1 text-xs text-white hover:bg-none md:hover:bg-slate-500">
                                <i class="ri-clipboard-line me-1"></i>Copy</button>
                        </div>
                        <p class="text-sm text-[#64748B]">
                            an Lawu Arunawang
                        </p>
                    </div>
                    <div id="div_bni" style="display: none" class="mt-2 rounded-lg border p-3">
                        <h3 class="mb-1 text-sm font-bold">Bank BNI</h3>
                        <div class="flex items-center gap-1">
                            <p class="text-xl font-bold text-blue-600">1816308863</p>
                            <button id="copyButton18" onclick="copyToClipboard(event, '1816308863')"
                                class="ms-1 h-fit rounded-sm bg-slate-400 px-1.5 py-1 text-xs text-white hover:bg-none md:hover:bg-slate-500">
                                <i class="ri-clipboard-line me-1"></i>Copy</button>
                        </div>
                        <p class="text-sm text-[#64748B]">
                            an Lawu Arunawang
                        </p>
                    </div>
                @endif

                <div>
                    <div>
                        <label class="mb-2 mt-3 block font-semibold text-[#64748B]">Nama</label>
                        <input
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                            type="text" class="form-control" placeholder="{{ $dataDariForm['nama'] }}" disabled>
                    </div>

                    <div>
                        <label class="mb-2 mt-3 block font-semibold text-[#64748B]">Email</label>
                        <input
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                            type="text" class="form-control" placeholder="{{ $dataDariForm['email'] }}" disabled>
                    </div>
                    {{-- {{ dd($dataDariForm) }} --}}
                    <div>
                        <label class="mb-2 mt-3 block font-semibold text-[#64748B]">Sertifikat Untuk</label>
                        <input
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                            type="text" class="form-control" placeholder="{{ $dataDariShow->judul }}" disabled>
                    </div>
                    <div>
                        <label for="image1" class="mb-2 mt-3 block font-semibold text-[#64748B]">Upload Bukti
                            transfer</label>
                        <span
                            class="mb-2 block rounded border border-blue-300 bg-[#EBF5FF] px-1.5 py-1.5 text-xs font-medium text-blue-800">
                            <i class="ri-information-line"></i> Ukuran file maksimal 1 MB</a></span>
                        <Input
                            class="form-control block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 file:me-4 file:border-0 file:bg-[##64748B] file:px-3 file:py-2.5 focus:outline-none disabled:pointer-events-none disabled:opacity-50 dark:text-gray-400"
                            type="file" id="image1" name="image1">
                    </div>
                    <div>
                        <label for="nominal" class="mb-2 mt-3 block font-semibold text-[#64748B]">Jumlah Nominal</label>
                        <input type="number" min="0" step="1"
                            class="form-control block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                            id="nominal" name="nominal" placeholder="Masukan Nominal">
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
    <script>
        const copiedText = '<i class="ri-check-line me-1"></i>Berhasil';
        const originalText = '<i class="ri-clipboard-line me-1"></i>Copy';

        function copyToClipboard(event, textToCopy) {
            // Prevent the form from being submitted
            event.preventDefault();

            // Try copying text using the Clipboard API
            if (navigator.clipboard && window.isSecureContext) {
                navigator.clipboard.writeText(textToCopy).then(function() {
                    handleCopySuccess(event.target);
                }).catch(function(error) {
                    console.error("Failed to copy text: ", error);
                    alert('Copying failed, please try manually.');
                });
            } else {
                // Fallback for older browsers or insecure contexts
                fallbackCopyTextToClipboard(textToCopy, event.target);
            }
        }

        // Fallback method to copy text (for older browsers or insecure contexts)
        function fallbackCopyTextToClipboard(text, button) {
            const textArea = document.createElement("textarea");
            textArea.value = text;

            // Make the textarea element out of viewport
            textArea.style.position = "fixed";
            textArea.style.top = "-9999px";
            document.body.appendChild(textArea);
            textArea.focus();
            textArea.select();

            try {
                const successful = document.execCommand('copy');
                if (successful) {
                    handleCopySuccess(button);
                } else {
                    alert('Copying failed, please try manually.');
                }
            } catch (err) {
                console.error("Fallback: Unable to copy", err);
                alert('Copying failed, please try manually.');
            }

            document.body.removeChild(textArea);
        }

        // Function to handle successful copy
        function handleCopySuccess(button) {
            // Add bg-green-500 class and change button text to "Berhasil Copy"
            button.innerHTML = copiedText;
            button.classList.add('bg-green-600');
            button.classList.remove('bg-slate-400');

            // Revert button text back to the original and remove bg-green-500 class after a delay
            setTimeout(function() {
                button.innerHTML = originalText;
                button.classList.remove('bg-green-600');
                button.classList.add('bg-slate-400');
                button.disabled = false; // Re-enable the button if it was disabled
            }, 2000); // 2 seconds delay
        }
    </script>
@endsection
