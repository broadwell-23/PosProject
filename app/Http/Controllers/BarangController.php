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
        foreach ($datas as $data) {
            $barang = Barang::find($data->id);
            $packings = $barang->packings()->get();
            $dokumens = $barang->dokumens()->get();
            $aturans = $barang->aturans()->get();
            $tags = $barang->tags()->get();
        }
        return view('barang', compact('datas', 'packings', 'dokumens', 'aturans', 'tags'));
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
        $packings = Packing::all();
        $packing_barang = Barang::find($id);
        $selected_packings = $packing_barang->packings()->get();

        $dokumens = Dokumen::all();
        $dokumen_barang = Barang::find($id);
        $selected_dokumens = $dokumen_barang->dokumens()->get();

        $aturans = Aturan::all();
        $aturan_barang = Barang::find($id);
        $selected_aturans = $aturan_barang->aturans()->get();

        $tags = Tag::all();
        $tag_barang = Barang::find($id);
        $selected_tags = $tag_barang->tags()->get();

        $data = Barang::find($id);
        return view('barang.ubah', compact('data', 'packings', 'dokumens', 'aturans', 'tags', 'selected_packings', 'selected_dokumens', 'selected_aturans', 'selected_tags'));
    }

    public function store(Request $request)
    {
	    $data = new Barang;
	    $data->nama_barang = $request->nama_barang;
	    $data->keterangan = $request->keterangan;
	    $data->save();

        $barang = Barang::find($data->id);
        $barang->packings()->attach($request->packing_id);
        $barang->dokumens()->attach($request->dokumen_id);
        $barang->aturans()->attach($request->aturan_id);
        $barang->tags()->attach($request->tag_id);

	    session(['message' => 'bTambah']);
	    return redirect()->action('BarangController@index');
    }

    public function update(Request $request, $id)
    {
        $data = Barang::find($id);
        $data->nama_barang = $request->nama_barang;
        $data->keterangan = $request->keterangan;
        $data->save();

        $barang = Barang::find($data->id);
        $barang->packings()->sync($request->packing_id);
        $barang->dokumens()->sync($request->dokumen_id);
        $barang->aturans()->sync($request->aturan_id);
        $barang->tags()->sync($request->tag_id);

        session(['message' => 'bUbah']);
        return redirect()->action('BarangController@index');
    }

    public function destroy(Request $request)
    {
        $data = Barang::find($request->id);
        $data->packings()->detach($request->packing_id);
        $data->dokumens()->detach($request->dokumen_id);
        $data->aturans()->detach($request->aturan_id);
        $data->tags()->detach($request->tag_id);
        $data->delete();

        session(['message' => 'bHapus']);
        return redirect()->action('BarangController@index');   
    }
}
