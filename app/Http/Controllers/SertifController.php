<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Event;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use PDF;

class SertifController extends Controller
{

    public function showabjad(){
        return view('sertifikat.abjad-sertif', [
            'title' => 'Sertifikat Event'
        ]);
    }

    // Sertifikat 1-4 November 2023

    public function showsertif(){
        $datas = DB::table('sertifikat1')->paginate(20);
        // dd($datas);
        // $data = data::paginate(20);
        $event = Event::all();

        return view('sertifikat.index', compact('datas', 'event'), [ 
            'title' => 'Sertifikat Event'
        ]);
    }

    public function search(Request $request){
        $search = $request->input('search');

        $datas = DB::table('sertifikat1')
                   ->where('nama', 'like', '%'.$search.'%')
                   ->orWhere('instansi', 'like', '%'.$search.'%')
                   ->paginate(20);

        $event = Event::all();
    
        return view('sertifikat.index', compact('datas', 'search', 'event'), [ 
            'title' => 'Sertifikat Event'
        ]);
    }

    public function generate($id){
        $sertifikat = DB::table('sertifikat1')->where('id', $id)->first();

        if ($sertifikat) {
            $nama = $sertifikat->nama;
            $instansi = $sertifikat->instansi;

            // Path menuju gambar template PNG
            $templateImage = public_path('templateSertif/nov1.jpg');
                        
            $html = '<img src="' . $templateImage . '" style="margin-top:-50px;margin-left:-50px;background-color:red;position:absolute; left:0px;max-width:115%; max-height:115%; z-index:10;" />';
            // $html .= '<h1 style="position:absolute">ayam<h1>';
            $html .= '<h3 style="text-align:center;margin-top:200px;z-index:50; font-family:poppins; font-size:36px;">' . $nama . '</h3>';
            $html .= '<h5 style="text-align:center;margin-top:-30px;z-index:50; font-family:poppins; font-size:30px;">' .$instansi . '</h5>';
            // dd($html);
            
            $pdf = PDF::loadHTML($html);


            $filename = 'sertifikat_' . $nama . '.pdf';
            

            // Mengatur header HTTP untuk nama file
            return $pdf->stream($filename, array('Attachment' => 0));
        } else {
            return "Sertifikat tidak ditemukan.";
        }
    }


    // Sertifikat 7-9 November 2023
    public function showsertif2(){
        $datas = DB::table('sertifikat2')->paginate(20);
        // dd($datas);
        // $data = data::paginate(20);

        return view('sertifikat.index7-9Nov', compact('datas'), [ 
            'title' => 'Sertifikat Event'
        ]);
    }

    public function search2(Request $request){
        $search = $request->input('search');

        $datas = DB::table('sertifikat2')
                   ->where('nama', 'like', '%'.$search.'%')
                   ->orWhere('instansi', 'like', '%'.$search.'%')
                   ->paginate(20);
    
        return view('sertifikat.index7-9Nov', compact('datas', 'search'), [ 
            'title' => 'Sertifikat Event'
        ]);
    }

    public function generate2($id){
        $sertifikat = DB::table('sertifikat2')->where('id', $id)->first();

        if ($sertifikat) {
            $nama = $sertifikat->nama;
            $instansi = $sertifikat->instansi;

            // Path menuju gambar template PNG
            $templateImage = public_path('templateSertif/nov2.jpg');
                        
            $html = '<img src="' . $templateImage . '" style="margin-top:-50px;margin-left:-50px;background-color:red;position:absolute; left:0px;max-width:115%; max-height:115%; z-index:10;" />';
            // $html .= '<h1 style="position:absolute">ayam<h1>';
            $html .= '<h3 style="text-align:center;margin-top:200px;z-index:50; font-family:poppins; font-size:36px;">' . $nama . '</h3>';
            $html .= '<h5 style="text-align:center;margin-top:-30px;z-index:50; font-family:poppins; font-size:30px;">' .$instansi . '</h5>';
            // dd($html);
            
            $pdf = PDF::loadHTML($html);


            $filename = 'sertifikat_' . $nama . '.pdf';
            

            // Mengatur header HTTP untuk nama file
            return $pdf->stream($filename, array('Attachment' => 0));
        } else {
            return "Sertifikat tidak ditemukan.";
        }
    }

    // sertifikat pranikah
    public function showsertif3(){
        $datas = DB::table('sertifikat3')->paginate(20);
        // dd($datas);
        // $data = data::paginate(20);
        $event = Event::all();

        return view('sertifikat.index9-11Nov', compact('datas', 'event'), [ 
            'title' => 'Sertifikat Event'
        ]);
    }

    public function search3(Request $request){
        $search = $request->input('search');

        $datas = DB::table('sertifikat3')
                   ->where('nama', 'like', '%'.$search.'%')
                   ->orWhere('instansi', 'like', '%'.$search.'%')
                   ->paginate(20);

         $event = Event::all();
    
        return view('sertifikat.index9-11Nov', compact('datas', 'search', 'event'), [ 
            'title' => 'Sertifikat Event'
        ]);
    }

    public function generate3($id){
        $sertifikat = DB::table('sertifikat3')->where('id', $id)->first();

        if ($sertifikat) {
            $nama = $sertifikat->nama;
            $instansi = $sertifikat->instansi;

            // Path menuju gambar template PNG
            $templateImage = public_path('templateSertif/nov3.jpg');
                        
            $html = '<img src="' . $templateImage . '" style="margin-top:-50px;margin-left:-50px;background-color:red;position:absolute; left:0px;max-width:115%; max-height:115%; z-index:10;" />';
            // $html .= '<h1 style="position:absolute">ayam<h1>';
            $html .= '<h3 style="text-align:center;margin-top:200px;z-index:50; font-family:poppins; font-size:36px;">' . $nama . '</h3>';
            $html .= '<h5 style="text-align:center;margin-top:-30px;z-index:50; font-family:poppins; font-size:30px;">' .$instansi . '</h5>';
            // dd($html);
            
            $pdf = PDF::loadHTML($html);


            $filename = 'sertifikat_' . $nama . '.pdf';
            

            // Mengatur header HTTP untuk nama file
            return $pdf->stream($filename, array('Attachment' => 0));
        } else {
            return "Sertifikat tidak ditemukan.";
        }
    }


    //sertifikat 1-4 nov revisi
    public function showsertif1revisi(){
        $datas = DB::table('sertifikat4')->paginate(20);
        // dd($datas);
        // $data = data::paginate(20);
        $event = Event::all();

        return view('sertifikat.index1-4NovRev', compact('datas', 'event'), [ 
            'title' => 'Sertifikat Event'
        ]);
    }

    public function search1rev(Request $request){
        $search = $request->input('search');

        $datas = DB::table('sertifikat4')
                   ->where('nama', 'like', '%'.$search.'%')
                   ->orWhere('instansi', 'like', '%'.$search.'%')
                   ->paginate(20);

         $event = Event::all();
    
        return view('sertifikat.index1-4NovRev', compact('datas', 'search', 'event'), [ 
            'title' => 'Sertifikat Event'
        ]);
    }

    public function generate1revisi($id){
        $sertifikat = DB::table('sertifikat4')->where('id', $id)->first();

        if ($sertifikat) {
            $nama = $sertifikat->nama;
            $instansi = $sertifikat->instansi;

            // Path menuju gambar template PNG
            $templateImage = public_path('templateSertif/nov1.jpg');
                        
            $html = '<img src="' . $templateImage . '" style="margin-top:-50px;margin-left:-50px;background-color:red;position:absolute; left:0px;max-width:115%; max-height:115%; z-index:10;" />';
            // $html .= '<h1 style="position:absolute">ayam<h1>';
            $html .= '<h3 style="text-align:center;margin-top:200px;z-index:50; font-family:poppins; font-size:36px;">' . $nama . '</h3>';
            $html .= '<h5 style="text-align:center;margin-top:-30px;z-index:50; font-family:poppins; font-size:30px;">' .$instansi . '</h5>';
            // dd($html);
            
            $pdf = PDF::loadHTML($html);


            $filename = 'sertifikat_' . $nama . '.pdf';
            

            // Mengatur header HTTP untuk nama file
            return $pdf->stream($filename, array('Attachment' => 0));
        } else {
            return "Sertifikat tidak ditemukan.";
        }
    }

