@extends('home.home-layouts.home-main-tw')
@section('container')
    <style>
        .form-section {
            display: none;
        }

        .form-section.current {
            display: block;
        }
    </style>
    <div class="flex h-svh p-5 md:p-10">
        <div class="hidden h-full w-[35%] flex-col items-start justify-center rounded-2xl bg-[#EAF1FE] p-14 md:flex">
            <a href="/"><img class="mb-7 rounded-2xl bg-white p-4" src="/img/ui/logologin.png"></a>
            <h1 class="mb-5 text-4xl font-bold">Selamat Datang Kembali!</h1>
            <img src="/img/ui/illus-login.png">
        </div>
        <div class="flex w-full flex-col items-start justify-center">
            <div class="mx-auto w-full md:w-96">
                <h1 class="mb-5 text-3xl font-bold">Sign Up 👋</h1>
                <form action="/register" method="POST" id="registerForm">
                    @csrf
                    <ul>
                        <div class="form-section current" id="section1">
                            <!-- Langkah 1 -->
                            <!-- Form fields for username and password -->
                            <li>
                                <label class="mb-2 mt-3 block font-semibold text-[#64748B]">Username</label>
                                <input type="text" name="username"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                                    class="form-control @error('username') is-invalid @enderror" id="username"
                                    placeholder="Contoh: argadian">
                                @error('username')
                                    <div class="invalid-tooltip">
                                        Masukan username yang benar
                                    </div>
                                @enderror
                            </li>
                            <li>
                                <label class="mb-2 mt-3 block font-semibold text-[#64748B]">Email</label>
                                <input type="email" name="email"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                                    class="form-control @error('email') is-invalid @enderror" id="email"
                                    placeholder="Contoh: argadian@gmail.com">
                                @error('email')
                                    <div class="invalid-tooltip">
                                        Masukan email yang benar
                                    </div>
                                @enderror
                            </li>
                            <li>
                                <label class="mb-2 mt-3 block font-semibold text-[#64748B]">Password</label>
                                <input type="password" name="password"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                                    class="form-control @error('password') is-invalid @enderror" id="password"
                                    placeholder="Ketikan Password">
                                @error('password')
                                    <div class="invalid-tooltip">
                                        Masukan password yang benar
                                    </div>
                                @enderror
                            </li>
                        </div>
                        <div class="form-section" id="section2">
                            <!-- Langkah 2 -->
                            <!-- Form fields for full name and phone number -->
                            <li>
                                <label class="mb-2 mt-3 block font-semibold text-[#64748B]">Nama Lengkap</label>
                                <input type="text" name="namalengkap"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                                    class="form-control @error('namalengkap') is-invalid @enderror" id="namalengkap"
                                    placeholder="Contoh: Arga Dian">
                                @error('namalengkap')
                                    <div class="invalid-tooltip">
                                        Masukan nama yang benar
                                    </div>
                                @enderror
                            </li>
                            <li>
                                <label class="mb-2 mt-3 block font-semibold text-[#64748B]">Nomor WhatsApp</label>
                                <input type="text" name="nomortelepon"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                                    class="form-control @error('nomortelepon') is-invalid @enderror" id="nomortelepon"
                                    placeholder="Contoh: 088321654876">
                                @error('nomortelepon')
                                    <div class="invalid-tooltip">
                                        Masukan nomor WA yang benar
                                    </div>
                                @enderror
                            </li>
                            <li>
                                <label class="mb-2 mt-3 block font-semibold text-[#64748B]">Pekerjaan</label>
                                <input type="text" name="pekerjaan"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                                    class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan"
                                    placeholder="Contoh: Guru Mata Pelajaran">
                                @error('pekerjaan')
                                    <div class="invalid-tooltip">
                                        Please provide a valid city.
                                    </div>
                                @enderror
                            </li>
                        </div>
                        <div class="form-navigation next-prev-con">
                            <li class="flex gap-2">
                                <button type="button"
                                    class="previous btn btn-primary next-prev mb-2 mt-5 hidden w-full rounded-lg bg-[#196ECD] px-4 py-2.5 text-base font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">Previous</button>
                                <button type="button"
                                    class="next btn btn-primary next-prev mb-2 mt-5 w-full rounded-lg bg-[#196ECD] px-4 py-2.5 text-base font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">Next</button>
                                <button type="submit"
                                    class="btn btn-primary mb-2 mt-5 w-full rounded-lg bg-[#196ECD] px-4 py-2.5 text-base font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300"
                                    id="submitButton" style="display: none;">Submit</button>
                            </li>
                            <p class="mt-1 text-[#64748B]">Sudah punya akun? <a class="font-bold text-[#196ECD]"
                                    href="/login">Langsung Login Aja!</a></p>
                        </div>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
    <script>
        const formSections = document.querySelectorAll('.form-section');
        const prevButton = document.querySelector('.previous');
        const nextButton = document.querySelector('.next');
        const submitButton = document.querySelector('#submitButton');

        let currentSectionIndex = 0;

        function showSection(index) {
            formSections.forEach((section, i) => {
                if (i === index) {
                    section.classList.add('current');
                } else {
                    section.classList.remove('current');
                }
            });

            if (index === 0) {
                prevButton.style.display = 'none';
                nextButton.style.display = 'inline';
            } else {
                prevButton.style.display = 'inline';
                nextButton.style.display = 'inline';
            }

            if (index === formSections.length - 1) {
                nextButton.style.display = 'none';
                submitButton.style.display = 'inline';
            } else {
                nextButton.style.display = 'inline';
                submitButton.style.display = 'none';
            }
        }

        prevButton.addEventListener('click', () => {
            if (currentSectionIndex > 0) {
                currentSectionIndex--;
                showSection(currentSectionIndex);
            }
        });

        nextButton.addEventListener('click', () => {
            currentSectionIndex++;
            showSection(currentSectionIndex);
        });

        // You can add validation and data submission logic here
    </script>
@endsection
