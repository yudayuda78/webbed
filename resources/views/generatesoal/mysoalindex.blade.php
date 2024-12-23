@foreach ($generateSoal as $soal)
    <a href="generatesoal/{{$soal->slug}}"><h1>{{ $soal->judul}}</h1></a>  
    <a href="generatesoal/{{$soal->slug}}"><button>Lihat Modul Ajar</button></a>
    <a href="{{ route('hapusdatamymodulajar', ['id' => $soal->id]) }}"><button>Hapus Modul Ajar</button></a>
    
@endforeach