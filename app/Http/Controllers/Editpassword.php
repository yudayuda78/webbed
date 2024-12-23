<?php

namespace App\Http\Controllers;
use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Editpassword extends Controller
{
    //
    public function edit()
    {
        $user = Auth::user();
        return view('password.editpassword', compact('user'), [
            'title' => 'Ubah Password'
        ]);
        
    }

    public function update(Request $request)
    {

        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'min:6', 'confirmed'],
        ]);

        if(Hash::check($request->current_password, auth()->user()->password)) {
            auth()->user()->update(['password' => Hash::make($request->password)]);
            
            return back()->with('message', 'Password benar');
        }
        
        throw ValidationException::withMessages([
            'current_password' => 'Password Salah',
        ]);
        
    }
}
