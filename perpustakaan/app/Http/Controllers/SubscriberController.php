<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\Subscribe;
use App\Models\pinjam;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class SubscriberController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $emails = $user->email;
        $pinjam = $user->pinjam;
        foreach ($pinjam as $p) {
            $new = $p->title;
        }

        $email = array(
            'email' => $emails,
            'pinjaman' => $new,
        );

        Mail::to($emails)->send(new Subscribe($email));

        dd("sukses");
    }
}
