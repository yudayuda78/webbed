<?php

namespace App\Http\Controllers;

use App\Models\PembayaranEcourse;
use App\Http\Requests\StorePembayaranEcourseRequest;
use App\Http\Requests\UpdatePembayaranEcourseRequest;
use Illuminate\Http\Request;

class PembayaranEcourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment = PembayaranEcourse::where('status', 'belum')->paginate(50);
        return view('admin.verifikasiecourse.index', [
            "payment" => $payment,

        ]);
    }

    public function arsip()
    {
        $payment = PembayaranEcourse::where('status', 'sudah')->paginate(50);
        return view('admin.verifikasiecourse.arsip', [
            "payment" => $payment,

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
     * @param  \App\Http\Requests\StorePembayaranEcourseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePembayaranEcourseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PembayaranEcourse  $pembayaranEcourse
     * @return \Illuminate\Http\Response
     */
    public function show(PembayaranEcourse $pembayaranEcourse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PembayaranEcourse  $pembayaranEcourse
     * @return \Illuminate\Http\Response
     */
    public function edit(PembayaranEcourse $pembayaranEcourse)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePembayaranEcourseRequest  $request
     * @param  \App\Models\PembayaranEcourse  $pembayaranEcourse
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePembayaranEcourseRequest $request, PembayaranEcourse $pembayaranEcourse)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PembayaranEcourse  $pembayaranEcourse
     * @return \Illuminate\Http\Response
     */
    public function destroy(PembayaranEcourse $pembayaranEcourse)
    {
        //
    }

    public function updateverifikasi(Request $request)
    {
        $id = $request->input('id');
        $pembayaranEcourse = PembayaranEcourse::find($id);

        if ($pembayaranEcourse) {
            $pembayaranEcourse->status = $request->input('status');
            $pembayaranEcourse->save();

            return redirect()->route('indexverifikasi')->with('success', 'Status pembayaran berhasil diperbarui.');
        } else {
            
        }
    }
}
