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
                        Update Pembayaran Ecourse</h1>
                    <p class="text-lg font-normal text-gray-50 dark:text-gray-400 lg:text-lg">Verifikasi pembayaran pendaftar
                        Ecourse dengan memilih opsi Sudah / Belum di bawah</p>
                </div>
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
                                <th scope="col" class="px-6 py-5 md:whitespace-nowrap">
                                    Kegiatan
                                </th>
                                <th scope="col" class="px-6 py-5 text-right">
                                    Bukti / Verifikasi
                                </th>
                            </tr>
                        </thead>
                        @foreach ($payment->reverse() as $pay)
                            <tbody>
                                <tr
                                    class="border-b bg-white odd:bg-white even:bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 odd:dark:bg-gray-900 even:dark:bg-gray-800 dark:hover:bg-gray-600">
                                    <td class="py-4 pl-6">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900">
                                        {{ $pay->nama }}
                                    </td>
                                    <td class="px-6 py-4 md:whitespace-nowrap">
                                        {{ $pay->ecourse_judul }}
                                    </td>
                                    <td class="float-end flex gap-2 px-6 py-4 text-right">
                                        <a href="#"
                                            onclick="openModal('{{ asset('pembayaranecourse/' . $pay->gambar) }}')">
                                            <button type="button"
                                                class="rounded-md bg-gray-600 px-3 py-1.5 text-center text-xs font-medium text-white hover:bg-gray-800 focus:outline-none focus:ring-4 focus:ring-gray-300">Lihat
                                                Gambar</button>
                                        </a>
                                        <select
                                            class="form-select {{ $pay->status == 'sudah' ? 'border-green-500 text-green-500' : 'border-red-500 text-red-500' }} block rounded-md border px-2 py-1 text-center text-xs font-medium focus:border-blue-500 focus:ring-blue-500"
                                            name="status">
                                            <option class="py-4 text-gray-600" value="belum"
                                                {{ $pay->status == 'belum' ? 'selected' : '' }}>
                                                Belum
                                            </option>
                                            <option class="py-4 text-gray-600" value="sudah"
                                                {{ $pay->status == 'sudah' ? 'selected' : '' }}>
                                                Sudah</option>
                                        </select>
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
