<?php

namespace App\Http\Controllers;


use App\Models\Pendaftaranworkshop;
use App\Models\Formpendaftaranworkshop;
use App\Http\Requests\StorePendaftaranworkshopRequest;
use App\Http\Requests\UpdatePendaftaranworkshopRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str; 

class PendaftaranworkshopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $pendaftaranworkshop = Pendaftaranworkshop::with('header')->get();
        return view('pendaftaranworkshop.index', compact('pendaftaranworkshop' ));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pendaftaranworkshop  $pendaftaranworkshop
     * @return \Illuminate\Http\Response
     */
    public function show(Pendaftaranworkshop $pendaftaranworkshop)
    {
        
        //
        session(['data_dari_show' => $pendaftaranworkshop]);
        $jumlahdaftar = DB::table($pendaftaranworkshop->slug)->count();
        
        
        if($pendaftaranworkshop->dibuka === 1){
        return view('pendaftaranworkshop.formpendaftaran',compact('jumlahdaftar'), [
            "pendaftaran" => $pendaftaranworkshop,
            'title' => 'Pendaftaranworkshop'
        ]);
        }
        else{
            return view('pendaftaranworkshop.ditutup',compact('jumlahdaftar'), [
                "pendaftaranworkshop" => $pendaftaranworkshop,
                'title' => 'Pendaftaranworkshop'
            ]);  
        }
    }
}
