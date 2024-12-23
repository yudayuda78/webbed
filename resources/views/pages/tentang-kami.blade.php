@extends('home.home-layouts.home-main-tw')
@section('container')
    @include('home.home-layouts.tw-home-navbar')
    <div class="absolute top-64 h-screen w-full overflow-hidden md:top-40">
        <h1 class="absolute inset-0 m-auto w-max text-[120px] font-extrabold text-[#F1F1F1] md:text-[382px]">
            belajarera
        </h1>
    </div>
    <div class="mx-auto my-16 flex max-w-[90%] flex-col gap-y-8 md:max-w-main md:gap-y-12">
        <div class="z-10 flex flex-col gap-3 md:gap-6">
            <h2 class="text-3xl md:text-6xl">Profil Team <br>
                <span class="font-bold">Belajar Era Digital</span>
            </h2>
            <p class="w-full text-lg text-[#64748B] md:w-3/5 md:text-2xl">Platform pengembangan kompetensi guru untuk
                meningkatkan kualitas Pendidikan di Indonesia</p>
            <button
                class="w-32 rounded-[40px] border-none bg-[#196ECD] px-5 py-3.5 text-base font-medium text-white hover:ring-2 hover:ring-[#072C76]"><a
                    href="/">Homepage</a></button>
        </div>
        <div class="z-10 flex flex-col gap-5 bg-white md:flex-row">
            <div class="w-full rounded-2xl border border-2 border-black">
                <div class="flex flex-col gap-y-8">
                    <div class="p-7">
                        <h1 class="text-6xl font-bold">657K+</h1>
                        <h3 class="text-2xl">YouTube Subscriber</h3>
                    </div>
                    <div class="flex justify-between">
                        <a target="_blank" rel="noopener noreferrer" href="https://www.youtube.com/@BelajarEraDigital"
                            class="ml-4 mt-44 h-10 rounded-lg border border-2 border-black px-2 pt-1 text-lg font-semibold hover:scale-110"><i
                                class="ri-external-link-fill"></i></a>
                        <img src="/img/Youtube_ilustration.png" class="mt-1" alt="">
                    </div>
                </div>
            </div>
            <div class="w-full rounded-2xl border border-2 border-black">
                <div class="flex flex-col gap-y-7">
                    <div class="p-7">
                        <h1 class="text-6xl font-bold">1.8Jt+</h1>
                        <h3 class="text-2xl">Page Views Web Perbulan</h3>
                    </div>
                    <div class="flex justify-between">
                        <a target="_blank" rel="noopener noreferrer" href="https://belajareradigital.com/"
                            class="ml-4 mt-44 h-10 rounded-lg border border-2 border-black px-2 pt-1 text-lg font-semibold hover:scale-110"><i
                                class="ri-external-link-fill"></i></a>
                        <img src="/img/views-web_ilustration.png" class="mt-3.5" alt="">
                    </div>
                </div>
            </div>
            <div class="w-full rounded-2xl border border-2 border-black">
                <div class="flex flex-col gap-y-7">
                    <div class="p-7">
                        <h1 class="text-6xl font-bold">80+</h1>
                        <h3 class="text-2xl">Event Diklat Sejak 2020</h3>
                    </div>
                    <div class="flex justify-between">
                        <a target="_blank" rel="noopener noreferrer" href="/event"
                            class="ml-4 mt-44 h-10 rounded-lg border border-2 border-black px-2 pt-1 text-lg font-semibold hover:scale-110"><i
                                class="ri-external-link-fill"></i></a>
                        <img src="/img/diklat_ilustration.png" class="mt-7" class="" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col gap-4">
            <h2 class="text-2xl font-bold md:text-4xl">Siapa Kami?</h2>
            <p class="text-lg text-[#64748B] md:text-2xl">Selamat datang di Belajar Era Digital, sebuah pionir di dunia
                pengembangan Diklat (Pendidikan dan Pelatihan) yang berdedikasi untuk memberikan solusi pendidikan
                berkualitas tinggi. Sejak didirikan, kami telah mengukir jejak sebagai pemimpin industri yang menghadirkan
                program Diklat inovatif dan relevan, membantu individu dan organisasi mencapai potensi penuh mereka.
                <br> Bergabunglah dengan kami untuk pengalaman Diklat yang tidak hanya membangun pengetahuan, tetapi juga
                merangsang pertumbuhan profesional dan pribadi. Kami berkomitmen untuk membantu Anda mencapai tingkat
                keunggulan tertinggi dalam karir Anda.
            </p>
        </div>
        <img class="w-full" src="/img/Foto-profile.png" alt="">
        <div class="flex flex-col gap-5">
            <h2 class="text-2xl font-bold md:text-4xl">Team Kami</h2>
            <div class="grid grid-cols-1 gap-10 md:grid-cols-2 lg:grid-cols-3">
                <div class="flex flex-col gap-5">
                    <div class="h-full w-full rounded-xl border bg-[#F1F1F1]">
                        <img src="/img/Team/Pak_Heri.png" class="h-full px-7 pt-4" alt="">
                    </div>
                    <div class="flex flex-col gap-2">
                        <div class="flex flex-col">
                            <h2 class="text-xl font-bold">Heri Tri Luqman</h2>
                            <p class="text-base text-[#485460]">Founder Belajar Era Digital</p>
                        </div>

                    </div>
                </div>
                <div class="flex flex-col gap-5">
                    <div class="h-full w-full rounded-xl border bg-[#F1F1F1]">
                        <img src="/img/Team/lawu.png" class="h-full px-7 pt-4" alt="">
                    </div>
                    <div class="flex flex-col gap-2">
                        <div class="flex flex-col">
                            <h2 class="text-xl font-bold">Lawu Arunawang</h2>
                            <p class="text-base text-[#485460]">Direktur Belajar Era Digital</p>
                        </div>

                    </div>
                </div>
                <div class="flex flex-col gap-5">
                    <div class="h-full w-full rounded-xl border bg-[#F1F1F1]">
                        <img src="/img/Team/pak_Hendra.png" class="h-full px-7 pt-4" alt="">
                    </div>
                    <div class="flex flex-col gap-2">
                        <div class="flex flex-col">
                            <h2 class="text-xl font-bold">Hendra Dwi Permana</h2>
                            <p class="text-base text-[#485460]">Founder Belajar Era Digital</p>
                        </div>

                    </div>
                </div>
                <div class="flex flex-col gap-5">
                    <div class="h-full w-full rounded-xl border bg-[#F1F1F1]">
                        <img src="/img/Team/reni.png" class="h-full px-7 pt-4" alt="">
                    </div>
                    <div class="flex flex-col gap-2">
                        <div class="flex flex-col">
                            <h2 class="text-xl font-bold">Reni Muzaenab</h2>
                            <p class="text-base text-[#485460]">Manajer Tim Event</p>
                        </div>

                    </div>
                </div>
                <div class="flex flex-col gap-5">
                    <div class="h-full w-full rounded-xl border bg-[#F1F1F1]">
                        <img src="/img/Team/Dhea.png" class="h-full px-7 pt-4" alt="">
                    </div>
                    <div class="flex flex-col gap-2">
                        <div class="flex flex-col">
                            <h2 class="text-xl font-bold">Dhea</h2>
                            <p class="text-base text-[#485460]">Manajer Tim Event</p>
                        </div>

                    </div>
                </div>
                <div class="flex flex-col gap-5">
                    <div class="h-full w-full rounded-xl border bg-[#F1F1F1]">
                        <img src="/img/Team/yudha.png" class="h-full px-7 pt-4" alt="">
                    </div>
                    <div class="flex flex-col gap-2">
                        <div class="flex flex-col">
                            <h2 class="text-xl font-bold">Yudha</h2>
                            <p class="text-base text-[#485460]">Manajer Website</p>
                        </div>

                    </div>
                </div>
                <div class="flex flex-col gap-5">
                    <div class="h-full w-full rounded-xl border bg-[#F1F1F1]">
                        <img src="/img/Team/sobirin.png" class="h-full px-7 pt-4" alt="">
                    </div>
                    <div class="flex flex-col gap-2">
                        <div class="flex flex-col">
                            <h2 class="text-xl font-bold">Sobirin</h2>
                            <p class="text-base text-[#485460]">Manajer Social Media</p>
                        </div>

                    </div>
                </div>
                <div class="flex flex-col gap-5">
                    <div class="h-full w-full rounded-xl border bg-[#F1F1F1]">
                        <img src="/img/Team/nata.png" class="h-full px-7 pt-4" alt="">
                    </div>
                    <div class="flex flex-col gap-2">
                        <div class="flex flex-col">
                            <h2 class="text-xl font-bold">Natalia Widha Saputri</h2>
                            <p class="text-base text-[#485460]">Tim Event</p>
                        </div>

                    </div>
                </div>
                <div class="flex flex-col gap-5">
                    <div class="h-full w-full rounded-xl border bg-[#F1F1F1]">
                        <img src="/img/Team/yuli_dewi.png" class="h-full px-7 pt-4" alt="">
                    </div>
                    <div class="flex flex-col gap-2">
                        <div class="flex flex-col">
                            <h2 class="text-xl font-bold">Yuli Dewi Safitri</h2>
                            <p class="text-base text-[#485460]">Tim Event</p>
                        </div>

                    </div>
                </div>
                <div class="flex flex-col gap-5">
                    <div class="h-full w-full rounded-xl border bg-[#F1F1F1]">
                        <img src="/img/Team/ayu_nabila.png" class="h-full px-7 pt-4" alt="">
                    </div>
                    <div class="flex flex-col gap-2">
                        <div class="flex flex-col">
                            <h2 class="text-xl font-bold">Ayu Nabila</h2>
                            <p class="text-base text-[#485460]">Tim Event</p>
                        </div>

                    </div>
                </div>
                <div class="flex flex-col gap-5">
                    <div class="h-full w-full rounded-xl border bg-[#F1F1F1]">
                        <img src="/img/Team/Agustina.png" class="h-full px-7 pt-4" alt="">
                    </div>
                    <div class="flex flex-col gap-2">
                        <div class="flex flex-col">
                            <h2 class="text-xl font-bold">Agustina</h2>
                            <p class="text-base text-[#485460]">Tim Event</p>
                        </div>

                    </div>
                </div>
                <div class="flex flex-col gap-5">
                    <div class="h-full w-full rounded-xl border bg-[#F1F1F1]">
                        <img src="/img/Team/rafi2.png" class="h-full px-7 pt-4" alt="">
                    </div>
                    <div class="flex flex-col gap-2">
                        <div class="flex flex-col">
                            <h2 class="text-xl font-bold">Rafi Irfan</h2>
                            <p class="text-base text-[#485460]">Tim YouTube</p>
                        </div>

                    </div>
                </div>
                <div class="flex flex-col gap-5">
                    <div class="h-full w-full rounded-xl border bg-[#F1F1F1]">
                        <img src="/img/Team/Danar.png" class="h-full px-7 pt-4" alt="Belum ada foto">
                    </div>
                    <div class="flex flex-col gap-2">
                        <div class="flex flex-col">
                            <h2 class="text-xl font-bold">Danar Septiyanto</h2>
                            <p class="text-base text-[#485460]">Front-end Web Developer</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('home.home-layouts.tw-home-pencapaian')
    @include('home.home-layouts.tw-home-footer')
@endsection
