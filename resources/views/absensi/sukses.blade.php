@extends('home.home-layouts.home-main-tw')
@section('container')
    <div class="md:pb-13 bg-[url(/img/ui/bg-sertif.png)] pb-8">
        @include('home.home-layouts.tw-home-navbar')
        <div class="mx-auto max-w-[90%] pt-10 md:max-w-main md:pt-5">
            <p class="md:text-lg text-base text-[#64748B]">Presensi Sukses!</p>
            <p class="md:text-xl text-lg font-bold">{{ $dataDariShow->judul }}</p>
        </div>
    </div>
    <div class="mx-auto m~ax-w-[90%] md:max-w-main mt-6 mb-10 flex justify-between flex-col md:flex-row gap-7">
        <div class="md:w-[789px] w-full">
            <div class="bg-[#EBF5FF] p-7 rounded-lg">
                <h3 class="font-bold text-xl mb-2">Data berhasil disimpan ✨</h3>
                <p>
                    {{ $dataDariShow->judul }} anda berhasil tersimpan!</p>
                Untuk informasi lebih lanjut terkait Fasilitas dan sertifikat kegiatan silahkan bergabung dalam
                saluran whatsapp kami</p>

                <h4 class="text-lg font-bold mt-2">Grup Diskusi</h4>
                <a class="text-[#196ECD] font-bold"
                    href="{{ $dataDariShow->linktree }}">{{ $dataDariShow->linktree }}</a><br>

                <h4 class="text-lg font-bold mt-2">Grup Telegram</h4>
                <a class="text-[#196ECD] font-bold"
                    href="{{ $dataDariShow->telegram }}">{{ $dataDariShow->telegram }}</a><br>


                <!-- Tampilkan pesan sukses -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Tambahkan elemen atau tautan ke halaman lain jika diperlukan -->
                </p>
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
