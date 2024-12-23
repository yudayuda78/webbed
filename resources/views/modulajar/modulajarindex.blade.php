@extends('home.home-layouts.home-main-tw')
@section('container')
    <x-ticykit.navbar />
    <div class="p-5 bg-white"></div>
    <div class="py-10 bg-ticykit-bg">
        <div class="md:px-12 px-0 mx-auto max-w-[90%] md:max-w-main flex flex-col gap-10">
            <div class="flex flex-col items-center gap-1 text-center">
                <h2 class="text-3xl text-black">Membuat Modul <span class="font-bold">Berbagi</span></h2>
                <p class="w-full text-sm md:max-w-xl max-w-64 md:text-base text-secondary">Open-source neutral-style system symbols elaborately crafted
                    for designers and developers.</p>
            </div>
            <form action="" method="GET" class="flex gap-3">
                <input type="text" class="w-full p-2 text-sm bg-white md:p-3 rounded-xl" placeholder="Cari media pembelajaran..." />
                <button class="w-full text-sm text-white md:text-base bg-ticykit-primary max-w-24 md:max-w-28 rounded-xl"><i class="mr-2 ri-search-2-line"></i>Search</button>
            </form>
        </div>
    </div>
    <div class="pt-10 pb-20 bg-white ">
        <div class="mx-auto max-w-[90%] md:max-w-main flex flex-col gap-10">
            @include('home.home-layouts.tw-navbar-modulajar')
            @if ($modulAjar->count() < 1)
                <h1 class="w-full mt-10 text-3xl font-semibold text-center">Belum Ada Modul Ajar Berbagi</h1>
            @endif
            <div class="grid grid-cols-1 md:grid-cols-3 gap-7">
                @foreach ($modulAjar as $modul)
                <div>
                    <div class="bg-ticykit-bg p-5 md:p-7 border-2 border-[#DCE0E4] rounded-2xl rounded-b-none">
                        <h2 class="mb-3 text-xl font-bold text-black md:text-2xl">{{ strip_tags($modul->namaModul) }}</h2>
                        <p class="text-sm md:text-base text-ticykit-secondary">{{ strip_tags($modul->pendahuluan) }}</p>
                    </div>
                    <div class="p-5 md:p-7 border-2 border-t-0 border-[#DCE0E4] flex flex-col gap-7 rounded-2xl rounded-t-none">
                        <div class="flex flex-col gap-1 text-sm md:text-base text-ticykit-secondary ">
                            <p>Kelas {{ $modul->kelas }}</p>
                            <p>Tahun Ajaran {{ $modul->tahun }}</p>
                            <p>Pertemuan {{ $modul->pertemuan }}</p>
                            <p>{{ $modul->alokasiWaktu }}</p>
                        </div>
                        <div class="flex items-center gap-2 ">
                            <i class="px-2 py-1 text-white rounded-full bg-ticykit-primary ri-user-heart-line "></i>
                            <h2 class="text-sm font-bold text-black md:text-base">{{ $modul->namaGuru }}</h2>
                        </div>
                        <div class="flex gap-4">
                            <a href="{{route('modulajar.show',$modul->slug)}}" class="px-2.5 py-1 text-center items-center text-sm md:text-base font-medium border-2 border-[#DCE0E4] hover:bg-[#DCE0E4] hover:border-ticykit-secondary text-black rounded-lg bg-ticykit-bg">Lihat</a>
                            <a href="{{ route('modulajar.tambahmymodulajar', $modul->id) }}" class="px-3 py-1 text-center items-center text-sm md:text-base font-medium hover:bg-[#FBB174] border-2 border-ticykit-primary text-white bg-ticykit-primary rounded-lg">Simpan</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @include('home.home-layouts.tw-home-footer')
@endsection

{{--
<a href="{{route('formmodulajar')}}"><button>Buat Modul ajar</button></a>
<a href="{{ route('mymodulajar') }}"><button>My Modul Ajar</button></a>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif


@foreach ($modulAjar as $modul)
    <a href="/administrasiguru/modulajar/{{$modul->slug}}"><h1>{{ $modul->namaModul}}</h1></a>
    <a href="/administrasiguru/modulajar/{{$modul->slug}}"><button>Lihat Modul Ajar</button></a>

    <a href="{{ route('modulajar.tambahmymodulajar', ['id' => $modul->id]) }}"><button>Tambahkan ke Mymodul Ajar</button></a>
    <a href="{{ route('modulajar.download', ['id' => $modul->id]) }}"><button>Download PDF</button></a>
@endforeach --}}
