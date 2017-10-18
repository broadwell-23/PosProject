<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dokumen;

class DokumenController extends Controller
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
        $datas = Dokumen::all();
        return view('dokumen', compact('datas'));
    }

    public function store(Request $request)
    {
	    $data = new Dokumen;
	    $data->nama_dokumen = $request->nama_dokumen;
	    $data->pengeluar_dokumen = $request->pengeluar_dokumen;
	    $data->keterangan = $request->keterangan;
	    $data->save();
	    session(['message' => 'bTambah']);
	    return redirect()->action('DokumenController@index');
    }

    public function update(Request $request)
    {
        $data = Dokumen::find($request->id);
        $data->nama_dokumen = $request->nama_dokumen;
	    $data->pengeluar_dokumen = $request->pengeluar_dokumen;
	    $data->keterangan = $request->keterangan;
        $data->save();
        session(['message' => 'bUbah']);
        return redirect()->action('DokumenController@index');
    }

    public function destroy(Request $request)
    {
        $data = Dokumen::find($request->id);
        $data->delete();
        session(['message' => 'bHapus']);
        return redirect()->action('DokumenController@index');   
    }
}
