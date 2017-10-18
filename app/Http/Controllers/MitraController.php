<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mitra;

class MitraController extends Controller
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
        $datas = Mitra::all();
        return view('mitra', compact('datas'));
    }

    public function store(Request $request)
    {
	    $data = new Mitra;
	    $data->nama_mitra = $request->nama_mitra;
	    $data->alamat = $request->alamat;
	    $data->telp = $request->telp;
	    $data->fax = $request->fax;
	    $data->save();
	    session(['message' => 'bTambah']);
	    return redirect()->action('MitraController@index');
    }

    public function update(Request $request)
    {
        $data = Mitra::find($request->id);
        $data->nama_mitra = $request->nama_mitra;
	    $data->alamat = $request->alamat;
	    $data->telp = $request->telp;
	    $data->fax = $request->fax;
        $data->save();
        session(['message' => 'bUbah']);
        return redirect()->action('MitraController@index');
    }

    public function destroy(Request $request)
    {
        $data = Mitra::find($request->id);
        $data->delete();
        session(['message' => 'bHapus']);
        return redirect()->action('MitraController@index');   
    }
}
