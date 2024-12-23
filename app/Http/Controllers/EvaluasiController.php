<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Evaluasi;
use App\Models\newsertif;
use Illuminate\Support\Facades\File;
use App\Models\Formevaluasi;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEvaluasiRequest;
use App\Http\Requests\UpdateEvaluasiRequest;

class EvaluasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evaluasi = Evaluasi::all();
        return view('evaluasi.index', compact('evaluasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $dataDariShow = session('data_dari_show');





        $topik = $request->input('topik');
        if (is_array($topik)) {
            $topik = implode(',', $topik);
        }

        // $data = [
        //     'judul' => $request->input('judul'),
        //     'nama' => $request->input('nama'),
        //     'email' => $request->input('email'),
        //     'instansi' => $request->input('instansi'),
        //     'nomorwa' => $request->input('whatsapp'),
        //     'narasumber' => $pembicara,
        //     'nilaipanitia' => $request->input('nilaipanitia'),
        //     'topikdiminati' => $topik,
        //     'saran' => $request->input('saran'),
        // ];

        $formEvaluasi = new Formevaluasi();
        $formEvaluasi->id;
        $formEvaluasi->judul = $request->input('judul');
        $formEvaluasi->nama = $request->input('nama');
        $formEvaluasi->email = $request->input('email');
        $formEvaluasi->instansi = $request->input('instansi');
        $formEvaluasi->nomorwa = $request->input('whatsapp');
        $formEvaluasi->nilaipanitia = $request->input('nilaipanitia');
        $formEvaluasi->topikdiminati = $topik;
        $formEvaluasi->saran = $request->input('saran');
        $formEvaluasi->kebutuhanguru = $request->input('kebutuhanguru');

        // session(['data_dari_form' => $data]);
        session(['data_dari_form' => $formEvaluasi]);
        // Formevaluasi::insert($data);

        $formEvaluasi->save();

        return redirect('/donasikegiatannew');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEvaluasiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEvaluasiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evaluasi  $evaluasi
     * @return \Illuminate\Http\Response
     */
    public function show(Evaluasi $evaluasi)
    {
        session(['data_dari_show' => $evaluasi]);
        $kumpulantopik = json_decode($evaluasi->topik) ?? [];
        // dd($kumpulantopik);

        $retrieveEvent = Event::where('statuspelaksanaan', 1)
            ->orderBy('id')
            ->get();
        $isiEvent = $retrieveEvent->filter(function ($event) {
            $imagePath = public_path('pendaftaran/' . $event->image);
            return !empty($event->image) && File::exists($imagePath);
        })->random(2);

        return view('evaluasi.formevaluasi', [
            "evaluasi" => $evaluasi,
            "kumpulantopik" => $kumpulantopik,
            "isiEvent" => $isiEvent,
            'title' => 'Form Evaluasi'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evaluasi  $evaluasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Evaluasi $evaluasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEvaluasiRequest  $request
     * @param  \App\Models\Evaluasi  $evaluasi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEvaluasiRequest $request, Evaluasi $evaluasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evaluasi  $evaluasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evaluasi $evaluasi)
    {
        //
    }


    public function donasikegiatan()
    {
        $dataDariShow = session('data_dari_show');
        $dataDariForm = session('data_dari_form');
        $formEvaluasi = Formevaluasi::where('judul', $dataDariShow->judul)->first();

        return view('evaluasi.donasitim1', compact('dataDariShow', 'formEvaluasi', 'dataDariForm'));
    }

    public function tambahdatadonasi(Request $request)
    {
        $dataDariShow = session('data_dari_show');
        $dataDariForm = session('data_dari_form');

        $slug = $dataDariShow->slug;
        $newSlug = str_replace('evaluasi', 'sertifikat', $slug);
        $newslug2 = newsertif::where('slug', 'LIKE', $newSlug . '%')->get();
        $slugValue = $newslug2->first()->slug;
        // dd($slugValue);

        // dd($request->input('bank'));

        $data = $request->validate([
            'image1' => 'image|file|max:1024',
        ]);

        if ($request->hasFile('image1')) {
            $destinationPath = public_path('donasikegiatan');
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
            'bank' => $request->input('bank'),
            'nominal' => $request->input('nominal'),
            'buktitransfer' => $imagePath,
        ];

        Formevaluasi::updateOrCreate(
            ['id' => $dataDariForm['id']],
            $datadonasi
        );

        return redirect('/newsertifikat/' . $slugValue);
    }
}
