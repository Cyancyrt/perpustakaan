<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\pinjam;
use App\Models\Databuku;
use App\Models\Datasiswa;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Boolean;

class PinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        $user = auth()->user();
        $buku = Databuku::where('id', $id)->get()->first();
        $idbuku = $buku->bookid;
        $pinjam = pinjam::where('book_id', $idbuku)->first();
        if (!empty($pinjam)) {
            if (pinjam::where('status_id', 1)->get()->first()) {
                if ($pinjam->status_id == 3 || 2) {
                    pinjam::create([
                        'book_id' => $buku->bookid,
                        'title' => $buku->title,
                        'siswa_id' => $user->id,
                        'user' => $user->name,
                        'sinopsis' => $buku->sinopsis,
                        'id_user' => $user->nisn,
                        'databuku_id' => $buku->id,
                        'qty' => 1,
                        'borrow_date' => Carbon::now()->format('Y-m-d'),
                        'expire_date' => Carbon::now()->format('Y-m-d'),
                        'status_id' => 1
                    ]);
                } else if ($pinjam->status_id != 3) {
                    $pinjam->qty++;
                    $pinjam->status_id = 2;
                    $pinjam->save();
                }
            } else {
                $pinjam = pinjam::create([
                    'book_id' => $buku->bookid,
                    'title' => $buku->title,
                    'siswa_id' => $user->id,
                    'user' => $user->name,
                    'sinopsis' => $buku->sinopsis,
                    'id_user' => $user->nisn,
                    'databuku_id' => $buku->id,
                    'qty' => 1,
                    'borrow_date' => Carbon::now()->format('Y-m-d'),
                    'expire_date' => Carbon::now()->format('Y-m-d'),
                    'status_id' => 1
                ]);
            }
        } else {
            $pinjam = pinjam::create([
                'book_id' => $buku->bookid,
                'title' => $buku->title,
                'siswa_id' => $user->id,
                'user' => $user->name,
                'id_user' => $user->nisn,
                'sinopsis' => $buku->sinopsis,
                'databuku_id' => $buku->id,
                'qty' => 1,
                'borrow_date' => Carbon::now()->format('Y-m-d'),
                'expire_date' => Carbon::now()->format('Y-m-d'),
                'status_id' => 1
            ]);
        }

        // dd($pinjam);
        if ($pinjam == true) {
            $buku->qty--;
            $buku->save();
        }
        return back()->with('sukses', 'tunggu persetujuan admin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $i = Carbon::now();
        $user = Auth::user();
        $pinjam = Pinjam::all();
        $databuku = Databuku::all();
        $pinjams = $pinjam->where('id')->first();
        if (empty($pinjams)) {
            return view('siswa.pinjam.buku', [
                'pinjam' => $pinjam,
                'user' => $user,
                'databuku' => $databuku
            ]);
        } elseif (!empty($pinjams)) {
            $ex = $pinjams->expire_date;
            $dif = $i->diffInDays($ex);
            $penalty = 3000;
            $sum = abs($dif * $penalty);
            return view('siswa.pinjam.buku', [
                'pinjam' => $pinjam,
                'sum' => $sum,
                'dif' => $dif,
                'databuku' => $databuku,
                'user' => $user
            ]);
        }
    }
    public function return($id)
    {
        $pinjam = pinjam::where('id', $id)->first();
        $pinjams = $pinjam->databuku_id;
        // dd($pinjams);
        $buku = Databuku::findOrfail($pinjams);
        $buku->qty++;
        $buku->save();
        while ($pinjam->status_id == 2) {
            $pinjam->qty--;
            $pinjam->save();
            if ($pinjam->qty < 1) {
                $pinjam->status_id = 3;
                $pinjam->save();
            }
            return back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pinjam  $pinjam
     * @return \Illuminate\Http\Response
     */
    public function show(pinjam $pinjam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pinjam  $pinjam
     * @return \Illuminate\Http\Response
     */
    public function edit(pinjam $pinjam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pinjam  $pinjam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pinjam $pinjam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pinjam  $pinjam
     * @return \Illuminate\Http\Response
     */
    public function destroy(pinjam $pinjam)
    {
        //
    }
}
