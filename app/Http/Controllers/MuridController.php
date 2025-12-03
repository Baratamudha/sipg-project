<?php

namespace App\Http\Controllers;

use App\User;
use App\Murid;
use App\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class MuridController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = \App\User::all()->where('roles_id','1');
      $murid = \App\Murid::with('kelas')->get();
      $kelas = \App\Kelas::all();
      if(Auth::user()->roles_id == 2)
      {
        return view ('tu.dataMurid', compact('users', 'murid', 'kelas'));
      }
      else
      {
        return view('guru.dataMurid', compact('users', 'murid', 'kelas'));
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = \App\Kelas::all();
        return view('tu.tambahDataMurid', compact('kelas'));
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
    'nis'=> 'required|numeric',
    'nama' => 'required|alpha',
    'tglLahir' => 'required',
    'jenisKelamin' => 'required',
    'id_kelas' => 'required',
  ]);
    $murid = new Murid();
    $murid->nis = Input::get('nis');
    $murid->nama = Input::get('nama');
    $murid->tglLahir = Input::get('tglLahir');
    $murid->jenisKelamin = Input::get('jenisKelamin');
    $murid->id_kelas = Input::get('id_kelas');

    $murid->save();
    $murid = \App\Murid::with('kelas')->get();
    return view('tu.dataMurid', compact('murid', 'kelas'));
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
      $murid = \App\Murid::findOrFail($id);
      $kelas = \App\Kelas::all();
      return view('tu.editDataMurid', compact('murid', 'id', 'kelas'));
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
    'nis'=> 'required|numeric',
    'nama' => 'required|alpha',
    'tglLahir' => 'required',
    'jenisKelamin' => 'required',
    'id_kelas' => 'required',
  ]);
    $murid = \App\Murid::find($id);
    $murid->nis = $request->get('nis');
    $murid->nama = $request->get('nama');
    $murid->tglLahir = $request->get('tglLahir');
    $murid->jenisKelamin = $request->get('jenisKelamin');
    $murid->id_kelas = $request->get('id_kelas');
    $murid->save();
    return redirect('dataMurid')->with('success', 'Data Pegawai Telah Di Perbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $murid = \App\Murid::find($id);
      $murid -> delete();
      \Session::flash('flash_message_delete','Model successfully deleted.');
      return redirect('dataMurid');
    }
}
