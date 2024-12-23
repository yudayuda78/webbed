<?php

namespace App\Http\Controllers;

use App\Models\Pendaftarandiklat;
use App\Models\Formpendaftaran;
use App\Http\Requests\StorePendaftarandiklatRequest;
use App\Http\Requests\UpdatePendaftarandiklatRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str; 


class PendaftarandiklatController extends Controller
{   
      /**
     * Generate and save nomor pendaftaran.
     *
     * @param string $table
     * @return int
     */
    private function generateAndSaveNomorPendaftaran($table)
    {
        $nomorPendaftaran = DB::table($table)->max('nomorpendaftaran');
        $nomorPendaftaran = $nomorPendaftaran ? $nomorPendaftaran + 1 : 1;

        return $nomorPendaftaran;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendaftarandiklat = Pendaftarandiklat::with('header')->get();
        return view('pendaftaran.index', compact('pendaftarandiklat' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $dataDariShow = session('data_dari_show');

        $folderPath = storage_path('app/public/post-images/' . $dataDariShow->judul);
        File::makeDirectory($folderPath, $mode = 0777, true, true);

        // return $request->file('image1')->store('public/post-images/' . $dataDariShow->judul);
        $slug = $request->input('slug');
        $slugedit = str_replace("pendaftaran", "sertifikat", $slug );

        $nomorPendaftaran = $this->generateAndSaveNomorPendaftaran($slugedit);

        $nama = $request->input('nama');
        $namaedit = str_replace(['.', ',', "'"], '-', $nama);
        $namaedit = Str::slug($namaedit, '-');

        $gabungannamaid = $namaedit . $nomorPendaftaran;

        

        
        
        $data = $request->validate([
            'judul' => 'required',
            'nama' => 'required',
            'instansi' => 'required',
            'profesi' => 'required',
            'email' => 'required|email',
            'whatsapp' => 'required|numeric',
            'provinsi' => 'required',
            
           
            
            'image1' => 'image|file|max:1024',
            'image2' => 'image|file|max:1024',
            'image3' => 'image|file|max:1024',
            'image4' => 'image|file|max:1024',
            'image5' => 'image|file|max:1024',
        ]);

        $datasertif = [
            'nomorpendaftaran' => $nomorPendaftaran,
            'nama' => $request->input('nama'),
            'instansi' => $request->input('instansi'),
            'slug' => $gabungannamaid,
            'kegiatan' => $request->input('kegiatan'),
            'fasilitas' => $request->input('fasilitas'),
            'jenis' => $request->input('jenis'),
            
            
            
            
        ];

        $datanol = [];

        $filePaths = [];

        for ($i = 1; $i <= 5; $i++) {
            $imageName = 'image' . $i;
            if ($request->hasFile($imageName)) {
                $filePaths[$imageName] = $request->$imageName->store('public/post-images/' . $dataDariShow->judul);
            }
        }
    
        if ($dataDariShow->jenis == 'workshop') {
            $formWorkshopData = [
                'judul' => $data['judul'],
                'nama' => $data['nama'],
                'instansi' => $data['instansi'],
                'profesi' => $data['profesi'],
                'email' => $data['email'],
                'whatsapp' => $data['whatsapp'],
                'provinsi' => $data['provinsi'],
            ];
    
            session(['data_dari_form' => $formWorkshopData]);
            $dataNew = DB::table($slug)->insertGetId($formWorkshopData + $filePaths);
            session(['data_dari_formID' => $dataNew]);
        }else{
            DB::table($slug)->insert($data + $filePaths);
        };
        
        
        
    

        
        

        
        
        $modelInstance = DB::table($slug)->where('nama', $data['nama'])->first();

        
        if ($modelInstance) {
            $modelInstance = (array) $modelInstance;
            DB::table($slug)->where('nama', $data['nama'])->update([
                'image1' => isset($filePaths['image1']) ? basename($filePaths['image1']) : null,
                'image2' => isset($filePaths['image2']) ? basename($filePaths['image2']) : null,
                'image3' => isset($filePaths['image3']) ? basename($filePaths['image3']) : null,
                'image4' => isset($filePaths['image4']) ? basename($filePaths['image4']) : null,
                'image5' => isset($filePaths['image5']) ? basename($filePaths['image5']) : null,
            ]);
        }


        
        
        // $formPendaftaran->update([
        //     'image1' => isset($filePaths['image1']) ? basename($filePaths['image1']) : null,
        //     'image2' => isset($filePaths['image2']) ? basename($filePaths['image2']) : null,
        //     'image3' => isset($filePaths['image3']) ? basename($filePaths['image3']) : null,
        //     'image4' => isset($filePaths['image4']) ? basename($filePaths['image4']) : null,
        //     'image5' => isset($filePaths['image5']) ? basename($filePaths['image5']) : null,
        // ]);

        if ($dataDariShow->jenis == 'workshop'){
            DB::table($slugedit)->insert($datanol);
        }else{
            DB::table($slugedit)->insert($datasertif);
        }
        

        if($dataDariShow->jenis == 'webinarnew'){
            return redirect('/suksesdaftar');}
        elseif($dataDariShow->jenis == 'workshop'){
            return redirect('/donasiworkshop2');
        }
        else{
            return redirect('/suksesdaftar2');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePendaftarandiklatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePendaftarandiklatRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pendaftarandiklat  $pendaftarandiklat
     * @return \Illuminate\Http\Response
     */
    public function show(Pendaftarandiklat $pendaftarandiklat)
    {
        
        //
        session(['data_dari_show' => $pendaftarandiklat]);
        $jumlahdaftar = DB::table($pendaftarandiklat->slug)->count();
        
        
        if($pendaftarandiklat->dibuka === 1){
            if ($pendaftarandiklat->jenis == 'workshop') {
                return view('pendaftaran.formpendaftaranworkshop', compact('jumlahdaftar'), [
                    "pendaftaran" => $pendaftarandiklat,
                    'title' => 'Pendaftaran'
                ]);
            } else {
                return view('pendaftaran.formpendaftaran', compact('jumlahdaftar'), [
                    "pendaftaran" => $pendaftarandiklat,
                    'title' => 'Pendaftaran'
                ]);
            }
        }
        else{
            return view('pendaftaran.ditutup',compact('jumlahdaftar'), [
                "pendaftaran" => $pendaftarandiklat,
                'title' => 'Pendaftaran'
            ]);  
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pendaftarandiklat  $pendaftarandiklat
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendaftarandiklat $pendaftarandiklat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePendaftarandiklatRequest  $request
     * @param  \App\Models\Pendaftarandiklat  $pendaftarandiklat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePendaftarandiklatRequest $request, Pendaftarandiklat $pendaftarandiklat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pendaftarandiklat  $pendaftarandiklat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pendaftarandiklat $pendaftarandiklat)
    {
        //
    }

    public function sukses(){

        $dataDariShow = session('data_dari_show');

        return view('pendaftaran.sukses',[
            'dataDariShow' => $dataDariShow,
        ]);
    }

    public function sukses2(){

        $dataDariShow = session('data_dari_show');

        return view('pendaftaran.suksesdaftar2',[
            'dataDariShow' => $dataDariShow,
        ]);
    }

    public function donasiworkshop(){
        $dataDariShow = session('data_dari_show');
        $dataDariForm = session('data_dari_form');
        $dataDariFormID = session('data_dari_formID');
        return view('pendaftaran.donasiworkshop',[
            'dataDariShow' => $dataDariShow,
            'dataDariForm' => $dataDariForm,
            'dataDariFormId' => $dataDariFormID,
        ]);
    }

    public function tambahdatadonasi(Request $request){
        $dataDariShow = session('data_dari_show');
        $dataDariForm = session('data_dari_form');
        $dataDariFormID = session('data_dari_formID');


        $slug = $dataDariShow->slug;
        $newSlug = str_replace('evaluasi', 'sertifikat', $slug);

        
        $data = $request->validate([
            'image1' => 'image|file|max:1024',
        ]);

        if ($request->hasFile('image1')) {
            $destinationPath = public_path('donasiworkshop/' . $slug);
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            $file = $request->file('image1');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move($destinationPath, $imageName);
            $imagePath =  $imageName;
        } else {
            $imagePath = null;
        }

        $datadonasi = [
            'statuspembayaran' => $request->input('statuspembayaran'),
            'bank' => $request->input('bank'),
            'nominal' => $request->input('nominal'),
            'bukti' => $imagePath,
        ];


        
            
            DB::table($slug)->where('id', $dataDariFormID)->update($datadonasi);
        

        return redirect('/suksesdaftar2');
    }

    public function lacak(Request $request){
        $search = $request->input('search');
        $dataDariShow = session('data_dari_show');
        
        // Tambahkan pengecekan apakah session 'data_dari_show' sudah ada
        if (session()->has('data_dari_show')) {
            $pendaftarandiklat = session('data_dari_show');

            $datas = DB::table($dataDariShow->slug)->where('nama', 'like', '%'.$search.'%')
                       ->orWhere('instansi', 'like', '%'.$search.'%')
                       ->paginate(20)->withQueryString();
            
            // $datas = Formpendaftaran::where('nama', 'like', '%'.$search.'%')
            //            ->orWhere('instansi', 'like', '%'.$search.'%')
            //            ->paginate(20)->withQueryString();
    
            return view('pendaftaran.lacak', compact('datas', 'search', 'pendaftarandiklat'), [ 
                'title' => 'Cek Pendaftaran'
            ]);
        } else {
            // Handle jika session 'data_dari_show' tidak ada
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }


   

}
