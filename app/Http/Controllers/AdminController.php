<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Pendaftarandiklat;
use App\Models\Pendaftaranworkshop;
use App\Models\newsertif;
use App\Models\revsertif;
use App\Models\Presensi;
use App\Models\formpresensi;
use App\Models\PembayaranEcourse;
use App\Models\Event;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\Evaluasi;
use App\Models\Formevaluasi;
use App\Models\isiContent;
use Illuminate\Support\Facades\Storage;



class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @param string $dateString
     *     @return string
     */
    function formatTanggal($dateString)
    {
        preg_match('/pendaftaran(\d+)-?(\d+)?([a-zA-Z]+)(\d+)/', $dateString, $matches);
        if (count($matches) >= 4) {
            $startDay = $matches[1];
            $endDay = isset($matches[2]) ? $matches[2] : null;
            $month = $matches[3];
            $year = $matches[4];

            $months = [
                'jan' => 'Januari', 'feb' => 'Februari', 'mar' => 'Maret', 'apr' => 'April',
                'mei' => 'Mei', 'jun' => 'Juni', 'jul' => 'Juli', 'agu' => 'Agustus',
                'sep' => 'September', 'okt' => 'Oktober', 'nov' => 'November', 'des' => 'Desember'
            ];

            $month = strtolower($month);

            if (array_key_exists($month, $months)) {
                $monthName = $months[$month];
                if ($endDay) {
                    return "$startDay-$endDay $monthName $year";
                } else {
                    return "$startDay $monthName $year";
                }
            }
        }

        return "Format tanggal tidak valid";
    }

    public function index()
    {
        $date = Carbon::now();
        $formattedDate = $date->isoFormat('D MMMM YYYY', 'Do MMMM YYYY');

        $jmlPendaftaran = Pendaftarandiklat::count();
        $jmlSertifikat = newsertif::count();
        $jmlRevSertifikat = revsertif::count();
        $jmlPresensi = Presensi::count();
        $jmlEcourse = PembayaranEcourse::where('status', 'belum')->count();

        return view('admin.index', compact('formattedDate', 'jmlPendaftaran', 'jmlSertifikat', 'jmlRevSertifikat', 'jmlPresensi', 'jmlEcourse'));
    }

    public function indexpendaftaran()
    {
        $pendaftarandiklat = Pendaftarandiklat::with('header')->get();
        return view('admin.pendaftaran.pendaftaran', compact('pendaftarandiklat'));
    }

    public function tambahpendaftaran()
    {
        return view('admin.pendaftaran.formtambahpendaftaran');
    }

    function tambahdatapendaftaran(Request $request)
    {
        // dd($request);
        $slug = $request->input('slug');
        $namatabel = str_replace("pendaftaran", "sertifikat", $slug);
        $slugevent = str_replace('pendaftaran', 'event', $slug);
        $slugsertif = str_replace('pendaftaran', 'sertifikat', $slug);
        $slugsertifrev = $slugsertif . 'rev';
        $slugeval = str_replace('pendaftaran', 'evaluasi', $slug);

        $randomsertif = Str::random(5);
        $randomrevsertif = Str::random(5);

        

        $fasilitas = $request->input('fasilitas');
        $kegiatan = $request->input('kegiatan');
        $jenis = $request->input('jenis');


        $tanggalevent = $this->formatTanggal($slug);


        Schema::create($slug, function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul');
            $table->string('nama');
            $table->string('instansi');
            $table->string('profesi');
            $table->string('email');
            $table->string('whatsapp');
            $table->string('provinsi');
            $table->string('bukti')->nullable();
            $table->string('bank')->nullable();
            $table->string('nominal')->nullable();
            $table->string('statuspembayaran')->nullable();
            $table->string('status')->nullable();
            $table->string('sudahpernah')->nullable();
            $table->string('informasi')->nullable();
            $table->string('sudahshare')->nullable();
            $table->string('sudahgabung')->nullable();
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();
            $table->string('image5')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });

        Schema::create($namatabel, function (Blueprint $table) use ($fasilitas, $kegiatan, $jenis) {
            $table->increments('id');
            $table->unsignedInteger('nomorpendaftaran')->unique()->nullable();
            $table->string('nama')->nullable();
            $table->string('instansi')->nullable();
            $table->string('slug')->nullable();
            $table->string('kegiatan')->default($kegiatan);
            $table->string('fasilitas')->default($fasilitas);
            $table->string('jenis')->default($jenis);
            $table->timestamps();
        });

        Schema::create($slugsertifrev, function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('nomorpendaftaran')->unique();
            $table->string('nama');
            $table->string('instansi');
            $table->string('slug');
            $table->string('kegiatan');
            $table->string('fasilitas');
            $table->string('jenis');
            $table->string('whatsapp');
            $table->string('email');
            $table->string('judul');
            $table->timestamps();
        });

        if ($request->hasFile('image1')) {
            $file = $request->file('image1');
            $originalName = $file->getClientOriginalName();
            $destinationPath = public_path('pendaftaran');
            $file->move($destinationPath, $originalName);
            $imagePath = $originalName;
        } else {
            $imagePath = null;
        }

        

        $data = [
            'judul' => $request->input('judul'),
            'slug' => $request->input('slug'),
            'header_id' => $request->input('header'),
            'kegiatan' => $request->input('kegiatan'),
            'fasilitas' => $request->input('fasilitas'),
            'jenis' => $request->input('jenis'),
            'tim' => $request->input('tim'),
            'pmm' => $request->input('pmm'),
            'telegram' => $request->input('telegram'),
            'linktree' => $request->input('linktree'),
            'dibuka' => $request->input('dibuka'),
            'image' => $imagePath,
            'createdby' => Auth::guard('admin')->user()->username,
            'lasteditedby' => Auth::guard('admin')->user()->username,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $dataevent = [
            'judul' => $request->input('judul'),
            'slug' => $slugevent,
            'tanggalpelaksanaan' => $tanggalevent,
            'jampelaksanaan' => $request->input('jam'),
            'link' => url('/pendaftaran/' . $slug),
            'image' => $imagePath,
            'statuspelaksanaan' => $request->input('dibuka'),
            'fasilitas' => $request->input('fasilitas'),
            'link_sertif' => url('/newsertifikat/' . $slugsertif),
            'telegram' => $request->input('telegram'),
            'linktree' => $request->input('linktree'),
            'createdby' => Auth::guard('admin')->user()->username,
            'lasteditedby' => Auth::guard('admin')->user()->username,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $datasertif = [
            'judul' => $request->input('judul'),
            'slug' => $slugsertif . $randomsertif,
            'header_id' => 3,
            'createdby' => Auth::guard('admin')->user()->username,
            'lasteditedby' => Auth::guard('admin')->user()->username,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $datasertifrev = [
            'judul' => $request->input('judul'),
            'slug' => $slugsertifrev,
            'slug2' => $slugsertifrev . $randomrevsertif,
            'kegiatan' => $request->input('judul'),
            'fasilitas' => $request->input('fasilitas'),
            'jenis' => $request->input('jenis'),
            'header_id' => 3,
            'dibuka' => $request->input('dibuka'),
            'createdby' => Auth::guard('admin')->user()->username,
            'lasteditedby' => Auth::guard('admin')->user()->username,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $dataseval = [
            'judul' => $request->input('judul'),
            'slug' => $slugeval,
            'pembicara1' => $request->input('pembicara1'),
            'pembicara2' => $request->input('pembicara2'),
            'pembicara3' => $request->input('pembicara3'),
            'pembicara4' => $request->input('pembicara4'),
            'jenis' => $request->input('tim'),
            'createdby' => Auth::guard('admin')->user()->username,
            'lasteditedby' => Auth::guard('admin')->user()->username,
            'created_at' => now(),
            'updated_at' => now(),
        ];





        // // dd($tanggalevent);

        Pendaftarandiklat::insert($data);
        Event::insert($dataevent);
        newsertif::insert($datasertif);
        revsertif::insert($datasertifrev);
        Evaluasi::insert($dataseval);

        session()->flash('success', 'Pendaftaran berhasil dibuat!');
        return redirect('/admin/pendaftaran');
    }

    public function hapusdatapendaftaran($id)
    {
        $pendaftaran = Pendaftarandiklat::findOrFail($id);

        $slug = $pendaftaran->slug;
        $namatabelsertif = str_replace("pendaftaran", "sertifikat", $slug);
        Schema::dropIfExists($slug);
        Schema::dropIfExists($namatabelsertif);

        if ($pendaftaran) {
            $pendaftaran->delete();
            session()->flash('success', 'Data pendaftaran berhasil dihapus!');
        } else {
            session()->flash('error', 'Data pendaftaran tidak ditemukan!');
        }

        return redirect('/admin/pendaftaran');
    }

    public function editpendaftaran($id)
    {
        $pendaftaran = Pendaftarandiklat::findOrFail($id);

        return view('admin.pendaftaran.formeditpendaftaran', compact('pendaftaran'));
    }

    public function editdatapendaftaran(Request $request, $id)
    {
        $pendaftaran = Pendaftarandiklat::find($id);


        if ($request->hasFile('image1')) {
            $file = $request->file('image1');
            $originalName = $file->getClientOriginalName();
            $destinationPath = public_path('pendaftaran');
            $file->move($destinationPath, $originalName);
            $imagePath = $originalName;
        } else {
            $imagePath = null;
        }


        $pendaftaran->judul = $request->input('judul');
        $pendaftaran->slug = $request->input('slug');
        $pendaftaran->header_id = $request->input('header');
        $pendaftaran->kegiatan = $request->input('kegiatan');
        $pendaftaran->fasilitas = $request->input('fasilitas');
        $pendaftaran->jenis = $request->input('jenis');
        $pendaftaran->pmm = $request->input('pmm');
        $pendaftaran->telegram = $request->input('telegram');
        $pendaftaran->linktree = $request->input('linktree');
        $pendaftaran->dibuka = $request->input('dibuka');
        $pendaftaran->image = $imagePath;
        $pendaftaran->lasteditedby = Auth::guard('admin')->user()->username;
        $pendaftaran->updated_at = now();

        $pendaftaran->save();


        return Redirect()->back()->with('success', 'Data berhasil diedit!');
    }

    public function downloaddatapendaftaran($id)
    {
        $pendaftaran = Pendaftarandiklat::findOrFail($id);

        $slug = $pendaftaran->slug;

        $data = DB::table($slug)->get();

        $filename = $slug . '.csv';
        $file = fopen($filename, 'w');
        fputcsv($file, array_keys((array) $data->first()));
        foreach ($data as $row) {
            fputcsv($file, (array) $row);
        }
        fclose($file);


        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Content-Type: application/octet-stream');
        header('Content-Length: ' . filesize($filename));
        readfile($filename);


        unlink($filename);
    }

    public function searchpendaftaran(Request $request)
    {

        $search = $request->input('search');

        $pendaftarandiklat = Pendaftarandiklat::where('judul', 'like', '%' . $search . '%')
            ->orWhere('slug', 'like', '%' . $search . '%')
            ->paginate(20)->withQueryString();

        return view('admin.pendaftaran.pendaftaran', compact('pendaftarandiklat', "search"));
    }


    public function hapusgambarpendaftaran($id){

        $pendaftaran = Pendaftarandiklat::find($id);
        
        if (!$pendaftaran) {
            return redirect()->back()->with('error', 'Data pendaftaran tidak ditemukan.');
        }

        if ($pendaftaran->image) {
            Storage::delete('pendaftaran/' . $pendaftaran->image);
            $pendaftaran->image = null;
            $pendaftaran->save();
        }

        return redirect()->back()->with('success', 'Gambar berhasil dihapus');
    }


    //event
    public function indexevent()
    {
        $events = Event::get();
        return view('admin.event.event', compact('events'));
    }


    public function tambahevent()
    {
        return view('admin.event.formtambahevent');
    }

    public function tambahdataevent(Request $request)
    {

        $slug = $request->input('slug');
        $slugevaluasi = str_replace('event', 'evaluasi', $slug);
        $slugpendaftaran = str_replace('event', 'pendaftaran', $slug);

        $tanggalevent = $this->formatTanggal($slug);

        if ($request->hasFile('image1')) {
            $file = $request->file('image1');
            $originalName = $file->getClientOriginalName();
            $destinationPath = public_path('pendaftaran');
            $file->move($destinationPath, $originalName);
            $imagePath = $originalName;
        } else {
            $imagePath = null;
        }

        $data = [
            'judul' => $request->input('judul'),
            'slug' => $slug,
            'tanggalpelaksanaan' => $tanggalevent,
            'jampelaksanaan' => $request->input('jam'),
            'link' => url('/pendaftaran/' . $slugpendaftaran),
            'image' => $imagePath,
            'statuspelaksanaan' => $request->input('dibuka'),
            'fasilitas' => $request->input('fasilitas'),
            'link_sertif' => url('/evaluasi/' . $slugevaluasi),
            'telegram' => $request->input('telegram'),
            'linktree' => $request->input('linktree'),
            'created_at' => now(),
            'updated_at' => now(),
        ];

        Event::insert($data);

        session()->flash('success', 'Evaluasi berhasil dibuat!');
        return redirect('/admin/event');
    }

    public function editevent($id){
        $event = Event::findOrFail($id);

        return view('admin.event.formeditevent', compact('event'));
    }

    public function editdataevent(Request $request, $id)
    {
        
        $event = Event::find($id);

        $slug = $request->input('slug');
        $slugevaluasi = str_replace('event', 'evaluasi', $slug);
        $slugpendaftaran = str_replace('event', 'pendaftaran', $slug);

        $tanggalevent = $this->formatTanggal($slug);
        // dd($slug);

        
        if ($request->hasFile('image1')) {
            $file = $request->file('image1');
            $originalName = $file->getClientOriginalName();
            $destinationPath = public_path('pendaftaran');
            $file->move($destinationPath, $originalName);
            $imagePath = $originalName;
        } else {
            $imagePath = null;
        }

        $event->judul = $request->input('judul');
        $event->slug = $request->input('slug');
        // $event->tanggalpelaksaan = $tanggalevent;
        $event->jampelaksanaan = $request->input('jam');
        $event->link = url('/pendaftaran/' . $slugpendaftaran);
        $event->image = $imagePath;
        $event->statuspelaksanaan = $request->input('dibuka');
        $event->fasilitas = $request->input('fasilitas');
        $event->link_sertif = url('/evaluasi/' . $slugevaluasi);
        $event->telegram = $request->input('telegram');
        $event->linktree = $request->input('linktree');
        
        $event->lasteditedby = Auth::guard('admin')->user()->username;
        $event->updated_at = now();

        
        $event->save();


        return Redirect()->back()->with('success', 'Data berhasil diedit!');
    }

    public function searchevent(Request $request){
        $search = $request->input('search');

        $events = Event::where('judul', 'like', '%' . $search . '%')
            ->orWhere('slug', 'like', '%' . $search . '%')
            ->paginate(20)->withQueryString();

        return view('admin.event.event', compact('events'));
    }

    public function hapusdataevent($id)
    {
        $event = Event::findOrFail($id);

        

        if ($event) {
            $event->delete();
            session()->flash('success', 'Data evaluasi berhasil dihapus!');
        } else {
            session()->flash('error', 'Data evaluasi tidak ditemukan!');
        }

        return redirect('/admin/event');
    }

    public function indexevaluasi()
    {
        $evaluasi = Evaluasi::orderBy('created_at', 'desc')->paginate(20);

        foreach ($evaluasi as $eval) {
            $eval->jumlah_data = FormEvaluasi::where('judul', $eval->judul)->count();
        }
        
        // $evaluasi = Evaluasi::withCount(['formEvaluasi as jumlah_data' => function ($query) {
        //     $query->select(DB::raw('count(*)'));
        // }])->orderBy('created_at', 'desc')->paginate(20);

        return view('admin.evaluasi.evaluasi', compact('evaluasi'));
    }

    public function tambahevaluasi()
    {
        return view('admin.evaluasi.formtambahevaluasi');
    }

    public function tambahdataevaluasi(Request $request)
    {
        $data = [
            'judul' => $request->input('judul'),
            'slug' => $request->input('slug'),
            'jenis' => $request->input('jenis'),
            'pembicara1' => $request->input('pembicara1'),
            'pembicara2' => $request->input('pembicara2'),
            'pembicara3' => $request->input('pembicara3'),
            'pembicara4' => $request->input('pembicara4'),
        ];

        Evaluasi::insert($data);

        session()->flash('success', 'Evaluasi berhasil dibuat!');
        return redirect('/admin/evaluasi');
    }

    public function editevaluasi($id)
    {
        $evaluasi = Evaluasi::findOrFail($id);

        return view('admin.evaluasi.formeditevaluasi', compact('evaluasi'));
    }


    public function editdataevaluasi(Request $request, $id)
    {
        $evaluasi = Evaluasi::find($id);

        $topik = json_decode($request->input('topik'), true);
        
    
        $topik_values = [];
        if (is_array($topik)) {
            $topik_values = array_map(function($tag) {
                return $tag['value'];
            }, $topik);
        }
        $evaluasi->judul = $request->input('judul');
        $evaluasi->slug = $request->input('slug');
        $evaluasi->jenis = $request->input('jenis');
        $evaluasi->topik = $topik_values;
        $evaluasi->lasteditedby = Auth::guard('admin')->user()->username;
        $evaluasi->updated_at = now();

        $evaluasi->save();


        return Redirect()->back()->with('success', 'Data berhasil diedit!');
    }

    public function hapusdataevaluasi($id)
    {
        $evaluasi = Evaluasi::findOrFail($id);

        

        if ($evaluasi) {
            $evaluasi->delete();
            session()->flash('success', 'Data evaluasi berhasil dihapus!');
        } else {
            session()->flash('error', 'Data evaluasi tidak ditemukan!');
        }

        return redirect('/admin/evaluasi');
    }

    public function downloaddataevaluasi($id)
    {
        $evaluasi = Evaluasi::findOrFail($id);
        $judul = $evaluasi->judul;
        $data = Formevaluasi::where('judul', $judul)->get();
    
        $filename =  $judul . '.csv';
    
        $file = fopen($filename, 'w');
    
        
        $headers = array_keys($data->first()->toArray());
        fputcsv($file, $headers);
    
        foreach ($data as $row) {
           
            $rowArray = $row->toArray();
    
            
            foreach ($rowArray as $key => $value) {
                if (is_array($value) || is_object($value)) {
                    $rowArray[$key] = json_encode($value);
                }
            }
    
            fputcsv($file, $rowArray);
        }
        fclose($file);
    
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Content-Type: application/octet-stream');
        header('Content-Length: ' . filesize($filename));
        readfile($filename);
    
        unlink($filename);
    
    }


    public function showisievaluasi(Evaluasi $evaluasi){
      
        session(['data_dari_show' => $evaluasi]);
        
        $dataformevaluasi = Formevaluasi::where('judul', $evaluasi->judul)->paginate(25);
        // dd($dataform);


        return view('admin.evaluasi.isievaluasi', [
            "dataformevaluasi" => $dataformevaluasi,
            'evaluasi' => $evaluasi,
            'dataDariShow' => $evaluasi,
            'title' => 'Isi Form Evaluasi']);
    }
    public function searchevaluasi(Request $request)
    {
        $dataDariShow = session('data_dari_show');

        // Pastikan session berhasil diambil
        if (!$dataDariShow) {
            return redirect()->route('showisi')->withErrors('Data tidak tersedia di session');
        }
    
        $judul = $dataDariShow->judul;
        $slug = $dataDariShow->slug;
        
        $search = $request->input('search');
    
        $dataformevaluasi = Formevaluasi::where('judul', $judul)
            ->where(function($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%')
                      ->orWhere('instansi', 'like', '%' . $search . '%');
            })
            ->paginate(20)
            ->withQueryString();
    
        return view('admin.evaluasi.isievaluasi', compact('dataformevaluasi', 'search', 'dataDariShow', 'slug'));
    }

    

    public function showchartevaluasi(Evaluasi $evaluasi){
        session(['data_dari_show' => $evaluasi]);

        // Ambil data form evaluasi dan hitung total di satu query
        $dataformevaluasi = Formevaluasi::where('judul', $evaluasi->judul)->get();
        $jumlahdataevaluasi = $dataformevaluasi->count();
    
        $slugevaluasi = $evaluasi->slug;
        $slugpendaftaran = str_replace('evaluasi', 'pendaftaran', $slugevaluasi);
        $jumlahdatapendaftaran = DB::table($slugpendaftaran)->count();

        // Menghitung presentase
        $presentase = $jumlahdatapendaftaran > 0 ? ($jumlahdataevaluasi / $jumlahdatapendaftaran) * 100 : 0;
        $formatpresentase = number_format($presentase, 1);

        // Menghitung frekuensi topik diminati
        $allTopikArray = $dataformevaluasi->flatMap(function ($item) {
            return array_filter(array_map('trim', explode(',', $item->topikdiminati)));
        })->toArray();

        $frekuensi = array_count_values($allTopikArray);
        arsort($frekuensi);
        $top3topik = array_slice($frekuensi, 0, 3, true);

        // Menghitung nilai dan frekuensi bank
        $nilai = $dataformevaluasi->pluck('nilaipanitia')->toArray();
        $meannilai = count($nilai) > 0 ? array_sum($nilai) / count($nilai) : 0;
        $formatmeannilai = number_format($meannilai, 1);
    
        $frekuensibank = array_count_values(array_filter($dataformevaluasi->pluck('bank')->toArray()));
        $labelbank = array_keys($frekuensibank);
        $databank = array_values($frekuensibank);

        // Mengolah nominal
        $nominalInt = $dataformevaluasi->pluck('nominal')->map(function ($value) {
            return $value ? (int) preg_replace('/[^\d]/', '', explode(',', $value)[0]) : null;
        })->filter()->values()->toArray();

        $totalnominal = array_sum($nominalInt);
        $formattotalnominal = number_format($totalnominal, 0, ',', '.');
        $jumlahdonasi = count($nominalInt);
        $rataratadonasi = $jumlahdonasi > 0 ? $totalnominal / $jumlahdonasi : 0;
        $formatrataratadonasi = number_format($rataratadonasi, 0, ',', '.');
        $presentasenominal = $jumlahdatapendaftaran > 0 ? ($jumlahdonasi / $jumlahdatapendaftaran) * 100 : 0;
        $formatpresentasenominal = number_format($presentasenominal, 1);

        return view('admin.evaluasi.chartevaluasi', [
            'jumlahdataevaluasi' => $jumlahdataevaluasi,
            'jumlahdatapendaftaran' => $jumlahdatapendaftaran,
            'presentase' => $formatpresentase,
            'dataformevaluasi' => $dataformevaluasi,
            'dataevaluasi' => $evaluasi,
            'labels' => array_keys($frekuensi),
            'data' => array_values($frekuensi),
            'top3topik' => $top3topik,
            'nilai' => $nilai,
            'labelnilai' => [1, 2, 3, 4, 5],
            'meannilai' => $formatmeannilai,
            'labelbank' => $labelbank,
            'databank' => $databank,
            'totalnominal' => $formattotalnominal,
            'jumlahdonasi' => $jumlahdonasi,
            'rataratadonasi' => $formatrataratadonasi,
            'presentasenominal' => $formatpresentasenominal,
            'title' => 'Data Chart Evaluasi'
        ]);
    }

    public function indexsertifikat()
    {
        $sertifikat = newsertif::with('header')->get();
        return view('admin.sertifikat.sertifikat', compact('sertifikat'));
    }

    public function searchsertifikat(Request $request)
    {

        $search = $request->input('search');

        $sertifikat = newsertif::where('judul', 'like', '%' . $search . '%')
            ->orWhere('slug', 'like', '%' . $search . '%')
            ->paginate(20)->withQueryString();

        return view('admin.sertifikat.sertifikat', compact('sertifikat'));
    }

    public function tambahsertifikat()
    {
        return view('admin.sertifikat.formtambahsertifikat');
    }


    public function tambahdatasertifikat(Request $request)
    {
        // dd($request->dibuka);


        if ($request->hasFile('image1')) {
            $file = $request->file('image1');
            $originalName = $file->getClientOriginalName();
            $destinationPath = public_path('ttdNarsum');
            $file->move($destinationPath, $originalName);
            $imagePath1 = $originalName;
        } else {
            $imagePath1 = null;
        }

        if ($request->hasFile('image2')) {
            $file = $request->file('image2');
            $originalName = $file->getClientOriginalName();
            $destinationPath = public_path('ttdNarsum');
            $file->move($destinationPath, $originalName);
            $imagePath2 = $originalName;
        } else {
            $imagePath2 = null;
        }

        if ($request->hasFile('image3')) {
            $file = $request->file('image3');
            $originalName = $file->getClientOriginalName();
            $destinationPath = public_path('ttdNarsum');
            $file->move($destinationPath, $originalName);
            $imagePath3 = $originalName;
        } else {
            $imagePath3 = null;
        }

        if ($request->hasFile('image4')) {
            $file = $request->file('image4');
            $originalName = $file->getClientOriginalName();
            $destinationPath = public_path('ttdNarsum');
            $file->move($destinationPath, $originalName);
            $imagePath4 = $originalName;
        } else {
            $imagePath4 = null;
        }

        $data = [
            'judul' => $request->input('judul'),
            'slug' => $request->input('slug'),
            'header_id' => $request->input('header'),
            'materi1' => $request->input('materi1'),
            'pembicara1' => $request->input('pembicara1'),
            'jp1' => $request->input('jp1'),
            'ttd1' => $imagePath1,
            'materi2' => $request->input('materi2'),
            'pembicara2' => $request->input('pembicara2'),
            'jp2' => $request->input('jp2'),
            'ttd2' => $imagePath2,
            'materi3' => $request->input('materi3'),
            'pembicara3' => $request->input('pembicara3'),
            'jp3' => $request->input('jp3'),
            'ttd3' => $imagePath3,
            'materi4' => $request->input('materi4'),
            'pembicara4' => $request->input('pembicara4'),
            'jp4' => $request->input('jp4'),
            'ttd4' => $imagePath4,
        ];

        newsertif::insert($data);

        session()->flash('success', 'Sertifikat berhasil dibuat!');
        return redirect('/admin/sertifikat');
    }


    public function hapusdatasertifikat($id)
    {
        $sertifikat = newsertif::findOrFail($id);



        if ($sertifikat) {
            $sertifikat->delete();
            session()->flash('success', 'Data sertifikat berhasil dihapus!');
        } else {
            session()->flash('error', 'Data sertifikat tidak ditemukan!');
        }

        return redirect('/admin/sertifikat');
    }

    public function editsertifikat($id)
    {
        $sertifikat = newsertif::findOrFail($id);
        $slugSertif = $sertifikat->slug;
        $slugSertifFinal = str_replace('sertifikat', 'pendaftaran', $slugSertif);
        $slugSertifFinal = substr($slugSertifFinal, 0, -5);
   
        $pendaftarandiklat = Pendaftarandiklat::where('judul', 'like', '%' . $slugSertifFinal . '%')
            ->orWhere('slug', 'like', '%' . $slugSertifFinal . '%')->first();
        $jenis = $pendaftarandiklat->jenis;
        

        return view('admin.sertifikat.formeditsertifikat', compact('sertifikat', 'jenis'));
    }

    public function editdatasertifikat(Request $request, $id)
    {
        $sertifikat = newsertif::find($id);

        if ($request->hasFile('image1')) {
            $file = $request->file('image1');
            $originalName = $file->getClientOriginalName();
            $destinationPath = public_path('ttdNarsum');
            $file->move($destinationPath, $originalName);
            $imagePath1 = $originalName;
        } else {
            $imagePath1 = null;
        }

        if ($request->hasFile('image2')) {
            $file = $request->file('image2');
            $originalName = $file->getClientOriginalName();
            $destinationPath = public_path('ttdNarsum');
            $file->move($destinationPath, $originalName);
            $imagePath2 = $originalName;
        } else {
            $imagePath2 = null;
        }

        if ($request->hasFile('image3')) {
            $file = $request->file('image3');
            $originalName = $file->getClientOriginalName();
            $destinationPath = public_path('ttdNarsum');
            $file->move($destinationPath, $originalName);
            $imagePath3 = $originalName;
        } else {
            $imagePath3 = null;
        }

        if ($request->hasFile('image4')) {
            $file = $request->file('image4');
            $originalName = $file->getClientOriginalName();
            $destinationPath = public_path('ttdNarsum');
            $file->move($destinationPath, $originalName);
            $imagePath4 = $originalName;
        } else {
            $imagePath4 = null;
        }





        $sertifikat->judul = $request->input('judul');
        $sertifikat->slug = $request->input('slug');
        $sertifikat->header_id = $request->input('header');
        $sertifikat->tanggal = $request->input('tanggal');
        $sertifikat->nosertif = $request->input('nosertif');

        $sertifikat->materi1 = $request->input('materi1');
        $sertifikat->pembicara1 = $request->input('pembicara1');
        $sertifikat->jabatan1 = $request->input('jabatan1');
        $sertifikat->jp1 = $request->input('jp1');
        $sertifikat->ttd1 = $imagePath1;

        $sertifikat->materi2 = $request->input('materi2');
        $sertifikat->pembicara2 = $request->input('pembicara2');
        $sertifikat->jabatan2 = $request->input('jabatan2');
        $sertifikat->jp2 = $request->input('jp2');
        $sertifikat->ttd2 = $imagePath2;

        $sertifikat->materi3 = $request->input('materi3');
        $sertifikat->pembicara3 = $request->input('pembicara3');
        $sertifikat->jabatan3 = $request->input('jabatan3');
        $sertifikat->jp3 = $request->input('jp3');
        $sertifikat->ttd3 = $imagePath3;

        $sertifikat->materi4 = $request->input('materi4');
        $sertifikat->pembicara4 = $request->input('pembicara4');
        $sertifikat->jabatan4 = $request->input('jabatan4');
        $sertifikat->jp4 = $request->input('jp4');
        $sertifikat->ttd4 = $imagePath4;

        $sertifikat->tanggaldibuat = $request->input('tanggaldibuat');

        $sertifikat->lasteditedby = Auth::guard('admin')->user()->username;
        $sertifikat->updated_at = now();


        $sertifikat->save();


        return Redirect()->back()->with('success', 'Data berhasil diedit!');
    }

    public function downloaddatasertifikat($id)
    {
        $sertifikat = newsertif::findOrFail($id);
        $slug = $sertifikat->slug;
        $data = DB::table($slug)->get();



        $filename =  $slug . '.csv';

        $file = fopen($filename, 'w');
        fputcsv($file, array_keys((array) $data->first()));
        foreach ($data as $row) {
            fputcsv($file, (array) $row);
        }
        fclose($file);




        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Content-Type: application/octet-stream');
        header('Content-Length: ' . filesize($filename));
        readfile($filename);


        unlink($filename);
    }

    public function indexrevsertifikat()
    {
        $revsertifikat = revsertif::with('header')->get();
        return view('admin.revsertif.revsertif', compact('revsertifikat'));
    }

    public function searchrevsertifikat(Request $request)
    {

        $search = $request->input('search');

        $revsertifikat = revsertif::where('judul', 'like', '%' . $search . '%')
            ->orWhere('slug', 'like', '%' . $search . '%')
            ->paginate(20)->withQueryString();

        return view('admin.revsertif.revsertif', compact('revsertifikat'));
    }

    public function tambahrevsertifikat()
    {
        return view('admin.revsertif.formtambahrevsertif');
    }

    public function tambahdatarevsertifikat(Request $request)
    {
        // dd($request->dibuka);
        $slug = $request->input('slug');


        Schema::create($slug, function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomorpendaftaran');
            $table->string('nama');
            $table->string('instansi');
            $table->string('slug');
            $table->string('kegiatan');
            $table->string('fasilitas');
            $table->string('jenis');
            $table->string('whatsapp');
            $table->string('email');
            $table->string('judul');
            $table->timestamps();
        });



        $data = [
            'judul' => $request->input('judul'),
            'slug' => $request->input('slug'),
            'header_id' => $request->input('header'),
            'kegiatan' => $request->input('kegiatan'),
            'fasilitas' => $request->input('fasilitas'),
            'jenis' => $request->input('jenis'),
            'dibuka' => $request->input('dibuka')
        ];

        revsertif::insert($data);

        session()->flash('success', 'Halaman Revisi Sertifikat berhasil dibuat!');
        return redirect('/admin/revsertifikat');
    }

    public function hapusdatarevsertifikat($id)
    {
        $revsertifikat = revsertif::findOrFail($id);

        $slug = $revsertifikat->slug;

        Schema::dropIfExists($slug);


        if ($revsertifikat) {
            $revsertifikat->delete();
            session()->flash('success', 'Data revisi sertifikat berhasil dihapus!');
        } else {
            session()->flash('error', 'Data revisi sertifikat tidak ditemukan!');
        }

        return redirect('/admin/revsertifikat');
    }

    public function editrevsertifikat($id)
    {
        $revsertifikat = revsertif::findOrFail($id);

        return view('admin.revsertif.formeditrevsertif', compact('revsertifikat'));
    }

    public function editdatarevsertifikat(Request $request, $id)
    {
        $revsertifikat = revsertif::find($id);

        $revsertifikat->judul = $request->input('judul');
        $revsertifikat->slug = $request->input('slug');
        $revsertifikat->header_id = $request->input('header');
        $revsertifikat->kegiatan = $request->input('kegiatan');
        $revsertifikat->fasilitas = $request->input('fasilitas');
        $revsertifikat->jenis = $request->input('jenis');
        $revsertifikat->dibuka = $request->input('dibuka');
        $revsertifikat->lasteditedby = Auth::guard('admin')->user()->username;
        $revsertifikat->updated_at = now();

        $revsertifikat->save();


        return Redirect()->back()->with('success', 'Data berhasil diedit!');
    }


    public function downloaddatarevsertifikat($id)
    {
        $revsertifikat = revsertif::findOrFail($id);

        $slug = $revsertifikat->slug;

        $data = DB::table($slug)->get();

        $filename = $slug . '.csv';
        $file = fopen($filename, 'w');
        fputcsv($file, array_keys((array) $data->first()));
        foreach ($data as $row) {
            fputcsv($file, (array) $row);
        }
        fclose($file);


        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Content-Type: application/octet-stream');
        header('Content-Length: ' . filesize($filename));
        readfile($filename);


        unlink($filename);
    }

    public function tambahdatarevisi(revsertif $revsertif){
        session(['data_dari_show' => $revsertif]);
        // dd($revsertif);

        if ($revsertif->dibuka === 1){
            return view('revsertif.formrevisi', [
                "revsertif" => $revsertif,
                'title' => 'Revisi Sertifikat'
            ]);
        }
        else{
            return view('revsertif.ditutup',[
                "revsertif" => $revsertif,
                'title' => 'Revisi Sertifikat'
            ]);
        }
    }


    public function indexpresensi()
    {
        $presensi = Presensi::with('header')->get();
        return view('admin.presensi.presensi', compact('presensi'));
    }

    public function searchpresensi(Request $request)
    {

        $search = $request->input('search');

        $presensi = Presensi::where('judul', 'like', '%' . $search . '%')
            ->orWhere('slug', 'like', '%' . $search . '%')
            ->paginate(20)->withQueryString();

        return view('admin.presensi.presensi', compact('presensi'));
    }

    public function tambahpresensi()
    {
        return view('admin.presensi.formtambahpresensi');
    }


    public function tambahdatapresensi(Request $request)
    {
        // dd($request->dibuka);

        $request->validate([
            'dibuka' => 'required|integer|in:0,1',
            
        ]);


        $data = [
            'judul' => $request->input('judul'),
            'slug' => $request->input('slug'),
            'header_id' => $request->input('header'),
            'dibuka' => $request->has('dibuka') ? $request->input('dibuka') : 0,
            'jenis' => $request->input('jenis'),
            'telegram' => $request->input('telegram')

        ];

        Presensi::insert($data);

        session()->flash('success', 'Sertifikat berhasil dibuat!');
        return redirect('/admin/presensi');
    }


    public function hapusdatapresensi($id)
    {
        $presensi = Presensi::findOrFail($id);



        if ($presensi) {
            $presensi->delete();
            session()->flash('success', 'Data presensi berhasil dihapus!');
        } else {
            session()->flash('error', 'Data presensi tidak ditemukan!');
        }

        return redirect('/admin/presensi');
    }

    public function editpresensi($id)
    {
        $presensi = Presensi::findOrFail($id);

        return view('admin.presensi.formeditpresensi', compact('presensi'));
    }

    public function editdatapresensi(Request $request, $id)
    {
        $presensi = Presensi::find($id);

        $presensi->judul = $request->input('judul');
        $presensi->slug = $request->input('slug');
        $presensi->header_id = $request->input('header');
        $presensi->dibuka = $request->input('dibuka');
        $presensi->jenis = $request->input('jenis');
        $presensi->telegram = $request->input('telegram');
        $presensi->lasteditedby = Auth::guard('admin')->user()->username;
        $presensi->updated_at = now();



        $presensi->save();


        return Redirect()->back()->with('success', 'Data berhasil diedit!');
    }

    public function downloaddatapresensi($id)
    {
        $presensi = Presensi::findOrFail($id);
        $judul = $presensi->judul;
        $data = formpresensi::where('judul', $judul)->get();

        $filename = $judul . '.csv';

        $file = fopen($filename, 'w');
        fputcsv($file, array_keys($data->first()->toArray())); // Menggunakan toArray()
        foreach ($data as $row) {
            fputcsv($file, $row->toArray()); // Menggunakan toArray()
        }
        fclose($file);

        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Content-Type: application/octet-stream');
        header('Content-Length: ' . filesize($filename));
        readfile($filename);

        unlink($filename);
    }


    public function ticykitworksheet(){
        $worksheet = isiContent::paginate(25);
        return view('admin.ticykit.worksheet.worksheet', compact('worksheet'));
    }
    public function tambahworksheet()
    {
        return view('admin.ticykit.worksheet.formtambahworksheet');
    }

    function tambahdataworksheet(Request $request)
    {   
        $title = $request->judul;
        $latestId = isiContent::latest('id')->first()->id ?? 0;
        $slug = Str::slug($title). '-' . ($latestId + 1);
        $category = "worksheet";
        $kelas = $request->kelas;
        $matapelajaran = $request->matapelajaran;
        if ($request->hasFile('image1')) {
            $file = $request->file('image1');
            $originalName = $slug . '.webp';
            $destinationPath = public_path('img');
            $file->move($destinationPath, $originalName);
            $imagePath = $originalName;
        } else {
            $imagePath = null;
        }

        if ($request->hasFile('file1')) {
            $file = $request->file('file1');
            $originalName = $slug . '.pdf';
            $destinationPath = public_path('file');
            $file->move($destinationPath, $originalName);
            $pdffile = $originalName;
        } else {
            $pdffile = null;
        }


        $data = [
            'title' => $title,
            'slug' => $slug,
            'category' => $category,
            'kelas' => $kelas,
            'matapelajaran' => $matapelajaran,
            'image' => $imagePath,
            'file' => $pdffile,
            'createdby' => Auth::guard('admin')->user()->username,
            'lasteditedby' => Auth::guard('admin')->user()->username,
            'created_at' => now(),
            'updated_at' => now(),
        ];
        isiContent::insert($data);
        return redirect('/admin/ticykitworksheet');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }






    ///LOGIN SYSTEM
    public function showLogin()
    {
        return view('admin.formlogin');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('/admin');
        }

        return back()->with('loginError', 'Username atau Password Tidak Cocok.');
    }



    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect('/admin');
    }
}
