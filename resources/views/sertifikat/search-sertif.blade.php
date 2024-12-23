@extends('layouts.main2')
@section('container')
    {{-- @include('layouts.navbar') --}}

    <div class="tablewrapper">
        <table id="myTable" class="mytable">
            <div class="search-bar">
                <form action="/sertifikat/16-19Oktober2023/search" method="GET">
                    <input type="search" name="search" placeholder="Cari nama anda disini" value="{{ $search }}">
                    <button><i class="fa fa-search" style="font-size: 16px"></i> Search</button>
                </form>
            </div>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Instansi</th>
                    <th>Fasilitas</th>
                    <th>Sertifikat</th>
                </tr>
            <tbody>
                @foreach ($datas as $data)
                    <tr>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->instansi }}</td>
                        <td><button><a href="#">Download</a></button></td>
                        <td><button><a href="{{ route('sertif.download', ['id' => $data->id]) }}">Download</a></button></td>
                    </tr>
                @endforeach
            </tbody>
            </thead>
        </table>
        <div class="pagination">
            {{ $datas->links() }}
        </div>
    </div>

    {{-- @include('tombolwa') --}}
    @include('layouts.footer')
@endsection

<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    var DataTable = require('datatables.net');
    require('datatables.net-responsive');

    let table = new DataTable('#myTable', {
        responsive: true
    });
    console.log(table);
</script>
