<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin;
use App\Models\pinjam;
use App\Models\Databuku;
use App\Models\Kategori;
use App\Models\Datasiswa;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Contracts\Service\Attribute\Required;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('home');
    }
    public function login()
    {
        return view('admin.login');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'uuid' => ['required', 'numeric'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('admin.index'))->with('success');
        }

        return back()->withErrors([
            'uuid' => 'UUID or Password is wrong!',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
    }
    public function index()
    {
        // dd(Auth::user());
        $admins = Admin::get();

        return view('admin.index', [
            'admins' => $admins,
        ]);
    }

    // CRUD Data siswa
    public function datasiswaindex()
    {
        // $datasiswa = Datasiswa::get();
        $datasiswa = Datasiswa::select('id', 'name')->get();
        return view('admin.datasiswa.datasiswa', [
            'datasiswa' => $datasiswa,
            'datasiswa' => Datasiswa::paginate(10)
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datasiswacreate()
    {
        return view('admin.datasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function datasiswastore(Request $request)
    {
        // // dd($request->all());
        $request->validate([
            'name' => 'required',
            'nisn' => 'required|unique:datasiswas',
            'email' => 'required|unique:datasiswas',
            'username' => 'requred|unique:datasiswas',
            'password' => 'required',
        ]);
        $datasiswa = new Datasiswa;
        $datasiswa->name = $request->name;
        $datasiswa->nisn = $request->nisn;
        $datasiswa->username = $request->username;
        $datasiswa->email = $request->email;
        $datasiswa->password = bcrypt($request->password);
        $datasiswa->save();
        return redirect()->route('datasiswa.datasiswa')->with('sukses', 'Akun Berhasil Dibuat!');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function datasiswashow(Datasiswa $datasiswa, $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function datasiswaedit(Datasiswa $datasiswa, $id)
    {
        $datasiswa = DataSiswa::findOrfail($id);
        return view('admin.datasiswa.edit')->with('datasiswa', $datasiswa);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function datasiswaupdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'nisn' => 'required|unique:datasiswas'
        ]);
        $datasiswa = DataSiswa::findOrfail($id);
        $datasiswa->name = $request->name;
        $datasiswa->nisn = $request->nisn;
        $datasiswa->save();
        return redirect()->route('datasiswa.datasiswa')->with('sukses', 'data telah diganti');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function datasiswadestroy($id)
    {

        $datasiswa = DataSiswa::findOrfail($id);

        if ($datasiswa->delete()) {
            return redirect()
                ->route('datasiswa.datasiswa')
                ->with([
                    'success' => 'Post has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('datasiswa.datasiswa')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
    // CRUD data buku
    public function databukuindex(Databuku $databuku)
    {
        $databuku = Databuku::all();
        $judul = Databuku::pluck('title');
        return view('admin.databuku.databuku', [
            'databuku' => $databuku,
            'title' => $judul,
        ]);
    }
    public function databukucreate()
    {
        $kategori = Kategori::all();
        return view('admin.databuku.create', compact('kategori'));
    }
    public function databukustore(Request $request, Kategori $kategori)
    {
        $request->validate([
            'title' => 'required',
            'bookid' => 'required|unique:databukus',
            'image' => 'required',
            'qty' => 'required',
            'kategori_id' => 'required'
        ]);

        $databuku = new Databuku;
        $databuku->title = $request->title;
        $databuku->bookid = $request->bookid;
        $databuku->qty = $request->qty;
        $databuku->kategori_id = $request->kategori_id;
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image'), $filename);
            $databuku['image'] = $filename;
        }
        // dd($databuku);
        $databuku->save();
        return redirect()->route('databuku.databuku')->with('sukses', 'Data Berhasil Disimpan!');
    }
    public function databukushow()
    {
    }
    public function databukuedit(Databuku $databuku, $id)
    {
        $databuku = Databuku::findOrfail($id);
        return view('admin.databuku.edit', [
            'databuku' => $databuku
        ]);
    }
    public function databukuupdate(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'bookid' => 'required|unique:databukus'
        ]);
        $databuku = DataSiswa::findOrfail($id);
        $databuku->title = $request->title;
        $databuku->bookid = $request->bookid;
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image'), $filename);
            $databuku['image'] = $filename;
        }
        $databuku->save();
        return redirect()->route('databuku.databuku')->with('sukses', 'data telah diganti');
    }
    public function databukudestroy($id)
    {
        $databuku = Databuku::findOrfail($id);

        if ($databuku->delete()) {
            return redirect()
                ->route('databuku.databuku')
                ->with([
                    'success' => 'Post has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('databuku.databuku')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
    public function kategori(Kategori $kategori, Databuku $databuku)
    {

        $databuku = $kategori->databuku->load('kategori');

        return view('admin.kategori.databuku', [
            'databuku' => $databuku,
            'title' => $kategori->name
        ]);
    }
    public function kategoriView()
    {
        return view('admin.kategori.kategori');
    }
    public function confirm()
    {
        $pinjam = pinjam::all();
        return view('admin.pinjaman.data', [
            'pinjam' => $pinjam,
        ]);
    }
    public function updateCon($id)
    {
        $datapinjam = pinjam::findOrfail($id);
        $tmrw = Carbon::tomorrow();
        if ($datapinjam->created_at == $tmrw) {
            $datapinjam->delete();
        }
        $datapinjam->status_id = 2;
        $datapinjam->expire_date = Carbon::now()->addDays(5)->format('Y-m-d');
        $datapinjam->created_at = Carbon::now()->format('Y-m-d');
        $datapinjam->save();
        return back()->with('sukses', 'telah dikonfirmasi');
    }
}
