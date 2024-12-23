<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class Editprofil extends Controller
{
    //
    public function edit()
    {
        $user = Auth::user();
        return view('user.editprofil', compact('user'), [
            'title' => 'Edit Profil'
        ]);
        
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);
        
        $request->validate([
            // 'username' => 'required|max:255|unique:users, username, ' .$user->id,
            'email' => 'required|email:dns',
            'namalengkap' => 'required|max:255',
            'nomortelepon' => 'required',
            'pekerjaan' => 'required'
            
        ]);

    

        $user->email = $request->email;
        $user->namalengkap = $request->namalengkap;
        $user->nomortelepon = $request->nomortelepon;
        $user->pekerjaan = $request->pekerjaan;

        $user->save();

        return redirect()->route('profile.edit')->with('updateberhasil', 'Profil berhasil diperbarui.');
        // dd('its work');

        
    }
}
