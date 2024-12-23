<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Mail\MyTestMail;
use Illuminate\Support\Facades\Mail;


class MailController extends Controller
{
    public function index(){

        set_time_limit(60);

        $details = [
        'title' => 'Mail from websitepercobaan.com',
        'body' => 'This is for testing email using smtp'
        ];
       
        \Mail::to('naikpangkat10@gmail.com')->send(new \App\Mail\TestMail($details));
       
        dd("Email sudah terkirim.");
    
    }
}
