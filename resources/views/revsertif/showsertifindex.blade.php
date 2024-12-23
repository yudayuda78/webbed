<h5>Hasil Sertifikat Revisi</h5>

@foreach ($revsertif as $revisi)
    <div>
        <a href="/revsertifikat/{{ $revisi->slug }}">{{ $revisi->judul }}</a>
    </div>
@endforeach
