<?php

namespace App\Http\Controllers;

use App\User;
use App\JadwalEkskul;
use App\JadwalMapel;
use App\Kelas;
use App\Ekskul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class JadwalEkskulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = \App\User::all()->where('roles_id','1');
      $jadwal_ekskul = \App\JadwalEkskul::all();
      $jadwal_mapel = \App\JadwalMapel::all();
      if(Auth::user()->roles_id == 2)
      {
        return view ('tu.dataJadwal', compact('users', 'jadwal_ekskul', 'jadwal_mapel'));
      }
      else
      {
        //return view('guru.dataJadwal', compact('users'));
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
      $ekskul = \App\Ekskul::all();
      return view('tu.tambahJadwalEkskul', compact('kelas', 'ekskul'));
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
    'id_ekskul' => 'required',
    'hari' => 'required',
    'jamAwal' => 'required',
    'jamAkhir' => 'required',
  ]);
    $jadwal_ekskul = new JadwalEkskul();
    $jadwal_ekskul->id_ekskul = Input::get('id_ekskul');
    $jadwal_ekskul->hari = Input::get('hari');
    $jadwal_ekskul->jamAwal = Input::get('jamAwal');
    $jadwal_ekskul->jamAkhir = Input::get('jamAkhir');

    $jadwal_ekskul->save();
    $jadwal_ekskul = JadwalEkskul::all();
    $jadwal_mapel = JadwalMapel::all();
    return view('tu.dataJadwal', compact('jadwal_ekskul', 'jadwal_mapel'));
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
      $kelas = \App\Kelas::all();
      $ekskul = \App\Ekskul::all();
      $jadwal_ekskul = \App\JadwalEkskul::findOrFail($id);
      return view('tu.editJadwalEkskul', compact('jadwal_ekskul', 'id', 'kelas', 'ekskul'));
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
    'id_ekskul' => 'required',
    'hari' => 'required',
    'jamAwal' => 'required',
    'jamAkhir' => 'required',
    ]);
    $jadwal_ekskul = \App\JadwalEkskul::find($id);
    $jadwal_ekskul->id_ekskul = $request->get('id_ekskul');
    $jadwal_ekskul->hari = $request->get('hari');
    $jadwal_ekskul->jamAwal = $request->get('jamAwal');
    $jadwal_ekskul->jamAkhir = $request->get('jamAkhir');
    $jadwal_ekskul->save();
    return redirect('dataJadwal')->with('success', 'Data Pegawai Telah Di Perbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $jadwal_ekskul = \App\JadwalEkskul::find($id);
      $jadwal_ekskul -> delete();
      \Session::flash('flash_message_delete','Model successfully deleted.');
      return redirect('dataJadwal');
    }
}