    //sertifikat 16-19 nov
    public function showsertif1619nov(){
        $datas = DB::table('sertifikat16-19november')->paginate(20);
        // dd($datas);
        // $data = data::paginate(20);
        $event = Event::all();

        return view('sertifikat.index16-19Nov', compact('datas', 'event'), [ 
            'title' => 'Sertifikat Event'
        ]);
    }

    public function search1619nov(Request $request){
        $search = $request->input('search');

        $datas = DB::table('sertifikat16-19november')
                   ->where('nama', 'like', '%'.$search.'%')
                   ->orWhere('instansi', 'like', '%'.$search.'%')
                   ->paginate(20);

        $event = Event::all();
    
        return view('sertifikat.index16-19Nov', compact('datas', 'search', 'event'), [ 
            'title' => 'Sertifikat Event'
        ]);
    }

    public function generate1619nov($id){
        $sertifikat = DB::table('sertifikat16-19november')->where('id', $id)->first();

        if ($sertifikat) {
            $nama = $sertifikat->nama;
            $instansi = $sertifikat->instansi;

            // Path menuju gambar template PNG
            $templateImage = public_path('templateSertif/sertif16-19nov.jpg');
                        
            $html = '<img src="' . $templateImage . '" style="margin-top:-50px;margin-left:-50px;background-color:red;position:absolute; left:0px;max-width:115%; max-height:115%; z-index:10;" />';
            // $html .= '<h1 style="position:absolute">ayam<h1>';
            $html .= '<h3 style="text-align:center;margin-top:200px;z-index:50; font-family:poppins; font-size:36px;">' . $nama . '</h3>';
            $html .= '<h5 style="text-align:center;margin-top:-30px;z-index:50; font-family:poppins; font-size:30px;">' .$instansi . '</h5>';
            // dd($html);
            
            $pdf = PDF::loadHTML($html);


            $filename = 'sertifikat_' . $nama . '.pdf';
            

            // Mengatur header HTTP untuk nama file
            return $pdf->stream($filename, array('Attachment' => 0));
        } else {
            return "Sertifikat tidak ditemukan.";
        }
    }

    // Sertifikat Revisi 16-19 Nov
    public function showsertif1619novrev(){
        $datas = DB::table('sertif16-19novrev')->paginate(20);
        // dd($datas);
        // $data = data::paginate(20);
        $event = Event::all();

        return view('sertifikat.index16-19NovRev', compact('datas', 'event'), [ 
            'title' => 'Sertifikat Event'
        ]);
    }

    public function search1619novrev(Request $request){
        $search = $request->input('search');

        $datas = DB::table('sertif16-19novrev')
                   ->where('nama', 'like', '%'.$search.'%')
                   ->orWhere('instansi', 'like', '%'.$search.'%')
                   ->paginate(20);

        $event = Event::all();
    
        return view('sertifikat.index16-19NovRev', compact('datas', 'search', 'event'), [ 
            'title' => 'Sertifikat Event'
        ]);
    }

    public function generate1619novrev($id){
        $sertifikat = DB::table('sertif16-19novrev')->where('id', $id)->first();

        if ($sertifikat) {
            $nama = $sertifikat->nama;
            $instansi = $sertifikat->instansi;

            // Path menuju gambar template PNG
            $templateImage = public_path('templateSertif/sertif16-19nov.jpg');
                        
            $html = '<img src="' . $templateImage . '" style="margin-top:-50px;margin-left:-50px;background-color:red;position:absolute; left:0px;max-width:115%; max-height:115%; z-index:10;" />';
            // $html .= '<h1 style="position:absolute">ayam<h1>';
            $html .= '<h3 style="text-align:center;margin-top:200px;z-index:50; font-family:poppins; font-size:36px;">' . $nama . '</h3>';
            $html .= '<h5 style="text-align:center;margin-top:-30px;z-index:50; font-family:poppins; font-size:30px;">' .$instansi . '</h5>';
            // dd($html);
            
            $pdf = PDF::loadHTML($html);


            $filename = 'sertifikat_' . $nama . '.pdf';
            

            // Mengatur header HTTP untuk nama file
            return $pdf->stream($filename, array('Attachment' => 0));
        } else {
            return "Sertifikat tidak ditemukan.";
        }
    }

    // sertifikat 1-4 desember

    public function showsertif1des(){
        $datas = DB::table('sertifikatdes1')->paginate(20);
        // dd($datas);
        // $data = data::paginate(20);
        $event = Event::all();

        return view('sertifikat.index1-4Des', compact('datas', 'event'), [ 
            'title' => 'Sertifikat Event'
        ]);
    }

    public function search1des(Request $request){
        $search = $request->input('search');

        $datas = DB::table('sertifikatdes1')
                   ->where('nama', 'like', '%'.$search.'%')
                   ->orWhere('instansi', 'like', '%'.$search.'%')
                   ->paginate(20);

        $event = Event::all();
    
        return view('sertifikat.index1-4Des', compact('datas', 'search', 'event'), [ 
            'title' => 'Sertifikat Event'
        ]);
    }

    public function generate1des($id){
        $sertifikat = DB::table('sertifikatdes1')->where('id', $id)->first();

        if ($sertifikat) {
            $nama = $sertifikat->nama;
            $instansi = $sertifikat->instansi;

            // Path menuju gambar template PNG
            $templateImage = public_path('templateSertif/sertifikat1-4des.jpg');
                        
            $html = '<img src="' . $templateImage . '" style="margin-top:-50px;margin-left:-50px;background-color:red;position:absolute; left:0px;max-width:115%; max-height:115%; z-index:10;" />';
            // $html .= '<h1 style="position:absolute">ayam<h1>';
            $html .= '<h3 style="text-align:center;margin-top:200px;z-index:50; font-family:poppins; font-size:36px;">' . $nama . '</h3>';
            $html .= '<h5 style="text-align:center;margin-top:-30px;z-index:50; font-family:poppins; font-size:30px;">' .$instansi . '</h5>';
            // dd($html);
            
            $pdf = PDF::loadHTML($html);


            $filename = 'sertifikat_' . $nama . '.pdf';
            

            // Mengatur header HTTP untuk nama file
            return $pdf->stream($filename, array('Attachment' => 0));
        } else {
            return "Sertifikat tidak ditemukan.";
        }
    }

    // sertifikat 1-4 Revisi desember

    public function showsertif1desrev(){
        $datas = DB::table('sertifikatdes1rev')->paginate(20);
        // dd($datas);
        // $data = data::paginate(20);
        $event = Event::all();

        return view('sertifikat.index1-4DesRev', compact('datas', 'event'), [ 
            'title' => 'Sertifikat Event'
        ]);
    }

    public function search1desrev(Request $request){
        $search = $request->input('search');

        $datas = DB::table('sertifikatdes1rev')
                   ->where('nama', 'like', '%'.$search.'%')
                   ->orWhere('instansi', 'like', '%'.$search.'%')
                   ->paginate(20);

        $event = Event::all();
    
        return view('sertifikat.index1-4DesRev', compact('datas', 'search', 'event'), [ 
            'title' => 'Sertifikat Event'
        ]);
    }

    public function generate1desrev($id){
        $sertifikat = DB::table('sertifikatdes1rev')->where('id', $id)->first();

        if ($sertifikat) {
            $nama = $sertifikat->nama;
            $instansi = $sertifikat->instansi;

            // Path menuju gambar template PNG
            $templateImage = public_path('templateSertif/sertifikat1-4des.jpg');
                        
            $html = '<img src="' . $templateImage . '" style="margin-top:-50px;margin-left:-50px;background-color:red;position:absolute; left:0px;max-width:115%; max-height:115%; z-index:10;" />';
            // $html .= '<h1 style="position:absolute">ayam<h1>';
            $html .= '<h3 style="text-align:center;margin-top:200px;z-index:50; font-family:poppins; font-size:36px;">' . $nama . '</h3>';
            $html .= '<h5 style="text-align:center;margin-top:-30px;z-index:50; font-family:poppins; font-size:30px;">' .$instansi . '</h5>';
            // dd($html);
            
            $pdf = PDF::loadHTML($html);


            $filename = 'sertifikat_' . $nama . '.pdf';
            

            // Mengatur header HTTP untuk nama file
            return $pdf->stream($filename, array('Attachment' => 0));
        } else {
            return "Sertifikat tidak ditemukan.";
        }
    }

