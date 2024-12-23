<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJawabanGenerateSoalRequest;
use App\Http\Requests\UpdateJawabanGenerateSoalRequest;
use App\Models\JawabanGenerateSoal;
use Illuminate\Http\Request;

class JawabanGenerateSoalController extends Controller
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
     * @param  \App\Http\Requests\StoreJawabanGenerateSoalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $answer = JawabanGenerateSoal::create($request->only('pertanyaan_id', 'jawaban', 'is_correct'));
        return response()->json($answer, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JawabanGenerateSoal  $jawabanGenerateSoal
     * @return \Illuminate\Http\Response
     */
    public function show(JawabanGenerateSoal $jawabanGenerateSoal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JawabanGenerateSoal  $jawabanGenerateSoal
     * @return \Illuminate\Http\Response
     */
    public function edit(JawabanGenerateSoal $jawabanGenerateSoal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJawabanGenerateSoalRequest  $request
     * @param  \App\Models\JawabanGenerateSoal  $jawabanGenerateSoal
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJawabanGenerateSoalRequest $request, JawabanGenerateSoal $jawabanGenerateSoal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JawabanGenerateSoal  $jawabanGenerateSoal
     * @return \Illuminate\Http\Response
     */
    public function destroy(JawabanGenerateSoal $jawabanGenerateSoal)
    {
        //
    }
}
