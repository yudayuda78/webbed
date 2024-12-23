@extends('home.home-layouts.home-main-tw')
@section('container')
    <div class="md:pb-13 bg-[url(/img/ui/bg-sertif.png)] pb-8">
        @include('home.home-layouts.tw-home-navbar')
        <div class="mx-auto max-w-[90%] pt-10 md:max-w-main md:pt-5">
            <p class="text-base text-[#64748B] md:text-lg">Evaluasi Diklat</p>
            <p class="text-lg font-bold md:text-xl">{{ $evaluasi->judul }}</p>
        </div>
    </div>
    {{-- <div class="bg-[#1B7BE7] py-8">
        <div class="mx-auto flex max-w-[90%] flex-col justify-between gap-4 md:max-w-main md:flex-row md:items-center">
            <img class="rounded-lg" src="{{ asset('header/' . $evaluasi->image) }}">
        </div>
    </div> --}}
    <div class="mx-auto mb-10 mt-6 flex max-w-[90%] flex-col justify-between gap-7 md:max-w-main md:flex-row">
        <div class="w-full md:w-[750px]">
            <div class="rounded-lg bg-[#EBF5FF] p-7">
                <h3 class="mb-2 text-xl font-bold">Evaluasi Diklat ✨</h3>
                <p class="text-[#64748B]">Isikan form evaluasi kegiatan dibawah sesuai dengan pengalaman anda melaksanakan
                    kegiatan {{ $evaluasi->judul }} untuk mendapatkan link download sertifikat.</p>
                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9697129609724227"
                    crossorigin="anonymous"></script>
                <ins class="adsbygoogle" style="display:block; text-align:center;" data-ad-layout="in-article"
                    data-ad-format="fluid" data-ad-client="ca-pub-9697129609724227" data-ad-slot="1581340639"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
            <div>
                <form class="row g-3 mt-1" action="{{ route('evaluasi.tambahdata') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                document.getElementById('errorModal').classList.remove('hidden');
                            });
                        </script>
                    @endif
                    <div>
                        <input type="hidden" name="judul" value="{{ $evaluasi->judul }}">
                        <input type="hidden" name="slug" value="{{ $evaluasi->slug }}">

                        <label for="nama" class="mb-2 mt-5 block font-semibold text-[#64748B]">Nama Lengkap dan
                            Gelar</label>
                        <input type="text"
                            class="form-control block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                            id="nama" name="nama" placeholder="Contoh: Arga Dian, S.Pd" required>
                    </div>
                    <div>
                        <label for="email" class="mb-2 mt-3 block font-semibold text-[#64748B]">Email</label>
                        <input type="email"
                            class="form-control block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                            id="email" name="email" placeholder="argadian@gmail.com" required>
                    </div>
                    <div>
                        <label for="whatsapp" class="mb-2 mt-3 block font-semibold text-[#64748B]">WhatsApp (Diawali Dengan
                            0)</label>
                        <input type="text"
                            class="form-control block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                            id="whatsapp" name="whatsapp" placeholder="085289764523" required>
                    </div>

                    <div>
                        <label for="instansi" class="mb-2 mt-3 block font-semibold text-[#64748B]">Instansi</label>
                        <input type="text"
                            class="form-control block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                            id="instansi" name="instansi" placeholder="Contoh: SD N 01 Sambirejo" required>
                    </div>

                    <div>
                        <label for="instansi" class="mb-2 mt-3 block font-semibold text-[#64748B]">Nilai untuk
                            panitia</label>
                        <ul
                            class="w-full items-center rounded-lg border border-gray-300 bg-gray-50 bg-white text-sm font-medium text-gray-900 sm:flex">
                            <li
                                class="w-full border-b border-gray-300 bg-gray-50 dark:border-gray-600 sm:border-b-0 sm:border-r">
                                <div class="flex items-center ps-3">
                                    <input type="radio" id="nilai1" name="nilaipanitia" value="1"
                                        class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500">
                                    <label for="nilai1"
                                        class="ms-2 w-full py-3 text-sm font-medium text-gray-900 dark:text-gray-300">1</label>
                                </div>
                            </li>
                            <li
                                class="w-full border-b border-gray-300 bg-gray-50 dark:border-gray-600 sm:border-b-0 sm:border-r">
                                <div class="flex items-center ps-3">
                                    <input type="radio" id="nilai2" name="nilaipanitia" value="2"
                                        class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500">
                                    <label for="nilai2"
                                        class="ms-2 w-full py-3 text-sm font-medium text-gray-900 dark:text-gray-300">2</label>
                                </div>
                            </li>
                            <li
                                class="w-full border-b border-gray-300 bg-gray-50 dark:border-gray-600 sm:border-b-0 sm:border-r">
                                <div class="flex items-center ps-3">
                                    <input type="radio" id="nilai3" name="nilaipanitia" value="3"
                                        class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500">
                                    <label for="nilai3"
                                        class="ms-2 w-full py-3 text-sm font-medium text-gray-900 dark:text-gray-300">3</label>
                                </div>
                            </li>
                            <li
                                class="w-full border-b border-gray-300 bg-gray-50 dark:border-gray-600 sm:border-b-0 sm:border-r">
                                <div class="flex items-center ps-3">
                                    <input type="radio" id="nilai4" name="nilaipanitia" value="4"
                                        class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500">
                                    <label for="nilai4"
                                        class="ms-2 w-full py-3 text-sm font-medium text-gray-900 dark:text-gray-300">4</label>
                                </div>
                            </li>
                            <li class="w-full border-gray-300 bg-gray-50 dark:border-gray-600">
                                <div class="flex items-center ps-3">
                                    <input type="radio" id="nilai5" name="nilaipanitia" value="5"
                                        class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500">
                                    <label for="nilai5"
                                        class="ms-2 w-full py-3 text-sm font-medium text-gray-900 dark:text-gray-300">5</label>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <label for="instansi" class="mb-2 mt-3 block font-semibold text-[#64748B]">Saran topik kegiatan
                            selanjutnya (Kosongi apabila tidak ada saran)</label>
                        <div class="grid grid-cols-1 gap-2">
                            @if (count($kumpulantopik) > 0)
                                @foreach ($kumpulantopik as $topik)
                                    <div class="flex items-center rounded-lg border border-gray-300 bg-gray-50 ps-4">
                                        <input type="checkbox" id="topik1" name="topik[]"
                                            class="h-4 w-4 rounded-lg border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500"
                                            value="{{ $topik }}">
                                        <label for="topik1" class="ms-2 w-full py-3 text-sm font-medium text-gray-900">
                                            {{ $topik }}</label>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-sm text-gray-500">Tidak ada topik yang tersedia saat ini.</p>
                            @endif

                            <div class="flex items-center rounded-lg border border-gray-300 bg-gray-50 ps-4">
                                <input type="checkbox" id="topikOther" name="topikOtherCheckbox"
                                    class="h-4 w-4 rounded-lg border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500"
                                    value="Other" onclick="toggleOtherInput(this)">
                                <label for="topikOther" class="ms-2 w-full py-3 text-sm font-medium text-gray-900">
                                    Lainnya</label>
                            </div>
                            <div id="otherInputDiv" class="hidden">
                                <input type="text" id="topikOtherText" name="topikOtherText"
                                    class="form-control block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                                    placeholder="Masukan topik yang anda minati lainnya!">

                            </div>

                            <input type="hidden" id="hiddenOtherText" name="topik[]" value="">

                        </div>
                    </div>

                    <div>
                        <label for="saran" class="mb-2 mt-3 block font-semibold text-[#64748B]">Kendala dalam kegiatan
                            atau akses website (Kosongi apabila tidak ada saran)

                        </label>
                        <textarea type="text"
                            class="form-control block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                            id="saran" name="saran" placeholder="Masukkan saran disini maksimal 255 karakter" rows="4"></textarea>
                    </div>

                    <div>
                        <label for="kebutuhanguru" class="mb-2 mt-3 block font-semibold text-[#64748B]">Selain kegiatan
                            pengembangan diri, hal apa yang anda butuhkan sebagai seorang guru

                        </label>
                        <textarea type="text"
                            class="form-control block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                            id="kebutuhanguru" name="kebutuhanguru" placeholder="Tulis disini" rows="4"></textarea>
                    </div>

                    <div>
                        <button type="submit"
                            class="mb-2 me-2 mt-5 rounded-lg bg-[#196ECD] px-4 py-2.5 text-base font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="max-w-none space-y-3 md:max-w-[380px]">
            @foreach ($isiEvent as $isi)
                <div class="flex max-w-none flex-col justify-between rounded-2xl border p-3 md:max-w-[378px]">
                    <div>
                        <a href="/event/{{ $isi->slug }}"
                            class="relative block aspect-square overflow-hidden rounded-[10px]">
                            <img class="h-full w-full rounded-[10px] object-cover object-top transition duration-300"
                                src="/pendaftaran/{{ $isi->image }}" alt="{{ $isi->judul }}">
                            <div
                                class="absolute inset-0 bg-ticykit-bg-blue opacity-0 transition duration-300 hover:opacity-50">
                            </div>
                        </a>
                        <p class="pb-1 pt-3 text-ticykit-secondary">{{ $isi->oleh }}</p>
                        <p class="mb-1 pb-1 text-sm text-ticykit-secondary"><i
                                class="ri-calendar-schedule-line rounded-sm border p-1 text-ticykit-bg-blue"></i>
                            {{ $isi->tanggalpelaksanaan }}</p>
                        <a href="/event/{{ $isi->slug }}">
                            @php
                                $judul_terbaru = explode('(', $isi->judul)[0];
                            @endphp
                            <h1 class="pb-1 text-[17px] font-bold leading-snug">{{ trim($judul_terbaru) }}</h1>
                        </a>

                    </div>
                    <div class="mt-1">
                        <a href="/event/{{ $isi->slug }}"
                            class="me-2 mt-1 flex justify-center rounded-lg bg-green-600 px-4 py-2 text-base font-medium text-white hover:bg-green-700">
                            <i class="ri-checkbox-circle-line me-1"></i>Pendaftaran Dibuka
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Modal -->
    <div id="errorModal" class="modal fixed left-0 top-0 flex hidden h-full w-full items-center justify-center">
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

    @include('home.home-layouts.tw-home-footer')

    <script>
        document.querySelectorAll('.modal-close').forEach(function(element) {
            element.addEventListener('click', function() {
                document.getElementById('errorModal').classList.add('hidden');
            });
        });

        function toggleOtherInput(checkbox) {
            var otherInputDiv = document.getElementById('otherInputDiv');
            if (checkbox.checked) {
                otherInputDiv.classList.remove('hidden');
            } else {
                otherInputDiv.classList.add('hidden');
                document.getElementById('hiddenOtherText').value = "";
            }
        }

        document.getElementById('topikOtherText').addEventListener('input', function() {
            document.getElementById('hiddenOtherText').value = this.value;
        });
    </script>
@endsection
