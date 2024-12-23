@extends('home.home-layouts.home-main-tw')
@section('container')
@include('admin.components.navbar')
@include('admin.components.sidebar')
<div class="mt-14 p-4 sm:ml-64 bg-slate-100">
    <div class="max-w-screen-xl mx-auto">
        <div class="mb-5 max-w-screen-xl bg-blue-600 px-5 py-8 rounded-lg">
            <h1 class="mb-1 text-4xl font-extrabold tracking-tight text-white md:text-2xl lg:text-3xl dark:text-white">Edit Pendaftaran</h1>
            <p class="text-lg font-normal text-gray-50 lg:text-lg dark:text-gray-400">Edit halaman pendaftaran dengan memasukkan informasi kegiatan di bawah ini</p>
        </div>
        <form class="row g-3 mt-1" action="{{ route('editdatapendaftaran', ['id' => $pendaftaran->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <input type="hidden" name="header" value="24">
                
                <label for="judul" class="mb-2 mt-3 block font-semibold text-sm">Nama Kegiatan</label>
                <input type="text" class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" id="judul" name="judul" placeholder="Nama Kegiatan" required value="{{ old('judul', $pendaftaran->judul) }}">
            </div>
            <div>
                <label for="slug" class="mb-2 mt-3 block font-semibold text-sm">Slug</label>
                <input type="text" class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" id="slug" name="slug" placeholder="pendaftaran13-16mar2024" required value="{{ old('slug', $pendaftaran->slug) }}">
            </div>
            <div>
                <label for="jenis" class="mb-2 mt-3 block font-semibold text-sm">Jenis kegiatan</label>
                <select class="form-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-1.5" aria-label="Default select example" name="jenis">
                    <option value="diklat" {{ $pendaftaran->jenis == 'diklat' ? 'selected' : '' }}>Diklat</option>
                    <option value="webinartim1" {{ $pendaftaran->jenis == 'webinartim1' ? 'selected' : '' }}>Webinar Tim 1</option>
                    <option value="webinartim1" {{ $pendaftaran->jenis == 'webinartim2' ? 'selected' : '' }}>Webinar Tim 1</option>
                    <option value="webinarenglish" {{ $pendaftaran->jenis == 'webinarenglish' ? 'selected' : '' }}>Webinar English</option>
                    <option value="webinarcanva" {{ $pendaftaran->jenis == 'webinarcanva' ? 'selected' : '' }}>Webinar Canva</option>
                    <option value="webinargamifikasi" {{ $pendaftaran->jenis == 'webinargamifikasi' ? 'selected' : '' }}>Webinar gamifikasi</option>
                    <option value="webinarpmm" {{ $pendaftaran->jenis == 'webinarpmm' ? 'selected' : '' }}>Webinar PMM</option>
                    <option value="workshop" {{ $pendaftaran->jenis == 'workshop' ? 'selected' : '' }}>Workshop</option>
                </select>
            </div>
            <div>
                <label for="image1" class="mb-2 mt-3 block text-sm font-semibold">Upload Pamflet Pendaftaran (Potrait)</label>
                <span
                        class="mb-2 block rounded border border-red-400 bg-red-100 px-1.5 py-1.5 text-xs font-medium text-red-800">
                        <i class="ri-information-line"></i> Upload image untuk halaman pendaftaran, Format file .webp,
                        Ukuran maksimal 1 MB, Penamaan file sama seperti slug</a></span>
                @if ($pendaftaran->image)
                <div class="mb-2">
                    <img src="{{ asset('pendaftaran/' . $pendaftaran->image) . '?' . time() }}" alt="Uploaded Image" class="w-10 h-10 object-cover rounded">
                    <button type="button" onclick="deleteImage('{{ $pendaftaran->id }}')" class="ml-2 text-sm text-red-600 focus:outline-none">Hapus Gambar</button>
                </div>
                @endif
                <input class="form-control block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 file:me-4 file:border-0 file:bg-[#64748B] file:px-3 file:py-2.5 focus:outline-none disabled:pointer-events-none disabled:opacity-50 dark:text-gray-400" type="file" id="image1" name="image1">
            </div>
            <div>
                <label for="kegiatan" class="mb-2 mt-3 block font-semibold text-sm">kegiatan</label>
                <input type="text" class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" id="kegiatan" name="kegiatan" placeholder="Nama kegiatan (tanpa tanggal)" required value="{{ old('kegiatan', $pendaftaran->kegiatan) }}">
            </div>
            <div>
                <label for="fasilitas" class="mb-2 mt-3 block font-semibold text-sm">Fasilitas</label>
                <input type="text" class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" id="fasilitas" name="fasilitas" placeholder="Link fasilitas" required value="{{ old('fasilitas', $pendaftaran->fasilitas) }}">
            </div>
            <div>
                <label for="pmm" class="mb-2 mt-3 block font-semibold text-sm">Link PMM</label>
                <input type="text" class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" id="pmm" name="pmm" placeholder="Link PMM" value="{{ old('pmm', $pendaftaran->pmm) }}">
            </div>
            <div>
                <label for="telegram" class="mb-2 mt-3 block font-semibold text-sm">Link Telegram</label>
                <input type="text" class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" id="telegram" name="telegram" placeholder="link telegram" value="{{ old('telegram', $pendaftaran->telegram) }}">
            </div>
            <div>
                <label for="linktree" class="mb-2 mt-3 block font-semibold text-sm">Link Linktree</label>
                <input type="text" class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" id="linktree" name="linktree" placeholder="link linktree" value="{{ old('linktree', $pendaftaran->linktree) }}">
            </div>
            <div>
                <label for="dibuka" class="mb-2 mt-3 block font-semibold text-sm">Dibuka</label>
                <select class="form-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-1.5" aria-label="Default select example" name="dibuka">
                    <option value="1" {{ $pendaftaran->dibuka == '1' ? 'selected' : '' }}>Dibuka</option>
                    <option value="0" {{ $pendaftaran->dibuka == '0' ? 'selected' : '' }}>Ditutup</option>
                </select>
            </div>

            <div>
                <button type="submit" class="mb-2 me-1 mt-5 rounded-lg bg-blue-600 px-4 py-2.5 text-base font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">Simpan Perubahan</button>
                <a href="{{ route('adminpendaftaran') }}" class="mb-2 me-1 mt-5 rounded-lg bg-red-600 px-4 py-2.5 text-base font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300">Batal</a>
            </div>
        </form>

        
        <form id="deleteForm" action="{{ route('hapusgambarpendaftaran', ['id' => $pendaftaran->id]) }}" method="POST">
            @csrf
            @method('DELETE')
        </form>

        
        <script>
            function deleteImage(id) {
                if (confirm('Anda yakin ingin menghapus gambar ini?')) {
                    document.getElementById('deleteForm').submit();
                }
            }


            document.addEventListener("DOMContentLoaded", function() {
            
                const inputFile = document.getElementById('image1');
                const imageExists = {!! json_encode($pendaftaran->image ? true : false) !!};

            
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
{{-- @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div>
    <form class="row g-3 mt-1" action="{{ route('editdatapendaftaran', ['id' => $pendaftaran->id]) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <div>
            <input type="hidden" name="header" value="24">
            <input type="hidden" name="jenis" value="diklat">
            <label for="judul" class="mb-2 mt-3 block font-semibold text-[#64748B]">Nama Kegiatan</label>
            <input type="text"
                class="form-control mb-4 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                id="judul" name="judul" placeholder="Nama Kegiatan" required
                value="{{ old('judul', $pendaftaran->judul) }}">
        </div>
        <div>
            <label for="slug" class="mb-2 mt-3 block font-semibold text-[#64748B]">Slug</label>
            <input type="text"
                class="form-control block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                id="slug" name="slug" placeholder="pendaftaran13-16mar2024" required
                value="{{ old('slug', $pendaftaran->slug) }}">
        </div>
        <div>
            <label for="kegiatan class="mb-2 mt-3 block font-semibold text-[#64748B]">kegiatan</label>
            <input type="text"
                class="form-control block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                id="kegiatan" name="kegiatan" placeholder="Nama kegiatan (tanpa tanggal)" required
                value="{{ old('slug', $pendaftaran->kegiatan) }}">
        </div>
        <div>
            <label for="fasilitas" class="mb-2 mt-3 block font-semibold text-[#64748B]">Fasilitas</label>
            <input type="text"
                class="form-control block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                id="fasilitas" name="fasilitas" placeholder="Link fasilitas" required
                value="{{ old('gasilitas', $pendaftaran->fasilitas) }}">
        </div>
        <div>
            <label for="pmm" class="mb-2 mt-3 block font-semibold text-[#64748B]">Link PMM"</label>
            <input type="text"
                class="form-control block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                id="pmm" name="pmm" placeholder="Link PMM" value="{{ old('pmm', $pendaftaran->pmm) }}">
        </div>
        <div>
            <label for="telegram" class="mb-2 mt-3 block font-semibold text-[#64748B]">Link Telegram</label>
            <input type="text"
                class="form-control block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                id="telegram" name="telegram" placeholder="link telegram"
                value="{{ old('telegram', $pendaftaran->telegram) }}">
        </div>
        <div>
            <label for="linktree" class="mb-2 mt-3 block font-semibold text-[#64748B]">Link Linktree</label>
            <input type="text"
                class="form-control block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                id="linktree" name="linktree" placeholder="link linktree"
                value="{{ old('linktree', $pendaftaran->linktree) }}">
        </div>
        <div>
            <label for="dibuka" class="mb-2 mt-3 block font-semibold text-[#64748B]">Dibuka</label>
            <select
                class="form-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-1.5"
                aria-label="Default select example" name="dibuka">
                <option value="1" {{ $pendaftaran->dibuka == '1' ? 'selected' : '' }}>dibuka</option>
                <option value="0" {{ $pendaftaran->dibuka == '0' ? 'selected' : '' }}>ditutup</option>
            </select>
        </div>
        <div>
            <button type="submit"
                class="mb-2 me-2 mt-5 rounded-lg bg-[#196ECD] px-4 py-2.5 text-base font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">Edit</button>
        </div>
        <div>
            <a href="{{ route('adminpendaftaran') }}">
                back
            </a>
        </div>
    </form>
</div> --}}