@extends('home.home-layouts.home-main-tw')
@section('container')
@include('admin.components.navbar')
@include('admin.components.sidebar')
  <div class="mt-14 p-4 sm:ml-64 bg-slate-100 min-h-svh">
    <div class="max-w-screen-xl mx-auto">
      <div class="mb-5 max-w-screen-xl bg-blue-600 px-5 py-8 rounded-lg">
        <h1 class="mb-1 text-4xl font-extrabold tracking-tight text-white md:text-2xl lg:text-3xl dark:text-white">Edit Sertifikat</h1>
        <p class="text-lg font-normal text-gray-50 lg:text-lg dark:text-gray-400">Edit halaman sertifikat dengan memasukan informasi kegiatan dibawah ini</p>
      </div>
      <form class="row g-3 mt-1" action="{{ route('editdatasertifikat', ['id' => $sertifikat->id]) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <div>
            <input type="hidden" name="header" value="24">
           

            <label for="judul" class="mb-2 mt-3 block font-semibold text-sm">Nama Kegiatan</label>
            <input type="text"
                class="form-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-1.5"
                id="judul" name="judul" placeholder="Nama Kegiatan" required
                value="{{ old('judul', $sertifikat->judul) }}">
        </div>
        <div>
            <label for="slug" class="mb-2 mt-3 block font-semibold text-sm">Slug</label>
            <input type="text"
                class="form-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-1.5"
                id="slug" name="slug" placeholder="pendaftaran13-16mar2024" required
                value="{{ old('slug', $sertifikat->slug) }}">
        </div>

        <div>
            <label for="tanggal" class="mb-2 mt-3 block font-semibold text-sm">tanggal kegiatan</label>
            <input type="text"
                class="form-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-1.5"
                id="tanggal" name="tanggal" placeholder="tanggal"
                value="{{ old('tanggal', $sertifikat->tanggal) }}">
        </div>

        <div>
            <label for="tanggaldibuat" class="mb-2 mt-3 block font-semibold text-sm">tanggal sertifikat dibuat</label>
            <input type="text"
                class="form-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-1.5"
                id="tanggaldibuat" name="tanggaldibuat" placeholder="tanggal sertifikat dibuat (Contoh 1 Juli 2024)"
                value="{{ old('tanggaldibuat', $sertifikat->tanggaldibuat) }}">
        </div>

        <div>
            <label for="nosertif" class="mb-2 mt-3 block font-semibold text-sm">nosertif</label>
            <input type="text"
                class="form-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-1.5"
                id="nosertif" name="nosertif" placeholder="nosertif"
                value="{{ old('nosertif', $sertifikat->nosertif) }}">
        </div>
        
        @if ($jenis === 'webinartim1' || $jenis === 'webinartim2' || $jenis === 'webinarcanva' || $jenis === 'webinargamifikasi' || $jenis === 'webinarenglish' || $jenis === 'webinarpmm')
        <div>
            <label for="materi1" class="mb-2 mt-3 block text-sm font-semibold">Materi 1</label>
            <input type="text"
                class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                id="materi1" name="materi1" placeholder="materi pembicara 1" value="{{ old('materi1', $sertifikat->materi1) }}">
        </div>
        <div>
            <label for="pembicara1" class="mb-2 mt-3 block text-sm font-semibold">Pembicara 1</label>
            <input type="text"
                class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                id="pembicara1" name="pembicara1" placeholder="nama pembicara 1" value="{{ old('pembicara1', $sertifikat->pembicara1) }}">
        </div>
        <div>
            <label for="jabatan1" class="mb-2 mt-3 block text-sm font-semibold">Jabatan Pembicara 1</label>
            <input type="text"
                class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                id="jabatan1" name="jabatan1" placeholder="jabatan pembicara 1" value="{{ old('jabatan1', $sertifikat->jabatan1) }}">
        </div>
        <div>
            <label for="jp1" class="mb-2 mt-3 block text-sm font-semibold">JP 1</label>
            <input type="text"
                class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                id="jp1" name="jp1" placeholder="JP pembicara 1" value="{{ old('jp1', $sertifikat->jp1) }}">
        </div>
        
        <div>
            <label for="image1" class="mb-2 mt-3 block text-sm font-semibold">Upload TTD Pembicara 1</label>
            <span
                class="mb-2 block rounded border border-red-400 bg-red-100 px-1.5 py-1.5 text-xs font-medium text-red-800">
                <i class="ri-information-line"></i> Upload image untuk halaman pendaftaran, Format file .png dan transparan,
                Ukuran maksimal 1 MB, Penamaan file nama pembicara diikuti tanggal kegiatan</a></span>
            @if ($sertifikat->ttd1)
            <div class="mb-2">
                <img src="{{ asset('ttdNarsum/' . $sertifikat->ttd1) . '?' . time() }}" alt="Uploaded Image" class="w-10 h-10 object-cover rounded">
                <button type="button" onclick="deleteImage('{{ $sertifikat->id }}')" class="ml-2 text-sm text-red-600 focus:outline-none">Hapus Gambar</button>
            </div>
            @endif
            <Input
                class="form-control block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 file:me-4 file:border-0 file:bg-[##64748B] file:px-3 file:py-2.5 focus:outline-none disabled:pointer-events-none disabled:opacity-50 dark:text-gray-400"
                type="file" id="image1" name="image1">
        </div>
        @elseif ($jenis === 'diklat')
        <div>
            <label for="materi1" class="mb-2 mt-3 block text-sm font-semibold">Materi 1</label>
            <input type="text"
                class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                id="materi1" name="materi1" placeholder="materi pembicara 1" value="{{ old('materi1', $sertifikat->materi1) }}">
        </div>
        <div>
            <label for="pembicara1" class="mb-2 mt-3 block text-sm font-semibold">Pembicara 1</label>
            <input type="text"
                class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                id="pembicara1" name="pembicara1" placeholder="nama pembicara 1" value="{{ old('pembicara1', $sertifikat->pembicara1) }}">
        </div>
        <div>
            <label for="jabatan1" class="mb-2 mt-3 block text-sm font-semibold">Jabatan Pembicara 1</label>
            <input type="text"
                class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                id="jabatan1" name="jabatan1" placeholder="jabatan pembicara 1" value="{{ old('jabatan1', $sertifikat->jabatan1) }}">
        </div>
        <div>
            <label for="jp1" class="mb-2 mt-3 block text-sm font-semibold">JP 1</label>
            <input type="text"
                class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                id="jp1" name="jp1" placeholder="JP pembicara 1" value="{{ old('jp1', $sertifikat->jp1) }}">
        </div>
        
        <div>
            <label for="image1" class="mb-2 mt-3 block text-sm font-semibold">Upload TTD Pembicara 1</label>
            <span
                class="mb-2 block rounded border border-red-400 bg-red-100 px-1.5 py-1.5 text-xs font-medium text-red-800">
                <i class="ri-information-line"></i> Upload image untuk halaman pendaftaran, Format file .png dan transparan,
                Ukuran maksimal 1 MB, Penamaan file nama pembicara diikuti tanggal kegiatan</a></span>
            @if ($sertifikat->ttd1)
            <div class="mb-2">
                <img src="{{ asset('ttdNarsum/' . $sertifikat->ttd1) . '?' . time() }}" alt="Uploaded Image" class="w-10 h-10 object-cover rounded">
                <button type="button" onclick="deleteImage('{{ $sertifikat->id }}')" class="ml-2 text-sm text-red-600 focus:outline-none">Hapus Gambar</button>
            </div>
            @endif
            <Input
                class="form-control block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 file:me-4 file:border-0 file:bg-[##64748B] file:px-3 file:py-2.5 focus:outline-none disabled:pointer-events-none disabled:opacity-50 dark:text-gray-400"
                type="file" id="image1" name="image1">
        </div>


        <div>
            <label for="materi2" class="mb-2 mt-3 block text-sm font-semibold">Materi 2</label>
            <input type="text"
                class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                id="materi2" name="materi2" placeholder="materi pembicara 2" value="{{ old('materi2', $sertifikat->materi2) }}">
        </div>
        <div>
            <label for="pembicara2" class="mb-2 mt-3 block text-sm font-semibold">Pembicara 2</label>
            <input type="text"
                class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                id="pembicara2" name="pembicara2" placeholder="nama pembicara 2" value="{{ old('pembicara2', $sertifikat->pembicara2) }}">
        </div>
        <div>
            <label for="jabatan2" class="mb-2 mt-3 block text-sm font-semibold">Jabatan Pembicara 2</label>
            <input type="text"
                class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                id="jabatan2" name="jabatan2" placeholder="jabatan pembicara 2" value="{{ old('jabatan2', $sertifikat->jabatan2) }}">
        </div>
        <div>
            <label for="jp2" class="mb-2 mt-3 block text-sm font-semibold">JP 2</label>
            <input type="text"
                class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                id="jp2" name="jp2" placeholder="JP pembicara 2" value="{{ old('jp2', $sertifikat->jp2) }}">
        </div>
        
        <div>
            <label for="image2" class="mb-2 mt-3 block text-sm font-semibold">Upload TTD Pembicara 2</label>
            <span
                class="mb-2 block rounded border border-red-400 bg-red-100 px-1.5 py-1.5 text-xs font-medium text-red-800">
                <i class="ri-information-line"></i> Upload image untuk halaman pendaftaran, Format file .png dan transparan,
                Ukuran maksimal 1 MB, Penamaan file nama pembicara diikuti tanggal kegiatan</a></span>
            <Input
                class="form-control block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 file:me-4 file:border-0 file:bg-[##64748B] file:px-3 file:py-2.5 focus:outline-none disabled:pointer-events-none disabled:opacity-50 dark:text-gray-400"
                type="file" id="image2" name="image2">
        </div>

        <div>
            <label for="materi3" class="mb-2 mt-3 block text-sm font-semibold">Materi 3</label>
            <input type="text"
                class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                id="materi3" name="materi3" placeholder="materi pembicara 3" value="{{ old('materi3', $sertifikat->materi3) }}">
        </div>
        <div>
            <label for="pembicara3" class="mb-2 mt-3 block text-sm font-semibold">Pembicara 3</label>
            <input type="text"
                class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                id="pembicara3" name="pembicara3" placeholder="nama pembicara 3" value="{{ old('pembicara3', $sertifikat->pembicara3) }}">
        </div>
        <div>
            <label for="jabatan3" class="mb-2 mt-3 block text-sm font-semibold">Jabatan Pembicara 3</label>
            <input type="text"
                class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                id="jabatan3" name="jabatan3" placeholder="jabatan pembicara 3" value="{{ old('jabatan3', $sertifikat->jabatan3) }}">
        </div>
        <div>
            <label for="jp3" class="mb-2 mt-3 block text-sm font-semibold">JP 3</label>
            <input type="text"
                class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                id="jp3" name="jp3" placeholder="JP pembicara 3" value="{{ old('jp3', $sertifikat->jp3) }}">
        </div>
        
        <div>
            <label for="image3" class="mb-2 mt-3 block text-sm font-semibold">Upload TTD Pembicara 3</label>
            <span
                class="mb-2 block rounded border border-red-400 bg-red-100 px-1.5 py-1.5 text-xs font-medium text-red-800">
                <i class="ri-information-line"></i> Upload image untuk halaman pendaftaran, Format file .png dan transparan,
                Ukuran maksimal 1 MB, Penamaan file nama pembicara diikuti tanggal kegiatan</a></span>
            <Input
                class="form-control block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 file:me-4 file:border-0 file:bg-[##64748B] file:px-3 file:py-2.5 focus:outline-none disabled:pointer-events-none disabled:opacity-50 dark:text-gray-400"
                type="file" id="image3" name="image3">
        </div>


        <div>
            <label for="materi4" class="mb-2 mt-3 block text-sm font-semibold">Materi 4</label>
            <input type="text"
                class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                id="materi4" name="materi4" placeholder="materi pembicara 4" value="{{ old('materi4', $sertifikat->materi4) }}">
        </div>
        <div>
            <label for="pembicara4" class="mb-2 mt-3 block text-sm font-semibold">Pembicara 4</label>
            <input type="text"
                class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                id="pembicara4" name="pembicara4" placeholder="nama pembicara 4" value="{{ old('pembicara4', $sertifikat->pembicara4) }}">
        </div>
        <div>
            <label for="jabatan4" class="mb-2 mt-3 block text-sm font-semibold">Jabatan Pembicara 4</label>
            <input type="text"
                class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                id="jabatan4" name="jabatan4" placeholder="jabatan pembicara 4" value="{{ old('jabatan4', $sertifikat->jabatan4) }}">
        </div>
        <div>
            <label for="jp4" class="mb-2 mt-3 block text-sm font-semibold">JP 4</label>
            <input type="text"
                class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                id="jp4" name="jp4" placeholder="JP pembicara 4" value="{{ old('jp4', $sertifikat->jp4) }}">
        </div>
        
        <div>
            <label for="image4" class="mb-2 mt-3 block text-sm font-semibold">Upload TTD Pembicara 4</label>
            <span
                class="mb-2 block rounded border border-red-400 bg-red-100 px-1.5 py-1.5 text-xs font-medium text-red-800">
                <i class="ri-information-line"></i> Upload image untuk halaman pendaftaran, Format file .png dan transparan,
                Ukuran maksimal 1 MB, Penamaan file nama pembicara diikuti tanggal kegiatan</a></span>
            <Input
                class="form-control block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 file:me-4 file:border-0 file:bg-[##64748B] file:px-3 file:py-2.5 focus:outline-none disabled:pointer-events-none disabled:opacity-50 dark:text-gray-400"
                type="file" id="image4" name="image4">
        </div>
        @else
            <div>Jenis tidak dikenal</div>
        @endif

        


        <div>
            <button type="submit"
                class="mb-2 me-1 mt-5 rounded-lg bg-blue-600 px-4 py-2.5 text-base font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">Simpan Perubahan</button>
                <a href="{{ route('adminpendaftaran') }}" class="mb-2 me-1 mt-5 rounded-lg bg-red-600 px-4 py-2.5 text-base font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300">Batal</a>
            </div>
    </form>


    <script>
        function deleteImage(id) {
            if (confirm('Anda yakin ingin menghapus gambar ini?')) {
                document.getElementById('deleteForm').submit();
            }
        }


        document.addEventListener("DOMContentLoaded", function() {
        
            const inputFile = document.getElementById('image1');
            const imageExists = {!! json_encode($sertifikat->ttd1 ? true : false) !!};

        
            if (imageExists) {
                inputFile.style.display = 'none';
            } else {
                inputFile.style.display = 'block';
            }
        });
    </script>

    </div>
  </div>
@endsection
