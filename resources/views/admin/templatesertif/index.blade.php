@extends('home.home-layouts.home-main-tw')
@section('container')
@include('admin.components.navbar')
@include('admin.components.sidebar')
  <div class="mt-14 p-4 sm:ml-64 bg-slate-100 min-h-svh">
    <div class="max-w-screen-xl mx-auto">
        <div class="max-w-screen-xl mx-auto">
            <div class="mb-5 max-w-screen-xl bg-blue-600 px-5 py-8 rounded-lg">
              <h1 class="mb-1 text-4xl font-extrabold tracking-tight text-white md:text-2xl lg:text-3xl dark:text-white">Upload template Sertifikat</h1>
              <p class="text-lg font-normal text-gray-50 lg:text-lg dark:text-gray-400">Upload template sertifikat dengan format jpg dan penamaan file diawali kata sertifikat diikuti tanggal, bulan dan tahun, contoh sertifikat12-16jun2024, sertifikat12jun2024, sertifikat13-16mar2024</p>
          </div>

          @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>Error, gambar jangan lebih dari 1MB</li>
                  @endforeach
              </ul>
          </div>
      @endif
      <form class="row g-3 mt-1" action="{{ route('uploadtemplatesertif') }}" method="POST" enctype="multipart/form-data">
            @csrf

           
            
            <div>
                <label for="image1" class="mb-2 mt-3 block font-semibold text-[#64748B]">Upload template sertifikat</label>
                <Input
                    class="form-control block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 file:me-4 file:border-0 file:bg-[##64748B] file:px-3 file:py-2.5 focus:outline-none disabled:pointer-events-none disabled:opacity-50 dark:text-gray-400"
                    type="file" id="image1" name="image1">
            </div>
            <div>
                <button type="submit"
                    class="mb-2 me-1 mt-5 rounded-lg bg-blue-600  px-4 py-2.5 text-base font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">Upload template</button>
                    <a href="{{ route('listnomorsurat') }}" class="mb-2 me-1 mt-5 rounded-lg bg-red-600 px-4 py-2.5 text-base font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300">Batal</a>
            </div>
        </form>

        @if(session('success'))
            <div class="alert alert-success">
               Template berhasil diupload
            </div>
        @endif
    </div>

    <div>
        @foreach ($templateSertif as $template)
            <img src="/templateSertif/{{ $template->nama }}" alt="">
            
        @endforeach
    </div>
  </div>

@endsection
{{-- <div>
    <form class="row g-3 mt-1" action="{{ route('tambahdatasertifikat') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <input type="hidden" name="header" value="1">
            <label for="judul" class="mb-2 mt-3 block font-semibold text-[#64748B]">Nama Kegiatan</label>
            <input type="text"
                class="form-control block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                id="judul" name="judul" placeholder="Nama Kegiatan" required>
        </div>
        <div>
            <label for="slug" class="mb-2 mt-3 block font-semibold text-[#64748B]">Slug</label>
            <input type="text"
                class="form-control block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                id="slug" name="slug" placeholder="sertifikat13-16mar2024" required>
        </div>
        <div>
            <button type="submit"
                class="mb-2 me-2 mt-5 rounded-lg bg-[#196ECD] px-4 py-2.5 text-base font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">Buat Halaman Sertifikat</button>
        </div>
    </form>
</div> --}}
