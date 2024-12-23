{{-- @dd($modulAjar) --}}
@extends('home.home-layouts.home-main-tw')
@section('container')
<x-ticykit.navbar />
<div class="p-5 bg-white"></div>
<div class="py-10 bg-ticykit-bg">
    <div class="md:px-12 px-0 mx-auto max-w-[90%] md:max-w-main flex flex-col gap-10">
        <div class="flex flex-col items-center gap-1 text-center">
            <h2 class="text-3xl text-black">Detail Modul Ajar Saya <span class="font-bold">{{ $modulAjar->namaModul }}</span></h2>
            <p class="w-full text-sm md:max-w-xl max-w-64 md:text-base text-secondary">Open-source neutral-style system symbols elaborately crafted
                for designers and developers.</p>
        </div>
    </div>
</div>
<div class="pt-10 pb-20 bg-white ">
    <div class="mx-auto max-w-[90%] md:max-w-4xl flex flex-col gap-5">
        @include('home.home-layouts.tw-navbar-modulajar')
            <h5 class="text-2xl font-bold">{{ $modulAjar->namaModul ?? 'Tidak Ada Nama Modul' }}</h5>
            <div class="grid h-full grid-cols-1 gap-3 md:grid-cols-2 md:h-80">
                <table class="w-full text-left">
                    <tbody class="space-y-2">
                        <tr class="py-1.5">
                            <td>
                                <label for="kodeModul">Kode Modul</label>
                            </td>
                            <td>:</td>
                            <td>
                                <h3 >{{ $modulAjar->kodeModul ?? 'Tidak Ada kode Modul' }}</h3>
                            </td>
                        </tr>
                        <tr class="py-1.5">
                            <td><label for="penyusun">Penyusun</label></td>
                            <td>:</td>
                            <td> <h3 >{{ $modulAjar->penyusun ?? 'Tidak Ada penyusun' }}</h3></td>
                        </tr>
                        <tr class="py-1.5">
                            <td><label for="tahun">Tahun</label></td>
                            <td>:</td>
                            <td>
                                <h3 =>{{ $modulAjar->tahun ?? 'Tidak Ada tahun' }}</h3>
                            </td>
                        </tr>
                        <tr class="py-1.5">
                            <td><label for="kelas">Kelas</label></td>
                            <td>:</td>
                            <td>
                                <h3 >{{ $modulAjar->kelas ?? 'Tidak Ada kelas' }}</h3>
                            </td>
                        </tr>
                        <tr class="py-1.5">
                            <td>Fase Capaian</td>
                            <td>:</td>
                            <td>
                                <h3 >{{ $modulAjar->faseCapaian ?? 'Tidak Ada fase Capaian' }}</h3>
                            </td>
                        </tr>
                        <tr class="py-1.5">
                            <td><label for="elemen">Elemen</label></td>
                            <td>:</td>
                            <td>
                                <h3 >{{ $modulAjar->elemen ?? 'Tidak Ada elemen' }}</h3>
                            </td>
                        </tr>
                        <tr class="py-1.5">
                            <td><label for="alokasiWaktu">Alokasi Waktu</label></td>
                            <td>:</td>
                            <td>
                                <h3 >{{ $modulAjar->alokasiWaktu ?? 'Tidak Ada Alokasi waktu' }}</h3>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="w-full text-left">
                    <tbody class="space-y-4">
                        <tr class="py-1.5">
                            <td><label for="pertemuan">Pertemuan ke</label></td>
                            <td>:</td>
                            <td>
                                <h3 >{{ $modulAjar->pertemuan ?? 'Tidak Ada pertemuan' }}</h3>
                            </td>
                        </tr>
                        <tr class="py-1.5">
                            <td><label for="profilPelajarPancasila">Profil Pelajar Pancasila</label></td>
                            <td>:</td>
                            <td>
                                <h3>{{ $modulAjar->profilPelajarPancasila ?? 'Tidak Ada profil Pelajar Pancasila' }}</h3>
                            </td>
                        </tr>
                        <tr class="py-1.5">
                            <td><label for="saranaPrasarana">Sarana Prasarana</label></td>
                            <td>:</td>
                            <td>
                                <h3>{{ $modulAjar->saranaPrasarana ?? 'Tidak Ada sarana Prasarana' }}</h3>
                            </td>
                        </tr>
                        <tr class="py-1.5">
                            <td><label for="targetPesertaDidik">Target Peserta Didik</label></td>
                            <td>:</td>
                            <td>
                                <h3 >{{ $modulAjar->targetPesertaDidik ?? 'Tidak Ada target Peserta Didik' }}</h3>
                            </td>
                        </tr>
                        <tr class="py-1.5">
                            <td><label for="modelPembelajaran">Model Pembelajaran</label></td>
                            <td >:</td>
                            <td>
                                <h3>{{ $modulAjar->modelPembelajaran ?? 'Tidak Ada model Pembelajaran' }}</h3>
                            </td>
                        </tr>
                        <tr class="py-1.5">
                            <td><label for="modePembelajaran">Mode Pembelajaran</label></td>
                            <td>:</td>
                            <td>
                                <h3>{{ $modulAjar->modePembelajaran ?? 'Tidak Ada modePembelajaran' }}</h3>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div>
                <div class="w-full bg-gray-300 border-2 border-black/10">
                    <label for="tujuanPembelajaran" class="px-2">Tujuan Pembelajaran</label>
                </div>
                <div class="flex flex-col gap-1 p-2 border-2 border-black/10">
                    <h4>{{ strip_tags($modulAjar->tujuanPembelajaran) }}</h4>
                </div>
            </div>
            <div>
                <div class="w-full bg-gray-300 border-2 border-black/10">
                    <label for="pertanyaanPemantik" class="px-2">Pertanyaan Pemantik</label>
                </div>
                <div class="flex flex-col gap-1 p-2 border-2 border-black/10">
                    <h4>{{ strip_tags($modulAjar->pertanyaanPemantik) }}</h4>
                </div>
            </div>
            <div>
                <div class="w-full bg-gray-300 border-2 border-black/10">
                    <label for="persiapanPembelajaran" class="px-2">Persiapan Pembelajaran</label>
                </div>
                <div class="flex flex-col gap-1 p-2 border-2 border-black/10">
                    <h4>{{ strip_tags($modulAjar->persiapanPembelajaran) }}</h4>
                </div>
            </div>

            <h5 class="text-xl font-semibold">Kegiatan Pembalajaran</h5>
            <div>
                <label for="pendahuluan" >1. Pendahuluan {{ $modulAjar->waktuPendahuluan }} Menit </label>
                <div class="flex flex-col gap-1 p-2 mt-2 border-2 border-black/10">
                    <h4>{{ strip_tags($modulAjar->pendahuluan) }}</h4>
                </div>
            </div>
            <div>
                <label for="kegiatanInti" >2. Kegiatan Inti {{ $modulAjar->waktuKegiatanInti }} Menit   </label>
                <div class="flex flex-col gap-1 p-2 mt-2 border-2 border-black/10">
                    <h4>{{ strip_tags($modulAjar->kegiatanInti) }}</h4>
                </div>
            </div>
            <div>
                <label for="kegiatanPenutup">3. Kegiatan Penutup {{ $modulAjar->waktuKegiatanPenutup }} Menit  </label>
                <div class="flex flex-col gap-1 p-2 mt-2 border-2 border-black/10">
                    <h4>{{ strip_tags($modulAjar->kegiatanPenutup) }}</h4>
                </div>
            </div>
            <div>
                <label for="rencanaAsesmen" >Rencana Asesmen </label>
                <div class="flex flex-col gap-1 p-2 mt-2 border-2 border-black/10">
                    <h4>{{ strip_tags($modulAjar->rencanaAsesmen) }}</h4>
                </div>
            </div>

            <h5 class="text-2xl font-bold">Lampiran</h5>
            <div class="flex flex-col gap-2">
                <label for="bahanBacaan">Bahan Bacaan Guru dan Peserta Didik:</label>
                <div class="flex flex-col gap-1 p-2 mt-2 border-2 border-black/10">
                    <h4>{{ $modulAjar->bahanBacaan }}</h4>
                </div>
            </div>
            <div class="flex justify-between w-full mt-12">
                <h5 class="w-full">Mengetahui,</h5>
                <h5 class="w-full text-end">{{ $modulAjar->kota }}, {{ $modulAjar->tanggal }}</h5>
            </div>
            <div class="flex justify-between gap-5 mt-5 text-center">
                <div class="flex flex-col gap-2">
                    <h2>Kepala Sekolah</h2>
                    <h2 class="pt-20">{{ $modulAjar->namaKepalaSekolah }}</h2>
                </div>
                <div class="flex flex-col gap-1">
                    <h2>Guru Mata Pelajaran</h2>
                    <h2 class="pt-20">{{ $modulAjar->namaGuru }}</h2>
                </div>
            </div>
    </div>
</div>
@include('home.home-layouts.tw-home-footer')
@endsection
