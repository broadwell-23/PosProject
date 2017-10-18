<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Packing;

class PackingController extends Controller
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
        $datas = Packing::all();
        return view('packing', compact('datas'));
    }

    public function store(Request $request)
    {
	    $data = new Packing;
	    $data->nama_packing = $request->nama_packing;
	    $data->keterangan = $request->keterangan;
	    $data->save();
	    session(['message' => 'bTambah']);
	    return redirect()->action('PackingController@index');
    }

    public function update(Request $request)
    {
        $data = Packing::find($request->id);
        $data->nama_packing = $request->nama_packing;
	    $data->keterangan = $request->keterangan;
        $data->save();
        session(['message' => 'bUbah']);
        return redirect()->action('PackingController@index');
    }

    public function destroy(Request $request)
    {
        $data = Packing::find($request->id);
        $data->delete();
        session(['message' => 'bHapus']);
        return redirect()->action('PackingController@index');   
    }
}
