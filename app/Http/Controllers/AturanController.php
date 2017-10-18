<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aturan;

class AturanController extends Controller
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
        $datas = Aturan::all();
        return view('aturan', compact('datas'));
    }

    public function store(Request $request)
    {
	    $data = new Aturan;
	    $data->isi_aturan = $request->isi_aturan;
	    $data->keterangan = $request->keterangan;
	    $data->save();
	    session(['message' => 'bTambah']);
	    return redirect()->action('AturanController@index');
    }

    public function update(Request $request)
    {
        $data = Aturan::find($request->id);
        $data->isi_aturan = $request->isi_aturan;
	    $data->keterangan = $request->keterangan;
        $data->save();
        session(['message' => 'bUbah']);
        return redirect()->action('AturanController@index');
    }

    public function destroy(Request $request)
    {
        $data = Aturan::find($request->id);
        $data->delete();
        session(['message' => 'bHapus']);
        return redirect()->action('AturanController@index');   
    }
}
