<?php

namespace App\Http\Controllers;
use App\Models\Pendaftarandiklat;
use App\Http\Resources\PendaftaranResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ApiPendaftaranController extends Controller
{
    public function index(Request $request){
        // Log::info('User is authenticated: ' . ($request->user() ? 'Yes' : 'No'));

        // if ($request->user()) {
        //     $pendaftarandiklat = Pendaftarandiklat::all();
        //     return PendaftaranResource::collection($pendaftarandiklat);
        // } else {
        //     return response()->json(['message' => 'Unauthorized'], 401);
        // }
        

        $pendaftarandiklat = Pendaftarandiklat::all();
        return PendaftaranResource::collection($pendaftarandiklat);
        
    }


    public function show($id){
        $pendaftarandiklat = Pendaftarandiklat::findOrFail($id);
        return new PendaftaranResource($pendaftarandiklat);
    }
    
    public function store(Request $request){
        return response()->json('berhasil');
    }
}
