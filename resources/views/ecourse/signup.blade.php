@extends('home.home-layouts.home-main-tw')
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
@section('container')
    <div class="bg-slate-100">
        @include('home.home-layouts.tw-home-navbar')
        @include('home.home-layouts.tw-home-navbar-sticky')
        <div class="mx-auto my-2 max-w-[700px] p-5">
            <img class="h-fit rounded-xl" src="{{ asset('imgecourse/' . $img . '.webp') }}" alt="Course Image">
            <div class="mx-auto my-6 rounded-xl bg-slate-200">
                <ul class="-mb-px flex justify-around text-center font-medium" id="default-tab"
                    data-tabs-toggle="#default-tab-content" role="tablist">
                    <li class="me-2" role="presentation">
                        <button class="inline-block rounded-t-lg p-4" id="profile-tab" data-tabs-target="#profile"
                            type="button" role="tab" aria-controls="profile" aria-selected="false"><i
                                class="ri-user-add-fill me-0.5"></i> Buat Akun</button>
                    </li>
                    </li>
                    <li class="me-2" role="presentation">
                        <button class="inline-block rounded-t-lg p-4 hover:border-gray-300 hover:text-gray-600"
                            id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab"
                            aria-controls="dashboard" aria-selected="false"><i class="ri-login-circle-fill me-0.5"></i>
                            Login</button>
                    </li>
                </ul>
            </div>
            <div id="default-tab-content">
                <div class="hidden rounded-xl bg-white px-6 py-5 md:px-9" id="profile" role="tabpanel"
                    aria-labelledby="profile-tab">
                    <h1 class="mb-2 mt-1 text-center text-xl font-bold">Buat Akun</h1>
                    <form action="{{ route('ecourse.signup') }}" method="POST" id="registerForm">
                        @csrf
                        <ul>
                            <div id="section1">
                                <!-- Langkah 1 -->
                                <!-- Form fields for username, password, email -->
                                <li>
                                    <label class="mb-2 mt-3 block text-sm font-semibold text-[#64748B]">Username</label>
                                    <input type="text" name="username"
                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                                        placeholder="Contoh: argadian">
                                    @error('username')
                                        <div class="invalid-tooltip">
                                            Masukan username yang benar
                                        </div>
                                    @enderror
                                </li>
                                <li>
                                    <label class="mb-2 mt-3 block text-sm font-semibold text-[#64748B]">Email</label>
                                    <input type="email" name="email"
                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                                        placeholder="Contoh: argadian@gmail.com">
                                    @error('email')
                                        <div class="invalid-tooltip">
                                            Masukan email yang benar
                                        </div>
                                    @enderror
                                </li>
                                <li>
                                    <label class="mb-2 mt-3 block text-sm font-semibold text-[#64748B]">Password</label>
                                    <input type="password" name="password"
                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                                        placeholder="Ketikan Password">
                                    @error('password')
                                        <div class="invalid-tooltip">
                                            Masukan password yang benar
                                        </div>
                                    @enderror
                                </li>
                            </div>
                            <div id="section2">
                                <!-- Langkah 2 -->
                                <!-- Form fields for full name, phone number, and job -->
                                <li>
                                    <label class="mb-2 mt-3 block text-sm font-semibold text-[#64748B]">Nama Lengkap</label>
                                    <input type="text" name="namalengkap"
                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                                        placeholder="Contoh: Arga Dian">
                                    @error('namalengkap')
                                        <div class="invalid-tooltip">
                                            Masukan nama yang benar
                                        </div>
                                    @enderror
                                </li>
                                <li>
                                    <label class="mb-2 mt-3 block text-sm font-semibold text-[#64748B]">Nomor
                                        WhatsApp</label>
                                    <input type="text" name="nomortelepon"
                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                                        placeholder="Contoh: 088321654876">
                                    @error('nomortelepon')
                                        <div class="invalid-tooltip">
                                            Masukan nomor WA yang benar
                                        </div>
                                    @enderror
                                </li>
                                <li>
                                    <label class="mb-2 mt-3 block text-sm font-semibold text-[#64748B]">Pekerjaan</label>
                                    <input type="text" name="pekerjaan"
                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                                        placeholder="Contoh: Guru Mata Pelajaran">
                                    @error('pekerjaan')
                                        <div class="invalid-tooltip">
                                            Please provide a valid city.
                                        </div>
                                    @enderror
                                </li>
                                <li>
                                    <label class="mb-2 mt-3 block text-sm font-semibold text-[#64748B]">Instansi</label>
                                    <input type="text" name="instansi"
                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                                        placeholder="Contoh: SMAN 5 Jakarta">
                                    @error('instansi')
                                        <div class="invalid-tooltip">
                                            Isikan data instansi dengan benar
                                        </div>
                                    @enderror
                                </li>
                            </div>
                            
                            <button type="submit"
                                class="btn btn-primary mb-2 mt-3 w-full rounded-lg bg-[#196ECD] px-4 py-2.5 text-base font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">
                                Daftar
                            </button>
                            
                        </ul>
                    </form>
                    <a href="{{ route('gmail.redirect') }}">
                        <button type="submit" name="login"
                            class="me-2 mt-8 inline-flex w-full items-center justify-center gap-2 rounded-lg border px-4 py-2.5 text-base font-medium hover:bg-slate-100 focus:outline-none focus:ring-4 focus:ring-blue-300"
                            value="LOGIN"><img class="h-[17px]"
                                src="https://upload.wikimedia.org/wikipedia/commons/c/c1/Google_%22G%22_logo.svg">
                            Login dengan Google</button>
                    </a>
                </div>
                <div class="hidden rounded-xl bg-white px-6 py-5 md:px-9" id="dashboard" role="tabpanel"
                    aria-labelledby="dashboard-tab">
                    <h1 class="mb-2 mt-1 text-center text-xl font-bold">Login</h1>
                    <form action="{{ route('ecourse.login') }}" method="POST" id="loginForm">
                        @csrf
                        @if (session()->has('success'))
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close">SS</button>
                            </div>
                        @endif
                        @if (session()->has('loginError'))
                            <div id="alert-2" class="mb-4 flex items-center rounded-lg bg-red-50 p-4 text-red-800"
                                role="alert">
                                <svg class="h-4 w-4 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                                <span class="sr-only">Info</span>
                                <div class="ms-3 text-sm font-medium">{{ session('loginError') }}
                                </div>
                                <button type="button"
                                    class="-mx-1.5 -my-1.5 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-red-50 p-1.5 text-red-800 hover:bg-red-200 focus:ring-2 focus:ring-red-400"
                                    data-dismiss-target="#alert-2" aria-label="Close">
                                    <span class="sr-only">Close</span>
                                    <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                </button>
                            </div>
                        @endif
                        <label class="mb-2 mt-3 block text-sm font-semibold text-[#64748B]">Email</label>
                        <input
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                            type="email" name="email" id="email" placeholder="Masukan Email"
                            class="form-control @error('email') is-invalid @enderror" required value={{ old('email') }}>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <label class="mb-2 mt-3 block text-sm font-semibold text-[#64748B]">Password</label>
                        <input
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                            type="password" name="password" id="password" class="form-control"
                            placeholder="Ketikan Password" required>
                        <div class="mt-3 flex items-start">
                            <div class="flex h-5 items-center">
                                <input type="checkbox" id="show-password" onclick="togglePassword()"
                                    class="focus:ring-3 h-4 w-4 rounded border border-gray-300 bg-gray-50 focus:ring-blue-300" />
                            </div>
                            <label for="show-password" class="mb-2 ms-1 text-sm font-medium text-gray-600">Lihat
                                Password</label>
                        </div>
                        
                        <button type="submit" name="login"
                            class="mb-2 me-2 mt-3 w-full rounded-lg bg-[#196ECD] px-4 py-2.5 text-base font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300"
                            value="LOGIN">Login</button>
                    </form>
                    <a href="{{ route('gmail.redirect') }}">
                        <button type="submit" name="login"
                            class="me-2 mt-6 inline-flex w-full items-center justify-center gap-2 rounded-lg border px-4 py-2.5 text-base font-medium hover:bg-slate-100 focus:outline-none focus:ring-4 focus:ring-blue-300"
                            value="LOGIN"><img class="h-[17px]"
                                src="https://upload.wikimedia.org/wikipedia/commons/c/c1/Google_%22G%22_logo.svg">
                            Login dengan Google</button>
                    </a>
                </div>
            </div>
        </div>
        <script>
            function togglePassword() {
                const passwordField = document.getElementById('password');
                const showPasswordCheckbox = document.getElementById('show-password');
                if (showPasswordCheckbox.checked) {
                    passwordField.type = 'text';
                } else {
                    passwordField.type = 'password';
                }
            }
        </script>
    </div>
@endsection
