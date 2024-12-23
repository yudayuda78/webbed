@extends('home.home-layouts.home-main-tw')
@section('container')
    <div class="md:pb-13 bg-[url(/img/ui/bg-sertif.png)] pb-8">
        @include('home.home-layouts.tw-home-navbar')
        <div class="mx-auto max-w-[90%] pt-10 md:max-w-main md:pt-5">
            <p class="text-base text-[#64748B] md:text-lg">Pendaftaran Diklat Sukses!</p>
            <p class="text-lg font-bold md:text-xl">{{ $dataDariShow->judul }}</p>
        </div>
    </div>
    <div class="m~ax-w-[90%] mx-auto mb-10 mt-6 flex flex-col justify-between gap-7 md:max-w-main md:flex-row">
        <div class="w-full md:w-[789px]">
            <div class="rounded-lg bg-[#EBF5FF] p-7">
                <h3 class="mb-2 text-xl font-bold">PENTING!🚨</h3><br>
                <b>Pendaftaran Webinar BERHASIL! (Silakan screenshoot tampilan ini sebagai bukti sudah mendaftar)
                </b>

                <p>
                    Pendaftaran {{ $dataDariShow->judul }} anda berhasil! Silahkan masuk grup agar anda dapat mengikuti
                    informasi kegiatan, pembagian fasilitas dan sertifikat:</p>

                <h4 class="mt-2 text-lg font-bold">Grup Diskusi Kegiatan 👇👇👇</h4>
                <a class="font-bold text-[#196ECD]"
                    href="https://linktr.ee/WebinarSeriesBEDSC
                    ">https://linktr.ee/WebinarSeriesBEDSC
                </a><br>

                <h4 class="mt-2 text-lg font-bold">Komunitas PMM Belajar Era Digital</h4>
                <a class="font-bold text-[#196ECD]"
                    href="https://bit.ly/KomunitasPMMBED">https://bit.ly/KomunitasPMMBED</a><br>

                <h4 class="mt-2 text-lg font-bold">Silahkan kunjungi media sosial kami:</h4>
                Telegram : <a class="font-bold text-[#196ECD]" href="https://t.me/eventBED">https://t.me/eventBED</a> <br>
                Instagram : <a class="font-bold text-[#196ECD]"
                    href="https://instagram.com/belajarera.digital">https://instagram.com/belajarera.digital</a><br>
                Youtube : <a class="font-bold text-[#196ECD]"
                    href="https://www.youtube.com/@BelajarEraDigital">https://www.youtube.com/@BelajarEraDigital</a><br>
                Layanan Admin : <a class="font-bold text-[#196ECD]"
                    href="{{ $dataDariShow->judul }}">{{ $dataDariShow->judul }}/a><br>
                Website : <a class="font-bold text-[#196ECD]"
                    href="https://belajareradigital.com/">https://belajareradigital.com/</a> <br>

                <!-- Tampilkan pesan sukses -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Tambahkan elemen atau tautan ke halaman lain jika diperlukan -->
                </p>
                <a href="/cekpendaftaran" type="submit" name="absen"
                    class="mb-2 mt-3 rounded-lg bg-[#196ECD] px-3 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300"
                    value="LOGIN">Cek Daftar Peserta disini</a>
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
            <a href="https://bacakembali.com" target="_blank"><img class="mb-5 rounded-lg border"
                    src="/img/ui/ticykitbanner3.jpg"></a>
            <a href="/ticykit" target="_blank"><img class="mb-5 rounded-lg border" src="/img/ui/ticykitbanner2.jpg"></a>
        </div>
    </div>
    @include('home.home-layouts.tw-home-footer')
@endsection
