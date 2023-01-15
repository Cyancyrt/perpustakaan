<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Databuku;
use App\Models\Kategori;
use App\Models\Datasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('siswa.login');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'nisn'  => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::guard('siswa')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('siswa.index'))->with('success');
        }

        return back()->withErrors([
            'nisn' => 'NISN or Password is wrong!',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
    }
    public function index(Databuku $databuku)
    {
        $siswas = Siswa::get();
        $databuku = Databuku::all();
        // dd($databuku);
        return view('siswa.index', [
            'siswas' => $siswas,
            'databuku' => $databuku,
        ]);
    }
    public function kategori(Kategori $kategori, Databuku $databuku)
    {

        $databuku = $kategori->databuku->load('kategori');

        return view('siswa.kategori.databuku', [
            'databuku' => $databuku,
            'title' => $kategori->name
        ]);
    }
    public function kategoriView()
    {
        return view('siswa.kategori.kategori');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswa.register.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nisn' => 'required|unique:datasiswas',
            'email' => 'required|unique:datasiswas',
            'username' => 'required|unique:datasiswas',
            'password' => 'required',
        ]);
        $datasiswa = new Datasiswa;
        $datasiswa->name = $request->name;
        $datasiswa->nisn = $request->nisn;
        $datasiswa->username = $request->username;
        $datasiswa->email = $request->email;
        $datasiswa->password = bcrypt($request->password);
        $datasiswa->save();
        return redirect()->route('siswa.login')->with('sukses', 'Akun Berhasil Dibuat!');
    }
    public function forgotform()
    {
        $datasiswa = Datasiswa::all();
        return view('siswa.register.form', [
            'datasiswa' => $datasiswa
        ]);
    }
    public function forgotpost(Request $request)
    {
        $request->validate([
            'email' => ['required'],
        ]);
        $datasiswa = Datasiswa::where('email', $request->email)->first();
        if ($datasiswa == true) {
            return redirect()->route('change.form', $datasiswa->nisn);
        } elseif ($datasiswa == false) {
            return back()->withErrors([
                'email' => 'email unregistered or not found'
            ]);
        }
        return back();
    }
    public function passform($email)
    {
        $datasiswa = Datasiswa::all();
        return view('siswa.register.change', [
            'datasiswa' => $datasiswa
        ]);
    }
    public function passPost(Request $request)
    {
        $request->validate([
            'nisn' => 'required',
            'password' => 'required',
        ]);
        $datasiswa = Datasiswa::where('nisn', $request->nisn)->first();
        if ($datasiswa == true) {
            $datasiswa->password = bcrypt($request->password);
            $datasiswa->save();

            return redirect()->route('siswa.login');
        } else {
            return back()->withErrors([
                'nisn' => 'nisn not found'
            ]);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa, $id)
    {
        $databuku = Databuku::find($id);
        return view('partial.modal', compact('databuku'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        //
    }
}
