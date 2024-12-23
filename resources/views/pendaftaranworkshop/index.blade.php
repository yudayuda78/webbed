@foreach ($pendaftaranworkshop as $daftar)
    <div>
        <a href="/pendaftaranworkshop/{{ $daftar->slug }}">{{ $daftar->judul }}</a>
    </div>
@endforeach
