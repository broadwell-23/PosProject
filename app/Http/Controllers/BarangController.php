<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Packing;
use App\Dokumen;
use App\Aturan;
use App\Tag;

class BarangController extends Controller
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
        $datas = Barang::all();
        return view('barang', compact('datas'));
    }

    public function indexTambah()
    {
        $packings = Packing::all();
        $dokumens = Dokumen::all();
        $aturans = Aturan::all();
        $tags = Tag::all();
        return view('barang.tambah', compact('packings', 'dokumens', 'aturans', 'tags'));
    }

    public function indexUbah($id)
    {
        $data = Barang::find($id);
        return view('barang.ubah', compact('data'));
    }

    public function store(Request $request)
    {
	    $data = new Barang;
	    $data->nama_barang = $request->nama_barang;
	    $data->keterangan = $request->keterangan;
	    $data->save();

        $barang = Barang::find($data->id);
        $barang->packings()->toggle($request->packing_id);
        $barang->dokumens()->toggle($request->dokumen_id);
        $barang->aturans()->toggle($request->aturan_id);
        $barang->tags()->toggle($request->tag_id);

	    session(['message' => 'bTambah']);
	    return redirect()->action('BarangController@index');
    }

    public function update(Request $request, $id)
    {
        $data = Barang::find($id);
        $data->nama_barang = $request->nama_barang;
        $data->keterangan = $request->keterangan;
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
