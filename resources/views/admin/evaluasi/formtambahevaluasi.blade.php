@extends('home.home-layouts.home-main-tw')
@section('container')
@include('admin.components.navbar')
@include('admin.components.sidebar')
  <div class="mt-14 p-4 sm:ml-64 bg-slate-100">
    <div class="max-w-screen-xl mx-auto">
      <div class="mb-5 max-w-screen-xl bg-blue-600 px-5 py-8 rounded-lg">
        <h1 class="mb-1 text-4xl font-extrabold tracking-tight text-white md:text-2xl lg:text-3xl dark:text-white">Tambah Evaluasi</h1>
        <p class="text-lg font-normal text-gray-50 lg:text-lg dark:text-gray-400">Buat halaman pendaftaran baru dengan memasukan informasi kegiatan dibawah ini</p>
      </div>
      <form class="row g-3 mt-1" action="{{ route('tambahdataevaluasi') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <input type="hidden" name="header" value="24">
            <input type="hidden" name="jenis" value="diklat">
            <label for="judul" class="mb-2 mt-3 block font-semibold text-sm">Nama Kegiatan</label>
            <input type="text"
                class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                id="judul" name="judul" placeholder="Nama Kegiatan" required>
        </div>
        <div>
            <label for="slug" class="mb-2 mt-3 block font-semibold text-sm">Slug</label>
            <input type="text"
                class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                id="slug" name="slug" placeholder="pendaftaran13-16mar2024" required>
        </div>
        <div>
            <label for="kegiatan" class="mb-2 mt-3 block font-semibold text-sm">Kegiatan</label>
            <input type="text"
                class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                id="kegiatan" name="kegiatan" placeholder="Nama kegiatan (tanpa tanggal)" required>
        </div>
        
        
        
        
        <div>
            <label for="jenis" class="mb-2 mt-3 block font-semibold text-sm">Tim</label>
            <select
                class="form-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-1.5"
                aria-label="Default select example" name="jenis">
                <option value="tim1">Tim 1</option>
                <option value="tim2">Tim 2</option>
                <option value="english">English</option>
                <option value="canva">Canva</option>
                <option value="slidecenter">Slidecenter</option>
            </select>
        </div>
        

        

        
        <div>
            <label for="pembicara1" class="mb-2 mt-3 block font-semibold text-sm">Pembicara 1</label>
            <input type="text"
                class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                id="pembicara1" name="pembicara1" placeholder="nama pembicara 1">
        </div>
        <div>
            <label for="pembicara2" class="mb-2 mt-3 block font-semibold text-sm">Pembicara 2</label>
            <input type="text"
                class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                id="pembicara2" name="pembicara2" placeholder="nama pembicara 2">
        </div>
        <div>
            <label for="pembicara3" class="mb-2 mt-3 block font-semibold text-sm">Pembicara 3</label>
            <input type="text"
                class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                id="pembicara3" name="pembicara3" placeholder="nama pembicara 3">
        </div>
        <div>
            <label for="pembicara4" class="mb-2 mt-3 block font-semibold text-sm">Pembicara 4</label>
            <input type="text"
                class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                id="pembicara4" name="pembicara4" placeholder="nama pembicara 4">
        </div>
        <div>
            <button type="submit"
                class="mb-2 me-1 mt-5 rounded-lg bg-blue-600 px-4 py-2.5 text-base font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">Buat Pendaftaran
            </button>
            <a href="{{ route('adminpendaftaran') }}" class="mb-2 me-1 mt-5 rounded-lg bg-red-600 px-4 py-2.5 text-base font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300">Batal</a>    
        </div>
    </form>
    </div>
  </div>

@endsection