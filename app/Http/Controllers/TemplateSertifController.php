<?php

namespace App\Http\Controllers;

use App\Models\TemplateSertif;
use App\Http\Requests\StoreTemplateSertifRequest;
use App\Http\Requests\UpdateTemplateSertifRequest;
use Illuminate\Http\Request;

class TemplateSertifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $templateSertif = TemplateSertif::paginate(10);

        return view('admin.templatesertif.index', compact('templateSertif'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = $request->validate([
            'image1' => 'image|file|max:1024',
        ]);

        if ($request->hasFile('image1')) {
            $file = $request->file('image1');
            $originalName = $file->getClientOriginalName();
            $destinationPath = public_path('templateSertif');
            $file->move($destinationPath, $originalName);
            $imagePath = $originalName;
        } else {
            $imagePath = null;
        }

        $datatemplate = [
            
            'nama' => $imagePath,
            
        ];

        

        TemplateSertif::insert($datatemplate);

        

        return redirect()->route('indextemplatesertif');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTemplateSertifRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTemplateSertifRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TemplateSertif  $templateSertif
     * @return \Illuminate\Http\Response
     */
    public function show(TemplateSertif $templateSertif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TemplateSertif  $templateSertif
     * @return \Illuminate\Http\Response
     */
    public function edit(TemplateSertif $templateSertif)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTemplateSertifRequest  $request
     * @param  \App\Models\TemplateSertif  $templateSertif
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTemplateSertifRequest $request, TemplateSertif $templateSertif)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TemplateSertif  $templateSertif
     * @return \Illuminate\Http\Response
     */
    public function destroy(TemplateSertif $templateSertif)
    {
        //
    }
}
