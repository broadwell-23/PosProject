<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transportasi;

class TransportasiController extends Controller
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
        $datas = Transportasi::all();
        return view('transportasi', compact('datas'));
    }

    public function store(Request $request)
    {
	    $data = new Transportasi;
	    $data->moda_transportasi = $request->moda_transportasi;
	    $data->save();
	    session(['message' => 'bTambah']);
	    return redirect()->action('TransportasiController@index');
    }

    public function update(Request $request)
    {
        $data = Transportasi::find($request->id);
        $data->moda_transportasi = $request->moda_transportasi;
        $data->save();
        session(['message' => 'bUbah']);
        return redirect()->action('TransportasiController@index');
    }

    public function destroy(Request $request)
    {
        $data = Transportasi::find($request->id);
        $data->delete();
        session(['message' => 'bHapus']);
        return redirect()->action('TransportasiController@index');   
    }
}
