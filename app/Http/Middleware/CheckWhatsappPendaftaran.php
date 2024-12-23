<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckWhatsappPendaftaran
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $slug = $request->input('slug');
        $whatsapp = $request->input('whatsapp');

        if (DB::table($slug)->where('whatsapp', $whatsapp)->exists()) {
            return redirect()->back()->withErrors(['whatsapp' => 'Nomor WhatsApp sudah terdaftar.']);
        }
        
        return $next($request);
    }
}
