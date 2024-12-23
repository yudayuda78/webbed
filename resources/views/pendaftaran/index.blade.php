@foreach ($pendaftarandiklat as $daftar)
    <div>
        <a href="/pendaftaran/{{ $daftar->slug }}">{{ $daftar->judul }}</a>
    </div>
@endforeach
