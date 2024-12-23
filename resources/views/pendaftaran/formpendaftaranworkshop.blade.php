@php
    $tanggal = $pendaftaran->judul;
    $pattern = '/\((.*?)\)/';
    preg_match($pattern, $tanggal, $matches);
    $exportTanggal = $matches[1] ?? '';
@endphp

@extends('home.home-layouts.home-main-tw')
@section('container')
    <div class="bg-gray-50">
        <div class="md:pb-13 pb-8">
            @include('home.home-layouts.tw-home-navbar')
        </div>
        <div class="mx-auto flex max-w-[90%] flex-col justify-between gap-4 pb-7 md:max-w-main md:flex-row">
            <div class="max-w-[546px]">
                <h1 class="mb-1 text-base text-slate-500 md:mb-1.5 md:text-xl">Pendaftaran</h1>
                <h2 class="text-xl font-bold leading-tight md:text-[28px]">{{ $pendaftaran->kegiatan }}</h2>
                <div class="mb-5 mt-4 flex flex-col gap-2 text-center md:mb-7 md:flex-row">
                    <p
                        class="w-full rounded-full border border-[#196ECD] bg-[#196ECD] px-3 py-1 text-sm text-white md:w-fit">
                        <i class="ri-calendar-schedule-line"></i> {{ $exportTanggal }}
                    </p>
                    <p class="w-full rounded-full border border-[#196ECD] px-3 py-1 text-sm md:w-fit">
                        <i class="ri-team-line text-[#196ECD]"></i> {{ $jumlahdaftar }} Pendaftar
                    </p>
                    <p class="w-full rounded-full border border-[#196ECD] px-3 py-1 text-sm md:w-fit">
                        <i class="ri-video-line text-red-500"></i> Zoom & YouTube
                    </p>
                </div>
                <img class="rounded-lg" src="{{ asset('pendaftaran/' . $pendaftaran->image) . '?' . time() }}">
            </div>
            <div>
                <div
                    class="mb-2 block h-fit w-full rounded-lg bg-white shadow dark:border dark:border-gray-700 dark:bg-gray-800 md:mt-0 md:w-[570px] xl:p-0">
                    <div class="space-y-4 p-6 sm:p-8 md:space-y-5">
                        <div>
                            <h1 class="mb-1 text-xl font-bold text-gray-900 dark:text-white md:text-2xl">
                                Daftar Sekarang!
                            </h1>
                            <p class="text-sm text-gray-500">Pastikan data diri sudah benar karena untuk keperluan
                                administrasi</p>
                        </div>
                        <form class="space-y-4 md:space-y-6" action="/pendaftaran/tambahdata" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @if ($errors->any())
                                <div id="toast-danger"
                                    class="flex w-full items-center rounded-lg bg-white p-4 text-gray-500 shadow dark:bg-gray-800 dark:text-gray-400"
                                    role="alert">
                                    <div
                                        class="inline-flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-red-100 text-red-500 dark:bg-red-800 dark:text-red-200">
                                        <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
                                        </svg>
                                        <span class="sr-only">Error icon</span>
                                    </div>
                                    <div class="ms-3 text-sm font-normal">
                                        @foreach ($errors->all() as $error)
                                            {{ $error }} <br>
                                        @endforeach
                                    </div>
                                    <button type="button"
                                        class="-mx-1.5 -my-1.5 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-white p-1.5 text-gray-400 hover:bg-gray-100 hover:text-gray-900 focus:ring-2 focus:ring-gray-300 dark:bg-gray-800 dark:text-gray-500 dark:hover:bg-gray-700 dark:hover:text-white"
                                        data-dismiss-target="#toast-danger" aria-label="Close">
                                        <span class="sr-only">Close</span>
                                        <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                    </button>
                                </div>
                                {{-- <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        document.getElementById('errorModal').classList.remove('hidden');
                                    });
                                </script> --}}
                            @endif
                            <input type="hidden" name="judul" value="{{ $pendaftaran->judul }}">
                            <input type="hidden" name="slug" value="{{ $pendaftaran->slug }}">
                            <input type="hidden" name="kegiatan" value="{{ $pendaftaran->kegiatan }}">
                            <input type="hidden" name="fasilitas" value="{{ $pendaftaran->fasilitas }}">
                            <input type="hidden" name="jenis" value="{{ $pendaftaran->jenis }}">

                            <div class="grid grid-cols-1 gap-3 md:grid-cols-2 md:gap-4">
                                <div>
                                    <label for="nama"
                                        class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nama
                                        lengkap & Gelar</label>
                                    <input type="text" name="nama" id="nama"
                                        class="focus:ring-primary-600 focus:border-primary-600 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500 sm:text-sm"
                                        placeholder="Cth. Lawu Arunawang, S.Pd" required="">
                                </div>
                                <div>
                                    <label for="instansi"
                                        class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Instansi</label>
                                    <input type="text" name="instansi" id="instansi"
                                        class="focus:ring-primary-600 focus:border-primary-600 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500 sm:text-sm"
                                        placeholder="Cth. SMA 1 Semarang" required="">
                                </div>
                                <div>
                                    <label for="whatsapp"
                                        class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nomor
                                        WhatsApp (Diawali 0)</label>
                                    <input type="text" name="whatsapp" id="whatsapp"
                                        class="focus:ring-primary-600 focus:border-primary-600 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500 sm:text-sm"
                                        placeholder="Cth. 081234567890" required="">
                                </div>
                                <div>
                                    <label for="email"
                                        class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                    <input type="email" name="email" id="email"
                                        class="focus:ring-primary-600 focus:border-primary-600 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500 sm:text-sm"
                                        placeholder="Cth. lawu@gmail.com" required="">
                                </div>
                                <div>
                                    <label for="profesi"
                                        class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Profesi</label>
                                    <select id="profesi" name="profesi"
                                        class="focus:ring-primary-600 focus:border-primary-600 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500 sm:text-sm"
                                        required>
                                        <option selected value="">Pilih Profesi</option>
                                        <option value="Gurutk">Guru TK/PAUD</option>
                                        <option value="Gurusd">Guru SD/MI</option>
                                        <option value="Gurusmp">Guru SMP/MTS</option>
                                        <option value="Gurusma">Guru SMA/SMK/MA Sederajat</option>
                                        <option value="Kepala Sekolah">Kepala Sekolah</option>
                                        <option value="Pengawas Sekolah">Pengawas Sekolah</option>
                                        <option value="Dosen">Dosen</option>
                                        <option value="Mahasiswa">Mahasiswa</option>
                                        <option value="Umum">Umum</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="provinsi"
                                        class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Domisili</label>
                                    <select id="provinsi" name="provinsi"
                                        class="focus:ring-primary-600 focus:border-primary-600 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500 sm:text-sm"
                                        required>
                                        <option selected value="">Pilih Provinsi</option>
                                        <option value="Nanggroe Aceh Darussalam">Nanggroe Aceh Darussalam</option>
                                        <option value="Sumatera Utara">Sumatera Utara</option>
                                        <option value="Sumatera Selatan">Sumatera Selatan</option>
                                        <option value="Sumatera Barat">Sumatera Barat</option>
                                        <option value="Bengkulu">Bengkulu</option>
                                        <option value="Riau">Riau</option>
                                        <option value="Kepulauan Riau">Kepulauan Riau</option>
                                        <option value="Jambi">Jambi</option>
                                        <option value="Lampung">Lampung</option>
                                        <option value="Bangka Belitung">Bangka Belitung</option>
                                        <option value="Kalimantan Barat">Kalimantan Barat</option>
                                        <option value="Kalimantan Timur">Kalimantan Timur</option>
                                        <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                                        <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                                        <option value="Kalimantan Utara">Kalimantan Utara</option>
                                        <option value="Banten">Banten</option>
                                        <option value="DKI Jakarta">DKI Jakarta</option>
                                        <option value="Jawa Barat">Jawa Barat</option>
                                        <option value="Jawa Tengah">Jawa Tengah</option>
                                        <option value="Jawa Timur">Jawa Timur</option>
                                        <option value="Daerah Istimewa Yogyakarta">Daerah Istimewa Yogyakarta</option>
                                        <option value="Bali">Bali</option>
                                        <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                                        <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                                        <option value="Gorontalo">Gorontalo</option>
                                        <option value="Sulawesi Barat">Sulawesi Barat</option>
                                        <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                                        <option value="Sulawesi Utara">Sulawesi Utara</option>
                                        <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                                        <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                                        <option value="Maluku Utara">Maluku Utara</option>
                                        <option value="Maluku">Maluku</option>
                                        <option value="Papua Barat">Papua Barat</option>
                                        <option value="Papua">Papua</option>
                                        <option value="Papua Tengah">Papua Tengah</option>
                                        <option value="Papua Pegunungan">Papua Pegunungan</option>
                                        <option value="Papua Selatan">Papua Selatan</option>
                                        <option value="Papua Barat Daya">Papua Barat Daya</option>
                                    </select>
                                </div>
                            </div>
                            
                            
                            <button type="submit"
                                class="hover:bg-primary-700 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 w-full rounded-lg bg-blue-600 px-5 py-2.5 text-center text-sm font-medium text-white focus:outline-none focus:ring-4">Daftar
                                Sekarang</button>
                        </form>
                    </div>
                </div>
                <div
                    class="block h-fit rounded-lg bg-white shadow dark:border dark:border-gray-700 dark:bg-gray-800 md:mt-0 md:w-[564px] xl:p-0">
                    <div class="space-y-4 p-6 sm:px-8 sm:py-5">
                        <p class="text-sm text-slate-600">Sudah daftar tapi belum masuk grup kegiatan? Gabung dulu <a
                                class="font-bold text-[#196ECD]" href="{{ $pendaftaran->linktree }}">Disini</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="errorModal" class="modal fixed left-0 top-0 hidden h-full w-full items-center justify-center">
        <div class="modal-overlay absolute h-full w-full bg-gray-900 opacity-50"></div>
        <div class="modal-container z-50 mx-auto w-11/12 overflow-y-auto rounded bg-white shadow-lg md:max-w-md">
            <div class="modal-content px-6 py-4 text-left">
                <div class="flex items-center justify-between pb-3">
                    <div class="modal-close z-50 cursor-pointer">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18"
                            height="18" viewBox="0 0 18 18">
                            <path
                                d="M14.53 3.47a.75.75 0 00-1.06 0L9 7.94 4.53 3.47a.75.75 0 10-1.06 1.06L7.94 9 3.47 13.47a.75.75 0 101.06 1.06L9 10.06l4.47 4.47a.75.75 0 101.06-1.06L10.06 9l4.47-4.47a.75.75 0 000-1.06z">
                            </path>
                        </svg>
                    </div>
                </div>
                <p>Nomor WhatsApp sudah terdaftar.</p>
                <div class="flex justify-end pt-2">
                    <button class="modal-close rounded-lg bg-blue-500 p-3 px-4 text-white hover:bg-blue-400">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-gray-50">
        <div class="mx-auto max-w-main">
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9697129609724227"
                crossorigin="anonymous"></script>
            <!-- Horizontal Pendaftaran -->
            <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-9697129609724227"
                data-ad-slot="6229090058" data-ad-format="auto" data-full-width-responsive="true"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
    </div>

    @include('home.home-layouts.tw-home-footer')

    <script>
        document.querySelectorAll('.modal-close').forEach(function(element) {
            element.addEventListener('click', function() {
                document.getElementById('errorModal').classList.add('hidden');
            });
        });
    </script>

@endsection
