<?php

namespace App\Modules\Test\Entities\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{

    public $fillable = [
      'name',
      'description',
      'number',
      'money',
      'date',
      'available',
      'time'
    ];

}
