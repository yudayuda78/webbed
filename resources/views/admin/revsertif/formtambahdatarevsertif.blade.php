@extends('home.home-layouts.home-main-tw')
@section('container')
    <div class="md:pb-13 bg-[url(/img/ui/bg-sertif.png)] pb-8">
        @include('home.home-layouts.tw-home-navbar')
        <div class="mx-auto max-w-[90%] pt-10 md:max-w-main md:pt-5">
            <p class="md:text-lg text-base text-[#64748B]">Revisi Sertifikat</p>
            <p class="md:text-xl text-lg font-bold">{{ $revsertif->judul }}</p>

            
        </div>
    </div>
    <div class="bg-[#1B7BE7] py-8">
        <div class="mx-auto flex max-w-[90%] flex-col justify-between gap-4 md:max-w-main md:flex-row md:items-center">
            <img class="rounded-lg" src="">
        </div>
    </div>
    <div class="mx-auto max-w-[90%] md:max-w-main mt-6 mb-10 flex justify-between flex-col md:flex-row gap-7">
        <div class="md:w-[789px] w-full">
            <div class="bg-[#EBF5FF] p-7 rounded-lg">
                <h3 class="font-bold text-xl mb-2">Revisi Sertifikat ✨</h3>
                <p class="text-[#64748B]">Isikan identitas diri anda untuk Revisi Sertifikat</p>
                
                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9697129609724227"
                     crossorigin="anonymous"></script>
                <ins class="adsbygoogle"
                     style="display:block; text-align:center;"
                     data-ad-layout="in-article"
                     data-ad-format="fluid"
                     data-ad-client="ca-pub-9697129609724227"
                     data-ad-slot="1581340639"></ins>
                <script>
                     (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
            <div>
                <form class="row g-3 mt-1" action="{{ route('revsertif.tambahdata') }}" method="POST" enctype="multipart/form-data">
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
                        <input type="hidden" name="judul" value="{{ $revsertif->judul }}">
                        <input type="hidden" name="slug" value="{{ $revsertif->slug }}">
                        <input type="hidden" name="kegiatan" value="{{ $revsertif->kegiatan }}">
                        <input type="hidden" name="fasilitas" value="{{ $revsertif->fasilitas }}">
                        <input type="hidden" name="jenis" value="{{ $revsertif->jenis }}">
                        

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
                        <label for="instansi" class="mb-2 mt-3 block font-semibold text-[#64748B]">Instansi</label>
                        <input type="text" class="form-control block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" id="instansi" name="instansi"
                            placeholder="Contoh: SD N 01 Sambirejo" required>
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
