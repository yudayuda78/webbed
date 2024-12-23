@extends('home.home-layouts.home-main-tw')
@section('container')
@include('admin.components.navbar')
@include('admin.components.sidebar')
  <div class="mt-14 p-4 sm:ml-64 bg-slate-100 min-h-svh">
    <div class="max-w-screen-xl mx-auto">
      <div class="mb-5 max-w-screen-xl bg-blue-600 px-5 py-8 rounded-lg">
        <h1 class="mb-1 text-4xl font-extrabold tracking-tight text-white md:text-2xl lg:text-3xl dark:text-white">Edit Presensi</h1>
        <p class="text-lg font-normal text-gray-50 lg:text-lg dark:text-gray-400">Edit halaman Presensi dengan memasukan informasi kegiatan dibawah ini</p>
      </div>
      <form class="row g-3 mt-1" action="{{ route('editdatapresensi', ['id' => $presensi->id]) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <div>
            <input type="hidden" name="header" value="25">
                <input type="hidden" name="jenis" value="diklat">
                

            <label for="judul" class="mb-2 mt-3 block font-semibold text-sm">Nama Kegiatan</label>
            <input type="text"
                class="form-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-1.5"
                id="judul" name="judul" placeholder="Nama Kegiatan" required
                value="{{ old('judul', $presensi->judul) }}">
        </div>
        <div>
            <label for="slug" class="mb-2 mt-3 block font-semibold text-sm">Slug</label>
            <input type="text"
                class="form-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-1.5"
                id="slug" name="slug" placeholder="pendaftaran13-16mar2024" required
                value="{{ old('slug', $presensi->slug) }}">
        </div>
        <div>
            <label for="telegram" class="mb-2 mt-3 block font-semibold text-sm">Link Telegram</label>
            <input type="text"
                class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                id="telegram" name="telegram" placeholder="link telegram"
                value="{{ old('telegram', $presensi->telegram) }}">
                
        </div>
        <div>
            <label for="dibuka" class="mb-2 mt-3 block font-semibold text-sm">Dibuka</label>
            <select
                class="form-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-1.5"
                aria-label="Default select example" name="dibuka">
                <option value="1" {{ $presensi->dibuka == '1' ? 'selected' : '' }}>Dibuka</option>
                <option value="0" {{ $presensi->dibuka == '0' ? 'selected' : '' }}>Ditutup</option>
            </select>
        </div>
        <div>
            <button type="submit"
                class="mb-2 me-1 mt-5 rounded-lg bg-blue-600 px-4 py-2.5 text-base font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">Simpan Perubahan</button>
                <a href="{{ route('adminpendaftaran') }}" class="mb-2 me-1 mt-5 rounded-lg bg-red-600 px-4 py-2.5 text-base font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300">Batal</a>
            </div>
    </form>
    </div>
  </div>
@endsection
{{-- @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div>
    <form class="row g-3 mt-1" action="{{ route('editdatasertifikat', ['id' => $sertifikat->id]) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <div>
            <input type="hidden" name="header" value="24">
            <input type="hidden" name="jenis" value="diklat">

            <label for="judul" class="mb-2 mt-3 block font-semibold text-sm">Nama Kegiatan</label>
            <input type="text"
                class="form-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-1.5"
                id="judul" name="judul" placeholder="Nama Kegiatan" required
                value="{{ old('judul', $sertifikat->judul) }}">
        </div>
        <div>
            <label for="slug" class="mb-2 mt-3 block font-semibold text-[#64748B]">Slug</label>
            <input type="text"
                class="form-control block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                id="slug" name="slug" placeholder="pendaftaran13-16mar2024" required
                value="{{ old('slug', $sertifikat->slug) }}">
        </div>
        <div>
            <button type="submit"
                class="mb-2 me-2 mt-5 rounded-lg bg-[#196ECD] px-4 py-2.5 text-base font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">Edit</button>
        </div>
        <div>
            <a href="{{ route('adminsertifikat') }}">
                back
            </a>
        </div>
    </form>
</div> --}}
