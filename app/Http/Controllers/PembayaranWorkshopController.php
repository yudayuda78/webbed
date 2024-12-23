<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PembayaranWorkshop;
use App\Models\Pendaftarandiklat;
use App\Models\newsertif;
use App\Http\Requests\StorePembayaranWorkshopRequest;
use App\Http\Requests\UpdatePembayaranWorkshopRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str; 
use App\Mail\VerifikasiWorkshop;
use Illuminate\Support\Facades\Mail;

class PembayaranWorkshopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexverifikasiworkshop(){
        $pendaftarandiklat = Pendaftarandiklat::where('jenis', 'workshop')->paginate(50);
        return view('admin.verifikasiworkshop.index', compact('pendaftarandiklat' ));
    }

    public function showverifikasiworkshop(Pendaftarandiklat $pendaftarandiklat){
        session(['data_dari_show' => $pendaftarandiklat]);
        $payment = DB::table($pendaftarandiklat->slug)->where('statuspembayaran', 'belum')->paginate(50);
        session(['payment' => $payment]);


        return view('admin.verifikasiworkshop.halamanverifikasi',[
            "pendaftarandiklat" => $pendaftarandiklat,
            "payment" => $payment,
        ]);
    }

    public function updateverifikasiworkshop(Request $request)
    {   
        $dataDariShow = session('data_dari_show');
        $payment = session('payment');
        
        $slug = $dataDariShow->slug;
        $slugsertif = str_replace("pendaftaran", "sertifikat", $slug );

        $nama = $request->input('nama');
        $namaedit = str_replace(['.', ',', "'"], '-', $nama);
        $namaedit = Str::slug($namaedit, '-');
        $email = $request->input('email');


        
        
        $id = $request->input('id');
        $pembayaranWorkshop = DB::table($slug)->find($id);
        

        $data = [
            'nomorpendaftaran' => $request->input('id'),
            'nama' => $request->input('nama'),
            'instansi' => $request->input('instansi'),
            'slug' => $namaedit . $id,
            
        ];

        DB::table($slugsertif)->insert($data);

        set_time_limit(60);

        $details = [
        'title' => 'VerifikasiWorkshop',
        'body' => 'This is for testing email using smtp'
        ];
       
        //untuk asynchronus
        Mail::to($email)->queue(new VerifikasiWorkshop($details));

        //untuk synchronus
        // \Mail::to($email)->send(new \App\Mail\VerifikasiWorkshop($details));

        if ($pembayaranWorkshop) {
            DB::table($slug)->where('id', $id)->update([
                'statuspembayaran' => $request->input('status')
            ]);

            return redirect()->back()->with('success', 'Status pembayaran berhasil diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Pembayaran tidak ditemukan.');
        }
    }

    public function indexarsip() {
        $arsipworkshop = Pendaftarandiklat::with('header')->where('jenis', 'workshop')->get();
        return view('admin.verifikasiworkshop.indexarsip', compact('arsipworkshop'));
    }

    public function downloaddataworkshop($slug)
    {   
        
        $pendaftaran = Pendaftarandiklat::where('slug', $slug)->firstOrFail();
        $slugpendaftaran = $pendaftaran->slug;
        $slugsertif = str_replace('pendaftaran', 'sertifikat', $slugpendaftaran);
        $slugworkshop = str_replace('pendaftaran', 'dataworkshop', $slugpendaftaran);
        $data = DB::table($slugsertif)->get();



        $filename =  $slugworkshop . '.csv';

        $file = fopen($filename, 'w');
        fputcsv($file, array_keys((array) $data->first()));
        foreach ($data as $row) {
            fputcsv($file, (array) $row);
        }
        fclose($file);




        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Content-Type: application/octet-stream');
        header('Content-Length: ' . filesize($filename));
        readfile($filename);


        unlink($filename);
    }
}
