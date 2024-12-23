@extends('home.home-layouts.home-main-tw')
@section('container')
    <div class="bg-gray-50">
        <div class="flex h-svh p-5 md:p-10">
            <div class="flex w-full flex-col items-start justify-center">
                <div class="mx-auto w-full rounded-lg bg-white px-7 py-8 shadow-md md:w-[400px]">
                    <a href="/" class="mb-6 flex items-center text-xl font-bold text-gray-900 dark:text-white">
                        <img class="mr-2 h-8 w-8" src="/img/ui/bedlogologin.png">
                        AdminBED
                    </a>
                    <form action="{{ route('adminlogin') }}" method="POST">
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
                        <label class="mb-2 mt-3 block text-sm font-semibold">Username</label>
                        <input
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                            type="text" name="username" id="username" placeholder="Masukan Username"
                            class="form-control @error('username') is-invalid @enderror" required
                            value={{ old('username') }}>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <label class="mb-2 mt-3 block text-sm font-semibold">Password</label>
                        <input
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                            type="password" name="password" id="password" class="form-control"
                            placeholder="Ketikan Password" required>
                        <div class="mt-3 flex items-start">
                            <div class="flex h-5 items-center">
                                <input type="checkbox" id="show-password" onclick="togglePassword()"
                                    class="focus:ring-3 h-4 w-4 rounded border border-gray-300 bg-gray-50 focus:ring-blue-300" />
                            </div>
                            <label for="show-password" class="ms-1 text-sm font-medium text-gray-600">Lihat Password</label>
                        </div>
                        <button type="submit" name="login"
                            class="me-2 mt-3 w-full rounded-lg bg-blue-600 px-4 py-2.5 text-base font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300"
                            value="LOGIN">Login</button>
                    </form>
                </div>
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
@endsection
{{-- <form action="/login" method="POST">
    @csrf
    @if (session()->has('success'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">First name</label>
    <input type="email" id="email" placeholder="Email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required value={{ old('email') }}>
    @error('email')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">First name</label>
    <input type="password" name="password" id="password" placeholder="Password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
    <button type="submit" name="login" class="mb-2 me-2 rounded-xl bg-[#196ECD] px-4 py-3 text-base font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300" value="LOGIN">Submit</button>
</form> --}}
