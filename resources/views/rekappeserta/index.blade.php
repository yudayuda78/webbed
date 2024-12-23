@extends('home.home-layouts.home-main-tw')
@section('container')
    <div class="md:pb-13 bg-[url(/img/ui/bg-sertif.png)] pb-8">
        @include('home.home-layouts.tw-home-navbar')
        <div class="mx-auto max-w-[90%] pt-5 md:max-w-main md:pt-5">
            <p class="md:text-lg text-base text-[#64748B]">Rekap Peserta</p>
            <p class="md:text-xl text-lg font-bold">Rekap Peserta Free Diklat 32JP : Merancang Aksi Nyata dalam Pelatihan Mandiri di Platform Merdeka Mengajar (1-4 Maret 2024)
            </p>
        </div>
    </div>
    {{-- <div id="divToHide" class="bg-[#1B7BE7] py-8">
        <div class="mx-auto flex max-w-[90%] flex-col justify-between gap-4 md:max-w-main md:flex-row md:items-center">
            <div>
                <i class="ri-file-download-line rounded-full bg-white p-3 text-xl text-[#1B7BE7] md:text-3xl"></i>
                <h3 class="mt-5 max-w-96 text-xl leading-snug text-white md:text-4xl">Masih Bingung Cara Download Sertifikat?
                    <b>Tonton Video Ini!</b></h3>
                    <button id="hideButton" class="mt-3 rounded-lg bg-white px-3 py-2 text-sm font-medium text-black hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Sudah Mengerti</button>
            </div>
            <div class="w-full md:h-[395px] md:w-[702px]">
                <iframe class="aspect-video w-full rounded-2xl" src="https://www.youtube.com/embed/RMSJcOzb_Co"
                    title="Cara Terbaru Download Sertifikat Kegiatan Belajar Era Digital" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
            </div>
        </div>
    </div> --}}
    <div class="mx-auto max-w-[90%] md:max-w-main mt-6 mb-2 flex justify-between flex-col md:flex-row gap-7">
        <div class="md:w-[789px] w-full">
            <form class="flex gap-2 mb-5" action="{{ route('searchrekap') }}" method="GET">
                <input class="form-control block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" type="search" name="search" placeholder="Cari nama anda disini">
                <button class="rounded-lg bg-[#196ECD] px-4 py-2.5 text-base font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">Cari</button>
            </form>
            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="inline-block min-w-full p-1.5 align-middle">
                        <div class="overflow-hidden rounded-md border">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr class="bg-[#F9FAFB]">
                                        <th scope="col" class="py-3 pl-6 text-start text-sm font-bold">No</th>
                                        <th scope="col" class="px-3 py-3 text-start text-sm font-bold">Nama</th>
                                        <th scope="col" class="px-3 py-3 text-start text-sm font-bold">Instansi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @foreach ($datas as $data)
                                        <tr>
                                            <td class="whitespace-nowrap py-3 pl-6 text-sm font-medium text-[#64748B]">
                                                {{ $data->id }}</td>
                                            <td class="max-w-72 px-3 py-3 text-sm font-medium text-[#64748B]">
                                                {{ $data->nama }}</td>
                                            <td class="p max-w-72 px-3 py-3 text-sm font-medium text-[#64748B]">
                                                {{ $data->instansi }}</td>
                                           
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{ $datas->withQueryString()->links() }}
                </div>
            </div>
        </div>
        <div class="max-w-[350px]">
            <a href="https://bacakembali.com" target="_blank"><img class="mb-5 border rounded-lg" src="/img/ui/ticykitbanner3.jpg"></a>
            <a href="/ticykit" target="_blank"><img class="mb-5 border rounded-lg" src="/img/ui/ticykitbanner2.jpg"></a>
        </div>
    </div>
    {{-- <div class="mx-auto max-w-[90%] md:max-w-main">
        <h1 class="font-bold text-xl">Ayo Ikuti Kegiatan Selanjutnya</h1>
    </div>
    <div class="mx-auto grid max-w-[90%] grid-cols-1 justify-between gap-5 pb-10 pt-3 md:max-w-main md:grid-cols-3">
        @foreach ($rekomendasi as $isi)
            <div class="max-w-[378px]">
                <a href="/event/{{ $isi->slug }}"><img class="rounded-[10px]" src="/img/{{ $isi->image }}"></a>
                <p class="pb-1 pt-3 text-[#64748B]">{{ $isi->oleh }}</p>
                <a href="/event/{{ $isi->slug }}">
                    <h1 class="pb-1 text-lg font-bold leading-snug">{{ $isi->judul }}</h1>
                </a>
                <p class="pb-1 text-[#64748B]">{{ $isi->tanggalpelaksanaan }}</p>
                
            </div>
        @endforeach
    </div> --}}
    @include('home.home-layouts.tw-home-footer')
    <script>
        document.getElementById("hideButton").addEventListener("click", function(){
          document.getElementById("divToHide").classList.add("hidden");
        });
    </script>

@endsection