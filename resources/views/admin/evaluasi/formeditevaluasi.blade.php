@extends('home.home-layouts.home-main-tw')
@section('head')
<link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
@endsection
@section('container')
@include('admin.components.navbar')
@include('admin.components.sidebar')
  <div class="mt-14 p-4 sm:ml-64 bg-slate-100">
    <div class="max-w-screen-xl mx-auto">
      <div class="mb-5 max-w-screen-xl bg-blue-600 px-5 py-8 rounded-lg">
        <h1 class="mb-1 text-4xl font-extrabold tracking-tight text-white md:text-2xl lg:text-3xl dark:text-white">Edit Pendaftaran</h1>
        <p class="text-lg font-normal text-gray-50 lg:text-lg dark:text-gray-400">Edit halaman pendaftaran dengan memasukan informasi kegiatan dibawah ini</p>
      </div>
      <form class="row g-3 mt-1" action="{{ route('editdataevaluasi', ['id' => $evaluasi->id]) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <div>
            <input type="hidden" name="header" value="24">
            <input type="hidden" name="jenis" value="diklat">
            <label for="judul" class="mb-2 mt-3 block font-semibold text-sm">Nama Kegiatan</label>
            <input type="text"
                class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                id="judul" name="judul" placeholder="Nama Kegiatan" required
                value="{{ old('judul', $evaluasi->judul) }}">
        </div>
        <div>
            <label for="slug" class="mb-2 mt-3 block font-semibold text-sm">Slug</label>
            <input type="text"
                class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                id="slug" name="slug" placeholder="evaluasi13-16mar2024" required
                value="{{ old('slug', $evaluasi->slug) }}">
        </div>
        
        
        
        
        
        
        <div>
            <label for="jenis" class="mb-2 mt-3 block font-semibold text-sm">Tim</label>
            <select
                class="form-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-1.5"
                aria-label="Default select example" name="jenis">
                <option value="tim1" {{ $evaluasi->jenis == 'tim1' ? 'selected' : '' }}>Tim 1</option>
                <option value="tim2" {{ $evaluasi->jenis == 'tim2' ? 'selected' : '' }}>Tim 2</option>
                <option value="english" {{ $evaluasi->jenis == 'english' ? 'selected' : '' }}>English</option>
                <option value="canva" {{ $evaluasi->jenis == 'canva' ? 'selected' : '' }}>Canva</option>
                <option value="gamifikasi" {{ $evaluasi->jenis == 'gamifikasi' ? 'selected' : '' }}>Gamifikasi</option>
                <option value="slicenter" {{ $evaluasi->jenis == 'slidecenter' ? 'selected' : '' }}>Slidecenter</option>
            </select>
        </div>


        <div>
            <label for="topik" class="mb-2 mt-3 block font-semibold text-sm">Topik</label>
            <input type="hidden" id="topik" name="topik" class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" placeholder="Topik" value="{{ old('slug', $evaluasi->topik) }}">
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

<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    var input = document.querySelector('#topik');
    var tagify = new Tagify(input);

    // Ambil nilai topik dari server dalam format JSON array
    var oldTopics = {!! json_encode($evaluasi->topik) !!};

    console.log('Old Topics:', oldTopics); // Periksa format data
    console.log('Type of oldTopics:', typeof oldTopics); // Periksa tipe data

    // Jika oldTopics bukan array, konversi menjadi array
    if (!Array.isArray(oldTopics)) {
        try {
            oldTopics = JSON.parse(oldTopics);
        } catch (e) {
            console.error('Failed to parse oldTopics:', e);
            oldTopics = [];
        }
    }

    // Konversi nilai oldTopics ke format yang dikenali oleh Tagify
    var formattedTopics = oldTopics.map(function(topic) {
        return { "value": topic };
    });

    console.log('Formatted Topics:', formattedTopics); // Periksa format data yang diformat

    // Set the value of Tagify input
    tagify.addTags(formattedTopics);
});




</script>

