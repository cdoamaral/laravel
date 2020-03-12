<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    // Para corregir la politica de nombres de plural a singular
    protected $table = 'regiones';
}
