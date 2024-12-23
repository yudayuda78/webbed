@extends('home.home-layouts.home-main-tw')
@section('container')
<div class="flex flex-col pb-10 gap-y-12">
    <div class="bg-center bg-no-repeat bg-cover md:bg-waves bg-ticykit-bg-blue md:bg-transparent pb-5 md:pb-14">
        <div>
            @include('home.home-layouts.tw-home-navbar-ecourse')
        </div>
        <div class="mx-auto max-w-[90%] md:max-w-main">
            <div class="flex flex-col flex-col-reverse items-center justify-center gap-5 md:flex-row">
                <div class="flex flex-col gap-3 md:gap-5 text-white max-w-[700px]">
                    <h2 class="text-2xl md:text-4xl font-bold">Layanan Pengembangan Skill dan Peningkatan Profesional Guru</h2>
                    <p class="font-medium text-base md:text-lg max-w-[500px]">Belajar Era Digital adalah Platform yang berfokus pada
                        pengembangan kompetensi guru untuk meningkatkan kualitas Pendidikan</p>
                    <div class="flex flex-wrap gap-3 md:gap-5 text-sm md:text-base font-semibold text-white">
                        <a href="/event" class="px-3 py-2 rounded-lg bg-ticykit-primary">Event Diklat Nasional</a>
                        <a href="/ticykit" class="px-3 py-2 rounded-lg bg-ticykit-primary">Bahan Ajar</a>
                        <a href="/ecourse" class="px-3 py-2 rounded-lg bg-ticykit-primary">Ecourse</a>
                        <a href="https://bacakembali.com" class="px-3 py-2 rounded-lg bg-ticykit-primary">Artikel</a>
                    </div>
                </div>
                <div class="mr-0 md:mr-14 pt-14 md:px-0 px-6 px w-full max-w-[405px]">
                    <img src="/img/kerjasama/hero.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="mx-auto max-w-[90%] md:max-w-main flex flex-col gap-8 md:gap-14 items-center ">
        <div class="flex flex-col w-full md:w-10/12 text-center gap-4 md:gap-7">
            <h2 class="text-2xl md:text-3xl font-bold">Kolaborasi dengan kami!</h2>
            <p class="text-base md:text-2xl font-medium">Belajar era digital selalu terbuka untuk berkolaborasi dengan guru, sekolah,
                dan institusi pendidikan lainnya. Kami menawarkan berbagai layanan untuk membantu guru dan sekolah dalam
                meningkatkan kompetensi dan kualitas pendidikan. Mari bersama-sama membangun pendidikan yang lebih baik.
            </p>
        </div>
        <div class="flex flex-col gap-4 md:gap-7">
            <h2 class="text-2xl md:text-3xl font-bold text-center">Mari Tumbuh Bersama Belajar Era Digital</h2>
            <ul class="flex flex-wrap justify-center w-full max-w-4xl gap-7 md:gap-10 text-white md:flex-nowrap">
                <li
                    class="flex flex-col gap-2 p-5 text-justify shadow-lg bg-ticykit-bg-blue shadow-black/40 rounded-xl">
                    <div class="w-full h-40 overflow-hidden rounded-xl md:h-32">
                        <img src="/img/kerjasama/akses.png" class="object-cover w-full h-full" alt="">
                    </div>
                    <h2 class="text-lg font-bold text-center">Akses ke Jaringan Peserta yang Luas</h2>
                    <p class="text-sm font-medium">Ratusan ribu peserta yang bergabung dalam kegiatan kami tiap
                        bulannya.</p>
                </li>
                <li
                    class="flex flex-col gap-2 p-5 text-justify shadow-lg bg-ticykit-bg-blue shadow-black/40 rounded-xl">
                    <div class="w-full h-40 overflow-hidden rounded-xl md:h-32">
                        <img src="/img/kerjasama/kualitas.png" class="object-cover w-full h-full" alt="">
                    </div>
                    <h2 class="text-lg font-bold text-center">Akses ke Sumber Daya Pengajaran Berkualitas</h2>
                    <p class="text-sm font-medium">Kami menyediakan akses ke berbagai sumber daya pengajaran berkualitas
                        tinggi.</p>
                </li>
                <li
                    class="flex flex-col gap-2 p-5 text-justify shadow-lg bg-ticykit-bg-blue shadow-black/40 rounded-xl">
                    <div class="w-full h-40 overflow-hidden rounded-xl md:h-32">
                        <img src="/img/kerjasama/komunitas.png" class="object-cover w-full h-full" alt="">
                    </div>
                    <h2 class="text-lg font-bold text-center">Akses Komunitas <br><span>Pendidikan</span></h2>
                    <p class="text-sm font-medium">Komunitas kami terdiri dari guru, sekolah, dan institusi pendidikan
                        lainnya.</p>
                </li>
            </ul>
        </div>
    </div>
    <div class="py-10 bg-ticykit-bg-blue">
        <div class="mx-auto max-w-[90%] md:max-w-main text-white items-center flex flex-col">
            <h2 class="pb-10 text-2xl md:text-3xl font-bold text-center ">Program di Belajar Era Digital</h2>
            <div class="flex flex-col gap-10 max-w-[80%]">
                <div class="flex flex-wrap items-center justify-center gap-x-20 gap-y-5 md:flex-nowrap">
                    <div class="w-48 md:w-72">
                        <img src="/img/kerjasama/instruktur.svg" class="object-fill w-full h-full" alt="">
                    </div>
                    <div class="flex flex-col gap-3">
                        <h2 class="text-xl md:text-2xl font-bold text-center md:text-left">Instruktur Belajar Era Digital</h2>
                        <ul class="pl-0 md:pl-5 text-base md:text-lg list-disc text-justify	md:text-left flex flex-col gap-3">
                            <li>Mengajar dan berbagi pengetahuan di bidang keahlian Anda.</li>
                            <li>Mendapatkan dukungan dan pelatihan untuk mengasah keterampilan mengajar Anda.</li>
                            <li>Menerima fee yang kompetitif berdasarkan jenis dan durasi program yang Anda ajarkan.
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="flex flex-wrap-reverse items-center justify-center gap-x-20 gap-y-5 md:flex-nowrap">
                    <div class="flex flex-col gap-2">
                        <h2 class="text-xl md:text-2xl font-bold text-center md:text-left">Partnership</h2>
                        <ul class="pl-0 md:pl-5 text-base md:text-lg list-disc text-justify	md:text-left flex flex-col gap-3">
                            <li>Mengembangkan dan mengimplementasikan program pendidikan bersama kami.</li>
                            <li>Memanfaatkan jaringan luas kami untuk mempromosikan program dan inisiatif pendidikan
                                Anda.</li>
                            <li>Berkontribusi dalam acara dan kegiatan yang kami selenggarakan.</li>
                        </ul>
                    </div>
                    <div class="w-48 md:w-72">
                        <img src="/img/kerjasama/partnership.svg" class="object-fill w-full h-full" alt="">
                    </div>
                </div>
                <div class="flex flex-wrap items-center justify-center gap-x-20 gap-y-5 md:flex-nowrap">
                    <div class="w-48 md:w-72">
                        <img src="/img/kerjasama/training.svg" class="object-fill w-full h-full" alt="">
                    </div>
                    <div class="flex flex-col gap-2">
                        <h2 class="text-xl md:text-2xl font-bold text-center md:text-left">Kerjasama Training Institusi</h2>
                        <ul class="pl-0 md:pl-5 text-base md:text-lg list-disc text-justify	md:text-left flex flex-col gap-3">
                            <li>Program training yang disesuaikan dengan kebutuhan institusi Anda.</li>
                            <li>Pelatihan bagi guru, staf, atau siswa sesuai dengan bidang yang diinginkan.</li>
                            <li>Fasilitator berpengalaman yang siap memberikan pelatihan berkualitas.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-black items-center">
        <h2 class="pb-10 text-xl md:text-3xl font-bold text-center ">Hubungi Belajar Era Digital untuk Diskusi Lebih Lanjut</h2>
        <form class="mx-auto max-w-[90%] md:max-w-3xl flex flex-col gap-2" action="/submit-form" method="POST">
            <div class="mb-4">
                <label for="namalengkap" class="text-sm font-medium pb-1">Nama Lengkap*</label>
                <input type="text" id="namalengkap" name="namalengkap"
                    class="w-full p-3 border border-gray-300 rounded bg-gray-50" />
            </div>
            <div class="mb-4">
                <label for="jabatan" class="text-sm font-medium pb-1">Jabatan*</label>
                <input type="text" id="jabatan" name="jabatan" class="w-full p-3 border border-gray-300 rounded bg-gray-50" />
            </div>
            <div class="mb-4">
                <label for="email" class="text-sm font-medium pb-1">Email Resmi*</label>
                <input type="email" id="email" name="email" class="w-full p-3 border border-gray-300 rounded bg-gray-50" />
            </div>
            <div class="mb-4">
                <label for="numberHP" class="text-sm font-medium pb-1">No. HP / WhatsApp*</label>
                <input type="tel" id="numberHP" name="numberHP" class="w-full p-3 border border-gray-300 rounded bg-gray-50" />
            </div>
            <div>
                <label for="pilihanlayanan" class="text-sm font-medium pb-1">Pilih Layanan*</label>
                <select name="layanan" id="pilihanlayanan" class="w-full p-3 mb-4 border border-gray-300 rounded bg-gray-50" onchange="toggleLainnya()">
                    <option value="">Pilih salah satu</option>
                    <option value="Lamaran-instruktur">Lamaran instruktur</option>
                    <option value="Lamaran-konten-creator">Lamaran konten creator</option>
                    <option value="partnership">Partnership</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
                @if (old('layanan') === 'Lainnya')
                    <div id="lainnyaDiv" class="mb-4">
                @else
                    <div id="lainnyaDiv" class="mb-4" style="display: none;">
                @endif
                    <label for="lainnya" class="block pb-2">Sebutkan Layanan Lainnya:</label>
                    <input type="text" name="lainnya" id="lainnya" class="w-full p-3 border border-gray-300 rounded bg-gray-50" value="{{ old('lainnya') }}">
                </div>
            </div>
            <div>
                <label for="pesan" class="text-sm font-medium pb-1">Pesan*</label>
                <textarea id="pesan" name="pesan" rows="7" class="w-full p-3 border border-gray-300 rounded bg-gray-50"></textarea>
            </div>
            <button type="submit" class="p-2 w-full text-white bg-blue-500 rounded-lg font-semibold">Kirim</button>
        </form>
    </div>
</div>
<div id="alert-3"
    class="fixed bottom-5 right-5 flex items-center rounded-xl rounded-br-none bg-ticykit-bg-blue text-white px-2.5 py-1 shadow-md md:bottom-10 md:right-10 hover:bg-[#0C3F93]"
    role="alert">
    <a href="https://linktr.ee/adminbed" rel="noopener noreferrer" target="_blank" class="text-3xl font-medium">
        <i class="rounded-full ri-whatsapp-fill"></i>
    </a>
</div>
@include('home.home-layouts.tw-home-footer')

<script>
    function toggleLainnya() {
        var layananSelect = document.getElementById('pilihanlayanan');
        var lainnyaDiv = document.getElementById('lainnyaDiv');
        if (layananSelect.value === 'Lainnya') {
            lainnyaDiv.style.display = 'block';
        } else {
            lainnyaDiv.style.display = 'none';
        }
    }

    // Ensure the correct state on page load
    document.addEventListener('DOMContentLoaded', function () {
        toggleLainnya();
    });
</script>
@endsection
