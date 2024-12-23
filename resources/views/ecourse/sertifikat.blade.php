@extends('home.home-layouts.home-main-tw')
@section('container')
    <div class="bg-[#196ECD] pb-8 md:pb-10">
        @include('home.home-layouts.tw-home-navbar-ecourse')
    </div>
    <div class="bg-[#085FBF]">
        <h1 class="mx-auto max-w-[90%] py-4 font-inter font-bold text-white md:max-w-main">Download Sertifikat Ecourse
        </h1>
    </div>
    <div class="mx-auto mb-7 mt-9 max-w-[90%] justify-between md:max-w-main">
        <div class="w-full rounded-lg bg-[#EBF5FF] p-5 md:p-10 flex gap-5 md:gap-14 items-center flex-col md:flex-row">
            <img class="w-[250px] md:ms-8" src="/img/ui/ecoursetillus.png">
            <div class="pb-0 md:pb-6">
                <div class="mb-3">
                    <h3 class="mb-2 text-xl md:text-2xl font-bold">Terima Kasih</h3>
                    <div class="text-[#64748B] text-base md:text-lg max-w-[600px]" id="countdown"></div>
                    <a href="{{ route('downloadsertifikatecourse') }}" id="downloadLink" style="display: none;" class="text-[#64748B] text-base md:text-lg max-w-[600px]">Sertifikat anda sudah berhasil terunduh, 
                        apabila terjadi kesalahan silahkan unduh kembali: <span class="font-bold text-[#196ECD]">Unduh Sertifikat</span></a>
                </div>
                <div class="hidden md:flex gap-2 md:flex-row flex-col">
                    <a class="py-2 px-3 rounded-full text-white text-sm bg-[#196ECD]" href="/ecourse">Ecourse Lainnya</a>
                    <a class="py-2 px-3 rounded-full text-black text-sm bg-slate-300" href="/event">Event Diklat</a>
                    <a class="py-2 px-3 rounded-full text-black text-sm bg-slate-300" href="/ticykit">Bahan Ajar</a>
                    <a class="py-2 px-3 rounded-full text-black text-sm bg-slate-300" target="_blank" href="https://bacakembali.com">Artikel Pendidikan</a>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-4">
        <p class="mb-1 font-inter text-xl font-bold max-w-[90%] mx-auto md:max-w-main">Ecourse Lainnya</p>
    </div>
    <div class="grid grid-cols-1 gap-5 md:grid-cols-3 max-w-[90%] mx-auto md:max-w-main mb-10">
        @foreach ($EcourseLainnya as $ecours)
                <div class="">
                    <a href="/ecourse/{{ $ecours->slug }}"><img class="rounded-xl border"
                            src="{{ asset('imgecourse/' . $ecours->img . '.webp') }}" alt=""></a>
                    <div class="mt-2 flex gap-1">
                        <a href="/ecourse/{{ $ecours->slug }}">
                            <p class="font-inter font-medium">{{ $ecours->judul }}</p>
                        </a>
                        <p class="font-inter font-bold">{{ $ecours->bayar == 1 ? 'Premium' : 'Free' }}</p>
                    </div>
                    <p class="mt-2 font-inter text-sm text-slate-500">Oleh <b>Belajar Era Digital</b></p>
                </div>
            @endforeach
    </div>
    @include('home.home-layouts.tw-home-footer')

    <script>
        // Set the countdown duration in seconds
        var countdownDuration = 4;
    
        // Function to start the countdown
        function startCountdown() {
          var countdownElement = document.getElementById('countdown');
          var downloadLink = document.getElementById('downloadLink');
    
          var count = countdownDuration;
          countdownElement.innerText = 'Download akan otomatis dimulai dalam ' + count + ' detik...';
    
          var countdownInterval = setInterval(function() {
            count--;
            countdownElement.innerText = 'Download akan otomatis dimulai dalam ' + count + ' detik...';
    
            if (count <= 0) {
              clearInterval(countdownInterval);
              countdownElement.style.display = 'none';
              downloadLink.style.display = 'inline';
              downloadLink.click(); // Simulate a click event on the download link
            }
          }, 1000);
        }
    
        // Call the startCountdown function when the page loads
        window.onload = startCountdown;
      </script>

@endsection

    {{-- <a
        href="{{ route('downloadsertifikatecourse') }}">Download Sertifikat Disini
    </a><br> --}}

   