    // sertifikat 16-19 desember
    public function showsertif2des(){
        $datas = DB::table('sertifikatdes2')->paginate(20);
        // dd($datas);
        // $data = data::paginate(20);
        $event = Event::all();

        return view('sertifikat.index16-19Des', compact('datas', 'event'), [ 
            'title' => 'Sertifikat Event'
        ]);
    }

    public function search2des(Request $request){
        $search = $request->input('search');

        $datas = DB::table('sertifikatdes2')
                   ->where('nama', 'like', '%'.$search.'%')
                   ->orWhere('instansi', 'like', '%'.$search.'%')
                   ->paginate(20);

        $event = Event::all();
    
        return view('sertifikat.index16-19Des', compact('datas', 'search', 'event'), [ 
            'title' => 'Sertifikat Event'
        ]);
    }

    public function generate2des($id){
        $sertifikat = DB::table('sertifikatdes2')->where('id', $id)->first();

        if ($sertifikat) {
            $nama = $sertifikat->nama;
            $instansi = $sertifikat->instansi;

            // Path menuju gambar template PNG
            $templateImage = public_path('templateSertif/16rev.jpg');
                        
            $html = '<img src="' . $templateImage . '" style="margin-top:-50px;margin-left:-50px;background-color:red;position:absolute; left:0px;max-width:115%; max-height:115%; z-index:10;" />';
            // $html .= '<h1 style="position:absolute">ayam<h1>';
            $html .= '<h3 style="text-align:center;margin-top:200px;z-index:50; font-family:poppins; font-size:36px;">' . $nama . '</h3>';
            $html .= '<h5 style="text-align:center;margin-top:-30px;z-index:50; font-family:poppins; font-size:30px;">' .$instansi . '</h5>';
            // dd($html);
            
            $pdf = PDF::loadHTML($html);


            $filename = 'sertifikat_' . $nama . '.pdf';
            

            // Mengatur header HTTP untuk nama file
            return $pdf->stream($filename, array('Attachment' => 0));
        } else {
            return "Sertifikat tidak ditemukan.";
        }
    }

    // sertifikat 16-19 desember rev
    public function showsertif2desrev(){
        $datas = DB::table('sertifikatdes2rev')->paginate(20);
        // dd($datas);
        // $data = data::paginate(20);
        $event = Event::all();

        return view('sertifikat.index16-19Desrev', compact('datas', 'event'), [ 
            'title' => 'Sertifikat Event'
        ]);
    }

    public function search2desrev(Request $request){
        $search = $request->input('search');

        $datas = DB::table('sertifikatdes2rev')
                   ->where('nama', 'like', '%'.$search.'%')
                   ->orWhere('instansi', 'like', '%'.$search.'%')
                   ->paginate(20);

        $event = Event::all();
    
        return view('sertifikat.index16-19Desrev', compact('datas', 'search', 'event'), [ 
            'title' => 'Sertifikat Event'
        ]);
    }

    public function generate2desrev($id){
        $sertifikat = DB::table('sertifikatdes2rev')->where('id', $id)->first();

        if ($sertifikat) {
            $nama = $sertifikat->nama;
            $instansi = $sertifikat->instansi;

            // Path menuju gambar template PNG
            $templateImage = public_path('templateSertif/16rev.jpg');
                        
            $html = '<img src="' . $templateImage . '" style="margin-top:-50px;margin-left:-50px;background-color:red;position:absolute; left:0px;max-width:115%; max-height:115%; z-index:10;" />';
            // $html .= '<h1 style="position:absolute">ayam<h1>';
            $html .= '<h3 style="text-align:center;margin-top:200px;z-index:50; font-family:poppins; font-size:36px;">' . $nama . '</h3>';
            $html .= '<h5 style="text-align:center;margin-top:-30px;z-index:50; font-family:poppins; font-size:30px;">' .$instansi . '</h5>';
            // dd($html);
            
            $pdf = PDF::loadHTML($html);


            $filename = 'sertifikat_' . $nama . '.pdf';
            

            // Mengatur header HTTP untuk nama file
            return $pdf->stream($filename, array('Attachment' => 0));
        } else {
            return "Sertifikat tidak ditemukan.";
        }
    }


    // sertifikat 5-8 jan
    public function showsertif5jan(){
        $datas = DB::table('sertifikat5-8jan')->paginate(20);
        // dd($datas);
        // $data = data::paginate(20);
        $event = Event::all();

        return view('sertifikat.index5-8Jan', compact('datas', 'event'), [ 
            'title' => 'Sertifikat Event'
        ]);
    }

    public function search5jan(Request $request){
        $search = $request->input('search');

        $datas = DB::table('sertifikat5-8jan')
                   ->where('nama', 'like', '%'.$search.'%')
                   ->orWhere('instansi', 'like', '%'.$search.'%')
                   ->paginate(20);

        $event = Event::all();
    
        return view('sertifikat.index5-8Jan', compact('datas', 'search', 'event'), [ 
            'title' => 'Sertifikat Event'
        ]);
    }

    public function generate5jan($id){
        $sertifikat = DB::table('sertifikat5-8jan')->where('id', $id)->first();

        if ($sertifikat) {
            $nama = $sertifikat->nama;
            $instansi = $sertifikat->instansi;

            // Path menuju gambar template PNG
            $templateImage = public_path('templateSertif/sertif5-8jan2024.jpg');
                        
            $html = '<img src="' . $templateImage . '" style="margin-top:-50px;margin-left:-50px;background-color:red;position:absolute; left:0px;max-width:115%; max-height:115%; z-index:10;" />';
            // $html .= '<h1 style="position:absolute">ayam<h1>';
            $html .= '<h3 style="text-align:center;margin-top:200px;z-index:50; font-family:poppins; font-size:36px;">' . $nama . '</h3>';
            $html .= '<h5 style="text-align:center;margin-top:-30px;z-index:50; font-family:poppins; font-size:30px;">' .$instansi . '</h5>';
            // dd($html);
            
            $pdf = PDF::loadHTML($html);


            $filename = 'sertifikat_' . $nama . '.pdf';
            

            // Mengatur header HTTP untuk nama file
            return $pdf->stream($filename, array('Attachment' => 0));
        } else {
            return "Sertifikat tidak ditemukan.";
        }
    }


    //sertifikat 12-14 januari 2024
    public function showsertif12jan(){
        $datas = DB::table('sertifikat12-14jan')->paginate(20);
        // dd($datas);
        // $data = data::paginate(20);
        $rekomendasi = Event::orderByDesc('id')
                   ->take(3)->get();

        return view('sertifikat.index12-14Jan2024', compact('datas', 'rekomendasi'), [ 
            'title' => 'Sertifikat Event'
        ]);
    }

    public function search12jan(Request $request){
        $search = $request->input('search');


        $datas = DB::table('sertifikat12-14jan')
                   ->where('nama', 'like', '%'.$search.'%')
                   ->orWhere('instansi', 'like', '%'.$search.'%')
                   ->paginate(20)->withQueryString();

        

        $rekomendasi = Event::orderByDesc('id')
                   ->take(3)->get();
        
    
        return view('sertifikat.index12-14Jan2024', compact('datas', 'search', 'rekomendasi'), [ 
            'title' => 'Sertifikat Event'
        ]);
    }

    public function generate12jan($id){
        $sertifikat = DB::table('sertifikat12-14jan')->where('id', $id)->first();

        if ($sertifikat) {
            $nama = $sertifikat->nama;
            $instansi = $sertifikat->instansi;

            // Path menuju gambar template PNG
            $templateImage = public_path('templateSertif/sertifikat12-14jan2024.jpg');
                        
            $html = '<img src="' . $templateImage . '" style="margin-top:-50px;margin-left:-50px;background-color:red;position:absolute; left:0px;max-width:115%; max-height:115%; z-index:10;" />';
            // $html .= '<h1 style="position:absolute">ayam<h1>';
            $html .= '<h3 style="text-align:center;margin-top:200px;z-index:50; font-family:poppins; font-size:36px;">' . $nama . '</h3>';
            $html .= '<h5 style="text-align:center;margin-top:-30px;z-index:50; font-family:poppins; font-size:30px;">' .$instansi . '</h5>';
            // dd($html);
            
            $pdf = PDF::loadHTML($html);


            $filename = 'sertifikat_' . $nama . '.pdf';
            

            // Mengatur header HTTP untuk nama file
            return $pdf->stream($filename, array('Attachment' => 0));
        } else {
            return "Sertifikat tidak ditemukan.";
        }
    }

