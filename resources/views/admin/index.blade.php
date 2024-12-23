@extends('home.home-layouts.home-main-tw')
@section('container')
    @include('admin.components.navbar')
    @include('admin.components.sidebar')
    <div class="mt-14 min-h-svh overflow-y-auto bg-slate-100 p-4 sm:ml-64">
        <div class="mx-auto mb-10 max-w-screen-xl">
            {{-- <div class="mb-4 pt-1">
                <h1 class="text-xl font-bold text-gray-900 md:text-3xl">Dashboard</h1>
                <p class="text-gray-500">{{ $formatdate }}</p>
            </div> --}}
            <div
                class="border-blue-gray-100 mb-5 rounded-xl rounded-l-xl bg-white bg-cover bg-right bg-no-repeat px-5 py-8 shadow-md md:bg-[url('/img/ui/admin-bg.jpg')] md:px-10 md:py-10 lg:bg-contain">
                <p class="mb-2 block font-sans text-sm font-bold leading-normal text-gray-900 antialiased">
                    {{ $formattedDate }}
                </p>
                <h3 class="block font-sans text-3xl font-semibold leading-snug tracking-normal text-gray-900 antialiased">
                    Selamat datang <span
                        class="font-extrabold capitalize text-blue-600">{{ Auth::guard('admin')->user()->username }}!</span>
                </h3>
                <p class="mb-4 block font-sans text-base font-light leading-relaxed text-gray-500 text-inherit antialiased">
                    Silahkan klik menu dibawah sesuai dengan pekerjaan yang hendak anda lakukan
                </p>
                <a href="/">
                    <button type="button"
                        class="me-2 rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i
                            class="ri-eye-fill"> </i> Website</button>
                </a>
            </div>
            <div class="grid w-full grid-cols-1 gap-3 md:grid-cols-4">
                <div class="flex w-full flex-col justify-between gap-6 rounded-xl bg-blue-600 px-5 py-5 shadow-lg">
                    <i class="ri-edit-2-line -ml-1 text-4xl text-white"></i>
                    <div>
                        <h1 class="text-xl font-bold tracking-tight text-white dark:text-white md:text-4xl">
                            {{ $jmlPendaftaran }}</h1>
                        <p class="max-w-[600px] text-base font-normal text-gray-50 dark:text-gray-400 lg:text-xl">
                            Pendafataran</p>
                        <a href="{{ route('adminpendaftaran') }}"><button type="submit"
                                class="mt-1 rounded-md bg-white px-2.5 py-1.5 text-center text-sm font-medium hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-300"><i
                                    class="ri-eye-fill"></i> Lihat</button></a>
                        <a href="{{ route('tambahpendaftaran') }}"><button type="submit"
                                class="mt-1 rounded-md bg-white px-2.5 py-1.5 text-center text-sm font-medium hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-300"><i
                                    class="ri-add-box-fill"></i></button></a>
                    </div>
                </div>
                <div
                    class="flex w-full flex-col justify-between gap-6 rounded-xl bg-white px-5 py-5 shadow-lg md:hover:bg-blue-100">
                    <i class="ri-file-line -ml-1 text-4xl text-blue-600"></i>
                    <div>
                        <h1 class="text-xl font-bold tracking-tight text-blue-600 dark:text-white md:text-4xl">
                            {{ $jmlSertifikat }}</h1>
                        <p class="max-w-[600px] text-base font-normal dark:text-gray-400 lg:text-xl">Sertifikat</p>
                        <a href="{{ route('adminsertifikat') }}"><button type="submit"
                                class="mt-1 rounded-md bg-blue-600 px-2.5 py-1.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-gray-300"><i
                                    class="ri-eye-fill"></i> Lihat</button></a>
                        <a href="{{ route('tambahsertifikat') }}"><button type="submit"
                                class="mt-1 rounded-md bg-blue-600 px-2.5 py-1.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-gray-300"><i
                                    class="ri-add-box-fill"></i></button></a>
                    </div>
                </div>
                <div
                    class="flex w-full flex-col justify-between gap-6 rounded-xl bg-white px-5 py-5 shadow-lg md:hover:bg-blue-100">
                    <i class="ri-file-2-line -ml-1 text-4xl text-blue-600"></i>
                    <div>
                        <h1 class="text-xl font-bold tracking-tight text-blue-600 dark:text-white md:text-4xl">
                            {{ $jmlRevSertifikat }}</h1>
                        <p class="max-w-[600px] text-base font-normal dark:text-gray-400 lg:text-xl">Revisi Sertifikat</p>
                        <a href="{{ route('adminrevsertifikat') }}"><button type="submit"
                                class="mt-1 rounded-md bg-blue-600 px-2.5 py-1.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-gray-300"><i
                                    class="ri-eye-fill"></i> Lihat</button></a>
                        <a href="{{ route('tambahrevsertifikat') }}"><button type="submit"
                                class="mt-1 rounded-md bg-blue-600 px-2.5 py-1.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-gray-300"><i
                                    class="ri-add-box-fill"></i></button></a>
                    </div>
                </div>
                <div
                    class="flex w-full flex-col justify-between gap-6 rounded-xl bg-white px-5 py-5 shadow-lg md:hover:bg-blue-100">
                    <i class="ri-file-copy-2-line -ml-1 text-4xl text-blue-600"></i>
                    <div>
                        <h1 class="text-xl font-bold tracking-tight text-blue-600 dark:text-white md:text-4xl">
                            {{ $jmlPresensi }}</h1>
                        <p class="max-w-[600px] text-base font-normal dark:text-gray-400 lg:text-xl">Presensi
                        </p>
                        <a href="{{ route('adminpresensi') }}"><button type="submit"
                                class="mt-1 rounded-md bg-blue-600 px-2.5 py-1.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-gray-300"><i
                                    class="ri-eye-fill"></i> Lihat</button></a>
                        <a href="{{ route('tambahpresensi') }}"><button type="submit"
                                class="mt-1 rounded-md bg-blue-600 px-2.5 py-1.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-gray-300"><i
                                    class="ri-add-box-fill"></i></button></a>
                    </div>
                </div>

                <div
                    class="flex w-full flex-col justify-between gap-6 rounded-xl bg-white px-5 py-5 shadow-lg md:hover:bg-blue-100">
                    <i class="ri-book-2-line -ml-1 text-4xl text-blue-600"></i>
                    <div>
                        <h1 class="text-xl font-bold tracking-tight text-blue-600 dark:text-white md:text-4xl">65</h1>
                        <p class="max-w-[600px] text-base font-normal dark:text-gray-400 lg:text-xl">Nomor Surat
                        </p>
                        <a href="{{ route('listnomorsurat') }}"><button type="submit"
                                class="mt-1 rounded-md bg-blue-600 px-2.5 py-1.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-gray-300"><i
                                    class="ri-eye-fill"></i> Lihat</button></a>
                        <a href="{{ route('generatesurat') }}"><button type="submit"
                                class="mt-1 rounded-md bg-blue-600 px-2.5 py-1.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-gray-300"><i
                                    class="ri-add-box-fill"></i></button></a>
                    </div>
                </div>
                <div
                    class="flex w-full flex-col justify-between gap-6 rounded-xl bg-white px-5 py-5 shadow-lg md:hover:bg-blue-100">
                    <i class="ri-wallet-2-line -ml-1 text-4xl text-blue-600"></i>
                    <div>
                        <h1 class="text-xl font-bold tracking-tight text-blue-600 dark:text-white md:text-4xl">
                            {{ $jmlEcourse }}</h1>
                        <p class="max-w-[600px] text-base font-normal dark:text-gray-400 lg:text-xl">Ecourse Pending
                        </p>
                        <a href="{{ route('indexverifikasi') }}"><button type="submit"
                                class="mt-1 rounded-md bg-blue-600 px-2.5 py-1.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-gray-300"><i
                                    class="ri-eye-fill"></i> Lihat</button></a>
                        {{-- <a href="{{ route('tambahrevsertifikat') }}"><button type="submit"
                                class="mt-1 rounded-md bg-blue-600 px-2.5 py-1.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-gray-300"><i
                                    class="ri-add-box-fill"></i></button></a> --}}
                    </div>
                </div>
                <div
                    class="flex w-full flex-col justify-between gap-6 rounded-xl bg-white px-5 py-5 shadow-lg md:hover:bg-blue-100">
                    <i class="ri-sticky-note-add-line -ml-1 text-4xl text-blue-600"></i>
                    <div>
                        <h1 class="text-xl font-bold tracking-tight text-blue-600 dark:text-white md:text-4xl">0</h1>
                        <p class="max-w-[600px] text-base font-normal dark:text-gray-400 lg:text-xl">Manage User</p>
                        <button disabled type="submit"
                            class="mt-1 rounded-md bg-slate-400 px-2.5 py-1.5 text-center text-sm font-medium text-white hover:bg-slate-600 focus:outline-none focus:ring-4 focus:ring-gray-300"><i
                                class="ri-information-2-fill"></i> Coming Soon</button>
                    </div>
                </div>
                <div
                    class="flex w-full flex-col justify-between gap-6 rounded-xl bg-white px-5 py-5 shadow-lg md:hover:bg-blue-100">
                    <i class="ri-file-list-2-fill -ml-1 text-4xl text-blue-600"></i>
                    <div>
                        <h1 class="text-xl font-bold tracking-tight text-blue-600 dark:text-white md:text-4xl">0</h1>
                        <p class="max-w-[600px] text-base font-normal dark:text-gray-400 lg:text-xl">Upload
                            Sertif</p>
                        <button disabled type="submit"
                            class="mt-1 rounded-md bg-slate-400 px-2.5 py-1.5 text-center text-sm font-medium text-white hover:bg-slate-600 focus:outline-none focus:ring-4 focus:ring-gray-300"><i
                                class="ri-information-2-fill"></i> Coming Soon</button>
                    </div>
                </div>
            </div>
            {{-- <div class="hidden shadow-lg my-4 max-w-screen-xl bg-blue-600 px-5 py-5 rounded-xl md:flex justify-between items-center">
          <div class="ml-0 md:ml-3">
              <h1 class="mb-4 text-xl font-extrabold tracking-tight text-white md:text-3xl dark:text-white">Selamat Datang Admin</h1>
              <p class="text-lg font-normal text-gray-50 lg:text-lg dark:text-gray-400 max-w-[600px]">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero, quod officia. Dicta veritatis deleniti qui magnam eaque a nisi</p>    
          </div>
          <img class="max-w-52 mr-0 md:mr-10" src="/img/ui/ecoursetillus.png">
        </div> --}}
        </div>
    </div>
    {{-- <a href="{{ route('adminpendaftaran') }}">Pendaftaran</a>
<a href="{{ route('adminsertifikat') }}">Sertifikat</a>
<a href="{{ route('adminrevsertifikat') }}">Revisi Sertifikat</a>
<a href="">Presensi</a>
<a href="">Template Sertifikat</a> --}}
@endsection
