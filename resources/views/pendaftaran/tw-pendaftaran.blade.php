@extends('home.home-layouts.home-main-tw')
@section('container')
    <div class="md:pb-13 bg-[url(/img/ui/bg-sertif.png)] pb-8">
        @include('home.home-layouts.tw-home-navbar')
        <div class="mx-auto max-w-[90%] pt-10 md:max-w-main md:pt-5">
            <p class="md:text-lg text-base text-[#64748B]">Pendaftaran Diklat</p>
            <p class="md:text-xl text-lg font-bold">{{ $pendaftaran->judul }}</p>
        </div>
    </div>
    <div class="bg-[#1B7BE7] py-8">
        <div class="mx-auto flex max-w-[90%] flex-col justify-between gap-4 md:max-w-main md:flex-row md:items-center">
            <img class="rounded-lg" src="{{ asset('header/' . $pendaftaran->header->image) }}">
        </div>
    </div>
    <div class="mx-auto max-w-[90%] md:max-w-main mt-6 mb-10 flex justify-between flex-col md:flex-row gap-7">
        <div class="md:w-[789px] w-full">
            <div class="bg-[#EBF5FF] p-7 rounded-lg">
                <h3 class="font-bold text-xl mb-2">Pendaftaran Diklat ✨</h3>
                <p class="text-[#64748B]">Isikan identitas diri anda untuk mendaftar kegiatan {{ $pendaftaran->judul }}, jika sudah mendaftar cek nama anda di link dibawah</p>
                <a href="/cekpendaftaran" type="submit" name="absen"
                    class="mb-2 mt-3 rounded-lg bg-[#196ECD] px-3 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300"
                    value="LOGIN">Cek Daftar Peserta disini</a>
            </div>
            <div>
                <form class="row g-3 mt-1" action="/pendaftaran/tambahdata" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div>
                        <label for="nama" class="mb-2 mt-3 block font-semibold text-[#64748B]">Nama Lengkap dan Gelar</label>
                        <input type="text" class="form-control block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" id="nama" name="nama"
                            placeholder="Contoh: Arga Dian, S.Pd" required>
                    </div>
                    <div>
                        <label for="email" class="mb-2 mt-3 block font-semibold text-[#64748B]">Email</label>
                        <input type="email" class="form-control block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" id="email" name="email"
                            placeholder="argadian@gmail.com" required>
                    </div>
                    <div>
                        <label for="whatsapp" class="mb-2 mt-3 block font-semibold text-[#64748B]">WhatsApp (Diawali Dengan 0)</label>
                        <input type="text" class="form-control block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" id="whatsapp" name="whatsapp" placeholder="085289764523"
                            required>
                    </div>
                    <div>
                        <label for="provinsi" class="mb-2 mt-3 block font-semibold text-[#64748B]">Provinsi Asal</label>
                        <input type="text" class="form-control block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" id="provinsi" name="provinsi"
                            placeholder="Contoh: Jawa Tengah" required>
                    </div>
                    <div>
                        <label for="kota" class="mb-2 mt-3 block font-semibold text-[#64748B]">Kota/Kabupaten</label>
                        <input type="text" class="form-control block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" id="kota" name="kota"
                            placeholder="Contoh: Kota Semarang" required>
                    </div>
                    <div>
                        <label for="instansi" class="mb-2 mt-3 block font-semibold text-[#64748B]">Instansi</label>
                        <input type="text" class="form-control block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" id="instansi" name="instansi"
                            placeholder="Contoh: SD N 01 Sambirejo" required>
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
                        <label for="status" class="mb-2 mt-3 block font-semibold text-[#64748B]">Status Pekerjaan</label>
                        <select class="form-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-1.5" aria-label="Default select example" name="status">
                            <option value="Pns">PNS</option>
                            <option value="Pppk">PPPK</option>
                            <option value="Honorer">Honorer</option>
                            <option value="Swasta">Swasta</option>
                            <option value="Pengusaha">Pengusaha</option>
                            <option value="Belumbekerja">Belum Bekerja</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                    <div>
                        <label for="sudahpernah" class="mb-2 mt-3 block font-semibold text-[#64748B]">Pernah Mengikuti Kegiatan?</label>
                        <select class="form-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-1.5" aria-label="Default select example" name="sudahpernah">
                            <option value="Sudahpernah">Sudah Pernah</option>
                            <option value="Belumpernah">Belum Pernah</option>
                        </select>
                    </div>
                    <div>
                        <label for="informasi" class="mb-2 mt-3 block font-semibold text-[#64748B]">Darimana mengetahui informasi ini?</label>
                        <select class="form-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-1.5" aria-label="Default select example" name="informasi">
                            <option value="Chatwhatsapp">Chat WhatsApp</option>
                            <option value="Grupwhatsapp">Grup Whatsapp</option>
                            <option value="Instagram">Instagram</option>
                            <option value="Facebook">Facebook</option>
                            <option value="Rekomendasi">Rekomendasi Orang</option>
                            <option value="Telegram">Telegram</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                    <div>
                        <p class="mt-5 mb-1 text-2xl font-bold">Syarat Registrasi</p>
                        <p class="mb-2 block text-[#64748B]">Syarat registrasi kegiatan ini adalah mengirimkan informasi ini ke 5 grup pendidik, bisa kepala
                            sekolah/ guru/ ASN/ MGMP/ dosen/ tutor/ mahasiswa/ dsb.</p>
                        <label for="sudahshare" class="mb-2 mt-3 block font-semibold text-[#64748B]">Apakah Sudah Share di Grup WhatsApp?</label>
                        <select class="form-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-1.5" aria-label="Default select example" name="sudahshare">
                            <option value="Sudahshare">Sudah Share</option>
                            <option value="Belumshare">Belum, akan saya share dan kembali ke formulir ini</option>
                        </select>
                    </div>
                    <div>
                        <p class="mb-2 mt-3 block font-semibold">Bukti share informasi ini ke 5 grup WA anda (Screenshoot)</p>
                        <label for="image1" class="mb-2 mt-3 block font-semibold text-[#64748B]">Upload Screenshoot 1</label>
                        <Input class="form-control block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none disabled:opacity-50 disabled:pointer-events-none file:bg-[##64748B] file:border-0 file:me-4 file:py-2.5 file:px-3" type="file" id="image1" name="image1">

                        <label for="image2" class="mb-2 mt-3 block font-semibold text-[#64748B]">Upload Screenshoot 2</label>
                        <Input class="form-control block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none disabled:opacity-50 disabled:pointer-events-none file:bg-[##64748B] file:border-0 file:me-4 file:py-2.5 file:px-3" type="file" id="image2" name="image2">
    
                        <label for="image3" class="mb-2 mt-3 block font-semibold text-[#64748B]">Upload Screenshoot 3</label>
                        <Input class="form-control block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none disabled:opacity-50 disabled:pointer-events-none file:bg-[##64748B] file:border-0 file:me-4 file:py-2.5 file:px-3" type="file" id="image3" name="image3">
    
                        <label for="image4" class="mb-2 mt-3 block font-semibold text-[#64748B]">Upload Screenshoot 4</label>
                        <Input class="form-control block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none disabled:opacity-50 disabled:pointer-events-none file:bg-[##64748B] file:border-0 file:me-4 file:py-2.5 file:px-3" type="file" id="image4" name="image4">
    
                        <label for="image5" class="mb-2 mt-3 block font-semibold text-[#64748B]">Upload Screenshoot 5</label>
                        <Input class="form-control block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none disabled:opacity-50 disabled:pointer-events-none file:bg-[##64748B] file:border-0 file:me-4 file:py-2.5 file:px-3" type="file" id="image5" name="image5">
                    </div>
                    <div>
                        <div class="mt-5 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <p class="text-xl text-red-700 mb-1 font-bold">PENTING !!!</p>
                            <p class="text-red-800">Informasi detail kegiatan akan kami bagikan melalui Grup WhatsApp kegiatan. Pastikan anda sudah masuk grup kegiatan. <a
                                href="https://linktr.ee/InformasiDiklat" target="_blank" class="font-bold">KLIK DI SINI UNTUK GABUNG!!!</a></p>
                        </div>
                        <label for="sudahgabung" class="mb-2 mt-3 block font-semibold text-[#64748B]">Apakah Sudah Gabung Grup Kegiatan?</label>
                        <select class="form-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-1.5" aria-label="Default select example" name="sudahgabung">
                            <option value="Sudahgabung">Sudah Gabung</option>
                            <option value="Belumgabung">Belum Gabung</option>
                        </select>
                    </div>
    
                    <div>
                        <button type="submit" class="mb-2 me-2 mt-5 rounded-lg bg-[#196ECD] px-4 py-2.5 text-base font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">Daftar</button>
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
