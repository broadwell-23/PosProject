<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pesan;

class PesanController extends Controller
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
        $datas = Pesan::all();
        return view('pesan', compact('datas'));
    }

    public function update(Request $request)
    {
        $data = Pesan::find($request->id);
        $data->status = $request->status;
        $data->save();
        session(['message' => 'bUbah']);
        return redirect()->action('PesanController@index');
    }

    public function destroy(Request $request)
    {
        $data = Pesan::find($request->id);
        $data->delete();
        session(['message' => 'bHapus']);
        return redirect()->action('PesanController@index');   
    }
}