    //revisi sertif 5 januari
    public function showsertif5janrev(){
        $datas = DB::table('sertifikat5-8janrev')->paginate(20);
        // dd($datas);
        // $data = data::paginate(20);
        $event = Event::all();

        return view('sertifikat.index5-8Janrev', compact('datas', 'event'), [ 
            'title' => 'Sertifikat Event'
        ]);
    }

    public function search5janrev(Request $request){
        $search = $request->input('search');

        $datas = DB::table('sertifikat5-8janrev')
                   ->where('nama', 'like', '%'.$search.'%')
                   ->orWhere('instansi', 'like', '%'.$search.'%')
                   ->paginate(20);

        $event = Event::all();
    
        return view('sertifikat.index5-8Janrev', compact('datas', 'search', 'event'), [ 
            'title' => 'Sertifikat Event'
        ]);
    }

    public function generate5janrev($id){
        $sertifikat = DB::table('sertifikat5-8janrev')->where('id', $id)->first();

        if ($sertifikat) {
            $nama = $sertifikat->nama;
            $instansi = $sertifikat->instansi;

            // Path menuju gambar template PNG
            $templateImage = public_path('templateSertif/sertif5-8jan2024.jpg');
                        
            $html = '<img src="' . $templateImage . '" style="margin-top:-50px;margin-left:-50px;background-color:red;position:absolute; left:0px;max-width:115%; max-height:115%; z-index:10;" />';
            // $html .= '<h1 style="position:absolute">ayam<h1>';
            $html .= '<h3 style="text-align:center;margin-top:200px;z-index:50; font-family:poppins; font-size:36px;">' . $nama . '</h3>';
            $html .= '<h5 style="text-align:center;margin-top:-30px;z-index:50; font-family:poppins; font-size:30px;">' .$instansi . '</h5>';
            // dd($html);
            
            $pdf = PDF::loadHTML($html);


            $filename = 'sertifikat_' . $nama . '.pdf';
            

            // Mengatur header HTTP untuk nama file
            return $pdf->stream($filename, array('Attachment' => 0));
        } else {
            return "Sertifikat tidak ditemukan.";
        }
    }

    //sertifikat 12-14 januari 2024
    public function showsertif12janrev(){
        $datas = DB::table('sertifikat12-14janrev')->paginate(20);
        // dd($datas);
        // $data = data::paginate(20);
        $rekomendasi = Event::orderByDesc('id')
                   ->take(3)->get();

        return view('sertifikat.index12-14Jan2024rev', compact('datas', 'rekomendasi'), [ 
            'title' => 'Sertifikat Event'
        ]);
    }

    public function search12janrev(Request $request){
        $search = $request->input('search');


        $datas = DB::table('sertifikat12-14janrev')
                   ->where('nama', 'like', '%'.$search.'%')
                   ->orWhere('instansi', 'like', '%'.$search.'%')
                   ->paginate(20)->withQueryString();

        

        $rekomendasi = Event::orderByDesc('id')
                   ->take(3)->get();
        
    
        return view('sertifikat.index12-14Jan2024rev', compact('datas', 'search', 'rekomendasi'), [ 
            'title' => 'Sertifikat Event'
        ]);
    }

    public function generate12janrev($id){
        $sertifikat = DB::table('sertifikat12-14janrev')->where('id', $id)->first();

        if ($sertifikat) {
            $nama = $sertifikat->nama;
            $instansi = $sertifikat->instansi;

            // Path menuju gambar template PNG
            $templateImage = public_path('templateSertif/sertifikat12-14jan2024.jpg');
                        
            $html = '<img src="' . $templateImage . '" style="margin-top:-50px;margin-left:-50px;background-color:red;position:absolute; left:0px;max-width:115%; max-height:115%; z-index:10;" />';
            // $html .= '<h1 style="position:absolute">ayam<h1>';
            $html .= '<h3 style="text-align:center;margin-top:200px;z-index:50; font-family:poppins; font-size:36px;">' . $nama . '</h3>';
            $html .= '<h5 style="text-align:center;margin-top:-30px;z-index:50; font-family:poppins; font-size:30px;">' .$instansi . '</h5>';
            // dd($html);
            
            $pdf = PDF::loadHTML($html);


            $filename = 'sertifikat_' . $nama . '.pdf';
            

            // Mengatur header HTTP untuk nama file
            return $pdf->stream($filename, array('Attachment' => 0));
        } else {
            return "Sertifikat tidak ditemukan.";
        }
    }

    // Sertif 20-23 Jan B
    public function showsertif20janb(){
        $datas = DB::table('sertifikat20-30janb')->paginate(20);
        // dd($datas);
        // $data = data::paginate(20);
        $rekomendasi = Event::orderByDesc('id')
                   ->take(3)->get();

        return view('sertifikat.index20-23Jan2024B', compact('datas', 'rekomendasi'), [ 
            'title' => 'Sertifikat Event'
        ]);
    }

    public function search20janb(Request $request){
        $search = $request->input('search');


        $datas = DB::table('sertifikat20-30janb')
                   ->where('nama', 'like', '%'.$search.'%')
                   ->orWhere('instansi', 'like', '%'.$search.'%')
                   ->paginate(20)->withQueryString();

        

        $rekomendasi = Event::orderByDesc('id')
                   ->take(3)->get();
        
    
        return view('sertifikat.index20-23Jan2024B', compact('datas', 'search', 'rekomendasi'), [ 
            'title' => 'Sertifikat Event'
        ]);
    }

    public function generate20janb($id){
        $sertifikat = DB::table('sertifikat20-30janb')->where('id', $id)->first();

        if ($sertifikat) {
            $nama = $sertifikat->nama;
            $instansi = $sertifikat->instansi;

            // Path menuju gambar template PNG
            $templateImage = public_path('templateSertif/sertifikat20-23jan2024.jpg');
                        
            $html = '<img src="' . $templateImage . '" style="margin-top:-50px;margin-left:-50px;background-color:red;position:absolute; left:0px;max-width:115%; max-height:115%; z-index:10;" />';
            // $html .= '<h1 style="position:absolute">ayam<h1>';
            $html .= '<h3 style="text-align:center;margin-top:200px;z-index:50; font-family:poppins; font-size:36px;">' . $nama . '</h3>';
            $html .= '<h5 style="text-align:center;margin-top:-30px;z-index:50; font-family:poppins; font-size:30px;">' .$instansi . '</h5>';
            // dd($html);
            
            $pdf = PDF::loadHTML($html);


            $filename = 'sertifikat_' . $nama . '.pdf';
            

            // Mengatur header HTTP untuk nama file
            return $pdf->stream($filename, array('Attachment' => 0));
        } else {
            return "Sertifikat tidak ditemukan.";
        }
    }


    // Sertif 20-23 Jan A
    public function showsertif20jana(){
        $datas = DB::table('sertifikat20-23jana')->paginate(20);
        // dd($datas);
        // $data = data::paginate(20);
        $rekomendasi = Event::orderByDesc('id')
                   ->take(3)->get();

        return view('sertifikat.index20-23Jan2024A', compact('datas', 'rekomendasi'), [ 
            'title' => 'Sertifikat Event'
        ]);
    }

    public function search20jana(Request $request){
        $search = $request->input('search');


        $datas = DB::table('sertifikat20-23jana')
                   ->where('nama', 'like', '%'.$search.'%')
                   ->orWhere('instansi', 'like', '%'.$search.'%')
                   ->paginate(20)->withQueryString();

        

        $rekomendasi = Event::orderByDesc('id')
                   ->take(3)->get();
        
    
        return view('sertifikat.index20-23Jan2024A', compact('datas', 'search', 'rekomendasi'), [ 
            'title' => 'Sertifikat Event'
        ]);
    }

