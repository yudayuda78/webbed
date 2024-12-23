{{-- @dd($modulAjar) --}}
@extends('home.home-layouts.home-main-tw')
@section('container')
    <x-ticykit.navbar />
    <div class="p-5 bg-white"></div>
    <div class="py-10 bg-ticykit-bg">
        <div class="md:px-12 px-0 mx-auto max-w-[90%] md:max-w-main flex flex-col gap-10">
            <div class="flex flex-col items-center gap-1 text-center">
                <h2 class="text-3xl text-black">Membuat Modul <span class="font-bold">Saya</span></h2>
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
                <h1 class="w-full mt-10 text-3xl font-semibold text-center">Kamu Tidak Memiliki Modul Ajar</h1>
            @endif
            <div class="grid grid-cols-1 md:grid-cols-3 gap-7">
                @foreach ($modulAjar as $modul)
                    {{-- @dd($modul) --}}
                    <div>
                        <div class="bg-ticykit-bg p-5 md:p-7 border-2 border-[#DCE0E4] rounded-2xl rounded-b-none">
                            <h2 class="mb-3 text-xl font-bold text-black md:text-2xl">{{ strip_tags($modul->namaModul) }}</h2>
                            <p class="text-sm md:text-base text-ticykit-secondary">{{ strip_tags($modul->pendahuluan) }}</p>
                        </div>
                        <div class=" p-5 md:p-7 border-2 border-t-0 border-[#DCE0E4] flex flex-col gap-7 rounded-2xl rounded-t-none">
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
                            <div class="flex justify-between">
                                <div class="flex justify-between gap-1 md:gap-4">
                                    <a href="{{route('show.mymodulajar',$modul->slug)}}" class="px-2.5 py-1 text-center items-center text-sm md:text-base hover:bg-[#DCE0E4] hover:border-ticykit-secondary font-medium border-2 border-[#DCE0E4] text-black rounded-lg bg-ticykit-bg">Lihat</a>
                                    <a href="{{ route('editmymodulajar', $modul->id ) }}" class="px-2.5 py-1 text-center items-center text-sm md:text-base hover:bg-[#DCE0E4] hover:border-ticykit-secondary font-medium border-2 border-[#DCE0E4] text-black rounded-lg bg-ticykit-bg">Edit</a>
                                    <a href="{{ route('modulajar.download', $modul->id) }}" class="px-2.5 py-1 text-center items-center text-sm md:text-base hover:bg-[#DCE0E4] hover:border-ticykit-secondary font-medium border-2 border-[#DCE0E4] text-black rounded-lg bg-ticykit-bg">PDF</a>
                                </div>
                                <a href="" class="bg-[#FE5353] px-2.5 py-1 text-base font-medium text-white rounded-lg border-2 border-[#FE5353] hover:bg-[#FE8585]"><i class="ri-delete-bin-2-line"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @include('home.home-layouts.tw-home-footer')
@endsection
{{-- @foreach ($modulAjar as $modul)
    <a href="/administrasiguru/mymodulajar/{{$modul->slug}}"><h1>{{ $modul->namaModul}}</h1></a>
    <a href="/administrasiguru/mymodulajar/{{$modul->slug}}"><button>Lihat Modul Ajar</button></a>
    <a href="{{ route('editmymodulajar', ['id' => $modul->id]) }}"><button>Edit Modul Ajar</button></a>
    <a href="{{ route('hapusdatamymodulajar', ['id' => $modul->id]) }}"><button>Hapus Modul Ajar</button></a>
    <a href=""><button>Download PDF</button></a>
@endforeach --}}
