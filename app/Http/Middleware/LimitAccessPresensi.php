<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LimitAccessPresensi
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

        $userIp = $request->ip();
        $page = $request->path();

        $key = "access_count.{$userIp}.{$page}";

        $accessCount = session($key, 0);


        if ($accessCount >= 2) {
            // Batasi akses jika sudah lebih dari atau sama dengan 3 kali
            return redirect()->route('absensi.limit');
        }

        // Tambah jumlah akses dan simpan di session
        session([$key => $accessCount + 1]);
        return $next($request);
    }
}
