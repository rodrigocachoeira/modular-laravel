<?php

namespace Orion\Mail\Enntities;

use \Illuminate\Database\Eloquent\Model;

class ConfigEmail extends Model
{

  protected $fillable = [
    'drive', 'host', 'port', 'username',
    'password', 'crypt', 'description', 'identify'
  ];

  public function signatures ()
  {
    return $this->hasMany('Orion\Mail\Enntitie\ConfigEmailSignature');
  }

}
