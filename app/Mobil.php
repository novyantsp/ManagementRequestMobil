<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
  protected $fillable = [
      'merkmobil', 'tipemobil', 'tahunbuat', 'namamobil', 'jumlahunit', 'tersedia', 'sisa',
  ];

  public function getRouteKeyName()
  {
    return 'area';
  }

  public function requestunit()
    {
        return $this->hasMany('App\RequestUnit', 'mobil_id');
    }
}
