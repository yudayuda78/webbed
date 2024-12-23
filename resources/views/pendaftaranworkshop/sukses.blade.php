@extends('home.home-layouts.home-main-tw')
@section('container')
    <div class="md:pb-13 bg-[url(/img/ui/bg-sertif.png)] pb-8">
        @include('home.home-layouts.tw-home-navbar')
        <div class="mx-auto max-w-[90%] pt-10 md:max-w-main md:pt-5">
            <p class="text-base text-[#64748B] md:text-lg">Pendaftaran Diklat Sukses!</p>
            <p class="text-lg font-bold md:text-xl">{{ $dataDariShow->judul }}</p>
        </div>
    </div>
    <div class="mx-auto mb-10 mt-6 flex max-w-[90%] flex-col justify-between gap-7 md:max-w-main md:flex-row">
        <div class="w-full">
            <div class="flex flex-col items-center gap-5 rounded-lg bg-[#EBF5FF] p-7 md:flex-row">
                <img class="h-auto max-w-[300px] object-contain pt-5 md:mx-5 md:pt-0" src="/img/ui/Telecommuting-rafiki.png"
                    alt="Example Image">
                <div>
                    <h3 class="mb-1.5 text-xl font-bold md:text-2xl">Pendaftaran Berhasil!</h3>
                    <p class="text-base">
                        Pendaftaran {{ $dataDariShow->judul }} anda berhasil! Silahkan masuk grup agar anda dapat
                        mengikuti informasi kegiatan, pembagian fasilitas dan sertifikat pada link berikut:
                    </p>
                    <a href="{{ $dataDariShow->linktree }}"><button type="button"
                            class="my-2 me-2 rounded-lg bg-[#196ECD] px-3 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i
                                class="ri-whatsapp-line"></i> Gabung Grup</button>
                    </a>
                    <p class="text-lg font-bold">Kontak dan Sosial Media</p>
                    <div class="mt-1.5 flex flex-col gap-1.5 text-center md:flex-row">
                        <a href="https://t.me/eventBED" target="_blank"
                            class="w-full rounded-full border border-[#196ECD] px-3 py-1 text-sm hover:bg-blue-200 md:w-fit">
                            <i class="ri-telegram-line text-[#196ECD]"></i> Channel Telegram
                        </a>
                        <a href="https://instagram.com/belajarera.digital" target="_blank"
                            class="w-full rounded-full border border-[#196ECD] px-3 py-1 text-sm hover:bg-blue-200 md:w-fit">
                            <i class="ri-instagram-line text-orange-400"></i> Instagram
                        </a>
                        <a href="https://www.youtube.com/@BelajarEraDigital" target="_blank"
                            class="w-full rounded-full border border-[#196ECD] px-3 py-1 text-sm hover:bg-blue-200 md:w-fit">
                            <i class="ri-youtube-line text-red-500"></i> YouTube
                        </a>
                        <a href="https://linktr.ee/adminbed" target="_blank"
                            class="w-full rounded-full border border-[#196ECD] px-3 py-1 text-sm hover:bg-blue-200 md:w-fit">
                            <i class="ri-customer-service-2-line text-[#196ECD]"></i> Layanan Admin
                        </a>
                    </div>
                    {{-- <h4 class="mt-2 font-bold">Untuk informasi lebih lanjut terkait Fasilitas dan Sertifikat kegiatan,
                        silahkan bergabung ke Channel Telegram
                    </h4>
                    <a class="font-bold text-[#196ECD]" href="{{ $dataDariShow->telegram }}"
                        target="_blank">{{ $dataDariShow->telegram }}</a><br>
                    <a class="font-bold text-[#196ECD]" href="{{ $dataDariShow->linktree }}"
                        target="_blank">{{ $dataDariShow->linktree }}</a><br> --}}

                    {{-- <h4 class="mt-2 text-lg font-bold">Silahkan kunjungi media sosial kami:</h4>
                    Telegram : <a class="font-bold text-[#196ECD]" href="https://t.me/eventBED"
                        target="_blank">https://t.me/eventBED</a> <br>
                    Instagram : <a class="font-bold text-[#196ECD]" href="https://instagram.com/belajarera.digital"
                        target="_blank">https://instagram.com/belajarera.digital</a><br>
                    Youtube : <a class="font-bold text-[#196ECD]" href="https://www.youtube.com/@BelajarEraDigital"
                        target="_blank">https://www.youtube.com/@BelajarEraDigital</a><br>
                    Layanan Admin : <a class="font-bold text-[#196ECD]" href="https://linktr.ee/adminbed"
                        target="_blank">https://linktr.ee/adminbed</a><br>
                    Website : <a class="font-bold text-[#196ECD]" href="https://belajareradigital.com/"
                        target="_blank">https://belajareradigital.com/</a> <br> --}}

                    <!-- Tampilkan pesan sukses -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
        {{-- <div class="max-w-[350px]">
            <a href="https://bacakembali.com" target="_blank"><img class="mb-5 rounded-lg border"
                    src="/img/ui/ticykitbanner3.jpg"></a>
            <a href="/ticykit" target="_blank"><img class="mb-5 rounded-lg border" src="/img/ui/ticykitbanner2.jpg"></a>
        </div> --}}
    </div>

    <!-- Modal -->
    <div id="buttonModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="flex min-h-screen items-center justify-center px-4 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:h-screen sm:align-middle">&#8203;</span>
            <div
                class="inline-block transform overflow-hidden rounded-lg bg-white p-6 text-left align-bottom shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-md sm:align-middle">

                <button type="button" onclick="closeModal()"
                    class="absolute end-2.5 top-3 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="progress-modal">
                    <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div>
                    <img class="mx-auto mb-1 h-auto max-w-[350px]" src="/img/ui/leader-pana.svg">
                    <h3 class="mb-1 text-xl font-bold text-gray-900 dark:text-white">Pendaftaran Berhasil</h3>
                    <p class="mb-2 text-gray-500 dark:text-gray-400">
                        Silahkan masuk grup agar anda dapat mengikuti informasi kegiatan, pembagian fasilitas dan sertifikat
                        pada link berikut:
                    <p>
                    <div class="mt-3 flex items-center space-x-4 rtl:space-x-reverse">
                        <a href="{{ $dataDariShow->linktree }}">
                            <button data-modal-hide="progress-modal" type="button"
                                class="rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i
                                    class="ri-whatsapp-line"></i> Gabung Grup</button>
                        </a>
                    </div>
                </div>

                {{-- <div class="bg-white">
                    <p class="text-lg font-bold">Ayo bergabung dalam grup kegiatan!</p>
                </div>
                <a href="{{ $dataDariShow->linktree }}" target="_blank">
                    <button type="button"
                        class="inline-flex w-full justify-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">
                        Gabung
                    </button>
                </a> --}}
            </div>
        </div>
    </div>
    <div class="bg-gray-50">
        <div class="mx-auto max-w-main">
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9697129609724227"
                crossorigin="anonymous"></script>
            <!-- Horizontal Pendaftaran -->
            <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-9697129609724227"
                data-ad-slot="6229090058" data-ad-format="auto" data-full-width-responsive="true"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                document.getElementById('buttonModal').classList.remove('hidden');
            }, 0);
        });

        function closeModal() {
            document.getElementById('buttonModal').classList.add('hidden');
        }
    </script>

    @include('home.home-layouts.tw-home-footer')
@endsection
