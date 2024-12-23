<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreEcourseRequest;
use App\Http\Requests\UpdateEcourseRequest;
use App\Models\Ecourse;
use App\Models\Ecoursetopik;
use App\Models\donasiecourse;
use App\Models\PembayaranEcourse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use PDF;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class EcourseController extends Controller
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
        $ecourse = Ecourse::paginate(9);
        return view('ecourse.home-ecourse', [
            "ecourse" => $ecourse,
            'title' => 'ecourse'
        ]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $dataDariShow = session('data_dari_show');

        $data = $request->validate([
            'image1' => 'image|file|max:1024',
        ]);

        if ($request->hasFile('image1')) {
            $imageRequest = $request->file('image1')->store('public/donasi');
            $imagePath = basename($imageRequest);
        } else {
            $imagePath = null;
        }
        $datadonasi = [
            'nama' => $request->input('nama'),
            'nomorwa' => $request->input('nomortelepon'),
            'email' => $request->input('email'),
            'judul' => $request->input('judul'),
            'bank' => $request->input('bank'),
            'bukti' => $imagePath,
            'nominal' => $request->input('nominal'),
        ];
        donasiecourse::insert($datadonasi);
        return redirect()->route('sertifikatecourse');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEcourseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEcourseRequest $request)
    {
        //

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ecourse  $ecourse
     * @return \Illuminate\Http\Response
     */
    public function show(Ecourse $ecourse)
    {

        session(['data_dari_show' => $ecourse]);
        $ecourse = Ecourse::with('Ecoursetopik.Ecoursevideo')->find($ecourse->id);
        //$ecourse = Ecourse::paginate(9);
        $EcourseLainnya = Ecourse::latest()->take(3)->get();
        $isAuthenticated = auth()->check();
        $pembayaran = null; // Default null jika belum login
        if (auth()->check()) {
            $pembayaran = auth()->user()->PembayaranEcourse->where('ecourse_id', $ecourse->id)->first();
        }
       


        return view('ecourse.home-konten-ecourse', compact('EcourseLainnya', 'isAuthenticated', 'pembayaran'), [
            "ecourse" => $ecourse,
            'title' => 'ecourse'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ecourse  $ecourse
     * @return \Illuminate\Http\Response
     */
    public function edit(Ecourse $ecourse)
    {
        return view('ecourse.home-konten-ecourse', [
            "ecourse" => $ecourse,
            'title' => 'ecourse'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEcourseRequest  $request
     * @param  \App\Models\Ecourse  $ecourse
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEcourseRequest $request, Ecourse $ecourse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ecourse  $ecourse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ecourse $ecourse)
    {
        //
    }


    public function cobatopik()
    {
        $topik = Ecoursetopik::paginate(9);
        return view('ecourse.coba-topik', [
            "topik" => $topik,
            'title' => 'ecourse'
        ]);
    }


    public function donasi()
    {
        $dataDariShow = session('data_dari_show');

        $harga = $dataDariShow->harga;
        function convertToInteger($value){
            $cleanedValue = str_replace(['Rp', '.', ','], '', $value);
            return intval($cleanedValue);
        }

        $hargaInteger = convertToInteger($harga);
        

        return view('ecourse.donasi', compact('dataDariShow', 'hargaInteger'), [

            'title' => 'Donasi'
        ]);
    }

    public function sertifikat()
    {
        $dataDariShow = session('data_dari_show');
        $EcourseLainnya = Ecourse::latest()->take(3)->get();

        return view('ecourse.sertifikat', compact('dataDariShow', 'EcourseLainnya'), []);
    }
    public function donwloadsertifikat()
    {
        $dataDariShow = session('data_dari_show');
        $nama = auth()->user()->namalengkap;
        $topik = $dataDariShow->judul;
        // dd($topik);

        // $url = route('sertifikat.user', ['newsertif' => $datashow->slug, 'datas' => $sertifikat->slug]);
        //         $qrcodeDataUri = $this->getBase64QrCode($url);

        $templateImage = public_path('templateSertif/' . 'ecourse' . '.jpg');

        $html = '<style>@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap");</style>';
        $html .= '<img src="' . $templateImage . '" style="margin-top:-50px;margin-left:-50px;background-color:red;position:absolute; left:0px;max-width:115%; max-height:115%;  z-index:10; " />';
        $html .= '<h3 style="margin-top:210px;margin-left:65px;z-index:50; font-family:Poppins, sans-serif; font-size:36px;">' . $topik . '</h3>';
        $html .= '<h3 style="margin-top:80px;margin-left:65px;z-index:50; font-family:Poppins, sans-serif; font-size:36px; color:#201379">' . $nama . '</h3>';

        // $html .= '<img src="' . $qrcodeDataUri . '" style="background-color:red; width:80px; z-index:100; position:absolute; margin-top:170px; right:10px">';


        $pdf = PDF::loadHTML($html)->setPaper([0, 0, 888, 631]);
        $filename = 'sertifikat_' . $nama . '.pdf';
        return $pdf->stream($filename, array('Attachment' => 0));
    }


    public function pembayaran(Ecourse $ecourse)
    {

        session(['data_dari_show' => $ecourse]);
        $ecourse = Ecourse::with('Ecoursetopik.Ecoursevideo')->find($ecourse->id);
        //$ecourse = Ecourse::paginate(9);
        $EcourseLainnya = Ecourse::latest()->take(3)->get();

        $pembayaran = auth()->user()->PembayaranEcourse->where('ecourse_id', $ecourse->id)->first();

        // Periksa apakah pembayaran ditemukan dan cek statusnya
        if ($pembayaran) {
            if ($pembayaran->status == 'belum') {
                return view('ecourse.prosespembayaran');
            } elseif ($pembayaran->status == 'sudah') {
                return view('ecourse.home-konten-ecourse', compact('EcourseLainnya'), [
                    'ecourse' => $ecourse,
                    'title' => 'ecourse'
                ]);
            }
        }

        // Jika tidak ada pembayaran atau statusnya tidak cocok, tampilkan halaman pembayaran
        return view('ecourse.pembayaran', compact('ecourse'));
    }

    public function createpembayaranecourse(Request $request)
    {
        $dataDariShow = session('data_dari_show');

        $user_id = Auth::id();

        $data = $request->validate([
            'image1' => 'image|file|max:1024',
        ]);

        if ($request->hasFile('image1')) {
            $destinationPath = public_path('pembayaranecourse');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            $file = $request->file('image1');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move($destinationPath, $imageName);
            $imagePath =  $imageName;
        } else {
            $imagePath = null;
        }

        $datadonasi = [
            'user_id' => $user_id,
            'ecourse_id' => $request->input('ecourse_id'),
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'nomerwa' => $request->input('nomortelepon'),
            'bank' => $request->input('bank'),
            'ecourse_judul' => $request->input('ecourse_judul'),
            'harga' => $request->input('harga'),
            'status' => $request->input('status'),
            'gambar' => $imagePath,
        ];

        PembayaranEcourse::insert($datadonasi);

        return redirect()->route('prosespembayaran');
    }

    public function prosespembayaran()
    {
        return view('ecourse.prosespembayaran');
    }

    public function prosesverifikasi()
    {
        return view('ecourse.prosesverifikasi');
    }


    public function registerecourse()
    {
        
        $dataDariShow = session('data_dari_show');
        $img = $dataDariShow->img;
        $slug = $dataDariShow->slug;

        // $img = "BelajarKesehatanMentalSupayaMeningkatkanSemangatBelajar";
        // $slug = "#";

        return view('ecourse.signup', compact('img', 'slug'), [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function signupstore(Request $request)
    { 
        
        $dataDariShow = session('data_dari_show');
        // dd($dataDariShow);
        $slug = $dataDariShow->slug;
        $validatedData = $request->validate([
            'username' => 'required|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:3|max:255',

            'namalengkap' => 'required|max:255',
            'nomortelepon' => 'required',
            'pekerjaan' => 'nullable',
            'instansi' => 'required'
            // 'username' => ['required', 'min:3', 'max:255', 'unique:users']
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::create($validatedData);


        Auth::login($user);


        return redirect()->route('ecourse.show', ['ecourse' => $slug])->with('success', 'Registrasi berhasil! Anda sudah login.');
    }

    public function loginecourse(Request $request)
    {
        $dataDariShow = session('data_dari_show');
        // dd($dataDariShow);
        $slug = $dataDariShow->slug;
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('ecourse.show', ['ecourse' => $slug])->with('success', 'Registrasi berhasil! Anda sudah login.');
        }

        return back()->with('loginError', 'Gagal Login');
    }
}
