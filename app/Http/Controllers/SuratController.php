<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Http\Requests\StoreSuratRequest;
use App\Http\Requests\UpdateSuratRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.surat.index');
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
     * @param  \App\Http\Requests\StoreSuratRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSuratRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function show(Surat $surat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function edit(Surat $surat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSuratRequest  $request
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSuratRequest $request, Surat $surat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Surat $surat)
    {
        //
    }

    public function generate(Request $request)
    {
        $jenis = $request->jenis;
        $profilLembaga = 'BED';

        $bulan = Carbon::now()->month;
        $tahun = Carbon::now()->year;
        if($bulan === 1){
            $bulan = 'I';
        }elseif($bulan === 2){
            $bulan = 'II';
        }elseif($bulan === 3){
            $bulan = 'III';
        }elseif($bulan === 4){
            $bulan = 'IV';
        }elseif($bulan === 5){
            $bulan = 'V';
        }elseif($bulan === 6){
            $bulan = 'VI';
        }elseif($bulan === 7){
            $bulan = 'VII';
        }elseif($bulan === 8){
            $bulan = 'VIII';
        }elseif($bulan === 9){
            $bulan = 'IX';
        }elseif($bulan === 10){
            $bulan = 'X';
        }elseif($bulan === 11){
            $bulan = 'XI';
        }elseif($bulan === 12){
            $bulan = 'XII';
        }

        $idTerakhir = Surat::max('id');
        $idBerikutnya = str_pad($idTerakhir + 1, 3, '0', STR_PAD_LEFT); 

        $generate = $jenis . ".".  $idBerikutnya ."/"  . $profilLembaga . "/" . $bulan . "/" . $tahun; 

        $data = [
            'judul' => $request->input('judul'),
            'nomor' => $generate,
            'createdby' => Auth::guard('admin')->user()->username,
            'lasteditedby' => Auth::guard('admin')->user()->username,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        Surat::insert($data);
        session()->flash('success', $generate);
        return redirect('/admin/surat');

    }

    public function listnomor(){
        $listSurat = Surat::get();

        return view('admin.surat.show', compact('listSurat'));
    }
}
