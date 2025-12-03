<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = \App\User::all()->where('roles_id','1');
      if(Auth::user()->roles_id == 2)
      {
        return view ('tu.dashboard', compact('users'));
      }
      else
      {
        return view('guru.dashboard', compact('users'));
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
    'namaAwal'=> 'required|alpha',
    'namaAkhir' => 'required|alpha',
    'NIP' => 'required',
    'password' => 'required',
    'tglLahir' => 'required',
    'agama' => 'required',
  ]);
    $users = new User();
    $users->namaAwal = Input::get('namaAwal');
    $users->namaAkhir = Input::get('namaAkhir');
    $users->NIP = Input::get('NIP');
    $users->password = bcrypt(Input::get('password'));
    $users->tglLahir = Input::get('tglLahir');
    $users->agama = Input::get('agama');
    $users->roles_id = DB::table('roles')->select('id')->where('namaRule', 'user')->first()->id;

    $users->save();
    $users = User::all()->where('roles_id','1');
    return view('tu.dashboard', compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $user = \App\User::findOrFail($id);
      return view('tu.editDataGuru', compact('user', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
    'namaAwal'=> 'required|alpha',
    'namaAkhir' => 'required|alpha',
    'NIP' => 'required',
    'password' => 'required',
    'tglLahir' => 'required',
    'agama' => 'required',
  ]);
    $user= \App\User::find($id);
    $user->namaAwal = $request->get('namaAwal');
    $user->namaAkhir = $request->get('namaAkhir');
    $user->NIP = $request->get('NIP');
    $user->password = bcrypt($request->get('password'));
    $user->tglLahir = $request->get('tglLahir');
    $user->agama = $request->get('agama');
    $user->save();
    return redirect('dataGuru')->with('success', 'Data Pegawai Telah Di Perbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user = \App\User::find($id);
      $user -> delete();
      \Session::flash('flash_message_delete','Model successfully deleted.');
      return redirect('dataGuru');
    }
}
