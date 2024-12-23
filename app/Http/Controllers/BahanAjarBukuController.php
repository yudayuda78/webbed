<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBahanAjarBukuRequest;
use App\Http\Requests\UpdateBahanAjarBukuRequest;
use App\Models\BahanAjarBuku;

class BahanAjarBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = BahanAjarBuku::paginate(12);

        return view('buku.index', [
            "books" => $books,
            'title' => 'Koleksi'
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
     * @param  \App\Http\Requests\StoreBahanAjarBukuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBahanAjarBukuRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BahanAjarBuku  $bahanAjarBuku
     * @return \Illuminate\Http\Response
     */
    public function show(BahanAjarBuku $bahanAjarBuku)
    {

        return view('buku.show', [
            "book" => $bahanAjarBuku,
            'title' => 'Koleksi'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BahanAjarBuku  $bahanAjarBuku
     * @return \Illuminate\Http\Response
     */
    public function edit(BahanAjarBuku $bahanAjarBuku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBahanAjarBukuRequest  $request
     * @param  \App\Models\BahanAjarBuku  $bahanAjarBuku
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBahanAjarBukuRequest $request, BahanAjarBuku $bahanAjarBuku)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BahanAjarBuku  $bahanAjarBuku
     * @return \Illuminate\Http\Response
     */
    public function destroy(BahanAjarBuku $bahanAjarBuku)
    {
        //
    }

    public function download($id)
    {
        $filedownload = BahanAjarBuku::where('id', $id)->first();
        $pathToFile = public_path("file/{$filedownload->file}");
        return \Response::download($pathToFile);
    }
}
