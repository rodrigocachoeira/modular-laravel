<?php

namespace Orion\Mail\Enntities;

use \Illuminate\Database\Eloquent\Model;

class ConfigEmailSignature extends Model
{

  protected $fillable = [
    'title', 'name', 'email', 'contact',
    'config_email_id'
  ];

  public function configEmail ()
  {
    return $this->belongsTo('Orion\Mail\Enntitie\ConfigEmail');
  }

}
