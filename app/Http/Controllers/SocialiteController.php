<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ecourse;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class SocialiteController extends Controller
{
    public function redirect()
    {   
        
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        
        $googleUser = Socialite::driver('google')->user();
        $dataDariShow = session('data_dari_show');
        $slug = $dataDariShow->slug;
    
        
        $registeredUser = User::where('google_id', $googleUser->id)->first();
    
        if (!$registeredUser) {
            // Periksa jika email sudah terdaftar
            $userWithEmail = User::where('email', $googleUser->email)->first();
    
            if ($userWithEmail) {
                
                $userWithEmail->update([
                    'google_id' => $googleUser->id,
                    'google_token' => $googleUser->token,
                    'google_refresh_token' => $googleUser->refreshToken,
                ]);
    
                Auth::login($userWithEmail);
            } else {
                
                $user = User::create([
                    'google_id' => $googleUser->id,
                    'namalengkap' => $googleUser->name,
                    'username' => $googleUser->id,
                    'password' => Hash::make('123'),
                    'email' => $googleUser->email,
                    'google_token' => $googleUser->token,
                    'google_refresh_token' => $googleUser->refreshToken,
                ]);
    
                Auth::login($user);
            }
    
            if ($dataDariShow) {
                return redirect()->route('ecourse.show', ['ecourse' => $slug]);
            } else {
                return redirect()->route('ecourse.index');
            }
        }
    
        
        Auth::login($registeredUser);
    
        if ($dataDariShow) {
            return redirect()->route('ecourse.show', ['ecourse' => $slug]);
        } else {
            return redirect()->route('ecourse.index');
        }
    }
}
