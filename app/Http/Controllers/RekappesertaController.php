<?php

namespace App\Http\Controllers;

use App\Models\Rekappeserta;
use App\Http\Requests\StoreRekappesertaRequest;
use App\Http\Requests\UpdateRekappesertaRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RekappesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datas = DB::table('sertifikat1-4mar2024')->paginate(20);
        // dd($datas);
        // $data = data::paginate(20);
        

        return view('rekappeserta.index', compact('datas'), [ 
            'title' => 'Sertifikat Event'
        ]);
    }

    public function search(Request $request){
        $search = $request->input('search');

        $datas = DB::table('sertifikat1-4mar2024')
                   ->where('nama', 'like', '%'.$search.'%')
                   ->orWhere('instansi', 'like', '%'.$search.'%')
                   ->paginate(20);

        
    
        return view('rekappeserta.index', compact('datas', 'search'), [ 
            'title' => 'Sertifikat Event'
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
     * @param  \App\Http\Requests\StoreRekappesertaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRekappesertaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rekappeserta  $rekappeserta
     * @return \Illuminate\Http\Response
     */
    public function show(Rekappeserta $rekappeserta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rekappeserta  $rekappeserta
     * @return \Illuminate\Http\Response
     */
    public function edit(Rekappeserta $rekappeserta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRekappesertaRequest  $request
     * @param  \App\Models\Rekappeserta  $rekappeserta
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRekappesertaRequest $request, Rekappeserta $rekappeserta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rekappeserta  $rekappeserta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rekappeserta $rekappeserta)
    {
        //
    }
}
