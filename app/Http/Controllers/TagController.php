<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
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
        $datas = Tag::all();
        return view('tag', compact('datas'));
    }

    public function store(Request $request)
    {
	    $data = new Tag;
	    $data->nama_tag = $request->nama_tag;
	    $data->save();
	    session(['message' => 'bTambah']);
	    return redirect()->action('TagController@index');
    }

    public function update(Request $request)
    {
        $data = Tag::find($request->id);
        $data->nama_tag = $request->nama_tag;
        $data->save();
        session(['message' => 'bUbah']);
        return redirect()->action('TagController@index');
    }

    public function destroy(Request $request)
    {
        $data = Tag::find($request->id);
        $data->delete();
        session(['message' => 'bHapus']);
        return redirect()->action('TagController@index');   
    }
}
