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
                        Daftar Nomor Surat</h1>
                    <p class="text-lg font-normal text-gray-50 dark:text-gray-400 lg:text-lg">Berikut ini daftar nomor surat
                        yang sudah dibuat oleh tim Belajar Era Digital</p>
                </div>

                <div class="mb-3 flex justify-between">
                    <h3 class="text-xl font-bold text-gray-700">Nomor Surat</h3>
                    <a href="{{ route('indexsurat') }}"><button type="submit"
                            class="rounded-lg bg-gray-700 px-3 py-2 text-center text-xs font-medium text-white hover:bg-gray-800 focus:outline-none focus:ring-4 focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Tambah</button></a>
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
                                    Judul
                                </th>
                                <th scope="col" class="px-6 py-5">
                                    Nomor Surat
                                </th>
                            </tr>
                        </thead>
                        @foreach ($listSurat->reverse() as $surat)
                            <tbody>
                                <tr
                                    class="border-b bg-white odd:bg-white even:bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 odd:dark:bg-gray-900 even:dark:bg-gray-800 dark:hover:bg-gray-600">
                                    <td class="py-4 pl-6">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900">
                                        <p>{{ $surat->judul }}</p>
                                    </td>
                                    <td class="px-6 py-4 font-bold">
                                        {{ $surat->nomor }}
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>

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
