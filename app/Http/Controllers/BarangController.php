<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;

class BarangController extends Controller
{
    //**
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
        $datas = Barang::all();
        return view('barang', compact('datas'));
    }

    public function store(Request $request)
    {
        
	    $data = new Barang;
	    $data->nama_mitra = $request->nama_mitra;
	    $data->alamat = $request->alamat;
	    $data->telp = $request->telp;
	    $data->fax = $request->fax;
	    $data->save();
	    session(['message' => 'bTambah']);
	    return redirect()->action('BarangController@index');
    }

    public function update(Request $request)
    {
        $data = Barang::find($request->id);
        $data->nama_mitra = $request->nama_mitra;
	    $data->alamat = $request->alamat;
	    $data->telp = $request->telp;
	    $data->fax = $request->fax;
        $data->save();
        session(['message' => 'bUbah']);
        return redirect()->action('BarangController@index');
    }

    public function destroy(Request $request)
    {
        $data = Barang::find($request->id);
        $data->delete();
        session(['message' => 'bHapus']);
        return redirect()->action('BarangController@index');   
    }
}
