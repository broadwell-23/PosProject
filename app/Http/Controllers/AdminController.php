<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
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
        $datas = User::all();
        return view('admin', compact('datas'));
    }

    public function store(Request $request)
    {
        
	    $user = new User;
	    $user->name = $request->name;
	    $user->email = $request->email;
	    $user->password = bcrypt($request->password);
	    $user->save();
	    session(['message' => 'bTambah']);
	    return redirect()->action('AdminController@index');
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password!=null) {
            $pass = bcrypt($request->password);
        } else {
            $oldpass = User::where('id', $request->id)->first();
            $pass = $oldpass->password;
        }
        $user->password = $pass;
        $user->save();
        session(['message' => 'bUbah']);
        return redirect()->action('AdminController@index');
    }

    public function destroy(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();
        session(['message' => 'bHapus']);
        return redirect()->action('AdminController@index');   
    }

}
