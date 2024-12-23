@extends('home.home-layouts.home-main-tw')
@section('container')
    <div class="bg-ticykit-bg-blue ">
        <div>
            @include('home.home-layouts.tw-home-navbar-ecourse')
        </div>
        <div class="mx-auto max-w-[90%] md:max-w-main">
            <div class="flex flex-col justify-center py-12 text-center text-white ">
                <p class="text-[14px] md:text-[16px]">Di Publish Pada 20 Des 2023</p>
                <p class="text-3xl md:text-[40px] leading-tight">Kebijakan Privasi <br><span class="font-bold">Belajar Era Digital</span></p>
            </div>
        </div>
    </div>
    <div class="mx-auto max-w-[90%] md:max-w-main  py-10">
        <div class="flex flex-col-reverse md:gap-5 gap-y-10 md:flex-row">
            @include('home.home-layouts.tw-navbar-kebijakan')
            <div class="flex flex-col text-justify gap-y-5 ">
                <div>
                    <h2 class="pb-3 text-xl font-bold">Kebijakan Privasi</h2>
                    <p class="text-[#64748B]">Website Belajar Era Digital dimiliki oleh Belajar Era Digital, yang akan menjadi pengontrol atas data pribadi Anda. Kami telah mengadopsi Kebijakan Privasi ini untuk menjelaskan bagaimana kami memproses informasi yang dikumpulkan oleh Belajar Era Digital, yang juga menjelaskan alasan mengapa kami perlu mengumpulkan data pribadi tertentu tentang Anda. Oleh karena itu, Anda harus membaca Kebijakan Privasi ini sebelum menggunakan website Belajar Era Digital. Kami menjaga data pribadi Anda dan berjanji untuk menjamin kerahasiaan dan keamanannya.</p>
                </div>
                <div>
                    <h2 class="pb-3 text-xl font-bold">Informasi pribadi yang kami kumpulkan:</h2>
                    <p class="text-[#64748B]">Saat Anda mengunjungi Belajar Era Digital, kami secara otomatis mengumpulkan informasi tertentu mengenai perangkat Anda, termasuk informasi tentang browser web, alamat IP, zona waktu, dan sejumlah cookie yang terinstal di perangkat Anda. Selain itu, selama Anda menjelajahi Website, kami mengumpulkan informasi tentang setiap halaman web atau produk yang Anda lihat, website atau istilah pencarian apa yang mengarahkan Anda ke Website, dan cara Anda berinteraksi dengan Website. Kami menyebut informasi yang dikumpulkan secara otomatis ini sebagai "Informasi Perangkat". Kemudian, kami mungkin akan mengumpulkan data pribadi yang Anda berikan kepada kami (termasuk tetapi tidak terbatas pada, Nama, Nama belakang, Alamat, informasi pembayaran, dll.) selama pendaftaran untuk dapat memenuhi perjanjian.</p>
                </div>
                <div>
                    <h2 class="pb-3 text-xl font-bold">Mengapa kami memproses data Anda?</h2>
                    <p class=" pb-3 text-[#64748B]">Menjaga data pelanggan agar tetap aman adalah prioritas utama kami. Oleh karena itu, kami hanya dapat memproses sejumlah kecil data pengguna, sebanyak yang benar-benar diperlukan untuk menjalankan website. Informasi yang dikumpulkan secara otomatis hanya digunakan untuk mengidentifikasi kemungkinan kasus penyalahgunaan dan menyusun informasi statistik terkait penggunaan website. Informasi statistik ini tidak digabungkan sedemikian rupa hingga dapat mengidentifikasi pengguna tertentu dari sistem.</p>
                    <p class="text-[#64748B]">Anda dapat mengunjungi website tanpa memberi tahu kami identitas Anda atau mengungkapkan informasi apa pun, yang dapat digunakan oleh seseorang untuk mengidentifikasi Anda sebagai individu tertentu yang dapat dikenali. Namun, jika Anda ingin menggunakan beberapa fitur website, atau Anda ingin menerima newsletter kami atau memberikan detail lainnya dengan mengisi formulir, Anda dapat memberikan data pribadi kepada kami, seperti email, nama depan, nama belakang, kota tempat tinggal, organisasi, dan nomor telepon Anda. Anda dapat memilih untuk tidak memberikan data pribadi Anda kepada kami, tetapi Anda mungkin tidak dapat memanfaatkan beberapa fitur website. Contohnya, Anda tidak akan dapat menerima Newsletter kami atau menghubungi kami secara langsung dari website. Pengguna yang tidak yakin tentang informasi yang wajib diberikan dapat menghubungi kami melalui <a href="mailto:belajareradigital10@gmail.com" class="text-blue-500 underline hover:text-blue-900">belajareradigital10@gmail.com.</a></p>
                </div>
                <div>
                    <h2 class="pb-3 text-xl font-bold">Hak-hak Anda:</h2>
                    <p class="pb-3 text-[#64748B]">Jika Anda seorang warga Eropa, Anda memiliki hak-hak berikut terkait data pribadi Anda: Hak untuk mendapatkan penjelasan.</p>
                    <div class="text-[#64748B]">
                        <ul class="pb-3 list-disc pl-9">
                            <li>Hak atas akses.</li>
                            <li>Hak untuk memperbaiki.</li>
                            <li>Hak untuk menghapus.</li>
                            <li>Hak untuk membatasi pemrosesan.</li>
                            <li>Hak atas portabilitas data.</li>
                            <li>Hak untuk menolak.</li>
                            <li>Hak-hak terkait pengambilan keputusan dan pembuatan profil otomatis.</li>
                        </ul>
                    </div>
                    <p class="text-[#64748B]">Jika Anda ingin menggunakan hak ini, silakan hubungi kami melalui informasi kontak di bawah ini. Selain itu, jika Anda seorang warga Eropa, perlu diketahui bahwa kami akan memproses informasi Anda untuk memenuhi kontrak yang mungkin kami miliki dengan Anda (misalnya, jika Anda melakukan pemesanan melalui Website), atau untuk memenuhi kepentingan bisnis sah kami seperti yang tercantum di atas. Di samping itu, harap diperhatikan bahwa informasi Anda mungkin dapat dikirim ke luar Eropa, termasuk Kanada dan Amerika Serikat.</p>
                </div>
                <div>
                    <h2 class="pb-3 text-xl font-bold">Link ke website lain:</h2>
                    <p class="text-[#64748B]">Website kami mungkin berisi tautan ke website lain yang tidak dimiliki atau dikendalikan oleh kami. Perlu diketahui bahwa kami tidak bertanggung jawab atas praktik privasi website lain atau pihak ketiga. Kami menyarankan Anda untuk selalu waspada ketika meninggalkan website kami dan membaca pernyataan privasi setiap website yang mungkin mengumpulkan informasi pribadi.</p>
                </div>
                <div>
                    <h2 class="pb-3 text-xl font-bold">Keamanan informasi:</h2>
                    <p class="text-[#64748B]">Kami menjaga keamanan informasi yang Anda berikan pada server komputer dalam lingkungan yang terkendali, aman, dan terlindungi dari akses, penggunaan, atau pengungkapan yang tidak sah. Kami menjaga pengamanan administratif, teknis, dan fisik yang wajar untuk perlindungan terhadap akses, penggunaan, modifikasi, dan pengungkapan tidak sah atas data pribadi dalam kendali dan pengawasannya. Namun, kami tidak menjamin tidak akan ada transmisi data melalui Internet atau jaringan nirkabel.</p>
                </div>
                <div>
                    <h2 class="pb-3 text-xl font-bold">Pengungkapan hukum:</h2>
                    <p class="text-[#64748B]">Kami akan mengungkapkan informasi apa pun yang kami kumpulkan, gunakan, atau terima jika diwajibkan atau diizinkan oleh hukum, misalnya untuk mematuhi panggilan pengadilan atau proses hukum serupa, dan jika kami percaya dengan itikad baik bahwa pengungkapan diperlukan untuk melindungi hak kami, melindungi keselamatan Anda atau keselamatan orang lain, menyelidiki penipuan, atau menanggapi permintaan dari pemerintah.</p>
                </div>
                <div>
                    <h2 class="pb-3 text-xl font-bold">Informasi kontak:</h2>
                    <p class="text-[#64748B]">Jika Anda ingin menghubungi kami untuk mempelajari Kebijakan ini lebih lanjut atau menanyakan masalah apa pun yang berkaitan dengan hak perorangan dan Informasi pribadi Anda, Anda dapat mengirim email ke <a href="mailto:belajareradigital10@gmail.com" class="text-blue-500 underline hover:text-blue-900">belajareradigital10@gmail.com.</a></p>
                </div>
                <div class="w-full overflow-hidden rounded-[15px] h-44">
                    <img src="/img/privasi.jpg" class="object-cover w-full h-full" alt="...">
                </div>
            </div>
        </div>
    </div>
    @include('home.home-layouts.tw-home-footer')
@endsection
