@extends('home.home-layouts.home-main-tw')
@section('container')
    <div class="md:pb-13 bg-[url(/img/ui/bg-sertif.png)] pb-8">
        @include('home.home-layouts.tw-home-navbar')
        <div class="mx-auto max-w-[90%] pt-10 md:max-w-main md:pt-5">
            <p class="md:text-lg text-base text-[#64748B]">Presensi</p>
            <p class="md:text-xl text-lg font-bold">{{ $presensi->judul }} </p>
        </div>
    </div>
    <div class="bg-[#1B7BE7] py-8">
        <div class="mx-auto flex max-w-[90%] flex-col justify-between gap-4 md:max-w-main md:flex-row md:items-center">
            <img class="rounded-lg" src="{{ asset('header/' . $presensi->header->image) }}">
        </div>
    </div>
    <div class="mx-auto max-w-[90%] md:max-w-main mt-6 mb-10 flex justify-between flex-col md:flex-row gap-7">
        <div class="md:w-[789px] w-full">
            <div class="bg-[#EBF5FF] p-7 rounded-lg">
                <h3 class="font-bold text-xl mb-2">Presensi✨</h3>
                {{-- <p class="text-[#64748B]">Isikan identitas diri dan selesaikan tugas Post Test dibawah untuk membuktikan bahwa anda sudah mengikuti kegiatan secara penuh dan dapat mengisi absensi.</p> --}}
            </div>
            <div>
                <form class="row g-3 mt-1" action="/presensi/tambahdata" method="POST">
                    @csrf
                    {{-- <h3 class="form-header">{{ $presensi->judul }}</h3> --}}
    
                    {{-- cek error --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
    
                    <input type="hidden" name="judul" value="{{ $presensi->judul }}">
                    <input type="hidden" name="slug" value="{{ $presensi->slug }}">
                    {{-- <h5 class="form-header"><b>{{ $presensi->judul }}</b></h5> --}}
                    <h3 class="font-bold text-xl mt-4">Data Diri</h3>
                    <div>
                        <label for="nama" class="form-label mb-2 mt-3 block font-semibold text-[#64748B]">Nama Lengkap dan Gelar</label>
                        <input type="text" class="form-control block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" id="nama" name="nama"
                            placeholder="Contoh: Arga Dian, S.Pd" required>
                    </div>
                    <div>
                        <label for="instansi" class="form-label mb-2 mt-3 block font-semibold text-[#64748B]">Instansi</label>
                        <input type="text" class="form-control block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" id="instansi" name="instansi"
                            placeholder="Contoh: SD N 01 Sambirejo" required>
                    </div>
                    <div>
                        <label for="posisi" class="form-label mb-2 mt-3 block font-semibold text-[#64748B]">Posisi</label>
                        <select class="form-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-1.5" aria-label="Default select example" name="posisi">
                            <option class="text-base" value="Guru">Guru</option>
                            <option class="text-base" value="Kepala Sekolah">Kepala Sekolah</option>
                            <option class="text-base" value="Pengawas Sekolah">Pengawas Sekolah</option>
                            <option class="text-base" value="Umum">Umum</option>
                        </select>
                    </div>
                    <div>
                        <label for="email" class="form-label mb-2 mt-3 block font-semibold text-[#64748B]">Email</label>
                        <input type="email" class="form-control block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" id="email" name="email"
                            placeholder="argadian@gmail.com" required>
                    </div>
                    <div>
                        <label for="whatsapp" class="form-label mb-2 mt-3 block font-semibold text-[#64748B]">WhatsApp (Diawali Dengan 0)</label>
                        <input type="text" class="form-control block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" id="whatsapp" name="whatsapp" placeholder="085289764523"
                            required>
                    </div>
                    <div>
                        <label for="provinsi" class="form-label mb-2 mt-3 block font-semibold text-[#64748B]">Provinsi Asal</label>
                        <input type="text" class="form-control block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" id="provinsi" name="provinsi"
                            placeholder="Contoh: Jawa Tengah" required>
                    </div>
                    <div>
                        <label for="kota" class="form-label mb-2 mt-3 block font-semibold text-[#64748B]">Kota/Kabupaten</label>
                        <input type="text" class="form-control block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" id="kota" name="kota"
                            placeholder="Contoh: Kota Semarang" required>
                    </div>
    
                    @foreach (json_decode($presensi->video) as $index => $video)
                        <h5 class="font-bold text-xl mt-4">Post Test {{ $index + 1 }}</h5>
                        <div>
                            <label for="postest1" class="form-label mb-3 mt-1 block text-[#64748B]">Silahkan simak video dibawah lalu berikan ringkasan singkat
                                terkait video tersebut pada kolom yang ada
                            </label>
                                <iframe class="aspect-video w-full rounded-2xl mb-3" src="{{ $video->link }}" allowfullscreen></iframe>
                            <textarea class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="postest1" rows="5" placeholder="Ringkasan Video" required></textarea>
                        </div>
                    @endforeach
    
                    @foreach (json_decode($presensi->artikel) as $index => $artikel)
                        <h5 class="font-bold text-xl mt-4">Post Test {{ $index + 3 }}</h5>
                        <div>
                            <label for="postest3" class="form-label mb-3 mt-1 block text-[#64748B]">
                                <a class="mb-1 mt-1 block font-bold text-[#196ECD]" href=" {{ $artikel->link }}"> {{ $artikel->link }}</a>
                                Baca artikel diatas lalu untuk menjawab pertanyaan: {{ $artikel->pertanyaan }}
                            </label>
                            <textarea class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" rows="5" placeholder="Jawaban"required></textarea>
                        </div>
                    @endforeach
    
                    <div class="col-12">
                        <button type="submit" class="mb-2 me-2 mt-5 rounded-lg bg-[#196ECD] px-4 py-2.5 text-base font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300"> Kirim </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="max-w-[350px]">
            <a href="https://bacakembali.com" target="_blank"><img class="mb-5 border rounded-lg" src="/img/ui/ticykitbanner3.jpg"></a>
            <a href="/ticykit" target="_blank"><img class="mb-5 border rounded-lg" src="/img/ui/ticykitbanner2.jpg"></a>
        </div>
    </div>
    @include('home.home-layouts.tw-home-footer')
@endsection