<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
  protected $table = 'murid';

  protected $fillable = [
      'nis', 'nama', 'tglLahir', 'jenisKelamin', 'id_kelas'
  ];

  public function kelas()
  {
    return $this->belongsTo(Kelas::class, 'id_kelas');
  }
}
