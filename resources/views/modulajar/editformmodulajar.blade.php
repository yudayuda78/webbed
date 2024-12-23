@extends('home.home-layouts.home-main-tw')
@section('container')
<x-ticykit.navbar />
<div class="p-5 bg-white"></div>
<div class="py-10 bg-ticykit-bg">
    <div class="md:px-12 px-0 mx-auto max-w-[90%] md:max-w-main flex flex-col gap-10">
        <div class="flex flex-col items-center gap-1 text-center">
            <h2 class="text-3xl text-black">Edit Modul <span class="font-bold">Ajar {{ $modulajar->namaModul }}</span></h2>
            <p class="w-full text-sm md:max-w-xl max-w-64 md:text-base text-secondary">Open-source neutral-style system symbols elaborately crafted
                for designers and developers.</p>
        </div>
    </div>
</div>
<div class="pt-10 pb-20 bg-white ">
    <div class="mx-auto max-w-[90%] md:max-w-4xl flex flex-col gap-10">
        @include('home.home-layouts.tw-navbar-modulajar')
        <form action="{{route('editdatamymodulajar', ['id' => $modulajar->id])}}" method="POST" class="flex flex-col gap-5 font-semibold ">
            @csrf
            <h5 class="text-2xl font-bold">A.Informasi Umum</h5>
            <div class="grid h-full grid-cols-1 gap-3 md:grid-cols-2 md:h-80">
                <table class="w-full text-left">
                    <tbody class="space-y-4">
                        <tr class="py-3">
                            <td>
                                <label for="namaModul">Nama Modul</label>
                            </td>
                            <td class="px-2">:</td>
                            <td>
                                <input type="text"  id="namaModul" name="namaModul"  required
                                    class="border-[1px] border-ticykit-secondary px-2 py-1.5 rounded-lg bg-ticykit-bg font-medium text-base"
                                    placeholder="nama modul" value="{{ old('namaModul', $modulajar->namaModul) }}">
                            </td>
                        </tr>
                        <tr class="py-3">
                            <td>
                                <label for="kodeModul">Kode Modul</label>
                            </td>
                            <td class="px-2">:</td>
                            <td>
                                <input type="text" id="kodeModul" name="kodeModul" required value="{{ old('kodeModul', $modulajar->kodeModul) }}"
                                    class="border-[1px] border-ticykit-secondary px-2 py-1.5 rounded-lg bg-ticykit-bg font-medium text-base"
                                    placeholder="kode modul">
                            </td>
                        </tr>
                        <tr class="py-3">
                            <td><label for="penyusun">Penyusun</label></td>
                            <td class="px-2">:</td>
                            <td><input type="text" id="penyusun" name="penyusun"
                                    class="border-[1px] border-ticykit-secondary px-2 py-1.5 rounded-lg bg-ticykit-bg"
                                    placeholder="penyusun" required value="{{ old('penyusun', $modulajar->penyusun) }}"></td>
                        </tr>
                        <tr class="py-3">
                            <td><label for="tahun">Tahun</label></td>
                            <td class="px-2">:</td>
                            <td><input type="text" id="tahun" name="tahun" required value="{{ old('tahun', $modulajar->tahun) }}"
                                    class="border-[1px] border-ticykit-secondary px-2 py-1.5 rounded-lg bg-ticykit-bg"
                                    placeholder="tahun"></td>
                        </tr>
                        <tr class="py-3">
                            <td><label for="kelas">Kelas</label></td>
                            <td class="px-2">:</td>
                            <td><input type="text" id="kelas" name="kelas" required value="{{ old('kelas', $modulajar->kelas) }}"
                                    class="border-[1px] border-ticykit-secondary px-2 py-1.5 rounded-lg bg-ticykit-bg"
                                    placeholder="kelas"></td>
                        </tr>
                        <tr class="py-3">
                            <td><label for="faseCapaian">Fase</label></td>
                            <td class="px-2">:</td>
                            <td><input type="text" id="faseCapaian" name="faseCapaian" required value="{{ old('faseCapaian', $modulajar->faseCapaian) }}"
                                    class="border-[1px] border-ticykit-secondary px-2 py-1.5 rounded-lg bg-ticykit-bg"
                                    placeholder="fase"></td>
                        </tr>
                        <tr class="py-3">
                            <td><label for="elemen">Elemen</label></td>
                            <td class="px-2">:</td>
                            <td><input type="text" id="elemen" name="elemen" required value="{{ old('elemen', $modulajar->elemen) }}"
                                    class="border-[1px] border-ticykit-secondary px-2 py-1.5 rounded-lg bg-ticykit-bg"
                                    placeholder="elemen"></td>
                        </tr>
                    </tbody>
                </table>
                <table class="w-full text-left">
                    <tbody class="space-y-4">
                        <tr class="py-3">
                            <td><label for="alokasiWaktu">Alokasi Waktu</label></td>
                            <td class="px-2">:</td>
                            <td><input type="text" id="alokasiWaktu" name="alokasiWaktu" required value="{{ old('alokasiWaktu', $modulajar->alokasiWaktu) }}"
                                    class="border-[1px] border-ticykit-secondary px-2 py-1.5 rounded-lg bg-ticykit-bg"
                                    placeholder="waktu"></td>
                        </tr>
                        <tr class="py-3">
                            <td><label for="pertemuan">Pertemuan ke</label></td>
                            <td class="px-2">:</td>
                            <td><input type="text" id="pertemuan" name="pertemuan" required value="{{ old('pertemuan', $modulajar->pertemuan) }}"
                                    class="border-[1px] border-ticykit-secondary px-2 py-1.5 rounded-lg bg-ticykit-bg"
                                    placeholder="pertemuan"></td>
                        </tr>
                        <tr class="py-3">
                            <td><label for="profilPelajarPancasila">Profil Pelajar Pancasila</label></td>
                            <td class="px-2">:</td>
                            <td><input type="text" id="profilPelajarPancasila" name="profilPelajarPancasila" required value="{{ old('profilPelajarPancasila', $modulajar->profilPelajarPancasila) }}"
                                    class="border-[1px] border-ticykit-secondary px-2 py-1.5 rounded-lg bg-ticykit-bg"
                                    placeholder="profil pelajaran"></td>
                        </tr>
                        <tr class="py-3">
                            <td><label for="saranaPrasarana">Sarana Prasarana</label></td>
                            <td class="px-2">:</td>
                            <td><input type="text" id="saranaPrasarana" name="saranaPrasarana" required value="{{ old('saranaPrasarana', $modulajar->saranaPrasarana) }}"
                                    class="border-[1px] border-ticykit-secondary px-2 py-1.5 rounded-lg bg-ticykit-bg"
                                    placeholder="sarana"></td>
                        </tr>
                        <tr class="py-3">
                            <td><label for="targetPesertaDidik">Target Peserta Didik</label></td>
                            <td class="px-2">:</td>
                            <td><input type="text" id="targetPesertaDidik" name="targetPesertaDidik" required value="{{ old('targetPesertaDidik', $modulajar->targetPesertaDidik) }}"
                                    class="border-[1px] border-ticykit-secondary px-2 py-1.5 rounded-lg bg-ticykit-bg"
                                    placeholder="target"></td>
                        </tr>
                        <tr class="py-3">
                            <td><label for="modelPembelajaran">Model Pembelajaran</label></td>
                            <td class="px-2">:</td>
                            <td><input type="text" id="modelPembelajaran" name="modelPembelajaran" required value="{{ old('modelPembelajaran', $modulajar->modelPembelajaran) }}"
                                    class="border-[1px] border-ticykit-secondary px-2 py-1.5 rounded-lg bg-ticykit-bg"
                                    placeholder="model pembelajaran"></td>
                        </tr>
                        <tr class="py-3">
                            <td><label for="modePembelajaran">Mode Pembelajaran</label></td>
                            <td class="px-2">:</td>
                            <td><input type="text" id="modePembelajaran" name="modePembelajaran" required value="{{ old('modePembelajaran', $modulajar->modePembelajaran) }}"
                                    class="border-[1px] border-ticykit-secondary px-2 py-1.5 rounded-lg bg-ticykit-bg"
                                    placeholder="mode pembelajaran"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <h5 class="pt-2 text-2xl font-bold">B.Komponen Inti</h5>
            <div>
                <div class="w-full bg-gray-300 border-2 border-black/10">
                    <label for="tujuanPembelajaran" class="px-2">Tujuan Pembelajaran</label>
                </div>
                <div class="flex flex-col gap-1 p-2 border-2 border-black/10">
                    <textarea id="tujuanPembelajaran" name="tujuanPembelajaran" placeholder="" rows="10">{{ old('tujuanPembelajaran', $modulajar->tujuanPembelajaran) }}</textarea>
                </div>
            </div>
            <div>
                <div class="w-full bg-gray-300 border-2 border-black/10">
                    <label for="pertanyaanPemantik" class="px-2">Pertanyaan Pemantik</label>
                </div>
                <div class="flex flex-col gap-1 p-2 border-2 border-black/10">
                    <textarea id="pertanyaanPemantik" name="pertanyaanPemantik" placeholder="">{{ old('pertanyaanPemantik', $modulajar->pertanyaanPemantik) }}</textarea>
                </div>
            </div>
            <div>
                <div class="w-full bg-gray-300 border-2 border-black/10">
                    <label for="persiapanPembelajaran" class="px-2">Persiapan Pembelajaran</label>
                </div>
                <div class="flex flex-col gap-1 p-2 border-2 border-black/10">
                    <textarea id="persiapanPembelajaran" name="persiapanPembelajaran" placeholder="">{{ old('persiapanPembelajaran', $modulajar->persiapanPembelajaran) }}</textarea>
                </div>
            </div>

            <h5 class="text-xl font-semibold">Kegiatan Pembalajaran</h5>
            <div>
                <label for="pendahuluan" >1. Pendahuluan ( <label for="waktuPendahuluan">Waktu: </label><input type="text" class="w-20 px-2 py-1 border-[1px] border-black/10" name="waktuPendahuluan" value="{{ old('waktuPendahuluan', $modulajar->waktuPendahuluan) }}"></input> Menit )  </label>
                <div class="flex flex-col gap-1 p-2 mt-2 border-2 border-black/10">
                    <textarea id="pendahuluan" name="pendahuluan" placeholder="" class="border-2 border-ticykit-secondary">{{ old('pendahuluan', $modulajar->pendahuluan) }}</textarea>
                </div>
            </div>
            <div>
                <label for="kegiatanInti" >2. Kegiatan Inti ( <label for="waktuKegiatanInti">Waktu: </label><input type="text" class="w-20 px-2 py-1 border-[1px] border-black/10" name="waktuKegiatanInti" value="{{ old('waktuKegiatanInti', $modulajar->waktuKegiatanInti) }}"></input> Menit )  </label>
                <div class="flex flex-col gap-1 p-2 mt-2 border-2 border-black/10">
                    <textarea id="kegiatanInti" name="kegiatanInti" placeholder="">{{ old('kegiatanInti', $modulajar->kegiatanInti) }}</textarea>
                </div>
            </div>
            <div>
                <label for="kegiatanPenutup">3.Kegiatan Penutup( <label for="waktuKegiatanPenutup">Waktu: </label><input type="text" class="w-20 px-2 py-1 border-[1px] border-black/10" name="waktuKegiatanPenutup" value="{{ old('waktuKegiatanPenutup', $modulajar->waktuKegiatanPenutup) }}"></input> Menit ) </label>
                <div class="flex flex-col gap-1 p-2 mt-2 border-2 border-black/10">
                    <textarea id="kegiatanPenutup" name="kegiatanPenutup" placeholder="">{{ old('kegiatanPenutup', $modulajar->kegiatanPenutup) }}</textarea>
                </div>
            </div>
            <div>
                <label for="rencanaAsesmen" >Rencana Asesmen </label>
                <div class="flex flex-col gap-1 p-2 mt-2 border-2 border-black/10">
                    <textarea id="rencanaAsesmen" name="rencanaAsesmen" placeholder="">{{ old('rencanaAsesmen', $modulajar->rencanaAsesmen) }}</textarea>
                </div>
            </div>

            <h5 class="text-2xl font-bold">C. Lampiran</h5>
            <div class="flex flex-col gap-2">
                <label for="bahanBacaan">Bahan Bacaan Guru dan Peserta Didik:</label>
                <input type="text" name="bahanBacaan" id="bahanBacaan" placeholder="Bahan Bacaan" class="border-[1px] border-ticykit-secondary px-2 py-1.5 rounded-lg bg-ticykit-bg" value="{{ old('bahanBacaan', $modulajar->bahanBacaan) }}">
                <input type="text" name="kota" id="kota" placeholder="Masukan Kota Disini" class="border-[1px] border-ticykit-secondary px-2 py-1.5 rounded-lg bg-ticykit-bg" value="{{ old('kota', $modulajar->kota) }}">
                <input type="date" name="tanggal" id="tanggal" placeholder="" class="border-[1px] border-ticykit-secondary px-2 py-1.5 rounded-lg bg-ticykit-bg" value="{{ old('tanggal', $modulajar->tanggal) }}">
            </div>

            <div class="flex flex-col gap-2">
                <h5 class="text-xl font-medium">Mengetahui</h5>
                <input type="text" name="kepalasekolah" id="kepalasekolah" placeholder="Kepala Sekolah" class="border-[1px] border-ticykit-secondary px-2 py-1.5 rounded-lg text-base font-medium bg-ticykit-bg" value="{{ old('kepalasekolah', $modulajar->kepalasekolah) }}">
                <input type="text" name="guru" id="guru" placeholder="Masukan Jenis Guru" class="border-[1px] border-ticykit-secondary px-2 py-1.5 rounded-lg text-base font-medium bg-ticykit-bg" value="{{ old('guru', $modulajar->guru) }}">
                <input type="text" name="namaKepalaSekolah" id="namaKepalaSekolah" placeholder="Masukan Nama Lengkap dan Gelar Kepala Sekolah" class="border-[1px] border-ticykit-secondary px-2 py-1.5 rounded-lg text-base font-medium bg-ticykit-bg" value="{{ old('namaKepalaSekolah', $modulajar->namaKepalaSekolah) }}">
                <input type="text" name="namaGuru" id="namaGuru" placeholder="Masukan Nama Lengkap dan Gelar Kepala Sekolah Guru" class="border-[1px] border-ticykit-secondary px-2 py-1.5 rounded-lg text-base font-medium bg-ticykit-bg" value="{{ old('namaGuru', $modulajar->namaGuru) }}">
            </div>
            <button type="submit" class="w-full p-2 font-semibold text-white bg-blue-500 rounded-lg">Edit Modul Ajar</button>
        </form>
    </div>
