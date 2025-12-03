<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
  protected $table = 'mapel';

  protected $fillable = [
      'namaMapel', 'id_guru'
  ];

  public function guru()
  {
    return $this->belongsTo(User::class, 'id_guru');
  }

  public function jadwal_mapel()
  {
    return $this->hasMany(JadwalMapel::class);
  }
}
