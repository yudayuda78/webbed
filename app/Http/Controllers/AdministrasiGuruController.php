<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdministrasiGuruRequest;
use App\Http\Requests\UpdateAdministrasiGuruRequest;
use App\Models\AdministrasiGuru;

class AdministrasiGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $judul = AdministrasiGuru::all();

        return view('administrasiguru.index', [
            'title' => 'administrasiguru',
            'judul' => $judul,
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
     * @param  \App\Http\Requests\StoreAdministrasiGuruRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdministrasiGuruRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdministrasiGuru  $administrasiGuru
     * @return \Illuminate\Http\Response
     */
    public function show(AdministrasiGuru $administrasiGuru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdministrasiGuru  $administrasiGuru
     * @return \Illuminate\Http\Response
     */
    public function edit(AdministrasiGuru $administrasiGuru)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdministrasiGuruRequest  $request
     * @param  \App\Models\AdministrasiGuru  $administrasiGuru
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdministrasiGuruRequest $request, AdministrasiGuru $administrasiGuru)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdministrasiGuru  $administrasiGuru
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdministrasiGuru $administrasiGuru)
    {
        //
    }

    public function tambahdatamodulajar(){
        
    }
}
