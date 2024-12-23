<?php

namespace App\Http\Controllers;

use App\Models\revsertif;
use App\Models\newsertif;
use App\Http\Requests\StorerevsertifRequest;
use App\Http\Requests\UpdaterevsertifRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Barryvdh\DomPDF\Facade\Pdf;

class RevsertifController extends Controller
{

    /**
     * Generate and save nomor pendaftaran.
     *
     * @param string $table
     * @return int
     */
    private function generateAndSaveNomorPendaftaran($table)
    {
        $nomorPendaftaran = DB::table($table)->max('nomorpendaftaran');
        $nomorPendaftaran = $nomorPendaftaran ? $nomorPendaftaran + 1 : 1;

        return $nomorPendaftaran;
    }

    private function getBase64QrCode($url)
    {
        $base64 = base64_encode(QrCode::size(100)->generate($url));
        return 'data:image/png;base64,' . $base64;
    }


    
    public function index()
    {
        //
        $revsertif = revsertif::with('header')->get();
        return view('revsertif.index', compact('revsertif'));
    }

    
    public function create(Request $request)
    {
        //
        $dataDariShow = session('data_dari_show');
        $judul = $request->input('judul');
        $slug = $request->input('slug');
        $kegiatan = $request->input('kegiatan');
        $fasilitas = $request->input('fasilitas');
        $jenis = $request->input('jenis');
        $nomorPendaftaran = $this->generateAndSaveNomorPendaftaran($slug);
        $nama = $request->input('nama');
        $namaedit = str_replace(['.', ',', "'"], '-', $nama);

        $namaedit = Str::slug($namaedit, '-');

        $gabungannamaid = $namaedit . $nomorPendaftaran;

        // dd($nomorPendaftaran);


        $data = [
            'judul' => $request->input('judul'),
            'slug' => $gabungannamaid,
            'kegiatan' => $request->input('kegiatan'),
            'fasilitas' => $request->input('fasilitas'),
            'jenis' => $request->input('jenis'),
            'nama' => $request->input('nama'),
            'instansi' => $request->input('instansi'),
            'email' => $request->input('email'),
            'whatsapp' => $request->input('whatsapp'),
            'nomorpendaftaran' => $nomorPendaftaran,
        ];

        // $data = $request->validate([
        //     'judul' => 'required',
        //     'slug' => 'required',
        //     'kegiatan' => 'required',
        //     'fasilitas' => 'required',
        //     'jenis' => 'required',

        //     'nama' => 'required',
        //     'instansi' => 'required',
        //     'email' => 'required|email',
        //     'whatsapp' => 'required|numeric',


        // ]);


        DB::table($slug)->insert($data);

        return redirect('/suksesrevisi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorerevsertifRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorerevsertifRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\revsertif  $revsertif
     * @return \Illuminate\Http\Response
     */
    public function show(revsertif $revsertif)
    {
        //
        // dd($revsertif);
        session(['data_dari_show' => $revsertif]);
        // dd($revsertif);

        if ($revsertif->dibuka === 1) {
            return view('revsertif.formrevisi', [
                "revsertif" => $revsertif,
                'title' => 'Revisi Sertifikat'
            ]);
        } else {
            return view('revsertif.ditutup', [
                "revsertif" => $revsertif,
                'title' => 'Revisi Sertifikat'
            ]);
        }
    }




    public function showrevindex()
    {
        $revsertif = revsertif::get();
        return view('revsertif.showsertifindex', compact('revsertif'));
    }

    public function showrevshow(revsertif $revsertif)
    {
        $tablename = $revsertif->slug;

        $bulans = ['jan', 'feb', 'mar', 'apr', 'mei', 'jun', 'jul', 'agu', 'sep', 'okt', 'nov', 'des'];
        $polaBulan = implode('|', $bulans);

        // Menggunakan regex untuk mencocokkan pola tanggal dengan sufiks 'rev' dan menghapus karakter tambahan setelahnya
        if (preg_match('/(\d{1,2}(' . $polaBulan . ')\d{4}rev)([a-zA-Z0-9]+)?$/', $tablename, $matches)) {
            // Jika ada karakter tambahan (grup ke-4 terdefinisi), lakukan Str::beforeLast()
            if (!empty($matches[3])) {
                $editedtablename = Str::beforeLast($tablename, $matches[3]);
            } else {
                // Jika tidak ada karakter tambahan, biarkan apa adanya
                $editedtablename = $tablename;
            }
        } else {
            // Jika regex tidak cocok, biarkan apa adanya
            $editedtablename = $tablename;
        }

        // dd($editedtablename);



        $datas = DB::table($editedtablename)->paginate(20);
        session(['data_dari_show' => $revsertif]);

        return view('revsertif.showsertifrev', compact('datas'), [
            "revsertif" => $revsertif,
            'title' => 'Revisi Sertifikat'
        ]);
    }

    public function showUserrev(Revsertif $revsertif, $slug)
    {
        $tablename = $revsertif->slug;
        $bulans = ['jan', 'feb', 'mar', 'apr', 'mei', 'jun', 'jul', 'agu', 'sep', 'okt', 'nov', 'des'];
        $polaBulan = implode('|', $bulans);

        // Menggunakan regex untuk mencocokkan pola tanggal dengan sufiks 'rev' dan menghapus karakter tambahan setelahnya
        if (preg_match('/(\d{1,2}(' . $polaBulan . ')\d{4}rev)([a-zA-Z0-9]+)?$/', $tablename, $matches)) {
            // Jika ada karakter tambahan (grup ke-4 terdefinisi), lakukan Str::beforeLast()
            if (!empty($matches[3])) {
                $editedtablename = Str::beforeLast($tablename, $matches[3]);
            } else {
                // Jika tidak ada karakter tambahan, biarkan apa adanya
                $editedtablename = $tablename;
            }
        } else {
            // Jika regex tidak cocok, biarkan apa adanya
            $editedtablename = $tablename;
        }

        // dd($tablename);
        $datas = DB::table($tablename)->where('slug', $slug)->first();

        

        // Generate QR Code
        $url = route('revsertifikat.user', ['revsertif' => $revsertif->slug2, 'datas' => $datas->slug]);
        
        $qrcode = QrCode::size(300)->generate($url);



        return view('revsertif.detailuser', compact('datas', 'qrcode', 'url'), [
            'title' => 'Sertifikat'
        ]);
    }

    public function search(Request $request, revsertif $revsertif)
    {
        $datashow = session('data_dari_show');
        $tablename = $datashow->slug;


        $search = $request->input('search');

        $bulans = ['jan', 'feb', 'mar', 'apr', 'mei', 'jun', 'jul', 'agu', 'sep', 'okt', 'nov', 'des'];
        $polaBulan = implode('|', $bulans);

        
        if (preg_match('/(\d{1,2}(' . $polaBulan . ')\d{4}rev)([a-zA-Z0-9]+)?$/', $tablename, $matches)) {
           
            if (!empty($matches[3])) {
                $editedtablename = Str::beforeLast($tablename, $matches[3]);
            } else {
                
                $editedtablename = $tablename;
            }
        } else {
            
            $editedtablename = $tablename;
        }

        $datas = DB::table($editedtablename)
            ->where('nama', 'like', '%' . $search . '%')
            ->orWhere('instansi', 'like', '%' . $search . '%')
            ->paginate(20)->withQueryString();

        return view('revsertif.showsertifrev', compact('datas'), [
            "revsertif" => $revsertif,
        ]);
    }

    public function generate(revsertif $revsertif, $id)
    {
        $datashow = session('data_dari_show');
        $tablename = $datashow->slug;
        

        $bulans = ['jan', 'feb', 'mar', 'apr', 'mei', 'jun', 'jul', 'agu', 'sep', 'okt', 'nov', 'des'];
        $polaBulan = implode('|', $bulans);

        
        if (preg_match('/(\d{1,2}(' . $polaBulan . ')\d{4}rev)([a-zA-Z0-9]+)?$/', $tablename, $matches)) {
            
            if (!empty($matches[3])) {
                $editedtablename = Str::beforeLast($tablename, $matches[3]);
            } else {
                
                $editedtablename = $tablename;
            }
        } else {
            
            $editedtablename = $tablename;
        }

        $sertifikat = DB::table($editedtablename)->where('id', $id)->first();
        $sertifikatTanpaRev = str_replace('rev', '', $editedtablename);

        $judul = $datashow->judul;
        $editedjudul = Str::before($judul, '(');

        

        //ambil data newsertif
        $datatablenewsertif = str_replace('rev', '', $editedtablename);
        
        $newsertif = newsertif::where('slug', 'like', $datatablenewsertif . '%')->first();
        // dd($newsertif->materi1);



        if ($sertifikat) {
            $nama = $sertifikat->nama;
            $instansi = $sertifikat->instansi;
            $jenis = $sertifikat->jenis;
            // dd($sertifikat);
            

            if ($jenis == 'webinar') {
                $url = route('revsertifikat.user', ['revsertif' => $datashow->slug2, 'datas' => $sertifikat->slug]);
                $qrcodeDataUri = $this->getBase64QrCode($url);
                // Path menuju gambar template PNG
                $templateImage = public_path('templateSertif/' . $sertifikatTanpaRev . '.jpg');

                $html = '<img src="' . $templateImage . '" style="margin-top:-50px;margin-left:-50px;background-color:red;position:absolute; left:0px;max-width:115%; max-height:115%;  z-index:10; " />';
                $html .= '<h3 style="text-align:center;margin-top:190px;z-index:50; font-family:poppins; font-size:36px;">' . $nama . '</h3>';
                $html .= '<h5 style="text-align:center;margin-top:-30px;z-index:50; font-family:poppins; font-size:30px;">' . $instansi . '</h5>';
                $html .= '<img src="' . $qrcodeDataUri . '" style="background-color:red; width:80px; z-index:100; position:absolute; margin-top:170px; right:10px">';


                $pdf = PDF::loadHTML($html)->setPaper([0, 0, 888, 631]);
                $filename = 'sertifikat_' . $nama . '.pdf';
            } elseif ($jenis == 'diklat') {
                
                $url = route('revsertifikat.user', ['revsertif' => $datashow->slug2, 'datas' => $sertifikat->slug]);
                $qrcodeDataUri = $this->getBase64QrCode($url);
                // Path menuju gambar template PNG
                $templateImage = public_path('templateSertif/' . $sertifikatTanpaRev . '.jpg');

                $html = '<img src="' . $templateImage . '" style="margin-top:-50px;margin-left:-50px;background-color:red;position:absolute; left:0px;max-width:115%; max-height:115%;  z-index:10; " />';
                $html .= '<h3 style="text-align:center;margin-top:180px;z-index:50; font-family:poppins; font-size:36px;">' . $nama . '</h3>';
                $html .= '<h5 style="text-align:center;margin-top:-60px;z-index:50; font-family:poppins; font-size:26px;">' . $instansi . '</h5>';
                $html .= '<img src="' . $qrcodeDataUri . '" style="background-color:red; width:80px; z-index:100; position:absolute; margin-top:620px; right:150px">';


                $pdf = PDF::loadHTML($html);
                $filename = 'sertifikat_' . $nama . '.pdf';
            } elseif ($jenis == 'diklatver1') {
                $url = route('revsertifikat.user', ['revsertif' => $datashow->slug2, 'datas' => $sertifikat->slug]);
                $qrcodeDataUri = $this->getBase64QrCode($url);
                // Path menuju gambar template PNG
                $templateImage = public_path('templateSertif/' . $sertifikatTanpaRev . '.jpg');

                $html = '<img src="' . $templateImage . '" style="margin-top:-50px;margin-left:-50px;background-color:red;position:absolute; left:0px;max-width:115%; max-height:115%;  z-index:10; " />';
                $html .= '<h3 style="text-align:center;margin-top:190px;z-index:50; font-family:poppins; font-size:36px;">' . $nama . '</h3>';
                $html .= '<h5 style="text-align:center;margin-top:-60px;z-index:50; font-family:poppins; font-size:30px;">' . $instansi . '</h5>';
                $html .= '<img src="' . $qrcodeDataUri . '" style="background-color:red; width:80px; z-index:100; position:absolute; margin-top:170px; right:10px">';


                $pdf = PDF::loadHTML($html);
                $filename = 'sertifikat_' . $nama . '.pdf';
            }
            elseif ($jenis == 'diklatver2') {
                
                $url = route('revsertifikat.user', ['revsertif' => $datashow->slug2, 'datas' => $sertifikat->slug]);
                $qrcodeDataUri = $this->getBase64QrCode($url);
                // Path menuju gambar template PNG
                $templateImage = public_path('templateSertif/' . $sertifikatTanpaRev . '.jpg');

                $html = '<img src="' . $templateImage . '" style="margin-top:-50px;margin-left:-50px;background-color:red;position:absolute; left:0px;max-width:115%; max-height:115%;  z-index:10; " />';
                $html .= '<h3 style="text-align:center;margin-top:180px;z-index:50; font-family:poppins; font-size:36px;">' . $nama . '</h3>';
                $html .= '<h5 style="text-align:center;margin-top:-60px;z-index:50; font-family:poppins; font-size:26px;">' . $instansi . '</h5>';
                $html .= '<img src="' . $qrcodeDataUri . '" style="background-color:red; width:80px; z-index:100; position:absolute; margin-top:620px; right:150px">';


                $pdf = PDF::loadHTML($html);
                $filename = 'sertifikat_' . $nama . '.pdf';
            } elseif ($jenis == '1narsum') {
                $url = route('revsertifikat.user', ['revsertif' => $datashow->slug2, 'datas' => $sertifikat->slug]);
                $qrcodeDataUri = $this->getBase64QrCode($url);
                // Path menuju gambar template PNG
                $templateImage = public_path('templateSertif/' . $sertifikatTanpaRev . '.jpg');

                $html = '<img src="' . $templateImage . '" style="margin-top:-50px;margin-left:-50px;background-color:red;position:absolute; left:0px;max-width:115%; max-height:115%;  z-index:10; " />';
                $html .= '<h3 style="text-align:center;margin-top:190px;z-index:50; font-family:poppins; font-size:36px;">' . $nama . '</h3>';
                $html .= '<h5 style="text-align:center;margin-top:-30px;z-index:50; font-family:poppins; font-size:30px;">' . $instansi . '</h5>';
                $html .= '<img src="' . $qrcodeDataUri . '" style="background-color:red; width:80px; z-index:100; position:absolute; margin-top:540px; right:40px">';


                $pdf = PDF::loadHTML($html);
                $filename = 'sertifikat_' . $nama . '.pdf';
            } elseif ($jenis == 'workshop') {
                $url = route('revsertifikat.user', ['revsertif' => $datashow->slug2, 'datas' => $sertifikat->slug]);
                $qrcodeDataUri = $this->getBase64QrCode($url);
                // Path menuju gambar template PNG
                $templateImage = public_path('templateSertif/' . $sertifikatTanpaRev . '.jpg');

                $html = '<img src="' . $templateImage . '" style="margin-top:-50px;margin-left:-50px;background-color:red;position:absolute; left:0px;max-width:115%; max-height:115%; z-index:10;" />';
                $html .= '<h3 style="text-align:center;margin-top:180px;z-index:50; font-family:poppins; font-size:36px;">' . $nama . '</h3>';
                $html .= '<h5 style="text-align:center;margin-top:-60px;z-index:50; font-family:poppins; font-size:26px;">' . $instansi . '</h5>';
                $html .= '<img src="' . $qrcodeDataUri . '" style="background-color:red; width:80px; z-index:100; position:absolute; margin-top:620px; right:150px">';


                $pdf = PDF::loadHTML($html);
                $filename = 'sertifikat_' . $nama . '.pdf';
            } elseif ($jenis == 'webinar2') {
                $url = route('revsertifikat.user', ['revsertif' => $datashow->slug2, 'datas' => $sertifikat->slug]);
                $qrcodeDataUri = $this->getBase64QrCode($url);
                // Path menuju gambar template PNG
                $templateImage = public_path('templateSertif/' . $sertifikatTanpaRev . '.jpg');

                $html = '<img src="' . $templateImage . '" style="margin-top:-50px;margin-left:-50px;background-color:red;position:absolute; left:0px;max-width:115%; max-height:115%; z-index:10;" />';
                $html .= '<h3 style="text-align:center;margin-top:180px;z-index:50; font-family:poppins; font-size:36px;">' . $nama . '</h3>';
                $html .= '<h5 style="text-align:center;margin-top:-60px;z-index:50; font-family:poppins; font-size:26px;">' . $instansi . '</h5>';
                $html .= '<img src="' . $qrcodeDataUri . '" style="background-color:red; width:80px; z-index:100; position:absolute; margin-top:620px; right:150px">';


                $pdf = PDF::loadHTML($html);
                $filename = 'sertifikat_' . $nama . '.pdf';
            } elseif($jenis == 'webinarpmm'){
                $url = route('revsertifikat.user', ['revsertif' => $datashow->slug2, 'datas' => $sertifikat->slug]);
                $qrcodeDataUri = $this->getBase64QrCode($url);
                // Path menuju gambar template PNG
                $templateImage = public_path('templateSertif/templatepmm.jpg');

                $tanggal = $newsertif->tanggal;
                $nosertif = $newsertif->nosertif;
                

                $pembicara = $newsertif->pembicara1;
                $materi = $newsertif->materi1;
                $jp = $newsertif->jp1;
                $ttd = $newsertif->ttd1;
                $jabatan = $newsertif->jabatan1;
                $tanggaldibuat = $newsertif->tanggaldibuat;
                
                $filepathimagettd = public_path('ttdNarsum/' . $ttd);
                if (file_exists($filepathimagettd)) {
                    $imagettd = $filepathimagettd;
                } else {
                    $imagettd = null;
                }
               

                

                $pdf = PDF::loadView('pdf.webinarenglish', compact('templateImage', 'nosertif', 'nama', 'instansi', 'editedjudul', 'tanggal', 'materi', 'jp', 'imagettd', 'pembicara', 'jabatan', 'tanggaldibuat', 'qrcodeDataUri'))->setPaper('A4', 'portrait');
                // $pdf = PDF::loadHTML($html);
                $filename = 'sertifikat_' . $nama . '.pdf';
                

            } elseif($jenis == 'webinarenglish'){
                $url = route('revsertifikat.user', ['revsertif' => $datashow->slug2, 'datas' => $sertifikat->slug]);
                $qrcodeDataUri = $this->getBase64QrCode($url);
                // Path menuju gambar template PNG
                $templateImage = public_path('templateSertif/templateenglish.jpg');

                $tanggal = $newsertif->tanggal;
                $nosertif = $newsertif->nosertif;
                

                $pembicara = $newsertif->pembicara1;
                $materi = $newsertif->materi1;
                $jp = $newsertif->jp1;
                $ttd = $newsertif->ttd1;
                $jabatan = $newsertif->jabatan1;
                $tanggaldibuat = $newsertif->tanggaldibuat;
                
                $filepathimagettd = public_path('ttdNarsum/' . $ttd);
                if (file_exists($filepathimagettd)) {
                    $imagettd = $filepathimagettd;
                } else {
                    $imagettd = null;
                }
               
        
                



                


                
                $pdf = PDF::loadView('pdf.webinarenglish', compact('templateImage', 'nosertif', 'nama', 'instansi', 'editedjudul', 'tanggal', 'materi', 'jp', 'imagettd', 'pembicara', 'jabatan', 'tanggaldibuat', 'qrcodeDataUri'))->setPaper('A4', 'portrait');
                // $pdf = PDF::loadHTML($html);
                $filename = 'sertifikat_' . $nama . '.pdf';
                

            } elseif($jenis == 'webinarcanva'){
                
                $url = route('revsertifikat.user', ['revsertif' => $datashow->slug2, 'datas' => $sertifikat->slug]);
                $qrcodeDataUri = $this->getBase64QrCode($url);
                // Path menuju gambar template PNG
                $templateImage = public_path('templateSertif/templatecanva.jpg');

                $tanggal = $newsertif->tanggal;
                $nosertif = $newsertif->nosertif;
                

                $pembicara = $newsertif->pembicara1;
                $materi = $newsertif->materi1;
                $jp = $newsertif->jp1;
                $ttd = $newsertif->ttd1;
                $jabatan = $newsertif->jabatan1;
                $tanggaldibuat = $newsertif->tanggaldibuat;
                
                $filepathimagettd = public_path('ttdNarsum/' . $ttd);
                if (file_exists($filepathimagettd)) {
                    $imagettd = $filepathimagettd;
                } else {
                    $imagettd = null;
                }
               

                

                $pdf = PDF::loadView('pdf.webinarenglish', compact('templateImage', 'nosertif', 'nama', 'instansi', 'editedjudul', 'tanggal', 'materi', 'jp', 'imagettd', 'pembicara', 'jabatan', 'tanggaldibuat', 'qrcodeDataUri'))->setPaper('A4', 'portrait');
                // $pdf = PDF::loadHTML($html);
                $filename = 'sertifikat_' . $nama . '.pdf';
                

            }elseif($jenis == 'webinartim1'){
                
                $url = route('revsertifikat.user', ['revsertif' => $datashow->slug2, 'datas' => $sertifikat->slug]);
                $qrcodeDataUri = $this->getBase64QrCode($url);
                // Path menuju gambar template PNG
                $templateImage = public_path('templateSertif/templateenglish.jpg');

                $tanggal = $newsertif->tanggal;
                $nosertif = $newsertif->nosertif;
                

                $pembicara = $newsertif->pembicara1;
                $materi = $newsertif->materi1;
                $jp = $newsertif->jp1;
                $ttd = $newsertif->ttd1;
                $jabatan = $newsertif->jabatan1;
                $tanggaldibuat = $newsertif->tanggaldibuat;
                
                $filepathimagettd = public_path('ttdNarsum/' . $ttd);
                if (file_exists($filepathimagettd)) {
                    $imagettd = $filepathimagettd;
                } else {
                    $imagettd = null;
                }
                
              
                $pdf = PDF::loadView('pdf.webinarenglish', compact('templateImage', 'nosertif', 'nama', 'instansi', 'editedjudul', 'tanggal', 'materi', 'jp', 'imagettd', 'pembicara', 'jabatan', 'tanggaldibuat', 'qrcodeDataUri'))->setPaper('A4', 'portrait');
                // $pdf = PDF::loadHTML($html);
                $filename = 'sertifikat_' . $nama . '.pdf';
                

            }elseif($jenis == 'webinargamifikasi'){
                
                $url = route('revsertifikat.user', ['revsertif' => $datashow->slug2, 'datas' => $sertifikat->slug]);
                $qrcodeDataUri = $this->getBase64QrCode($url);
                // Path menuju gambar template PNG
                $templateImage = public_path('templateSertif/templateenglish.jpg');

                $tanggal = $newsertif->tanggal;
                $nosertif = $newsertif->nosertif;
                

                $pembicara = $newsertif->pembicara1;
                $materi = $newsertif->materi1;
                $jp = $newsertif->jp1;
                $ttd = $newsertif->ttd1;
                $jabatan = $newsertif->jabatan1;
                $tanggaldibuat = $newsertif->tanggaldibuat;
                
                $filepathimagettd = public_path('ttdNarsum/' . $ttd);
                if (file_exists($filepathimagettd)) {
                    $imagettd = $filepathimagettd;
                } else {
                    $imagettd = null;
                }
                
              
                $pdf = PDF::loadView('pdf.webinarenglish', compact('templateImage', 'nosertif', 'nama', 'instansi', 'editedjudul', 'tanggal', 'materi', 'jp', 'imagettd', 'pembicara', 'jabatan', 'tanggaldibuat', 'qrcodeDataUri'))->setPaper('A4', 'portrait');
                // $pdf = PDF::loadHTML($html);
                $filename = 'sertifikat_' . $nama . '.pdf';
                

            }
            else {
                $url = route('revsertifikat.user', ['revsertif' => $datashow->slug2, 'datas' => $sertifikat->slug]);
                $qrcodeDataUri = $this->getBase64QrCode($url);
                // Path menuju gambar template PNG
                $templateImage = public_path('templateSertif/' . $sertifikatTanpaRev . '.jpg');

                $html = '<img src="' . $templateImage . '" style="margin-top:-50px;margin-left:-50px;background-color:red;position:absolute; left:0px;max-width:115%; max-height:115%;  z-index:10; " />';
                $html .= '<h3 style="text-align:center;margin-top:190px;z-index:50; font-family:poppins; font-size:36px;">' . $nama . '</h3>';
                $html .= '<h5 style="text-align:center;margin-top:-60px;z-index:50; font-family:poppins; font-size:30px;">' . $instansi . '</h5>';
                $html .= '<img src="' . $qrcodeDataUri . '" style="background-color:red; width:80px; z-index:100; position:absolute; margin-top:610px; right:150px">';


                $pdf = PDF::loadHTML($html);
                $filename = 'sertifikat_' . $nama . '.pdf';
            }



            // Mengatur header HTTP untuk nama file
            return $pdf->stream($filename, array('Attachment' => 0));
        } else {
            return "Sertifikat tidak ditemukan.";
        }
    }

    public function sukses()
    {
        $dataDariShow = session('data_dari_show');

        return view('revsertif.sukses', [
            'dataDariShow' => $dataDariShow,
        ]);
    }
}
