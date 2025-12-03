<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
  protected $table = 'kelas';

  public function user()
  {
    return $this->hasMany(Murid::class);
  }

  public function jadwal_ekskul()
  {
    return $this->hasMany(JadwalEkskul::class);
  }

  public function jadwal_mapel()
  {
    return $this->hasMany(JadwalMapel::class);
  }
}
