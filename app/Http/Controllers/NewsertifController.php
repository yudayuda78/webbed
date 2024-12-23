<?php

namespace App\Http\Controllers;


use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Event;
use App\Models\newsertif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Requests\StorenewsertifRequest;
use App\Http\Requests\UpdatenewsertifRequest;

class NewsertifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private function getBase64QrCode($url)
    {
        $base64 = base64_encode(QrCode::size(100)->generate($url));
        return 'data:image/png;base64,' . $base64;
    }
    public function index()
    {
        //
        $newsertif = newsertif::with('header')->get();
        return view('newsertif.index', compact('newsertif'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorenewsertifRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorenewsertifRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\newsertif  $newsertif
     * @return \Illuminate\Http\Response
     */
    public function show(newsertif $newsertif)
    {
        $tablename = $newsertif->slug;
        // dd($tablename);

        $editedtablename = Str::substr($tablename, 0, -5);





        // dd($editedtablename);







        $datas = DB::table($editedtablename)->paginate(20);
        session(['data_dari_show' => $newsertif]);

        $retrieveEvent = Event::where('statuspelaksanaan', 1)
            ->orderBy('id')
            ->get();
        $isiEvent = $retrieveEvent->filter(function ($event) {
            $imagePath = public_path('pendaftaran/' . $event->image);
            return !empty($event->image) && File::exists($imagePath);
        })->random(3);

        return view('newsertif.newsertif', compact('datas', 'isiEvent'), [
            "newsertif" => $newsertif,
        ]);
    }

    public function showUser(newsertif $newsertif, $slug)
    {
        $tablename = $newsertif->slug;

        $editedtablename = Str::substr($tablename, 0, -5);


        $datas = DB::table($editedtablename)->where('slug', $slug)->first();

        // Generate QR Code
        $url = route('sertifikat.user', ['newsertif' => $newsertif->slug, 'datas' => $datas->slug]);
        $qrcode = QrCode::size(300)->generate($url);

        return view('newsertif.detailuser', compact('datas', 'qrcode', 'url'), [
            'title' => 'Sertifikat'
        ]);
    }

    public function search(Request $request, newsertif $newsertif)
    {
        $datashow = session('data_dari_show');
        $tablename = $datashow->slug;



        $search = $request->input('search');

        $retrieveEvent = Event::where('statuspelaksanaan', 1)
            ->orderBy('id')
            ->get();
        $isiEvent = $retrieveEvent->filter(function ($event) {
            $imagePath = public_path('pendaftaran/' . $event->image);
            return !empty($event->image) && File::exists($imagePath);
        })->random(3);


        $editedtablename = Str::substr($tablename, 0, -5);

        $datas = DB::table($editedtablename)
            ->where('nama', 'like', '%' . $search . '%')
            ->orWhere('instansi', 'like', '%' . $search . '%')
            ->paginate(20)->withQueryString();

        return view('newsertif.newsertif', compact('datas', 'search', 'isiEvent'), [
            "newsertif" => $newsertif,
        ]);
    }

    public function generate(newsertif $newsertif, $id)
    {
        $datashow = session('data_dari_show');
        $tablename = $datashow->slug;
        $imgtemplate = Str::substr($tablename, 0, -5);
        $judul = $datashow->judul;
        $editedjudul = Str::before($judul, '(');



        $editedtablename = Str::substr($tablename, 0, -5);


        $sertifikat = DB::table($editedtablename)->where('id', $id)->first();

        // dd($datashow);



        if ($sertifikat) {
            $nama = $sertifikat->nama;
            $instansi = $sertifikat->instansi;
            $jenis = $sertifikat->jenis;




            if ($jenis == 'webinar') {
                $url = route('sertifikat.user', ['newsertif' => $datashow->slug, 'datas' => $sertifikat->slug]);
                $qrcodeDataUri = $this->getBase64QrCode($url);
                // Path menuju gambar template PNG
                $templateImage = public_path('templateSertif/' . $imgtemplate  . '.jpg');

                $html = '<img src="' . $templateImage . '" style="margin-top:-50px;margin-left:-50px;background-color:red;position:absolute; left:0px;max-width:115%; max-height:115%;  z-index:10; " />';
                $html .= '<h3 style="text-align:center;margin-top:180px;z-index:50; font-family:poppins; font-size:36px;">' . $nama . '</h3>';
                $html .= '<h5 style="text-align:center;margin-top:-60px;z-index:50; font-family:poppins; font-size:30px; line-height:0.8;">' . $instansi . '</h5>';
                $html .= '<img src="' . $qrcodeDataUri . '" style="background-color:red; width:80px; z-index:100; position:absolute; margin-top:170px; right:10px">';


                $pdf = PDF::loadHTML($html)->setPaper([0, 0, 888, 631]);
                $filename = 'sertifikat_' . $nama . '.pdf';
            } elseif ($jenis == 'diklat') {
                $url = route('sertifikat.user', ['newsertif' => $datashow->slug, 'datas' => $sertifikat->slug]);
                $qrcodeDataUri = $this->getBase64QrCode($url);
                // Path menuju gambar template PNG
                $templateImage = public_path('templateSertif/' . $imgtemplate . '.jpg');

                $html = '<img src="' . $templateImage . '" style="margin-top:-50px;margin-left:-50px;background-color:red;position:absolute; left:0px;max-width:115%; max-height:115%; z-index:10;" />';
                $html .= '<h3 style="text-align:center;margin-top:180px;z-index:50; font-family:poppins; font-size:36px;">' . $nama . '</h3>';
                $html .= '<h5 style="text-align:center;margin-top:-35px;z-index:50; font-family:poppins; font-size:26px; line-height:0.5;">' . $instansi . '</h5>';
                $html .= '<img src="' . $qrcodeDataUri . '" style="background-color:red; width:80px; z-index:100; position:absolute; margin-top:620px; right:150px">';


                $pdf = PDF::loadHTML($html);
                $filename = 'sertifikat_' . $nama . '.pdf';
            } elseif ($jenis == '1narsum') {
                $url = route('sertifikat.user', ['newsertif' => $datashow->slug, 'datas' => $sertifikat->slug]);
                $qrcodeDataUri = $this->getBase64QrCode($url);
                // Path menuju gambar template PNG
                $templateImage = public_path('templateSertif/' . $imgtemplate . '.jpg');

                $html = '<img src="' . $templateImage . '" style="margin-top:-50px;margin-left:-50px;background-color:red;position:absolute; left:0px;max-width:115%; max-height:115%;  z-index:10; " />';
                $html .= '<h3 style="text-align:center;margin-top:190px;z-index:50; font-family:poppins; font-size:36px;">' . $nama . '</h3>';
                $html .= '<h5 style="text-align:center;margin-top:-30px;z-index:50; font-family:poppins; font-size:30px;">' . $instansi . '</h5>';
                $html .= '<img src="' . $qrcodeDataUri . '" style="background-color:red; width:80px; z-index:100; position:absolute; margin-top:540px; right:40px">';


                $pdf = PDF::loadHTML($html);
                $filename = 'sertifikat_' . $nama . '.pdf';
            } elseif ($jenis == 'webinarnew') {
                $url = route('sertifikat.user', ['newsertif' => $datashow->slug, 'datas' => $sertifikat->slug]);
                $qrcodeDataUri = $this->getBase64QrCode($url);
                // Path menuju gambar template PNG
                $templateImage = public_path('templateSertif/' . $imgtemplate . '.jpg');

                $html = '<img src="' . $templateImage . '" style="margin-top:-50px;margin-left:-50px;background-color:red;position:absolute; left:0px;max-width:115%; max-height:115%;  z-index:10; " />';
                $html .= '<h3 style="text-align:center;margin-top:180px;z-index:50; font-family:poppins; font-size:36px;">' . $nama . '</h3>';
                $html .= '<h5 style="text-align:center;margin-top:-60px;z-index:50; font-family:poppins; font-size:30px;">' . $instansi . '</h5>';
                $html .= '<img src="' . $qrcodeDataUri . '" style="background-color:red; width:80px; z-index:100; position:absolute; margin-top:170px; right:10px">';


                $pdf = PDF::loadHTML($html);
                $filename = 'sertifikat_' . $nama . '.pdf';
            } elseif ($jenis == 'workshop') {
                $url = route('sertifikat.user', ['newsertif' => $datashow->slug, 'datas' => $sertifikat->slug]);
                $qrcodeDataUri = $this->getBase64QrCode($url);
                // Path menuju gambar template PNG
                $templateImage = public_path('templateSertif/' . $imgtemplate . '.jpg');

                $html = '<img src="' . $templateImage . '" style="margin-top:-50px;margin-left:-50px;background-color:red;position:absolute; left:0px;max-width:115%; max-height:115%;  z-index:10; " />';
                $html .= '<h3 style="text-align:center;margin-top:180px;z-index:50; font-family:poppins; font-size:36px;">' . $nama . '</h3>';
                $html .= '<h5 style="text-align:center;margin-top:-60px;z-index:50; font-family:poppins; font-size:30px; line-height:0.8;">' . $instansi . '</h5>';
                $html .= '<img src="' . $qrcodeDataUri . '" style="background-color:red; width:80px; z-index:100; position:absolute; margin-top:620px; right:160px">';


                $pdf = PDF::loadHTML($html);
                $filename = 'sertifikat_' . $nama . '.pdf';
            } elseif ($jenis == 'webinar2') {
                $url = route('sertifikat.user', ['newsertif' => $datashow->slug, 'datas' => $sertifikat->slug]);
                $qrcodeDataUri = $this->getBase64QrCode($url);
                // Path menuju gambar template PNG
                $templateImage = public_path('templateSertif/' . $imgtemplate . '.jpg');

                $html = '<img src="' . $templateImage . '" style="margin-top:-50px;margin-left:-50px;background-color:red;position:absolute; left:0px;max-width:115%; max-height:115%;  z-index:10; " />';
                $html .= '<h3 style="text-align:center;margin-top:180px;z-index:50; font-family:poppins; font-size:36px;">' . $nama . '</h3>';
                $html .= '<h5 style="text-align:center;margin-top:-60px;z-index:50; font-family:poppins; font-size:30px;">' . $instansi . '</h5>';
                $html .= '<img src="' . $qrcodeDataUri . '" style="background-color:red; width:80px; z-index:100; position:absolute; margin-top:620px; right:160px">';


                $pdf = PDF::loadHTML($html);
                $filename = 'sertifikat_' . $nama . '.pdf';
            } elseif ($jenis == 'englishclass1') {
                //untuk english class
                $activeness = $sertifikat->activeness;
                $vocabulary = $sertifikat->vocabulary;
                $grammar = $sertifikat->grammar;
                $fluency = $sertifikat->fluency;
                $score = $sertifikat->score;


                $url = route('sertifikat.user', ['newsertif' => $datashow->slug, 'datas' => $sertifikat->slug]);
                $qrcodeDataUri = $this->getBase64QrCode($url);
                // Path menuju gambar template PNG
                $templateImage = public_path('templateSertif/' . $imgtemplate . '.jpg');
                $googleFonts = '<link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700&display=swap" rel="stylesheet">';

                $html = '<html><head>' . $googleFonts . '</head><body>';
                $html .= '<img src="' . $templateImage . '" style="margin-top:-50px;margin-left:-50px;background-color:red;position:absolute; left:0px;max-width:115%; max-height:115%; z-index:10;" />';
                $html .= '<h3 style="text-align:center;margin-top:260px;z-index:50; font-family:Lora, serif; font-weight:400; font-size:42px; color:#543E36;">' . $nama . '</h3>';
                $html .= '<h3 style="text-align:center;margin-top:215px;margin-left:230px;z-index:50; font-family:Lora, serif; font-weight:600; font-size:22px; color:#543E36;">' . $activeness . '</h3>';
                $html .= '<h3 style="text-align:center;margin-top:-18px;margin-left:230px;z-index:50; font-family:Lora, serif; font-weight:600; font-size:22px; color:#543E36;">' . $vocabulary . '</h3>';
                $html .= '<h3 style="text-align:center;margin-top:-18px;margin-left:230px;z-index:50; font-family:Lora, serif; font-weight:600; font-size:22px; color:#543E36;">' . $grammar . '</h3>';
                $html .= '<h3 style="text-align:center;margin-top:-18px;margin-left:230px;z-index:50; font-family:Lora, serif; font-weight:600; font-size:22px; color:#543E36;">' . $fluency . '</h3>';
                $html .= '<h3 style="text-align:center;margin-top:-10px;margin-left:230px;z-index:50; font-family:Lora, serif; font-weight:600; font-size:22px; color:#543E36;">' . $score . '</h3>';
                $html .= '<img src="' . $qrcodeDataUri . '" style="background-color:red; width:80px; z-index:100; position:absolute; margin-top:50px; right:80px">';
                $html .= '</body></html>';

                $pdf = PDF::loadHTML($html);
                $filename = 'sertifikat_' . $nama . '.pdf';
            } elseif ($jenis == 'diklatver2') {
                $url = route('sertifikat.user', ['newsertif' => $datashow->slug, 'datas' => $sertifikat->slug]);
                $qrcodeDataUri = $this->getBase64QrCode($url);
                // Path menuju gambar template PNG
                $templateImage = public_path('templateSertif/' . $imgtemplate . '.jpg');


                $html = '<html><head>' . $googleFonts . '</head><body>';
                $html = '<img src="' . $templateImage . '" style="margin-top:-50px;margin-left:-50px;background-color:red;position:absolute; left:0px;max-width:115%; max-height:115%; z-index:10;" />';
                $html .= '<h3 style="text-align:center;margin-top:190px;z-index:50; font-family:Lora, serif; font-size:36px;">' . $nama . '</h3>';
                $html .= '<h5 style="text-align:center;margin-top:-30px;z-index:50; font-family:Lora, serif; font-size:30px;">' . $instansi . '</h5>';
                $html .= '<img src="' . $qrcodeDataUri . '" style="background-color:red; width:80px; z-index:100; position:absolute; margin-top:620px; right:150px">';


                $pdf = PDF::loadHTML($html);
                $filename = 'sertifikat_' . $nama . '.pdf';
            } elseif ($jenis == 'diklatver3') {
                $url = route('sertifikat.user', ['newsertif' => $datashow->slug, 'datas' => $sertifikat->slug]);
                $qrcodeDataUri = $this->getBase64QrCode($url);
                // Path menuju gambar template PNG
                $templateImage = public_path('templateSertif/' . $imgtemplate . '.jpg');


                $pembicara1 = $datashow->pembicara1;
                $materi1 = $datashow->materi1;
                $jp1 = $datashow->jp1;
                $ttd1 = $datashow->ttd1;
                $jabatan1 = $datashow->jabatan1;

                $pembicara2 = $datashow->pembicara2;
                $materi2 = $datashow->materi2;
                $jp2 = $datashow->jp2;
                $ttd1 = $datashow->ttd2;
                $jabatan1 = $datashow->jabatan2;

                $pembicara3 = $datashow->pembicara3;
                $materi3 = $datashow->materi3;
                $jp3 = $datashow->jp3;
                $ttd3 = $datashow->ttd3;
                $jabatan3 = $datashow->jabatan3;

                $pembicara4 = $datashow->pembicara4;
                $materi4 = $datashow->materi4;
                $jp4 = $datashow->jp4;
                $ttd4 = $datashow->ttd4;
                $jabatan4 = $datashow->jabatan4;


                $tanggaldibuat = $datashow->tanggaldibuat;



                $html = '<html><head>' . $googleFonts . '</head><body>';
                $html = '<img src="' . $templateImage . '" style="margin-top:-50px;margin-left:-50px;background-color:red;position:absolute; left:0px;max-width:115%; max-height:115%; z-index:10;" />';
                $html .= '<h3 style="text-align:center;margin-top:190px;z-index:50; font-family:Lora, serif; font-size:36px;">' . $nama . '</h3>';
                $html .= '<h5 style="text-align:center;margin-top:-30px;z-index:50; font-family:Lora, serif; font-size:30px;">' . $instansi . '</h5>';
                $html .= '<img src="' . $qrcodeDataUri . '" style="background-color:red; width:80px; z-index:100; position:absolute; margin-top:620px; right:150px">';


                $pdf = PDF::loadHTML($html);
                $filename = 'sertifikat_' . $nama . '.pdf';
            } elseif ($jenis == 'webinarpmm') {
                $url = route('sertifikat.user', ['newsertif' => $datashow->slug, 'datas' => $sertifikat->slug]);
                $qrcodeDataUri = $this->getBase64QrCode($url);
                // Path menuju gambar template PNG
                $templateImage = public_path('templateSertif/templatepmm.jpg');

                $tanggal = $datashow->tanggal;
                $nosertif = $datashow->nosertif;


                $pembicara = $datashow->pembicara1;
                $materi = $datashow->materi1;
                $jp = $datashow->jp1;
                $ttd = $datashow->ttd1;
                $jabatan = $datashow->jabatan1;
                $tanggaldibuat = $datashow->tanggaldibuat;

                $filepathimagettd = public_path('ttdNarsum/' . $ttd);
                if (file_exists($filepathimagettd)) {
                    $imagettd = $filepathimagettd;
                } else {
                    $imagettd = null;
                }

               


                $pdf = PDF::loadView('pdf.webinarpmm', compact('templateImage', 'nosertif', 'nama', 'instansi', 'editedjudul', 'tanggal', 'materi', 'jp', 'imagettd', 'pembicara', 'jabatan', 'tanggaldibuat', 'qrcodeDataUri'))->setPaper('A4', 'portrait');
                // $pdf = PDF::loadHTML($html);
                $filename = 'sertifikat_' . $nama . '.pdf';
            } elseif ($jenis == 'webinarenglish') {
                $url = route('sertifikat.user', ['newsertif' => $datashow->slug, 'datas' => $sertifikat->slug]);
                $qrcodeDataUri = $this->getBase64QrCode($url);
                // Path menuju gambar template PNG
                $templateImage = public_path('templateSertif/templateenglish.jpg');

                $tanggal = $datashow->tanggal;
                $nosertif = $datashow->nosertif;


                $pembicara = $datashow->pembicara1;
                $materi = $datashow->materi1;
                $jp = $datashow->jp1;
                $ttd = $datashow->ttd1;
                $jabatan = $datashow->jabatan1;
                $tanggaldibuat = $datashow->tanggaldibuat;

                $filepathimagettd = public_path('ttdNarsum/' . $ttd);
                if (file_exists($filepathimagettd)) {
                    $imagettd = $filepathimagettd;
                } else {
                    $imagettd = null;
                }




                $pdf = PDF::loadView('pdf.webinarenglish', compact('templateImage', 'nosertif', 'nama', 'instansi', 'editedjudul', 'tanggal', 'materi', 'jp', 'imagettd', 'pembicara', 'jabatan', 'tanggaldibuat', 'qrcodeDataUri'))->setPaper('A4', 'portrait');
                // $pdf = PDF::loadHTML($html);
                $filename = 'sertifikat_' . $nama . '.pdf';
            } elseif ($jenis == 'webinarcanva') {

                $url = route('sertifikat.user', ['newsertif' => $datashow->slug, 'datas' => $sertifikat->slug]);
                $qrcodeDataUri = $this->getBase64QrCode($url);
                // Path menuju gambar template PNG
                $templateImage = public_path('templateSertif/templatecanva.jpg');

                $tanggal = $datashow->tanggal;
                $nosertif = $datashow->nosertif;


                $pembicara = $datashow->pembicara1;
                $materi = $datashow->materi1;
                $jp = $datashow->jp1;
                $ttd = $datashow->ttd1;
                $jabatan = $datashow->jabatan1;
                $tanggaldibuat = $datashow->tanggaldibuat;

                $filepathimagettd = public_path('ttdNarsum/' . $ttd);
                if (file_exists($filepathimagettd)) {
                    $imagettd = $filepathimagettd;
                } else {
                    $imagettd = null;
                }

                



                $pdf = PDF::loadView('pdf.webinarenglish', compact('templateImage', 'nosertif', 'nama', 'instansi', 'editedjudul', 'tanggal', 'materi', 'jp', 'imagettd', 'pembicara', 'jabatan', 'tanggaldibuat', 'qrcodeDataUri'))->setPaper('A4', 'portrait');
                $filename = 'sertifikat_' . $nama . '.pdf';
            } elseif ($jenis == 'webinartim1') {
                $url = route('sertifikat.user', ['newsertif' => $datashow->slug, 'datas' => $sertifikat->slug]);
                $qrcodeDataUri = $this->getBase64QrCode($url);
                // Path menuju gambar template PNG
                $templateImage = public_path('templateSertif/templateenglish.jpg');

                $tanggal = $datashow->tanggal;
                $nosertif = $datashow->nosertif;


                $pembicara = $datashow->pembicara1;
                $materi = $datashow->materi1;
                $jp = $datashow->jp1;
                $ttd = $datashow->ttd1;
                $jabatan = $datashow->jabatan1;
                $tanggaldibuat = $datashow->tanggaldibuat;

                $filepathimagettd = public_path('ttdNarsum/' . $ttd);
                if (file_exists($filepathimagettd)) {
                    $imagettd = $filepathimagettd;
                } else {
                    $imagettd = null;
                }




                $pdf = PDF::loadView('pdf.webinarenglish', compact('templateImage', 'nosertif', 'nama', 'instansi', 'editedjudul', 'tanggal', 'materi', 'jp', 'imagettd', 'pembicara', 'jabatan', 'tanggaldibuat', 'qrcodeDataUri'))->setPaper('A4', 'portrait');
                // $pdf = PDF::loadHTML($html);
                $filename = 'sertifikat_' . $nama . '.pdf';
            } elseif ($jenis == 'webinargamifikasi') {
                $url = route('sertifikat.user', ['newsertif' => $datashow->slug, 'datas' => $sertifikat->slug]);
                $qrcodeDataUri = $this->getBase64QrCode($url);
                // Path menuju gambar template PNG
                $templateImage = public_path('templateSertif/templateenglish.jpg');

                $tanggal = $datashow->tanggal;
                $nosertif = $datashow->nosertif;


                $pembicara = $datashow->pembicara1;
                $materi = $datashow->materi1;
                $jp = $datashow->jp1;
                $ttd = $datashow->ttd1;
                $jabatan = $datashow->jabatan1;
                $tanggaldibuat = $datashow->tanggaldibuat;

                $filepathimagettd = public_path('ttdNarsum/' . $ttd);
                if (file_exists($filepathimagettd)) {
                    $imagettd = $filepathimagettd;
                } else {
                    $imagettd = null;
                }




                $pdf = PDF::loadView('pdf.webinarenglish', compact('templateImage', 'nosertif', 'nama', 'instansi', 'editedjudul', 'tanggal', 'materi', 'jp', 'imagettd', 'pembicara', 'jabatan', 'tanggaldibuat', 'qrcodeDataUri'))->setPaper('A4', 'portrait');
                // $pdf = PDF::loadHTML($html);
                $filename = 'sertifikat_' . $nama . '.pdf';
            }else {
                $url = route('sertifikat.user', ['newsertif' => $datashow->slug, 'datas' => $sertifikat->slug]);
                $qrcodeDataUri = $this->getBase64QrCode($url);
                // Path menuju gambar template PNG
                $templateImage = public_path('templateSertif/' . $tablename . '.jpg');

                $html = '<img src="' . $templateImage . '" style="margin-top:-50px;margin-left:-50px;background-color:red;position:absolute; left:0px;max-width:115%; max-height:115%;  z-index:10; " />';
                $html .= '<h3 style="text-align:center;margin-top:190px;z-index:50; font-family:poppins; font-size:36px;">' . $nama . '</h3>';
                $html .= '<h5 style="text-align:center;margin-top:-30px;z-index:50; font-family:poppins; font-size:30px;">' . $instansi . '</h5>';
                $html .= '<img src="' . $qrcodeDataUri . '" style="background-color:red; width:80px; z-index:100; position:absolute; margin-top:170px; right:10px">';


                $pdf = PDF::loadHTML($html);
                $filename = 'sertifikat_' . $nama . '.pdf';
            }



            // Mengatur header HTTP untuk nama file
            return $pdf->stream($filename, array('Attachment' => 0));
        } else {
            return "Sertifikat tidak ditemukan.";
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\newsertif  $newsertif
     * @return \Illuminate\Http\Response
     */
    public function edit(newsertif $newsertif)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatenewsertifRequest  $request
     * @param  \App\Models\newsertif  $newsertif
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatenewsertifRequest $request, newsertif $newsertif)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\newsertif  $newsertif
     * @return \Illuminate\Http\Response
     */
    public function destroy(newsertif $newsertif)
    {
        //
    }
}
