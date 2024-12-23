<?php

namespace App\Http\Controllers;

use App\Models\Formpresensi;
use App\Http\Requests\StoreFormpresensiRequest;
use App\Http\Requests\UpdateFormpresensiRequest;

class FormpresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreFormpresensiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFormpresensiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Formpresensi  $formpresensi
     * @return \Illuminate\Http\Response
     */
    public function show(Formpresensi $formpresensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Formpresensi  $formpresensi
     * @return \Illuminate\Http\Response
     */
    public function edit(Formpresensi $formpresensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFormpresensiRequest  $request
     * @param  \App\Models\Formpresensi  $formpresensi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFormpresensiRequest $request, Formpresensi $formpresensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Formpresensi  $formpresensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Formpresensi $formpresensi)
    {
        //
    }
}
