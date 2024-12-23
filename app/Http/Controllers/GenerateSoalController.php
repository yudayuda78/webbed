<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGenerateSoalRequest;
use App\Http\Requests\UpdateGenerateSoalRequest;
use App\Models\GenerateSoal;
use App\Models\PertanyaanGenerateSoal;
use App\Models\JawabanGenerateSoal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;




class GenerateSoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('generatesoal.generatesoalindex', [
            
            'title' => 'Generate Soal'
        ]);
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
     * @param  \App\Http\Requests\StoreGenerateSoalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Data untuk tabel 'generatesoal'
        $datageneratesoal = [
            'slug' => $request->input('judul'),
            'judul' => $request->input('judul'),
            'user_id' => $request->input('user_id'),
            'description' => $request->input('description'),
            'created_at' => now(),
            'updated_at' => now(),
        ];

        // Simpan data generatesoal dan ambil ID-nya
        $generateSoal = GenerateSoal::create($datageneratesoal);
        $generateSoalId = $generateSoal->id;

        // Iterasi untuk menyimpan pertanyaan dan jawaban
        foreach ($request->input('questions') as $questionData) {
            $datapertanyaangeneratesoal = [
                'generatesoal_id' => $generateSoalId,
                'pertanyaan' => $questionData['question_text'],
                'created_at' => now(),
                'updated_at' => now(),
            ];

            // Simpan data pertanyaan dan ambil ID-nya
            $pertanyaan = PertanyaanGenerateSoal::create($datapertanyaangeneratesoal);
            $pertanyaanId = $pertanyaan->id;

            // Simpan jawaban untuk setiap pertanyaan
            foreach ($questionData['answers'] as $answerData) {
                $datajawabangeneratesoal = [
                    'pertanyaan_id' => $pertanyaanId,
                    'jawaban' => $answerData['answer_text'],
                    'is_correct' => isset($answerData['is_correct']) ? 1 : 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                JawabanGenerateSoal::create($datajawabangeneratesoal);
            }
        }

        // Redirect atau kirim response
        return redirect()->back()->with('success', 'Quiz berhasil disimpan.');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GenerateSoal  $generateSoal
     * @return \Illuminate\Http\Response
     */
    public function show(GenerateSoal $generateSoal)
    {
        $pertanyaans = $generateSoal->pertanyaangeneratesoals()->with('jawabangeneratesoal')->get();

        return view('generatesoal.generatesoalshow',[
            'generateSoal' => $generateSoal,
            'pertanyaans' => $pertanyaans,
            'title' => 'Generate Soal'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GenerateSoal  $generateSoal
     * @return \Illuminate\Http\Response
     */
    public function edit(GenerateSoal $generateSoal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGenerateSoalRequest  $request
     * @param  \App\Models\GenerateSoal  $generateSoal
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGenerateSoalRequest $request, GenerateSoal $generateSoal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GenerateSoal  $generateSoal
     * @return \Illuminate\Http\Response
     */
    public function destroy(GenerateSoal $generateSoal)
    {
        //
    }


    public function kumpulan(){
        $generateSoal = GenerateSoal::all();
        return view('generatesoal.kumpulangeneratesoal', [
            'generateSoal' => $generateSoal,
            'title' => 'Generate Soal'
        ]);
    }


    public function mysoalindex(){
        // $modulAjar = auth()->user()->ModulAjar->where('id', 1);
        $generateSoal = auth()->user()->GenerateSoal;

       

        return view('generatesoal.mysoalindex', [
            "generateSoal" => $generateSoal,
            'title' => 'My Soal'
        ]);
    }


}
