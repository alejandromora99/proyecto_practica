<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['direccion','lat','lng','comuna_direccion'];
}
