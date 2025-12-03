<?php

namespace App\Http\Controllers;

use App\User;
use App\Kelas;
use App\Murid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = \App\User::all()->where('roles_id','1');
      $kelas = \App\Kelas::all();
      if(Auth::user()->roles_id == 2)
      {
        return view ('tu.dataKelas', compact('users', 'kelas'));
      }
      else
      {
        //return view('guru.dataKelas', compact('users'));
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('tu.tambahDataKelas');
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
    'namaKelas'=> 'required',
    ]);
    $kelas = new Kelas();
    $kelas->namaKelas = Input::get('namaKelas');

    $kelas->save();
    $kelas = \App\Kelas::all();
    return view('tu.dataKelas', compact('kelas'));
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
      $kelas = \App\Kelas::find($id);
      return view('tu.editDataKelas', compact('kelas', 'id'));
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
    'namaKelas'=> 'required',
  ]);
    $kelas = \App\Kelas::find($id);
    $kelas->namaKelas = $request->get('namaKelas');
    $kelas->save();
    return redirect('dataKelas')->with('success', 'Data Pegawai Telah Di Perbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $kelas = \App\Kelas::find($id);
      $kelas -> delete();
      \Session::flash('flash_message_delete','Model successfully deleted.');
      return redirect('dataKelas');
    }
}
