@php
    $numPretest = 1;
    $numPosttest = 1;
@endphp
@extends('home.home-layouts.home-main-tw')
@section('container')
    <style>
        /* KONTEN ECOURSE */
        /* VIDEO PLAYER ECOURSE */
        .video-player-flex {
            max-width: 1179px;
            min-height: 510px;
            display: flex;
            background-color: #e0e7f2;
            margin: 20px auto 0 auto;
            border-radius: 15px;
        }

        .video-player-flex h1 {
            font-size: 18px;
            font-weight: bold;
        }

        .video-player-flex-l {
            width: 369px;
            background-color: #c7d4e8;
            padding: 20px;
            border-radius: 15px 0 0 15px;
        }

        .video-player-flex-l a {
            color: #1e272e;
            font-size: 14px;
            max-width: 327px;
            border-bottom: 1px solid #9db0ce;
            padding: 5px 0 5px 0;
        }

        .video-player-flex-l i {
            font-size: 20px;
            vertical-align: middle;
        }

        .video-player-flex-r {
            padding: 20px;
            width: 800px;
        }

        .tablinks {
            display: block;
            cursor: pointer;
            width: 369px;
        }

        .video-player-flex .video-player-flex-l .active {
            font-weight: bold;
        }

        .tabcontent {
            display: none;
        }

        .video-player-opener {
            display: flex;
            flex-direction: column;
        }

        .video-player-opener img {
            margin: auto;
        }

        .tabcontent h1,
        .video-player-opener h1 {
            margin: 0 0 15px 0;
        }

        .tabcontent ol {
            overflow-x: hidden;
        }

        .embed-ytb iframe {
            border-radius: 15px;
        }

        /* Style for dropdown content */
        .dropdown-menu {
            cursor: pointer;
        }

        .dropdown-content {
            display: none;
        }

        .dropdown-menu.active {
            font-weight: bold;
        }

        .dropdown-content.active {
            display: block;
        }

        .disabled {
            pointer-events: none;
            opacity: 0.5;
            /* Opsional: memberikan efek visual */
        }

        @media screen and (max-width: 1140px) {

            /* KONTEN ECOURSE */
            /* KONTEN BREADCRUMB */
            /* KONTEN ECOURSE */
            /* VIDEO PLAYER ECOURSE */
            .video-player-flex {
                max-width: 90%;
                height: auto;
                display: flex;
                flex-direction: column-reverse;
                margin: 25px auto 0 auto;
            }

            .video-player-flex h1 {
                font-size: 18px;
                font-weight: bold;
            }

            .video-player-flex-l {
                width: 100%;
                padding: 15px;
                border-radius: 15px 15px 15px 15px;
            }

            .video-player-flex-l a {
                max-width: 100%;
                padding: 3px 0 3px 0;
            }

            .video-player-flex-r {
                padding: 15px;
                width: auto;
            }

            .tablinks {
                width: auto;
            }
        }
    </style>

    <div id="loginModal" class="hidden fixed inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50 z-50">
        <div class="bg-white p-5 rounded-lg shadow-lg">
            <h2 class="text-lg font-bold">Anda Belum Login</h2>
            <p>Silakan login terlebih dahulu untuk melanjutkan.</p>
            <div class="mt-4 flex justify-end">
                <a href="{{ route('ecourse.signup', ['intended' => url()->current()]) }}"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Daftar</a>
                <button id="closeModal" class="ml-2 bg-gray-300 text-black px-4 py-2 rounded hover:bg-gray-500">Tutup</button>
            </div>
        </div>
    </div>

    <div id="login-popup" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-50">
        <div class="bg-white rounded-lg p-5 max-w-md mx-auto text-center">
            <h2 class="text-xl font-bold mb-4">Akses Konten Tertutup</h2>
            <p class="mb-4">Anda harus login untuk mengakses konten ini.</p>
            <a href="{{ route('ecourse.login') }}"
                class="btn btn-primary px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Login</a>
            <button onclick="closeLoginPopup()" class="mt-3 text-gray-500 underline">Tutup</button>
        </div>
    </div>


    <div class="bg-[#196ECD] pb-8 md:pb-10">
        @include('home.home-layouts.tw-home-navbar-ecourse')
    </div>
    <div class="bg-[#085FBF]">
        <h1 class="mx-auto max-w-[90%] py-4 font-inter font-bold text-white md:max-w-main">E-course Video</span>
        </h1>
    </div>
    <div class="mx-auto mt-8 max-w-[90%] border-b pb-4 md:max-w-main">
        <p><a href="/ecourse">E-course</a> / <b>{{ $ecourse->judul }}</b></p>
    </div>
    <div class="video-player-flex">
        <div class="video-player-flex-l">
            <h1 class="">Materi</h1>
            <a class="tablinks" onclick="openCity(event, 'pretest')" id="defaultOpen"><i class="ri-add-circle-fill"> </i>Pre
                Test</a>


            @foreach ($ecourse->ecoursetopik as $ecoursetopik)
                <div class="dropdown">
                    <div class="dropdown-menu" onmousedown="toggleDropdown('dropdown-{{ $ecoursetopik->id }}')">
                        <a class="tablinks"><i class="ri-play-circle-fill"> </i>{{ $ecoursetopik->judul }}</a>
                    </div>

                    <div class="dropdown-content" id="dropdown-{{ $ecoursetopik->id }}" style="display: none;">
                        @foreach ($ecoursetopik->ecoursevideo as $ecoursevideo)
                        <a style="margin-left: 25px;" class="tablinks"
                        onclick="openCity(event, '{{ $ecoursevideo->id }}')" id="defaultOpen"><i
                            class="ri-play-circle-line"> </i>{{ $ecoursevideo->judul_video }}</a>
                        @endforeach
                    </div>
                </div>
            @endforeach





            <a class="tablinks" onclick="openCity(event, 'postest')" id="defaultOpen"><i class="ri-add-circle-fill">
                </i>Post Test</a>
        </div>



        <div class="video-player-flex-r">
            <div class="video-player-opener tabcontent">


                @if (auth()->check() && $ecourse->bayar === 2)
                    @php
                        $pembayaran = auth()
                            ->user()
                            ->PembayaranEcourse->where('ecourse_id', $ecourse->id)
                            ->first();
                    @endphp
                    @if ($pembayaran && $pembayaran->status == 'belum')
                        <h1>Mohon Ditunggu Status Sedang diperikasa oleh admin</h1>
                        <a href="{{ route('pembayaran', ['ecourse' => $ecourse->slug]) }}" class="btn btn-link mt-2"><button
                                class="btn btn-primary mt-3">Bayar Sekarang</button></a>
                    @elseif(!$pembayaran)
                        <h1>Ecourse Ini Berbayar, silahkan melakukan pembayaran dengan klik tombol bayar</h1>
                        <a href="{{ route('pembayaran', ['ecourse' => $ecourse->slug]) }}" class="btn btn-link mt-2"><button
                                class="btn btn-primary mt-3">Bayar Sekarang</button></a>
                    @else
                        <h1>Ecourse Ini Berbayar, silahkan melakukan pembayaran dengan klik tombol bayar</h1>
                        <a href="{{ route('pembayaran', ['ecourse' => $ecourse->slug]) }}"
                            class="btn btn-link mt-2"><button class="btn btn-primary mt-3">Bayar Sekarang</button></a>
                    @endif
                @elseif (auth()->check() && $ecourse->bayar === 2 && auth()->user()->PembayaranEcourse->first()->status == 'sudah')
                    <h1>Opener</h1>
                    <img class="img-fluid mx-auto my-auto" src="{{ asset('imgecourse/' . $ecourse->img . '.webp') }}">
                @else
                    <h1>Opener</h1>
                    <img class="img-fluid mx-auto my-auto" src="{{ asset('imgecourse/' . $ecourse->img . '.webp') }}">
                @endif
            </div>

            <div id="pretest" class="tabcontent">
                <h1>Pretest</h1>
                <form action="{{ route('submit-quiz') }}" method="post">
                    @csrf
                    <input type="hidden" name="ecourse_id" value="{{ $ecourse->id }}">
                    @foreach (json_decode($ecourse->quiz) as $index => $quiz)
                        <fieldset>
                            <legend class="mb-1.5 leading-relaxed"><span
                                    class="me-1 rounded-sm bg-[#196ECD] px-2 py-1 font-bold text-white">{{ $numPretest++ }}</span><br><span
                                    class="font-bold">{{ $quiz->pertanyaan }}</span></legend>
                            <label><input type="radio" name="question{{ $index + 1 }}" value="a">
                                {{ $quiz->a }}</label><br>
                            <label><input type="radio" name="question{{ $index + 1 }}" value="b">
                                {{ $quiz->b }}</label><br>
                            <label><input type="radio" name="question{{ $index + 1 }}" value="c">
                                {{ $quiz->c }}</label><br>
                            <label><input type="radio" name="question{{ $index + 1 }}" value="d">
                                {{ $quiz->d }}</label><br><br>
                        </fieldset>
                    @endforeach

                    @auth
                        @php
                            $pretestResult = auth()
                                ->user()
                                ->pretest_result->where('ecourse_id', $ecourse->id)
                                ->first();
                        @endphp

                        @if ($pretestResult)
                            <p
                                class="me-2 w-fit rounded border border-blue-400 bg-blue-100 px-2.5 py-1 font-inter text-sm font-medium text-blue-800">
                                <i class="ri-information-2-line"></i> Anda telah mengisi pretest
                            </p>
                        @else
                            <input
                                class="submit-pretest mb-2 me-2 rounded-lg bg-[#196ECD] px-4 py-2.5 text-base font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300"
                                type="submit" value="Simpan">
                        @endif
                    @endauth
                </form>
                </ul>
            </div>

            {{-- {{ dd($ecourse->ecoursenarsum) }} --}}
            {{-- @foreach ($ecourse->ecoursenarsum as $ecourse)
                
            @endforeach --}}

            @foreach ($ecourse->ecoursetopik as $ecoursetopik)
                @foreach ($ecoursetopik->ecoursevideo as $ecoursevideo)
                    @guest
                        <div></div>
                    @endguest
                    @auth

                        <div id="{{ $ecoursevideo->id }}" class="tabcontent">
                            <h1>{{ $ecoursevideo->judul_video }}</h1>
                            <div class="aspect-video">
                                <iframe class="relative inset-0 aspect-video w-full rounded-xl" src="{{ $ecoursevideo->link }}"
                                    allowfullscreen></iframe>
                            </div>
                        </div>
                    @endauth
                @endforeach
            @endforeach

            <div id="postest" class="tabcontent">
                <h1>Postest</h1>
                <ol>
                    <form action="{{ route('submit-posttest') }}" method="post">
                        @csrf
                        <input type="hidden" name="ecourse_id" value="{{ $ecourse->id }}">
                        @foreach (json_decode($ecourse->quizposttest) as $index => $quizposttest)
                            <fieldset>
                                <legend class="mb-1.5 leading-relaxed"><span
                                        class="me-1 rounded-sm bg-[#196ECD] px-2 py-1 font-bold text-white">{{ $numPosttest++ }}</span><br><span
                                        class="font-bold">{{ $quizposttest->pertanyaan }}</span></legend>
                                <label><input type="radio" name="question{{ $index + 1 }}" value="a">
                                    {{ $quizposttest->a }}</label><br>
                                <label><input type="radio" name="question{{ $index + 1 }}" value="b">
                                    {{ $quizposttest->b }}</label><br>
                                <label><input type="radio" name="question{{ $index + 1 }}" value="c">
                                    {{ $quizposttest->c }}</label><br>
                                <label><input type="radio" name="question{{ $index + 1 }}" value="d">
                                    {{ $quizposttest->d }}</label><br><br>
                            </fieldset>
                        @endforeach

                        @auth
                            @php
                                $posttestResult = auth()
                                    ->user()
                                    ->posttest_result->where('ecourse_id', $ecourse->id)
                                    ->first();

                                // dd($posttestResult);

                            @endphp
                        @endauth

                        {{-- @if ($posttestResult)
                            <!-- Menampilkan hasil pretest atau informasi relevan lainnya -->
                            <p>Anda telah mengisi pretest</p>
                        @else  --}}
                        <!-- Menampilkan tombol kirim hanya jika hasil pretest tidak ada -->
                        <input
                            class="submit-posttest mb-2 me-2 rounded-lg bg-[#196ECD] px-4 py-2.5 text-base font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300"
                            type="submit" value="Simpan">
                        {{-- @endif --}}
                    </form>
                </ol>
            </div>
        </div>
    </div>


    <div class="mx-auto mt-7 flex max-w-[90%] flex-col-reverse justify-between gap-3 md:max-w-main md:flex-row">
        <div class="max-w-[800px]">
            <div class="mb-3 font-inter">
                <h2 class="mb-1 text-xl font-bold">Deskripsi</h2>
                <p class="text-lg leading-relaxed text-slate-500">{{ $ecourse->deskripsi }}</p>
            </div>
            <div class="mb-3 font-inter">
                <h2 class="mb-1 text-xl font-bold">Keterangan</h2>
                <ul class="ms-5 list-decimal text-lg leading-relaxed text-slate-500">
                    <li>Kerjakan soal Pre Test sesuai dengan pemahaman anda saat ini</li>
                    <li>Tonton semua video e-course di masing-masing topik secara berurutan</li>
                    <li>Kerjakan soal Post Test sesuai dengan apa yang sudah anda pelajari dari materi e-course</li>
                    <li>Apabila skor Post Test sudah lebih dari 70 maka anda bisa mengunduh serifikat, apabila belum
                        silahkan tonton kembali video dan kerjakan ulang Post Test</li>
                </ul>
            </div>
        </div>
        <div class="w-full rounded-lg border p-8 md:w-[330px]">
            <div class="font-inter">
                <h3 class="border-b pb-3 text-lg font-bold">Download Sertifikat</h3>
                <div class="flex justify-between border-b py-3">
                    <p>Sudah Login</p>
                    @auth
                        <i class="ri-checkbox-circle-line text-lg text-green-600"></i>
                    @endauth
                    @guest
                        <i class="ri-close-circle-line text-lg text-red-600"></i>
                    @endguest
                </div>
                <div class="flex justify-between border-b py-3">
                    <p class="me-3">Nilai Pretest:</p>

                    {{-- @foreach (auth()->user()->pretest_result->where('ecourse_id', $ecourse->id) as $pretestResult)
                        <p> {{ $pretestResult->nilai }}</p>
                    @endforeach --}}

                    @auth
                        @php
                            $latestPretestResult = auth()
                                ->user()
                                ->pretest_result->where('ecourse_id', $ecourse->id)
                                ->last();
                        @endphp

                        @if ($latestPretestResult)
                            <p> {{ $latestPretestResult->nilai }}</p>

                            <i class="ri-checkbox-circle-line text-lg text-green-600"></i>
                        @else
                            <p>Belum mengisi</p>
                            <i class="ri-close-circle-line text-lg text-red-600"></i>
                        @endif
                    @endauth
                    @guest
                        <i class="ri-close-circle-line text-lg text-red-600"></i>
                    @endguest
                </div>

                {{-- {{ dd($ecourse->pretest_result) }} --}}
                <div class="flex justify-between border-b py-3">
                    <p>Nilai Posttest:</p>
                    {{-- @foreach (auth()->user()->posttest_result->where('ecourse_id', $ecourse->id) as $posttestResult)
                        <p> {{ $posttestResult->nilai }}</p>
                    @endforeach --}}

                    @auth
                        @php
                            $latestPosttestResult = auth()
                                ->user()
                                ->posttest_result->where('ecourse_id', $ecourse->id)
                                ->last();
                        @endphp

                        @if ($latestPosttestResult)
                            <p> {{ $latestPosttestResult->nilai }}</p>
                            <i class="ri-checkbox-circle-line text-lg text-green-600"></i>
                        @else
                            <p>Belum mengisi</p>
                            <i class="ri-close-circle-line text-lg text-red-600"></i>
                        @endif
                    @endauth
                    @guest
                        <i class="ri-close-circle-line text-lg text-red-600"></i>
                    @endguest
                    {{-- @foreach (auth()->user()->posttest_result->where('ecourse_id', $ecourse->id) as $posttestResult)
                        <p> {{ $posttestResult->nilai }}</p>
                    @endforeach --}}

                </div>
                @auth
                    @if ($latestPosttestResult)
                        @if ($latestPosttestResult->nilai > 49)
                            @if ($ecourse->bayar == 0)
                                <button
                                    class="mt-4 w-full rounded-lg bg-[#196ECD] px-4 py-3 text-base font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">
                                    <a href="{{ route('donasi') }}">Download Sertifikat</a>
                                </button>
                            @elseif ($ecourse->bayar == 1 || $ecourse->bayar == 2)
                                <button
                                    class="mt-4 w-full rounded-lg bg-[#196ECD] px-4 py-3 text-base font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">
                                    @if ($pembayaran && $pembayaran->status === 'belum')
                                        <a href="{{ route('pembayaran', ['ecourse' => $ecourse->slug]) }}">Download
                                            Sertifikat</a>
                                    @elseif($pembayaran == null)
                                        <a href="{{ route('pembayaran', ['ecourse' => $ecourse->slug]) }}">Download
                                            Sertifikat</a>
                                    @else
                                        <a href="{{ route('sertifikatecourse') }}">Download Sertifikat</a>
                                    @endif
                                </button>
                            @endif
                        @else
                            <button
                                class="mt-4 w-full cursor-not-allowed rounded-lg bg-slate-500 px-4 py-3 text-base font-medium text-white hover:bg-slate-800 focus:outline-none focus:ring-4 focus:ring-blue-300"
                                disabled>Download Sertifikat</button>
                            <p class="mx-auto mt-2 text-center text-sm text-slate-400"><i class="ri-information-fill"></i>
                                Nilai Post Test Kurang Dari 70</p>
                        @endif
                    @else
                        <button
                            class="mt-4 w-full cursor-not-allowed rounded-lg bg-slate-500 px-4 py-3 text-base font-medium text-white hover:bg-slate-800 focus:outline-none focus:ring-4 focus:ring-blue-300"
                            disabled>Download Sertifikat</button>
                        <p class="mx-auto mt-2 text-center text-sm text-slate-400"><i class="ri-information-fill"></i> Belum
                            Mengerjakan Post Test</p>
                    @endif
                @endauth
                @guest
                    <button
                        class="mt-4 w-full rounded-lg bg-[#196ECD] px-4 py-3 text-base font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">
                        <a href="{{ route('login') }}">Login</a>
                    </button>
                @endguest




                @auth
                    @if ($latestPosttestResult)
                        @if ($latestPosttestResult->nilai > 49)
                            @if ($ecourse->bayar == 0)
                                <button
                                    class="mt-4 w-full rounded-lg bg-[#196ECD] px-4 py-3 text-base font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">
                                    <a href="{{ route('donasi') }}">Download Fasilitas</a>
                                </button>
                            @elseif ($ecourse->bayar == 1 || $ecourse->bayar == 2)
                                <button
                                    class="mt-4 w-full rounded-lg bg-[#196ECD] px-4 py-3 text-base font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">
                                    @if ($pembayaran && $pembayaran->status === 'belum')
                                        <a href="{{ route('pembayaran', ['ecourse' => $ecourse->slug]) }}">Download
                                            Fasilitas</a>
                                    @elseif($pembayaran == null)
                                        <a href="{{ route('pembayaran', ['ecourse' => $ecourse->slug]) }}">Download
                                            Fasilitas</a>
                                    @else
                                        <a href="{{ route('sertifikatecourse') }}">Download Fasilitas</a>
                                    @endif
                                </button>
                            @endif
                        @else
                            <button
                                class="mt-4 w-full cursor-not-allowed rounded-lg bg-slate-500 px-4 py-3 text-base font-medium text-white hover:bg-slate-800 focus:outline-none focus:ring-4 focus:ring-blue-300"
                                disabled>Download Fasilitas</button>
                            <p class="mx-auto mt-2 text-center text-sm text-slate-400"><i class="ri-information-fill"></i>
                                Nilai Post Test Kurang Dari 70</p>
                        @endif
                    @else
                        <button
                            class="mt-4 w-full cursor-not-allowed rounded-lg bg-slate-500 px-4 py-3 text-base font-medium text-white hover:bg-slate-800 focus:outline-none focus:ring-4 focus:ring-blue-300"
                            disabled>Download Fasilitas</button>
                        <p class="mx-auto mt-2 text-center text-sm text-slate-400"><i class="ri-information-fill"></i> Belum
                            Mengerjakan Post Test</p>
                    @endif
                @endauth
                @guest
                    <button
                        class="mt-4 w-full rounded-lg bg-[#196ECD] px-4 py-3 text-base font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">
                        <a href="{{ route('login') }}">Login</a>
                    </button>
                @endguest
            </div>
        </div>
    </div>
    <div class="mb-4">
        <p class="mx-auto mb-1 max-w-[90%] font-inter text-xl font-bold md:max-w-main">Ecourse Lainnya</p>
    </div>
    <div class="mx-auto mb-10 grid max-w-[90%] grid-cols-1 gap-5 md:max-w-main md:grid-cols-3">
        @foreach ($EcourseLainnya as $ecours)
            <div class="">
                <a href="/ecourse/{{ $ecours->slug }}"><img class="rounded-xl border"
                        src="{{ asset('imgecourse/' . $ecours->img . '.webp') }}" alt=""></a>
                <div class="mt-2 flex gap-1">
                    <a href="/ecourse/{{ $ecours->slug }}">
                        <p class="font-inter font-medium">{{ $ecours->judul }}</p>
                    </a>
                    <p class="font-inter font-bold">{{ $ecours->bayar == 1 ? 'Premium' : 'Free' }}</p>
                </div>
                <p class="mt-2 font-inter text-sm text-slate-500">Oleh <b>Belajar Era Digital</b></p>
            </div>
        @endforeach
    </div>
    <script src="{{ url('home-resource/js/script.js?v=19.1.24a') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const isAuthenticated = @json($isAuthenticated);

            if (!isAuthenticated) {
                document.getElementById('loginModal').classList.remove('hidden');
            }

            // Tambahkan event listener untuk tombol close
            document.getElementById('closeModal').addEventListener('click', function() {
                document.getElementById('loginModal').classList.add('hidden');
            });
        });



        function toggleDropdown(dropdownId) {
            var dropdownContent = document.getElementById(dropdownId);

            // Close all dropdowns
            var allDropdowns = document.querySelectorAll(".dropdown-content");
            allDropdowns.forEach(function(dropdown) {
                if (dropdown !== dropdownContent) {
                    dropdown.style.display = "none";
                    dropdown.previousElementSibling.classList.remove("active");
                }
            });

            // Toggle the clicked dropdown
            if (dropdownContent.style.display === "none") {
                dropdownContent.style.display = "block";
                dropdownContent.previousElementSibling.classList.add("active");
            } else {
                dropdownContent.style.display = "none";
                dropdownContent.previousElementSibling.classList.remove("active");
            }
        }
    </script>
    @include('home.home-layouts.tw-home-footer')
@endsection
