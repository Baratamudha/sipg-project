<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ekskul extends Model
{
  protected $table = 'ekskul';

  protected $fillable = [
      'namaEkskul', 'id_guru'
  ];

  public function guru()
  {
    return $this->belongsTo(User::class, 'id_guru');
  }

  public function jadwal_ekskul()
  {
    return $this->hasMany(JadwalEkskul::class);
  }
}
