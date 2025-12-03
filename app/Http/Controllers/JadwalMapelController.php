<?php

namespace App\Http\Controllers;

use App\User;
use App\JadwalMapel;
use App\JadwalEkskul;
use App\Kelas;
use App\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class JadwalMapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = \App\User::all()->where('roles_id','1');
      $jadwal_mapel = \App\JadwalMapel::all();
      $jadwal_ekskul = \App\JadwalEkskul::all();
      if(Auth::user()->roles_id == 2)
      {
        return view ('tu.dataJadwal', compact('users', 'jadwal_mapel', 'jadwal_ekskul'));
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
        $mapel = \App\Mapel::all();
        return view('tu.tambahJadwalMapel', compact('kelas', 'mapel'));
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
    'id_kelas'=> 'required',
    'id_mapel' => 'required',
    'hari' => 'required',
    'jamAwal' => 'required',
    'jamAkhir' => 'required',
  ]);
    $jadwal_mapel = new JadwalMapel();
    $jadwal_mapel->id_kelas = Input::get('id_kelas');
    $jadwal_mapel->id_mapel = Input::get('id_mapel');
    $jadwal_mapel->hari = Input::get('hari');
    $jadwal_mapel->jamAwal = Input::get('jamAwal');
    $jadwal_mapel->jamAkhir = Input::get('jamAkhir');

    $jadwal_mapel->save();
    $jadwal_mapel = JadwalMapel::all();
    $jadwal_ekskul = JadwalEkskul::all();
    return view('tu.dataJadwal', compact('jadwal_mapel', 'jadwal_ekskul'));
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
      $mapel = \App\Mapel::all();
      $jadwal_mapel = \App\JadwalMapel::findOrFail($id);
      return view('tu.editJadwalMapel', compact('jadwal_mapel', 'id', 'kelas', 'mapel'));
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
    'id_kelas'=> 'required',
    'id_mapel' => 'required',
    'hari' => 'required',
    'jamAwal' => 'required',
    'jamAkhir' => 'required',
    ]);
    $jadwal_mapel = \App\JadwalMapel::find($id);
    $jadwal_mapel->id_kelas = $request->get('id_kelas');
    $jadwal_mapel->id_mapel = $request->get('id_mapel');
    $jadwal_mapel->hari = $request->get('hari');
    $jadwal_mapel->jamAwal = $request->get('jamAwal');
    $jadwal_mapel->jamAkhir = $request->get('jamAkhir');
    $jadwal_mapel->save();
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
      $jadwal_mapel = \App\JadwalMapel::find($id);
      $jadwal_mapel -> delete();
      \Session::flash('flash_message_delete','Model successfully deleted.');
      return redirect('dataJadwal');
    }
}
