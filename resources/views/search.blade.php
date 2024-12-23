@extends('layouts.main2')
@section('container')
    @include('layouts.navbar')

    <div class="hero-image-koleksi">
        <div class="headlines-wrapper-koleksi">
            <p class="koleksi-h1">
                Download Semua <b>Resource</b> yang Anda butuhkan, <b>Gratis!</b>
            </p>
            <p class="koleksi-p">
                It is a long established fact that a reader distracted by the readable content of a page when looking at its
                layout.
            </p>
        </div>
        <div class="search-bar">
            <form action="/ticykit/koleksi/search'" method="GET">
                <input type="search" name="search" placeholder="Cari bahan ajar disini">
                <button><i class="fa fa-search" style="font-size: 16px"></i> Search</button>
            </form>
        </div>
    </div>
    </div>
    <div class="info-diskon-wrapper" data-aos="fade-up" data-aos-once="true">
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

        <div class="content-grid">

            <div class="card-content-grid-wrapper">
                <div class="card-content-grid">
                    @foreach ($isiContent as $isi)
                        <div class="card-content-item" style="">
                            <a href="/ticykit/koleksi/{{ $isi->slug }}">
                                <img src="{{ asset('img/' . $isi->image) }}" class="card-img-top" alt="...">
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

        </div>
    </div>

    @include('tombolwa')
    @include('layouts.footer')

    <script>
        // $(document).ready(function () {
        //     $('#filter-form, #kelas-form').on('change', function () {
        //         filterData();
        //     });

        //     function filterData() {
        //         var category = $('#filter-form select[name="category"]').val();
        //         var kelas = $('#kelas-form select[name="kelas"]').val();

        //         $.ajax({
        //             url: '{{ route('content.filter') }}',
        //             type: 'get',
        //             data: {
        //                 category: category,
        //                 kelas: kelas
        //             },
        //             success: function (data) {
        //                 // Update tampilan dengan data yang diterima dari server
        //                 // Anda dapat mengganti tampilan sesuai dengan data yang diterima
        //             }
        //         });
        //     }
        // });


        $(document).ready(function() {
            $("select[name='category']").val("{{ request('category') }}");
            $("select[name='kelas']").val("{{ request('kelas') }}");

            $("select[name='category']").change(function() {
                $(this).closest("form").submit();
            });

            $("select[name='kelas']").change(function() {
                $(this).closest("form").submit();
            });
        });
    </script>

    <script src="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js') }}"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>

    <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    </body>

    </html>
@endsection