    public function generate20jana($id){
        $sertifikat = DB::table('sertifikat20-23jana')->where('id', $id)->first();

        if ($sertifikat) {
            $nama = $sertifikat->nama;
            $instansi = $sertifikat->instansi;

            // Path menuju gambar template PNG
            $templateImage = public_path('templateSertif/sertifikat20-23jan2024.jpg');
                        
            $html = '<img src="' . $templateImage . '" style="margin-top:-50px;margin-left:-50px;background-color:red;position:absolute; left:0px;max-width:115%; max-height:115%; z-index:10;" />';
            // $html .= '<h1 style="position:absolute">ayam<h1>';
            $html .= '<h3 style="text-align:center;margin-top:200px;z-index:50; font-family:poppins; font-size:36px;">' . $nama . '</h3>';
            $html .= '<h5 style="text-align:center;margin-top:-30px;z-index:50; font-family:poppins; font-size:30px;">' .$instansi . '</h5>';
            // dd($html);
            
            $pdf = PDF::loadHTML($html);


            $filename = 'sertifikat_' . $nama . '.pdf';
            

            // Mengatur header HTTP untuk nama file
            return $pdf->stream($filename, array('Attachment' => 0));
        } else {
            return "Sertifikat tidak ditemukan.";
        }
    }

    // Sertif 20-23 Jan D
    public function showsertif20jand(){
        $datas = DB::table('sertifikat20-23jand')->paginate(20);
        // dd($datas);
        // $data = data::paginate(20);
        $rekomendasi = Event::orderByDesc('id')
                   ->take(3)->get();

        return view('sertifikat.index20-23Jan2024D', compact('datas', 'rekomendasi'), [ 
            'title' => 'Sertifikat Event'
        ]);
    }

    public function search20jand(Request $request){
        $search = $request->input('search');


        $datas = DB::table('sertifikat20-23jand')
                   ->where('nama', 'like', '%'.$search.'%')
                   ->orWhere('instansi', 'like', '%'.$search.'%')
                   ->paginate(20)->withQueryString();

        

        $rekomendasi = Event::orderByDesc('id')
                   ->take(3)->get();
        
    
        return view('sertifikat.index20-23Jan2024D', compact('datas', 'search', 'rekomendasi'), [ 
            'title' => 'Sertifikat Event'
        ]);
    }

    public function generate20jand($id){
        $sertifikat = DB::table('sertifikat20-23jand')->where('id', $id)->first();

        if ($sertifikat) {
            $nama = $sertifikat->nama;
            $instansi = $sertifikat->instansi;

            // Path menuju gambar template PNG
            $templateImage = public_path('templateSertif/sertifikat20-23jan2024.jpg');
                        
            $html = '<img src="' . $templateImage . '" style="margin-top:-50px;margin-left:-50px;background-color:red;position:absolute; left:0px;max-width:115%; max-height:115%; z-index:10;" />';
            // $html .= '<h1 style="position:absolute">ayam<h1>';
            $html .= '<h3 style="text-align:center;margin-top:200px;z-index:50; font-family:poppins; font-size:36px;">' . $nama . '</h3>';
            $html .= '<h5 style="text-align:center;margin-top:-30px;z-index:50; font-family:poppins; font-size:30px;">' .$instansi . '</h5>';
            // dd($html);
            
            $pdf = PDF::loadHTML($html);


            $filename = 'sertifikat_' . $nama . '.pdf';
            

            // Mengatur header HTTP untuk nama file
            return $pdf->stream($filename, array('Attachment' => 0));
        } else {
            return "Sertifikat tidak ditemukan.";
        }
    }

    
    // Sertif 20-23 Jan C
    public function showsertif20janc(){
        $datas = DB::table('sertifikat20-23janc')->paginate(20);
        // dd($datas);
        // $data = data::paginate(20);
        $rekomendasi = Event::orderByDesc('id')
                   ->take(3)->get();

        return view('sertifikat.index20-23Jan2024C', compact('datas', 'rekomendasi'), [ 
            'title' => 'Sertifikat Event'
        ]);
    }

    public function search20janc(Request $request){
        $search = $request->input('search');


        $datas = DB::table('sertifikat20-23janc')
                   ->where('nama', 'like', '%'.$search.'%')
                   ->orWhere('instansi', 'like', '%'.$search.'%')
                   ->paginate(20)->withQueryString();

        

        $rekomendasi = Event::orderByDesc('id')
                   ->take(3)->get();
        
    
        return view('sertifikat.index20-23Jan2024C', compact('datas', 'search', 'rekomendasi'), [ 
            'title' => 'Sertifikat Event'
        ]);
    }

    public function generate20janc($id){
        $sertifikat = DB::table('sertifikat20-23janc')->where('id', $id)->first();

        if ($sertifikat) {
            $nama = $sertifikat->nama;
            $instansi = $sertifikat->instansi;

            // Path menuju gambar template PNG
            $templateImage = public_path('templateSertif/sertifikat20-23jan2024.jpg');
                        
            $html = '<img src="' . $templateImage . '" style="margin-top:-50px;margin-left:-50px;background-color:red;position:absolute; left:0px;max-width:115%; max-height:115%; z-index:10;" />';
            // $html .= '<h1 style="position:absolute">ayam<h1>';
            $html .= '<h3 style="text-align:center;margin-top:200px;z-index:50; font-family:poppins; font-size:36px;">' . $nama . '</h3>';
            $html .= '<h5 style="text-align:center;margin-top:-30px;z-index:50; font-family:poppins; font-size:30px;">' .$instansi . '</h5>';
            // dd($html);
            
            $pdf = PDF::loadHTML($html);


            $filename = 'sertifikat_' . $nama . '.pdf';
            

            // Mengatur header HTTP untuk nama file
            return $pdf->stream($filename, array('Attachment' => 0));
        } else {
            return "Sertifikat tidak ditemukan.";
        }
    }


    // Sertif 20-23 Jan E
    public function showsertif20jane(){
        $datas = DB::table('sertifikat20-23jane')->paginate(20);
        // dd($datas);
        // $data = data::paginate(20);
        $rekomendasi = Event::orderByDesc('id')
                   ->take(3)->get();

        return view('sertifikat.index20-23Jan2024E', compact('datas', 'rekomendasi'), [ 
            'title' => 'Sertifikat Event'
        ]);
    }

    public function search20jane(Request $request){
        $search = $request->input('search');


        $datas = DB::table('sertifikat20-23jane')
                   ->where('nama', 'like', '%'.$search.'%')
                   ->orWhere('instansi', 'like', '%'.$search.'%')
                   ->paginate(20)->withQueryString();

        

        $rekomendasi = Event::orderByDesc('id')
                   ->take(3)->get();
        
    
        return view('sertifikat.index20-23Jan2024E', compact('datas', 'search', 'rekomendasi'), [ 
            'title' => 'Sertifikat Event'
        ]);
    }

    public function generate20jane($id){
        $sertifikat = DB::table('sertifikat20-23jane')->where('id', $id)->first();

        if ($sertifikat) {
            $nama = $sertifikat->nama;
            $instansi = $sertifikat->instansi;

            // Path menuju gambar template PNG
            $templateImage = public_path('templateSertif/sertifikat20-23jan2024.jpg');
                        
            $html = '<img src="' . $templateImage . '" style="margin-top:-50px;margin-left:-50px;background-color:red;position:absolute; left:0px;max-width:115%; max-height:115%; z-index:10;" />';
            // $html .= '<h1 style="position:absolute">ayam<h1>';
            $html .= '<h3 style="text-align:center;margin-top:200px;z-index:50; font-family:poppins; font-size:36px;">' . $nama . '</h3>';
            $html .= '<h5 style="text-align:center;margin-top:-30px;z-index:50; font-family:poppins; font-size:30px;">' .$instansi . '</h5>';
            // dd($html);
            
            $pdf = PDF::loadHTML($html);


            $filename = 'sertifikat_' . $nama . '.pdf';
            

            // Mengatur header HTTP untuk nama file
            return $pdf->stream($filename, array('Attachment' => 0));
        } else {
            return "Sertifikat tidak ditemukan.";
        }
    }

    // Sertif 20-23 Jan G
    public function showsertif20jang(){
        $datas = DB::table('sertifikat20-23jang')->paginate(20);
        // dd($datas);
        // $data = data::paginate(20);
        $rekomendasi = Event::orderByDesc('id')
                   ->take(3)->get();

        return view('sertifikat.index20-23Jan2024G', compact('datas', 'rekomendasi'), [ 
            'title' => 'Sertifikat Event'
        ]);
    }

    public function search20jang(Request $request){
        $search = $request->input('search');


        $datas = DB::table('sertifikat20-23jang')
                   ->where('nama', 'like', '%'.$search.'%')
                   ->orWhere('instansi', 'like', '%'.$search.'%')
                   ->paginate(20)->withQueryString();

        

        $rekomendasi = Event::orderByDesc('id')
                   ->take(3)->get();
        
    
        return view('sertifikat.index20-23Jan2024G', compact('datas', 'search', 'rekomendasi'), [ 
            'title' => 'Sertifikat Event'
        ]);
    }

