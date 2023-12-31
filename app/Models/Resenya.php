<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resenya extends Model
{
    //Modelo de las reseñas
    use HasFactory;
    protected $table = "resenyas";
    protected $fillable = ['titulo','contenido','user_id','nombreyapellido','puntuacion','pros','contras'];
 
}
