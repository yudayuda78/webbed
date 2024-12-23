@extends('home.home-layouts.home-main-tw')

@section('container')
    @include('admin.components.navbar')
    @include('admin.components.sidebar')

    <div class="mt-14 min-h-svh bg-slate-100 p-4 sm:ml-64">
        <div class="mx-auto max-w-screen-xl">
            <div class="mb-5 max-w-screen-xl rounded-lg bg-blue-600 px-5 py-8">
                <h1 class="mb-1 text-4xl font-extrabold tracking-tight text-white dark:text-white md:text-2xl lg:text-3xl">
                    Chart Data {{ $dataevaluasi->judul }}</h1>
            </div>

            <div>
                <h2 class="text-xl font-bold">Estimasi Total Pengisi {{ $jumlahdataevaluasi }}/{{ $jumlahdatapendaftaran }}(
                    {{ $presentase }}% )</h2>
            </div>

            <div class="mb-5 max-w-screen-xl rounded-lg px-5 py-8">
                <canvas id="myChart" class="w-full"></canvas>
            </div>
            <div class="mb-5 max-w-screen-xl rounded-lg px-5 py-8">
                <h2 class="text-xl font-bold">3 Topik Terbanyak:</h2>
                <ul>
                    @foreach ($top3topik as $topik => $count)
                        <li>{{ $topik }}: {{ $count }}</li>
                    @endforeach
                </ul>
            </div>

            {{-- <div class="mb-5 max-w-screen-xl rounded-lg px-5 py-8">
                <canvas id="myChart2" class="w-full"></canvas>
            </div> --}}
            <div class="mb-5 max-w-screen-xl rounded-lg px-5 py-8">
                <h2 class="text-xl font-bold">Rata-rata nilai untuk panitia : {{ $meannilai }}</h2>
            </div>


            <div class="mb-5 max-w-screen-xl rounded-lg px-5 py-8">
                <h2 class="text-xl font-bold">Distribusi Bank</h2>
                <canvas id="bankChart" class="w-full"></canvas>
            </div>

            <div class="mb-5 max-w-screen-xl rounded-lg px-5 py-8">
                <h2 class="text-xl font-bold">Estimasi Jumlah Peserta yang donasi : {{ $jumlahdonasi }}/{{ $jumlahdatapendaftaran }}({{ $presentasenominal }}%)</h2>
                <h2 class="text-xl font-bold">Estimasi Jumlah Pendapatan : Rp {{ $totalnominal }} (NOTE:DATA TIDAK AKURAT JIKA ADA DATA TIDAK NORMAL)</h2>
                <h2 class="text-xl font-bold">Estimasi Rata-rata donasi : Rp {{ $rataratadonasi }} (NOTE:DATA TIDAK AKURAT JIKA ADA DATA TIDAK NORMAL)</h2>
            </div>


        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labels = @json($labels);
        const data = @json($data);
        const nilai = @json($nilai);
        const labelnilai = @json($labelnilai);
        const labelbank = @json($labelbank);
        const databank = @json($databank);

        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Topik Diminati',
                    data: data,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });


        const ctx3 = document.getElementById('bankChart').getContext('2d');
        const bankChart = new Chart(ctx3, {
            type: 'pie',
            data: {
                labels: labelbank,
                datasets: [{
                    label: 'Distribusi Bank',
                    data: databank,
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        enabled: true
                    }
                }
            }
        });

        // const ctx2 = document.getElementById('myChart2').getContext('2d');
        // const myChart2 = new Chart(ctx2, {
        //     type: 'radar',
        //     data: {
        //         labels: labelnilai,
        //         datasets: [{
        //             label: 'Nilai Panitia',
        //             data: Object.values(nilai),
        //             backgroundColor: 'rgba(255, 99, 132, 0.2)',
        //             borderColor: 'rgba(255, 99, 132, 1)',
        //             borderWidth: 1
        //         }]
        //     },
        //     options: {
        //         scales: {
        //             r: {
        //                 angleLines: {
        //                     display: true
        //                 },
        //                 suggestedMin: 0, 
        //                 suggestedMax: 10,
        //             }
        //         }
        //     }
        // });
    </script>
@endsection