    public function generate20jang($id){
        $sertifikat = DB::table('sertifikat20-23jang')->where('id', $id)->first();

        if ($sertifikat) {
            $nama = $sertifikat->nama;
            $instansi = $sertifikat->instansi;

            // Path menuju gambar template PNG
            $templateImage = public_path('templateSertif/sertifikat20-23jan2024.jpg');
                        
            $html = '<img src="' . $templateImage . '" style="margin-top:-50px;margin-left:-50px;background-color:red;position:absolute; left:0px;max-width:115%; max-height:115%; z-index:10;" />';
            // $html .= '<h1 style="position:absolute">ayam<h1>';
            $html .= '<h3 style="text-align:center;margin-top:200px;z-index:50; font-family:poppins; font-size:36px;">' . $nama . '</h3>';
            $html .= '<h5 style="text-align:center;margin-top:-30px;z-index:50; font-family:poppins; font-size:30px;">' .$instansi . '</h5>';
            // dd($html);
            
            $pdf = PDF::loadHTML($html);


            $filename = 'sertifikat_' . $nama . '.pdf';
            

            // Mengatur header HTTP untuk nama file
            return $pdf->stream($filename, array('Attachment' => 0));
        } else {
            return "Sertifikat tidak ditemukan.";
        }
    }

    // Sertif 20-23 Jan F
    public function showsertif20janf(){
        $datas = DB::table('sertifikat20-23janf')->paginate(20);
        // dd($datas);
        // $data = data::paginate(20);
        $rekomendasi = Event::orderByDesc('id')
                   ->take(3)->get();

        return view('sertifikat.index20-23Jan2024F', compact('datas', 'rekomendasi'), [ 
            'title' => 'Sertifikat Event'
        ]);
    }

    public function search20janf(Request $request){
        $search = $request->input('search');


        $datas = DB::table('sertifikat20-23janf')
                   ->where('nama', 'like', '%'.$search.'%')
                   ->orWhere('instansi', 'like', '%'.$search.'%')
                   ->paginate(20)->withQueryString();

        

        $rekomendasi = Event::orderByDesc('id')
                   ->take(3)->get();
        
    
        return view('sertifikat.index20-23Jan2024F', compact('datas', 'search', 'rekomendasi'), [ 
            'title' => 'Sertifikat Event'
        ]);
    }

    public function generate20janf($id){
        $sertifikat = DB::table('sertifikat20-23janf')->where('id', $id)->first();

        if ($sertifikat) {
            $nama = $sertifikat->nama;
            $instansi = $sertifikat->instansi;

            // Path menuju gambar template PNG
            $templateImage = public_path('templateSertif/sertifikat20-23jan2024.jpg');
                        
            $html = '<img src="' . $templateImage . '" style="margin-top:-50px;margin-left:-50px;background-color:red;position:absolute; left:0px;max-width:115%; max-height:115%; z-index:10;" />';
            // $html .= '<h1 style="position:absolute">ayam<h1>';
            $html .= '<h3 style="text-align:center;margin-top:200px;z-index:50; font-family:poppins; font-size:36px;">' . $nama . '</h3>';
            $html .= '<h5 style="text-align:center;margin-top:-30px;z-index:50; font-family:poppins; font-size:30px;">' .$instansi . '</h5>';
            // dd($html);
            
            $pdf = PDF::loadHTML($html);


            $filename = 'sertifikat_' . $nama . '.pdf';
            

            // Mengatur header HTTP untuk nama file
            return $pdf->stream($filename, array('Attachment' => 0));
        } else {
            return "Sertifikat tidak ditemukan.";
        }
    }

     // Sertif 24-27 Jan
     public function showsertif24jan(){
        $datas = DB::table('sertifikat24-27jan2024')->paginate(20);
        // dd($datas);
        // $data = data::paginate(20);
        $rekomendasi = Event::orderByDesc('id')
                   ->take(3)->get();

        return view('sertifikat.index24-27Jan2024', compact('datas', 'rekomendasi'), [ 
            'title' => 'Sertifikat Event'
        ]);
    }

    public function search24jan(Request $request){
        $search = $request->input('search');


        $datas = DB::table('sertifikat24-27jan2024')
                   ->where('nama', 'like', '%'.$search.'%')
                   ->orWhere('instansi', 'like', '%'.$search.'%')
                   ->paginate(20)->withQueryString();

        

        $rekomendasi = Event::orderByDesc('id')
                   ->take(3)->get();
        
    
        return view('sertifikat.index24-27Jan2024', compact('datas', 'search', 'rekomendasi'), [ 
            'title' => 'Sertifikat Event'
        ]);
    }

    public function generate24jan($id){
        $sertifikat = DB::table('sertifikat24-27jan2024')->where('id', $id)->first();

        if ($sertifikat) {
            $nama = $sertifikat->nama;
            $instansi = $sertifikat->instansi;

            // Path menuju gambar template PNG
            $templateImage = public_path('templateSertif/sertifikat24-27jan2024.jpg');
                        
            $html = '<img src="' . $templateImage . '" style="margin-top:-50px;margin-left:-50px;background-color:red;position:absolute; left:0px;max-width:115%; max-height:115%; z-index:10;" />';
            // $html .= '<h1 style="position:absolute">ayam<h1>';
            $html .= '<h3 style="text-align:center;margin-top:200px;z-index:50; font-family:poppins; font-size:36px;">' . $nama . '</h3>';
            $html .= '<h5 style="text-align:center;margin-top:-30px;z-index:50; font-family:poppins; font-size:30px;">' .$instansi . '</h5>';
            // dd($html);
            
            $pdf = PDF::loadHTML($html);


            $filename = 'sertifikat_' . $nama . '.pdf';
            

            // Mengatur header HTTP untuk nama file
            return $pdf->stream($filename, array('Attachment' => 0));
        } else {
            return "Sertifikat tidak ditemukan.";
        }
    }

    // Sertif 20-23 Jan revisi
    public function showsertif20janrevisi(){
        $datas = DB::table('sertifikat20-23janrevisi')->paginate(20);
        // dd($datas);
        // $data = data::paginate(20);
        $rekomendasi = Event::orderByDesc('id')
                   ->take(3)->get();

        return view('sertifikat.index20-23Jan2024revisi', compact('datas', 'rekomendasi'), [ 
            'title' => 'Sertifikat Event'
        ]);
    }

    public function search20janrevisi(Request $request){
        $search = $request->input('search');


        $datas = DB::table('sertifikat20-23janrevisi')
                   ->where('nama', 'like', '%'.$search.'%')
                   ->orWhere('instansi', 'like', '%'.$search.'%')
                   ->paginate(20)->withQueryString();

        

        $rekomendasi = Event::orderByDesc('id')
                   ->take(3)->get();
        
    
        return view('sertifikat.index20-23Jan2024revisi', compact('datas', 'search', 'rekomendasi'), [ 
            'title' => 'Sertifikat Event'
        ]);
    }

    public function generate20janrevisi($id){
        $sertifikat = DB::table('sertifikat20-23janrevisi')->where('id', $id)->first();

        if ($sertifikat) {
            $nama = $sertifikat->nama;
            $instansi = $sertifikat->instansi;

            // Path menuju gambar template PNG
            $templateImage = public_path('templateSertif/sertifikat20-23jan2024.jpg');
                        
            $html = '<img src="' . $templateImage . '" style="margin-top:-50px;margin-left:-50px;background-color:red;position:absolute; left:0px;max-width:115%; max-height:115%; z-index:10;" />';
            // $html .= '<h1 style="position:absolute">ayam<h1>';
            $html .= '<h3 style="text-align:center;margin-top:200px;z-index:50; font-family:poppins; font-size:36px;">' . $nama . '</h3>';
            $html .= '<h5 style="text-align:center;margin-top:-30px;z-index:50; font-family:poppins; font-size:30px;">' .$instansi . '</h5>';
            // dd($html);
            
            $pdf = PDF::loadHTML($html);


            $filename = 'sertifikat_' . $nama . '.pdf';
            

            // Mengatur header HTTP untuk nama file
            return $pdf->stream($filename, array('Attachment' => 0));
        } else {
            return "Sertifikat tidak ditemukan.";
        }
    }

