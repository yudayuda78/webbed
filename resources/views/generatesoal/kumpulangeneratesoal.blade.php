@foreach ($generateSoal as $soal)
    <h1>{{ $soal->judul }}</h1>
    <h3>{{ $soal->description }}</h3>
    {{ $soal->slug }}
    <a href="/administrasiguru/generatesoal/{{$soal->slug}}"><button>Lihat Soal Quiz</button></a>
@endforeach