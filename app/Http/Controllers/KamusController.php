<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kamus;

class KamusController extends Controller
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
        $datas = Kamus::all();
        return view('kamus', compact('datas'));
    }

    public function store(Request $request)
    {
	    $data = new Kamus;
	    $data->nama_kata = $request->nama_kata;
	    $data->arti_kata = $request->arti_kata;
	    $data->save();
	    session(['message' => 'bTambah']);
	    return redirect()->action('KamusController@index');
    }

    public function update(Request $request)
    {
        $data = Kamus::find($request->id);
        $data->nama_kata = $request->nama_kata;
	    $data->arti_kata = $request->arti_kata;
        $data->save();
        session(['message' => 'bUbah']);
        return redirect()->action('KamusController@index');
    }

    public function destroy(Request $request)
    {
        $data = Kamus::find($request->id);
        $data->delete();
        session(['message' => 'bHapus']);
        return redirect()->action('KamusController@index');   
    }
}