    // sertifikat 27-31 jan

    public function showsertif27jan(){
        $datas = DB::table('sertifikat27-31jan2024')->paginate(20);
        // dd($datas);
        // $data = data::paginate(20);
        $rekomendasi = Event::orderByDesc('id')
                   ->take(3)->get();

        return view('sertifikat.index27-31Jan2024', compact('datas', 'rekomendasi'), [ 
            'title' => 'Sertifikat Event'
        ]);
    }

    public function search27jan(Request $request){
        $search = $request->input('search');


        $datas = DB::table('sertifikat27-31jan2024')
                   ->where('nama', 'like', '%'.$search.'%')
                   ->orWhere('instansi', 'like', '%'.$search.'%')
                   ->paginate(20)->withQueryString();

        

        $rekomendasi = Event::orderByDesc('id')
                   ->take(3)->get();
        
    
        return view('sertifikat.index27-31Jan2024', compact('datas', 'search', 'rekomendasi'), [ 
            'title' => 'Sertifikat Event'
        ]);
    }

    public function generate27jan($id){
        $sertifikat = DB::table('sertifikat27-31jan2024')->where('id', $id)->first();

        if ($sertifikat) {
            $nama = $sertifikat->nama;
            $instansi = $sertifikat->instansi;

            // Path menuju gambar template PNG
            $templateImage = public_path('templateSertif/sertifikat27-31jan2024.jpg');
                        
            $html = '<img src="' . $templateImage . '" style="margin-top:-50px;margin-left:-50px;background-color:red;position:absolute; left:0px;max-width:115%; max-height:115%; z-index:10;" />';
            // $html .= '<h1 style="position:absolute">ayam<h1>';
            $html .= '<h3 style="text-align:center;margin-top:200px;z-index:50; font-family:poppins; font-size:36px;">' . $nama . '</h3>';
            $html .= '<h5 style="text-align:center;margin-top:-30px;z-index:50; font-family:poppins; font-size:30px;">' .$instansi . '</h5>';
            // dd($html);
            
            $pdf = PDF::loadHTML($html);


            $filename = 'sertifikat_' . $nama . '.pdf';
            

            // Mengatur header HTTP untuk nama file
            return $pdf->stream($filename, array('Attachment' => 0));
        } else {
            return "Sertifikat tidak ditemukan.";
        }
    }
    



    ///
        public function showSertifikat($sertifikatType, $viewName)
    {
        $datas = DB::table($sertifikatType)->paginate(20);
        $rekomendasi = Event::orderByDesc('id')->take(3)->get();

        return view($viewName, compact('datas', 'rekomendasi'), [
            'title' => 'Sertifikat Event'
        ]);
    }

    public function searchSertifikat1feb(Request $request, $sertifikatType, $viewName)
    {
        $search = $request->input('search');

        $datas = DB::table($sertifikatType)
            ->where('nama', 'like', '%' . $search . '%')
            ->orWhere('instansi', 'like', '%' . $search . '%')
            ->paginate(20)->withQueryString();

        $rekomendasi = Event::orderByDesc('id')->take(3)->get();

        return view($viewName, compact('datas', 'search', 'rekomendasi'), [
        'title' => 'Sertifikat Event'
        ]);
    }

    public function generateSertifikat1feb($sertifikatType, $id, $sertifikattemplate)
    {
        $sertifikat = DB::table($sertifikatType)->where('id', $id)->first();

        if ($sertifikat) {
            $nama = $sertifikat->nama;
            $instansi = $sertifikat->instansi;

            // Path menuju gambar template PNG
            $templateImage = public_path('templateSertif/' . $sertifikattemplate);

            $html = '<img src="' . $templateImage . '" style="margin-top:-50px;margin-left:-50px;background-color:red;position:absolute; left:0px;max-width:115%; max-height:115%; z-index:10;" />';
            $html .= '<h3 style="text-align:center;margin-top:200px;z-index:50; font-family:poppins; font-size:36px;">' . $nama . '</h3>';
            $html .= '<h5 style="text-align:center;margin-top:-30px;z-index:50; font-family:poppins; font-size:30px;">' . $instansi . '</h5>';

            $pdf = PDF::loadHTML($html);
            $filename = 'sertifikat_' . $nama . '.pdf';

            // Mengatur header HTTP untuk nama file
            return $pdf->stream($filename, array('Attachment' => 0));
        } else {
            return "Sertifikat tidak ditemukan.";
        }
    }

    public function generateSertifikat6feb($sertifikatType, $id, $sertifikattemplate)
    {
        $sertifikat = DB::table($sertifikatType)->where('id', $id)->first();

        if ($sertifikat) {
            $nama = $sertifikat->nama;
            $instansi = $sertifikat->instansi;

            // Path menuju gambar template PNG
            $templateImage = public_path('templateSertif/' . $sertifikattemplate);

            $html = '<img src="' . $templateImage . '" style="margin-top:-50px;margin-left:-50px;background-color:red;position:absolute; left:0px;max-width:115%; max-height:115%; z-index:10;" />';
            $html .= '<h3 style="text-align:center;margin-top:160px;z-index:50; font-family:poppins; font-size:36px;">' . $nama . '</h3>';
            $html .= '<h5 style="text-align:center;margin-top:-20px;z-index:50; font-family:poppins; font-size:30px;">' . $instansi . '</h5>';

            $pdf = PDF::loadHTML($html);
            $filename = 'sertifikat_' . $nama . '.pdf';

            // Mengatur header HTTP untuk nama file
            return $pdf->stream($filename, array('Attachment' => 0));
        } else {
            return "Sertifikat tidak ditemukan.";
        }
    }

    // 1-4 februari ab
    public function showsertif1febab()
    {
        return $this->showSertifikat('sertifikat1-4feb2024ab', 'sertifikat.index1-4Feb2024AB');
    }

    public function search1febab(Request $request)
    {
        return $this->searchSertifikat1feb($request, 'sertifikat1-4feb2024ab', 'sertifikat.index1-4Feb2024AB');
    }

    public function generate1febab($id)
    {
        return $this->generateSertifikat1feb('sertifikat1-4feb2024ab', $id, 'sertifikat1-4feb2024.jpg');
    }

     // 1-4 februari cd
     public function showsertif1febcd()
     {
         return $this->showSertifikat('sertifikat1-4feb2024cd', 'sertifikat.index1-4Feb2024CD');
     }
 
     public function search1febcd(Request $request)
     {
         return $this->searchSertifikat1feb($request, 'sertifikat1-4feb2024cd', 'sertifikat.index1-4Feb2024CD');
     }
 
     public function generate1febcd($id)
     {
         return $this->generateSertifikat1feb('sertifikat1-4feb2024cd', $id, 'sertifikat1-4feb2024.jpg');
     }

     // 1-4 februari ef
     public function showsertif1febef()
     {
         return $this->showSertifikat('sertifikat1-4feb2024ef', 'sertifikat.index1-4Feb2024EF');
     }
 
     public function search1febef(Request $request)
     {
         return $this->searchSertifikat1feb($request, 'sertifikat1-4feb2024ef', 'sertifikat.index1-4Feb2024EF');
     }
 
     public function generate1febef($id)
     {
         return $this->generateSertifikat1feb('sertifikat1-4feb2024ef', $id, 'sertifikat1-4feb2024.jpg');
     }


     //1-4 februari gi
     public function showsertif1febgi()
     {
         return $this->showSertifikat('sertifikat1-4feb2024gi', 'sertifikat.index1-4Feb2024GI');
     }
 
     public function search1febgi(Request $request)
     {
         return $this->searchSertifikat1feb($request, 'sertifikat1-4feb2024gi', 'sertifikat.index1-4Feb2024GI');
     }
 
     public function generate1febgi($id)
     {
         return $this->generateSertifikat1feb('sertifikat1-4feb2024gi', $id, 'sertifikat1-4feb2024.jpg');
     }

     // 1-4 februari JL
     public function showsertif1febjl()
     {
         return $this->showSertifikat('sertifikat1-4feb2024jl', 'sertifikat.index1-4Feb2024JL');
     }
 
     public function search1febjl(Request $request)
     {
         return $this->searchSertifikat1feb($request, 'sertifikat1-4feb2024jl', 'sertifikat.index1-4Feb2024JL');
     }
 
