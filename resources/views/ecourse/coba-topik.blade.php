@foreach ($topik as $topiks)
    <p>{{ $topiks->judul }}</p>
    @foreach (json_decode($topiks->ecoursevideo) as $ecoursevideo)
        <p>{{ $ecoursevideo->judul_video }}</p>
    @endforeach
@endforeach
