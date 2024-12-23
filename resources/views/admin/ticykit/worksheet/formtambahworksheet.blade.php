@extends('home.home-layouts.home-main-tw')
@section('container')
    @include('admin.components.navbar')
    @include('admin.components.sidebar')
    <div class="mt-14 bg-slate-100 p-4 sm:ml-64">
        <div class="mx-auto max-w-screen-xl">
            <div class="mb-5 max-w-screen-xl rounded-lg bg-blue-600 px-5 py-8">
                <h1 class="mb-1 text-4xl font-extrabold tracking-tight text-white dark:text-white md:text-2xl lg:text-3xl">
                    Tambah Worksheet</h1>
                <p class="text-lg font-normal text-gray-50 dark:text-gray-400 lg:text-lg">Tambahkan worksheet baru
                    dengan memasukan informasi kegiatan dibawah ini</p>
            </div>
            <form class="row g-3 mt-1" action="{{ route('tambahdataworksheet') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div>
                    <input type="hidden" name="header" value="24">
                    <label for="judul" class="mb-2 mt-3 block text-sm font-semibold">Nama Worksheet</label>
                    <input type="text"
                        class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                        id="judul" name="judul" placeholder="Nama Worksheet" required>
                </div>
                
                
                <div>
                    <label for="kelas" class="mb-2 mt-3 block text-sm font-semibold">Kelas</label>
                    <select
                        class="form-select block w-full rounded-lg border border-gray-300 bg-gray-50 px-1.5 py-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                        aria-label="Default select example" name="kelas">
                        <option value="TK">TK</option>
                        <option value="SD">SD</option>
                    </select>
                </div>

                <div>
                    <label for="matapelajaran" class="mb-2 mt-3 block text-sm font-semibold">Mata Pelajaran</label>
                    <input type="text"
                        class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                        id="matapelajaran" name="matapelajaran" placeholder="Contoh: Bahasa Indonesia" required>
                </div>
           
                <div>
                    <label for="image1" class="mb-2 mt-3 block text-sm font-semibold">Upload Pamflet Pendaftaran
                        (Potrait)</label>
                    <span
                        class="mb-2 block rounded border border-red-400 bg-red-100 px-1.5 py-1.5 text-xs font-medium text-red-800">
                        <i class="ri-information-line"></i> Upload image untuk halaman pendaftaran, Format file .webp,
                        Ukuran maksimal 1 MB, Penamaan file sama seperti slug</a></span>
                    <Input
                        class="form-control block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 file:me-4 file:border-0 file:bg-[##64748B] file:px-3 file:py-2.5 focus:outline-none disabled:pointer-events-none disabled:opacity-50 dark:text-gray-400"
                        type="file" id="image1" name="image1">
                </div>

                <div>
                    <label for="file1" class="mb-2 mt-3 block text-sm font-semibold">Upload File Worksheet</label>
                    <span
                        class="mb-2 block rounded border border-red-400 bg-red-100 px-1.5 py-1.5 text-xs font-medium text-red-800">
                        <i class="ri-information-line"></i> Upload image untuk halaman pendaftaran, Format file .pdf,
                        Ukuran maksimal 1 MB, Penamaan file sama seperti slug</a></span>
                    <Input
                        class="form-control block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 file:me-4 file:border-0 file:bg-[##64748B] file:px-3 file:py-2.5 focus:outline-none disabled:pointer-events-none disabled:opacity-50 dark:text-gray-400"
                        type="file" id="file1" name="file1">
                </div>
                
                
                
                
                
                



                
                {{-- <div>
                    <label for="image2" class="mb-2 mt-3 block font-semibold text-[#64748B]">Upload image untuk halaman
                        event, format webp dengan ukuran maksimal 1Mb, dengan penamaan file sama seperti slug tetapi kata
                        pendaftaran diganti event</label>
                    <Input
                        class="form-control block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 file:me-4 file:border-0 file:bg-[##64748B] file:px-3 file:py-2.5 focus:outline-none disabled:pointer-events-none disabled:opacity-50 dark:text-gray-400"
                        type="file" id="image2" name="image2">
                </div> --}}
                
                
                <div>
                    <button type="submit"
                        class="mb-2 me-1 mt-5 rounded-lg bg-blue-600 px-4 py-2.5 text-base font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">Buat
                        Pendaftaran
                    </button>
                    <a href="{{ route('adminpendaftaran') }}"
                        class="mb-2 me-1 mt-5 rounded-lg bg-red-600 px-4 py-2.5 text-base font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection
