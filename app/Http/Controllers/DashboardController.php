<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Barang;
use App\Packing;
use App\Dokumen;
use App\Aturan;
use App\Tag;
use App\Mitra;
use App\Pesan;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all()->count();
        $barang = Barang::all()->count();
        $packing = Packing::all()->count();
        $dokumen = Dokumen::all()->count();
        $aturan = Aturan::all()->count();
        $tag = Tag::all()->count();
        $mitra = Mitra::all()->count();
        $pesan = Pesan::all()->count();

        return view('dashboard', compact('user', 'barang', 'packing', 'dokumen', 'aturan', 'tag', 'mitra', 'pesan'));
    }
}
