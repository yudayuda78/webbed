@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row card-content">
            @foreach ($isiContent as $isi)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text"><a href="/konten/{{ $isi->slug }}">{{ $isi->title }}</a></p>
                            <p class="card-text">{{ $isi->category }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <nav aria-label="..." class="mx-auto" style="width: 200px;">
            <ul class="pagination">
                <li class="page-item disabled">
                    <a class="page-link">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active" aria-current="page">
                    <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
@endsection
