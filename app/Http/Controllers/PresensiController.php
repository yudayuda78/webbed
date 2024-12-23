<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\formpresensi;
use App\Models\Presensi;
use DB;
use Illuminate\Support\Str;

class PresensiController extends Controller
{

    private function generateAndSaveNomorPendaftaran($table)
    {
        $nomorPendaftaran = DB::table($table)->max('nomorpendaftaran');
        $nomorPendaftaran = $nomorPendaftaran ? $nomorPendaftaran + 1 : 1;

        return $nomorPendaftaran;
    }

    public function show()
    {
        $presensi = Presensi::with('artikel', 'video', 'header')->get();

        // $get = Presensi::find(1);
        // $artikel = $presensi->artikel()->get();
        // $video = $get->video()->get();
        // $header = $presensi->header()->get();


        // foreach ($presensi as $presen){
        //     echo $presen->header;
        // }

        return view('absensi.index', compact('presensi'));
    }

    public function view(Presensi $presensi)
    {

        session(['data_dari_show' => $presensi]);
        
        
        if ($presensi->dibuka === 1 || $presensi->dibuka === 'dibuka') {
            return view('absensi.absensi2', [
                "presensi" => $presensi,
                'title' => 'Presensi'
            ]);
        } else {
            return view('absensi.tutup', [
                "presensi" => $presensi,
                'title' => 'Presensi'
            ]);
        }
    }


    public function tambahData(Request $request)
    {
        $slug = $request->input('slug');


        $nama = $request->input('nama');
        $namaedit = str_replace(['.', ',', "'"], '-', $nama);

        $namaedit = Str::slug($namaedit, '-');


        function convertSlug($slug)
        {
            $slug = preg_replace('/_\d+$/', '', $slug);
            $slug = str_replace('adm', 'sertifikat', $slug);
            return $slug;
        }

        $sertifslug = convertSlug($slug);

        $nomorPendaftaran = $this->generateAndSaveNomorPendaftaran($sertifslug);
        $gabungannamaid = $namaedit . $nomorPendaftaran;



        $data = $request->validate([
            'judul' => 'required',
            'nama' => 'required',
            'instansi' => 'required',
            'posisi' => 'required',
            'email' => 'required|email',
            'whatsapp' => 'required|numeric',
            'provinsi' => 'required',
            'kota' => 'required',
        ]);


        $datasertif = [
            'nomorpendaftaran' => $nomorPendaftaran,
            'nama' => $request->input('nama'),
            'instansi' => $request->input('instansi'),
            'slug' =>  $gabungannamaid,
        ];



        Formpresensi::create($data);
        DB::table($sertifslug)->insert($datasertif);


        return redirect('/halamansukses');
    }


    public function sukses()
    {
        $dataDariShow = session('data_dari_show');
        $presensi = Presensi::with('artikel', 'video', 'header')->get();



        if ($dataDariShow->jenis == 'sc') {
            return view('absensi.sukses2', compact('presensi'), [
                'dataDariShow' => $dataDariShow,
            ]);
        } else {
            return view('absensi.sukses', compact('presensi'), [
                'dataDariShow' => $dataDariShow,
            ]);
        }
    }

    public function tutup()
    {

        $presensi = Presensi::with('artikel', 'video', 'header')->get();

        return view('absensi.tutup', compact('presensi'));
    }
}
