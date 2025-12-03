<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JadwalMapel extends Model
{
  protected $table = 'jadwal_mapel';

  protected $fillable = [
      'id_kelas', 'id_mapel', 'hari', 'jamAwal', 'jamAkhir'
  ];

  public function users()
  {
    return $this->belongsTo(User::class, 'id_guru');
  }

  public function kelas()
  {
    return $this->belongsTo(Kelas::class, 'id_kelas');
  }

  public function mapel()
  {
    return $this->belongsTo(Mapel::class, 'id_mapel');
  }
}
