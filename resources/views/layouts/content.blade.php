<div class="hero-image-koleksi">
    <div class="headlines-wrapper-koleksi">
        <p class="koleksi-h1">
            Download Semua <b>Resource</b> yang Anda butuhkan, <b>Gratis!</b>
        </p>
        <p class="koleksi-p">
            Cari berdasarkan jenjang atau mata pelajaran yang anda butuhkan.
        </p>
    </div>
    <div class="search-bar">
        <form action="{{ route('content.search') }}" method="GET">
            <input type="search" name="search" placeholder="Cari bahan ajar disini">
            <button><i class="fa fa-search" style="font-size: 16px"></i> Search</button>
        </form>
    </div>
</div>
</div>
<div class="info-diskon-wrapper" data-aos="fade-up">
    <div class="info-diskon">
        <h4>🤩 Buruan Download Mumpung <b>Semua Masih Free!</b> 🤩 </h4>
    </div>
</div>
<div class="container">
    {{-- <div class="">
        <form action="{{ route('content.filter') }}" method="get">
            <select name="category" class="btn btn-secondary">
                <option value="">All Categories</option>
                <option value="game" {{ request('category') == 'game' ? 'selected' : '' }}>Game</option>
                <option value="modul ajar" {{ request('category') == 'modul ajar' ? 'selected' : '' }}>Modul Ajar
                </option>
                <option value="worksheet" {{ request('category') == 'worksheet' ? 'selected' : '' }}>LKPD / Worksheet
                </option>
                <option value="bahan ajar" {{ request('category') == 'bahan ajar' ? 'selected' : '' }}>Bahan Ajar
                </option>
            </select>
            
        </form>

        <form action="{{ route('content.filter') }}" method="get">
            <select name="kelas" class="btn btn-secondary">
                <option value="">Semua Kelas</option>
                <option value="tk">TK/PAUD</option>
                <option value="sd kelas 1">SD Kelas 1</option>
                <option value="sd kelas 2">SD Kelas 2</option>
                <option value="sd kelas 3">SD Kelas 3</option>
                <option value="sd kelas 4">SD Kelas 4</option>
                <option value="sd kelas 5">SD Kelas 5</option>
                <option value="sd kelas 6">SD Kelas 6</option>
                <option value="smp kelas 1">SMP Kelas 1</option>
                <option value="smp kelas 2">SMP Kelas 2</option>
                <option value="smp kelas 3">SMP Kelas 3</option>
                <option value="sma kelas 1">SMA Kelas 1</option>
                <option value="sma kelas 2">SMA Kelas 2</option>
                <option value="sma kelas 3">SMA Kelas 3</option>
            </select>
           
        </form>
    </div> --}}

    {{-- <div class="content-grid">

        <div class="card-content-grid-wrapper">
            <div class="card-content-grid">
                @foreach ($isiContent as $isi)
                    <div class="card-content-item" style="">
                        <a href="/ticykit/koleksi/{{ $isi->slug }}">
                            <img src="{{ asset('img/'. $isi->image) }}" class="card-img-top" alt="...">
                            <div class="card-body" style="padding-top: 10px">
                                <p class="card-text">{{ $isi->title }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

<br>
        <div class="d-flex justify-content-center">
            {{ $isiContent->links() }}
        </div>
        <br>

    </div> --}}
</div>
<div class="koleksi-grid mb-3 mt-5">
    @foreach ($isiContent as $isi)
        <div class="koleksi-grid-card mb-2">
            <a href="/ticykit/koleksi/{{ $isi->slug }}">
                <div class="koleksi-grid-card-img">
                    <img src="{{ asset('img/' . $isi->image) }}" class="img-fluid" alt="...">

                </div>
            </a>
            <div class="koleksi-grid-card-text">
                <a href="/ticykit/koleksi/{{ $isi->slug }}">
                    <h1>{{ $isi->title }}</h1>
                </a>
                <h2>Worksheet</h2>
            </div>
        </div>
    @endforeach
</div>
<div class="d-flex justify-content-center mb-4">
    {{ $isiContent->links() }}
</div>
