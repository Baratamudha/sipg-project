<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JadwalEkskul extends Model
{
  protected $table = 'jadwal_ekskul';

  protected $fillable = [
      'id_ekskul', 'hari', 'jamAwal', 'jamAkhir'
  ];

  public function users()
  {
    return $this->belongsTo(User::class, 'id_guru');
  }

  public function kelas()
  {
    return $this->belongsTo(Kelas::class, 'id_kelas');
  }

  public function ekskul()
  {
    return $this->belongsTo(Ekskul::class, 'id_ekskul');
  }
}