</div>
@include('home.home-layouts.tw-home-footer')
@endsection

<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js" defer></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const tanggalHariIni = new Date();
        const tahun = tanggalHariIni.getFullYear();
        const bulan = String(tanggalHariIni.getMonth() + 1).padStart(2, '0');
        const hari = String(tanggalHariIni.getDate()).padStart(2, '0');
        const format = `${tahun}-${bulan}-${hari}`;
        console.log(format);
        document.getElementById('tanggal').value = format;
        const editorElements = [
            '#tujuanPembelajaran'
            , '#pertanyaanPemantik'
            , '#persiapanPembelajaran'
            , '#pendahuluan'
            , '#kegiatanInti'
            , '#kegiatanPenutup'
            , '#rencanaAsesmen'
        ];
        editorElements.forEach(selector => {
            ClassicEditor
                .create(document.querySelector(selector))
                .then(editor => {
                    editor.ui.view.editable.element.style.height = '160px';
                })
                .catch(error => {
                    console.error(error);
                });
        });
    });
</script>

<style>
    .ck-editor__editable {
    max-height: 160px !important;
    min-height: 160px !important;
    overflow-y: auto;
}
</style>


{{-- <head>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
</head>


<h1>Buat Modul Ajar Anda</h1>
<form action="{{route('editdatamymodulajar', ['id' => $modulajar->id])}}" method="POST">
    @csrf

    <h5>A.Informasi Umum</h5>
    <label for="namaModul">Nama Modul</label>
    <input type="text" id="namaModul" name="namaModul" required value="{{ old('namaModul', $modulajar->namaModul) }}">

    <label for="kodeModul">Kode Modul</label>
    <input type="text" id="kodeModul" name="kodeModul" required value="{{ old('kodeModul', $modulajar->kodeModul) }}">

    <label for="penyusun">Penyusun</label>
    <input type="text" id="penyusun" name="penyusun" required value="{{ old('penyusun', $modulajar->penyusun) }}">

    <label for="tahun">tahun</label>
    <input type="text" id="tahun" name="tahun" required value="{{ old('tahun', $modulajar->tahun) }}">

    <label for="kelas">kelas</label>
    <input type="text" id="kelas" name="kelas" required value="{{ old('kelas', $modulajar->kelas) }}">

    <label for="faseCapaian">fase</label>
    <input type="text" id="faseCapaian" name="faseCapaian" required value="{{ old('faseCapaian', $modulajar->faseCapaian) }}">

    <label for="elemen">elemen</label>
    <input type="text" id="elemen" name="elemen" required value="{{ old('elemen', $modulajar->elemen) }}">

    <label for="topik">topik</label>
    <input type="text" id="topik" name="topik" required value="{{ old('topik', $modulajar->topik) }}">

    <label for="alokasiWaktu">alokasi waktu</label>
    <input type="text" id="alokasiWaktu" name="alokasiWaktu" required value="{{ old('alokasiWaktu', $modulajar->alokasiWaktu) }}">

    <label for="pertemuan">pertemuanke</label>
    <input type="text" id="pertemuan" name="pertemuan" required value="{{ old('pertemuan', $modulajar->pertemuan) }}">

    <label for="profilPelajarPancasila">Profil Pelajar Pancasila</label>
    <input type="text" id="profilPelajarPancasila" name="profilPelajarPancasila" required value="{{ old('profilPelajarPancasila', $modulajar->profilPelajarPancasila) }}">

    <label for="saranaPrasarana">Sarana Prasaran</label>
    <input type="text" id="saranaPrasarana" name="saranaPrasarana" required value="{{ old('saranaPrasarana', $modulajar->saranaPrasarana) }}">

    <label for="targetPesertaDidik">Target Peserta Didik</label>
    <input type="text" id="targetPesertaDidik" name="targetPesertaDidik" required value="{{ old('targetPesertaDidik', $modulajar->targetPesertaDidik) }}">

    <label for="modelPembelajaran">Model Pembelajaran</label>
    <input type="text" id="modelPembelajaran" name="modelPembelajaran" required value="{{ old('modelPembelajaran', $modulajar->modelPembelajaran) }}">

    <label for="modePembelajaran">Mode Pembelajaran</label>
    <input type="text" id="modePembelajaran" name="modePembelajaran" required value="{{ old('modePembelajaran', $modulajar->modePembelajaran) }}">


    <h5>B.Komponen Inti</h5>

    <label for="tujuanPembelajaran">Tujuan Pembelajaran</label>
    <textarea id="tujuanPembelajaran" name="tujuanPembelajaran" placeholder="" >{{ old('tujuanPembelajaran', $modulajar->tujuanPembelajaran) }}</textarea>
    <script>
        ClassicEditor
            .create(document.querySelector('#tujuanPembelajaran'))
            .catch(error => {
                console.error(error);
            });
    </script>

    <label for="pertanyaanPemantik">Pertanyaan Pemantik</label>
    <textarea id="pertanyaanPemantik" name="pertanyaanPemantik" placeholder="" >{{ old('pertanyaanPemantik', $modulajar->pertanyaanPemantik) }}</textarea>
    <script>
        ClassicEditor
            .create(document.querySelector('#pertanyaanPemantik'))
            .catch(error => {
                console.error(error);
            });
    </script>


    <label for="persiapanPembelajaran">Persiapan Pembelajaran</label>
    <textarea id="persiapanPembelajaran" name="persiapanPembelajaran" placeholder="" >{{ old('persiapanPembelajaran', $modulajar->persiapanPembelajaran) }}</textarea>
    <script>
        ClassicEditor
            .create(document.querySelector('#persiapanPembelajaran'))
            .catch(error => {
                console.error(error);
            });
    </script>

    <p>Kegiatan Pembalajaran</p>
    <label for="pendahuluan">1. Pendahuluan ( <label for="waktuPendahuluan">Waktu</label><input type="text"
            name="waktuPendahuluan" value="{{ old('waktuPendahuluan', $modulajar->waktuPendahuluan) }}"> </input> ) </label>
    <textarea id="pendahuluan" name="pendahuluan" placeholder="" >{{ old('pendahuluan', $modulajar->pendahuluan) }}</textarea>
    <script>
        ClassicEditor
            .create(document.querySelector('#pendahuluan'))
            .catch(error => {
                console.error(error);
            });
    </script>

    <label for="kegiatanInti">2. Kegiatan Inti ( <label for="waktuKegiatanInti">Waktu</label><input type="text"
            name="waktuKegiatanInti" value="{{ old('waktuKegiatanInti', $modulajar->waktuKegiatanInti) }}"> </input> ) </label>
    <textarea id="kegiatanInti" name="kegiatanInti" placeholder="" >{{ old('kegiatanInti', $modulajar->kegiatanInti) }}</textarea>
    <script>
        ClassicEditor
            .create(document.querySelector('#kegiatanInti'))
            .catch(error => {
                console.error(error);
            });
    </script>

    <label for="kegiatanPenutup">3.Kegiatan Penutup( <label for="waktuKegiatanPenutup">Waktu</label><input
            type="text" name="waktuKegiatanPenutup" value="{{ old('waktuKegiatanPenutup', $modulajar->waktuKegiatanPenutup) }}"> </input> ) </label>
    <textarea id="kegiatanPenutup" name="kegiatanPenutup" placeholder="">{{ old('kegiatanPenutup', $modulajar->kegiatanPenutup) }}</textarea>
    <script>
        ClassicEditor
            .create(document.querySelector('#kegiatanPenutup'))
            .catch(error => {
                console.error(error);
            });
    </script>

    <label for="rencanaAsesmen">Rencana Asesmen </label>
    <textarea id="rencanaAsesmen" name="rencanaAsesmen" placeholder="" >{{ old('rencanaAsesmen', $modulajar->rencanaAsesmen) }}</textarea>
    <script>
        ClassicEditor
            .create(document.querySelector('#rencanaAsesmen'))
            .catch(error => {
                console.error(error);
            });
    </script>


    <h5>C. Lampiran</h5>
    <label for="bahanBacaan">Bahan Bacaan Guru dan Peserta Didik:</label>
    <input type="text" name="bahanBacaan" id="bahanBacaan" value="{{ old('bahanBacaan', $modulajar->bahanBacaan) }}">
    <input type="text" name="kota" id="kota" placeholder="Masukan Kota Disini" value="{{ old('kota', $modulajar->kota) }}">,
    <input type="date" name="tanggal" id="tanggal" placeholder="" value="{{ old('tanggal', $modulajar->tanggal) }}">

    <p>Mengetahui</p>
    <input type="text" name="kepalasekolah" id="kepalasekolah" placeholder="" value="{{ old('kepalasekolah', $modulajar->kepalasekolah) }}">
    <input type="text" name="guru" id="guru" placeholder="Masukan Jenis Guru" value="{{ old('guru', $modulajar->guru) }}">
    <input type="text" name="namaKepalaSekolah" id="namaKepalaSekolah"
        placeholder="Masukan Nama Lengkap dan Gelar Kepala Sekolah" value="{{ old('namaKepalaSekolah', $modulajar->namaKepalaSekolah) }}">
    <input type="text" name="namaGuru" id="namaGuru"
        placeholder="Masukan Nama Lengkap dan Gelar Kepala Sekolah Guru" value="{{ old('namaGuru', $modulajar->namaGuru) }}">


    <button type="submit">Buat Modul Ajar</button>

</form>



<script>
    const tanggalHariIni = new Date();
    const tahun = tanggalHariIni.getFullYear();
    const bulan = String(tanggalHariIni.getMonth() + 1).padStart(2, '0');
    const hari = String(tanggalHariIni.getDate()).padStart(2, '0');
    const format = `${tahun}-${bulan}-${hari}`;
    console.log(format);
    document.getElementById('tanggal').value = format;
</script> --}}
