<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestUnit extends Model
{
  protected $fillable = ['jumlahunit'];

  public function mobil()
    {
        return $this->belongsTo('App\Mobil', 'mobil_id');
    }

  public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
