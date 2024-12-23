@extends('home.home-layouts.home-main-tw')
@section('container')
@include('admin.components.navbar')
@include('admin.components.sidebar')
  <div class="mt-14 p-4 sm:ml-64 bg-slate-100 min-h-svh">
    <div class="max-w-screen-xl mx-auto">
        <div class="max-w-screen-xl mx-auto">
            <div class="mb-5 max-w-screen-xl bg-blue-600 px-5 py-8 rounded-lg">
              <h1 class="mb-1 text-4xl font-extrabold tracking-tight text-white md:text-2xl lg:text-3xl dark:text-white">Generate Nomor Surat</h1>
              <p class="text-lg font-normal text-gray-50 lg:text-lg dark:text-gray-400">Sebelum generate nomor cek nomor <a href="">disini</a>. Buat nomor surat baru dengan memasukan informasi dibawah ini</p>
          </div>
      <form class="row g-3 mt-1" action="{{ route('generatesurat') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                
                
                <label for="judul" class="mb-2 mt-3 block font-semibold text-sm">Nama Kegiatan</label>
                <input type="text"
                    class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                    id="judul" name="judul" placeholder="Nama Kegiatan" required>
            </div>
           
            
            <div>
                <label for="jenis" class="mb-2 mt-3 block font-semibold text-sm">Jenis</label>
                <select
                    class="form-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-1.5"
                    aria-label="Default select example" name="jenis">
                    <option value="01">Surat Keputusan (SK)</option>
                    <option value="02">Surat Undangan (SU)</option>
                    <option value="03">Surat Permohonan (SPm) </option>
                    <option value="04">Surat Pemberitahuan (SPb) </option>
                    <option value="05">Surat Peminjaman (SPp)  </option>
                    <option value="06">Surat Pernyataan (SPn) </option>
                    <option value="07">Surat Mandat (SM)  </option>
                    <option value="08">Surat Tugas (ST) </option>
                    <option value="09">Surat Keterangan (SKet)  </option>
                    <option value="10">Surat Rekomendasi (SR) </option>
                    <option value="11">Surat Balasan (SB) </option>
                    <option value="12">Surat Perintah Perjalanan Dinas (SPPD)  </option>
                    <option value="13">Sertifikat (SRT) </option>
                    <option value="14">Perjanjian Kerja (PK) </option>
                    <option value="15">Surat Pengantar (SPeng) </option>
                </select>
            </div>
            <div>
                <button type="submit"
                    class="mb-2 me-1 mt-5 rounded-lg bg-blue-600  px-4 py-2.5 text-base font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">Buat Nomor Surat</button>
                    <a href="{{ route('listnomorsurat') }}" class="mb-2 me-1 mt-5 rounded-lg bg-red-600 px-4 py-2.5 text-base font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300">Batal</a>
            </div>
        </form>

        @if(session('success'))
            <div class="alert alert-success">
               Nomor Surat : {{ session('success') }}
            </div>
        @endif
    </div>
  </div>

@endsection
{{-- <div>
    <form class="row g-3 mt-1" action="{{ route('tambahdatasertifikat') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <input type="hidden" name="header" value="1">
            <label for="judul" class="mb-2 mt-3 block font-semibold text-[#64748B]">Nama Kegiatan</label>
            <input type="text"
                class="form-control block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                id="judul" name="judul" placeholder="Nama Kegiatan" required>
        </div>
        <div>
            <label for="slug" class="mb-2 mt-3 block font-semibold text-[#64748B]">Slug</label>
            <input type="text"
                class="form-control block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                id="slug" name="slug" placeholder="sertifikat13-16mar2024" required>
        </div>
        <div>
            <button type="submit"
                class="mb-2 me-2 mt-5 rounded-lg bg-[#196ECD] px-4 py-2.5 text-base font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">Buat Halaman Sertifikat</button>
        </div>
    </form>
</div> --}}
