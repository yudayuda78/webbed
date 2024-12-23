@extends('home.home-layouts.home-main-tw')
@section('container')
    <div class="md:pb-13 bg-[url(/img/ui/bg-sertif.png)] pb-8">
        @include('home.home-layouts.tw-home-navbar')
        <div class="mx-auto max-w-[90%] pt-10 md:max-w-main md:pt-5">
            <p class="md:text-lg text-base text-[#64748B]">Presensi & Post Test</p>
            <p class="md:text-xl text-lg font-bold">Hari Pertama Workshop 40 JP: Pemanfaatan PMM untuk Pembelajaran dan Peningkatan Kompetensi Guru</p>
        </div>
    </div>
    <div class="bg-[#1B7BE7] py-8">
        <div class="mx-auto flex max-w-[90%] flex-col justify-between gap-4 md:max-w-main md:flex-row md:items-center">
            <img class="rounded-lg" src="/img/5-8jan.webp">
        </div>
    </div>
    <div class="mx-auto max-w-[90%] md:max-w-main mt-6 mb-10 flex justify-between flex-col md:flex-row gap-7">
        <div class="md:w-[789px] w-full">
            <div class="bg-[#EBF5FF] p-7 rounded-lg">
                <h3 class="font-bold text-xl mb-2">Presensi & Post Test ✨</h3>
                <p class="text-[#64748B]">Isikan identitas diri dan selesaikan tugas Post Test dibawah untuk membuktikan bahwa anda sudah mengikuti kegiatan secara penuh dan dapat mengisi absensi.</p>
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
                    <input type="hidden" name="judul" value="{{ $presensi->slug }}">
                    <h5 class="form-header"><b>{{ $presensi->judul }} {{ $presensi->slug }}</b></h5>
                    <div class="col-12">
                        <label for="nama" class="form-label">Nama Lengkap dan Gelar</label>
                        <input type="text" class="form-control" id="nama" name="nama"
                            placeholder="Contoh: Arga Dian, S.Pd" required>
                    </div>
                    <div class="col-md-6">
                        <label for="instansi" class="form-label">Instansi</label>
                        <input type="text" class="form-control" id="instansi" name="instansi"
                            placeholder="Contoh: SD N 01 Sambirejo" required>
                    </div>
                    <div class="col-md-6">
                        <label for="posisi" class="form-label">Posisi</label>
                        <select class="form-select" aria-label="Default select example" name="posisi">
                            <option value="Guru">Guru</option>
                            <option value="Kepala Sekolah">Kepala Sekolah</option>
                            <option value="Pengawas Sekolah">Pengawas Sekolah</option>
                            <option value="Umum">Umum</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="argadian@gmail.com" required>
                    </div>
                    <div class="col-md-6">
                        <label for="whatsapp" class="form-label">WhatsApp (Diawali Dengan 0)</label>
                        <input type="text" class="form-control" id="whatsapp" name="whatsapp" placeholder="085289764523"
                            required>
                    </div>
                    <div class="col-md-6">
                        <label for="provinsi" class="form-label">Provinsi Asal</label>
                        <input type="text" class="form-control" id="provinsi" name="provinsi"
                            placeholder="Contoh: Jawa Tengah" required>
                    </div>
                    <div class="col-md-6">
                        <label for="kota" class="form-label">Kota/Kabupaten</label>
                        <input type="text" class="form-control" id="kota" name="kota"
                            placeholder="Contoh: Kota Semarang" required>
                    </div>
    
                    @foreach (json_decode($presensi->video) as $index => $video)
                        <h5 class="form-header mt-4"><b>Post Test {{ $index + 1 }} </b></h5>
                        <div class="col-12">
                            <label for="postest1" class="form-label">Silahkan simak video dibawah lalu berikan ringkasan singkat
                                terkait video tersebut pada kolom yang ada
                            </label>
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="{{ $video->link }}" allowfullscreen></iframe>
                            </div>
                            <textarea class="form-control mt-4" id="postest1" rows="5" placeholder="Ringkasan Video" required></textarea>
                        </div>
                    @endforeach
    
                    @foreach (json_decode($presensi->artikel) as $index => $artikel)
                        <h5 class="form-header mt-4"><b>Post Test {{ $index + 3 }}</b></h5>
                        <div class="col-12">
                            <label for="postest3" class="form-label">
                                <a href=" {{ $artikel->link }}"> {{ $artikel->link }}</a><br>
                                Baca artikel diatas lalu untuk menjawab pertanyaan: {{ $artikel->pertanyaan }}
                            </label>
                            <textarea class="form-control mt-2" id="postest3" rows="5" placeholder="Jawaban"required></textarea>
                        </div>
                    @endforeach
    
                    <div class="col-12">
                        <button type="submit" class="join-event-btn btn btn-primary"> Kirim </button>
                    </div>
                </form>
                <h3 class="font-bold text-xl mt-4">Data Diri</h3>
                <div>
                    <label class="mb-2 mt-3 block font-semibold text-[#64748B]">Nama Lengkap dan Gelar</label>
                    <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                    type="text" class="form-control" placeholder="Contoh: Arga Dian, S,Pd"
                    required>
                </div>
                <div>
                    <label class="mb-2 mt-3 block font-semibold text-[#64748B]">Instansi</label>
                    <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                    type="text" class="form-control" placeholder="Contoh: SD N 01 Sambirejo"
                    required>
                </div>
                <div>
                    <label for="profesi" class="mb-2 mt-3 block font-semibold text-[#64748B]">Profesi</label>
                    <select class="form-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-1.5" aria-label="Default select example" name="profesi">
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
                    <label class="mb-2 mt-3 block font-semibold text-[#64748B]">Email</label>
                    <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                    type="text" class="form-control" placeholder="Contoh: argadian@gmail.com"
                    required>
                </div>
                <div>
                    <label class="mb-2 mt-3 block font-semibold text-[#64748B]">WhatsApp (Diawali Dengan 0)</label>
                    <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                    type="text" class="form-control" placeholder="Contoh: 085289764523"
                    required>
                </div>
                <div>
                    <label class="mb-2 mt-3 block font-semibold text-[#64748B]">Provinsi Asal</label>
                    <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                    type="text" class="form-control" placeholder="Contoh: Jawa Tengah"
                    required>
                </div>
                <div>
                    <label class="mb-2 mt-3 block font-semibold text-[#64748B]">Email</label>
                    <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                    type="text" class="form-control" placeholder="Contoh: Kota Semarang"
                    required>
                </div>
                <div>
                    <h3 class="font-bold text-xl mt-4">Post Test 1</h3>
                    <label class="mb-3 mt-1 block text-[#64748B]">Silahkan simak video dibawah ini kemudian berikan ringkasan singkat anda terkait video tersebut pada kolom yang ada</label>
                    <iframe class="aspect-video w-full rounded-2xl mb-3" src="https://www.youtube.com/embed/RMSJcOzb_Co"
                    allowfullscreen></iframe>
                    <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
                </div>
                <div>
                    <h3 class="font-bold text-xl mt-4">Post Test 2</h3>
                    <label class="mb-3 mt-1 block text-[#64748B]">Silahkan simak video dibawah ini kemudian berikan ringkasan singkat anda terkait video tersebut pada kolom yang ada</label>
                    <iframe class="aspect-video w-full rounded-2xl mb-3" src="https://www.youtube.com/embed/RMSJcOzb_Co"
                    allowfullscreen></iframe>
                    <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
                </div>
                <div>
                    <h3 class="font-bold text-xl mt-4">Post Test 3</h3>
                    <a class="mb-1 mt-1 block font-bold text-[#196ECD]" target="_blank" href="https://bacakembali.com/2024/01/13/dampak-penggunaan-animasi-pembelajaran-dalam-dunia-pendidikan/">https://bacakembali.com/2024/01/13/dampak-penggunaan-animasi-pembelajaran-dalam-dunia-pendidikan/</a>
                    <label class="mb-3 mt-1 block text-[#64748B]">Baca artikel diatas lalu untuk menjawab pertanyaan: Bagaimana cara untuk mendaftarkan sekolah pada prgram PMM?</label>
                    <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
                </div>
                <div>
                    <h3 class="font-bold text-xl mt-4">Post Test 4</h3>
                    <a class="mb-1 mt-1 block font-bold text-[#196ECD]" target="_blank" href="https://bacakembali.com/2024/01/13/dampak-penggunaan-animasi-pembelajaran-dalam-dunia-pendidikan/">https://bacakembali.com/2024/01/13/dampak-penggunaan-animasi-pembelajaran-dalam-dunia-pendidikan/</a>
                    <label class="mb-3 mt-1 block text-[#64748B]">Baca artikel diatas lalu untuk menjawab pertanyaan: Bagaimana cara untuk mendaftarkan sekolah pada prgram PMM?</label>
                    <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
                </div>
                <button type="submit" name="absen"
                    class="mb-2 me-2 mt-5 rounded-lg bg-[#196ECD] px-4 py-2.5 text-base font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300"
                    value="LOGIN">Kirim Absen</button>
            </div>
        </div>
        <div class="max-w-[350px]">
            <a href="https://bacakembali.com" target="_blank"><img class="mb-5 border rounded-lg" src="/img/ui/ticykitbanner3.jpg"></a>
            <a href="/ticykit" target="_blank"><img class="mb-5 border rounded-lg" src="/img/ui/ticykitbanner2.jpg"></a>
        </div>
    </div>
    @include('home.home-layouts.tw-home-footer')
@endsection