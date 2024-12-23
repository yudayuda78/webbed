@php
    $number = 1;
@endphp

@extends('home.home-layouts.home-main-tw')
@section('container')
    @include('admin.components.navbar')
    @include('admin.components.sidebar')
    @if (session('success'))
        <div id="toast-default"
            class="fixed right-4 top-4 z-50 flex w-full max-w-xs items-center rounded-lg border bg-white p-4 text-gray-500 shadow dark:bg-gray-800 dark:text-gray-400"
            role="alert">
            <div
                class="inline-flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-blue-100 text-blue-500 dark:bg-blue-800 dark:text-blue-200">
                <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15.147 15.085a7.159 7.159 0 0 1-6.189 3.307A6.713 6.713 0 0 1 3.1 15.444c-2.679-4.513.287-8.737.888-9.548A4.373 4.373 0 0 0 5 1.608c1.287.953 6.445 3.218 5.537 10.5 1.5-1.122 2.706-3.01 2.853-6.14 1.433 1.049 3.993 5.395 1.757 9.117Z" />
                </svg>
                <span class="sr-only">Fire icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">{{ session('success') }}</div>
            <button type="button"
                class="-mx-1.5 -my-1.5 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-white p-1.5 text-gray-400 hover:bg-gray-100 hover:text-gray-900 focus:ring-2 focus:ring-gray-300 dark:bg-gray-800 dark:text-gray-500 dark:hover:bg-gray-700 dark:hover:text-white"
                data-dismiss-target="#toast-default" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif
    <div class="mt-14 bg-slate-100 p-4 sm:ml-64">
        <div class="mx-auto max-w-screen-xl">
            <div class="mb-5 max-w-screen-xl rounded-lg bg-blue-600 px-5 py-8">
                <h1 class="mb-1 text-4xl font-extrabold tracking-tight text-white dark:text-white md:text-2xl lg:text-3xl">
                    Manajemen Pendaftaran</h1>
                <p class="text-lg font-normal text-gray-50 dark:text-gray-400 lg:text-lg">Edit, download, atau hapus halaman
                    pendafataran pada list dibawah ini</p>
            </div>
            <form class="mb-5 max-w-full" action="{{ route('searchpendaftaran') }}" method="GET">
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
                        placeholder="Ketik nama kegiatan" name="search" value="{{ $search ?? '' }}" />
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
            <div class="mb-3 flex justify-between">
                <h3 class="text-xl font-bold text-gray-700">Daftar Halaman</h3>
                <a href="{{ route('tambahworksheet') }}"><button type="submit"
                        class="rounded-lg bg-gray-700 px-3 py-2 text-center text-xs font-medium text-white hover:bg-gray-800 focus:outline-none focus:ring-4 focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Tambah</button></a>
            </div>
            <div class="relative mb-5 overflow-x-auto border-x border-t sm:rounded-lg">
                <table class="w-full text-left text-[15px] text-gray-500 dark:text-gray-400 rtl:text-right">
                    <thead class="border-b bg-slate-50 text-sm uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="w-0 py-5 pl-6">
                                No
                            </th>
                            <th scope="col" class="px-6 py-5">
                                Judul
                            </th>
                            <th scope="col" class="px-6 py-5 md:whitespace-nowrap">
                                Dibuat
                            </th>
                            <th scope="col" class="px-6 py-5 text-right">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    @foreach ($worksheet as $daftar)
                        <tbody>
                            <tr
                                class="border-b bg-white odd:bg-white even:bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 odd:dark:bg-gray-900 even:dark:bg-gray-800 dark:hover:bg-gray-600">
                                <td class="py-4 pl-6">
                                    {{ $daftar->id }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900">
                                    <a href="/pendaftaran/{{ $daftar->slug }}">{{ $daftar->title }}</a>
                                </td>
                                <td class="px-6 py-4 md:whitespace-nowrap">
                                    <p>{{ $daftar->lasteditedby }}</p>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex flex-col justify-end gap-1 md:flex-row">
                                        <a href="{{ route('downloaddatapendaftaran', ['id' => $daftar->id]) }}"
                                            class="rounded-lg bg-blue-600 px-3 py-2 text-center text-xs font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i
                                                class="ri-download-line"></i></a>
                                        <a href="{{ route('editpendaftaran', ['id' => $daftar->id]) }}"
                                            class="rounded-lg bg-blue-600 px-3 py-2 text-center text-xs font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i
                                                class="ri-edit-box-line"></i></a>
                                        <a href="{{ route('hapusdatapendaftaran', ['id' => $daftar->id]) }}"
                                            class="rounded-lg bg-red-500 px-3 py-2 text-center text-xs font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i
                                                class="ri-delete-bin-2-line"></i></a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
            <div class="mt-4">
                {{ $worksheet->links() }}
            </div>
        </div>
    </div>

    {{--   
<div class="search-bar">
    <form action="{{ route('searchpendaftaran') }}" method="GET">
        <input class="form-control" type="search" name="search"
            placeholder="Cari nama anda disini">
        <button class="btn-sertif btn btn-primary">Search</button>
    </form>
</div>

<button><a href="{{ route('tambahpendaftaran') }}">Tambah Pendaftaran</a></button>

<div>
    <a href="{{ route('admin') }}">
        back
    </a>
</div>

@foreach ($pendaftarandiklat as $daftar)
    <div>
        <a href="/pendaftaran/{{ $daftar->slug }}">{{ $daftar->judul }}</a>

        <a href="{{ route('editpendaftaran', ['id' => $daftar->id]) }}">edit</a>
        <a href="{{ route('hapusdatapendaftaran', ['id' => $daftar->id]) }}">hapus</a>
        <a href="{{ route('downloaddatapendaftaran', ['id' => $daftar->id]) }}">download</a>
    </div>
    <br>
@endforeach --}}
@endsection
