@extends('home.home-layouts.home-main-tw')
@section('container')
    <div class="md:pb-13 bg-[url(/img/ui/bg-sertif.png)] pb-8">
        @include('home.home-layouts.tw-home-navbar')
        <div class="mx-auto max-w-[90%] pt-5 md:max-w-main md:pt-5">
            <p class="md:text-lg text-base text-[#64748B]">Verifikasi Sertifikat</p>
            <p class="md:text-xl text-lg font-bold">{{ $datas->kegiatan }}</p>
        </div>
    </div>
    <div class="mx-auto max-w-[90%] md:max-w-main mt-6 mb-7 flex justify-between flex-col md:flex-row gap-7">
        <div class="md:w-[789px] w-full">
            <div class="bg-[#EBF5FF] p-7 rounded-lg mb-5">
                <h3 class="font-bold text-xl mb-2">Verifikasi Sertifikat ✨</h3>
                <p class="text-[#64748B]">Verifikasi ini bertujuan untuk memastikan keabsahan dan keandalan sertifikat yang dimaksud serta untuk memenuhi kebutuhan administratif atau profesional yang terkait.</p>
                {{-- <a href="/cekpendaftaran" type="submit" name="absen"
                    class="mb-2 mt-3 rounded-lg bg-[#196ECD] px-3 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300"
                    value="LOGIN">Cek Daftar Peserta disini</a> --}}
            </div>
            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="inline-block min-w-full p-1.5 align-middle">
                        <div class="overflow-hidden rounded-md border">
                            <table class="min-w-full divide-y divide-gray-200">
                                <tbody class="divide-y divide-gray-200">
                                    <tr>
                                        <td class="whitespace-nowrap border-r py-3 pl-3 pr-3 md:pl-6 font-medium text-[#64748B]">
                                            Nama</td>
                                        <td class="max-w-72 px-3 py-3 md:px-6 font-medium text-[#64748B]">
                                            {{ $datas->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td class="whitespace-nowrap border-r py-3 pl-3 pr-3 md:pl-6 font-medium text-[#64748B]">
                                            No. Daftar</td>
                                        <td class="max-w-72 px-3 py-3 md:px-6 font-medium text-[#64748B]">
                                            {{ $datas->nomorpendaftaran }}</td>
                                    </tr>
                                    <tr>
                                        <td class="whitespace-nowrap border-r py-3 pl-3 pr-3 md:pl-6 font-medium text-[#64748B]">
                                            Instansi</td>
                                        <td class="max-w-72 px-3 py-3 md:px-6 font-medium text-[#64748B]">
                                            {{ $datas->instansi }}</td>
                                    </tr>
                                    <tr>
                                        <td class="whitespace-nowrap border-r py-3 pl-3 pr-3 md:pl-6 font-medium text-[#64748B]">
                                            Kegiatan</td>
                                        <td class="max-w-72 px-3 py-3 md:px-6 font-medium text-[#64748B]">
                                            {{ $datas->kegiatan }}</td>
                                    </tr>
                                    <tr>
                                        <td class="whitespace-nowrap border-r py-3 pl-3 pr-3 md:pl-6 font-medium text-[#64748B]">
                                            QR Code</td>
                                        <td class="max-w-72 px-3 py-3 md:px-6 font-medium text-[#64748B]">
                                            {!! QrCode::size(100)->generate($url) !!}</td>
                                    </tr>
                                    <tr>
                                        <td class="whitespace-nowrap border-r py-3 pl-3 pr-3 md:pl-6 font-medium text-[#64748B]">
                                            Status</td>
                                        <td class="max-w-72 px-3 py-3 md:px-6 font-medium text-white">
                                            <span class="bg-green-500 py-1 px-3 rounded-md"><i class="ri-file-check-fill"></i> Terverifikasi</td></span>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-[350px]">
            <a href="https://bacakembali.com" target="_blank"><img class="mb-5 border rounded-lg" src="/img/ui/ticykitbanner3.jpg"></a>
            <a href="/ticykit" target="_blank"><img class="mb-5 border rounded-lg" src="/img/ui/ticykitbanner2.jpg"></a>
        </div>
    </div>
    @include('home.home-layouts.tw-home-footer')
@endsection





