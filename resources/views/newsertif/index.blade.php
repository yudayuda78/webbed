@extends('home.home-layouts.home-main-tw')
@section('container')
    <h1 class="mt-4 px-6 text-2xl font-bold">Link Sertifikat</h1>
    <table>
        @foreach ($newsertif as $sertif)
            <tr
                class="border-b odd:bg-white even:bg-gray-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800">
                <th scope="row" class="float-start px-6 py-4 text-left font-medium text-blue-700 dark:text-white"><a
                        href="/newsertifikat/{{ $sertif->slug }}">{{ $sertif->judul }}</a></th>
            </tr>
        @endforeach
    </table>
@endsection
