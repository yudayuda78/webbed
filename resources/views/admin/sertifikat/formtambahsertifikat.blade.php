@extends('home.home-layouts.home-main-tw')
@section('container')
@include('admin.components.navbar')
@include('admin.components.sidebar')
  <div class="mt-14 p-4 sm:ml-64 bg-slate-100 min-h-svh">
    <div class="max-w-screen-xl mx-auto">
        <div class="max-w-screen-xl mx-auto">
            <div class="mb-5 max-w-screen-xl bg-blue-600 px-5 py-8 rounded-lg">
              <h1 class="mb-1 text-4xl font-extrabold tracking-tight text-white md:text-2xl lg:text-3xl dark:text-white">Tambah Sertifikat</h1>
              <p class="text-lg font-normal text-gray-50 lg:text-lg dark:text-gray-400">Buat halaman sertifikat baru dengan memasukan informasi kegiatan dibawah ini</p>
          </div>
      <form class="row g-3 mt-1" action="{{ route('tambahdatasertifikat') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <input type="hidden" name="header" value="1">
                <label for="judul" class="mb-2 mt-3 block font-semibold text-sm">Nama Kegiatan</label>
                <input type="text"
                    class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                    id="judul" name="judul" placeholder="Nama Kegiatan" required>
            </div>
            <div>
                <label for="slug" class="mb-2 mt-3 block font-semibold text-sm">Slug</label>
                <input type="text"
                    class="form-control block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                    id="slug" name="slug" placeholder="sertifikat13-16mar2024" required>
            </div>

            <div>
                <label for="materi1" class="mb-2 mt-3 block text-sm font-semibold">Materi 1</label>
                <input type="text"
                    class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                    id="materi1" name="materi1" placeholder="materi pembicara 1">
            </div>
            <div>
                <label for="pembicara1" class="mb-2 mt-3 block text-sm font-semibold">Pembicara 1</label>
                <input type="text"
                    class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                    id="pembicara1" name="pembicara1" placeholder="nama pembicara 1">
            </div>
            <div>
                <label for="jp1" class="mb-2 mt-3 block text-sm font-semibold">JP 1</label>
                <input type="text"
                    class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                    id="jp1" name="jp1" placeholder="JP pembicara 1">
            </div>
            
            <div>
                <label for="image1" class="mb-2 mt-3 block text-sm font-semibold">Upload TTD Pembicara 1</label>
                <span
                    class="mb-2 block rounded border border-red-400 bg-red-100 px-1.5 py-1.5 text-xs font-medium text-red-800">
                    <i class="ri-information-line"></i> Upload image untuk halaman pendaftaran, Format file .webp dan transparan,
                    Ukuran maksimal 1 MB, Penamaan file nama pembicara diikuti tanggal kegiatan</a></span>
                <Input
                    class="form-control block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 file:me-4 file:border-0 file:bg-[##64748B] file:px-3 file:py-2.5 focus:outline-none disabled:pointer-events-none disabled:opacity-50 dark:text-gray-400"
                    type="file" id="image1" name="image1">
            </div>


            <div>
                <label for="materi2" class="mb-2 mt-3 block text-sm font-semibold">Materi 2</label>
                <input type="text"
                    class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                    id="materi2" name="materi2" placeholder="materi pembicara 2">
            </div>
            <div>
                <label for="pembicara2" class="mb-2 mt-3 block text-sm font-semibold">Pembicara 2</label>
                <input type="text"
                    class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                    id="pembicara2" name="pembicara2" placeholder="nama pembicara 2">
            </div>
            <div>
                <label for="jp2" class="mb-2 mt-3 block text-sm font-semibold">JP 2</label>
                <input type="text"
                    class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                    id="jp2" name="jp2" placeholder="JP pembicara 2">
            </div>
            
            <div>
                <label for="image2" class="mb-2 mt-3 block text-sm font-semibold">Upload TTD Pembicara 2</label>
                <span
                    class="mb-2 block rounded border border-red-400 bg-red-100 px-1.5 py-1.5 text-xs font-medium text-red-800">
                    <i class="ri-information-line"></i> Upload image untuk halaman pendaftaran, Format file .webp dan transparan,
                    Ukuran maksimal 1 MB, Penamaan file nama pembicara diikuti tanggal kegiatan</a></span>
                <Input
                    class="form-control block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 file:me-4 file:border-0 file:bg-[##64748B] file:px-3 file:py-2.5 focus:outline-none disabled:pointer-events-none disabled:opacity-50 dark:text-gray-400"
                    type="file" id="image2" name="image2">
            </div>

            <div>
                <label for="materi3" class="mb-2 mt-3 block text-sm font-semibold">Materi 3</label>
                <input type="text"
                    class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                    id="materi3" name="materi3" placeholder="materi pembicara 3">
            </div>
            <div>
                <label for="pembicara3" class="mb-2 mt-3 block text-sm font-semibold">Pembicara 3</label>
                <input type="text"
                    class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                    id="pembicara3" name="pembicara3" placeholder="nama pembicara 3">
            </div>
            <div>
                <label for="jp3" class="mb-2 mt-3 block text-sm font-semibold">JP 3</label>
                <input type="text"
                    class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                    id="jp3" name="jp3" placeholder="JP pembicara 3">
            </div>
            
            <div>
                <label for="image3" class="mb-2 mt-3 block text-sm font-semibold">Upload TTD Pembicara 3</label>
                <span
                    class="mb-2 block rounded border border-red-400 bg-red-100 px-1.5 py-1.5 text-xs font-medium text-red-800">
                    <i class="ri-information-line"></i> Upload image untuk halaman pendaftaran, Format file .webp dan transparan,
                    Ukuran maksimal 1 MB, Penamaan file nama pembicara diikuti tanggal kegiatan</a></span>
                <Input
                    class="form-control block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 file:me-4 file:border-0 file:bg-[##64748B] file:px-3 file:py-2.5 focus:outline-none disabled:pointer-events-none disabled:opacity-50 dark:text-gray-400"
                    type="file" id="image3" name="image3">
            </div>


            <div>
                <label for="materi1" class="mb-2 mt-3 block text-sm font-semibold">Materi 4</label>
                <input type="text"
                    class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                    id="materi4" name="materi4" placeholder="materi pembicara 4">
            </div>
            <div>
                <label for="pembicara1" class="mb-2 mt-3 block text-sm font-semibold">Pembicara 4</label>
                <input type="text"
                    class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                    id="pembicara4" name="pembicara4" placeholder="nama pembicara 4">
            </div>
            <div>
                <label for="jp4" class="mb-2 mt-3 block text-sm font-semibold">JP 4</label>
                <input type="text"
                    class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                    id="jp4" name="jp4" placeholder="JP pembicara 4">
            </div>
            
            <div>
                <label for="image4" class="mb-2 mt-3 block text-sm font-semibold">Upload TTD Pembicara 4</label>
                <span
                    class="mb-2 block rounded border border-red-400 bg-red-100 px-1.5 py-1.5 text-xs font-medium text-red-800">
                    <i class="ri-information-line"></i> Upload image untuk halaman pendaftaran, Format file .webp dan transparan,
                    Ukuran maksimal 1 MB, Penamaan file nama pembicara diikuti tanggal kegiatan</a></span>
                <Input
                    class="form-control block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 file:me-4 file:border-0 file:bg-[##64748B] file:px-3 file:py-2.5 focus:outline-none disabled:pointer-events-none disabled:opacity-50 dark:text-gray-400"
                    type="file" id="image4" name="image4">
            </div>


            <div>
                <button type="submit"
                    class="mb-2 me-1 mt-5 rounded-lg bg-blue-600  px-4 py-2.5 text-base font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">Buat Halaman Sertifikat</button>
                    <a href="{{ route('adminpendaftaran') }}" class="mb-2 me-1 mt-5 rounded-lg bg-red-600 px-4 py-2.5 text-base font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300">Batal</a>
            </div>
        </form>
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
