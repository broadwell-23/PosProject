<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Mitra;
use App\Pesan;
use App\Kamus;

class WebController extends Controller
{
    public function index()
    {
        $datas = Barang::orderBy('nama_barang', 'asc')->get();
        $mitras = Mitra::orderBy('nama_mitra', 'asc')->get();
        $kamuses = Kamus::orderBy('nama_kata', 'asc')->get();

        return view('web', compact('datas', 'mitras', 'kamuses'));
    }

    public function store(Request $request)
    {
	    $data = new Pesan;
	    $data->nama = $request->nama;
	    $data->isi_pesan = $request->isi_pesan;
	    $data->save();
	    session(['message' => 'bTambah']);
	    return redirect()->action('WebController@index');
    }
}
