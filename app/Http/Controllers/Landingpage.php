<?php

namespace App\Http\Controllers;

use App\Models\isiContent;
use Illuminate\Http\Request;

class Landingpage extends Controller
{
    //
    public function index()
    {
        return view('home.home', [
            'title' => 'Home'
        ]);
    }

    public function indexticykit()
    {
        $isiContent = IsiContent::take(12)->get();
        $fullContent = isiContent::all();

        return view('ticykit.index', [
            "isiContent" => $isiContent,
            "fullContent" =>$fullContent,
            'title' => 'TicyKit'
        ]);
    }
}
