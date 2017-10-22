<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Pesan;

class WebController extends Controller
{
    public function index()
    {
        $datas = Barang::all();
        return view('web', compact('datas'));
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
