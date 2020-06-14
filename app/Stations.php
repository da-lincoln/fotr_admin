<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stations extends Model
{
    protected $fillable = [
      'name', 'river_focus', 'image', 'date_taken'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
