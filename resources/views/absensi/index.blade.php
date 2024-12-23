@extends('home.home-layouts.home-main-tw')
@section('container')
<h1 class="mt-4 px-6 text-2xl font-bold">Link Presensi</h1>
<table>
@foreach ($presensi as $presen)
  <tr class="odd:dark:bg-gray-900 even:dark:bg-gray-800 dark:border-gray-700 border-b odd:bg-white even:bg-gray-50">
    <th scope="row" class="dark:text-white float-start px-6 py-4 text-left font-medium text-blue-700"><a href="/presensi/{{ $presen->slug }}">{{ $presen->judul }})</a></th>
  </tr>
@endforeach
</table>
@endsection