     public function generate1febjl($id)
     {
         return $this->generateSertifikat1feb('sertifikat1-4feb2024jl', $id, 'sertifikat1-4feb2024.jpg');
     }

     // 1-4 ferbuari M
     public function showsertif1febm()
     {
         return $this->showSertifikat('sertifikat1-4feb2024m', 'sertifikat.index1-4Feb2024M');
     }
 
     public function search1febm(Request $request)
     {
         return $this->searchSertifikat1feb($request, 'sertifikat1-4feb2024m', 'sertifikat.index1-4Feb2024M');
     }
 
     public function generate1febm($id)
     {
         return $this->generateSertifikat1feb('sertifikat1-4feb2024m', $id, 'sertifikat1-4feb2024.jpg');
     }

     //1-4 feb N
     public function showsertif1febn()
     {
         return $this->showSertifikat('sertifikat1-4feb2024n', 'sertifikat.index1-4Feb2024N');
     }
 
     public function search1febn(Request $request)
     {
         return $this->searchSertifikat1feb($request, 'sertifikat1-4feb2024n', 'sertifikat.index1-4Feb2024N');
     }
 
     public function generate1febn($id)
     {
         return $this->generateSertifikat1feb('sertifikat1-4feb2024n', $id, 'sertifikat1-4feb2024.jpg');
     }

     //1-4 feb O-R
     public function showsertif1febor()
     {
         return $this->showSertifikat('sertifikat1-4feb2024or', 'sertifikat.index1-4Feb2024OR');
     }
 
     public function search1febor(Request $request)
     {
         return $this->searchSertifikat1feb($request, 'sertifikat1-4feb2024or', 'sertifikat.index1-4Feb2024OR');
     }
 
     public function generate1febor($id)
     {
         return $this->generateSertifikat1feb('sertifikat1-4feb2024or', $id, 'sertifikat1-4feb2024.jpg');
     }

     //1-4 feb s
     public function showsertif1febs()
     {
         return $this->showSertifikat('sertifikat1-4feb2024s', 'sertifikat.index1-4Feb2024S');
     }
 
     public function search1febs(Request $request)
     {
         return $this->searchSertifikat1feb($request, 'sertifikat1-4feb2024s', 'sertifikat.index1-4Feb2024S');
     }
 
     public function generate1febs($id)
     {
         return $this->generateSertifikat1feb('sertifikat1-4feb2024s', $id, 'sertifikat1-4feb2024.jpg');
     }

     //1-4 feb tZ
     public function showsertif1febtz()
     {
         return $this->showSertifikat('sertifikat1-4feb2024tz', 'sertifikat.index1-4Feb2024TZ');
     }
 
     public function search1febtz(Request $request)
     {
         return $this->searchSertifikat1feb($request, 'sertifikat1-4feb2024tz', 'sertifikat.index1-4Feb2024TZ');
     }
 
     public function generate1febtz($id)
     {
         return $this->generateSertifikat1feb('sertifikat1-4feb2024tz', $id, 'sertifikat1-4feb2024.jpg');
     }

     //24-27 jan revisi

     public function showsertif24janrev()
     {
         return $this->showSertifikat('sertifikat24-27jan2024rev', 'sertifikat.index24-27Jan2024rev');
     }
 
     public function search24janrev(Request $request)
     {
         return $this->searchSertifikat1feb($request, 'sertifikat24-27jan2024rev', 'sertifikat.index24-27Jan2024rev');
     }
 
     public function generate24janrev($id)
     {
         return $this->generateSertifikat1feb('sertifikat24-27jan2024rev', $id, 'sertifikat24-27jan2024.jpg');
     }

     //28-31 revisi
     public function showsertif28janrev()
     {
         return $this->showSertifikat('sertifikat28-31jan2024rev', 'sertifikat.index28-31Jan2024rev');
     }
 
     public function search28janrev(Request $request){
        $search = $request->input('search');


        $datas = DB::table('sertifikat28-31jan2024rev')
                   ->where('nama', 'like', '%'.$search.'%')
                   ->orWhere('instansi', 'like', '%'.$search.'%')
                   ->paginate(20)->withQueryString();

        

        $rekomendasi = Event::orderByDesc('id')
                   ->take(3)->get();
        
    
        return view('sertifikat.index28-31Jan2024rev', compact('datas', 'search', 'rekomendasi'), [ 
            'title' => 'Sertifikat Event'
        ]);
    }
 
     public function generate28janrev($id)
     {
         return $this->generateSertifikat1feb('sertifikat28-31jan2024rev', $id, 'sertifikat27-31jan2024.jpg');
     }

     //6-9feb
     public function showsertif6feb()
     {
         return $this->showSertifikat('sertifikat6-9feb2024', 'sertifikat.index6-9Feb2024');
     }
 
     public function search6feb(Request $request)
     {
         return $this->searchSertifikat1feb($request, 'sertifikat6-9feb2024', 'sertifikat.index6-9Feb2024');
     }
 
     public function generate6feb($id)
     {
         return $this->generateSertifikat6feb('sertifikat6-9feb2024', $id, 'sertifikat6-9feb2024.jpg');
     }

    //  1-4 rev
    public function showsertif1febrev()
     {
         return $this->showSertifikat('sertifikat1-4febrev', 'sertifikat.index1-4Feb2024rev');
     }
 
     public function search1febrev(Request $request)
     {
         return $this->searchSertifikat1feb($request, 'sertifikat1-4febrev', 'sertifikat.index1-4Feb2024rev');
     }
 
     public function generate1febrev($id)
     {
         return $this->generateSertifikat1feb('sertifikat1-4febrev', $id, 'sertifikat1-4feb2024.jpg');
     }

    //  9-12 feb
    public function showsertif9feb()
    {
        return $this->showSertifikat('sertifikat9-12feb2024', 'sertifikat.index9-12Feb2024');
    }

    public function search9feb(Request $request)
    {
        return $this->searchSertifikat1feb($request, 'sertifikat9-12feb2024', 'sertifikat.index9-12Feb2024');
    }

    public function generate9feb($id)
    {
        return $this->generateSertifikat1feb('sertifikat9-12feb2024', $id, 'sertifikat9-12feb2024.jpg');
    }


    // sertif revisi 6-9 feb rev
    public function showsertif6febrev()
     {
         return $this->showSertifikat('sertifikat6-9feb2024rev', 'sertifikat.index6-9Feb2024rev');
     }
 
     public function search6febrev(Request $request)
     {
         return $this->searchSertifikat1feb($request, 'sertifikat6-9feb2024rev', 'sertifikat.index6-9Feb2024rev');
     }
 
     public function generate6febrev($id)
     {
         return $this->generateSertifikat1feb('sertifikat6-9feb2024rev', $id, 'sertifikat6-9feb2024.jpg');
     }

     //sertif 13-15 feb 2024
     public function showsertif13feb()
     {
         return $this->showSertifikat('sertifikat13-15feb2024', 'sertifikat.index13-15Feb2024');
     }
 
     public function search13feb(Request $request)
     {
         return $this->searchSertifikat1feb($request, 'sertifikat13-15feb2024', 'sertifikat.index13-15Feb2024');
     }
 
     public function generate13feb($id)
     {
         return $this->generateSertifikat1feb('sertifikat13-15feb2024', $id, 'sertifikat13-15feb2024.jpg');
     }


      //  9-12 feb rev
    public function showsertif9febrev()
    {
        return $this->showSertifikat('sertifikat9-12feb2024rev', 'sertifikat.index9-12Feb2024rev');
    }

    public function search9febrev(Request $request)
    {
        return $this->searchSertifikat1feb($request, 'sertifikat9-12feb2024rev', 'sertifikat.index9-12Feb2024rev');
    }

    public function generate9febrev($id)
    {
        return $this->generateSertifikat1feb('sertifikat9-12feb2024rev', $id, 'sertifikat9-12feb2024.jpg');
    }

    public function showsertif13febrev()
     {
         return $this->showSertifikat('sertifikat13-15feb2024rev', 'sertifikat.index13-15Feb2024rev');
     }
 
     public function search13febrev(Request $request)
     {
         return $this->searchSertifikat1feb($request, 'sertifikat13-15feb2024rev', 'sertifikat.index13-15Feb2024rev');
     }
 
     public function generate13febrev($id)
     {
         return $this->generateSertifikat1feb('sertifikat13-15feb2024rev', $id, 'sertifikat13-15feb2024.jpg');
     }
}
