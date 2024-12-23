@extends('home.home-layouts.home-main-tw')
@section('container')
    <div class="md:pb-13 bg-[url(/img/ui/bg-sertif.png)] pb-8">
        @include('home.home-layouts.tw-home-navbar')
        <div class="mx-auto max-w-[90%] pt-10 md:max-w-main md:pt-5">
            <p class="md:text-lg text-base text-[#64748B]">Event Diklat Ditutup!</p>
            <p class="md:text-xl text-lg font-bold">{{ $event->judul }}</p>
        </div>
    </div>
    <div class="mx-auto m~ax-w-[90%] md:max-w-main mt-6 mb-10 flex justify-between flex-col md:flex-row gap-7">
        <div class="md:w-[789px] w-full">
            <div class="bg-[#EBF5FF] p-7 rounded-lg">
                <h3 class="font-bold text-xl mb-2">PENTING!🚨</h3><br>
                <b>Event Ditutup
                </b>

                {{-- <p>
                    Silahkan masuk grup agar anda dapat mengikuti
                    informasi kegiatan, pembagian fasilitas dan sertifikat:</p>

                <h4 class="text-lg font-bold mt-2">Grup Diskusi Kegiatan 👇👇👇</h4>
                <a class="text-[#196ECD] font-bold"
                    href="{{ $pendaftaran->telegram }}
                    ">{{ $pendaftaran->telegram }}
                </a><br>

                @if (!empty($data->pmm))
                    <h4 class="text-lg font-bold mt-2">Komunitas PMM Belajar Era Digital</h4>
                    <a class="text-[#196ECD] font-bold"
                        href="{{ $pendaftaran->pmm }}">{{ $pendaftaran->pmm }}</a><br>
                @endif --}}

                <h4 class="text-lg font-bold mt-2">Silahkan kunjungi media sosial kami:</h4>
                Telegram : <a class="text-[#196ECD] font-bold" href="https://t.me/eventBED">https://t.me/eventBED</a> <br>
                Instagram : <a class="text-[#196ECD] font-bold"
                    href="https://instagram.com/belajarera.digital">https://instagram.com/belajarera.digital</a><br>
                Youtube : <a class="text-[#196ECD] font-bold"
                    href="https://www.youtube.com/@BelajarEraDigital">https://www.youtube.com/@BelajarEraDigital</a><br>
                Layanan Admin : <a class="text-[#196ECD] font-bold"
                    href="{{ $event->linktree }}">{{ $event->linktree }}</a><br>
                Website : <a class="text-[#196ECD] font-bold"
                    href="https://belajareradigital.com/">https://belajareradigital.com/</a> <br>

                <!-- Tampilkan pesan sukses -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Tambahkan elemen atau tautan ke halaman lain jika diperlukan -->
                </p>
                {{-- <a href="/cekpendaftaran" type="submit" name="absen"
                    class="mb-2 mt-3 rounded-lg bg-[#196ECD] px-3 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300"
                    value="LOGIN">Cek Daftar Peserta disini</a> --}}
                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9697129609724227"
                    crossorigin="anonymous"></script>
                <ins class="adsbygoogle" style="display:block; text-align:center;" data-ad-layout="in-article"
                    data-ad-format="fluid" data-ad-client="ca-pub-9697129609724227" data-ad-slot="1581340639"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
        </div>
        <div class="max-w-[350px]">
            <a href="https://bacakembali.com" target="_blank"><img class="mb-5 border rounded-lg"
                    src="/img/ui/ticykitbanner3.jpg"></a>
            <a href="/ticykit" target="_blank"><img class="mb-5 border rounded-lg" src="/img/ui/ticykitbanner2.jpg"></a>
        </div>
    </div>
    @include('home.home-layouts.tw-home-footer')
@endsection
