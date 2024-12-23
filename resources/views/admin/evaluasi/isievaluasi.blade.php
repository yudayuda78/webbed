@extends('home.home-layouts.home-main-tw')
@section('container')
    @include('admin.components.navbar')
    @include('admin.components.sidebar')
    <div class="mt-14 min-h-svh bg-slate-100 p-4 sm:ml-64">
        <div class="mx-auto max-w-screen-xl">
            <div class="mx-auto max-w-screen-xl">
                <div class="mb-5 max-w-screen-xl rounded-lg bg-blue-600 px-5 py-8">
                    <h1
                        class="mb-1 text-4xl font-extrabold tracking-tight text-white dark:text-white md:text-2xl lg:text-3xl">
                        Isi Donasi Kegiatan</h1>
                    {{-- <p class="text-lg font-normal text-gray-50 dark:text-gray-400 lg:text-lg">Verifikasi pembayaran pendaftar
                        Ecourse dengan memilih opsi Sudah / Belum di bawah</p> --}}
                </div>
               
                
                <form class="mb-5 max-w-full" action="{{ route('searchevaluasi', ['evaluasi' => $dataDariShow]) }}" method="GET">
                    <label for="default-search"
                        class="sr-only mb-2 text-sm font-medium text-gray-900 dark:text-white">Search</label>
                    <div class="relative">
                        <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                            <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" id="default-search"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-4 ps-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                            placeholder="Ketik nama peserta" name="search" value="{{ $search ?? '' }}" />
                        <button type="submit"
                            class="absolute bottom-2.5 end-2.5 rounded-lg bg-blue-700 px-4 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                    </div>
                </form>
                @if (isset($search))
                    <div id="alert-5" class="mb-5 flex items-center rounded-lg border bg-gray-50 p-4 dark:bg-gray-800"
                        role="alert">
                        <svg class="h-4 w-4 flex-shrink-0 dark:text-gray-300" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div class="ms-3 text-sm font-medium text-gray-800 dark:text-gray-300">
                            Hasil pencarian untuk <b>{{ $search }}</b>
                        </div>
                        <button type="button"
                            class="-mx-1.5 -my-1.5 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-gray-50 p-1.5 text-gray-500 hover:bg-gray-200 focus:ring-2 focus:ring-gray-400 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-white"
                            data-dismiss-target="#alert-5" aria-label="Close">
                            <span class="sr-only">Dismiss</span>
                            <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>
                @endif

                <div class="relative mb-5 overflow-x-auto border-x border-t sm:rounded-lg">
                    <table class="w-full text-left text-[15px] text-gray-500 dark:text-gray-400 rtl:text-right">
                        <thead
                            class="border-b bg-slate-50 text-sm uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="w-0 py-5 pl-6">
                                    No
                                </th>
                                <th scope="col" class="px-6 py-5">
                                    Nama
                                </th>
                                <th scope="col" class="px-6 py-5">
                                    Instansi
                                </th>
                                <th scope="col" class="px-6 py-5 md:whitespace-nowrap">
                                    Nomor WA
                                </th>
                                <th scope="col" class="px-6 py-5 md:whitespace-nowrap">
                                    Bank
                                </th>
                                <th scope="col" class="px-6 py-5 text-right">
                                    Bukti / Verifikasi
                                </th>
                            </tr>
                        </thead>
                        @foreach ($dataformevaluasi->reverse() as $dataform)
                            <tbody>
                                <tr
                                    class="border-b bg-white odd:bg-white even:bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 odd:dark:bg-gray-900 even:dark:bg-gray-800 dark:hover:bg-gray-600">
                                    <td class="py-4 pl-6">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900">
                                        {{ $dataform->nama }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900">
                                        {{ $dataform->instansi }}
                                    </td>
                                    <td class="px-6 py-4 md:whitespace-nowrap">
                                        {{ $dataform->nomorwa }}
                                    </td>
                                    <td class="px-6 py-4 md:whitespace-nowrap">
                                        {{ $dataform->bank }}
                                    </td>
                                    <td class="float-end flex gap-2 px-6 py-4 text-right">
                                        <a href="#"
                                            onclick="openModal('{{ asset('donasikegiatan/' . $dataform->buktitransfer) }}')">
                                            <button type="button"
                                                class="rounded-md bg-gray-600 px-3 py-1.5 text-center text-xs font-medium text-white hover:bg-gray-800 focus:outline-none focus:ring-4 focus:ring-gray-300">Lihat
                                                Gambar</button>
                                        </a>
                                        {{-- <select
                                            class="form-select {{ $pay->status == 'sudah' ? 'border-green-500 text-green-500' : 'border-red-500 text-red-500' }} block rounded-md border px-2 py-1 text-center text-xs font-medium focus:border-blue-500 focus:ring-blue-500"
                                            name="status">
                                            <option class="py-4 text-gray-600" value="belum"
                                                {{ $pay->status == 'belum' ? 'selected' : '' }}>
                                                Belum
                                            </option>
                                            <option class="py-4 text-gray-600" value="sudah"
                                                {{ $pay->status == 'sudah' ? 'selected' : '' }}>
                                                Sudah</option>
                                        </select> --}}
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

        <div id="imageModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
            <div class="flex min-h-screen items-center justify-center px-4 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
                <span class="hidden sm:inline-block sm:h-screen sm:align-middle">&#8203;</span>
                <div
                    class="inline-block transform overflow-hidden rounded-lg bg-white text-left align-bottom shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:align-middle">
                    <div class="bg-white p-6">
                        <img id="modalImage" src="" alt="Payment Image" class="h-auto w-full">
                    </div>
                    <div class="bg-gray-200 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <button type="button" onclick="closeModal()"
                            class="inline-flex w-full justify-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-6 mt-5">
            {{ $dataformevaluasi->withQueryString()->links('vendor.pagination.tailwind') }}
        </div>
                            
        

        <script>
            function openModal(imageUrl) {
                document.getElementById('modalImage').src = imageUrl;
                document.getElementById('imageModal').classList.remove('hidden');
            }

            function closeModal() {
                document.getElementById('imageModal').classList.add('hidden');
            }
        </script>
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

    {{-- <div class="mb-3 flex justify-between">
    <h3 class="text-xl font-bold text-gray-700">Daftar Halaman</h3>
    <a href="{{ route('tambahpendaftaran') }}"><button type="submit" class="px-3 py-2 text-xs font-medium text-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Tambah</button></a>
  </div>
   --}}
