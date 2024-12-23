@extends('home.home-layouts.home-main-tw')
@section('container')
    <x-ticykit.navbar />
    <div class="mt-4 bg-ticykit-bg pb-7 pt-3 md:mt-8 md:pb-9 md:pt-8">
        <div class="mx-auto flex max-w-[90%] flex-col-reverse items-center justify-between gap-3 md:max-w-main md:flex-row">
            <div>
                <h3 class="mb-1.5 max-w-[515px] text-2xl leading-tight md:text-3xl">
                    Download Semua Resource yang Anda butuhkan, <b>Gratis!</b>
                </h3>
                <p class="max-w-[500px] leading-relaxed text-ticykit-secondary">Open-source neutral-style system symbols
                    elaborately crafted for designers and developers.</p>
                <div class="hidden md:block">
                    <x-ticykit.kelebihan />
                </div>
            </div>
            <img class="hidden md:block" src="/img/ui/hero-img-ticykit2.png">
            <img class="block md:hidden" src="/img/ui/hero-img-ticykit3.png">
        </div>
        <div class="mx-auto mt-3 max-w-[90%] md:mt-6 md:max-w-main">
            <x-ticykit.search />
        </div>
    </div>
    <div class="mx-auto grid max-w-[90%] grid-cols-1 justify-between gap-7 md:max-w-main md:grid-cols-3 pb-10">
        @foreach ($isiContent as $isi)
            <div class="w-full">
                <a href="/ticykit/worksheet/{{ $isi->slug }}">
                    <div
                        class="mb-4 flex w-full flex-col items-center rounded-xl border border-ticykit-bg-border bg-ticykit-bg p-2">
                        <img class="h-[260px]" src="{{ asset('img/' . $isi->image) }}">
                    </div>
                </a>
                <a href="/ticykit/worksheet/{{ $isi->slug }}" class="text-lg font-bold capitalize">{{ $isi->title }}</a>
                <p class="text-sm text-ticykit-secondary">Worksheet</p>
            </div>
        @endforeach
        <div class="overflow-scroll overflow-y-hidden">
            {{ $isiContent->links() }}
        </div>
    </div>
    @include('home.home-layouts.tw-home-footer')
@endsection
