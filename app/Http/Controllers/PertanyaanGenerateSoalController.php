<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePertanyaanGenerateSoalRequest;
use App\Http\Requests\UpdatePertanyaanGenerateSoalRequest;
use App\Models\PertanyaanGenerateSoal;
use Illuminate\Http\Request;

class PertanyaanGenerateSoalController extends Controller
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
     * @param  \App\Http\Requests\StorePertanyaanGenerateSoalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $question = PertanyaanGenerateSoal::create($request->only('generatesoal_id', 'pertanyaan'));
        return response()->json($question, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PertanyaanGenerateSoal  $pertanyaanGenerateSoal
     * @return \Illuminate\Http\Response
     */
    public function show(PertanyaanGenerateSoal $pertanyaanGenerateSoal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PertanyaanGenerateSoal  $pertanyaanGenerateSoal
     * @return \Illuminate\Http\Response
     */
    public function edit(PertanyaanGenerateSoal $pertanyaanGenerateSoal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePertanyaanGenerateSoalRequest  $request
     * @param  \App\Models\PertanyaanGenerateSoal  $pertanyaanGenerateSoal
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePertanyaanGenerateSoalRequest $request, PertanyaanGenerateSoal $pertanyaanGenerateSoal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PertanyaanGenerateSoal  $pertanyaanGenerateSoal
     * @return \Illuminate\Http\Response
     */
    public function destroy(PertanyaanGenerateSoal $pertanyaanGenerateSoal)
    {
        //
    }
}
