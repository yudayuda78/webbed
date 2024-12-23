<style>
    @layer utilities {
        .custom-scrollbar::-webkit-scrollbar {
            width: 8px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background-color: white;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background-color: #C0C0C0;
            /* border-radius: 4px; */
        }
    }
</style>

<aside id="logo-sidebar"
    class="fixed left-0 top-0 z-40 h-screen w-64 -translate-x-full border-r border-gray-200 bg-white pt-[57px] transition-transform dark:border-gray-700 dark:bg-gray-800 sm:translate-x-0"
    aria-label="Sidebar">
    <div id="parentdiv"
        class="custom-scrollbar flex h-full flex-col justify-between overflow-y-auto bg-white px-2 pb-4 dark:bg-gray-800">
        <div>
            <ul class="space-y-0 font-medium">
                <li>
                    <a href="{{ route('admin') }}"
                        class="@if (Route::is('admin')) bg-gray-100 @endif group mt-3 flex items-center rounded-lg p-2 text-gray-900 hover:bg-gray-50 dark:text-white dark:hover:bg-gray-700">
                        <i class="ri-apps-2-line text-2xl text-gray-500"></i>
                        <span class="ms-2">Dashboard</span>
                    </a>
                </li>
                <li>
                    <button type="button"
                        class="@if (Route::is(
                                'adminpendaftaran',
                                'searchpendaftaran',
                                'tambahpendaftaran',
                                'adminpendaftaranworkshop',
                                'searchpendaftaranworkshop',
                                'tambahpendaftaranworkshop')) bg-gray-100 @endif group flex w-full items-center rounded-lg p-2 text-base text-gray-900 transition duration-75 hover:bg-gray-50 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                        <i class="ri-edit-2-line text-2xl text-gray-500"></i>
                        <span class="ms-2 flex-1 whitespace-nowrap text-left rtl:text-right">Pendaftaran</span>
                        <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-example" class="hidden text-sm">
                        <li>
                            <a href="{{ route('adminpendaftaran') }}"
                                class="group flex w-full items-center rounded-lg p-2 pl-11 text-gray-900 transition duration-75 hover:bg-gray-50 dark:text-white dark:hover:bg-gray-700">-
                                Pendaftaran Diklat</a>
                        </li>
                        <li>
                            <a href="{{ route('adminpendaftaranworkshop') }}"
                                class="group flex w-full items-center rounded-lg p-2 pl-11 text-gray-900 transition duration-75 hover:bg-gray-50 dark:text-white dark:hover:bg-gray-700">-
                                Pendaftaran Workshop</a>
                        </li>
                    </ul>
                </li>
                {{-- <li>
                    <button type="button"
                        class="@if (Route::is('adminpendaftaranworkshop', 'searchpendaftaranworkshop', 'tambahpendaftaranworkshop')) bg-gray-100 @endif group flex w-full items-center rounded-lg p-2 text-base text-gray-900 transition duration-75 hover:bg-gray-50 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-example8" data-collapse-toggle="dropdown-example8">
                        <i class="ri-edit-2-line text-2xl text-gray-500"></i>
                        <span class="ms-2 flex-1 whitespace-nowrap text-left rtl:text-right">Pendaftaran Workshop</span>
                        <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-example8" class="hidden text-sm">
                        <li>
                            <a href="{{ route('adminpendaftaranworkshop') }}"
                                class="group flex w-full items-center rounded-lg p-2 pl-11 text-gray-900 transition duration-75 hover:bg-gray-50 dark:text-white dark:hover:bg-gray-700">-
                                List
                                Pendaftaran Workshop</a>
                        </li>
                        <li>
                            <a href="{{ route('tambahpendaftaranworkshop') }}"
                                class="group flex w-full items-center rounded-lg p-2 pl-11 text-gray-900 transition duration-75 hover:bg-gray-50 dark:text-white dark:hover:bg-gray-700">-
                                Tambah
                                Pendaftaran Workshop</a>
                        </li>
                    </ul>
                </li> --}}

                <li>
                    <button type="button"
                        class="@if (Route::is('adminevent', 'event')) bg-gray-100 @endif group flex w-full items-center rounded-lg p-2 text-base text-gray-900 transition duration-75 hover:bg-gray-50 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-example11" data-collapse-toggle="dropdown-example11">
                        <i class="ri-wallet-2-line text-2xl text-gray-500"></i>
                        <span class="ms-2 flex-1 whitespace-nowrap text-left rtl:text-right">Event</span>
                        <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-example11" class="hidden text-sm">
                        <li>
                            <a href="{{ route('adminevent') }}"
                                class="group flex w-full items-center rounded-lg p-2 pl-11 text-gray-900 transition duration-75 hover:bg-gray-50 dark:text-white dark:hover:bg-gray-700">-
                                List Event</a>
                        </li>
                        <li>
                            <a href="{{ route('tambahevent') }}"
                                class="group flex w-full items-center rounded-lg p-2 pl-11 text-gray-900 transition duration-75 hover:bg-gray-50 dark:text-white dark:hover:bg-gray-700">-
                                Tambah Event</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <button type="button"
                        class="@if (Route::is('adminevaluasi', 'searchpevaluasi', 'tambahevaluasi')) bg-gray-100 @endif group flex w-full items-center rounded-lg p-2 text-base text-gray-900 transition duration-75 hover:bg-gray-50 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-example9" data-collapse-toggle="dropdown-example9">
                        <i class="ri-book-open-line text-2xl text-gray-500"></i>
                        <span class="ms-2 flex-1 whitespace-nowrap text-left rtl:text-right">Evaluasi</span>
                        <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-example9" class="hidden text-sm">
                        <li>
                            <a href="{{ route('adminevaluasi') }}"
                                class="group flex w-full items-center rounded-lg p-2 pl-11 text-gray-900 transition duration-75 hover:bg-gray-50 dark:text-white dark:hover:bg-gray-700">-
                                List
                                Evaluasi</a>
                        </li>
                        <li>
                            <a href="{{ route('tambahevaluasi') }}"
                                class="group flex w-full items-center rounded-lg p-2 pl-11 text-gray-900 transition duration-75 hover:bg-gray-50 dark:text-white dark:hover:bg-gray-700">-
                                Tambah
                                Evaluasi</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <button type="button"
                        class="@if (Route::is('adminsertifikat', 'searchsertifikat', 'tambahsertifikat')) bg-gray-100 @endif group flex w-full items-center rounded-lg p-2 text-base text-gray-900 transition duration-75 hover:bg-gray-50 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-example1" data-collapse-toggle="dropdown-example1">
                        <i class="ri-file-2-line text-2xl text-gray-500"></i>
                        <span class="ms-2 flex-1 whitespace-nowrap text-left rtl:text-right">Sertifikat</span>
                        <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-example1" class="hidden text-sm">
                        <li>
                            <a href="{{ route('adminsertifikat') }}"
                                class="group flex w-full items-center rounded-lg p-2 pl-11 text-gray-900 transition duration-75 hover:bg-gray-50 dark:text-white dark:hover:bg-gray-700">-
                                List
                                Sertifikat</a>
                        </li>
                        <li>
                            <a href="{{ route('tambahsertifikat') }}"
                                class="group flex w-full items-center rounded-lg p-2 pl-11 text-gray-900 transition duration-75 hover:bg-gray-50 dark:text-white dark:hover:bg-gray-700">-
                                Tambah
                                Sertifikat</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <button type="button"
                        class="@if (Route::is('adminrevsertifikat', 'searchrevsertifikat', 'tambahrevsertifikat')) bg-gray-100 @endif group flex w-full items-center rounded-lg p-2 text-base text-gray-900 transition duration-75 hover:bg-gray-50 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-example2" data-collapse-toggle="dropdown-example2">
                        <i class="ri-file-line text-2xl text-gray-500"></i>
                        <span class="ms-2 flex-1 whitespace-nowrap text-left rtl:text-right">Revisi Sertifikat</span>
                        <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-example2" class="hidden text-sm">
                        <li>
                            <a href="{{ route('adminrevsertifikat') }}"
                                class="group flex w-full items-center rounded-lg p-2 pl-11 text-gray-900 transition duration-75 hover:bg-gray-50 dark:text-white dark:hover:bg-gray-700">-
                                List
                                Sertifikat</a>
                        </li>
                        <li>
                            <a href="{{ route('tambahrevsertifikat') }}"
                                class="group flex w-full items-center rounded-lg p-2 pl-11 text-gray-900 transition duration-75 hover:bg-gray-50 dark:text-white dark:hover:bg-gray-700">-
                                Tambah
                                Sertifikat</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <button type="button"
                        class="@if (Route::is('adminpresensi', 'searchpresensi', 'tambahpresensi')) bg-gray-100 @endif group flex w-full items-center rounded-lg p-2 text-base text-gray-900 transition duration-75 hover:bg-gray-50 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-example3" data-collapse-toggle="dropdown-example3">
                        <i class="ri-file-copy-2-line text-2xl text-gray-500"></i>
                        <span class="ms-2 flex-1 whitespace-nowrap text-left rtl:text-right">Presensi</span>
                        <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-example3" class="hidden text-sm">
                        <li>
                            <a href="{{ route('adminpresensi') }}"
                                class="group flex w-full items-center rounded-lg p-2 pl-11 text-gray-900 transition duration-75 hover:bg-gray-50 dark:text-white dark:hover:bg-gray-700">-
                                List
                                Presensi</a>
                        </li>
                        <li>
                            <a href="{{ route('tambahpresensi') }}"
                                class="group flex w-full items-center rounded-lg p-2 pl-11 text-gray-900 transition duration-75 hover:bg-gray-50 dark:text-white dark:hover:bg-gray-700">-
                                Tambah
                                Presensi</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <button type="button"
                        class="@if (Route::is('indexsurat', 'generatesurat', 'listnomorsurat')) bg-gray-100 @endif group flex w-full items-center rounded-lg p-2 text-base text-gray-900 transition duration-75 hover:bg-gray-50 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-example4" data-collapse-toggle="dropdown-example4">
                        <i class="ri-book-2-line text-2xl text-gray-500"></i>
                        <span class="ms-2 flex-1 whitespace-nowrap text-left rtl:text-right">Nomor
                            Surat</span>
                        <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-example4" class="hidden text-sm">
                        <li>
                            <a href="{{ route('listnomorsurat', 'indexsurat') }}"
                                class="group flex w-full items-center rounded-lg p-2 pl-11 text-gray-900 transition duration-75 hover:bg-gray-50 dark:text-white dark:hover:bg-gray-700">-
                                List
                                Nomor Surat</a>
                        </li>
                        <li>
                            <a href="{{ route('indexsurat') }}"
                                class="group flex w-full items-center rounded-lg p-2 pl-11 text-gray-900 transition duration-75 hover:bg-gray-50 dark:text-white dark:hover:bg-gray-700">-
                                Generate
                                Nomor</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <button type="button"
                        class="@if (Route::is('indexverifikasiworkshop', 'indexarsipverifikasiworkshop')) bg-gray-100 @endif group flex w-full items-center rounded-lg p-2 text-base text-gray-900 transition duration-75 hover:bg-gray-50 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-example10" data-collapse-toggle="dropdown-example10">
                        <i class="ri-wallet-2-line text-2xl text-gray-500"></i>
                        <span class="ms-2 flex-1 whitespace-nowrap text-left rtl:text-right">Workshop</span>
                        <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-example10" class="hidden text-sm">
                        <li>
                            <a href="{{ route('indexverifikasiworkshop') }}"
                                class="group flex w-full items-center rounded-lg p-2 pl-11 text-gray-900 transition duration-75 hover:bg-gray-50 dark:text-white dark:hover:bg-gray-700">-
                                Verifikasi
                                workshop</a>
                        </li>
                        <li>
                            <a href="{{ route('indexarsipverifikasiworkshop') }}"
                                class="group flex w-full items-center rounded-lg p-2 pl-11 text-gray-900 transition duration-75 hover:bg-gray-50 dark:text-white dark:hover:bg-gray-700">-
                                Arsip workshop</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <button type="button"
                        class="@if (Route::is('indexverifikasi', 'arsipverifikasi')) bg-gray-100 @endif group flex w-full items-center rounded-lg p-2 text-base text-gray-900 transition duration-75 hover:bg-gray-50 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-example6" data-collapse-toggle="dropdown-example6">
                        <i class="ri-folder-video-line text-2xl text-gray-500"></i>
                        <span class="ms-2 flex-1 whitespace-nowrap text-left rtl:text-right">Ecourse</span>
                        <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-example6" class="hidden text-sm">
                        <li>
                            <a href="{{ route('indexverifikasi') }}"
                                class="group flex w-full items-center rounded-lg p-2 pl-11 text-gray-900 transition duration-75 hover:bg-gray-50 dark:text-white dark:hover:bg-gray-700">-
                                Verifikasi
                                Pembayaran</a>
                        </li>
                        <li>
                            <a href="{{ route('arsipverifikasi') }}"
                                class="group flex w-full items-center rounded-lg p-2 pl-11 text-gray-900 transition duration-75 hover:bg-gray-50 dark:text-white dark:hover:bg-gray-700">-
                                Arsip Pembayaran</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <button type="button"
                        class="@if (Route::is('indextemplatesertif')) bg-gray-100 @endif group flex w-full items-center rounded-lg p-2 text-base text-gray-900 transition duration-75 hover:bg-gray-50 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-example5" data-collapse-toggle="dropdown-example5">
                        <i class="ri-export-line text-2xl text-gray-500"></i>
                        <span class="ms-2 flex-1 whitespace-nowrap text-left rtl:text-right">Upload
                            Sertif</span><span
                            class="me-2 rounded bg-blue-100 px-2.5 py-0.5 text-xs font-medium text-blue-800 dark:bg-blue-900 dark:text-blue-300">Soon</span>
                        <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-example5" class="hidden text-sm">
                        <li>
                            <a href="{{ route('indextemplatesertif') }}"
                                class="group flex w-full items-center rounded-lg p-2 pl-11 text-gray-900 transition duration-75 hover:bg-gray-50 dark:text-white dark:hover:bg-gray-700">-
                                Upload</a>
                        </li>
                    </ul>
                </li>

                
                
                <li>
                    <button type="button"
                        class="@if (Route::is('indexverifikasi', 'arsipverifikasi')) bg-gray-100 @endif group flex w-full items-center rounded-lg p-2 text-base text-gray-900 transition duration-75 hover:bg-gray-50 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-example12" data-collapse-toggle="dropdown-example12">
                        <i class="ri-folder-video-line text-2xl text-gray-500"></i>
                        <span class="ms-2 flex-1 whitespace-nowrap text-left rtl:text-right">Data</span>
                        <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-example12" class="hidden text-sm">
                        <li>
                            <a href="{{ route('indexverifikasi') }}"
                                class="group flex w-full items-center rounded-lg p-2 pl-11 text-gray-900 transition duration-75 hover:bg-gray-50 dark:text-white dark:hover:bg-gray-700">-
                                Data All BED</a>
                        </li>
                        <li>
                            <a href="{{ route('arsipverifikasi') }}"
                                class="group flex w-full items-center rounded-lg p-2 pl-11 text-gray-900 transition duration-75 hover:bg-gray-50 dark:text-white dark:hover:bg-gray-700">-
                                Ebook</a>
                        </li>
                        
                    </ul>
                </li>


                <li>
                    <button type="button"
                        class="@if (Route::is('ticykitworksheet', 'arsipverifikasi')) bg-gray-100 @endif group flex w-full items-center rounded-lg p-2 text-base text-gray-900 transition duration-75 hover:bg-gray-50 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-example13" data-collapse-toggle="dropdown-example13">
                        <i class="ri-folder-video-line text-2xl text-gray-500"></i>
                        <span class="ms-2 flex-1 whitespace-nowrap text-left rtl:text-right">Ticykit</span>
                        <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-example13" class="hidden text-sm">
                        <li>
                            <a href="{{ route('ticykitworksheet') }}"
                                class="group flex w-full items-center rounded-lg p-2 pl-11 text-gray-900 transition duration-75 hover:bg-gray-50 dark:text-white dark:hover:bg-gray-700">-
                                Worksheet</a>
                        </li>
                        <li>
                            <a href="{{ route('arsipverifikasi') }}"
                                class="group flex w-full items-center rounded-lg p-2 pl-11 text-gray-900 transition duration-75 hover:bg-gray-50 dark:text-white dark:hover:bg-gray-700">-
                                Ebook</a>
                        </li>
                        
                    </ul>
                </li>

            </ul>
            {{-- <ul class="mt-4 space-y-1 border-t border-gray-200 pt-2 font-medium dark:border-gray-700">
                <li>
                    <form action="{{ route('adminlogout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="group flex w-full items-center rounded-lg p-2 text-gray-900 hover:bg-gray-50 dark:text-white dark:hover:bg-gray-700">
                            <i class="ri-logout-box-line text-2xl text-gray-500"></i>
                            <span class="ms-2">Log Out</span>
                        </button>
                    </form>
                </li>
            </ul> --}}
        </div>
        <div id="dropdown-cta" class="rounded-lg bg-blue-50 p-3 dark:bg-blue-900" role="alert">
            <div class="flex items-center">
                <span
                    class="me-2 rounded bg-orange-100 px-2.5 py-0.5 text-sm font-semibold text-orange-800 dark:bg-orange-200 dark:text-orange-900">Welcome</span>
                <button type="button"
                    class="-mx-1.5 -my-1.5 ms-auto inline-flex h-6 w-6 items-center justify-center rounded-lg bg-blue-50 p-1 text-blue-900 hover:bg-blue-200 focus:ring-2 focus:ring-blue-400 dark:bg-blue-900 dark:text-blue-400 dark:hover:bg-blue-800"
                    data-dismiss-target="#dropdown-cta" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="h-2.5 w-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
            {{-- <p class="mb-1 text-sm text-blue-800 dark:text-blue-400">
                Silahkan hubungi tim webdev bila menemukan bug/error.
            </p> 
            <a class="text-sm font-medium text-blue-800 underline hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300"
                target="_blank" href="https://wa.me/089636822261">Kontak Admin</a>
                --}}
        </div>
    </div>
</aside>

<script>
    const parentDiv = document.getElementById('parentdiv');
    const childDiv = document.getElementById('dropdown-cta');

    parentDiv.addEventListener('scroll', function() {
        if (parentDiv.scrollTop > 0) {
            childDiv.classList.add('hidden');
        } else {
            childDiv.classList.remove('hidden');
        }
    });
</script>
