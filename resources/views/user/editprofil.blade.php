@extends('home.home-layouts.home-main-tw')
@section('container')
    <div class="md:pb-13 bg-[url(/img/ui/bg-sertif.png)] pb-8">
        @include('home.home-layouts.tw-home-navbar')
        <div class="mx-auto max-w-[90%] pt-5 md:max-w-main md:pt-5">
            <p class="md:text-lg text-base text-[#64748B]">Akun</p>
            <p class="md:text-xl text-lg font-bold">Edit Profil Akun</p>
        </div>
    </div>
    <div class="mx-auto max-w-[90%] md:max-w-main mt-6">
        <div class="text-sm font-medium text-center text-[#64748B] border-b border-gray-200">
            <ul class="flex flex-wrap -mb-px">
                <li class="me-2">
                    <a href="" class="inline-block p-4 text-[#196ECD] border-b-2 border-[#196ECD] rounded-t-lg active" aria-current="page">Edit Profil</a>
                </li>
                <li class="me-2">
                    <a href="/password/edit" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600">Reset Password</a>
                </li>
                <li class="me-2">
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
    <div class="mx-auto max-w-[90%] md:max-w-main mt-8 mb-10 flex justify-between flex-col md:flex-row gap-7">
        <div class="md:w-[789px] w-full">
            <div class="bg-[#EBF5FF] p-7 rounded-lg">
                <h3 class="font-bold text-xl mb-2">Edit Profil Akun</h3>
                <p class="text-[#64748B]">Ubah detail profil aku anda dengan memasuka inforrmasi sesuai dengan inforrmasi asli anda pada kolom dibawah ini!</p>
            </div>
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('put')
                <ul>
                    @if (session()->has('updateberhasil'))
                    <div id="alert-1" class="flex items-center p-4 mt-4 text-green-800 rounded-lg bg-green-50" role="alert">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <span class="sr-only">Info</span>
                        <div class="ms-3 text-sm font-medium">
                            {{ session('updateberhasil') }}
                        </div>
                          <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-100 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-1" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                        </button>
                    </div>
                    @endif
                    <li>
                        <label for="nama" class="mb-2 mt-6 block font-semibold text-[#64748B]">Email</label>
                        <input type="email" name="email" id="email" placeholder="name@example.com "
                            value="{{ old('email', Auth::user()->email) }}"
                            class="form-control block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" @error('email') is-invalid @enderror" required
                            value={{ old('email') }}>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </li>
                    <li>
                        <label for="nama" class="mb-2 mt-6 block font-semibold text-[#64748B]">Nama Lengkap</label>
                        <input type="text" name="namalengkap"
                            class="form-control block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" @error('namalengkap') is-invalid @enderror" id="namalengkap"
                            placeholder="nama lengkap" value="{{ old('namalengkap', Auth::user()->namalengkap) }}">
                        @error('namalengkap')
                            <div class="invalid-tooltip">
                                Please provide a valid city.
                            </div>
                        @enderror
                    </li>
                    <li>
                        <label for="nama" class="mb-2 mt-6 block font-semibold text-[#64748B]">Nomor Telepon</label>
                        <input type="text" name="nomortelepon"
                            class="form-control block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" @error('nomortelepon') is-invalid @enderror" id="nomortelepon"
                            placeholder="nomor telepon" value="{{ old('nomortelepon', Auth::user()->nomortelepon) }}">
                        @error('nomortelepon')
                            <div class="invalid-tooltip">
                                Please provide a valid city.
                            </div>
                        @enderror
                    </li>
                    <li>
                        <label for="nama" class="mb-2 mt-6 block font-semibold text-[#64748B]">Pekerjaan</label>
                        <input type="text" name="pekerjaan"
                            class="form-control block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" @error('pekerjaan') is-invalid @enderror" id="pekerjaan"
                            placeholder="pekerjaan" value="{{ old('pekerjaan', Auth::user()->pekerjaan) }}">
                        @error('pekerjaan')
                            <div class="invalid-tooltip">
                                Please provide a valid city.
                            </div>
                        @enderror
                    </li>
                    <li>
                        <button type="submit" name="login" class="mb-2 me-2 mt-6 rounded-lg bg-[#196ECD] px-4 py-2.5 text-base font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300" value="LOGIN">Simpan</button>
                    </li>
                </ul>
            </form>
        </div>
        <div class="max-w-[350px]">
            <a href="https://bacakembali.com" target="_blank"><img class="mb-5 border rounded-lg" src="/img/ui/ticykitbanner3.jpg"></a>
            <a href="/ticykit" target="_blank"><img class="mb-5 border rounded-lg" src="/img/ui/ticykitbanner2.jpg"></a>
        </div>
    </div>
    @include('home.home-layouts.tw-home-pencapaian')
    @include('home.home-layouts.tw-home-footer')
@endsection