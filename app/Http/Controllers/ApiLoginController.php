<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;




class ApiLoginController extends Controller
{
    public function login(Request $request)
    {
        

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            
        ]);

        $user = User::where('email', $request->email)->first();
       
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return $user->createToken('user login')->plainTextToken;

        
    }


    function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
    }

    

}
