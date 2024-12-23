<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\isiContent;
use App\Models\Ebook;
use App\Models\Powerpoint;

class ContentController extends Controller
{
    public function index()
    {

        $isiContent = isiContent::paginate(12);

        return view('ticykit.worksheet.worksheet', [
            "isiContent" => $isiContent,
            'title' => 'worksheet'
        ]);
    }

    public function show(isiContent $isiContent)
    {
        return view('ticykit.worksheet.worksheet-detail', [
            "content" => $isiContent,
            'title' => 'worksheet'
        ]);
    }

    public function filter(Request $request)
    {
        // $category = $request->input('category');
        // $kelas = $request->input('kelas');

        // $isiContent = isiContent::query();

        // if ($category) {
        //     $isiContent->where('category', $category);
        // }

        // if ($kelas) {
        //     $isiContent->where('kelas', $kelas);
        // }

        // $isiContent = $isiContent->get();

        // return view('layouts.content', compact('isiContent'));


        $category = $request->category;

        if ($category) {
            $isiContent = isiContent::where('category', $category)->get();
        } else {
            $isiContent = isiContent::all();
        }

        return view('ticykit.worksheet.worksheet', [
            "isiContent" => isiContent::all(),
            'title' => 'worksheet'
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        // Lakukan pencarian disini, misalnya dengan model Eloquent
        $isiContent = isiContent::where('title', 'like', '%' . $search . '%')
            ->orWhere('category', 'like', '%' . $search . '%')
            ->paginate(12);

        return view('ticykit.worksheet.worksheet', compact('isiContent', 'search'), [
            'title' => 'worksheet'
        ]);
    }

    public function download($id)
    {
        $filedownload = isiContent::where('id', $id)->first();
        $pathToFile = public_path("file/{$filedownload->file}");
        return \Response::download($pathToFile);
    }


    //ebook controller (belum diubah untuk pengambilan database ebook)
    public function ebookindex()
    {
        $ebook = Ebook::paginate(12);

        return view('ticykit.ebook.ebook', [
            "isiContent" => $ebook,
            'title' => 'ebook'
        ]);
    }
    public function ebookshow(Ebook $ebook)
    {
        
        return view('ticykit.ebook.ebook-detail', [
            "content" => $ebook,
            'title' => 'ebook pendidikan'
        ]);
    }

    public function ebooksearch(Request $request)
    {
        $search = $request->input('search');
        // Lakukan pencarian disini, misalnya dengan model Eloquent
        $isiContent = Ebook::where('title', 'like', '%' . $search . '%')
            ->orWhere('category', 'like', '%' . $search . '%')
            ->paginate(12);

        return view('ticykit.ebook.ebook', compact('isiContent', 'search'), [
            'title' => 'worksheet'
        ]);
    }

    public function ebookdownload($id)
    {
        $filedownload = Ebook::where('id', $id)->first();
         // Cek apakah $filedownload ditemukan
    if (!$filedownload) {
        return redirect()->back()->withErrors('File tidak ditemukan.');
    }
   

    // Ubah path ke folder fileebook
    $pathToFile = public_path("fileebook/{$filedownload->file}");
    // dd($pathToFile);

    // Cek apakah file benar-benar ada di server
    if (!file_exists($pathToFile)) {
        return redirect()->back()->withErrors('File tidak ditemukan di server.');
    }

    return \Response::download($pathToFile);
    }



    //ppt
    public function pptindex(){
        $ppt = Powerpoint::paginate(12);

        return view('ticykit.ppt.ppt', [
            "isiContent" => $ppt,
            'title' => 'PowerPoint'
        ]);
    }

    public function pptsearch(Request $request){
        $search = $request->input('search');
        // Lakukan pencarian disini, misalnya dengan model Eloquent
        $isiContent = Powerpoint::where('title', 'like', '%' . $search . '%')
            ->orWhere('category', 'like', '%' . $search . '%')
            ->paginate(12);

        return view('ticykit.ebook.ebook', compact('isiContent', 'search'), [
            'title' => 'worksheet'
        ]);
    }

    public function pptdownload($id){
        $filedownload = Ebook::where('id', $id)->first();
         // Cek apakah $filedownload ditemukan
    if (!$filedownload) {
        return redirect()->back()->withErrors('File tidak ditemukan.');
    }
   

    // Ubah path ke folder fileebook
    $pathToFile = public_path("fileppt/{$filedownload->file}");
    // dd($pathToFile);

    // Cek apakah file benar-benar ada di server
    if (!file_exists($pathToFile)) {
        return redirect()->back()->withErrors('File tidak ditemukan di server.');
    }

    return \Response::download($pathToFile);
    }
}
