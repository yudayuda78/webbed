@extends('home.home-layouts.home-main-tw')
@section('container')
    @include('admin.components.navbar')
    @include('admin.components.sidebar')
    <div class="mt-14 bg-slate-100 p-4 sm:ml-64">
        <div class="mx-auto max-w-screen-xl">
            <div class="mb-5 max-w-screen-xl rounded-lg bg-blue-600 px-5 py-8">
                <h1 class="mb-1 text-4xl font-extrabold tracking-tight text-white dark:text-white md:text-2xl lg:text-3xl">
                    Tambah Pendaftaran</h1>
                <p class="text-lg font-normal text-gray-50 dark:text-gray-400 lg:text-lg">Buat halaman pendaftaran baru
                    dengan memasukan informasi kegiatan dibawah ini</p>
            </div>
            <form class="row g-3 mt-1" action="{{ route('tambahdatapendaftaran') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div>
                    <input type="hidden" name="header" value="24">
                    <label for="judul" class="mb-2 mt-3 block text-sm font-semibold">Nama Kegiatan</label>
                    <input type="text"
                        class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                        id="judul" name="judul" placeholder="Nama Kegiatan" required>
                </div>
                <div>
                    <label for="kegiatan" class="mb-2 mt-3 block text-sm font-semibold">Kegiatan</label>
                    <input type="text"
                        class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                        id="kegiatan" name="kegiatan" placeholder="Nama kegiatan (tanpa tanggal)" required>
                </div>
                <div>
                    <label for="slug" class="mb-2 mt-3 block text-sm font-semibold">Slug</label>
                    <input type="text"
                        class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                        id="slug" name="slug" placeholder="pendaftaran13-16mar2024" required>
                </div>
                <div>
                    <label for="jenis" class="mb-2 mt-3 block text-sm font-semibold">Jenis</label>
                    <select
                        class="form-select block w-full rounded-lg border border-gray-300 bg-gray-50 px-1.5 py-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                        aria-label="Default select example" name="jenis">
                        <option value="diklat">Diklat</option>
                        <option value="webinartim1">Webinar Tim 1</option>
                        <option value="webinartim2">Webinar Tim 2</option>
                        <option value="webinarenglish">Webinar English</option>
                        <option value="webinarcanva">Webinar Canva</option>
                        <option value="webinargamifikasi">Webinar Gamifikasi</option>
                        <option value="webinarpmm">Webinar PMM</option>
                        <option value="webinar2">Webinar Slidecenter</option>
                        <option value="workshop">Workshop</option>
                    </select>
                </div>
                <div>
                    <label for="tim" class="mb-2 mt-3 block text-sm font-semibold">Tim</label>
                    <select
                        class="form-select block w-full rounded-lg border border-gray-300 bg-gray-50 px-1.5 py-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                        aria-label="Default select example" name="tim">
                        <option value="tim1">Tim 1</option>
                        <option value="tim2">Tim 2</option>
                        <option value="gamifikasi">Gamifikasi</option>
                        <option value="english">English</option>
                        <option value="canva">Canva</option>
                        <option value="slidecenter">Slidecenter</option>
                    </select>
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
                    <label for="fasilitas" class="mb-2 mt-3 block text-sm font-semibold">Fasilitas</label>
                    <input type="text"
                        class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                        id="fasilitas" name="fasilitas" placeholder="Link fasilitas" required>
                </div>
                <div>
                    <label for="pmm" class="mb-2 mt-3 block text-sm font-semibold">Link PMM</label>
                    <input type="text"
                        class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                        id="pmm" name="pmm" placeholder="Link PMM">
                </div>
                <div>
                    <label for="telegram" class="mb-2 mt-3 block text-sm font-semibold">Link Telegram</label>
                    <input type="text"
                        class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                        id="telegram" name="telegram" placeholder="link telegram">
                </div>
                <div>
                    <label for="linktree" class="mb-2 mt-3 block text-sm font-semibold">Link Linktree</label>
                    <input type="text"
                        class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                        id="linktree" name="linktree" placeholder="link linktree">
                </div>
                <div>
                    <label for="dibuka" class="mb-2 mt-3 block text-sm font-semibold">Dibuka</label>
                    <select
                        class="form-select block w-full rounded-lg border border-gray-300 bg-gray-50 px-1.5 py-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                        aria-label="Default select example" name="dibuka">
                        <option value="1">Dibuka</option>
                        <option value="0">Ditutup</option>
                    </select>
                </div>
                <div>
                    <label for="jam" class="mb-2 mt-3 block text-sm font-semibold">Jam Pelaksanaan</label>
                    <select
                        class="form-select block w-full rounded-lg border border-gray-300 bg-gray-50 px-1.5 py-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                        aria-label="Default select example" name="jam">
                        <option value="">Pilih Waktu</option>
                        <option value="15.30-17.00">15.30-17.00</option>
                        <option value="19.30-21.00">19.30-21.00</option>
                    </select>
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
