@extends('home.home-layouts.home-main-tw')
@section('container')
    <div class="bg-ticykit-bg-blue font-inter">
        <div>
            @include('home.home-layouts.tw-home-navbar-ecourse')
        </div>
        <div class="mx-auto max-w-[90%] md:max-w-main">
            <div class="flex flex-col justify-center py-12 text-center text-white font-inter ">
                <p class="text-[14px] md:text-[16px]">Di Publish Pada 20 Des 2023</p>
                <p class="text-3xl md:text-[40px] leading-tight">Syarat dan Ketentuan <br><span class="font-bold">Belajar Era Digital</span></p>
            </div>
        </div>
    </div>
    <div class="mx-auto max-w-[90%] md:max-w-main font-inter py-10">
        <div class="flex flex-col-reverse md:gap-5 gap-y-10 md:flex-row">
            @include('home.home-layouts.tw-navbar-kebijakan')
            <div class="flex flex-col text-justify gap-y-5 font-inter">
                <div>
                    <h2 class="pb-3 text-xl font-bold">Syarat dan Ketentuan</h2>
                    <p class="text-[#64748B]">Selamat datang di Belajar Era Digital! Syarat dan ketentuan berikut menjelaskan peraturan dan ketentuan
                        penggunaan Website Belajar Era Digital dengan alamat www.belajareradigital.com. Dengan mengakses website ini,
                        kami menganggap Anda telah menyetujui syarat dan ketentuan ini. Jangan lanjutkan penggunaan Belajar Era Digital
                        jika Anda menolak untuk menyetujui semua syarat dan ketentuan yang tercantum di halaman ini. </p>
                </div>
                <div>
                    <h2 class="pb-3 text-xl font-bold">Cookie: </h2>
                    <p class=" pb-3 text-[#64748B]">Website ini menggunakan cookie untuk mempersonalisasi pengalaman online Anda. Dengan mengakses Belajar Era
                        Digital, Anda menyetujui penggunaan cookie yang diperlukan. </p>
                    <p class="pb-3 text-[#64748B]">Cookie merupakan file teks yang ditempatkan pada hard disk Anda oleh server halaman web. Cookie tidak dapat
                        digunakan untuk menjalankan program atau mengirimkan virus ke komputer Anda. Cookie yang diberikan telah
                        disesuaikan untuk Anda dan hanya dapat dibaca oleh web server pada domain yang mengirimkan cookie tersebut
                        kepada Anda. </p>
                    <p class="text-[#64748B]">Kami dapat menggunakan cookie untuk mengumpulkan, menyimpan, dan melacak informasi untuk keperluan statistik dan
                        pemasaran untuk mengoperasikan website kami. Ada beberapa Cookie wajib yang diperlukan untuk pengoperasian
                        website kami. Cookie ini tidak memerlukan persetujuan Anda karena akan selalu aktif. Perlu diketahui bahwa
                        dengan menyetujui Cookie wajib, Anda juga menyetujui Cookie pihak ketiga, yang mungkin digunakan melalui layanan
                        yang disediakan oleh pihak ketiga jika Anda menggunakan layanan tersebut di website kami, misalnya, jendela
                        tampilan video yang disediakan oleh pihak ketiga dan terintegrasi dengan website kami. </p>
                </div>
                <div>
                    <h2 class="pb-3 text-xl font-bold">Lisensi: </h2>
                    <p class="pb-3 text-[#64748B]">Kecuali dinyatakan lain, Belajar Era Digital dan/atau pemberi lisensinya memiliki hak kekayaan intelektual atas
                        semua materi di Belajar Era Digital. Semua hak kekayaan intelektual dilindungi undang-undang. Anda dapat
                        mengaksesnya dari Belajar Era Digital untuk penggunaan pribadi Anda sendiri dengan batasan yang diatur dalam
                        syarat dan ketentuan ini. </p>
                    <p class="pb-3 text-[#64748B]" >Anda dilarang untuk: </p>
                    <div class="pb-3 text-[#64748B]">
                        <ul class="text-[#64748B] list-disc pl-9">
                            <li>Menyalin atau menerbitkan ulang materi dari Belajar Era Digital</li>
                            <li>Menjual, menyewakan, atau mensublisensikan materi dari Belajar Era Digital</li>
                            <li>Memproduksi ulang, menggandakan, atau menyalin materi dari Belajar Era Digital</li>
                            <li>Mendistribusikan ulang konten dari Belajar Era Digital</li>
                        </ul>
                    </div>
                    <p class="pb-3 text-[#64748B]">Perjanjian ini akan mulai berlaku pada tanggal perjanjian ini.</p>
                    <p class="pb-3 text-[#64748B]">Beberapa bagian website ini menawarkan kesempatan bagi pengguna untuk memposting serta bertukar pendapat dan
                        informasi di area website tertentu. Belajar Era Digital tidak akan memfilter, mengedit, memublikasikan, atau
                        meninjau Komentar di hadapan pengguna di website. Komentar tidak mencerminkan pandangan dan pendapat Belajar Era
                        Digital, agennya, dan/atau afiliasinya. Komentar mencerminkan pandangan dan pendapat individu yang memposting
                        pandangan dan pendapatnya. Selama diizinkan oleh undang-undang yang berlaku, Belajar Era Digital tidak akan
                        bertanggung jawab atas Komentar atau kewajiban, kerugian, atau pengeluaran yang disebabkan dan/atau ditanggung
                        sebagai akibat dari penggunaan dan/atau penempatan dan/atau penayangan Komentar di website ini. </p>
                    <p class="pb-3 text-[#64748B]">Belajar Era Digital berhak memantau semua Komentar dan menghapus Komentar apa pun yang dianggap tidak pantas,
                        menyinggung, atau menyebabkan pelanggaran terhadap Syarat dan Ketentuan ini. </p>
                    <p class="pb-3 text-[#64748B]">Anda menjamin dan menyatakan bahwa: </p>
                    <ul class="text-[#64748B] list-disc pl-9">
                        <li>Anda berhak memposting Komentar di website kami serta memiliki semua lisensi dan persetujuan yang diperlukan
                            untuk melakukannya;</li>
                        <li>Komentar tidak melanggar hak kekayaan intelektual apa pun, termasuk tetapi tidak terbatas pada, hak cipta,
                            paten, atau merek dagang pihak ketiga mana pun;</li>
                        <li>Komentar tidak mengandung materi yang bersifat memfitnah, mencemarkan nama baik, menyinggung, tidak senonoh,
                            atau melanggar hukum, yang merupakan pelanggaran privasi.</li>
                        <li>Komentar tidak akan digunakan untuk membujuk atau mempromosikan bisnis atau kebiasaan atau memperkenalkan
                            kegiatan komersial atau kegiatan yang melanggar hukum.
                            Dengan ini Anda memberikan lisensi non-eksklusif kepada Belajar Era Digital untuk menggunakan, memproduksi
                            ulang, mengedit, dan mengizinkan orang lain untuk menggunakan, memproduksi ulang, dan mengedit Komentar Anda
                            dalam segala bentuk, format, atau media.</li>
                    </ul>
                </div>
                <div>
                    <h2 class="pb-3 text-xl font-bold">Membuat hyperlink yang mengarah ke Konten kami:</h2>
                    <p class="pb-3 text-[#64748B]">Organisasi berikut dapat membuat tautan menuju Website kami tanpa persetujuan tertulis sebelumnya: </p>
                    <ul class="pb-3 text-[#64748B] list-disc pl-9">
                        <li>Lembaga pemerintah;</li>
                        <li>Mesin pencari;</li>
                        <li>Kantor berita;</li>
                        <li>Distributor direktori online dapat membuat tautan menuju Website kami dengan cara yang sama seperti membuat
                            tautan ke Website bisnis terdaftar lainnya; dan</li>
                        <li>Bisnis Terakreditasi di Seluruh Sistem kecuali meminta organisasi nirlaba, pusat perbelanjaan amal, dan grup
                            penggalangan dana amal yang mungkin tidak membuat hyperlink menuju Website kami.</li>
                    </ul>
                    <p class="pb-3 text-[#64748B]">Organisasi-organisasi ini dapat menautkan ke halaman beranda, ke publikasi, atau ke informasi Website kami
                        lainnya selama tautan tersebut:
                    </p>
                    <ul class="pb-2 text-[#64748B] list-[lower-alpha] pl-9">
                        <li>tidak menipu dengan cara apa pun;</li>
                        <li>tidak menyiratkan secara keliru adanya hubungan sponsor, rekomendasi, atau persetujuan dari pihak yang menautkan beserta produk dan/atau layanannya; serta</li>
                        <li>sesuai dengan konteks website pihak yang menautkan.</li>
                    </ul>
                    <p class="pb-3 text-[#64748B]">Kami dapat mempertimbangkan dan menyetujui permintaan penautan lain dari jenis organisasi berikut:</p>
                    <ul class="pb-3 text-[#64748B] list-disc pl-9">
                        <li>sumber informasi bisnis dan/atau konsumen yang sudah umum dikenal; </li>
                        <li>website komunitas dot.com;</li>
                        <li>asosiasi atau kelompok lain yang mewakili badan amal;</li>
                        <li>distributor direktori online;</li>
                        <li>portal internet;</li>
                        <li>firma akuntansi, hukum, dan konsultan; dan</li>
                        <li>lembaga pendidikan dan asosiasi dagang.</li>
                    </ul>
                    <p class="pb-3 text-[#64748B]">Kami akan menyetujui permintaan penautan dari organisasi-organisasi tersebut jika kami memutuskan bahwa: </p>
                    <ul class="pb-2 text-[#64748B] list-[lower-alpha] pl-9">
                        <li>tautan tersebut tidak akan membuat kami terlihat merugikan kami sendiri atau bisnis terakreditasi kami;</li>
                        <li>organisasi tidak memiliki catatan negatif apa pun dengan kami;</li>
                        <li>keuntungan bagi kami dari keberadaan
                            hyperlink mengkompensasi tidak adanya Belajar Era Digital; dan </li>
                        <li>tautan tersebut dalam konteks informasi
                            sumber daya umum. </li>
                    </ul>
                    <p class="pb-3 text-[#64748B]">Organisasi-organisasi ini dapat menautkan ke halaman beranda kami selama tautan tersebut:</p>
                    <ul class=" pb-3 text-[#64748B] list-[lower-alpha] pl-9">
                        <li>tidak menipu dengan cara apa pun;</li>
                        <li>tidak menyiratkan secara keliru adanya hubungan sponsor, rekomendasi, atau persetujuan dari pihak yang menautkan beserta produk dan/atau layanannya; dan </li>
                        <li>sesuai dengan konteks website pihak yang menautkan. </li>
                    </ul>
                    <p class="pb-3 text-[#64748B]">Jika Anda merupakan salah satu organisasi yang tercantum dalam paragraf 2 di atas dan tertarik untuk membuat
                        tautan ke website kami, Anda harus memberitahu kami dengan mengirimkan email ke Belajar Era Digital. Harap
                        cantumkan nama Anda, nama organisasi Anda, informasi kontak dan URL website Anda, daftar URL apa pun yang akan
                        memuat tautan ke Website kami, serta daftar URL di website kami yang ingin Anda tautkan. Silakan tunggu
                        tanggapan dari kami selama 2-3 minggu. </p>
                    <p class="pb-3 text-[#64748B]">Organisasi yang telah disetujui dapat membuat hyperlink menuju Website kami seperti berikut:</p>
                    <ul class=" pb-2 text-[#64748B] list-[lower-alpha] pl-9">
                        <li>Dengan menggunakan nama perusahaan kami; atau</li>
                        <li>Dengan menggunakan Uniform Resource Locator yang ditautkan; atau</li>
                        <li>Dengan menggunakan deskripsi lain dari Website kami yang ditautkan yang masuk akal dalam konteks dan format
                            konten di website pihak yang menautkan.
                            Tidak ada penggunaan logo Belajar Era Digital atau karya seni lainnya yang diizinkan untuk menautkan
                            perjanjian lisensi merek dagang.</li>
                    </ul>
                </div>
                <div>
                    <h2 class="pb-3 text-xl font-bold">Tanggung jawab atas Konten:  </h2>
                    <p class="text-[#64748B]">Kami tidak akan bertanggung jawab atas konten yang muncul di Website Anda. Anda setuju untuk melindungi dan
                        membela kami terhadap semua klaim yang diajukan atas Website Anda. Tidak ada tautan yang muncul di Website mana
                        pun yang dapat dianggap sebagai memfitnah, cabul, atau kriminal, atau yang menyalahi, atau melanggar, atau
                        mendukung pelanggaran lain terhadap hak pihak ketiga. </p>
                </div>
                <div>
                    <h2 class="pb-3 text-xl font-bold">Pernyataan Kepemilikan Hak: </h2>
                    <p class="text-[#64748B]">Kami berhak meminta Anda menghapus semua tautan atau tautan tertentu yang menuju ke Website kami. Anda setuju
                        untuk segera menghapus semua tautan ke Website kami sesuai permintaan. Kami juga berhak mengubah syarat
                        ketentuan ini dan kebijakan penautannya kapan saja. Dengan terus menautkan ke Website kami, Anda setuju untuk
                        terikat dan mematuhi syarat dan ketentuan penautan ini.</p>
                </div>
                <div>
                    <h2 class="pb-3 text-xl font-bold">Penghapusan tautan dari website kami:</h2>
                    <p class="pb-3 text-[#64748B]">Jika Anda menemukan tautan di Website kami yang bersifat menyinggung karena alasan apa pun, Anda bebas
                        menghubungi dan memberi tahu kami kapan saja. Kami akan mempertimbangkan permintaan untuk menghapus tautan,
                        tetapi kami tidak berkewajiban untuk menanggapi Anda secara langsung. </p>
                    <p class="text-[#64748B]">Kami tidak memastikan bahwa informasi di website ini benar. Kami tidak menjamin kelengkapan atau keakuratannya,
                        dan kami juga tidak berjanji untuk memastikan bahwa website tetap tersedia atau materi di website selalu
                        diperbarui. </p>
                </div>
                <div>
                    <h2 class="pb-3 text-xl font-bold">Penolakan: </h2>
                    <p class="pb-3 text-[#64748B]">Sejauh diizinkan oleh undang-undang yang berlaku, kami mengecualikan semua representasi, jaminan, dan ketentuan
                        yang berkaitan dengan website kami dan penggunaan website ini. Tidak ada bagian dari penolakan ini yang akan:</p>
                    <ul class="pb-3 text-[#64748B] list-disc pl-9">
                        <li>membatasi atau mengecualikan tanggung jawab kami atau Anda terhadap kematian atau cedera pribadi;</li>
                        <li>membatasi atau mengecualikan tanggung jawab kami atau Anda terhadap penipuan atau pemberian keterangan yang
                            tidak benar;</li>
                        <li>membatasi tanggung jawab kami atau Anda dengan cara apa pun yang tidak diizinkan oleh undang-undang yang
                            berlaku; atau</li>
                        <li>mengecualikan tanggung jawab kami atau Anda yang tidak dapat dikecualikan berdasarkan undang-undang yang
                            berlaku.</li>
                    </ul>
                    <p class="pb-3 text-[#64748B]">Batasan dan pengecualian tanggung jawab yang diatur dalam Bagian ini dan bagian lain dalam penolakan ini: </p>
                    <ul class=" pb-2 text-[#64748B] list-[lower-alpha] pl-9">
                        <li>Tunduk pada paragraf sebelumnya; dan</li>
                        <li>Mengatur semua kewajiban yang timbul di bawah penolakan, termasuk
                            kewajiban yang timbul dalam kontrak, dalam gugatan, dan untuk pelanggaran kewajiban hukum. </li>
                    </ul>
                    <p class="text-[#64748B]">Selama website dan informasi serta layanan di website disediakan secara gratis, kami tidak akan bertanggung jawab
                        atas kerugian atau kerusakan apa pun. </p>
                </div>
                <div class="w-full overflow-hidden rounded-[15px] h-44">
                    <img src="/img/syarat.jpg" class="object-cover w-full h-full" alt="...">
                </div>
            </div>
        </div>
    </div>
    @include('home.home-layouts.tw-home-footer')
@endsection
